<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class NhapHangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
   public function authorize()
   {
      return Auth::guard('nhanvien')->check();
   }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
   public function rules()
   {
      $rules = [];
      $rules['soluongnhap'] = 'required';

      if($this->request->get('soluongnhap'))
      {
        foreach($this->request->get('soluongnhap') as $key => $val)
        {
           $rules['soluongnhap.'.$key] = 'required';
           if($val <= 0)
              $rules['soluongnhap.'.$key] = 'not_in:0';  
        }

        foreach($this->request->get('gianhap') as $key => $val)
        {
           $rules['gianhap.'.$key] = 'required';
           if($val <= 0)
              $rules['gianhap.'.$key] = 'not_in:0';  
        }

        foreach($this->request->get('sanpham_id') as $key => $val)
        {
          $rules['sanpham_id.'.$key] = 'exists:sanpham,id';
        }

      }
      return $rules;
   }


   public function messages()
   {
      $messages = [];
      if($this->request->get('soluongnhap'))
      {
        $list_tensanpham = $this->request->get('tensanpham');

        foreach($this->request->get('soluongnhap') as $key => $val)
        {
           $messages['soluongnhap.'.$key.'.required'] = 'Vui lòng nhập số lượng của sản phẩm '.($list_tensanpham[$key]);
           $messages['soluongnhap.'.$key.'.not_in'] = 'Số lượng nhập của sản phẩm '.($list_tensanpham[$key]). ' phải lớn hơn 0';
        }

        foreach($this->request->get('gianhap') as $key => $val)
        {
           $messages['gianhap.'.$key.'.required'] = 'Vui lòng nhập số lượng của sản phẩm '.($list_tensanpham[$key]);
           $messages['gianhap.'.$key.'.not_in'] = 'Giá nhập của sản phẩm '.($list_tensanpham[$key]). ' phải lớn hơn 0';
        }

        foreach($this->request->get('sanpham_id') as $key => $val)
        {
           $messages['sanpham_id.'.$key.'.exists'] = 'Vui lòng chọn sản phẩm ';
        }
      }
      $messages['soluongnhap.required'] = 'Bạn chưa chọn sản phẩm nào để nhập hàng';
      
      return $messages;
   }
}
