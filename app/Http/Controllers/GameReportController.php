<?php

namespace App\Http\Controllers;

use App\GameTransaction;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Credit;
use App\Game;
use App\GameName;
use App\GameQuater;

use App\GameType;
use App\GameTypeOption;
use App\Role;
use App\User;
use App\Winning;
use Maatwebsite\Excel\Excel;

class GameReportController extends Controller
{
    private $pdf;
    private $excel;
    private $Transactions;
    private $TotalAmount;
    private $from;
    private $to;

    private $start_time = '00:00:00';
    private $stop_time = '23:59:59';
    public function __construct(PDF $pdf, Excel $excel)
    {
        $this->pdf = $pdf;
        $this->excel = $excel;
    }

    /**/
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
            return view('game.game_report.index', compact([
                'Admins', 'Merchants', 'Agents',
                'Games', 'GameNames', 'GameTypes', 'Winnings',
                'GameQuaters', 'GameTypeOptions', 'Users']));
        } catch (\ErrorException $ex) {
            $ex->getMessage();
        }
    }

    public function report(Request $request)
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
            $rules = [
                'report_date' => 'required',
            ];
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return back()
                    ->withInput()
                    ->withErrors($validator);
            }

            $date = str_replace(" ", "", $request->report_date);
            $dateRange = explode('-', $date);
            list($from, $to) = $dateRange;
            $dateFrom = explode('/', $from);
            $dateTo = explode('/', $to);

            list($fm, $fd, $fy) = $dateFrom;
            list($tm, $td, $ty) = $dateTo;

            $dFrom = $fy . '-' . $fm . '-' . $fd;
            $dTo = $ty . '-' . $tm . '-' . $td;

            $Transactions = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'user'])
                ->whereBetween('date_played', array($dFrom, $dTo))
//                ->leftJoin('users', 'game_transactions.users_id', '=', 'users.id')
//                ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
                ->get();

           // dd($Transactions);

            $TotalAmount = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'user'])
                ->whereBetween('date_played', array($dFrom, $dTo))
//                ->leftJoin('users', 'game_transactions.users_id', '=', 'users.id')
//                ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
                ->sum('total_amount');

            $TotalAmount = number_format($TotalAmount, '2', '.', ',');

            return view('game.game_report.view', compact(['Transactions', 'TotalAmount',
                'Admins', 'Merchants', 'Agents',
                'Games', 'GameNames', 'GameTypes', 'Winnings',
                'GameQuaters', 'GameTypeOptions', 'Users', 'dFrom', 'dTo']));
        } catch (\ErrorException $ex) {

        }
    }

    /**
     * @param $from
     * @param $to
     * @return \Illuminate\Http\Response
     * generate pdf report
     */
    public function generatePdf($from, $to)
    {
        $Transactions = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'user'])
            ->whereBetween('date_played', array($from, $to))
//                ->leftJoin('users', 'game_transactions.users_id', '=', 'users.id')
//                ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
            ->get();

        // dd($Transactions);

        $TotalAmount = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'user'])
            ->whereBetween('date_played', array($from, $to))
//                ->leftJoin('users', 'game_transactions.users_id', '=', 'users.id')
//                ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
            ->sum('total_amount');
        $TotalAmount = number_format($TotalAmount, '2', '.', ',');

        $pdf = $this->pdf->loadView('game.game_report.report', [
            'Transactions' => $Transactions,
            'TotalAmount' => $TotalAmount,
            'dateFrom' => $from,
            'dateTo' => $to
        ]);
        return $pdf->download('report' . $from . $to . '.pdf');
    }

    /**
     * @param $from
     * @param $to
     * generate Excel report
     */
    public function generateExcel($from, $to)
    {
        $this->from = $from;
        $this->to = $to;
//        $this->Transactions = GameTransaction::with(['game_name', 'game_type', 'game_type_option'])
//            ->whereBetween('date_played', array($from, $to))
//            ->leftJoin('agents', 'game_transactions.users_id', '=', 'agents.users_id')
//            ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
//            ->get();
//
//        $this->TotalAmount = GameTransaction::with(['game_name', 'game_type', 'game_type_option'])
//            ->whereBetween('date_played', array($from, $to))
//            ->leftJoin('agents', 'game_transactions.users_id', '=', 'agents.users_id')
//            ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
//            ->sum('total_amount');

        $this->Transactions = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'user'])
            ->whereBetween('date_played', array($from, $to))
//                ->leftJoin('users', 'game_transactions.users_id', '=', 'users.id')
//                ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
            ->get();

        // dd($Transactions);

        $this->TotalAmount = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'user'])
            ->whereBetween('date_played', array($from, $to))
//                ->leftJoin('users', 'game_transactions.users_id', '=', 'users.id')
//                ->leftJoin('users', 'agents.merchants_id', '=', 'users.id')
            ->sum('total_amount');
        $this->TotalAmount = number_format($this->TotalAmount, '2', '.', ',');
        $this->excel->create('Game Transactions Report', function ($excel) {
            // Set the title
            $excel->setTitle('Game Transactions Report');
            // Chain the setters
            $excel->setCreator('LottoStars')
                ->setCompany('LottoStars');
            $excel->sheet('Game Transaction Report', function ($sheet) {
                $sheet->setAutoSize(true);
                $sheet->setAutoFilter();
                $sheet->protect('LottoStars');
                $sheet->loadView('game.game_report.excel', [
                    'Transactions' => $this->Transactions,
                    'TotalAmount' => $this->TotalAmount,
                    'dateFrom' => $this->from,
                    'dateTo' => $this->to
                ]);
            })->download('xlsx');
        });
    }
}