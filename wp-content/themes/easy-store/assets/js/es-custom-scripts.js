jQuery(document).ready(function($) {

    "use strict";

    if($('body').hasClass("rtl")) {
        var rtlValue = true;
    } else {
        var rtlValue = false;
    }

    /**
     * Slider script
     */
    $('.es-slider').each(function(){

        var Id = $(this).parents('.widget').attr('id');

        $('#'+Id+" .esSlider").lightSlider({
            item: 1,
            pager: false,
            loop: true,
            auto: true,
            speed: 1000,
            pause: 8000,
            slideMargin: 0,
            enableTouch: false,
            enableDrag: false,
            rtl: rtlValue,
            prevHtml: '<i class="fa fa-angle-left"></i>',
            nextHtml: '<i class="fa fa-angle-right"></i>',
            onSliderLoad: function() {
                $('.esSlider').removeClass( 'cS-hidden' );
            }
        });
    });

    /**
     * Featured Products carousel layout
     */
    $('.featured-carousel').each(function() {
        var Id = $(this).parents('.widget').attr('id');
        var NewId = Id;
        NewId = $('#' + Id + " .featuredProducts").lightSlider({
            loop: true,
            pager: false,
            controls: false,
            slideMargin:30,
            enableTouch: false,
            enableDrag: false,
            item: 4,
            rtl: rtlValue,
            onSliderLoad: function() {
                $('.featuredProducts').removeClass('cS-hidden');
            },
            responsive: [{
                breakpoint: 981,
                    settings: {
                        item: 3,
                        slideMove: 1,
                        slideMargin: 6,
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        item: 2,
                        slideMove: 1,
                        slideMargin: 6,
                    }
                },
                {
                    breakpoint: 601,
                    settings: {
                        item: 1,
                        slideMove: 1,
                    }
                }
            ]
        });

        $('#' + Id + ' .es-navPrev').click(function() {
            NewId.goToPrevSlide();
        });
        $('#' + Id + ' .es-navNext').click(function() {
            NewId.goToNextSlide();
        });
    });


    /**
     * Testimonail slider script
     */
    $(".es-testimonials-wrapper").lightSlider({
        item: 2,
        pager: true,
        loop: true,
        slideMargin:30,
        auto: true,
        speed: 3000,
        pause: 10000,
        enableTouch: false,
        enableDrag: true,
        rtl: rtlValue,
        controls:false,
        prevHtml: '<i class="fa fa-angle-left"></i>',
        nextHtml: '<i class="fa fa-angle-right"></i>',
        onSliderLoad: function() {
            $('.es-testimonials-wrapper').removeClass( 'cS-hidden' );
        },
        responsive: [{
                    breakpoint: 769,
                    settings: {
                        item: 1,
                        slideMove: 1,
                    }
                }
            ]
    });

    /**
     * Testimonail slider script
     */
    $(".es-sponsors-wrapper .items-wrap").lightSlider({
        item: 4,
        pager: false,
        loop: true,
        slideMargin:50,
        auto: true,
        speed: 3000,
        pause: 10000,
        enableTouch: false,
        enableDrag: true,
        rtl: rtlValue,
        controls:false,
        prevHtml: '<i class="fa fa-angle-left"></i>',
        nextHtml: '<i class="fa fa-angle-right"></i>',
        onSliderLoad: function() {
            $('.es-testimonials-wrapper').removeClass( 'cS-hidden' );
        },
        responsive: [{
                breakpoint: 981,
                    settings: {
                        item: 4,
                        slideMove: 1,
                        slideMargin: 6,
                    }
                },
                {
                    breakpoint: 769,
                    settings: {
                        item: 3,
                        slideMove: 1,
                        slideMargin: 6,
                    }
                },
                {
                    breakpoint: 601,
                    settings: {
                        item: 2,
                        slideMove: 1,
                    }
                }
            ]
    });

    /**
     * Go to top
     */
    $('#es-scrollup').click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });


    /* jquery to increase category Sidebar according to slider */
    $(window).on("load",function(){
        var contentHeight = $('.es-slider-section').outerHeight();
        $('.es-slider-cat-menu').css('height',contentHeight);
    });

     /* jquery to increase category Sidebar according to slider */
    $(window).on("load",function(){
        $(".product-categories").mCustomScrollbar({
            autoHideScrollbar:true,
        });
    });

    /**
     * ajax call for wishlist count
     */
    $('.add_to_wishlist').on('click', function(){
        
        var counter = $('.es-wishlist-wrap .es-wl-counter');

        $.ajax({
            url: yith_wcwl_l10n.ajax_url,
            data: {
            action: 'easy_store_yith_wcwl_update_wishlist_count'
            },
            dataType: 'json',
            success: function( data ){
            counter.html( '( '+ data.count + ' )' );
            }
        })
    });

    
    //responsive menu toggle

    $('.es-main-menu-wrapper .menu-toggle').click(function(event) {
        $('.es-main-menu-wrapper #site-navigation').toggleClass( 'isActive' ).slideToggle('slow');
        var element = document.querySelector( '.mt-header-menu-wrap' );
        if( element ) {
            $(document).on('keydown', function(e) {
                if( element.querySelectorAll( '.es-main-menu-wrapper #site-navigation.isActive' ).length === 1 ) {
                    var focusable = element.querySelectorAll( 'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                    var firstFocusable = focusable[0];
                    var lastFocusable = focusable[focusable.length - 1];
                    easy_store_focus_trap( firstFocusable, lastFocusable, e );
                }
            })
        }
    });

    //responsive sub menu toggle
    $('<a class="sub-toggle" href="javascript:void(0);"><i class="fa fa-angle-right"></i></a>').insertAfter('#site-navigation .menu-item-has-children>a, #site-navigation .page_item_has_children>a');

    $('#site-navigation .sub-toggle').click(function() {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
        $(this).parent('.page_item_has_children').children('ul.children').first().slideToggle('1000');
        $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
    });

     /**
     * Focus trap in popup.
     */
    var KEYCODE_TAB = 9;
    function easy_store_focus_trap( firstFocusable, lastFocusable, e ) {
        if (e.key === 'Tab' || e.keyCode === KEYCODE_TAB) {
            if ( e.shiftKey ) /* shift + tab */ {
                if (document.activeElement === firstFocusable) {
                    lastFocusable.focus();
                    e.preventDefault();
                }
            } else /* tab */ {
                if ( document.activeElement === lastFocusable ) {
                    firstFocusable.focus();
                    e.preventDefault();
                }
            }
        }
    }
});