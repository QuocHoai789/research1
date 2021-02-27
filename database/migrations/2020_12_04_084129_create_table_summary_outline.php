<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSummaryOutline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_outline', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_doc')->unsigned();
            $table->text('time');
            $table->text('place');
            $table->text('councils');
            $table->text('population');
            $table->text('opinion');
            $table->text('score');
            $table->integer('total');
            $table->text('conclude');
            $table->text('other_opinion');
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
        Schema::dropIfExists('summary_outline');
    }
}
