<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScientificExplanationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scientific_explanation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('users_id')->unsigned();
            $table->longText('member');
            $table->longText('coordination');
            $table->string('necessity')->nullable();
            $table->longText('target');
            $table->longText('research');
            $table->longText('progress');
            $table->longText('product_science');
            $table->longText('product_educate');
            $table->longText('product_app');
            $table->text('product_diff')->nullable();
            $table->text('effective')->nullable();
            $table->text('method')->nullable();
            $table->longText('labor');
            $table->longText('resources');
            $table->longText('repair');
            $table->longText('costDiff');
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
        Schema::dropIfExists('scientific_explanation');
    }
}
