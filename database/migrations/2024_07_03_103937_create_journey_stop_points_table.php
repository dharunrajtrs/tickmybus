<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyStopPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_stop_points', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('journey_id');
            $table->uuid('stop_id');
            $table->time('stop_time');
            $table->timestamps();

            $table->foreign('stop_id')
                    ->references('id')
                    ->on('boarding_droping_point')
                    ->onDelete('cascade');

            $table->foreign('journey_id')
                    ->references('id')
                    ->on('journeys')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journey_stop_points');
    }
}
