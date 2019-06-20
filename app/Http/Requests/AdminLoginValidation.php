<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginValidation extends FormRequest
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
            'email' => 'required',
            'password' => 'required|min:6|max:32'
        ];
    }
    public function messages(){
        return [
            'email.required' => 'Bạn chưa nhập Địa chỉ Email!',
            'password.required' => 'Bạn chưa nhập Mật khẩu!',
            'password.min' => 'Mật Khẩu gồm tối thiểu 6 ký tự!',
            'password.max' => 'Mật Khẩu gồm tối đa 32 ký tự!'
        ];
    }
}
