<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCityIdToBoardingpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boardingpoints', function (Blueprint $table) {
            $table->uuid('city_id')->after('boarding_lng')->nullable();

            $table->foreign('city_id')
                    ->references('id')
                    ->on('cities')
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
        Schema::table('boardingpoints', function (Blueprint $table) {
            //
        });
    }
}
