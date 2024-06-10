<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_amenities', function (Blueprint $table) {
            $table->id();
            $table->uuid('fleet_id');
            $table->unsignedInteger('amenity_id');
            $table->timestamps();
          

            $table->foreign('fleet_id')
                    ->references('id')
                    ->on('fleets')
                    ->onDelete('cascade');

            $table->foreign('amenity_id')
                    ->references('id')
                    ->on('amenities')
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
        Schema::dropIfExists('fleet_amenities');
    }
}
