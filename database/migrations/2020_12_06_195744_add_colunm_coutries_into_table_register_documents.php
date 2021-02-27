<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColunmCoutriesIntoTableRegisterDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_documents', function (Blueprint $table) {
            $table->text('national')->after('study_document_id')->nullable();
            $table->text('recognition')->after('national')->nullable();
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_documents', function (Blueprint $table) {
            $table->dropColumn('national')->after('study_document_id');
            $table->dropColumn('recognition')->after('national');
        });
    }
}
