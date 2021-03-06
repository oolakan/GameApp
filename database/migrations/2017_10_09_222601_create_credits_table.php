<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credits', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount');

            $table->integer('funded_by')->unsigned();
            $table->foreign('funded_by')
                ->references('id')
                ->on('users');

            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')
                ->on('users');

            $table->integer('merchants_id')->unsigned();

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
        Schema::dropIfExists('credits');
    }
}
