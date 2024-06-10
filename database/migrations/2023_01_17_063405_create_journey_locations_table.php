<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_locations', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->uuid('journey_id');
            $table->enum('location_type', ['boarding','drop','rest_stop'])->nullable();
            $table->uuid('boarding_id')->nullable(); 
            $table->uuid('rest_stop_id')->nullable();
            $table->timestamps();

            $table->foreign('boarding_id')
                    ->references('id')
                    ->on('boardingpoints')
                    ->onDelete('cascade');
           
            $table->foreign('rest_stop_id')
                    ->references('id')
                    ->on('rest_stops')
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
        Schema::dropIfExists('journey_locations');
    }
}
