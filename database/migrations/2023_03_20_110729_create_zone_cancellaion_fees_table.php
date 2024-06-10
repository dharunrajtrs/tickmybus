<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZoneCancellaionFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zone_cancellaion_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hour');
            $table->double('percentage');
            $table->uuid('service_location_id')->nullable();
            $table->timestamps();


            $table->foreign('service_location_id')
            ->references('id')
            ->on('service_locations')
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
        Schema::dropIfExists('zone_cancellaion_fees');
    }
}
