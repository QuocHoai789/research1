<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCouncilGreedIntoRegisterDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('register_documents', function (Blueprint $table) {
            $table->text('greed_council')->after('council')->nullable();
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
            $table->dropColumn('greed_council')->after('council');
        });
    }
}
