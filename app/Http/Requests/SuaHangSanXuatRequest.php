<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SuaHangSanXuatRequest extends FormRequest
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
           'tenhang'  => 'required|min:3|unique:hangsanxuat,tenhang,' .$this->id,
           'logohang' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'tenhang.required' => 'Vui lòng nhập tên hãng',
            'tenhang.min'      => 'Tên hãng phải hơn 3 ký tự',
            'tenhang.unique'   => 'Tên hãng vừa nhập đã tồn tại',
            'logohang.image'   => 'Vui lòng chọn hình ảnh',
        ];
    }
}
