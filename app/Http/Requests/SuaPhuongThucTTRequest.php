<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class SuaPhuongThucTTRequest extends FormRequest
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
           'tenphuongthuc' => 'required|min:3|unique:phuongthuctt,tenphuongthuc,' . $this->id,
           'huongdan' => 'required|min:10',
        ];
    }

    public function messages()
    {
        return [
            'tenphuongthuc.required' => 'Vui lòng nhập tên phương thức',
            'tenphuongthuc.unique'   => 'Tên phương thức vừa nhập đã tồn tại',
            'tenphuongthuc.min'      => 'Tên phương thức phải hơn 3 ký tự',
            'huongdan.required' => 'Vui lòng nhập hướng dẫn cho khách hàng',
            'huongdan.min'      => 'Hướng dẫn cho khách hàng phải hơn 10 ký tự',
        ];
    }
}
