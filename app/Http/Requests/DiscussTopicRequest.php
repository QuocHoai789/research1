<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscussTopicRequest extends FormRequest
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
            'overview.*' => 'required',
            'urgency.*' => 'required',
            'target.*' => 'required',
            'approach.*' => 'required',
            'content_and_process.*' => 'required',
            'product_of_topic.*' => 'required',
            'product_outstanding_of_topic.*' => 'required',
            'effective.*' => 'required',
            'study_experience.*' => 'required',
            'rationality.*' => 'required',
            'another_opinion' => 'required|max:255',
            'conclude' => 'required|max:255',
            'expense' => 'required',
            
        ];
    }
    public function messages(){
        return [
                'required' => 'Không được để trống trường này',
                'another_opinion.max' => 'Cột ý kiến khác không được vượt quá 255 ký tự',
                'conclude.max' => 'Cột kết luận không được vượt quá 255 ký tự',
               ];
    }
}
