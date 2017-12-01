<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThongBaoDonHang extends Mailable
{
    use Queueable, SerializesModels;

    protected $donhang;

    public function __construct($donhang)
    {
        $this->donhang = $donhang;
    }

    public function build()
    {
        $donhang = $this->donhang;
        $chitietdonhang = $donhang->chitietdonhang;

        return $this->view('mail.thongbaodathang')
            ->subject('Thông báo đặt hàng')
            ->with([
                'txt_title' => 'Xin chào bạn ' .$donhang->khachhang->hovaten,
                'txt_link' => route('getChiTietDonHangKH', $donhang->madonhang),
                'txt_loinhan' => 'Bạn vừa đặt ' .count($chitietdonhang). ' sản phẩm',
                'donhang' => $donhang
            ]);
    }
}
