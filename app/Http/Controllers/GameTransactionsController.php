<?php

namespace App\Http\Controllers;

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

class GameTransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $Users              = User::with(['role', 'credit'])->get();
            $Admins             = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants          = User::with('role')->where('roles_id', '=', 2)->get();
            $Agents             = User::with('role')->where('roles_id', '=', 3)->get();
            $Transactions       = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'game_quater'])->get();
            $Games              = Game::all();
            $GameNames          = GameName::all();
            $GameTypes          = GameType::all();
            $GameTypeOptions    = GameTypeOption::all();
            $GameQuaters        = GameQuater::all();
            $Winnings           = Winning::all();

            return view('game.game_transactions.index', compact([
                'Admins', 'Merchants', 'Agents',
                'Transactions', 'Games', 'GameNames', 'GameTypes', 'Winnings',
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
