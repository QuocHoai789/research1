<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topic', function (Blueprint $table) {
         $table->bigIncrements('id');
         $table->string('name_topic');
         $table->string('name_chairman');
         $table->string('department');
         $table->string('management_unit');
         $table->string('category');
         $table->string('year_register');
         $table->string('instructor');
         $table->string('pdf_file');
         $table->integer('status');
         $table->integer('id_user');
          $table->integer('type');
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
        Schema::dropIfExists('topic');
    }
}
