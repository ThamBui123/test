<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ThemHangSanXuatRequest extends FormRequest
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
           'tenhang'  => 'required|unique:hangsanxuat,tenhang',
           'logohang' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'tenhang.required' => 'Vui lòng nhập tên hãng',
            'logohang.required' => 'Vui lòng chọn logo hãng',
            'tenhang.unique' => 'Tên hãng vừa nhập đã tồn tại',
            'logohang.image'   => 'Vui lòng chọn hình ảnh',
        ];
    }
}
