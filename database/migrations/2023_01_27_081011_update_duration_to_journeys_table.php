<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDurationToJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'duration')) {
                Schema::table('journeys', function (Blueprint $table) {
           
             $table->string('duration')->after('to')->nullable();
               
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
