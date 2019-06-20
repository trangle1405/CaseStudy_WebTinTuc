<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
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
            'name'=>'required|min:6||unique:users',
            'email'=>'required|email|unique:users',
            'password' => 'required|min:6|max:32',
            'password_again' => 'required|same:password'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập ten!',
            'name.min' => 'ten gồm tối thiểu 6 ký tự!',
            'name.unique' => ' Ten da ton tai!',
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Bạn nhập email chua dung dinh dang!',
            'email.unique' => ' email! da ton tai!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.min' => 'Mật khẩu gồm tối thiểu 6 ký tự!',
            'password.max' => 'Mật khẩu không được vượt quá 32 ký tự!',
            'password_again.required' => 'Bạn chưa xác nhận mật khẩu!',
            'password_again.same' => 'Mật khẩu xác nhận chưa khớp với mật khẩu đã nhập!'
        ];
    }
}
