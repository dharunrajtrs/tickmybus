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
            $table->uuid('fleet_id')->nullable();
            $table->uuid('owner_id')->nullable();
            $table->string('position');
            $table->string('seat_no');
            $table->string('seat_layout_name');
            $table->double('that_seat_price',8,2)->default(0)->nullable();
            $table->string('seat_type')->nullable();
            $table->integer('left_columns')->nullable();
            $table->integer('right_columns')->nullable();
            $table->integer('left_rows')->nullable();
            $table->integer('right_rows')->nullable();
            $table->integer('total_back_seats')->nullable();
            $table->string('deck_type')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fleet_id')
                ->references('id')
                ->on('fleets')
                ->onDelete('cascade');
            $table->foreign('owner_id')
                ->references('id')
                ->on('owners')
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
