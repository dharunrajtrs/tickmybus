<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestStopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rest_stops', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('rest_stop_address');
            $table->double('rest_lat', 15, 8)->nullable();
            $table->double('rest_lng', 15, 8)->nullable();
            $table->string('landmark');
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
        Schema::dropIfExists('rest_stops');
    }
}
