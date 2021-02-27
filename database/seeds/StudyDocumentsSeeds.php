<?php

use Illuminate\Database\Seeder;

class StudyDocumentsSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('study_documents')->insert([
        	['term_id' => '122003' ,'name_term'=>'Lập trình hướng đối tượng','number_of_credits'=> 3,'number_of_lessons'=>60],
        	['term_id' => '125000' ,'name_term'=>'Kiến trúc máy tính','number_of_credits'=> 3,'number_of_lessons'=>60],
        	['term_id' => '124002' ,'name_term'=>'Cấu trúc dữ liệu và giải thuật','number_of_credits'=> 3,'number_of_lessons'=>60],
        	['term_id' => '005004' ,'name_term'=>'Pháp luật đại cương','number_of_credits'=> 2,'number_of_lessons'=>45],

        	['term_id' => '005002' ,'name_term'=>'Tư tưởng Hồ Chí Minh','number_of_credits'=> 2,'number_of_lessons'=>45],

        	['term_id' => '125001' ,'name_term'=>'Hệ điều hành','number_of_credits'=> 3,'number_of_lessons'=>60],
        	['term_id' => "124003" ,'name_term'=>'Phân tích thiết kế giải thuật','number_of_credits'=> 3,'number_of_lessons'=>60],
        	['term_id' => '124005' ,'name_term'=>'Luật công nghệ thông tin','number_of_credits'=> 2,'number_of_lessons'=>45],
        	['term_id' => '124007' ,'name_term'=>'Chuyên đề CNTT trong GTVT','number_of_credits'=> 3,'number_of_lessons'=>60],
        ]);
    }
}
