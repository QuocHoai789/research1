<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_topic', function (Blueprint $table) {
            $table->id();
            $table->longText('research_type')->nullable();
            $table->text('importance');
            $table->text('target');
            $table->text('content_topic');
            $table->integer('magazine_internation')->default(0);
            $table->integer('magazine_domestic')->default(0);
            $table->integer('publish')->default(0);
            $table->integer('specialized')->default(0);
            $table->integer('master')->default(0);
            $table->integer('doctor')->default(0);
            $table->text('application')->nullable();
            $table->text('application_diff')->nullable();
            $table->text('effective');
            $table->integer('time');
            $table->double('expense');
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
        Schema::dropIfExists('register_topic');
    }
}
