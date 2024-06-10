<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('owner_id');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('license_number');
            $table->string('permission_number');
            $table->integer('left_columns')->nullable();
            $table->integer('right_columns')->nullable();
            $table->integer('left_rows')->nullable();
            $table->integer('right_rows')->nullable();
            $table->integer('total_back_seats')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('approve')->default(false);
            $table->text('reason')->nullable();
            $table->string('seat_type')->nullable();
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('fleets');
    }
}
