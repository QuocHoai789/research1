<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRegisterDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_documents', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user_approval');
            $table->longText('preface');
            $table->longText('table_of_contents');
            $table->longText('table_of_symbols');
            $table->longText('table_abbreviation');
            $table->longText('chapters');
            $table->longText('answer');
            $table->longText('references');
            $table->longText('appendix');
            $table->longText('glossary_of_terminology');
            $table->longText('key_works');
            $table->longText('level_of_difference');
            $table->text('message_of_user_approval')->nullable();
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
        Schema::dropIfExists('register_documents');
    }
}
