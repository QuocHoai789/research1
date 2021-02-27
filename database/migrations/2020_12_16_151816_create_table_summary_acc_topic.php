<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSummaryAccTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_acceptance_topic', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_topic')->unsigned();
            $table->text('council')->nullable();
            $table->text('score')->nullable();
            $table->text('total')->nullable();
            $table->text('opinion')->nullable();
            $table->foreign('id_topic')->references('id')->on('topic_m')->onDelete('cascade');
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
        Schema::dropIfExists('summary_acceptance_topic');
    }
}
