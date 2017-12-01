<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <style type="text/css" rel="stylesheet" media="all">
         /* Media Queries */
         @media only screen and (max-width: 500px) {
         .button {
         width: 100% !important;
         }
         }
      </style>
   </head>
   <?php
      $style = [
          /* Layout ------------------------------ */
      
          'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
          'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',
      
          /* Masthead ----------------------- */
      
          'email-masthead' => 'padding: 25px 0; text-align: center;',
          'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',
      
          'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
          'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
          'email-body_cell' => 'padding: 35px;',
      
          'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
          'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',
      
          /* Body ------------------------------ */
      
          'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
          'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',
      
          /* Type ------------------------------ */
      
          'anchor' => 'color: #3869D4;',
          'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
          'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
          'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
          'paragraph-center' => 'text-align: center;',
      
          /* Buttons ------------------------------ */
      
          'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                       background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                       text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',
      
          'button--green' => 'background-color: #22BC66;',
          'button--red' => 'background-color: #dc4d2f;',
          'button--blue' => 'background-color: #3869D4;',
      ];
      ?>
   <?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>
   <body style="{{ $style['body'] }}">
      <table width="100%" cellpadding="0" cellspacing="0">
         <tr>
            <td style="{{ $style['email-wrapper'] }}" align="center">
               <table width="100%" cellpadding="0" cellspacing="0">
                  <!-- Logo -->
                  <tr>
                     <td style="{{ $style['email-masthead'] }}">
                        <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ url('/') }}" target="_blank">
                        {{ config('app.name') }}
                        </a>
                     </td>
                  </tr>
                  <!-- Email Body -->
                  <tr>
                     <td style="{{ $style['email-body'] }}" width="100%">
                        <table style="width: 100%" cellpadding="0" cellspacing="0">
                           <tr>
                              <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                 <!-- Greeting -->
                                 <h1 style="{{ $style['header-1'] }}">
                                    {{ $txt_title }}
                                 </h1>
                                 <hr style="border: 1px solid #eee;">
                                 <p style="{{ $style['paragraph'] }}">{{ $txt_loinhan }}</p>
                                 @php
				                      $tiendonhang = 0;
				                     @endphp
				                     <table width="919">
											   <tbody>
											      <tr style="background-color: #691af0; border-color: #0f2eb8; height: 40px;">
											         <td style="width: 157px; text-align: center;"><span style="color: #ffffff;"><strong>Mã sản phẩm</strong></span></td>
											         <td style="width: 157px; text-align: center;"><span style="color: #ffffff;"><strong>Tên sản phẩm</strong></span></td>
											         <td style="width: 157px; text-align: center;"><span style="color: #ffffff;"><strong>Giá bán</strong></span></td>
											         <td style="width: 157px; text-align: center;"><span style="color: #ffffff;"><strong>Số lượng</strong></span></td>
											         <td style="width: 157px; text-align: center;"><span style="color: #ffffff;"><strong>Thành tiền</strong></span></td>
											      </tr>
											      @foreach ($donhang->chitietdonhang as $chitietdonhang)
											      <tr style="height: 30px;">
											         <td style="width: 157px; text-align: center;">{{ $chitietdonhang->sanpham->masanpham }}</td>
											         <td style="width: 257px; text-align: center;"><a href="{{ route('getChiTietSanPham', $chitietdonhang->sanpham->slugsp) }}">{{ $chitietdonhang->sanpham->tensanpham }}
						                        </a>
						                        </td>
											         <td style="width: 157px; text-align: center;">{{ number_format($chitietdonhang->giaban) }}</td>
											         <td style="width: 157px; text-align: center;">{{  number_format($chitietdonhang->soluong) }}</td>
											         @php
							                        $thanhtien = $chitietdonhang->soluong * $chitietdonhang->giaban;
							                        $tiendonhang += $thanhtien;
							                     @endphp
											         <td style="width: 157px; text-align: center;">{{ number_format($thanhtien) }}</td>
											      </tr>
											      @endforeach
											      @php
							                  $option = json_decode($donhang->options);
							                  $tienphaitra =  $tiendonhang * (1 - ($option->phantramgiamgia/100));
							                  $sotiengiamgia = $tiendonhang - $tienphaitra;
							                  $tongtien = $tienphaitra  + $option->phivanchuyen;
							                  @endphp
													<tr style="height: 30px;">
													   <td style="width: 157px; text-align: right;" colspan="4"><span style="color: #0000ff;"><strong>Tiền đơn hàng</strong></span></td>
													   <td style="width: 157px; text-align: center;">{{ number_format($tiendonhang) }}</td>
													</tr>
													<tr style="height: 30px;">
													   <td style="width: 157px; text-align: right;" colspan="4"><span style="color: #0000ff;"><strong>Phí vận chuyển</strong></span></td>
													   <td style="width: 157px; text-align: center;">{{ number_format($option->phivanchuyen) }}</td>
													</tr>
													<tr style="height: 30px;">
													   <td style="width: 157px; text-align: right;" colspan="4"><span style="color: #0000ff;"><strong>Tiền giảm giá</strong></span></td>
													   <td style="width: 157px; text-align: center;">{{ number_format($sotiengiamgia) }}</td>
													</tr>
													<tr style="height: 30px;">
													   <td style="width: 157px; text-align: right;" colspan="4"><span style="color: #0000ff;"><strong>Tổng tiền</strong></span></td>
													   <td style="width: 157px; text-align: center;">{{ number_format($tongtien) }}</td>
													</tr>
											   </tbody>
											</table>
                                 <!-- Action Button -->
                                 <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td align="center">
                                          <a href="{{ $txt_link }}"
                                             style="{{ $fontFamily }} {{ $style['button'] }} {{ $style['button--blue'] }}"
                                             class="button"
                                             target="_blank">
                                          Xem chi tiết
                                          </a>
                                       </td>
                                    </tr>
                                 </table>
                                 <!-- Outro -->
                                 <!-- Salutation -->
                                 <p style="{{ $style['paragraph'] }}">
                                    Thân chào,<br>{{ config('app.name') }}
                                 </p>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
                  <!-- Footer -->
                  <tr>
                     <td>
                        <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                           <tr>
                              <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                 <p style="{{ $style['paragraph-sub'] }}">
                                    &copy; {{ date('Y') }}
                                    <a style="{{ $style['anchor'] }}" href="{{ url('/') }}" target="_blank">{{ config('app.name') }}</a>.
                                    All rights reserved.
                                 </p>
                              </td>
                           </tr>
                        </table>
                     </td>
                  </tr>
               </table>
            </td>
         </tr>
      </table>
   </body>
</html>