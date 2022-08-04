<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('software_house', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });

        Schema::create('gioco', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titolo');
            $table->integer('anno');
            $table->integer('software_house_id')->unsigned();
            $table->foreign('software_house_id')->references('id')->on('software_house');
            $table->string('cover');
            $table->integer('Playtime');
            $table->integer('Score');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('game_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
