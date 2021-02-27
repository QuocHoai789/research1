<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScientificProfileRequest extends FormRequest
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
            'name' => 'bail|required',
            'birthplace' => 'bail|required',
            'birthday' => 'bail|required',
            'degree.*' => 'bail|required',
            'contact.*'=>'bail|required',
            'contact.phoneNumber'=>'bail|numeric',
            'contact.email'=>'bail|email',
            'workPlace.*'=>'bail|required',
            'workPlace.phoneNumber'=>'bail|numeric',
            'document.*.*'=>'bail|required',
            'document.file'=>'bail|mimes:pdf',
            'article.*.*'=>'bail|required',
            'article.file'=>'bail|mimes:pdf',
            'science.*.*'=>'bail|required',
            // 'guide.*.*'=>'bail|required',
            'construction.*.*'=>'bail|required',
            'prize.file'=>'bail|mimes:pdf',
            'areasOfExpertise'=>'bail|required',
            'work.*.*'=>'bail|required',
            // 'language.*.*'=>'bail|required',
            'eduProcess.university.*'=>'bail|required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'họ và tên không được để trống',
            'eduProcess.university.*.required'=>'Quá trình đào tạo bậc đại học không được để trống',
            'degree.*.required'=>'Học vị không được để trống',
            'contact.*.required'=>'Liên hệ không được để trống',
            'contact.phoneNumber.numeric'=>'thông tin liên lạc số điện thoại không hợp lệ',
            'workPlace.phoneNumber.numeric'=>'Đơn vị công tác số điện thoại không hợp lệ',
            'workPlace.*.required'=>'Đơn vị công tác không được để trống',
            'document.*.*.required' => 'Các cột giáo trình, tài liệu học tập đã chủ biên không được để trống',
            'article.*.*.required' => 'Các cột các bài báo đã công bố không được để trống',
            'science.*.*.required' => 'Các cột đề tài nghiên cứu khoa học đã chủ trì hoặc là thành viên không được để trống',
            // 'guide.*.*.required' => 'Các cột hướng dẫn sinh viên nghiên cứu khoa học không được để trống',
            'construction.*.*.required' => 'Các cột công trình được áp dụng trong thực tiễn không được để trống',
            'prize.file.mimes'=>'File cột giải thưởng không hợp lệ',
            'article.file.mimes'=>'File cột bài báo đã công bố không hợp lệ',
            'document.file.mimes'=>'File cột giáo trình, tài liệu học tập đã chủ biên hoặc tham gia không hợp lệ',
        ];
    }
}
