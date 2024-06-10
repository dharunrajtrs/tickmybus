<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateIsAvailableToFleetSeatLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('fleet_seat_layouts')) {
            if (!Schema::hasColumn('fleet_seat_layouts', 'is_available')) {
                Schema::table('fleet_seat_layouts', function (Blueprint $table) 
                {
                    $table->boolean('is_available')->default(false)->after('deck_type');
                    $table->boolean('booked_by_female')->default(false)->after('is_available');            
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
        Schema::table('fleet_seat_layouts', function (Blueprint $table) {
            //
        });
    }
}
