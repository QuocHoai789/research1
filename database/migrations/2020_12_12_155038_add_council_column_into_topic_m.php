<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouncilColumnIntoTopicM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_topic', function (Blueprint $table) {
             $table->text('council')->after('id_user_approval')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_topic', function (Blueprint $table) {
            $table->dropColumn('council')->after('id_user_approval');
        });
    }
}
