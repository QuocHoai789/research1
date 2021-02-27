<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEvaluateTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discuss_topic', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_topic');
            $table->unsignedBigInteger('id_user_discuss');
            $table->text('overview');
            $table->text('urgency');
            $table->text('target');
            $table->text('approach');
            $table->text('content_and_process');
            $table->text('product_of_topic');
            $table->text('product_outstanding_of_topic');
            $table->text('effective');
            $table->text('study_experience');
            $table->text('rationality');
            $table->string('another_opinion');
            $table->string('conclude');
            $table->tinyInteger('ability_to_perform');
            $table->tinyInteger('expense');
            $table->integer('value_expense')->default(0);
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('id_topic')->references('id')->on('topic_m')->onDelete('cascade');
            $table->foreign('id_user_discuss')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluate_topic');
    }
}
