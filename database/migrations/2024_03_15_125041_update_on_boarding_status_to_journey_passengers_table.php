<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOnBoardingStatusToJourneyPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journey_passengers')) {
            if (!Schema::hasColumn('journey_passengers', 'boarding_status')) {
                Schema::table('journey_passengers', function (Blueprint $table) {
                      $table->string('boarding_status')->after('ticket_number')->nullable();
                });
            }

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journey_passengers', function (Blueprint $table) {
            //
        });
    }
}
