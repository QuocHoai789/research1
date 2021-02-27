<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_profile', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->string('name');
            $table->tinyInteger('gender');
            $table->string('birthplace');
            $table->date('birthday');
            $table->longText('academic');
            $table->longText('degree');
            $table->string('address');
            $table->longText('contact');
            $table->longText('work_place');
            $table->longText('edu_process');
            $table->longText('working_process');
            $table->longText('document');
            $table->longText('article');
            $table->longText('topic_science');
            $table->longText('guide_student');
            $table->longText('count_diploma');
            $table->longText('construction');
            $table->longText('prize');
            $table->integer('status')->default(0);
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('scientific_profile');
    }
}
