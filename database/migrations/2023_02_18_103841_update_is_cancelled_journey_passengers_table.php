<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIsCancelledJourneyPassengersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journey_passengers')) {
            if (!Schema::hasColumn('journey_passengers', 'is_paid')) {
                Schema::table('journey_passengers', function (Blueprint $table) {
                      $table->boolean('is_cancelled')->default(false)->after('age');
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
