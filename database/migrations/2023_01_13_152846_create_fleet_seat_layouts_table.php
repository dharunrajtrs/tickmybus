<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetSeatLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_seat_layouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('fleet_id');
            $table->string('position');
            $table->string('seat_no');
            $table->string('seat_type');
            $table->string('deck_type')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('fleet_seat_layouts');
    }
}
