<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'is_completed')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->boolean('is_completed')->default(0)->after('ticket_fare');
                });
            }

        }   
        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'is_refunded')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->boolean('is_refunded')->default(0)->after('is_completed');
                });
            }

        }   
        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'cancellation_fee')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->double('cancellation_fee', 10, 2)->default(0)->after('is_completed');
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
        //
    }
}
