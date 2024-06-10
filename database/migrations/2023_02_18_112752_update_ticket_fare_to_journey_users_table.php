<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTicketFareToJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'ticket_fare')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->double('ticket_fare', 10, 2)->default(0)->after('is_paid');
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
        Schema::table('journey_users', function (Blueprint $table) {
            //
        });
    }
}
