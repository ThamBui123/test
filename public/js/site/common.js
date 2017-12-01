function slideEffectAjax() {
    jQuery(".top-cart-contain").mouseenter(function() {
        jQuery(this).find(".top-cart-content").stop(false, false).slideDown()
    }), jQuery(".top-cart-contain").mouseleave(function() {
        jQuery(this).find(".top-cart-content").stop(false, false).slideUp()
    })
}
	
jQuery(document).ready(function() {
        "use strict";
		/* menu */
        jQuery(".toggle").click(function() {
            return jQuery(".submenu").is(":hidden") ? jQuery(".submenu").slideDown("fast") : jQuery(".submenu").slideUp("fast"), !1
        }), jQuery(".topnav").accordion({
            accordion: !1,
            speed: 300,
            closedSign: "+",
            openedSign: "-"
        }), jQuery("#nav > li").hover(function() {
            var e = jQuery(this).find(".level0-wrapper");
            e.hide(), e.css("left", "0"), e.stop(true, true).delay(150).fadeIn(300, "easeOutCubic")
        }, function() {
            jQuery(this).find(".level0-wrapper").stop(true, true).delay(300).fadeOut(300, "easeInCubic")
        });
        jQuery("#nav li.level0.drop-menu").mouseover(function() {
            return jQuery(window).width() >= 740 && jQuery(this).children("ul.level1").fadeIn(100), !1
        }).mouseleave(function() {
            return jQuery(window).width() >= 740 && jQuery(this).children("ul.level1").fadeOut(100), !1
        }), jQuery("#nav li.level0.drop-menu li").mouseover(function() {
            if (jQuery(window).width() >= 740) {
                jQuery(this).children("ul").css({
                    top: 0,
                    left: "158px"
                });
                var e = jQuery(this).offset();
                e && jQuery(window).width() < e.left + 325 ? (jQuery(this).children("ul").removeClass("right-sub"), jQuery(this).children("ul").addClass("left-sub"), jQuery(this).children("ul").css({
                    top: 0,
                    left: "-155px"
                })) : (jQuery(this).children("ul").removeClass("left-sub"), jQuery(this).children("ul").addClass("right-sub")), jQuery(this).children("ul").fadeIn(100)
            }
        }).mouseleave(function() {
            jQuery(window).width() >= 740 && jQuery(this).children("ul").fadeOut(100)
        }), 

		 jQuery("#product-slider .slider-items").owlCarousel({
            items: 6,
            itemsDesktop: [1199, 4],
            itemsDesktopSmall: [991, 3],
            itemsTablet: [600, 2],
            itemsMobile: [320, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1
        }),  

		 jQuery("#brand-logo-slider .slider-items").owlCarousel({
            autoPlay: !0,
            items: 8,
            itemsDesktop: [1024, 8],
            itemsDesktopSmall: [900, 3],
            itemsTablet: [600, 2],
            itemsMobile: [320, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1
        }), 

		jQuery("#home-slider .slider-items").owlCarousel({
            autoPlay: !0,
            items: 1,
            itemsDesktop: [1024, 1],
            itemsDesktopSmall: [900, 1],
            itemsTablet: [600, 1],
            itemsMobile: [320, 1],
            navigation: !0,
            navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
            slideSpeed: 500,
            pagination: !1
        }), 
	
		 jQuery(document).ready(function() {
            jQuery(".subDropdown")[0] && jQuery(".subDropdown").click(function() {
                jQuery(this).toggleClass("plus"), jQuery(this).toggleClass("minus"), jQuery(this).parent().find("ul").slideToggle()
            })
        }), jQuery().UItoTop()
    }), 
    jQuery(window).scroll(function() {
        jQuery(this).scrollTop() > 99 ? jQuery("nav").addClass("sticky") : jQuery("nav").removeClass("sticky")
    }),

    function(e) {
        jQuery.fn.UItoTop = function(i) {
            var t = {
                    text: "",
                    min: 200,
                    inDelay: 600,
                    outDelay: 400,
                    containerID: "toTop",
                    containerHoverID: "toTopHover",
                    scrollSpeed: 1200,
                    easingType: "linear"
                },
                n = e.extend(t, i),
                s = "#" + n.containerID,
                a = "#" + n.containerHoverID;
            jQuery("body").append('<a href="#" id="' + n.containerID + '">' + n.text + "</a>"), jQuery(s).hide().click(function() {
                return jQuery("html, body").animate({
                    scrollTop: 0
                }, n.scrollSpeed, n.easingType), jQuery("#" + n.containerHoverID, this).stop().animate({
                    opacity: 0
                }, n.inDelay, n.easingType), !1
            }).prepend('<span id="' + n.containerHoverID + '"></span>').hover(function() {
                jQuery(a, this).stop().animate({
                    opacity: 1
                }, 600, "linear")
            }, function() {
                jQuery(a, this).stop().animate({
                    opacity: 0
                }, 700, "linear")
            }), jQuery(window).scroll(function() {
                var i = e(window).scrollTop();
                "undefined" == typeof document.body.style.maxHeight && jQuery(s).css({
                    position: "absolute",
                    top: e(window).scrollTop() + e(window).height() - 50
                }), i > n.min ? jQuery(s).fadeIn(n.inDelay) : jQuery(s).fadeOut(n.Outdelay)
            })
        }
    }(jQuery), jQuery(document).ready(function() {
        slideEffectAjax()
    }), jQuery.extend(jQuery.easing, {
        easeInCubic: function(e, i, t, n, s) {
            return n * (i /= s) * i * i + t
        },
        easeOutCubic: function(e, i, t, n, s) {
            return n * ((i = i / s - 1) * i * i + 1) + t
        }
    }),

    function(e) {
        e.fn.extend({
            accordion: function() {
                return this.each(function() {})
            }
        })
    }(jQuery), jQuery(function(e) {
        e(".accordion").accordion(), e(".accordion").each(function() {
            var i = e(this).find("li.active");
            i.each(function(t) {
                e(this).children("ul").css("display", "block"), t == i.length - 1 && e(this).addClass("current")
            })
        })
    }),
    function(e) {
        e.fn.extend({
            accordion: function(i) {
                var t = {
                        accordion: "true",
                        speed: 300,
                        closedSign: "[+]",
                        openedSign: "[-]"
                    },
                    n = e.extend(t, i),
                    s = e(this);
                s.find("li").each(function() {
                    0 != e(this).find("ul").size() && (e(this).find("a:first").after("<em>" + n.closedSign + "</em>"), "#" == e(this).find("a:first").attr("href") && e(this).find("a:first").click(function() {
                        return !1
                    }))
                }), s.find("li em").click(function() {
                    0 != e(this).parent().find("ul").size() && (n.accordion && (e(this).parent().find("ul").is(":visible") || (parents = e(this).parent().parents("ul"), visible = s.find("ul:visible"), visible.each(function(i) {
                        var t = !0;
                        parents.each(function(e) {
                            return parents[e] == visible[i] ? (t = !1, !1) : void 0
                        }), t && e(this).parent().find("ul") != visible[i] && e(visible[i]).slideUp(n.speed, function() {
                            e(this).parent("li").find("em:first").html(n.closedSign)
                        })
                    }))), e(this).parent().find("ul:first").is(":visible") ? e(this).parent().find("ul:first").slideUp(n.speed, function() {
                        e(this).parent("li").find("em:first").delay(n.speed).html(n.closedSign)
                    }) : e(this).parent().find("ul:first").slideDown(n.speed, function() {
                        e(this).parent("li").find("em:first").delay(n.speed).html(n.openedSign)
                    }))
                })
            }
        })
    }(jQuery),

    function(e) {
        e.fn.extend({
            accordionNew: function() {
                return this.each(function() {
                    function i(i, n) {
                        e(i).parent(r).siblings().removeClass(s).children(l).slideUp(o), e(i).siblings(l)[n || a]("show" == n ? o : !1, function() {
                            e(i).siblings(l).is(":visible") ? e(i).parents(r).not(t.parents()).addClass(s) : e(i).parent(r).removeClass(s), "show" == n && e(i).parents(r).not(t.parents()).addClass(s), e(i).parents().show()
                        })
                    }
                    var t = e(this),
                        n = "accordiated",
                        s = "active",
                        a = "slideToggle",
                        l = "ul, div",
                        o = "fast",
                        r = "li";
                    if (t.data(n)) return !1;
                    e.each(t.find("ul, li>div"), function() {
                        e(this).data(n, !0), e(this).hide()
                    }), e.each(t.find("em.open-close"), function() {
                        e(this).click(function() {
                            return void i(this, a)
                        }), e(this).bind("activate-node", function() {
                            t.find(l).not(e(this).parents()).not(e(this).siblings()).slideUp(o), i(this, "slideDown")
                        })
                    });
                    var d = location.hash ? t.find("a[href=" + location.hash + "]")[0] : t.find("li.current a")[0];
                    d && i(d, !1)
                })
            }
        })
    }(jQuery);

    $(document).ready(function(){
    
    window.setTimeout(function() {
        $(".my-alert").fadeTo(1500, 0.4).slideUp(1500, function() {
            $(this).remove()
        })
    }, 5000);
});

function thongbaoloi(thongbao) {
  $.confirm({
    title: 'Thông báo',
    content: thongbao,
    autoClose: 'cancelAction|3000',
    type: "blue",
    typeAnimated: true,
    buttons: 
    {
      'Đóng': function(){}
      // cancelAction:  {
      //   text: 'Tự động đóng lại sau ',
      //   action: function () {
      //   }
      // }
    }
  });
}

function _load_model_cart()
{
  $(".mini-cart").load('../model-cart');
  $.confirm({
    'title': 'Chi tiết giỏ hàng của bạn',
    content: 'url:../box-cart',
    buttons: {
        TiepTuc: {
          text: 'Tiếp tục mua hàng',
          btnClass: 'btn-success',
          action: function(){
          }
        },
        // 'Thanh toán': function(){
        //   link = $('#link_box_thanhtoan').data('link');
        //   window.location = link;
        // },
        GioHang: {
          text: 'Giỏ hàng',
          btnClass: 'btn-blue',
          action: function(){
            window.location = '../gio-hang';
          }
        },
        DongBo: {
          text: 'Đóng',
          btnClass: 'btn-red',
          action: function(){
            
          }
        },
    },
    closeIcon: true,
    // boxWidth: '60%',
    // useBootstrap: false,
    columnClass: 'col-md-10 col-md-offset-1'
  });
}

var token = document.getElementById('token_key').value;
var cart = {
  'add': function(idsanpham, product_detail = true, soluongtoida = 1) {
    if(product_detail == true)
        soluong = document.getElementById('inputnumber').value;
    else soluong = 1;
    if( !$.isNumeric( soluong ) || soluong <= 0)
    {
      thongbaoloi('Số lượng không hợp lệ');
      return false;
    }

    if(parseInt(soluong) > parseInt(soluongtoida))
    {
      thongbaoloi('Bạn chỉ được mua tối đa ' + soluongtoida + ' sản phẩm !!!');
      return false;
    }

    if( !$.isNumeric( idsanpham ) || idsanpham <= 0)
    {
      thongbaoloi('Sản phẩm không hợp lệ');
      return false;
    }

    $.ajax({
      url: '../add-cart',
      type: 'post',
      data: {
        'idsanpham': idsanpham,
        'soluong': (typeof(soluong) != 'undefined' ? soluong : 1),
        '_token': token
      },
      dataType: 'text',
      success: function(data) {
        if(data == 'error')
        {
          thongbaoloi('Lỗi thực hiện');
          return false;
        }
        if(data == 'soluongtoida')
        {
          thongbaoloi('Bạn không được phép mua quá số lượng tối đa của sản phẩm này');
          return false;
        }
        if(data == 'false')
        {
          $.confirm({
            title: 'Sản phẩm này hiện tại hết hàng!',
            content: 'Bạn có chấp nhận đặt hàng trước không nếu đặt trước thì quá trình giao hàng có thể chậm hơn?',
            buttons: 
            {
              'Không': function () {
                
              },
              somethingElse: 
              {
                text: 'Đồng ý',
                btnClass: 'btn-blue',
                action: function()
                {
                  $.ajax({
                    url: '../add-cart',
                    type: 'post',
                    data: {
                      'idsanpham': idsanpham,
                      'soluong': (typeof(soluong) != 'undefined' ? soluong : 1),
                      'muatruoc': 1,
                      '_token': token
                    },
                    dataType: 'text',
                    success: function(data) 
                    {
                      _load_model_cart();
                    }
                  });
                }
              }
            }
          });
        }
        if(data == 'true')
        {
          _load_model_cart();
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        thongbaoloi('Lỗi thực hiện');
      }
    });
  },

  'remove': function(rowid)
  {
    $.confirm({
      title: 'Xác nhận',
      content: 'Bạn có chắc chắn xóa sản phẩm này không?',
      autoClose: 'cancelAction|3000',
      type: "blue",
      typeAnimated: true,
      buttons: 
      {
        'Đồng ý': function(){
          $.ajax({
            url: '../remove-cart',
            type: 'post',
            data: {
              'rowid': rowid,
              '_token': token
            }, 
            dataType: 'text',
            success: function(data) {
              $('#ajax-giohang').html(data);
              $(".mini-cart").load('../model-cart');
              $('#quick-ajax-load-cart').load('../table-box-cart');
            },
            error: function(xhr, ajaxOptions, thrownError) {
              alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
          });
        },
        // cancelAction:  
        // {
        //   text: 'Tự động hủy sau ',
        //   action: function () {}
        // }
        'Đóng': function(){}
      }
    });
  },

'destroy': function(url)
  {
    $.confirm({
      title: 'Xác nhận',
      content: 'Bạn có chắc chắn hủy giỏ hàng không?',
      autoClose: 'cancelAction|3000',
      type: "blue",
      typeAnimated: true,
      buttons: 
      {
        'Đồng ý': function(){
          $.ajax({
              url: 'destroy-cart',
              type: 'post',
              data: '_token=' + token,
              dataType: 'text',
              success: function(data) {
                window.location = url;
              },
              error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
              }
          });
        },
        // cancelAction:  
        // {
        //   text: 'Tự động hủy sau ',
        //   action: function () {}
        // }
        'Đóng': function(){}
      
      }
    });
  }
}

$('#search').autocomplete({
    minLength: 3,
    source: function (request, response) {
    $.ajax({
      type: "POST",
      url: "../auto-search",
      data: {
        'term' : request.term,
        '_token' : token,
        'theloai_id' : $('#main-search-key').val()
      },
      dataType: "json",
      success: response
    });
  },
  select: function( event, ui ) {
    window.location = ui.item.lienket;
  }
}).autocomplete( "instance" )._renderItem = function( ul, item ) 
{
  return $( "<li>" )
    .append( "<div><img src='"+item.img+"' width='30px' height='auto'/> <b>" + item.label + "</b><br><small style='margin-left:30px'>" + item.desc + "</small></div>" )
    .appendTo( ul );
};

$('#search_sanpham_sosanh').autocomplete({
      minLength: 3,
      source: function (request, response) {
      $.ajax({
        type: "POST",
        url: "../search-so-sanh",
        data: {
          'term' : request.term,
          '_token' : token
        },
        dataType: "json",
        success: response
      });
    },
    select: function( event, ui ) {
      $.ajax({
        type: "POST",
        url: "../ajax-so-sanh",
        data: {
          'sanpham_id': ui.item.sanpham_id,
           '_token' : token
        },
        dataType: "text",
        success: function(data)
        {
          if(data == "false")
          {
            thongbaoloi('Bạn đã thêm sản phẩm này rồi');
          }
          else if(data == "false_more")
          {
            thongbaoloi('Số lượng tối đa để so sánh là 3');
          }
          else
          {
            $('#ajaxBangSoSanh').html(data);
          }
        }
      });

      $('#search_sanpham_sosanh').val(ui.item.value);
    }
  });

function xacnhan_redirect(url) {
  $.confirm({
    title: 'Xác nhận',
    content: 'Bạn có chắc chắn không?',
   // autoClose: 'cancelAction|3000',
    type: "red",
    typeAnimated: true,
    boxWidth: '500px',
    useBootstrap: false,
    icon: 'icon-warning-sign',
    buttons: 
    {
      'Đồng ý': function(){
        window.location = url;
      },
      'Đóng': function(){
       
      }
      // cancelAction:  
      // {
      //   text: 'Tự động hủy sau ',
      //   action: function () {}
      // }
    }
  });
}

$('#submit_binhluan').click(function(){
  var noidung_binhluan = $('#noidung_binhluan');
  $('#noidung_binhluan').css('border-color', '#ddd');
  $('.form-error').remove();
  sanpham_id = $(this).data('id');
  parent_id = $('#parent_id').val();

  if(noidung_binhluan.val().length < 30)
  {
    $('#noidung_binhluan').css('border-color', 'rgb(185, 74, 72)');
    noidung_binhluan.parents('.input-box').append("<span class='help-block form-error'>Vui lòng nhập bình luận hơn 30 ký tự</span>");
      return false;
  }
  else
  {
      $.ajax({
      type: 'post',
      url: '../tai-khoan/binh-luan',
      dataType: 'text',
      data: {
        'sanpham_id': sanpham_id,
        'parent_id': parent_id,
        'noidung': noidung_binhluan.val(),
        '_token': token
      },
      success: function()
      {
        thongbaoloi('Bình luận của bạn đã được gửi');
        location.reload(true);
      }
    });
    
  }
 
});

$.validate(
{
  lang: 'vi',
  modules : 'date, security',
  scrollToTopOnError : false
});

$(".click_scoll").click(function(e) {
  scroll_to = $(this).data('scroll');
  e.preventDefault();
  $('html, body').animate({
      scrollTop: $(scroll_to).offset().top-100
  }, 1000, 'easeOutExpo');
});

$('._shareButton').click(function(){
  link = $(this).attr('href');
  window.open(link, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');
  return false;
});
$('form').attr('autocomplete', 'off');
console.clear();
styles_console = [
    'background: #7de659'
    , 'border: 1px solid #7de659'
    , 'color: white'
    , 'display: block'
    , 'text-shadow: 0 1px 0 rgba(0, 0, 0, 0.3)'
    , 'box-shadow: 0 1px 0 rgba(255, 255, 255, 0.4) inset, 0 5px 3px -5px rgba(0, 0, 0, 0.5), 0 -13px 5px -10px rgba(255, 255, 255, 0.4) inset'
    , 'line-height: 120px'
    , 'text-align: center'
    , 'font-weight: bold'
    , 'padding: 100px'
].join(';');

console.log('%c Chào mừng bạn đến với FreshShop ?', styles_console);