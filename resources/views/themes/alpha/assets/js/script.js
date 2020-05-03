/* =====================================
               loader
 ====================================== */
$(window).on("load",function(){ "use strict";
    setTimeout(function () {
        $(".loader").fadeOut(800);
    },1500);

});
// setTimeout(function() {
//     $('.inner-loader div').addClass('done');
//
//     setTimeout(function() {
//         $('.inner-loader div').addClass('page');
//
//         setTimeout(function() {
//             $('.pageLoad').addClass('off');
//
//             $('body, html').addClass('on');
//
//
//         }, 500)
//     }, 500)
// }, 1500);

jQuery(function ($) {
    "use strict";
    /* =====================================
                  Slider
     ====================================== */
    var revapi1,
        tpj;
    (function () {
        if (!/loaded|interactive|complete/.test(document.readyState)) document.addEventListener("DOMContentLoaded", onLoad); else onLoad();

        function onLoad() {
            if (tpj === undefined) {
                tpj = jQuery;
                if ("off" == "on") tpj.noConflict();
            }
            if (tpj("#rev_slider_1_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_1_1");
            } else {
                revapi1 = tpj("#rev_slider_1_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "//localhost/reveditor/revslider/public/assets/js/",
                    sliderLayout: "fullscreen",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            touchOnDesktop: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        tabs: {
                            style: "hesperiden",
                            enable: true,
                            width: 368,
                            height: 100,
                            min_width: 100,
                            wrapper_padding: 5,
                            wrapper_color: "rgba(20,32,34,0)",
                            tmp: '<div class="tp-tab-content">  <span class="tp-tab-date">{{param1}}</span>  <span class="tp-tab-title">{{title}}</span></div><div class="tp-bullet-number"> <div class="tp-count">{{param2}}</div>',
                            visibleAmount: 3,
                            hide_onmobile: true,
                            hide_under: 991.98,
                            hide_onleave: false,
                            hide_delay: 200,
                            direction: "horizontal",
                            span: true,
                            position: "inner",
                            space: 3,
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 0
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [868, 768, 960, 720],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    fullScreenAutoWidth: "off",
                    fullScreenAlignForce: "off",
                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    disableProgressBar: "on",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
            ; /* END OF revapi call */
        }; /* END OF ON LOAD FUNCTION */
    }()); /* END OF WRAPPING FUNCTION */


    /* =====================================
                  Slider
     ====================================== */
    if ($("#rev_slider_1_2").length) {
        var revapi1,
            tpj;

        if (jQuery("#rev_slider_1_2").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1_1");
        } else {
            revapi1 = tpj("#rev_slider_1_2").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/reveditor/revslider/public/assets/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "on",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        touchOnDesktop: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    bullets: {
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 767,
                        style: "wexim",
                        hide_onleave: false,
                        direction: "vertical",
                        h_align: "left",
                        v_align: "center",
                        h_offset: 30,
                        v_offset: 0,
                        space: 5,
                        tmp: '<div class="tp-bullet-number"> <div class="tp-count">{{param1}}</div> <div class="tp-bullet-inner"></div><div class="tp-line"></div><div class="minus"></div></div>'
                    }
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [868, 768, 960, 720],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    }


// loading bars
    $(".bar").each(function () {
        $(this).find(".bar-inner").animate({
            width: $(this).attr("data-width")
        }, 2000)
    });
// carousal team
    $('.team').owlCarousel({

        loop: true,
        margin: 20,
        slideSpeed: 5000,
        slideTransition: 'linear',
        nav: false,
        dots: false,
        responsive: {
            0: {
                autoplay: true,
                autoplayTimeout: 8000,
                autoplayHoverPause: true,
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 2
            },
        }

    });
    $('.customNextBtn').click(function () {
        var owl = $('.team');
        owl.owlCarousel();
        owl.trigger('next.owl.carousel');
    });
    $('.customPrevBtn').click(function () {
        var owl = $('.team');
        owl.owlCarousel();
        owl.trigger('prev.owl.carousel', [300]);
    });


// client carousal
    $('.testimonial-box').owlCarousel({

        loop: true,
        margin: 20,
        slideSpeed: 5000,
        slideTransition: 'linear',
        nav: false,
        dots: false,
        responsive: {
            0: {
                autoplay: true,
                autoplayTimeout: 8000,
                autoplayHoverPause: true,
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            },
        }

    });
    $('.testimonial-navigation .t-customPrevBtn').click(function () {
        var owl = $('.testimonial-box');
        owl.owlCarousel();
        owl.trigger('prev.owl.carousel');
    });
    $('.testimonial-navigation .t-customNextBtn').click(function () {
        var owl = $('.testimonial-box');
        owl.owlCarousel();
        owl.trigger('next.owl.carousel', [300]);
    });

// client carousal
    $('.related-posts').owlCarousel({

        loop: true,
        margin: 20,
        slideSpeed: 5000,
        slideTransition: 'linear',
        nav: false,
        dots: false,
        autoplay: true,
        responsive: {
            0: {
                autoplayTimeout: 8000,
                autoplayHoverPause: true,
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            },
        }

    });

// Cube Portfolio Initializing
    $('#js-grid-mosaic').cubeportfolio({
        filters: '#js-filters-mosaic',
        layoutMode: 'grid',
        sortByDimension: true,
        mediaQueries: [{
            width: 1500,
            cols: 2,
        }, {
            width: 1100,
            cols: 2,
        }, {
            width: 768,
            cols: 2,
        }, {
            width: 568,
            cols: 1,
        }, {
            width: 480,
            cols: 1,
            options: {
                gapHorizontal: 30
            }
        }],
        defaultFilter: '*',
        animationType: 'fadeOut',
        gapHorizontal: 50,
        gapVertical: 50,
        gridAdjustment: 'responsive',
        caption: 'zoom',

        // lightbox
        lightboxDelegate: '.cbp-lightbox',
        lightboxGallery: true,
        lightboxTitleSrc: 'data-title',
        lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

        plugins: {
            loadMore: {
                element: "#js-loadMore-lightbox-gallery",
                action: "click",
                loadItems: 5,
            }
        }

    })
        .on('initComplete.cbp', function () {
            // your functionality
            var $this = $(this);
            if ($(".cbp-filter-item-active").attr("data-filter") === "*") {
                $("#js-loadMore-lightbox-gallery").addClass("active");
            } else {
                $("#js-loadMore-lightbox-gallery").removeClass("active");
            }
            $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
                $(this).removeClass("even");

                console.log();
                var val = index + 1;
                if ($(this).css('left') !== "0px") {
                    $(this).addClass("even");

                }
            });
        })
        .on('onAfterLoadMore.cbp', function () {
            // your functionality
            var $this = $(this);
            $("#js-loadMore-lightbox-gallery a").addClass("d-none");
            $("#js-loadMore-lightbox-gallery").addClass("active-outer");
            $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
                $(this).removeClass("even");
                console.log();
                var val = index + 1;
                if ($(this).css('left') !== "0px") {
                    $(this).addClass("even");
                }
            });
        })
        .on('filterComplete.cbp', function () {
            // your functionality
            var $this = $(this);
            if ($(".cbp-filter-item-active").attr("data-filter") === "*") {
                $("#js-loadMore-lightbox-gallery").addClass("active");
                $("#js-loadMore-lightbox-gallery").removeClass("d-none");
            } else {
                $("#js-loadMore-lightbox-gallery").removeClass("active");
                $("#js-loadMore-lightbox-gallery").addClass("d-none");
            }
            $this.find(".cbp-wrapper").find(".cbp-item:not(.cbp-item-off)").each(function (index) {
                $(this).removeClass("even");
                var val = index + 1;
                if ($(this).css('left') !== "0px") {
                    $(this).addClass("even");
                }
            });
        });



    /* =====================================
           services Card
     ====================================== */

    $('.services-sec .services-box .s-card .card').on('mouseover', function () {
        $('.services-sec .services-box .s-card:nth-child(2) .card').removeClass('active');
    });
    $('.services-sec .services-box .s-card .card').on('mouseleave', function () {
        $('.services-sec .services-box .s-card:nth-child(2) .card').addClass('active');
    });

    /* =====================================
           Pricing Card
     ====================================== */

    $('.pricing-sec .pricing-cards .pricing-card').on('mouseover', function () {
        $('.pricing-sec .p-card:nth-child(2) .pricing-card').removeClass('active');
    });
    $('.pricing-sec .pricing-cards .pricing-card').on('mouseleave', function () {
        $('.pricing-sec .p-card:nth-child(2) .pricing-card').addClass('active');
    });


    /*===================================
     fixed navbar
     ======================================*/
    if ($(window).width() > 991) {
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                $('header .lower-nav').addClass('fixed-top');
                $('header .lower-nav').addClass('fix-top');
                $('header .close-nav').addClass('fixed-close-btn');
            } else {
                $('header .lower-nav').removeClass('fixed-top');
                $('header .lower-nav').removeClass('fix-top');
                $('header .close-nav').removeClass('fixed-close-btn');
            }
        });
    } else {
        $(window).on('scroll', function () {
            if ($(this).scrollTop() > 300) {
                $('header .upper-nav').addClass('fixed-top');
                $('header .upper-nav').addClass('fix-top');
            } else {
                $('header .upper-nav').removeClass('fixed-top');
                $('header .upper-nav').removeClass('fix-top');
            }
        });
    }

    /*===================================
    fixed navbar index2
    ======================================*/
    if ($(window).width() > 991) {
        if($('.lower-nav-style2').length) {
            var navHeight = $(".lower-nav-style2").offset().top;
            $(window).on('scroll', function () {

                if ($(this).scrollTop() > navHeight) {
                    $('.lower-nav-style2').addClass('fixed-nav-top');
                    $('.lower-nav-style2').addClass('fix-nav-top');
                    // $('header .close-nav').addClass('fixed-close-btn');
                } else {
                    $('.lower-nav-style2').removeClass('fixed-nav-top');
                    $('.lower-nav-style2').removeClass('fix-nav-top');
                }
            });
        }
    } else {
        // $(window).on('scroll', function () {
        //     if ($(this).scrollTop() > 300) {
        //         $('header .upper-nav').addClass('fixed-top');
        //         $('header .upper-nav').addClass('fix-top');
        //     } else {
        //         $('header .upper-nav').removeClass('fixed-top');
        //         $('header .upper-nav').removeClass('fix-top');
        //     }
        // });
    }
    /* =====================================
          stop parallax on small devices
     ====================================== */

    if ($(window).width() < 780) {
        $('.services-sec').addClass("parallax-disable");
        $('.quote-sec').addClass("parallax-disable");
        $('.slider-sec').addClass("parallax-disable");
    } else {
        $('.services-sec').removeClass("parallax-disable");
        $('.quote-sec').removeClass("parallax-disable");
        $('.slider-sec').removeClass("parallax-disable");

        // parallax
        $('.services-sec').parallaxie({
            speed: 0.5,
            offset: -50,
        });
        $('.quote-sec').parallaxie({
            speed: 0.5,
            offset: -100,
        });
        $('.slider-sec').parallaxie({
            speed: 0.5,
            offset: -100,
        });
    }
    /* =====================================
          Stop wow
     ====================================== */

    if ($(window).width() < 780) {
        $('.wow').addClass('wow-removed').removeClass('wow');
    } else {
        $('.wow-removed').addClass('wow').removeClass('wow-removed');
    }
    if ($(window).width() > 767) {
        var wow = new WOW({
            boxClass: 'wow',
            animateClass: 'animated',
            offset: 0,
            mobile: false,
            live: true
        });
        new WOW().init();
    }
    /* =====================================
          Broad nav
     ====================================== */

    $(".toggle-btn").on("click", function () {
        $("header .broad").removeClass('end-animation');
        $("header .broad").addClass('broad-nav');
        $("header .broad").addClass('start-animation');
    });
    $(".close-nav").on("click", function () {
        $("header .broad").removeClass('start-animation');
        $("header .broad").addClass('end-animation');
        setTimeout(function () {
            $("header .broad").removeClass('broad-nav');
            $("header .broad").removeClass('broad-rem');
        }, 800);
    });
    $(".broad .nav-link").on("click", function () {
        $("header .broad").removeClass('start-animation');
        $("header .broad").addClass('end-animation');
        setTimeout(function () {
            $("header .broad").removeClass('broad-nav');
            $("header .broad").removeClass('broad-rem');
        }, 800);
    });

    /* =====================================
          Navbar offset
     ====================================== */

    $(".navbar-nav .nav-item .nav-link.scroll").on("click", function (event) {
        event.preventDefault();
        $("html,body").animate({
            scrollTop: $(this.hash).offset().top - 70
        }, 100);
        if (screen.width > 768) {
            $("html,body").animate({
                scrollTop: $(this.hash).offset().top - 40
            }, 100);
        }else{
            $("html,body").animate({
                scrollTop: $(this.hash).offset().top - 10
            }, 100);
        }

    });

    /* =====================================
           Media player
     ====================================== */
    if ($('video, audio').length) {
        $('video, audio').mediaelementplayer({
            // Do not forget to put a final slash (/)
            pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
            // this will allow the CDN to use Flash without restrictions
            // (by default, this is set as `sameDomain`)
            shimScriptAccess: 'always'
            // more configuration
        });

    }

    /* =====================================
                     sponsers  carousel
         ====================================== */

    $('.sponser-tags').owlCarousel({

        loop: true,
        margin: 20,
        slideSpeed: 5000,
        slideTransition: 'linear',
        nav: false,
        dots: false,
        autoplay: true,
        autoplayTimeout: 10000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            },
        }

    });


    /*===================================
                   fixed bottom arrow
     ======================================*/

    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 500) {
            $('.bottom-arr').addClass('fixed-at-bottom');
        } else {
            $('.bottom-arr').removeClass('fixed-at-bottom');
        }
    });

//Click event to scroll to top
    $(document).on('click', '.scroll-top-arrow', function () {
        $('html, body').animate({scrollTop: 0}, 400);
        return false;
    });

});






