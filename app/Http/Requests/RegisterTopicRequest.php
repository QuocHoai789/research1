<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterTopicRequest extends FormRequest
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
            'name_topic' => 'required',
            'importance' => 'required',
            'target' => 'required',
            'content' => 'required',
            'effective' => 'required',
            'time' => 'required|in:3,6,9,12',
            'expense' => 'required|in:5000000,10000000,15000000,20000000,25000000,30000000',
            'type'=>'required',
            'application'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'type.required' => 'Bạn nên chọn một lĩnh vực',
            'name_topic.required'=>'Chưa điền tên đề tài',
            'importance.required'=>'Chưa điền tính cấp thiết',
            'target.required'=>'Chưa điền mục tiêu',
            'content.required'=>'Không được để trống nội dung chính',
            'effective.required'=>'Chưa điền hiệu quả',
            'time.required'=>'Chưa có thời gian',
            'expense.required'=>'Chưa có nhu cầu kinh phí',
            'application.required'=>'Chưa mô tả sản phẩm ứng dụng',
            'expense.in'=>'Nhu cầu kinh phí không đúng',
        ];
    }
}
