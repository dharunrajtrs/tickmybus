<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_passengers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('journey_id');
            $table->unsignedInteger('journey_user_id');
            $table->uuid('seat_id');
            $table->string('name');
            $table->enum('gender', ['male','female','others']);
            $table->integer('age');
            $table->timestamps();
                    
            $table->foreign('journey_id')
                    ->references('id')
                    ->on('journeys')
                    ->onDelete('cascade');                    

            $table->foreign('journey_user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');                    

            $table->foreign('seat_id')
                    ->references('id')
                    ->on('fleet_seat_layouts')
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
        Schema::dropIfExists('journey_passengers');
    }
}
