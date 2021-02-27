<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditScientificProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('scientific_profile', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('count_diploma');
            $table->dropColumn('construction');
            $table->string('position')->nullable();
            $table->longText('language_level');
            $table->longText('areas_of_expertise');
            $table->longText('student_awards')->nullable();
            $table->longText('license')->nullable();
            $table->longText('solution')->nullable();
            $table->longText('application')->nullable();
            $table->longText('show')->nullable();
            $table->longText('seminor_show')->nullable();
            $table->longText('work_university')->nullable();
            $table->longText('experience')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('scientific_profile', function (Blueprint $table) {
            $table->string('address');
            $table->string('count_diploma');
            $table->string('construction');
            $table->dropColumn('position');
            $table->dropColumn('language_level');
            $table->dropColumn('areas_of_expertise');
            $table->dropColumn('student_awards');
            $table->dropColumn('license');
            $table->dropColumn('solution');
            $table->dropColumn('application');
            $table->dropColumn('show');
            $table->dropColumn('seminor_show');
            $table->dropColumn('work_university');
            $table->dropColumn('experience');
        });
    }
}
