<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DangKyRequest extends FormRequest
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
         'hovaten' => 'required|min:3',
         'diachi' => 'required|min:5',
         'gioitinh' => 'required|in:0,1|min:1',
         'ngaysinh' => 'required|before:today',
         'email'    => 'required|email',
         'email'    => Rule::unique('khachhang')->where(function ($query) {
            $query->where('loaikh', 1);
          }),
         'sodienthoaikh' => 'required|min:10',
         'sodienthoaikh'    => Rule::unique('khachhang')->where(function ($query) {
            $query->where('loaikh', 1);
        }),
         'sodienthoaikh' => 'regex:/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',
         'password' => 'required|min:5',
         'repassword' => 'same:password',
      ];
    }

    public function messages()
    {
      return [
        'hovaten.required' => 'Vui lòng nhập họ và tên',
        'hovaten.min' => 'Họ và tên phải từ 5 ký tự',
        'diachi.required' => 'Vui lòng nhập địa chỉ',
        'diachi.min' => 'Địa chỉ phải từ 3 ký tự',
        'gioitinh.reqired' => 'Vui lòng chọn giới tính',
        'gioitinh.in'     => 'Giới tính không hợp lệ',
        'ngaysinh.required' => 'Vui lòng nhập ngày sinh',
        'ngaysinh.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại',
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không hợp lệ',
        'email.unique' => 'Email này đã đăng ký vui lòng chọn email khác',
        'sodienthoaikh.required' => 'Vui lòng nhập số điện thoại',
        'sodienthoaikh.min' => 'Số điện thoại phải hơn 10 số',
        'sodienthoaikh.regex' => 'Số điện thoại không hợp lệ',
        'sodienthoaikh.unique' => 'Số điện thoại đã tồn tại vui lòng nhập số điện thoại khác',
        'password.required' => 'Vui lòng nhập mật khẩu',
        'password.min' => 'Mật khẩu phải từ 5 ký tự',
        'repassword.same' => 'Mật khẩu lập lại không khớp',
      ];
    }
}
