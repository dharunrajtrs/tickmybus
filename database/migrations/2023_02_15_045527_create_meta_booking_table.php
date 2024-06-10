<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetaBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_booking', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('journey_id');
            $table->unsignedInteger('user_id');
            $table->uuid('seat_id')->nullable();
            $table->timestamps();
                    
            $table->foreign('journey_id')
                    ->references('id')
                    ->on('journeys')
                    ->onDelete('cascade');                    

            $table->foreign('user_id')
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
        Schema::dropIfExists('meta_booking');
    }
}
