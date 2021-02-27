<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddListCouncilIntoRegisterDoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_documents', function (Blueprint $table) {
            $table->text('council')->after('message_of_user_approval')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('register_documents', function (Blueprint $table) {
            $table->dropColumn('council')->after('message_of_user_approval');
        });
    }
}
