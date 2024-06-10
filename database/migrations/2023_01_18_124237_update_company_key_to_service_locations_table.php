<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCompanyKeyToServiceLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

          if (Schema::hasTable('service_locations')) {
            if (!Schema::hasColumn('service_locations', 'company_key')) {
                Schema::table('service_locations', function (Blueprint $table) {
           
             $table->string('company_key')->after('name')->nullable();
               
                });
            }

        }


        // Schema::table('service_locations', function (Blueprint $table) {
        //     //
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_locations', function (Blueprint $table) {
            //
        });
    }
}
