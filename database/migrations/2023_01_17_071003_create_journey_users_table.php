<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('journey_id');
            $table->unsignedInteger('user_id');
            $table->boolean('is_cancelled')->default(0);
            $table->timestamp('cancelled_at')->nullable();
            $table->string('cancelled_by')->nullable();
            $table->boolean('user_rated')->default(0);
            $table->double('rating', 10, 2)->default(0);
            $table->timestamps();
          
            $table->foreign('journey_id')
                ->references('id')
                ->on('journeys')
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
        Schema::dropIfExists('journey_users');
    }
}
