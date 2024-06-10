<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTotalSeatsToFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          if (Schema::hasTable('fleets')) {
            if (!Schema::hasColumn('fleets', 'total_seats')) {
                Schema::table('fleets', function (Blueprint $table) {
           
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
        Schema::table('fleets', function (Blueprint $table) {
            //
        });
    }
}
