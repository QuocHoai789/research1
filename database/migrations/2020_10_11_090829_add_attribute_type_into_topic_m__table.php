<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttributeTypeIntoTopicMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->integer('type_topic')->after('slug_name_topic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->integer('type_topic')->after('slug_name_topic');
        });
    }
}
