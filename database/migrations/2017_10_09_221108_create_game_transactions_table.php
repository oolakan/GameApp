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
            $table->string('ticket_id');
            $table->string('serial_no');
            $table->string('amount_paid');


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

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')
                ->on('users');

            $table->string('time_played');
            $table->string('payment_option'); //CASH OR CARD
            $table->integer('status'); // 0=>PENDING, 1=>LOOSE, 2=> WON
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
