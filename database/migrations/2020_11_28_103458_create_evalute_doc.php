<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluteDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evalute_doc', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_doc');
            $table->unsignedBigInteger('id_user_evalute');
            $table->integer('curriculum_structure');
            $table->integer('suitability');
            $table->integer('urgency');
            $table->integer('duplication');
            $table->integer('total');
            $table->text('opinion');
            $table->tinyInteger('conclude');
            $table->tinyInteger('classification');
            $table->string('position_council');
            $table->tinyInteger('status')->default(0);
             $table->foreign('id_doc')->references('id')->on('documents')->onDelete('cascade');
             $table->foreign('id_user_evalute')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('evalute_doc');
    }
}
