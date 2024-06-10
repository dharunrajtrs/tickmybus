<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJourneyBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('journey_bills', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('journey_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->double('cancellation_fee', 10, 2)->default(0);
            $table->double('service_tax', 10, 2)->default(0);
            $table->integer('service_tax_percentage')->default(0);
            $table->double('promo_discount', 10, 2)->default(0);
            $table->double('admin_commision_from_user', 10, 2)->default(0);
            $table->double('admin_commision_from_company', 10, 2)->default(0);
            $table->double('company_ticket_amount', 10, 2)->default(0);
            $table->double('total_admin_commision', 10, 2)->default(0);
            $table->string('requested_currency_symbol')->nullable();
            $table->string('requested_currency_code');
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
        Schema::dropIfExists('journey_bills');
    }
}
