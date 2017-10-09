<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTypeOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_type_options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('game_status');
            $table->integer('game_types_id');
            $table->foreign('game_types_id')
                ->references('id')
                ->on('game_types');
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
        Schema::dropIfExists('game_type_options');
    }
}
