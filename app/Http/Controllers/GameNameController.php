<?php

namespace App\Http\Controllers;



use App\Credit;
use App\Day;
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

class GameNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try {
            $Users                  = User::with(['role', 'credit'])->get();
            $Admins                 = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants              = User::with('role')->where('roles_id', '=', 2)->get();
            $Agents                 = User::with('role')->where('roles_id', '=', 3)->get();
            $Games                  = Game::get();
            $GameNames              = GameName::with('day')->get();
            $GameTypes              = GameType::get();
            $GameTypeOptions        = GameTypeOption::get();
            $GameQuaters            = GameQuater::get();
            $Winnings               = Winning::get();
            $Days                   = Day::get();
            return view('game.game_name.index', compact([
                'Admins', 'Merchants', 'Agents',
                'Games', 'GameNames', 'GameTypes', 'Winnings',
                'GameQuaters', 'GameTypeOptions', 'Users', 'Days']));
        } catch (\ErrorException $ex){
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
                'name' => 'required|unique:game_names',
                'start_time' => 'required',
                'stop_time' => 'required',
                'draw_time' => 'required',
                'game_quaters_id' => 'required'
             ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Game                 =   new GameName();
            $Game->create($request->all());
            if($Game) {
                flash()->success('Game name created successfully');
                return redirect()->action('GameNameController@index');
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
                'start_time' => 'required',
                'stop_time' => 'required',
                'draw_time' => 'required',
                'game_quaters_id' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Game                   =   GameName::find(base64_decode($id));
            $Game->update($request->all());
            $Game->save();
            if($Game){
                flash()->success('Game name updated successfully');
                return redirect()->action('GameNameController@index');
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
        GameName::destroy(base64_decode($id));
        return redirect()->action('GameNameController@index');
    }
}
