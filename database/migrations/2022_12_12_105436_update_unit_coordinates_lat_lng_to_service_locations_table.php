<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUnitCoordinatesLatLngToServiceLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_locations', function (Blueprint $table) {
            $table->tinyInteger('unit')->after('timezone');
            $table->multiPolygon('coordinates')->after('unit')->nullable();
            $table->string('lat')->after('coordinates')->nullable();
            $table->string('lng')->after('lat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_locations', function (Blueprint $table) {
            //
        });
    }
}

