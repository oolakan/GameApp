<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_names', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');

            $table->integer('days_id')->unsigned();
            $table->foreign('days_id')->references('id')->on('days');

            $table->integer('game_quaters_id')->unsigned();
            $table->foreign('game_quaters_id')->references('id')->on('game_quaters');

            $table->string('start_time');
            $table->string('stop_time');
            $table->string('draw_time');
            $table->integer('game_status');
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
        Schema::dropIfExists('game_names');
    }
}
