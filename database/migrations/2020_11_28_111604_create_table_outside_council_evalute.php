<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOutsideCouncilEvalute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outside_council_evalute', function (Blueprint $table) {
            $table->id();
            $table->string('outside_email');
            $table->string('name');
            $table->unsignedBigInteger('id_doc');
            $table->text('curriculum_structure');
            $table->text('suitability');
            $table->text('urgency');
            $table->text('duplication');
            $table->integer('total');
            $table->text('opinion');
            $table->tinyInteger('conclude');
            $table->tinyInteger('classification');
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
        Schema::dropIfExists('outside_council_evalute');
    }
}
