<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCityIdToJourneys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('journeys', function (Blueprint $table) {
            $table->uuid('service_location_id')->after('id')->nullable();
            $table->uuid('from_city_id')->after('service_location_id')->nullable();
            $table->uuid('to_city_id')->after('from_city_id')->nullable();

            $table->foreign('service_location_id')
                    ->references('id')
                    ->on('service_locations')
                    ->onDelete('cascade');

            $table->foreign('from_city_id')
                    ->references('id')
                    ->on('all_cities')
                    ->onDelete('cascade');

            $table->foreign('to_city_id')
                   ->references('id')
                   ->on('all_cities')
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
        Schema::table('journeys', function (Blueprint $table) {
            //
        });
    }
}
