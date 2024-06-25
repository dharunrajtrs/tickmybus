<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommanSeatLayoutOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('common_fleet_seat_layouts')) {
            if (!Schema::hasColumn('common_fleet_seat_layouts', 'order')) {
                Schema::table('common_fleet_seat_layouts', function (Blueprint $table) {

                     $table->string('order')->after('deck_type')->nullable();

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
