<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2ColumnIntoTopicM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->tinyInteger('notice_acceptance')->after('notice_late')->nullable();
            // $table->longText('liquidation')->after('notice_acceptance')->nullable();
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
            $table->dropColumn('notice_acceptance');
            $table->dropColumn('liquidation');
        });
    }
}
