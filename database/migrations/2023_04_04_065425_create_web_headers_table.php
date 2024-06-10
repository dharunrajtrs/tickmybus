<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebHeadersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_headers', function (Blueprint $table) {
            $table->id();
            $table->string('theme_color')->nullable();
            $table->string('logo' ,255)->nullable();
            $table->string('fevicon' ,255)->nullable();
            $table->string('btn_color')->nullable();
            $table->string('heading_color')->nullable();
            $table->string('footer_bg_color')->nullable();
            $table->string('footer_about_title')->nullable();
            $table->longtext('footer_about_para')->nullable();
            $table->string('user_play_link')->nullable();
            $table->string('user_app_link')->nullable();
            $table->string('driver_play_link')->nullable();
            $table->string('driver_app_link')->nullable();
            $table->string('footer_quicklink_privacy')->nullable();   
            $table->string('footer_quicklink_terms')->nullable();   
            $table->string('footer_quicklink_contact')->nullable();   
            $table->longtext('footer_info_para')->nullable();   
            $table->string('footer_info_mobile')->nullable();   
            $table->string('footer_info_email')->nullable();   
            $table->string('footer_copy_rights')->nullable();   
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
        Schema::dropIfExists('web_headers');
    }
}
