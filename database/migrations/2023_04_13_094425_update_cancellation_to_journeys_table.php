<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCancellationToJourneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'is_cancelled')) {
                Schema::table('journeys', function (Blueprint $table) {
                    $table->boolean('is_cancelled')->default(0)->after('completed_at');
                });
            }

        }   
        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'cancelled_at')) {
                Schema::table('journeys', function (Blueprint $table) {
                    $table->timestamp('cancelled_at')->after('is_cancelled')->nullable();
                });
            }

        } 
        if (Schema::hasTable('journeys')) {
            if (!Schema::hasColumn('journeys', 'cancellation_reason')) {
                Schema::table('journeys', function (Blueprint $table) {
                    $table->string('cancellation_reason')->after('cancelled_at')->nullable();
                });
            }

        }  


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('journeys', function (Blueprint $table) {
            //
        });
    }
}
