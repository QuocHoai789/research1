<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudyDocumentIdInRegisterDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_documents', function (Blueprint $table) {
            $table->unsignedBigInteger('study_document_id')->after('id_user_approval');
            $table->foreign('study_document_id')->references('id')->on('study_documents')->onDelete('cascade');
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
            $table->dropColumn('study_document_id')->after('id_user_approval');
        });
    }
}
