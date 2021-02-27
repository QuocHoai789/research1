<?php

use Illuminate\Database\Seeder;

class UpdateConfigMail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('config')->insert([
            ['key' => 'mail_mailer' , 'value'=>'smtp'],
            ['key' => 'mail_host' , 'value'=>'smtp.gmail.com'],
            ['key' => 'mail_port' , 'value'=>'587'],
            ['key' => 'mail_encryption' , 'value'=>'tls'],
        ]);
    }
}
