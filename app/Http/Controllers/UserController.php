<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Game;
use App\Merchant;
use App\Otp;
use App\Role;
use App\User;
use App\Winning;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Exception\ErrorException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $APPROVED  =  'APPROVED';
    private $PENDING   =   'PENDING';
    private $BLOCKED   =   'BLOCKED';
    private $Users;
    private $Agent;
    private $_Agent;

    private $sms_url;
    private $recipient_phone;
    private $username = 'asenimegregory@gmail.com';
    private $password = 'parceladmin';
    private $sms_api_key = 'e066554019bbd1ea31e4ae6d1fef362a5bc81dbf';

    private $ticket_id;

    public function index($role)
    {
        try {
            $UserInfo = null;
            $Users              =   User::with('role')->where('delete_status', '=', 0)->get();
            $Admins             =   User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants          =   User::with('role')->where('delete_status', '=', 0)->where('roles_id', '=', 2)->get();
            $Agents             =   User::with('role')->where('delete_status', '=', 0)->where('roles_id', '=', 3)->get();
            $Roles              =   Role::all();
            $Games              =   Game::all();
            $Winnings           =   Winning::all();
            if ($role == 'agent') {
                $UserInfo = $Agents;
            }
            else if ($role == 'merchant') {
                $UserInfo = $Merchants;
            }
            else if ($role == 'all') {
                $UserInfo = $Users;
            }
            return view('user.index', compact(['Admins', 'Merchants', 'Agents', 'Games', 'Winnings', 'Users', 'Roles', 'UserInfo']));
        }catch (\ErrorException $ex){
            $ex->getMessage();
        }
    }

    public function viewMerchantAgent($id)
    {
        try {

            $Users              =   User::with('role')->where('delete_status', '=', 0)->get();
            $Admins             =   User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants          =   User::with('role')->where('delete_status', '=', 0)->where('roles_id', '=', 2)->get();
            $Agents             =   User::with('role')->where('delete_status', '=', 0)->where('roles_id', '=', 3)->get();
            $Roles              =   Role::all();
            $Games              =   Game::all();
            $Winnings           =   Winning::all();

            $MerchantAgents     =   Agent::with('merchant')->where('merchants_id', '=', $id)->get();

           // dd($MerchantAgents);
            return view('user.agent', compact(['Admins', 'Merchants', 'Agents', 'Games', 'Winnings', 'Users', 'Roles', 'MerchantAgents']));
        }catch (\ErrorException $ex){
            $ex->getMessage();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try{
            $Users          = User::with('role')->where('delete_status', '=', 0)->get();
            $Admins         = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants      = User::with('role')->where('delete_status', '=', 0)->where('roles_id', '=', 2)->get();
            $Agents         = User::with('role')->where('delete_status', '=', 0)->where('roles_id', '=', 3)->get();
            $Roles          = Role::all();
            $Games          = Game::all();
            $Winnings       = Winning::all();
            return view('user.create', compact(['Admins', 'Merchants', 'Agents', 'Games', 'Winnings', 'Users', 'Roles']));
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            /**
             * Define rules
             */
            $rules = [
                'name' => 'required',
                'email'     => 'required|email|max:255|unique:users',
                'phone' => 'required|unique:users',
                'password' => 'required|min:6|confirmed',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }

            $User                   =   new User();
            $api_token              =   $this->randomKey(60);
            $User->name             =   $request->name;
            $User->email            =   $request->email;
            $User->phone            =   $request->phone;
            $User->api_token        =   $api_token;
            $User->roles_id         =   $request->roles_id;
            // get role name
            $roleName               =   Role::where('id', '=', $request->roles_id)->first()->name;
            if ($request->roles_id != 1) {
                $User->approval_status = $this->PENDING;
            }
            else {
                $User->approval_status = $this->APPROVED;
            }
            // generate ticket id
            $ticket_id              =   $this->generateTicketId();
            $User->ticket_id        =   $ticket_id;
            $User->location         =   $request->location;
            if ($request->roles_id == '2' || $request->roles_id == '3'){
                $User->password     =   md5($request->password);
            }
            else{
                $User->password         =   bcrypt($request->password);
            }
            $User->save();
           // dd($User);
            if($User){
                if ($request->roles_id      == '3') {
                    $Agent                  =  new Agent();
                    $Agent->users_id        =  $User->id;
                    $Agent->agent_name      =  $request->name;
                    $Agent->ticket_id       =  $ticket_id;
                    $Agent->credit_balance  = 0.0;
                    //get merchant id
                    $Agent->merchants_id    =   $request->merchants_id;
                    $Agent->save();
                }
               else if ($request->roles_id      == '2') {
                    $Merchant               = new Merchant();
                    $Merchant->users_id     = $User->id;
                    $Merchant->save();
                }
                //Send sms
                $message = "Hi ".$request->name.", you have been registered as a ".$roleName." on LottoStars. Download the app from playstore and login with \nEmail:" . $request->email . "\nPassword: ".$request->password;
                $message    =   preg_replace('/\s/','%20', $message);
                $this->recipient_phone = $request->phone;
                $this->sms_url = 'http://api.ebulksms.com:8080/sendsms?username=' . $this->username . '&apikey=' . $this->sms_api_key . '&messagetext=' . $message . '&sender=LottoStars&flash=0&recipients=' . $this->recipient_phone;
                $this->sms_url = trim($this->sms_url);
                $this->getContent($this->sms_url);

                flash()->success($request->name.' Added successfully');
                return redirect()->action('UserController@index', ['role' => 'all']);

            }
        }
        catch(\ErrorException $ex){
            flash()->error($ex->getMessage());
            return redirect()->action('UserController@index',['role' => 'all']);
        }
        catch (QueryException $ex) {
            flash()->error($ex->getMessage());
            return redirect()->action('UserController@index', ['role' => 'all']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $User       =   User::find($id);
            return $User;
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Request $request, $id)
    {
            try{
                $rules = [
                    'approval_status' => 'required'
                ];
                $validator = Validator::make($request->all(), $rules);

                if ($validator->fails()) {
                    return back()
                        ->withInput()
                        ->withErrors($validator);
                }
                $User       =   User::find(base64_decode($id));
                $User->name             =   $request->name;
                $User->email            =   $request->email;
                $User->phone            =   $request->phone;
                $User->approval_status  =   $request->approval_status;
                // generate ticket id
                if ($User->ticket_id == '') {
                    $this->ticket_id        = $this->generateTicketId();
                    $User->ticket_id        =   $this->ticket_id;
                }
                $User->save();
                if($User){
                    flash()->success('User data updated successfully');
                    return redirect()->action('UserController@index', ['role'=> 'all']);
                }
            }
            catch(\ErrorException$ex){
                flash()->error($ex->getMessage());
                return redirect()->action('UserController@index', ['role' => 'all']);
            }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $User       =   User::find(base64_decode($id));
            $User->delete_status = 1;
            $User->save();
//            $role_id    =   $User->roles_id;
////            //delete tables that hold constraints to user
//            $Otp =  Otp::where('users_id','=', base64_decode($id))->first();
//           if($Otp != null) {
//                $_Otp = Otp::find($Otp->id);
//                $_Otp->delete();
//           }
//            if ($role_id == 3) {
//                $agent_id   =   Agent::where('users_id', '=', $User->id)->first()->id;
//                $Agent      =   Agent::find($agent_id);
//                $Agent->delete();
//            }
//            else if ($role_id == 2) {
//                $merchant_id    =   Merchant::where('users_id', '=', $User->id)->first()->id;
//                $Merchant       =   Merchant::find($merchant_id);
//                $Merchant->delete();
//            }
            //$User->delete();
            flash()->success('User info deleted successfully');
            return redirect()->action('UserController@index', ['role' => 'all']);
        }
        catch(\ErrorException $ex){
            $message = 'You cannot delete this user because he has performed transactions which exists in the system.';
            flash()->success($message);
            return redirect()->action('UserController@index', ['role' => 'all']);
        }
        catch (QueryException $queryException) {
            $message = 'Unable to delete user. This user is linked with another user';
            flash()->error($message);
            return redirect()->action('UserController@index', ['role' => 'all']);
        }
    }
    /**
     * @param $length
     * @return string
     * Generate api token of 60 character length
     */
    function randomKey($length) {
        $key = '';
        $pool = array_merge(range(0,9), range('a', 'z'),range('A', 'Z'));

        for($i=0; $i < $length; $i++) {
            $key .= $pool[mt_rand(0, count($pool) - 1)];
        }
        return $key;
    }

    function generateTicketId() {
        $ticketId = mt_rand(10000,99999);
        return $ticketId;
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * lead
     */
    function moveAgentToAnotherMerchant( $id, Request $request) {
        try {
            $agent_id               =   Agent::where('users_id', '=', base64_decode($id))->first()->id;
            $Agent                  =   Agent::find($agent_id);
            $Agent->merchants_id    =   $request->merchants_id;
            $Agent->save();
            if($Agent) {
                flash()->success('Agent reassinged a new merchant.');
                return redirect()->action('UserController@index', ['role' => 'all']);
            }
            else {
                flash()->success('Agent is not reassinged a new merchant.');
                return redirect()->action('UserController@index', ['role' => 'all']);
            }
        }
        catch (\ErrorException $ex) {
            flash()->error($ex->getMessage());
        }
    }

    /**
     * @param $url
     * @return mixed|string
     * Get contents from url
     */
    public function getContent($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $contents = curl_exec($ch);
        if (curl_errno($ch)) {
            echo curl_error($ch);
            echo "\n<br />";
            $contents = '';
            return $contents;
        } else {
            curl_close($ch);
        }
        if (!is_string($contents) || !strlen($contents)) {
            echo "Failed to get contents.";
            $contents = '';
            return $contents;
        }
        return $contents;
    }
}
