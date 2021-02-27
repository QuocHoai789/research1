<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdSummaryAccIntoTopic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->bigInteger('sumary_acc_id')->unsigned()->nullable();
            $table->foreign('sumary_acc_id')->references('id')->on('summary_acceptance_topic')->onDelete('cascade');
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
            $table->dropForeign(['sumary_acc_id']);
            $table->dropColumn('sumary_acc_id');
        });
    }
}
