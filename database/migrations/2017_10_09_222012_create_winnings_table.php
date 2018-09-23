<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWinningsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('winnings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('winning_no');
            $table->string('machine_no');
            $table->date('winning_date');
            $table->time('winning_time');

            $table->integer('game_names_id')->unsigned();
            $table->foreign('game_names_id')
                ->references('id')
                ->on('game_names');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')
                ->on('users');

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
        Schema::dropIfExists('winnings');
    }
}
