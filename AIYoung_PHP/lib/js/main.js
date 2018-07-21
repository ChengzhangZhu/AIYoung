(function ($) {
    'use strict';
    //-------------------------------------
    //Slider parallax
    //-------------------------------------
//    var movementStrength = 50;
//    var height = movementStrength / $(window).height();
//    var width = movementStrength / $(window).width();
//    $(".slider-wrap").mousemove(function (e) {
//        var pageX = e.pageX - ($(window).width() / 2);
//        var pageY = e.pageY - ($(window).height() / 2);
//        var newvalueX = width * pageX * -1 - 0;
//        var newvalueY = height * pageY * +1 + 30;
//        $('.slider-wrap').css("background-position", newvalueX + "px     " + newvalueY + "px");
//    });
    //-------------------------------------
    //On Load Animation
    //-------------------------------------
    $('.breadcrumb-section,.slider-wrap').on('mousemove', function (e) {
        var amountMovedX = (e.pageX * -1 / 60);
        var amountMovedY = (e.pageY * +1 / 20);
        $('.breadcrumb-section,.slider-wrap').css('background-position', amountMovedX + 'px ' + amountMovedY + 'px');

    });
    //----------------------------------------
    // Class Sort
    //----------------------------------------
    if ($('#mixer').length > 0) {
        $('.sort-btn li.filter a').on('click', function (event) {
            event.preventDefault();
        });
        $('#mixer').joomShaper();
    }
    //--------------------------------------------------
    // Contact Map
    //--------------------------------------------------
    if ($("#map").length > 0)
    {
        var map;
        map = new GMaps({
            el: '#map',
            lat: 44.4297538,
            lng: 26.0649221,
            scrollwheel: false,
            zoom: 16,
            zoomControl: false,
            panControl: false,
            streetViewControl: false,
            mapTypeControl: false,
            overviewMapControl: false,
            clickable: false
        });
        var styles = [{"featureType": "all", "elementType": "all", "stylers": [{"saturation": -100}, {"gamma": 1}]}];
        map.addStyle({
            styledMapName: "Styled Map",
            styles: styles,
            mapTypeId: "map_style"
        });

        map.setStyle("map_style");
    }
    //-------------------------------------
    //Count Down
    //-------------------------------------
    if ($("#count-down").length > 0)
    {
        $('#count-down').countdown({
            date: '12/24/2016 23:59:59',
            offset: +6,
            day: 'Day',
            days: 'Days'
        });
    }
    //-------------------------------------
    //Home Slider
    //-------------------------------------
    if ($('#owl-init').length > 0) {
        $('#owl-init').owlCarousel({
            margin: 0,
            loop: true,
            autoplay: true,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            autoplayHoverPause: true,
            autoplaySpeed: 2500,
            dots: false,
            nav: true,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    }
    //----------------------------------------
    // Fixed Header
    //----------------------------------------
    if ($(".navigation").length > 0) {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 300)
            {
                $(".navigation").addClass('fixed-menu animated fadeInDown');
            } else
            {
                $(".navigation").removeClass('fixed-menu animated fadeInDown');
            }
        });
    }
    //----------------------------------------
    // Search
    //----------------------------------------
    $("#search-pop").on('click', function (e) {
        e.preventDefault();
        $(".search-area").fadeIn(500);
    });
    $(".search-close").on('click', function (e) {
        e.preventDefault();
        $(".search-area").fadeOut(500);
    });
    if ($(window).width() > 767) {
        $(document).mouseup(function (e) {
            var container = $(".search-area");
            if (!container.is(e.target) && container.has(e.target).length === 0)
            {
                container.fadeOut(500);
            }
        });
    }


    //----------------------------------------
    // Mobile Menu
    //----------------------------------------
    if ($('.menu-has-child').length > 0 && $(window).width() < 768) {
        var activeClass = true;
        $('.main-menu > li').on('click', function () {
            if (activeClass) {
                $(this).addClass('active');
                activeClass = false;
            } else
            {
                $(this).removeClass('active');
                activeClass = true;
            }
            $(this).find('ul').slideToggle();
        });
    }
    if ($('.mobile-menu').length > 0) {
        $('.mobile-menu').on('click', function (e) {
            e.preventDefault();
            $('.main-menu,.search-area').slideToggle();
        });
    }
    //------------------------
    // Lagnuage Drop Down
    //------------------------
    if ($('.language').length > 0) {
//        $('.language a').on('click', function () {
//            $('.lang-dropdown').slideToggle();
//        });
        $(".language a").on('click', function (event) {
            event.stopPropagation();
            $(".lang-dropdown").slideToggle();
        });

        $("body:not(.language)").on('click', function () {
            $(".lang-dropdown").slideUp();
        });
    }
    //------------------------
    // magnific pop
    //------------------------
    if ($('.popup').length > 0) {
        $('.popup').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: function (openerElement) {
                    return openerElement.next('img') ? openerElement : openerElement.find('img');
                }
            },
            gallery: {
                enabled: true,
                navigateByImgClick: true,
                preload: [0, 1]
            }

        });
    }
    //------------------------
    // WOW INIT
    //------------------------
    if ($(window).width() > 490 && $('.wow').length > 0) {
        var wow = new WOW({
            mobile: false
        });
        wow.init();
    }
})(jQuery);
