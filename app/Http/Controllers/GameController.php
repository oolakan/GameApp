<?php

namespace App\Http\Controllers;


use App\Credit;
use App\Game;
use App\GameName;
use App\GameQuater;
use App\GameTransaction;
use App\GameType;
use App\GameTypeOption;
use App\Role;
use App\User;
use App\Winning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
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
            $Games = Game::all();
            $GameNames = GameName::all();
            $GameTypes = GameType::all();
            $GameTypeOptions = GameTypeOption::all();
            $GameQuaters = GameQuater::all();
            $Winnings = Winning::all();
            return view('game.game.index', compact([
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
                'game_names_id' => 'required',
                'game_quaters_id' => 'required',
                'start_time' => 'required',
                'stop_time' => 'required',
                'draw_time' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Game   =   new Game();
            $Game->create($request->all());
            flash()->success('Game information created successfully');
            return redirect()->action('GameController@index');
//            if($Game){
//                flash()->success('Game information created successfully');
//                return redirect()->action('GameController@index');
//            }
        }
        catch(\ErrorException$ex){
            flash()->error($ex->getMessage());
            return redirect()->action('GameController@index');

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
                'game_names_id' => 'required',
                'game_quaters_id' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }
            $Game                   =   Game::find(base64_decode($id));
            $Game->update($request->all());
            $Game->save();
            if($Game){
                flash()->success('Credit balance updated successfully');
                return redirect()->action('GameController@index');
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
        Game::destroy(base64_decode($id));
        return redirect()->action('GameController@index');
    }

    public function download(){
        return response()->download('/home/rasholli/public_html/apk/app-release.apk');
    }
}
