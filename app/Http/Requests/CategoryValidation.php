<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValidation extends FormRequest
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
            'name'=>'required|min:2|unique:categories',
        ];
    }

    public function messages(){
        return [
            'name.required'=>'The loai khong duoc de trong',
            'name.min'=>'The loai phai chua it nhat hai ky tu',
            'name.unique'=>'Ten the loai da ton tai, vui long nhap lai',
        ];
    }
}
