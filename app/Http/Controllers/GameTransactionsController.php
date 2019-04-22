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
use Carbon\Carbon;
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


    private $APPROVED   =   'APPROVED';
    private $WON = 'WON';
    private $LOOSE = 'LOOSE';
    private $status;
    private $message;
    private $Transaction;
    private $result;
    private $match_no_count;
    private $winning_amount;
    private $WINNING_GAME = 'WINNING GAME';
    private $MACHINE_GAME = 'MACHINE GAME';

    /**
     * UserController constructor.
     * @param string $APPROVED
     */
    public function __construct()
    {
        ini_set('memory_limit', '1024M');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function index()
    {
        try {
            $Users              = User::with(['role', 'credit'])->get();
            $Admins             = User::with('role')->where('roles_id', '=', 1)->get();
            $Merchants          = User::with('role')->where('roles_id', '=', 2)->get();
            $Agents             = User::with('role')->where('roles_id', '=', 3)->get();
            $Transactions       = GameTransaction::with(['game_name', 'game_type', 'game_type_option', 'game_quater'])->simplePaginate(1000);
            $Games              = Game::get();
            $GameNames          = GameName::get();
            $GameTypes          = GameType::get();
            $GameTypeOptions    = GameTypeOption::get();
            $GameQuaters        = GameQuater::get();
            $Winnings           = Winning::get();

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


    /**
     * @param $winningNo
     * @param $bankerNo
     * @param $oid
     * @return bool
     * Check if banker number is in winning number
     */
    public function isBankerInWinningNo($winningNo, $bankerNo, $gameNoArr, $oid) {
        $result         =   array_intersect($winningNo, $bankerNo);
        $match_no_count = count($result);
        $gameNoresult   =   array_intersect($winningNo, $gameNoArr);
        $gameNoresultCount = count($gameNoresult);
        if ($gameNoresultCount > 0) {
            if ($oid == 5) {
                if ($match_no_count == 1)
                    return true;
            }//AGAINST 1
            else if ($oid == 6) {
                if ($match_no_count == 2)
                    return true;
            }// AGAINST 2
            else if ($oid == 7) {
                if ($match_no_count == 3)
                    return true;
            }// AGAINST 3
            else if ($oid == 8) {
                if ($match_no_count == 1)
                    return true;
            }// AGAISNT 4
            else if ($oid == 9) {
                //if ($match_no_count == 5)
                    return false;
            }// AGAINST 5
        }
        else {
            return false;
        }
        return false;
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     *
     */
    public function activateOneWinning($id) {
        try{
            $Transaction    =   GameTransaction::find(base64_decode($id));
            $gameNameId     =   $Transaction->game_names_id;
            $gameQuaterId   =   $Transaction->game_quaters_id;
            $datePlayed     =   $Transaction->date_played;
            $gameNoPlayed   =   $Transaction->game_no_played;
            $gameNoArr = explode(',', $gameNoPlayed);

            $bankerNo = $Transaction->banker_no;
            $bankerNoArr = [];
            if (strpos( $bankerNo, ",") !== false) {
                $bankerNoArr = explode(',', $bankerNo);
            }
            else {
                array_push($bankerNoArr, $bankerNo);
            }
            // get winning number
            $Winning = Winning::where('game_names_id', '=', $gameNameId)
                ->where('winning_date', '=', $datePlayed)
                ->first();

            if (!$Winning) {
                $this->status = 402;
                $this->message = 'No winning game has been registered for this game';
                return response(array('status' => $this->status, 'message' => $this->message));
            }
            // explode winning number
           // $winningNumber  = $Transaction->draw_type == $this->WINNING_GAME ? $Winning->winning_no : $Winning->machine_no;

            $winningNumber = $Winning->winning_no;
            $winningNoArr = explode(',', $winningNumber);

            // get match numbers
            $this->Transaction = GameTransaction::with(['game_name', 'game_type', 'game_type_option'])->find($Transaction->id);
            $gameOptionId = $this->Transaction->game_type_options_id;
            $gameTypeId = $this->Transaction->game_types_id;
            $unitStake = $this->Transaction->unit_stake;
            //CHECK IF GAME TYPE IS AGAINST
            // check if banker number is in winning number
            if ($gameTypeId == '2') {
                if ($this->isBankerInWinningNo($winningNoArr, $bankerNoArr,$gameNoArr, $gameOptionId)) {
                    $this->result = array_intersect($winningNoArr, $gameNoArr);
                    $this->match_no_count = count($gameNoArr); /**count($this->result) * count($bankerNoArr);**/
                    $this->Transaction->no_of_matched_figures = $this->match_no_count;
                    $this->winning_amount = $this->winningAmount($this->Transaction->game_types_id, $this->Transaction->game_type_options_id, $this->match_no_count, $unitStake);
                } else {
                    $this->winning_amount = 0;
                }
            } else {
                $this->result = array_intersect($winningNoArr, $gameNoArr);
                $this->match_no_count = count($this->result);
                $this->Transaction->no_of_matched_figures = $this->match_no_count;
                $this->winning_amount = $this->winningAmount($this->Transaction->game_types_id, $this->Transaction->game_type_options_id, $this->match_no_count, $unitStake);
            }
            $this->Transaction->winning_amount = $this->winning_amount;
            if ($this->winning_amount < 1) {
                $this->Transaction->status = $this->LOOSE;
            } else {
                $this->Transaction->status = $this->WON;
            }
            $this->Transaction->save();
            if ($this->Transaction) {
                $this->message = 'Game successfully validated';
                flash()->success($this->message);
                return redirect()->action('GameTransactionsController@index');
            }
            else {

            }
        }
        catch (\ErrorException $e) {
            flash()->error('Error occured');
            return redirect()->action('GameTransactionsController@index');
        }
    }

    public function winningAmount($tid, $oid, $noOfMatchedFigures, $unitStake) {
        $amount = 0.0;

        if ($tid == 1) {
            if ($oid == 1){
                $amount = (($noOfMatchedFigures * ($noOfMatchedFigures - 1)) / 2) * (240 * $unitStake);
                return $amount;
            }//PERM 2
            else if ($oid == 2){
                $amount = (2100 * $unitStake) * ($noOfMatchedFigures) * ($noOfMatchedFigures - 1) * ($noOfMatchedFigures -2)/6;
                return $amount;
            }// PERM 3
            else if ($oid == 3) {
                $amount = (5000 * $unitStake) * ($noOfMatchedFigures) * ($noOfMatchedFigures - 1) * ($noOfMatchedFigures - 2) * ($noOfMatchedFigures - 3)/24;
                return $amount;
            }// PERM 4
            else if ($oid == 4){
                $amount = (40000 * $unitStake) * ($noOfMatchedFigures) * ($noOfMatchedFigures - 1) * ($noOfMatchedFigures - 2) * ($noOfMatchedFigures - 3) * ($noOfMatchedFigures - 4)/120;
                return $amount;
            }// PERM 5
        } // PERM

        else if ($tid == 2) {

            if ($oid == 5) {
                $amount = $noOfMatchedFigures * $unitStake  * 240;
                return $amount;
            } //AGAINST 1

            else if ($oid == 6){
                $amount = $noOfMatchedFigures * $unitStake  * 2100;
                return $amount;
            } // AGAINST 2

            else if ($oid == 7) {
                $amount = $noOfMatchedFigures * $unitStake  * 5000;
                return $amount;
            } // AGAINST 3

            else if ($oid == 8){
                $amount = 4 * 1 * $unitStake * 240;
                return $amount;
            } // 1 AGAISNT ALL

            else if ($oid == 9){
                $amount = 0;
                return $amount;
            } // AGAINST 5

        }// AGAIANST
        else if ($tid == 3) {
            if ($oid == 10){
                $amount = (240 * $unitStake * $noOfMatchedFigures) / $noOfMatchedFigures;
                return $amount;
            }//DIRECT 2

            else if ($oid == 11){
                $amount = (2100 * $unitStake * $noOfMatchedFigures) / $noOfMatchedFigures;
                return $amount;
            }// DIRECT 3

            else if ($oid == 12) {
                $amount = (5000 * $unitStake * $noOfMatchedFigures) / $noOfMatchedFigures;
                return $amount;
            }// DIRECT 4

            else if ($oid == 13){
                $amount = (40000 * $unitStake * $noOfMatchedFigures) / $noOfMatchedFigures;
                return $amount;
            }// DIRECT 5
        }//DIRECT

        return $amount;
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
