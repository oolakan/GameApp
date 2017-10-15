<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\CourseCode;
use App\CourseMaterial;
use App\Game;
use App\GameTransaction;
use App\Pin;
use App\Role;
use App\User;
use App\Winning;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Users  =   User::all();
        $Admins = User::with(['role'])->where('roles_id', '=', 1)->get();
        $Merchants = User::with(['role'])->where('roles_id', '=', 2)->get();
        $Agents = User::with(['role'])->where('roles_id', '=', 3)->get();
        $Games = Game::all();
        $Transactions       = GameTransaction::all();
        $Winnings = Winning::all();
        return view('dashboard.index', compact(['Admins', 'Merchants', 'Agents', 'Games', 'Transactions', 'Winnings', 'Users']));
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
