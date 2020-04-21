( function($) {
  'use strict';


  	/* Window Load */
	$(window).on('load',function(){
		$('.loader').fadeOut(200);
	});


	/* Parallax */
	$('.jarallax').jarallax({
	    speed: 0.75
	});


	/* Aos */
	AOS.init({
	    easing: 'ease-in-out-sine',
	    duration: 700,
	});


	/* Navbar Fixed */
	var navbarDesctop = $('.navbar-desctop');
    var origOffsetY = navbarDesctop.offset().top;

    $(window).on('scroll',function(){
    	if ($(window).scrollTop() > origOffsetY) {
            navbarDesctop.addClass('fixed');
        } else {
            navbarDesctop.removeClass('fixed');
        }
    });


    /* Navbar scroll*/
    $('.navbar ul li a').on('click', function() {
        var target = $(this.hash);
        if (target.length) {
            $('html,body').animate({
                scrollTop: (target.offset().top)
            }, 1000);
            $('body').removeClass('menu-is-opened').addClass('menu-is-closed');
            return false;
        }
    });
    $('body').scrollspy({ target: '#navbar-desctop' });


    /* Navbar toggler */
    $('.toggler').on('click',function(){
    	$('body').addClass('menu-is-open');
    });

    $('.close, .click-capture').on('click',function(){
    	$('body').removeClass('menu-is-open');
    });


    /* Navbar mobile */
    $('.navbar-nav-mobile li a').on('click', function(){
    	$('body').removeClass('menu-is-open');
    	$('.navbar-nav-mobile li a').removeClass('active');
    	$(this).addClass('active');
    });

    /* Pop up*/
    $('.popup-with-zoom-anim').magnificPopup({
      type: 'inline',
      fixedBgPos: true,
      overflowY: 'auto',
      closeBtnInside: true,
      preloader: false,
      midClick: true,
      fixedContentPos: true,
      removalDelay: 0,
      mainClass: 'my-mfp-zoom-in'
    });
})(jQuery);
