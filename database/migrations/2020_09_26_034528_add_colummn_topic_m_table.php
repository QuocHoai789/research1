<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColummnTopicMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->string('name_topic')->after('id');
            $table->string('slug_name_topic')->after('name_topic');
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
            $table->dropColumn('name_topic');
            $table->dropColumn('slug_name_topic');
        });
    }
}
