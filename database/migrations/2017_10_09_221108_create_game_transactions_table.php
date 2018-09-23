<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('game_no_played');
            $table->string('banker_no');
            $table->string('no_of_matched_figures');
            $table->string('ticket_id');
            $table->string('serial_no');
            $table->integer('unit_stake');
            $table->double('total_amount');
            $table->double('winning_amount');

            $table->integer('game_names_id')->unsigned();
            $table->foreign('game_names_id')
                ->references('id')
                ->on('game_names');

            $table->integer('game_types_id')->unsigned();
            $table->foreign('game_types_id')
                ->references('id')
                ->on('game_types');

            $table->integer('game_type_options_id')->unsigned();
            $table->foreign('game_type_options_id')
                ->references('id')
                ->on('game_type_options');

            $table->integer('game_quaters_id')->unsigned();
            $table->foreign('game_quaters_id')
                ->references('id')
                ->on('game_quaters');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')
                ->on('users');

            $table->date('date_played');
            $table->time('time_played');

            $table->string('payment_option'); //CASH OR CARD
            $table->string('status'); // 0=>PENDING, 1=>LOOSE, 2=> WON
            $table->string('draw_type'); //WINNING_GAME OR MACHINE_GAME

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_transactions');
    }
}
