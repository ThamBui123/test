<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
use Illuminate\Validation\Rule;

class UpdateThongTinKhachHang extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   public function authorize()
   {
      return Auth::check();
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
         'ngaysinh' => 'required|before:now',
         'email'    => 'required|email',
         'email'    => Rule::unique('khachhang')->where(function ($query) {
            $query->where('loaikh', 1);
            $query->where('id', '<>', Auth::user()->id);
          }),
         'sodienthoaikh' => 'required|min:10',
         'sodienthoaikh' => 'regex:/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',
         'matkhaucu' => 'min:5',
         'matkhaumoi' => 'min:5',
         'nhaplaimatkhau' => 'same:matkhaumoi',
      ];
   }

   public function messages()
   {
      return [
        'hovaten.required' => 'Vui lòng nhập họ và tên',
        'hovaten.min' => 'Họ và tên phải từ 3 ký tự',
        'diachi.required' => 'Vui lòng nhập địa chỉ',
        'diachi.min' => 'Địa chỉ phải từ 3 ký tự',
        'gioitinh.reqired' => 'Vui lòng chọn giới tính',
        'gioitinh.in'     => 'Giới tính không hợp lệ',
        'ngaysinh.required' => 'Vui lòng nhập ngày sinh',
        'ngaysinh.before' => 'Ngày sinh phải lớn hơn ngày hiện tại',
        'email.required' => 'Vui lòng nhập email',
        'email.email' => 'Email không hợp lệ',
        'email.unique' => 'Email này đã đăng ký vui lòng chọn email khác',
        'sodienthoaikh.required' => 'Vui lòng nhập số điện thoại',
        'sodienthoaikh.min' => 'Số điện thoại phải hơn 10 số',
        'sodienthoaikh.regex' => 'Số điện thoại không hợp lệ',
        'matkhaucu.min' => 'Mật khẩu cũ phải từ 5 ký tự',
        'matkhaumoi.min' => 'Mật khẩu mới phải từ 5 ký tự',
        'nhaplaimatkhau.same' => 'Mật khẩu mới lập lại không khớp',
      ];
   }
}
