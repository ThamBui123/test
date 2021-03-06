<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ThemTinTucRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('nhanvien')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tieude'         => 'required|min:3|unique:tintuc,tieude',
            'thumbnail'        => 'required|image',
            'noidung'       => 'required|min:50',
        ];
    }


    public function messages()
    {
        return [
            'tieude.required' => 'Vui lòng nhập tiêu đề',
            'tieude.min' => 'Vui lòng nhập tiêu đề hơn 3 ký tự',
            'tieude.unique' => 'Tiêu đề bạn vừa nhập đã tồn tại',
            'thumbnail.required' => 'Vui lòng chọn ảnh cho trang',
            'thumbnail.image' => 'Ảnh không đúng định dạng',
            'noidung.required' => 'Vui lòng nhập nội dung trang',
            'noidung.min' => 'Nội dung trang phải từ 50 ký tự trở lên'
        ];
    }
}
