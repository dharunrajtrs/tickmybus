<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetMultiImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleet_multi_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('fleet_id')->nullable();
            $table->string('image_name');    
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
        Schema::dropIfExists('fleet_multi_images');
    }
}
