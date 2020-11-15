<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_matches', function (Blueprint $table) {
            $table->id();
            $table->integer('goals');
            $table->foreignId('match_id');
            $table->foreignId('team_id');
            $table->foreign('match_id')
                    ->references('id')
                    ->on('matches')
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
        Schema::dropIfExists('teams_matches');
    }
}
