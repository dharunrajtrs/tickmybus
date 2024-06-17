<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBusTypeToCommanFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('comman_fleets')) {
            if (!Schema::hasColumn('comman_fleets', 'bus_type')) {
                Schema::table('comman_fleets', function (Blueprint $table) {
                      $table->string('bus_type')->after('total_seats')->nullable();
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
        Schema::table('comman_fleets', function (Blueprint $table) {
            //
        });
    }
}
