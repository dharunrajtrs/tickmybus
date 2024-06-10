<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdataeFleetIdToDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('drivers')) {
            if (!Schema::hasColumn('drivers', 'fleet_id')) {
                Schema::table('drivers', function (Blueprint $table) {
                    $table->uuid('fleet_id')->after('owner_id')->nullable();
                    
                    $table->foreign('fleet_id')
                    ->references('id')
                    ->on('fleets')
                    ->onDelete('cascade');
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
        Schema::table('drivers', function (Blueprint $table) {
            //
        });
    }
}
