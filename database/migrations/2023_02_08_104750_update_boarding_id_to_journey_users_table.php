<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBoardingIdToJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'boarding_id')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->uuid('boarding_id')->after('no_of_seats')->nullable();
                    $table->uuid('drop_id')->after('boarding_id')->nullable();
                
                    $table->foreign('boarding_id')
                        ->references('id')
                        ->on('boardingpoints')
                        ->onDelete('cascade');   

                    $table->foreign('drop_id')
                        ->references('id')
                        ->on('boardingpoints')
                        ->onDelete('cascade');   

                });
            }

        }


        // Schema::table('journey_users', function (Blueprint $table) {

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journey_users', function (Blueprint $table) {
            //
        });
    }
}
