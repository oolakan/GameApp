<?php

namespace App\Http\Controllers;


use App\Credit;
use App\Game;
use App\GameName;
use App\GameQuater;
use App\GameType;
use App\GameTypeOption;
use App\Role;
use App\User;
use App\Winning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WinningsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $APPROVED   =   'APPROVED';
    public function index()
    {
        try {
            $Users = User::with(['role', 'credit'])->get();
            $Admins = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants = User::with('role')->where('roles_id', '=', 2)->get();
            $Agents = User::with('role')->where('roles_id', '=', 3)->get();
            $Games = Game::all();
            $GameNames = GameName::all();
            $GameTypes = GameType::all();
            $GameTypeOptions = GameTypeOption::all();
            $GameQuaters = GameQuater::all();
            $Winnings = Winning::all();
            return view('game.game_name.index', compact([
                'Admins', 'Merchants', 'Agents',
                'Games', 'GameNames', 'GameTypes', 'Winnings',
                'GameQuaters', 'GameTypeOptions', 'Users']));
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
        try {
            $Users = User::with(['role', 'credit'])->get();
            $Admins = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants = User::with('role')->where('roles_id', '=', 2)->get();
            $Agents = User::with('role')->where('roles_id', '=', 3)->get();
            $Games = Game::all();
            $GameNames = GameName::all();
            $GameTypes = GameType::all();
            $GameTypeOptions = GameTypeOption::all();
            $GameQuaters = GameQuater::all();
            $Winnings = Winning::all();
            return view('winning.create', compact([
                'Admins', 'Merchants', 'Agents',
                'Games', 'GameNames', 'GameTypes', 'Winnings',
                'GameQuaters', 'GameTypeOptions', 'Users']));
        }catch (\ErrorException $ex){
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
            $rules = [
                'game_no' => 'required',
                'winning_date' => 'required',
                'winning_time' => 'required',
                'game_names_id' => 'required',
                'game_types_id' => 'required',
                'game_type_options_id' => 'required',
                'game_quaters_id' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Winning                   =   new Winning();
            $Winning->create($request->all());
            if($Winning){
                flash()->success('New winning game added successfully');
                return redirect()->action('WinningsController@index');
            }
        }
        catch(\ErrorException$ex){
            $ex->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $Winning       =   Winning::find(base64_decode($id));
            if($Winning){
                $Winning->update($request->all());
                flash()->success('Winning info updated successfully');
                return redirect()->action('WinningsController@index');
            }
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
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
            $Winning       =   Winning::find(base64_decode($id));
            $Winning->delete();
            flash()->success('User info deleted successfully');
            return redirect()->action('UserController@index');
        }
        catch(\ErrorException $ex){
            $ex->getMessage();
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

}
