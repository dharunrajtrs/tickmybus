<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIsPaidToJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'is_paid')) {
                Schema::table('journey_users', function (Blueprint $table) {
                      $table->boolean('is_paid')->after('ticket_number');
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
