<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->integer('league_id')->primary();
            $table->string('name');
            $table->integer('tier');
            $table->string('region');
            $table->dateTime('most_recent_activity');
            $table->string('total_prize_pool');
            $table->dateTime('start_timestamp');
            $table->dateTime('end_timestamp');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leagues');
    }
}
