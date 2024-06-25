<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journeys', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('journey_number');
            $table->uuid('fleet_id')->nullable();
            $table->boolean('is_completed')->default(0);
            $table->string('schedule_name')->nullable();
            $table->string('display_name')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->boolean('is_trip_start')->default(0);
            $table->timestamp('started_at')->nullable();
            $table->timestamp('depature_at')->nullable();
            $table->timestamp('arrived_at')->nullable();
            $table->double('seater_price',8,2)->default(0)->nullable();
            $table->double('sleeper_price',8,2)->default(0)->nullable();
            $table->double('semi_sleeper_price',8,2)->default(0)->nullable();
            $table->timestamps();

            $table->foreign('fleet_id')
                ->references('id')
                ->on('fleets')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('journeys');
    }
}
