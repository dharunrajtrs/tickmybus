<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_abouts', function (Blueprint $table) {
            $table->id();
            $table->string('hero_bg' ,255)->nullable();
            $table->string('about_title')->nullable();
            $table->string('about_us')->nullable();
            $table->longtext('about_para')->nullable();
            $table->string('about_img' ,255)->nullable();
            $table->string('driver_title')->nullable();
            $table->string('driver_heading')->nullable();
            $table->string('driver1')->nullable();
            $table->string('driver1_img' ,255)->nullable();
            $table->string('driver2')->nullable();
            $table->string('driver2_img' ,255)->nullable();
            $table->string('driver3')->nullable();
            $table->string('driver3_img' ,255)->nullable();
            $table->string('driver4')->nullable();
            $table->string('driver4_img' ,255)->nullable();
            $table->string('service_title')->nullable();
            $table->string('service_heading')->nullable();
            $table->string('service1_title')->nullable();
            $table->longtext('service1_para')->nullable();
            $table->string('service1_img' ,255)->nullable();
            $table->string('service2_title')->nullable();
            $table->longtext('service2_para')->nullable();
            $table->string('service2_img' ,255)->nullable();
            $table->string('service3_title')->nullable();
            $table->longtext('service3_para')->nullable();
            $table->string('service3_img' ,255)->nullable();
            $table->string('service4_title')->nullable();
            $table->longtext('service4_para')->nullable();
            $table->string('service4_img' ,255)->nullable();
            $table->string('service_img' ,255)->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_heading')->nullable();
            $table->string('banner_bg' ,255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('web_abouts');
    }
}
