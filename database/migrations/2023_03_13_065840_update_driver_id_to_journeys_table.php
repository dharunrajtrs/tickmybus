<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDriverIdToJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'driver_id')) {
                Schema::table('journeys', function (Blueprint $table) {
                   $table->unsignedInteger('driver_id')->after('fleet_id')->nullable();
                    
                   $table->foreign('driver_id')
                            ->references('id')
                            ->on('drivers')
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
        Schema::table('journeys', function (Blueprint $table) {
            //
        });
    }
}
