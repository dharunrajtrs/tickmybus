<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingDropingPoint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boarding_droping_point', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('boarding_id');
            $table->time('boarding_time');
            $table->timestamps();

            $table->foreign('boarding_id')
                    ->references('id')
                    ->on('boardingpoints')
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
        Schema::dropIfExists('boarding_droping_point');
    }
}
