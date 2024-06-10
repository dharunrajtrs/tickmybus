<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('hero_bg' ,255)->nullable();
            $table->longtext('phone')->nullable();
            $table->longtext('address')->nullable();
            $table->longtext('email')->nullable();
            $table->string('form_title')->nullable();
            $table->string('form_name')->nullable();
            $table->string('form_email')->nullable();
            $table->string('form_subject')->nullable();
            $table->string('form_btn')->nullable();
            $table->string('form_img' ,255)->nullable();   
            $table->string('map')->nullable();   
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
        Schema::dropIfExists('web_contacts');
    }
}
