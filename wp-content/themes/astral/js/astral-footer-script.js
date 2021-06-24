 var swiper = new Swiper('#mwa_banner_slider', {
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        loop: true,
        effect: "fade",
    });


    var swiper = new Swiper('#mwa_blog_slider', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        breakpoints: {
            // when window width is <= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            },
            // when window width is <= 480px
            480: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is <= 640px
            640: {
                slidesPerView: 2,
                spaceBetween: 30
            }
        }
    });
	
/* menu */
jQuery('.dropdown a.dropdown-toggle').on('click', function(e) {
	e.preventDefault();
  if (!jQuery(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = jQuery(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  jQuery(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
	  e.preventDefault();
    jQuery('.dropdown-submenu .show').removeClass("show");
  });

  return false;
});