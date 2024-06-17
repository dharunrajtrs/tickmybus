<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTotalSeatsToCommanFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          if (Schema::hasTable('comman_fleets')) {
            if (!Schema::hasColumn('comman_fleets', 'total_seats')) {
                Schema::table('comman_fleets', function (Blueprint $table) {

                     $table->integer('total_seats')->after('total_back_seats')->nullable();

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
