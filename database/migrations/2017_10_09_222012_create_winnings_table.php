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
            $table->string('game_no');
            $table->string('winning_date');
            $table->string('winning_time');

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
