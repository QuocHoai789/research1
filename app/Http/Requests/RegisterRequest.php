<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'msgv' => 'required|min:6|max:20|unique:users',
            'password' => 'required|min:6|max:500|confirmed',
            'password_confirmation' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'more_user_infor'=>'max:500',
            'work_unit_id' => 'required',
            'degree' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'msgv.required' => 'Chưa điền mã số giảng viên',
            'msgv.min'=>'Mã số giảng viên có ít nhất 6 ký tự',
            'msgv.max'=>'Mã số giảng viên có nhiều nhất 20 ký tự',
            'msgv.unique'=>'Mã số giảng viên đẫ tồn tại',

            'password.required'=>'Chưa điền mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 6 kí tự',
            'password.max'=>'Mật khẩu tối đa 500 kí tự',
            'password.confirmed'=>'Mật khẩu nhập lại chưa đúng',
            'password_confirmation.required'=>'Chưa nhập lại mật khẩu',

            'name.required'=>'Chưa điền họ và tên',
            'email.required'=>'Chưa điền email',
            'email.email'=>'Chưa đúng cấu trúc email',
            'email.unique'=>'Email đã tồn tại',

            
            'more_user_infor.max' => 'Thông tin thêm chỉ được nhỏ hơn 500 ký tự',

            'work_unit_id.required' => 'Chưa chọn đơn vị làm việc',
            'degree.required' => 'Chưa chọn học vị',

        ];
    }
}
