<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('goals');
            $table->foreignId('match_id');
            $table->foreignId('player_id');
            $table->foreign('match_id')
                    ->references('id')
                    ->on('matches')
                    ->onDelete('cascade');
            $table->foreign('player_id')
                    ->references('id')
                    ->on('players')
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
        Schema::dropIfExists('personal_statistics');
    }
}
