<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTicketNumberToJourneyPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journey_passengers')) {
            if (!Schema::hasColumn('journey_passengers', 'ticket_number')) {
                Schema::table('journey_passengers', function (Blueprint $table) {
                      $table->string('ticket_number')->after('journey_id')->nullable();
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
