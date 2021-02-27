<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimeInregisterDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_documents', function (Blueprint $table) {
            $table->text('time_process')->after('study_document_id');
            $table->tinyInteger('objects_of_use')->after('time_process');
            $table->integer('page_numbers')->after('objects_of_use');
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
            $table->dropColumn('time_process')->after('study_document_id');
            $table->dropColumn('objects_of_use')->after('time_process');
            $table->dropColumn('page_numbers')->after('objects_of_use');
        });
    }
}
