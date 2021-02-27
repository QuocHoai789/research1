<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_name' => 'required',
            'falcuty' => 'required',
            'degree' => 'required',
            'national' => 'required',
            // 'recognition.*' => 'required',
            'member' => 'required',
            'work_unit_id' => 'required',
            'name_document' => 'required',
            'type_doc' => 'required',
            'credits' => 'required',
            'lesson' => 'required',
            'page_number' => 'required',
            'subjects' => 'required',
            'objects_of_use' => 'required',
            'day.*' => 'required',
            'preface' => 'required',
            'table_of_contents' => 'required',
            'table_of_symbols' => 'required',
            'table_abbreviation' => 'required',
            'chapters' => 'required',
            'answer' => 'required',
            'references' => 'required',
            'appendix' => 'required',
            'glossary_of_terminology' => 'required',
            'key_works' => 'required',
            'level_of_difference' => 'required',

        ];
    }
    public function messages()
    {
        return [
            
            'credits.required' => 'Không được để trống số tín chỉ môn học',
            'lesson.required' => 'Không được để trống số tiết học',
            'preface.required' =>'Bạn hãy mô tả lời nói đầu',
            'table_of_contents.required' =>'Bạn hãy mô tả phần mục lục',
            'table_of_symbols.required' =>'Bạn hãy mô tả phần bảng ký hiệu',
            'table_abbreviation.required' =>'Bạn hãy mô tả phần bảng viết tắt',
            'answer.required' =>'Bạn hãy mô tả phần đáp án',
            'references.required' =>'Bạn hãy mô tả phần tài liệu tham khảo',
            'glossary_of_terminology.required' =>'Bạn hãy mô tả phần bảng tra cứu thuật ngữ',
            'key_works.required' =>'Bạn hãy mô tả phần từ khóa',
            'appendix.required' =>'Bạn hãy mô tả phần phụ lục',
            'chapters.required' =>'Bạn hãy mô tả phần các chương trình giảng dạy',
        ];
    }
}
