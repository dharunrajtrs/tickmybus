<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->uuid('owner_id');
            $table->uuid('service_location_id');
            $table->string('name');
            $table->string('mobile');
            $table->string('email', 150);
            $table->string('address', 500)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('city', 50)->nullable();
           
            $table->string('postal_code')->nullable();
            $table->enum('gender', ['male','female','others']);
            $table->timestamp('last_trip_date')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('approve')->default(false);
            $table->boolean('available')->default(false);
            $table->timestamps();
            $table->softDeletes();


           $table->foreign('owner_id')
                    ->references('id')
                    ->on('owners')
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
        Schema::dropIfExists('drivers');
    }
}
