<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThanhToanKhongDangKyRequest extends FormRequest
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
        $rules = [];
        if(!session('psty_checkdamua'))
        {
           $rules['hovaten'] = 'required';
           $rules['sodienthoai'] = 'required';
           $rules['sodienthoai'] = 'regex:/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/';
           $rules['diachi'] = 'required|min:5';
           $rules['email'] = 'email';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'hovaten.required' => 'Vui lòng nhập họ tên nhận hàng',
            'sodienthoai.required' => 'Vui lòng nhập số điện thoại nhận hàng',
            'sodienthoai.regex' => 'Số điện thoại không hợp lệ',
            'diachi.required' => 'Vui lòng nhập địa chỉ nhận hàng',
            'diachi.min' => 'Vui lòng nhập địa chỉ nhận hàng hơn 5 ký tự',
            'email.email'     => 'Email không hợp lệ',
            'email.unique' => 'Email bạn nhập đã đăng ký vui lòng nhập email khác hoặc đăng nhập',
        ];
    }
}
