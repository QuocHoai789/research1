<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAcceptanceTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acceptance_topic', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('id_topic');
            $table->unsignedBigInteger('id_user_acceptance');
            $table->integer('target');
            $table->integer('content');
            $table->integer('approach');
            $table->integer('product_application');
            $table->integer('scientific_products');
            $table->integer('training_products');
            $table->integer('scientific_value');
            $table->integer('application_value');
            $table->integer('about_education_and_training');
            $table->integer('socio_economic');
            $table->integer('transfer_method');
            $table->integer('student_training');
            $table->integer('scientific_article');
            $table->integer('report_quality');
            $table->integer('total');
            $table->integer('classification');
            $table->text('opinion');
            $table->string('position_council');
            $table->tinyInteger('status')->default(0);
            $table->foreign('id_topic')->references('id')->on('topic_m')->onDelete('cascade');
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
        Schema::dropIfExists('acceptance_topic');
    }
}
