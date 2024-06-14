<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminBoardingpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_boarding_points', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('boarding_address');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('city_id')->nullable();
            $table->string('short_code')->nullable();
            $table->double('boarding_lat', 15, 8)->nullable();
            $table->double('boarding_lng', 15, 8)->nullable();
            $table->timestamps();


            $table->foreign('city_id')
                    ->references('id')
                    ->on('all_cities')
                    ->onDelete('cascade');

                    $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
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
        Schema::dropIfExists('admin_boarding_points');
    }
}
