<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boardingpoints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('boarding_address');
            $table->double('boarding_lat', 15, 8)->nullable();
            $table->double('boarding_lng', 15, 8)->nullable();
            $table->uuid('service_location_id')->nullable();
            $table->timestamps();

            $table->foreign('service_location_id')
                    ->references('id')
                    ->on('service_locations')
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
        Schema::dropIfExists('boardingpoints');
    }
}
