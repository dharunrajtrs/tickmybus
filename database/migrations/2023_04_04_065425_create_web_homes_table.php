<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_homes', function (Blueprint $table) {
            $table->id();
            $table->string('hero_title_1')->nullable();
            $table->string('hero_short_title_1')->nullable();
            $table->string('hero_img1' ,255)->nullable();
            $table->string('hero_title_2')->nullable();
            $table->string('hero_short_title_2')->nullable();
            $table->string('hero_img2' ,255)->nullable();
            $table->string('hero_title_3')->nullable();
            $table->string('hero_short_title_3')->nullable(); 
            $table->string('hero_img3' ,255)->nullable();
            $table->string('hero_booknow')->nullable();
            $table->string('about_title')->nullable();
            $table->string('about_us')->nullable();
            $table->longtext('about_para')->nullable();
            $table->string('about_img' ,255)->nullable();
            $table->string('banner1_title')->nullable();
            $table->string('banner1_heading')->nullable();
            $table->string('banner1_bg' ,255)->nullable();
            $table->string('bus_types_title')->nullable();
            $table->string('bus_types_heading')->nullable();
            $table->string('sleeper1_heading')->nullable();
            $table->string('sleeper1_title')->nullable();
            $table->longtext('sleeper1_para')->nullable();
            $table->string('sleeper1_img' ,255)->nullable();
            $table->string('sleeper2_heading')->nullable();
            $table->string('sleeper2_title')->nullable();
            $table->longtext('sleeper2_para')->nullable();
            $table->string('sleeper2_img' ,255)->nullable();
            $table->string('sleeper3_heading')->nullable();
            $table->string('sleeper3_title')->nullable();
            $table->longtext('sleeper3_para')->nullable();
            $table->string('sleeper3_img' ,255)->nullable();
            $table->string('semi_sleeper1_heading')->nullable();
            $table->string('semi_sleeper1_title')->nullable();
            $table->longtext('semi_sleeper1_para')->nullable();
            $table->string('semi_sleeper1_img' ,255)->nullable();
            $table->string('semi_sleeper2_heading')->nullable();
            $table->string('semi_sleeper2_title')->nullable();
            $table->longtext('semi_sleeper2_para')->nullable();
            $table->string('semi_sleeper2_img' ,255)->nullable();
            $table->string('semi_sleeper3_heading')->nullable();
            $table->string('semi_sleeper3_title')->nullable();
            $table->longtext('semi_sleeper3_para')->nullable();
            $table->string('semi_sleeper3_img' ,255)->nullable();
            $table->string('seater1_heading')->nullable();
            $table->string('seater1_title')->nullable();
            $table->longtext('seater1_para')->nullable();
            $table->string('seater1_img' ,255)->nullable();
            $table->string('seater2_heading')->nullable();
            $table->string('seater2_title')->nullable();
            $table->longtext('seater2_para')->nullable();
            $table->string('seater2_img' ,255)->nullable();
            $table->string('seater3_heading')->nullable();
            $table->string('seater3_title')->nullable();
            $table->longtext('seater3_para')->nullable();
            $table->string('seater3_img' ,255)->nullable();
            $table->string('banner2_title')->nullable();
            $table->string('banner2_btn')->nullable();
            $table->string('banner2_bg' ,255)->nullable();
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
        Schema::dropIfExists('web_homes');
    }
}
