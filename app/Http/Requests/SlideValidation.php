<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideValidation extends FormRequest
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
            'name' => 'required|min:6|max:40',
            'content' => 'required|min:10|max:100'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Bạn chưa nhập Tên Slide',
            'name.min' => 'Tên Slide gồm ít nhất 6 ký tự',
            'name.max' => 'Tên Slide không được vượt quá 40 ký tự',
            'content.required' => 'Bạn chưa nhập Nội Dung cho Slide',
            'content.min' => 'Nội Dung Slide gồm tối thiểu 10 ký tự',
            'content.max' => 'Nội Dung Slide không được vượt quá 100 ký tự'
        ];
    }
}
