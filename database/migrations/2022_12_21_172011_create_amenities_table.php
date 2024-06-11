<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->uuid('owner_id')->nullable();;
            $table->string('icon' ,255)->nullable();
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
        Schema::dropIfExists('amenities');
    }
}
