<?php

namespace App\Http\Controllers;
use App\Agent;
use App\Credit;
use App\Game;
use App\Role;
use App\User;
use App\Winning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $Credit;
    private $user_credit_id;

    public function index()
    {
        try {
            $Users = User::with(['role', 'credit'])->get();
            $Admins = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants = User::with('role')->where('roles_id', '=', 2)->get();
            $Agents = User::with('role')->where('roles_id', '=', 3)->get();
            $Games = Game::all();
            $Winnings = Winning::all();
            return view('credit.index', compact(['Admins', 'Merchants', 'Agents', 'Games', 'Winnings', 'Users']));
        }catch (\ErrorException $ex){
            $ex->getMessage();
        }
    }
    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeOrUpdate(Request $request)
    {
        try{
            $rules = [
                'amount' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }


            $_Credit = Credit::where('users_id', '=', $request->users_id)->first();
            if ($_Credit) {
                $this->user_credit_id = $_Credit->id;
                $this->Credit = Credit::find($this->user_credit_id);
                $this->Credit->amount = $request->amount + $_Credit->amount;
            } else {
                $this->Credit = new Credit();
                $this->Credit->amount = $request->amount;
            }

            $this->Credit->funded_by = Auth::user()->id;
            $this->Credit->users_id = $request->users_id;
            $this->Credit->save();

            $_Agent =   Agent::where('users_id', '=',  $request->users_id)->first();
            if($_Agent) {
                $Agent = Agent::find($_Agent->id);
                $Agent->credit_balance = $request->amount + $_Agent->credit_balance;
                $Agent->save();
            }

            if($this->Credit){
                flash()->success('Credit balance updated successfully');
                return redirect()->action('CreditController@index');
            }
        }
        catch(\ErrorException$ex){
            $ex->getMessage();
        }
    }
}
