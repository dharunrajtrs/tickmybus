<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNoOfSeatsToJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'no_of_seats')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->integer('no_of_seats')->after('user_id')->nullable();
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
