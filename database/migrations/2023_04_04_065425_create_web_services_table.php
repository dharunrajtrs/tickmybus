<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_services', function (Blueprint $table) {
            $table->id();
            $table->string('hero_bg' ,255)->nullable();
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
            $table->string('amenity_title')->nullable();
            $table->string('amenity_heading')->nullable();
            $table->longtext('amenity_para')->nullable();
            $table->string('amenity1_title')->nullable();
            $table->longtext('amenity1_para')->nullable();
            $table->string('amenity1_img' ,255)->nullable();
            $table->string('amenity2_title')->nullable();
            $table->longtext('amenity2_para')->nullable();
            $table->string('amenity2_img' ,255)->nullable();
            $table->string('amenity3_title')->nullable();
            $table->longtext('amenity3_para')->nullable();
            $table->string('amenity3_img' ,255)->nullable();
            $table->string('amenity4_title')->nullable();
            $table->longtext('amenity4_para')->nullable();
            $table->string('amenity4_img' ,255)->nullable();
            $table->string('amenity5_title')->nullable();
            $table->longtext('amenity5_para')->nullable();
            $table->string('amenity5_img' ,255)->nullable();
            $table->string('amenity6_title')->nullable();
            $table->longtext('amenity6_para')->nullable();
            $table->string('amenity6_img' ,255)->nullable();
            $table->string('amenity7_title')->nullable();
            $table->longtext('amenity7_para')->nullable();
            $table->string('amenity7_img' ,255)->nullable();
            $table->string('amenity8_title')->nullable();
            $table->longtext('amenity8_para')->nullable();
            $table->string('amenity8_img' ,255)->nullable();
            $table->string('amenity9_title')->nullable();
            $table->longtext('amenity9_para')->nullable();
            $table->string('amenity9_img' ,255)->nullable();
            $table->string('dwnld_heading')->nullable();
            $table->string('dwnld_title')->nullable();
            $table->longtext('dwnld_para')->nullable();
            $table->string('dwnld_title1')->nullable();
            $table->longtext('dwnld_para1')->nullable();
            $table->string('dwnld_playstore')->nullable();
            $table->string('dwnld_appstore')->nullable(); 
            $table->string('dwnld1_playstore')->nullable();
            $table->string('dwnld1_appstore')->nullable();   
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
        Schema::dropIfExists('web_services');
    }
}
