<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSummaryAcceptance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_acceptance', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_doc')->unsigned();
            $table->text('greed_council')->nullable();
            $table->text('score')->nullable();
            $table->text('total')->nullable();
            $table->text('conclude')->nullable();
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
        Schema::dropIfExists('summary_acceptance');
    }
}
