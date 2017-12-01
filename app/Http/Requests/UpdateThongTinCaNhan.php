<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UpdateThongTinCaNhan extends FormRequest
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
      $nhanvien_id = Auth::guard('nhanvien')->id();
      return [
         'hovaten' => 'required|min:3',
         'ngaysinh' => 'required|before:now',
         'gioitinh' => 'required|in:0,1',
         'diachi' => 'required|min:3',
         'sodienthoainv' => 'required|min:10|unique:nhanvien,manhanvien,' . $nhanvien_id,
         'sodienthoainv' => 'regex:/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',
         'email' => 'required|email|unique:nhanvien,email,' .$nhanvien_id,
         'matkhaucu' => 'min:5',
         'matkhaumoi' => 'min:5',
         'nhaplaimatkhau' => 'same:matkhaumoi',
      ];
  }

    public function messages()
    {
       return [
           'hovaten.required' => 'Vui lòng nhập họ và tên',
           'hovaten.min' => 'Họ và tên phải từ 3 ký tự trở lên',
           'ngaysinh.required' => 'Vui lòng nhập ngày sinh',
           'ngaysinh.before' => 'Ngày sinh không thể lơn hơn ngày hiện tại',
           'diachi.required' => 'Vui lòng nhập địa chỉ',
           'diachi.min' => 'Địa chỉ phải từ 3 ký tự trở lên',
           'sodienthoainv.required' => 'Vui lòng nhập số điện thoại',
           'sodienthoainv.min' => 'Số điện thoại phải từ 3 ký tự trở lên',
           'sodienthoainv.unique' => 'Số điện thoại đã tồn tại',
           'sodienthoainv.regex' => 'Số điện thoại không hợp lệ',
           'email.required' => 'Vui lòng nhập email',
           'email.email' => 'Email không hợp lệ',
           'email.unique' => 'Email nhân viên đã tồn tại',
           'matkhaucu.min' => 'Mật khẩu cũ phải từ 5 ký tự',
          'matkhaumoi.min' => 'Mật khẩu mới phải từ 5 ký tự',
          'nhaplaimatkhau.same' => 'Mật khẩu mới lập lại không khớp',
       ];
    }
}
