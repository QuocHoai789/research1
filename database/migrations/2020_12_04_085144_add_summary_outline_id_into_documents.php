<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSummaryOutlineIdIntoDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->bigInteger('summary_outline_id')->after('document_extension_id')->unsigned()->nullable();
            $table->foreign('summary_outline_id')->references('id')->on('summary_outline')->onDelete('cascade');
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
             $table->dropForeign(['summary_outline_id'])->after('document_extension_id');
             $table->dropColumn('summary_outline_id')->after('document_extension_id');
        });
    }
}
