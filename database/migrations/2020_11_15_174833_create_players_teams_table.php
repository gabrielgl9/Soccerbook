<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_teams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id');
            $table->foreignId('team_id');
            $table->foreign('player_id')
                    ->references('id')
                    ->on('players')
                    ->onDelete('cascade');
            $table->foreign('team_id')
                    ->references('id')
                    ->on('teams')
                    ->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('players_teams');
    }
}
