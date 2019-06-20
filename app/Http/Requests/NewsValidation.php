<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsValidation extends FormRequest
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
            'typeOfNews_id'=>'required',
            'title' => 'required|min:3',
            'featured_news' => 'required',
            'content'=> 'required|min:20',
        ];
    }
    public function messages(){
        return [
            'typeOfNews_id.required'=>'Bạn chưa chọn Loại Tin cho Bài viết!',
            'title.required'=>'Bạn chưa nhập Tiêu Đề cho Bài viết!',
            'title.min'=>'Tiêu Đề Bài viết gồm ít nhất 3 ký tự!',
            'featured_news.required'=>'Bạn chưa nhập Tóm tắt cho Bài viết!',
            'content.required'=>'Bạn chưa nhập nội dung cho Bài viết!',
            'content.min'=>'Bài viết quá ngắn, yêu cầu tối thiểu gồm 20 ký tự trở lên!',
        ];
    }
}
