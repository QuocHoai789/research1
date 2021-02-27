<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScientificExplanationRequest extends FormRequest
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
            'productScience'=>'bail|required',
            'productScience.*'=>'bail|in:"Sách chuyên khảo","Bài báo đăng Tạp chí nước ngoài","Sách tham khảo","Bài báo đăng Tạp chí trong nước","Giáo trình","Bài đăng Kỷ yếu HN/HT quốc tế"',
            'productEducate.*'=>'bail|in:"tiến sĩ","thạc sĩ","kỹ sư"',
        ];
    }
    public function messages(){
        return [
            'productScience.required'=>'chọn một sản phẩm khoa học',
        ];
    }
}
