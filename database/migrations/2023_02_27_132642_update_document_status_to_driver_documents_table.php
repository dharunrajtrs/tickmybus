<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDocumentStatusToDriverDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('driver_documents')) {
            if (!Schema::hasColumn('driver_documents', 'document_status')) {
                Schema::table('driver_documents', function (Blueprint $table) {
                    $table->integer('document_status')->default(2)->after('expiry_date');
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
