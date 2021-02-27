<?php

use Illuminate\Database\Seeder;
class classConfigTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            ['key' => 'user_name_gmail' , 'value'=>'minhtruyen.ut@gmail.com'],
            ['key' => 'password_gmail' , 'value'=>'iqtrwellkrotruvm'],
            ['key' => 'basic_salary' , 'value'=>'1600000'],
        ]);
    }
}
