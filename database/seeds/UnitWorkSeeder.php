<?php

use Illuminate\Database\Seeder;

class UnitWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('work_unit')->insert([
            ['unit_name' =>'Khoa Công nghệ thông tin'],
            ['unit_name' =>'Khoa Công trình giao thông'],
            ['unit_name' =>'Khoa Kinh tế vận tải'],
            ['unit_name' =>'Khoa Cơ bản'],
            ['unit_name' =>'Khoa Lý luận chính trị'],
            ['unit_name' =>'Viện Hàng hải'],
            ['unit_name' =>'Viện Cơ khí'],
            ['unit_name' =>'Khoa Điện-ĐTVT'],
            ['unit_name' =>'Bộ môn ngoại ngữ'],
            ['unit_name' =>'Khoa Kỹ thuật xây dựng'],
            ['unit_name' =>'Viện NC môi trường & GT'],
            ['unit_name' =>'Bộ môn GDQP-AN và GDTC'],
            
        ]);
    }
}
