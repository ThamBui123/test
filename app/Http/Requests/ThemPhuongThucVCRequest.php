<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ThemPhuongThucVCRequest extends FormRequest
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
           'tenvanchuyen'       => 'required|min:3|unique:phuongthucvc,tenvanchuyen',
           'thoigianvanchuyen' => 'required',
           'phivanchuyen'      => 'required',    
        ];
    }

    public function messages()
    {
        return [
            'tenvanchuyen.required'      => 'Vui lòng nhập tên vận chuyển',
            'tenvanchuyen.unique'        => 'Tên vận chuyển vừa nhập đã tồn tại',
            'thoigianvanchuyen.required' => 'Vui lòng nhập thời gian vận chuyển',
            'phivanchuyen.required'      => 'Vui lòng nhập phí vận chuyển',
            'tenvanchuyen.min'      => 'Tên vận chuyển phải hơn 3 ký tự',
        ];
    }
}
