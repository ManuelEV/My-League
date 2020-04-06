<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('away_team_id')->unsigned();
            $table->integer('home_team_id')->unsigned();
            $table->integer('away_team_score');
            $table->integer('home_team_score');
            $table->date('date');
            $table->foreign('away_team_id')->references('id')->on('teams');
            $table->foreign('home_team_id')->references('id')->on('teams');
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
        Schema::dropIfExists('matches');
    }
}
