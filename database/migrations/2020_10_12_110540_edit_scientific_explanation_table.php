<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditScientificExplanationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scientific_explanation', function (Blueprint $table) {
            $table->longText('research_level')->after('id');
            $table->longText('research_time')->after('id');
            $table->longText('organization')->after('id');
            $table->longText('topic_manager')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scientific_explanation', function (Blueprint $table) {
           $table->dropColumn('research_level');
           $table->dropColumn('research_time');
           $table->dropColumn('organization');
           $table->dropColumn('topic_manager');
        });
    }
}
