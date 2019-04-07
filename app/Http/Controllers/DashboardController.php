<?php

namespace App\Http\Controllers;

use App\AppUser;
use App\CourseCode;
use App\CourseMaterial;
use App\Day;
use App\Game;
use App\GameName;
use App\GameTransaction;
use App\Pin;
use App\Role;
use App\User;
use App\Winning;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class DashboardController extends Controller
{

    public function __construct()
    {
        ini_set('memory_limit', '1024M');
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
        $Transactions       =       0;  //GameTransaction::all();
        $Winnings           =       0;  //Winning::all();
        $today                      = date('l');
        $dayOfWeek          =       Day::where('name', '=', $today)->first();
        $dayOfWeekId        =       $dayOfWeek->id;
        $GamesOfDay         =       GameName::where('days_id', '=', $dayOfWeekId)->get();

        $TransToday          =       0;//GameTransaction::whereDate('created_at', Carbon::today())->sum('total_amount');
        $TransWeek           =       0;//GameTransaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('total_amount');
        $TransMonth          =       0;//GameTransaction::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('total_amount');

        $TransTodayCount     =       0;//GameTransaction::whereDate('created_at', Carbon::today())->get();
        $TransWeekCount      =       0;//GameTransaction::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $TransMonthCount     =       0;//GameTransaction::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->get();


        return view('dashboard.index', compact(['Admins', 'Merchants', 'Agents',
            'Games', 'Transactions', 'Winnings',
            'Users', 'GamesOfDay', 'TransToday', 'TransWeek', 'TransMonth',  'TransTodayCount', 'TransWeekCount', 'TransMonthCount']));
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
