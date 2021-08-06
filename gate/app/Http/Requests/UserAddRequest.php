<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'name' => 'required',
            'password'=>'required|min:8',
            'confirm_password'=>'required:password|same:password',
            'roles' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên User',
            'email.required' => 'Vui lòng nhập Email',
            'email.email address' => 'Vui lòng nhập đúng định dạng "abc@gmail.com"',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'confirm_password.required' => 'Vui lòng xác nhận mật khẩu',
            'password.min' => 'Mật khẩu không được nhỏ hơn 8 ký tự',
            'confirm_password.same' => 'Mật khẩu không trùng khớp. Vui lòng nhập lại',
            'roles' => 'Bạn chưa chọn quyền cho User',
           
        ];
    }


}
