jQuery(document).ready(function($) {
// MAIN.JS
//--------------------------------------------------------------------------------------------------------------------------------
//This is main JS file that contains custom JS scipts and initialization used in this template*/
// -------------------------------------------------------------------------------------------------------------------------------
// Template Name: ELEGANCE.
// Author: Designova.
// Version 1.0 - Initial Release
// Website: http://www.designova.net 
// Copyright: (C) 2014 
// -------------------------------------------------------------------------------------------------------------------------------

/*global $:false */
/*global window: false */

(function(){
  "use strict";


$(function ($) {


    

    //Detecting viewpot dimension
     var vH = $(window).height();

    if ( $( "#wpadminbar" ).length) {
      vH = vH-30;
      $('.main-logo').css('bottom', '60px');
      $('.inner-mastwrap').css('min-height', vH-222+'px');
    }
    else{
      $('.inner-mastwrap').css('min-height', vH-230+'px');
    }

     //Adjusting Intro Components Spacing based on detected screen resolution
     $('.fullheight').css('height',vH);
     $('.halfheight').css('height',vH/2);
     $('.fullheightmin').css('min-height',vH);
  
   

    //Mobile Menu (multi level)
    $('ul.slimmenu').slimmenu({
        resizeWidth: '1200',
        collapserTitle: '',
        easingEffect:'easeInOutQuint',
        animSpeed:'medium',
    });

    $('.menu-collapser').prepend($('.mobile-nav-logo').html());

 //Navigation Sub Menu Triggering
    $('.trigger-sub-nav').live('click',function(){
        $('.sub-nav').slideUp('fast');
        $('.trigger-sub-nav').find('.main-nav').removeClass('nav-highlight');
        $(this).find('.main-nav').addClass('nav-highlight');
        $(this).find('.sub-nav').slideDown('slow');

    });

    $(window).bind('load', function () {
        var nav_height = $('.md-nav > ul').children('li').length;
        if(nav_height > 10)
        {
            $('.main-nav-wrap .mastnav').css('height', 'auto');
            $('.main-nav-wrap .mastnav').css('padding-top',vH-nav_height/2+'px');
            $('.main-nav-wrap .mastnav > div').removeClass('valign');
        }

        var main_area_page_content = $('.elegance-vc-inactive .elegance-main-content-area').closest('.container-fluid').html();
        main_area_page_content = '<div class="container">' + main_area_page_content + '</div>';
        $('.elegance-vc-inactive .elegance-main-content-area').closest('.container-fluid').html(main_area_page_content);
    });

    $(window).bind('load', function () {
      if( !device.tablet() && !device.mobile() ) {

          /* if non-mobile device is detected*/ 
            // Parallax Init
            $('.parallax-layer').each(function() {
                  $(this).parallax('20%', 0.2, true);
              });
                      
      } else {
          
          /* if mobile device is detected*/ 
          $('.parallax-layer').addClass('parallax-off');
      }
    });

    $('.elegance-txt-block .underline').each(function(){
      var txt_color = $(this).data('color');
      $(this).css('border-bottom','solid 1px '+txt_color);
    });

    $('.button-elegance').each(function(){
      var style_bak = $(this).attr('style');
      var new_bg = $(this).data('hover-bg');
      var new_color = $(this).data('hover-color');
      var parent_wrap = $(this).closest('span.button-elegance-wrap');
      var parent_wrap_style_bak = $(parent_wrap).attr('style');
      var new_border_color = $(parent_wrap).data('hover-border');

      $(this).mouseenter(function(){
        $(this).css('background',new_bg);
        $(this).css('color',new_color);
        $(parent_wrap).css('border','6px solid '+new_border_color);
      });

      $(this).mouseleave(function(){
        $(this).attr('style',style_bak);
        $(parent_wrap).attr('style',parent_wrap_style_bak);
      });
    });

    var pagination_links_content = $('.archive-pagination-links .prev-entries').html() + $('.archive-pagination-links .next-entries').html();
    if(pagination_links_content == '')
      $('.blog-pagination-section-wrap').hide();

    $('div.woocommerce').addClass('container');
    //$('.woocommerce form.login').addClass('');
    $('.woocommerce-account.woocommerce-page .woocommerce h2').wrap('<div class="row"><div class="col-md-6 col-md-offset-3"></div></div>');
    $('.woocommerce form.login').wrap('<div class="row"><div class="col-md-6 col-md-offset-3"></div></div>');
    $('.woocommerce .address .edit').addClass('btn button-elegance');
    $('.woocommerce-page .woocommerce-info').addClass('font2');
    $('.woocommerce-page .button').addClass('btn button-elegance font3');
    $('.woocommerce-page ul.products li h3').addClass('shop-item-name font2');
    $('.woocommerce-page ul.products li .price').addClass('shop-item-price font4');
    $('.woocommerce-page ul.products li .price span').addClass('shop-item-price-old color font4');
    $('.woocommerce-page ul.products li a:nth-child(2)').addClass('btn btn-small btn-elegance btn-elegance-black');
    $('.woocommerce-page .shopping_cart_dropdown a.view-cart').addClass('btn btn-small btn-elegance btn-elegance-black');
    $('.woocommerce-page .summary .variations a').addClass('btn btn-small btn-elegance btn-elegance-black');
    $('.woocommerce-page ul.products li a:nth-child(2)').removeClass('button');
    $('.woocommerce-page ul.products li a.add_to_car.t_button').prepend('<i class="glyphicon glyphicon-shopping-cart"></i>');
    $('.woocommerce-page ul.products li a.added_to_cart').prepend('<i class="glyphicon glyphicon-list"></i>');
    var offer_price_txt = $('.offer-price-txt').html();
    $('.woocommerce-page ul.products li.sale').prepend('<div class="shop-item-tag black-bg"><div class="valign">'+offer_price_txt+'</div></div>');
    var outofstock_txt = $('.outofstock-txt').html();
    $('.woocommerce-page ul.products li.outofstock').prepend('<div class="shop-item-tag silver-bg"><div class="valign">'+outofstock_txt+'</div></div>');
    var item_featured_txt = $('.featured-item-txt').html();
    $('.woocommerce-page ul.products li.featured').prepend('<div class="shop-item-tag color-bg"><div class="valign">'+item_featured_txt+'</div></div>');
    $('.woocommerce-page.single-product .product .summary .product_title').addClass('shop-mainheading font1');
    $('.woocommerce-page.single-product .product .summary p').addClass('dark');
    $('.woocommerce-page.single-product .product .summary .price del span').addClass('silver font4');
    $('.woocommerce-page.single-product .product .summary .price ins span').addClass('color font4');
    $('.woocommerce-page.single-product .product .summary .price ins').addClass('shop-item-price-old color font4');
    $('.woocommerce-page ul.products li .price ins').addClass('shop-item-price-old color font4');
    $('.woocommerce-page.single-product .product .summary form.cart button.single_add_to_cart_button').before('<div class="clear"></div>');
    $('.woocommerce-page.single-product .product .summary form.cart button.single_add_to_cart_button').prepend('<i class="glyphicon glyphicon-shopping-cart"></i>');
    $('.woocommerce-page.single-product #review_form .comment-form #submit').addClass('btn button button-elegance font3');
    $('.woocommerce-page.single-product .product .related.products h2').addClass('shop-subheading white-bg');
    $('.woocommerce-tabs ul.tabs li a').addClass('font2');
    $('.woocommerce-page.single-product .product .summary .price > span').addClass('color font4');
    $('.woocommerce-page.single-product .product.sale .woocommerce-main-image').prepend('<div class="shop-item-tag black-bg"><div class="valign">'+offer_price_txt+'</div></div>');
    $('.woocommerce-page.single-product .product.outofstock .woocommerce-main-image').prepend('<div class="shop-item-tag silver-bg"><div class="valign">'+outofstock_txt+'</div></div>');
    $('.woocommerce-page.single-product .product.featured .woocommerce-main-image').prepend('<div class="shop-item-tag color-bg"><div class="valign">'+item_featured_txt+'</div></div>');
    //$('.shopping_cart_dropdown a.view-cart').addClass('btn button-elegance font3');
    $('.variations_form.cart select').live('change', function(){
        setTimeout(function() {
            $('.woocommerce-page.single-product .product .summary .price del span').addClass('silver font4');
            $('.woocommerce-page.single-product .product .summary .price ins span').addClass('color font4');
            $('.woocommerce-page.single-product .product .summary .price > span').addClass('shop-item-price-old color font4');
        }, 1);
    });


    $('.md-nav .sub-menu, .md-nav .children').addClass('sub-nav');
    $('.md-nav .menu-item-has-children, .md-nav .page_item_has_children').addClass('trigger-sub-nav');
    $('.md-nav .menu-item-has-children a:first-child, .md-nav .page_item_has_children a:first-child').addClass('main-nav black ease');
    $('.md-nav .sub-menu a').addClass('font2 black ease');
    $('.wp-caption-text').addClass('font2');
    $('#post-comment, input[type="submit"]').addClass('btn btn-small btn-elegance btn-elegance-black font3');
    
    $('.md-nav .main-nav.nav-highlight').live('click', function(){

      return true;
    });
    $('.md-nav .menu-item a.main-nav:not(.nav-highlight), .md-nav .page_item a.main-nav:not(.nav-highlight)').live('click', function(){
      $(this).closest('li').trigger('click');
      return false;
    });
     
    

    $('#contactForm').submit(function(){
        $('.md-content').hide();
        $('.launch_modal').trigger("click");

        $.ajax({
          type: $("#contactForm").attr('method'),
          url: $("#contactForm").attr('action'),
          data: $("#contactForm").serialize(),
          success: function(data) {
            if(data == 'success')
            {
                $('#contactForm').each (function(){
                    this.reset();
                });
                $('.md-content').show();
            }
            else
            {
              $('.md-content').show();
              $('.md-content h3').html('Something went wrong!');
              $('.md-content p').html('Please try again.');
            }
          }
        });
        return false;
    });
    
    $('.comment-reply-link').addClass('btn btn-elegance btn-elegance-black');

    $(".elegance-carousel").owlCarousel({
        navigation : false,
        pagination: true,
        responsive: true,
        items: 1,
        touchDrag: true,
        navigationText: false,
        mouseDrag: true,
        itemsDesktop: [3000,1],
        itemsDesktopSmall: [1440,1],
        itemsTablet:[1024,1],
        itemsTabletSmall: [600,1],
        itemsMobile: [360,1],
        autoPlay: false,
        autoHeight: true,
    });

    $(".std-showcase-page .fullscreen-carousel").owlCarousel({
        navigation : false,
        pagination: true,
        responsive: true,
        items: 1,
        touchDrag: true,
        navigationText: false,
        mouseDrag: true,
        itemsDesktop: [3000,1],
        itemsDesktopSmall: [1440,1],
        itemsTablet:[1024,1],
        itemsTabletSmall: [600,1],
        itemsMobile: [360,1],
        autoPlay: true,
        autoHeight: false,
        beforeMove: beforeMoving,
        afterMove: afterMoving,
    });

    $(".agency-showcase-page .fullscreen-carousel").owlCarousel({
        navigation : false,
        pagination: true,
        responsive: true,
        items: 1,
        touchDrag: true,
        navigationText: false,
        mouseDrag: true,
        itemsDesktop: [3000,1],
        itemsDesktopSmall: [1440,1],
        itemsTablet:[1024,1],
        itemsTabletSmall: [600,1],
        itemsMobile: [360,1],
        autoPlay: false,
        autoHeight: false,
      });

    $(".promo-showcase-page .fullscreen-carousel").owlCarousel({
        navigation : false,
        pagination: true,
        responsive: true,
        singleItem: true,
        touchDrag: true,
        navigationText: false,
        mouseDrag: true,
        autoPlay: false,
        autoHeight: false,
        transitionStyle : "fadeUp"
      });


    $('.bxslider').bxSlider({
        preloadImages: 'visible',
        touchEnabled: true,
        responsive: true,
        pager: false,
        controls: true
      });

    $('.venobox, .image-lightbox-link').venobox({
    numeratio: true
    }); 




function beforeMoving() {
    $('.std-showcase-page .fullscreen-carousel .item .inner-overlay .valign').slideUp(50);
}
function afterMoving() {
    $('.std-showcase-page .fullscreen-carousel .item .inner-overlay .valign').delay(800).slideDown();
}



});
// $(function ($)  : ends

})();
//  JSHint wrapper $(function ($)  : ends

});