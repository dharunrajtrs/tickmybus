<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePromoCodeIdJourneyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'is_promo')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->boolean('is_promo')->default(0)->after('is_refunded');
                });
            }

        }   
        if (Schema::hasTable('journey_users')) {
            if (!Schema::hasColumn('journey_users', 'promo_code_id')) {
                Schema::table('journey_users', function (Blueprint $table) {
                    $table->uuid('promo_code_id')->after('is_promo')->nullable();

                    $table->foreign('promo_code_id')
                    ->references('id')
                    ->on('promo')
                    ->onDelete('cascade');
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
        //
    }
}
