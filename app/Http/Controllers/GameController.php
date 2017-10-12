<?php

namespace App\Http\Controllers;

use App\Credit;
use App\Game;
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
            $Winnings = Winning::all();
            return view('game.game_name.index', compact(['Admins', 'Merchants', 'Agents', 'Games', 'Winnings', 'Users']));
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
            $Game                 =   new Game();
            $Game->updateOrCreate(['name' => $request->name],
                [   'name' => $request->name,
                    'users_id' => Auth::user()->id
                ]);
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
            $Game                   =   Game::find(base64_decode($id));
            $Game->name             =   $request->name;
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
}
