<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAddAttrExtensionCancelDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->bigInteger('document_cancel_id')->unsigned()->nullable();
            $table->bigInteger('document_extension_id')->unsigned()->nullable();
            $table->foreign('document_cancel_id')->references('id')->on('document_cancel')->onDelete('cascade');
            $table->foreign('document_extension_id')->references('id')->on('document_extension')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign('document_cancel_id');
            $table->dropForeign('document_extension_id');
            $table->dropColumn('document_cancel_id');
            $table->dropColumn('document_extension_id');
        });
    }
}
