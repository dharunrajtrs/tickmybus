<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyBoradingPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_borading_points', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('journey_id');
            $table->uuid('boarding_id');
            $table->time('boarding_time');
            $table->timestamps();

            $table->foreign('boarding_id')
                    ->references('id')
                    ->on('boardingpoints')
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
        Schema::dropIfExists('journey_borading_points');
    }
}
