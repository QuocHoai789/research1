<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TermRequest extends FormRequest
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
            'term_id' => 'required|numeric|unique:study_documents,term_id,'.$this->id,
            'name_tern' => 'required',
            'number_of_credit' => 'required|numeric',
            'number_of_lessons' => 'required|numeric',
        ];
    }
    public function messages()
    {
        return [
            'term_id.required' => 'Mã học phần không được để trống',
            'term_id.numeric' => 'Mã học phần phải là kiểu số',
            'term_id.unique' => 'Mã học phần bị trùng',

            'name_tern.required' => 'Tên học phần không được để trống',
            'number_of_credit.required' => 'Số tín chỉ không được để trống',
            'number_of_credit.numeric' => 'Số tín chỉ phải là kiểu số',
            'number_of_lessons.required' => 'Số tiết học không được để trống', 
            'number_of_lessons.numeric' => 'Số tiết học phải là kiểu số',
        ];
    }
}
