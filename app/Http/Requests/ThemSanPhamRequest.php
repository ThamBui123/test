<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class ThemSanPhamRequest extends FormRequest
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
            'masanpham'         => 'required|min:3|unique:sanpham,masanpham',
            'tensanpham'        => 'required|min:3|unique:sanpham,tensanpham',
            'theloai_id'        => 'required|exists:theloai,id',
            'hangsanxuat_id'    => 'required|exists:hangsanxuat,id',
            'anhsanpham'        => 'required|image',
            // 'soluongsanpham'    => 'required',
            // 'gianhap'    => 'required',
            // 'giasanpham'    => 'required',
            'sanphamdacbiet'    => 'integer|in:0,1',
        ];
    }

    public function messages()
    {
        return [
            'theloai_id.exists'     => 'Vui lòng chọn thể loại',
            'hangsanxuat_id.exists'     => 'Vui lòng chọn hãng sản xuất',
            'masanpham.required'        => 'Vui lòng nhập mã sản phẩm',
            // 'soluongsanpham.required'        => 'Vui lòng nhập số lượng nhập của sản phẩm',
            // 'gianhap.required'        => 'Vui lòng nhập giá nhập cho sản phẩm',
            // 'giasanpham.required'        => 'Vui lòng nhập giá bán cho sản phẩm',
            'masanpham.unique'          => 'Mã sản phẩm này đã tồn tại',
            'tensanpham.unique'         => 'Tên sản phẩm này đã tồn tại',
            'tensanpham.required'       => 'Vui lòng nhập tên sản phẩm',
            'theloai_id.required'       => 'Vui lòng chon thể loại',
            'hangsanxuat_id.required'   => 'Vui lòng chọn hãng sản xuất',
            'anhsanpham.required'       => 'Vui lòng chọn ảnh đại diện',
            'anhsanpham.image'          => 'Vui lòng chọn hình ảnh',
            'masanpham.min'             => 'Mã sản phẩm phải hơn 3 ký tự',
            'tensanpham.min'            => 'Tên sản phẩm phải hơn 3 ký tự',
            'soluongsanpham.numeric'    => 'Số lượng sản phẩm không hợp lệ',
            'sanphamdacbiet.integer'    => 'Giá trị sản phẩm đặc biệt không hợp lệ',
            'sanphamdacbiet.in'         => 'Giá trị sản phẩm đặc biệt không hợp lệ',
        ];
    }
}
