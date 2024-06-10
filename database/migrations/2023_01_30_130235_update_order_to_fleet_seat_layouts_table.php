<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrderToFleetSeatLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      if (Schema::hasTable('fleet_seat_layouts')) {
            if (!Schema::hasColumn('fleet_seat_layouts', 'order')) {
                Schema::table('fleet_seat_layouts', function (Blueprint $table) {
           
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
        Schema::table('fleet_seat_layouts', function (Blueprint $table) {
            //
        });
    }
}
