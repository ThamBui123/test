<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SuaTheLoaiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('nhanvien')->check();;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'tentheloai' => 'required|min:3|unique:theloai,tentheloai,' .$this->id,
           // 'nhomsanpham_id'        => 'required|exists:nhomsanpham,id',
        ];
    }

    public function messages()
    {
        return [
            'tentheloai.required' => 'Vui lòng nhập tên thể loại',
            'tentheloai.unique'   => 'Tên thể loại vừa nhập đã tồn tại',
            'tentheloai.min'      => 'Tên thể loại phải hơn 3 ký tự',
            // 'nhomsanpham_id.exists'     => 'Vui lòng chọn nhóm sản phẩm',
        ];
    }
}
