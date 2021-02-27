<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
                'new_username' => 'required',
                'new_usermail' => 'required|email',
                'new_userphone' => 'required',
                'new_more_information' => 'max:500',
                'new_work_unit_id' => 'required',
            ];
    }
    public function messages()
    {
        return [
                'new_username.required' => 'Không được để trống trường họ tên',

                'new_usermail.required' => 'Không được để trống trường email',
                'new_usermail.email' => 'Email không đúng định dạng',

                'new_userphone.required' => 'Không được để trống trường số điện thoại',

                'new_more_information.max' => 'Thông tin thêm không được vượt quá 500 ký tự',

                'new_work_unit_id.required' => 'Chưa chọn đơn vị công tác'

            ];
    }
}
