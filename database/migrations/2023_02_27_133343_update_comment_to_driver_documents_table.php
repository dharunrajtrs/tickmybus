<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCommentToDriverDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('driver_documents')) {
            if (!Schema::hasColumn('driver_documents', 'comment')) {
                Schema::table('driver_documents', function (Blueprint $table) {
                    $table->text('comment')->nullable()->after('document_status');
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
        Schema::table('driver_documents', function (Blueprint $table) {
            //
        });
    }
}
