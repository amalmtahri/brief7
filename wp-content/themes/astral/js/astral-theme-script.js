
/* wow animation */
wow = new WOW(
    {
        animateClass: 'animated',
        offset:       100,
      }
    );
wow.init();
	

/* scroll */
jQuery(document).ready(function () {
	
	jQuery(window).scroll(function () {
			if (jQuery(this).scrollTop() > 100) {
				jQuery('.scrollup').fadeIn();
			} else {
				jQuery('.scrollup').fadeOut();
			}
	});
	
	jQuery('.scrollup').click(function () {
			jQuery("html, body").animate({
				scrollTop: 0
			}, 600);
			return false;
	});
	
});	
	
/* sticky navbar */

jQuery(function(){
  
	createSticky(jQuery("#main-menu"));

});

function createSticky(sticky) {
	
	if (typeof sticky !== "undefined") {

		var	pos = sticky.offset().top,
				win = jQuery(window);
			
		win.on("scroll", function() {
    		win.scrollTop() >= pos ? sticky.addClass("sticky") : sticky.removeClass("sticky");      
		});			
	}
}

/* drop down */
jQuery(function($) {
$('.navbar .dropdown > a').click(function(){
location.href = this.href;
});

});