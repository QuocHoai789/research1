<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutsideCouncilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outside_council_discuss', function (Blueprint $table) {
            $table->id();
            $table->string('outside_email');
            $table->unsignedBigInteger('id_doc');
            $table->longText('discuss_doc_content');
            $table->tinyInteger('status')->default(0);
            $table->foreign('id_doc')->references('id')->on('documents')->onDelete('cascade');
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
        Schema::dropIfExists('outside_council');
    }
}
