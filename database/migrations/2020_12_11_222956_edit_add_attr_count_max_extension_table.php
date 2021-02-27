<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAddAttrCountMaxExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('topic_m', function (Blueprint $table) {
            $table->integer('count_extension')->nullable();
        });
        Schema::table('scientific_extension', function (Blueprint $table) {
            $table->integer('times_extension')->nullable();
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
            $table->dropColumn('count_extension');
        });
        Schema::table('scientific_extension', function (Blueprint $table) {
            $table->dropColumn('times_extension');
        });
    }
}
