<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommanSeatLayoutNoSeat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('common_fleet_seat_layouts')) {
            if (!Schema::hasColumn('common_fleet_seat_layouts', 'no_seat')) {
                Schema::table('common_fleet_seat_layouts', function (Blueprint $table) {

                     $table->boolean('no_seat')->after('deck_type')->default(false);

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
