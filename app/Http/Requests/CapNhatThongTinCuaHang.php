<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class CapNhatThongTinCuaHang extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('nhanvien');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'diachi' => 'required|min:3',
         'tencuahang' => 'required|min:1',
         'sodienthoai' => 'required|min:10',
         'sodienthoai' => 'regex:/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',
         'email' => 'required|email',
      ];
    }

    public function messages()
    {
       return [
           'tencuahang.required' => 'Vui lòng nhập tên của hàng',
           'tencuahang.min' => 'Tên của hàng phải từ 1 ký tự trở lên',
           'diachi.required' => 'Vui lòng nhập địa chỉ',
           'diachi.min' => 'Địa chỉ phải từ 3 ký tự trở lên',
           'sodienthoai.required' => 'Vui lòng nhập số điện thoại',
           'sodienthoai.min' => 'Số điện thoại phải từ 3 ký tự trở lên',
           'sodienthoai.regex' => 'Số điện thoại không hợp lệ',
           'email.required' => 'Vui lòng nhập email',
           'email.email' => 'Email không hợp lệ',
       ];
    }
}
