<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDropLocationIdToJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'drop_service_location_id')) {
                Schema::table('journeys', function (Blueprint $table) {
                    $table->uuid('drop_service_location_id')->after('id')->nullable();

                    $table->foreign('drop_service_location_id')
                            ->references('id')
                            ->on('service_locations')
                            ->onDelete('cascade');

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
