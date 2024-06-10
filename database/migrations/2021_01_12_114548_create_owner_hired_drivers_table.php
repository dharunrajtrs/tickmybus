<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnerHiredDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owner_hired_drivers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('owner_id');
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
        Schema::dropIfExists('owner_hired_drivers');
    }
}
