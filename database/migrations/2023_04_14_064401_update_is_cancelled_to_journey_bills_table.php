<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIsCancelledToJourneyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journey_bills')) {
            if (!Schema::hasColumn('journey_bills', 'is_cancelled')) {
                Schema::table('journey_bills', function (Blueprint $table) {
                    $table->boolean('is_cancelled')->default(0)->after('cancellation_fee');
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
        Schema::table('journey_bills', function (Blueprint $table) {
            //
        });
    }
}
