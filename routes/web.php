<?php

Auth::routes();
//Route Site
Route::group(['namespace' => 'Site'], function () {

   Route::get('/', 'HomeController@getHome')->name('home');
   Route::get('page/{slug}', 'PageController@getPage')->name('getPage');
   Route::get('san-pham/{slug}', 'SanPhamController@getSanPham')->name('getChiTietSanPham')->where('slug','^[a-zA-Z0-9-]+$');
   Route::post('vote-san-pham', 'SanPhamController@voteSanPham')->name('voteSanPham');
   Route::get('the-loai/{slug}', 'TheLoaiController@getTheLoai')->name('getTheLoaiSanPham')->where('slug','^[a-zA-Z0-9-_\/]+$');
   Route::get('nhom-san-pham/{slug}', 'NhomSanPhamController@getNhomSanPham')->name('getNhomSanPham')->where('slug','^[a-zA-Z0-9-_\/]+$');
    Route::get('hang-san-xuat/{slug}', 'HangSanXuatController@getHangSanXuat')->name('getHangSanXuat')->where('slug','^[a-zA-Z0-9-_\/]+$');
   Route::get('tin-tuc', 'TinTucController@getListTinTuc')->name('getListTinTuc');
   Route::get('tin-tuc/{slug}', 'TinTucController@getTinTuc')->name('getTinTuc')->where('slug','^[a-zA-Z0-9-_\/]+$');
   Route::post('auto-search', 'CongCuController@postAutoCompleteSanPham')->name('postAutoCompleteSanPham');
   Route::get('gui-cho-ban-be/{id}', 'CongCuController@getGuiSanPhamChoBanBe')->name('getGuiSanPhamChoBanBe');
   Route::post('gui-cho-ban-be/{id}', 'CongCuController@postGuiSanPhamChoBanBe')->name('postGuiSanPhamChoBanBe');
   Route::get('so-sanh', 'CongCuController@getSoSanh')->name('getSoSanh');
   Route::post('search-so-sanh', 'CongCuController@postTimSanPhamSoSanh')->name('postTimSanPhamSoSanh');
   Route::post('ajax-so-sanh', 'CongCuController@postAjaxTableSoSanh')->name('postAjaxTableSoSanh');
   Route::get('so-sanh/{id}', 'CongCuController@getThemSoSanh')->name('getThemSoSanh');
   Route::get('xoa-so-sanh/{id}', 'CongCuController@getXoaSoSanh')->name('getXoaSoSanh');
   Route::get('huy-so-sanh', 'CongCuController@getHuySoSanh')->name('getHuySoSanh');
   Route::get('gio-hang', 'GioHangController@getCart')->name('getCart');
   Route::post('add-cart', 'GioHangController@postAddCart')->name('addCart');
   Route::get('model-cart', 'GioHangController@getModelCart');
   Route::get('box-cart', 'GioHangController@getBoxCart');
   Route::get('table-box-cart', 'GioHangController@getTableBoxCart');
   Route::post('update-cart', 'GioHangController@postUpdateCart')->name('updateCart');
   Route::post('update-cart-dat-truoc', 'GioHangController@postUpdateCartDatTruoc')->name('postUpdateCartDatTruoc');
   Route::post('destroy-cart', 'GioHangController@postDestroyCart')->name('destroyCart');
   Route::post('remove-cart', 'GioHangController@postRemoveCart')->name('removeCart');
   Route::post('update-phuongthuc', 'GioHangController@postUpdatePhuongthuc')->name('postUpdatePhuongthuc');
   Route::get('thanh-toan', 'GioHangController@getThanhToan')->name('getThanhToanGioHang');
   Route::get('thanh-toan/step-1', 'GioHangController@getStep1')->name('getStep1');
   Route::post('thanh-toan/step-1', 'GioHangController@postStep1')->name('postStep1');
   Route::get('thanh-toan/step-1/yes', 'GioHangController@getStep1Y')->name('getStep1Y');
   Route::get('thanh-toan/step-1/no', 'GioHangController@getStep1N')->name('getStep1N');
   Route::get('thanh-toan/step-2', 'GioHangController@getStep2')->name('getStep2');
   Route::post('thanh-toan/step-2', 'GioHangController@postStep2')->name('postStep2');
   Route::post('thanh-toan', 'GioHangController@postThanhToanDangKy')->name('postThanhToanDangKy');

   Route::get('dang-nhap', 'XacThucController@getDangNhap')->name('getDangNhap');
   Route::get('model-dang-nhap', 'XacThucController@getModelDangNhap')->name('getModelDangNhap');
   Route::get('login', 'XacThucController@getDangNhap')->name('getLogin');
   Route::get('register', 'XacThucController@getDangKy')->name('getDangKy');
   Route::post('dang-nhap', 'XacThucController@postDangNhap')->name('postDangNhap');
   Route::get('dang-ky', 'XacThucController@getDangKy')->name('getDangKy');
   Route::post('dang-ky', 'XacThucController@postDangKy')->name('postDangKy');
   Route::get('dang-xuat', 'XacThucController@getDangXuat')->name('getDangXuat');
   Route::get('login/facebook', 'XacThucController@redirectToFacebook')->name('getLoginFacebook');
   Route::get('login/facebook/callback', 'XacThucController@handleFacebookCallback');

   Route::get('tim-kiem', 'TimKiemController@getTimKiem')->name('getTimKiem');

   Route::post('coupon-code', 'GioHangController@postCoupon')->name('postCoupon');

   Route::group(['prefix' => 'tai-khoan', 'middleware' => 'auth'], function () {

   Route::get('', 'KhachHangController@getTaiKhoan')->name('getTaiKhoan');
   Route::post('binh-luan', 'SanPhamController@postBinhLuan')->name('postBinhLuan');
   Route::get('them-ua-thich/{id}', 'CongCuController@getThemUaThich')->name('getThemUaThich');
   Route::get('san-pham-yeu-thich', 'KhachHangController@getYeuThich')->name('getYeuThich');
   Route::get('thong-tin-ca-nhan', 'KhachHangController@getThongTin')->name('getThongTin');
   Route::get('don-hang', 'KhachHangController@getDonHang')->name('getDonHang');
   Route::get('chi-tiet-don-hang/{id}', 'KhachHangController@getChiTietDonHang')->name('getChiTietDonHangKH');
   Route::post('thong-tin-ca-nhan/chinh-sua', 'KhachHangController@postUpdateThongTin')->name('postUpdateThongTin');

   });

});

// ***Route Admin ***\\\
Route::group(['prefix' => 'admin', 'namespace' => 'AdminAuth'], function () {

   Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
   Route::post('password/reset', 'ResetPasswordController@reset')->name('resetPassAdmin');
   Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm');


});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

   Route::get('/', 'XacThucController@getDangNhap')->name('admin');
   Route::get('login', 'XacThucController@getDangNhap')->name('getDangNhapAdmin');
   Route::post('login', 'XacThucController@postDangNhap')->name('postDangNhapAdmin');
   Route::get('logout', 'XacThucController@getDangXuat')->name('getDangXuatAdmin');

});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'nhanvien'], function () {

   Route::get('dashboard', 'QuanLyController@getQuanLy')->name('dashboard');

   //Chuc nang cua nhan vien nhap hang & admin
   Route::group(['middleware' => 'nhomquyen', 'quyen' => ['ADMIN', 'NVNH']], function () {

         //Nhap hang
      Route::get('nhap-hang', 'NhapHangController@getAllList')->name('listNhapHang');
      Route::get('nhap-hang/thung-rac', 'NhapHangController@getAllListThungRac')->name('listThungRacNhapHang');

      Route::get('nhap-hang/them-moi', 'NhapHangController@getThem')->name('getThemNhapHang');
      Route::post('nhap-hang/them-moi', 'NhapHangController@postThem')->name('postThemNhapHang');
      Route::get('nhap-hang/chi-tiet/{id}', 'NhapHangController@getChiTiet')->name('getChiTietNhapHang');
      Route::post('nhap-hang/editable', 'NhapHangController@postUpdateEditable')->name('postUpdateEditable');

   });

   //Chuc nang cua nhan vien duyet hang & admin
   Route::group(['middleware' => 'nhomquyen', 'quyen' => ['ADMIN', 'NVDH']], function () {

         //Don hang
      Route::get('don-hang', 'DonHangController@getAllList')->name('listDonHang');
      Route::get('don-hang/thung-rac', 'DonHangController@getAllListThungRac')->name('listThungRacDonHang');
      Route::get('don-hang/chi-tiet/{id}', 'DonHangController@getChiTiet')->name('getChiTietDonHang');
      Route::post('don-hang/cap-nhat/{id}', 'DonHangController@postCapNhatDonHang')->name('postCapNhatDonHang');
      Route::post('don-hang/huy-bo', 'DonHangController@postHuyBoDonHang')->name('postHuyBoDonHang');
      
      Route::post('don-hang/chinh-sua/{id}', 'DonHangController@postChinhSuaDonHang')->name('postChinhSuaDonHang');
      Route::get('don-hang/xuat-kho', 'DonHangController@getXuatKho')->name('getXuatKho');

   });

   //Chuc nang cua admin
   Route::group(['middleware' => 'nhomquyen', 'quyen' => 'ADMIN'], function () {

   //San Pham
      Route::get('san-pham', 'SanPhamController@getAllList')->name('listSanPham');
      Route::get('san-pham/thung-rac', 'SanPhamController@getAllListThungRac')->name('listThungRacSanPham');
      Route::get('san-pham/them-moi', 'SanPhamController@getThemSanPham')->name('getThemSanPham');
      Route::post('san-pham/them-moi', 'SanPhamController@postThemSanPham')->name('postThemSanPham');
      Route::get('san-pham/chinh-sua/{id}', 'SanPhamController@getSuaSanPham')->name('getSuaSanPham');
      Route::post('san-pham/chinh-sua/{id}', 'SanPhamController@postSuaSanPham')->name('postSuaSanPham');
      Route::get('san-pham/xoa-anh/{id}', 'SanPhamController@getXoaHinhAnh')->name('getXoaHinhAnh');

      //Hang San Xuat
      Route::get('hang-san-xuat', 'HangSanXuatController@getAllList')->name('listHangSanXuat');
      Route::get('hang-san-xuat/thung-rac', 'HangSanXuatController@getAllListThungRac')->name('listThungRacHangSanXuat');

      Route::get('hang-san-xuat/chinh-sua/{id}', 'HangSanXuatController@getSua')->name('getSuaHangSanXuat');
      Route::post('hang-san-xuat/chinh-sua/{id}', 'HangSanXuatController@postSua')->name('postSuaHangSanXuat');

      Route::get('hang-san-xuat/them-moi', 'HangSanXuatController@getThem')->name('getThemHangSanXuat');
      Route::post('hang-san-xuat/them-moi', 'HangSanXuatController@postThem')->name('postThemHangSanXuat');

      //The loai
      Route::get('the-loai', 'TheLoaiController@getAllList')->name('listTheLoai');

      Route::get('the-loai/thung-rac', 'TheLoaiController@getAllListThungRac')->name('listThungRacTheLoai');

      Route::get('the-loai/them-moi', 'TheLoaiController@getThem')->name('getThemTheLoai');
      Route::post('the-loai/them-moi', 'TheLoaiController@postThem')->name('postThemTheLoai');   

      Route::get('the-loai/chinh-sua/{id}', 'TheLoaiController@getSua')->name('getSuaTheLoai');
      Route::post('the-loai/chinh-sua/{id}', 'TheLoaiController@postSua')->name('postSuaTheLoai');


      //Tin tuc 
      Route::get('tin-tuc', 'TinTucController@getAllList')->name('listTinTuc');
      Route::get('tin-tuc/thung-rac', 'TinTucController@getAllListThungRac')->name('listThungRacTinTuc');

      Route::get('tin-tuc/them-moi', 'TinTucController@getThem')->name('getThemTinTuc');
      Route::post('tin-tuc/them-moi', 'TinTucController@postThem')->name('postThemTinTuc');

      Route::get('tin-tuc/chinh-sua/{id}', 'TinTucController@getSua')->name('getSuaTinTuc');
      Route::post('tin-tuc/chinh-sua/{id}', 'TinTucController@postSua')->name('postSuaTinTuc');

         //Pages
      Route::get('pages', 'PagesController@getAllList')->name('listPages');
      Route::get('pages/thung-rac', 'PagesController@getAllListThungRac')->name('listThungRacPages');

      Route::get('pages/them-moi', 'PagesController@getThem')->name('getThemPages');
      Route::post('pages/them-moi', 'PagesController@postThem')->name('postThemPages');

      Route::get('pages/chinh-sua/{id}', 'PagesController@getSua')->name('getSuaPages');
      Route::post('pages/chinh-sua/{id}', 'PagesController@postSua')->name('postSuaPages');

      //Sliders
      Route::get('sliders', 'SlidersController@getAllList')->name('listSliders');
      Route::get('sliders/thung-rac', 'SlidersController@getAllListThungRac')->name('listThungRacSliders');

      Route::get('sliders/them-moi', 'SlidersController@getThem')->name('getThemSliders');
      Route::post('sliders/them-moi', 'SlidersController@postThem')->name('postThemSliders');

      Route::get('sliders/chinh-sua/{id}', 'SlidersController@getSua')->name('getSuaSliders');
      Route::post('sliders/chinh-sua/{id}', 'SlidersController@postSua')->name('postSuaSliders');

      //Phuong thuc thanh toan
      Route::get('phuong-thuc-thanh-toan', 'PhuongThucTTController@getAllList')->name('listPhuongThucTT');
      Route::get('phuong-thuc-thanh-toan/thung-rac', 'PhuongThucTTController@getAllListThungRac')->name('listThungRacPhuongThucTT');
      Route::get('phuong-thuc-thanh-toan/them-moi', 'PhuongThucTTController@getThem')->name('getThemPhuongThucTT');
      Route::post('phuong-thuc-thanh-toan/them-moi', 'PhuongThucTTController@postThem')->name('postThemPhuongThucTT');

      Route::get('phuong-thuc-thanh-toan/chinh-sua/{id}', 'PhuongThucTTController@getSua')->name('getSuaPhuongThucTT');
      Route::post('phuong-thuc-thanh-toan/chinh-sua/{id}', 'PhuongThucTTController@postSua')->name('postSuaPhuongThucTT');

      //Phuong thuc thanh toan
      Route::get('phuong-thuc-van-chuyen', 'PhuongThucVCController@getAllList')->name('listPhuongThucVC');
      Route::get('phuong-thuc-van-chuyen/thung-rac', 'PhuongThucVCController@getAllListThungRac')->name('listThungRacPhuongThucVC');

      Route::get('phuong-thuc-van-chuyen/them-moi', 'PhuongThucVCController@getThem')->name('getThemPhuongThucVC');
      Route::post('phuong-thuc-van-chuyen/them-moi', 'PhuongThucVCController@postThem')->name('postThemPhuongThucVC');

      Route::get('phuong-thuc-van-chuyen/chinh-sua/{id}', 'PhuongThucVCController@getSua')->name('getSuaPhuongThucVC');
      Route::post('phuong-thuc-van-chuyen/chinh-sua/{id}', 'PhuongThucVCController@postSua')->name('postSuaPhuongThucVC');

      //Khach hang
      Route::get('khach-hang', 'KhachHangController@getAllList')->name('listKhachHang');
      Route::get('khach-hang/thung-rac', 'KhachHangController@getAllListThungRac')->name('listThungRacKhachHang');
      Route::get('khach-hang/lich-sua-mua-hang/{id}', 'KhachHangController@getLichSuMuaHang')->name('getLichSuMuaHang');

      //Nhan vien
      Route::get('nhan-vien', 'NhanVienController@getAllList')->name('listNhanVien');
      Route::get('nhan-vien/thung-rac', 'NhanVienController@getAllListThungRac')->name('listThungRacNhanVien');
      Route::get('nhan-vien/them-moi', 'NhanVienController@getThem')->name('getThemNhanVien');
      Route::post('nhan-vien/them-moi', 'NhanVienController@postThem')->name('postThemNhanVien');
      Route::get('nhan-vien/chinh-sua/{id}', 'NhanVienController@getSua')->name('getSuaNhanVien');
      Route::post('nhan-vien/chinh-sua/{id}', 'NhanVienController@postSua')->name('postSuaNhanVien');

      //Binh luận
      Route::get('binh-luan', 'BinhLuanController@getAllList')->name('listBinhLuan');
      Route::get('binh-luan/thung-rac', 'BinhLuanController@getAllListThungRac')->name('listThungRacBinhLuan');
      Route::get('binh-luan/chi-tiet/{id}', 'BinhLuanController@getXemBinhLuan')->name('getXemBinhLuan');
      Route::post('binh-luan/chi-tiet/{id}', 'BinhLuanController@getXemBinhLuan')->name('getXemBinhLuan');
      Route::post('binh-luan/huy-bo/{id}', 'BinhLuanController@postHuyBoBinhLuan')->name('postHuyBoBinhLuan');
      Route::post('binh-luan/duyet/{id}', 'BinhLuanController@postDuyetBinhLuan')->name('postDuyetBinhLuan');

      //Thong ke
      Route::get('thong-ke/san-pham-da-ban', 'ThongKe\SanPhamDaBanController@getListSanPhamDaBan')->name('listSanPhamDaBan');
      Route::get('thong-ke/san-pham-ban-chay', 'ThongKe\SanPhamBanChayController@getListSanPhamBanChay')->name('listSanPhamBanChay');
      Route::get('thong-ke/san-pham-ton-kho', 'ThongKe\SanPhamTonKhoController@getListSanPhamTonKho')->name('listSanPhamTonKho');
      Route::get('thong-ke/loi-nhuan', 'ThongKe\LoiNhuanController@getLoiNhuan')->name('getLoiNhuan');

      //Tool
      Route::get('makerting', 'MakertingController@getMakerting')->name('getMakerting');
      Route::post('makerting', 'MakertingController@postMakerting')->name('postMakerting');

      Route::post('tool-thung-rac', 'CongCuController@postDuaVaoThungRac')->name('postThungRac');

      Route::post('tool-xoa-bo', 'CongCuController@postXoaBo')->name('postXoaBo');

      Route::post('tool-khoi-phuc', 'CongCuController@postKhoiPhuc')->name('postKhoiPhuc');

      Route::get('cai-dat', 'QuanLyController@getCaiDat')->name('getCaiDat');
      Route::post('cai-dat', 'QuanLyController@postCaiDat')->name('postCaiDat');

   });

      //Cap nhat thong tin NV & ADMIN
      Route::get('thong-tin-ca-nhan', 'CommonController@getThongTinCaNhan')->name('getThongTinCaNhan');
      Route::post('thong-tin-ca-nhan', 'CommonController@postUpdateThongTinCaNhan')->name('postUpdateThongTinCaNhan');
      // Ajax
      Route::post('ajax-san-pham-hsx', 'AjaxController@postSanPhamTheoHSX')->name('postSanPhamTheoHSX');
      Route::post('ajax-doanh-thu', 'QuanLyController@ajaxDoanhThu')->name('ajaxDoanhThu');
      Route::get('ajax-list-san-pham', 'AjaxController@getListSanPhamAjax')->name('getListSanPhamAjax');
      Route::post('ajax-autocomplete-san-pham', 'AjaxController@autoCompleteSanPham')->name('auto-complate-sp');
});

