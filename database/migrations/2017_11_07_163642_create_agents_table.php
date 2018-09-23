<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('ticket_id');
            $table->double('credit_balance');

            // belengs to agent
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');

            // belongs to merchant
            $table->integer('merchants_id')->nullable()->unsigned();
            $table->foreign('merchants_id')->references('id')->on('users');

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
        Schema::dropIfExists('agents');
    }
}
