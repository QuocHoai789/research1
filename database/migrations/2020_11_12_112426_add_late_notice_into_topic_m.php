<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLateNoticeIntoTopicM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->tinyInteger('notice_late')->after('message_user_approval')->nullable();
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
             $table->dropColumn('notice_late')->after('message_user_approval');
        });
    }
}
