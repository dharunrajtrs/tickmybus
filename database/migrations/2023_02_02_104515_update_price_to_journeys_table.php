<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePriceToJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'upper_seater_price')) {
                Schema::table('journeys', function (Blueprint $table) {
                     $table->double('upper_seater_price',8,2)->after('seater_price')->default(0)->nullable();     
                });
            }

        }
        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'upper_sleeper_price')) {
                Schema::table('journeys', function (Blueprint $table) {
                     $table->double('upper_sleeper_price',8,2)->after('sleeper_price')->default(0)->nullable();   
                });
            }

        }
        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'upper_semi_sleeper_price')) {
                Schema::table('journeys', function (Blueprint $table) {
                     $table->double('upper_semi_sleeper_price',8,2)->after('semi_sleeper_price')->default(0)->nullable();       
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
