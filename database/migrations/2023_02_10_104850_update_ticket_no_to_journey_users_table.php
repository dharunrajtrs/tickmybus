<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTicketNoToJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'ticket_number')) {
                Schema::table('journey_users', function (Blueprint $table) {
                      $table->string('ticket_number')->after('user_id');
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
