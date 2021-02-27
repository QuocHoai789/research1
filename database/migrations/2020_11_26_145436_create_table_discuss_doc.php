<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDiscussDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discuss_doc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_doc');
            $table->unsignedBigInteger('id_user_discuss');
            $table->longText('discuss_doc_content');
            $table->tinyInteger('status')->default(0);
            $table->foreign('id_doc')->references('id')->on('documents')->onDelete('cascade');
            $table->foreign('id_user_discuss')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('discuss_doc');
    }
}
