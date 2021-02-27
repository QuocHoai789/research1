<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic_m', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('register_id');
            $table->unsignedBigInteger('users_id');
            $table->integer('status')->default(1);
            $table->integer('close')->default(0);
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('register_id')->references('id')->on('register_topic')->onDelete('cascade');
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
        Schema::dropIfExists('topic_m');
    }
}
