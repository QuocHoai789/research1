<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAcceptanceDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptance_doc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_doc');
            $table->unsignedBigInteger('id_user_acceptance');
            $table->integer('accuracy');
            $table->integer('suitability');
            $table->integer('response_level');
            $table->integer('exercise_quality');
            $table->integer('logic');
            $table->integer('image_quality');
            $table->integer('master_quality');
            $table->integer('references');
            $table->integer('total');
            $table->text('opinion');
            $table->text('conclude');
            $table->string('position_council');
            $table->tinyInteger('status')->default(0);
            $table->foreign('id_doc')->references('id')->on('documents')->onDelete('cascade');
             $table->foreign('id_user_acceptance')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('acceptance_doc');
    }
}
