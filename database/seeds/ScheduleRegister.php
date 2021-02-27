<?php

use Illuminate\Database\Seeder;

class ScheduleRegister extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            ['key' => 'status_register_topic'     , 'value'   => 0],
            ['key' => 'status_register_doc'       , 'value'   => 0],
            ['key' => 'date_start_register_topic' , 'value'   => ''],
            ['key' => 'date_end_register_topic'   , 'value'   => ''],
            ['key' => 'date_start_register_doc'   , 'value'   => ''],
            ['key' => 'date_end_register_doc'     , 'value'   => ''],
        ]);
    }
}
