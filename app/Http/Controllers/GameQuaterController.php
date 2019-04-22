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

class GameQuaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $Users = User::with(['role', 'credit'])->get();
            $Admins = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants = User::with('role')->where('roles_id', '=', 2)->get();
            $Agents = User::with('role')->where('roles_id', '=', 3)->get();
            $Games = Game::get();
            $GameNames = GameName::get();
            $GameTypes = GameType::get();
            $GameTypeOptions = GameTypeOption::get();
            $GameQuaters = GameQuater::get();
            $Winnings = Winning::get();
            return view('game.game_quater.index', compact([
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
                'name' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Game                 =   new GameQuater();
            $Game->updateOrCreate(['name' => $request->name],
                [   'name' => $request->name,
                ]);
            if($Game) {
                flash()->success('Game quater created successfully');
                return redirect()->action('GameQuaterController@index');
            }
        }
        catch(\ErrorException$ex){
            $ex->getMessage();
        }
    }


    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $rules = [
                'name' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Game                   =   GameQuater::find(base64_decode($id));
            $Game->name             =   $request->name;
            $Game->save();
            if($Game){
                flash()->success('Game quater updated successfully');
                return redirect()->action('GameQuaterController@index');
            }
        }
        catch(\ErrorException$ex){
            $ex->getMessage();
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * Destroy game
     */
    public function destroy($id){
        GameQuater::destroy(base64_decode($id));
        return redirect()->action('GameQuaterController@index');
    }
}
