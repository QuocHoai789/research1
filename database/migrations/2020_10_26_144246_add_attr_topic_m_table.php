<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttrTopicMTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->bigInteger('scientific_explanation_id')->unsigned()->nullable()->after('users_id');
            $table->bigInteger('scientific_extension_id')->unsigned()->nullable()->after('users_id');
            $table->bigInteger('scientific_deploy_report_id')->unsigned()->nullable()->after('users_id');
            $table->bigInteger('scientific_cancel_id')->unsigned()->nullable()->after('users_id');
            $table->foreign('scientific_explanation_id')->references('id')->on('scientific_explanation')->onDelete('cascade');
            $table->foreign('scientific_extension_id')->references('id')->on('scientific_extension')->onDelete('cascade');
            $table->foreign('scientific_deploy_report_id')->references('id')->on('scientific_deploy_report')->onDelete('cascade');
            $table->foreign('scientific_cancel_id')->references('id')->on('scientific_cancel')->onDelete('cascade');
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
            $table->dropColumn('scientific_explanation_id');
            $table->dropColumn('scientific_extension_id');
            $table->dropColumn('scientific_deploy_report_id');
            $table->dropColumn('scientific_cancel_id');
        });
    }
}
