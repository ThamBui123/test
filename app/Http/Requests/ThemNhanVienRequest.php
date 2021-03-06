<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ThemNhanVienRequest extends FormRequest
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
           'manhanvien' => 'required|min:2|unique:nhanvien,manhanvien',
           'hovaten' => 'required|min:3',
           'ngaysinh' => 'required|before:now',
           'gioitinh' => 'required|in:0,1',
           'diachi' => 'required|min:3',
           'sodienthoainv' => 'required|min:10|unique:nhanvien,sodienthoainv',
           'sodienthoainv' => 'regex:/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',
           'email' => 'required|email|unique:nhanvien,email',
           'matkhau' => 'required|min:5',
           'laplaimatkhau' => 'same:matkhau',
           'nhomquyen_id' => 'required|exists:nhomquyen,id',
        ];
    }

    public function messages()
    {
       return [
           'manhanvien.required' => 'Vui lòng nhập mã nhân viên',
           'manhanvien.min' => 'Mã nhân viên phải từ 2 ký tự trở lên',
           'manhanvien.unique' => 'Mã nhân viên đã tồn tại',
           'gioitinh.required' => 'Vui lòng chọn giới tính',
           'gioitinh.in'     => 'Giới tính không hợp lệ',
           'hovaten.required' => 'Vui lòng nhập họ và tên nhân viên',
           'hovaten.min' => 'Họ và tên nhân viên phải từ 3 ký tự trở lên',
           'ngaysinh.required' => 'Vui lòng nhập ngày sinh',
           'ngaysinh.before' => 'Ngày sinh không thể lớn hơn ngày hiện tại',
           'diachi.required' => 'Vui lòng nhập địa chỉ nhân viên',
           'diachi.min' => 'Địa chỉ nhân viên phải từ 3 ký tự trở lên',
           'sodienthoainv.required' => 'Vui lòng nhập số điện thoại nhân viên',
           'sodienthoainv.min' => 'Số điện thoại nhân viên phải từ 3 ký tự trở lên',
           'sodienthoainv.regex' => 'Số điện thoại nhân viên không hợp lệ',
           'sodienthoainv.unique' => 'Số điện thoại nhân viên đã tồn tại',
           'email.required' => 'Vui lòng nhập email',
           'email.email' => 'Email nhân viên không hợp lệ',
           'email.unique' => 'Email nhân viên đã tồn tại',
           'matkhau.required' => 'Vui lòng nhập mật khẩu',
           'matkhau.min' => 'Mật khẩu phải có độ dài 5 ký tự trở lên',
           'laplaimatkhau.same' => 'Nhập lại mật khẩu không khớp',
           'nhomquyen_id.required' => 'Vui lòng chọn nhóm quyền của nhân viên',
       ];
    }
}
