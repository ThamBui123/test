<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ThemSlidersRequest extends FormRequest
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
            'tieude'         => 'required|min:3',
            'hinhanh'        => 'required|image',
            'lienket'         => 'required|min:3',
        ];
    }


    public function messages()
    {
        return [
            'tieude.required' => 'Vui lòng nhập tiêu đề',
            'tieude.min' => 'Vui lòng nhập tiêu đề hơn 3 ký tự',
            'lienket.required' => 'Vui lòng nhập liên kết',
            'lienket.min' => 'Vui lòng nhập liên kết hơn 3 ký tự',
            'hinhanh.required' => 'Vui lòng chọn ảnh cho tin tức',
            'hinhanh.image' => 'Ảnh không đúng định dạng',
        ];
    }
}
