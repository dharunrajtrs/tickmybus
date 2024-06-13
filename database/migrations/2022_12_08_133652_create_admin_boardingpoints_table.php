<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardingpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adminboardingpoints', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('boarding_address');
            $table->string('short_code')->nullable();
            $table->uuid('owner_id')->nullable();
            $table->double('boarding_lat', 15, 8)->nullable();
            $table->double('boarding_lng', 15, 8)->nullable();
            $table->timestamps();


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
        Schema::dropIfExists('boardingpoints');
    }
}
