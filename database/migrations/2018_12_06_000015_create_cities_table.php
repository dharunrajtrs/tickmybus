<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('cities', function (Blueprint $table) {
			$table->uuid('id')->primary();
            $table->uuid('owner_id')->nullable();
			// $table->string('slug', 50);
			// $table->string('name', 50);
			// $table->string('alias', 50)->nullable();
			$table->unsignedInteger('display_order')->nullable();
			$table->boolean('active')->default(true);
			$table->uuid('state_id')->index();
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
	public function down() {
		Schema::dropIfExists('cities');

	}
}
