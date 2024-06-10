<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLatLangToJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'from')) {
                Schema::table('journeys', function (Blueprint $table) {
                    $table->string('from')->after('arrived_at');
                });
            }
            if (!Schema::hasColumn('journeys', 'to')) {
                Schema::table('journeys', function (Blueprint $table) {
                    $table->string('to')->after('from');
                });
            }
            if (!Schema::hasColumn('journeys', 'from_lat')) {
                Schema::table('journeys', function (Blueprint $table) {
                $table->double('from_lat', 15, 8)->nullable()->after('to');                
               });
            }
            if (!Schema::hasColumn('journeys', 'from_lng')) {
                Schema::table('journeys', function (Blueprint $table) {
                $table->double('from_lng', 15, 8)->nullable()->after('from_lat');                
               });
            }
            if (!Schema::hasColumn('journeys', 'to_lat')) {
                Schema::table('journeys', function (Blueprint $table) {
                $table->double('to_lat', 15, 8)->nullable()->after('from_lng');                
               });
            }
            if (!Schema::hasColumn('journeys', 'to_lng')) {
                Schema::table('journeys', function (Blueprint $table) {
                $table->double('to_lng', 15, 8)->nullable()->after('to_lat');                
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
