/*-----------------------------------------------------------------------------------

    Theme Name: Renuma - Wind & Solar Energy WordPress Theme
    Description: Wind & Solar Energy WordPress Theme
    Author: Website Layout
    Version: 1.2

    /* ----------------------------------

    JS Active Code Index
            
        01. Preloader
        02. Sticky Header
        03. Scroll To Top
        04. Parallax
        05. Wow animation - on scroll
        06. Video
        07. Current Year
        08. Language Switcher
        09. WooComerce
        10. Resize function
        11. FullScreenHeight function
        12. ScreenFixedHeight function
        13. FullScreenHeight and screenHeight with resize function
        14. Sliders
        15. Tabs
        16. Countdown
        17. Odometer
        18. Cursor Helper
        19. Portfolio
        
    ---------------------------------- */    

(function($) {

    "use strict";

    var $window = $(window);

        /*------------------------------------
            01. Preloader
        --------------------------------------*/

        $('#preloader').fadeOut('normall', function() {
            $(this).remove();
        });

        /*------------------------------------
            02. Sticky Header
        --------------------------------------*/

        $window.on('scroll', function() {
            var scroll = $window.scrollTop();
            var offsetTop = $('.navbar-default').outerHeight();
            var offsetTopAnimation = offsetTop + 200;
            if (scroll < offsetTopAnimation) {
                $("header").removeClass("scrollHeader").addClass("fixedHeader");
            } 
            else {
                $("header").removeClass("fixedHeader").addClass("scrollHeader");
                $(".fixed-header header").removeClass("scrollHeader").addClass("fixedHeader");
            }
        });

        /*------------------------------------
            03. Scroll To Top
        --------------------------------------*/

        const scrollTopPercentage = ()=> {
            const scrollPercentage = () => {
                const scrollTopPos = document.documentElement.scrollTop;
                const calcHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrollValue = Math.round((scrollTopPos / calcHeight) * 100);
                const scrollElementWrap = $(".scroll-top-percentage");

                scrollElementWrap.css("background", `conic-gradient( #1388d7 ${scrollValue}%, #1cbfaa ${scrollValue}%)`);

                if ( scrollTopPos > 100 ) {
                    scrollElementWrap.addClass("active");
                } else {
                    scrollElementWrap.removeClass("active");
                }

                if( scrollValue < 96 ) {
                    $("#scroll-value").text(`${scrollValue}%`);
                } else {
                    $("#scroll-value").html('<i class="fa-solid fa-angle-up"></i>');
                }
            }
            window.onscroll = scrollPercentage;
            window.onload = scrollPercentage;

            // Back to Top
            function scrollToTop() {
                document.documentElement.scrollTo({
                    top: 0,
                    behavior: "smooth"
                });
            }

            $(".scroll-top-percentage").on("click", scrollToTop);
        }
        scrollTopPercentage();

        /*------------------------------------
            04. Parallax
        --------------------------------------*/

        // sections background image from data background
        var pageSection = $(".parallax,.bg-img");
        pageSection.each(function(indx) {

            if ($(this).attr("data-background")) {
                $(this).css("background-image", "url(" + $(this).data("background") + ")");
            }
        });

        /*------------------------------------
            05. Wow animation - on scroll
        --------------------------------------*/
        
        var wow = new WOW({
            boxClass: 'wow', // default
            animateClass: 'animated', // default
            offset: 0, // default
            mobile: false, // default
            live: true // default
        })
        wow.init();

        /*------------------------------------
            06. Video
        --------------------------------------*/

        // It is for local video
        $('.story-video').magnificPopup({
            delegate: '.video',
            type: 'iframe'
        });

        $('.source-modal').magnificPopup({
            type: 'inline',
            mainClass: 'mfp-fade',
            removalDelay: 160
        });

        /*------------------------------------
            07. Current Year
        --------------------------------------*/

        $('.current-year').text(new Date().getFullYear());

        /*------------------------------------
            08. Language Switcher
        --------------------------------------*/

        $('.wpml-ls-menu-item a, .pll-parent-menu-item a, .lang-item a').each(function(){
            var $this = $(this);
            var t = $this.text();
            $this.html(t.replace('&lt','<').replace('&gt', '>'));
        });

        /*------------------------------------
            09. WooComerce
        --------------------------------------*/
        if ($(".woocommerce").length !== 0) {
            function renuma_quantity_icon() {
                $('.single-product .cart .quantity').append('<span class="quantity-icon"><input class="plus" type="button" value="+"><input class="minus" type="button" value="-"></span>');
                $('.plus').on('click', function () {
                    $(this).parents('.quantity').find('input[type="number"]').get(0).stepUp();
                    $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
                });
                $('.minus').on('click', function () {
                    $(this).parents('.quantity').find('input[type="number"]').get(0).stepDown();
                    $(this).parents('.woocommerce-cart-form').find('.actions .button').removeAttr('disabled');
                });
                $('.woocommerce-cart-form .actions .button').removeAttr('disabled');
            }

            renuma_quantity_icon();

            $( document ).ajaxComplete(function() {
               renuma_quantity_icon();
            });
            
        }     

        /*------------------------------------
            10. Resize function
        --------------------------------------*/

        $window.resize(function(event) {
            setTimeout(function() {
                SetResizeContent();
            }, 500);
            event.preventDefault();
        });

        /*------------------------------------
            11. FullScreenHeight function
        --------------------------------------*/

        function fullScreenHeight() {
            var element = $(".full-screen");
            var $minheight = $window.height();
            element.css('min-height', $minheight);
        }

        /*------------------------------------
            12. ScreenFixedHeight function
        --------------------------------------*/

        function ScreenFixedHeight() {
            var $headerHeight = $("header").height();
            var element = $(".screen-height");
            var $screenheight = $window.height() - $headerHeight;
            element.css('height', $screenheight);
        }

        /*------------------------------------
            13. FullScreenHeight and screenHeight with resize function
        --------------------------------------*/        

        function SetResizeContent() {
            fullScreenHeight();
            ScreenFixedHeight();
            if ($(window).width() < 992) {
                $(".navbar-nav .dropdown-menu.sub-menu").css("display", "none");
            }
            
        }

        SetResizeContent();

    // === when document ready === //
    $(document).ready(function(){

        /*------------------------------------
            14. Sliders
        --------------------------------------*/

        // testimonial-carousel1
        $('.testimonial-carousel1').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            smartSpeed: 1500,
            nav: false,
            dots: false,
            thumbs: true,
            thumbsPrerendered: true,
            center:false,
            margin: 50,
            responsive: {
                0: {
                    items: 1,
                    margin: 0
                },
                768: {
                    items: 1
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });

        // testimonial-carousel3
        $('.testimonial-carousel3').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            nav: false,
            dots: false,
            thumbs: false,
            thumbsPrerendered: false,
            center:false,
            margin: 50,
            items: 1
        });

        // project-carousel
        $('.project-carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            smartSpeed: 1500,
            nav: true,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            thumbs: true,
            thumbsPrerendered: true,
            center:false,
            margin: 0,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                576: {
                    items: 1
                }, 
                768: {
                    items: 1
                },      
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });

        // testimonial-carousel5
        $('.testimonial-carousel5').owlCarousel({
            loop: true,
            responsiveClass: true,
            nav: true,
            navText: ["<i class='fas fa-arrow-left'></i>", "<i class='fas fa-arrow-right'></i>"],
            dots: false,
            margin: 0,
            autoplay: true,
            thumbs: true,
            thumbsPrerendered: true,
            autoplayTimeout: 5000,
            smartSpeed:800,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                576: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 1   
                },
                992: {
                    items: 1      
                },
                1200: {
                    items: 1
                }

            }
        });

        // testimonial-carousel6
        $('.testimonial-carousel6').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            smartSpeed: 1500,
            nav: true,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: false,
            thumbs: true,
            thumbsPrerendered: true,
            center:false,
            margin: 50,
            responsive: {
                0: {
                    items: 1,
                    margin: 0,
                    nav: false
                },
                768: {
                    items: 1,
                    nav: false
                },
                992: {
                    items: 1
                },
                1200: {
                    items: 1
                }
            }
        });

        // portfolio-carousel3
        $('.portfolio-carousel3').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            nav: false,
            dots: false,
            center: false,
            margin: 20,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                991: {
                    items: 3
                },
                1399: {
                    items: 4
                }
            }
        });

        // portfolio-carousel1
        $('.portfolio-carousel1').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            nav: true,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            dots: false,
            center: false,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                991: {
                    items: 2
                },
                1399: {
                    items: 3
                }
            }
        });
       
        // service-carousel-one
        $('.service-carousel-one').owlCarousel({
            center: false,
            items:2,
            loop:true,
            dots: false,
            nav: true,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            margin:30,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            responsive:{
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                },
                1499: {
                    items: 5
                }
            }
        }); 

        // service-carousel-two
        $('.service-carousel-two').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 6000,
            smartSpeed: 1500,
            nav: false,
            dots: false,
            center:false,
            margin: 30,
            responsive: {
                0: {
                    items: 1,
                    dots: false
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        // services-carousel-three
        $('.services-carousel-three').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 6000,
            smartSpeed: 1500,
            nav: true,
            navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
            dots: false,
            center:false,
            margin: 40,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                576: {
                    items: 1,
                    nav: false
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        });

        // client-carousel
        $('.client-carousel').owlCarousel({
            loop: true,
            responsiveClass: true,
            autoplay: true,
            autoplayTimeout: 5000,
            smartSpeed: 1500,
            nav: false,
            dots: false,
            center:false,
            margin: 30,
            responsive: {
                0: {
                    items: 1
                },
                481: {
                    items: 2
                },
                768: {
                    items: 3
                },
                992: {
                    items: 4
                },
                1200:{
                    items: 6
                }
            }
        });

        // slider-fade
        $('.slider-fade').owlCarousel({
            items: 1,
            loop:true,
            dots: true,
            margin: 0,
            nav: false,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            autoplay:true,
            autoplayTimeout: 6000,
            smartSpeed:1500,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsive: {
                992: {
                    nav: true,
                    dots: false
                }
            }
        });

        // Sliderfade3
        $('.slider-fade3').owlCarousel({
            items: 1,
            loop:true,
            dots: true,
            margin: 0,
            nav: false,
            navText: ["<i class='ti-arrow-left'></i>", "<i class='ti-arrow-right'></i>"],
            autoplay: true,
            autoplayTimeout: 7000,
            smartSpeed:1500,
            animateIn: 'fadeIn',
            animateOut: 'fadeOut',
            responsive: {
                992: {
                nav: true,
                dots: false
                }
            }
        });
        
        // Default owlCarousel
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop:true,
            dots: false,
            margin: 0,
            autoplay:true,
            smartSpeed:500
        });

        // Slider text animation
        var owl = $('.slider-fade3');
        owl.on('changed.owl.carousel', function(event) {
            var item = event.item.index - 2;     // Position of the current item
            $('.small-title').removeClass('animated fadeInUp');
            $('h1').removeClass('animated fadeInUp');
            $('p').removeClass('animated fadeInUp');
            $('a').removeClass('animated fadeInUp');
            $('.banner-button').removeClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('.small-title').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('h1').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('p').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('a').addClass('animated fadeInUp');
            $('.owl-item').not('.cloned').eq(item).find('.banner-button').addClass('animated fadeInUp');
        });

        /*------------------------------------
            15. Tabs
        --------------------------------------*/

        //Horizontal Tab
        if ($(".horizontaltab").length !== 0) {
            $('.horizontaltab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        }

        /*------------------------------------
            16. Countdown
        --------------------------------------*/

        // CountDown for coming soon page
        $(".countdown").countdown({
            date: "01 Jun 2027 00:01:00", //set your date and time. EX: 15 May 2014 12:00:00
            format: "on"
        });

       $( ".navbar-nav li.has-sub" ).removeClass( "active" );

        if($('header').hasClass('header-style1')) {
            $('body').addClass('header-style1');
        }

        if($('header').hasClass('header-style2')) {
            $('body').addClass('header-style2');
        }

        if($('header').hasClass('header-style3')) {
            $('body').addClass('header-style3');
        }

        /*------------------------------------
            17. Odometer
        --------------------------------------*/

        $('.odometer').waypoint(function(direction) {
            if (direction === 'down') {
                let countNumber = $(this.element).attr("data-count");
                $(this.element).html(countNumber);
            }
        }, {
            offset: '80%'
        });

        /*------------------------------------
            18. Cursor Helper
        --------------------------------------*/
        
        if ($(".cursor-helper").length) {

            var cursor = document.querySelector('.cursor-helper-outer');
            var cursorinner = document.querySelector('.cursor-helper-inner');
            var a = document.querySelectorAll('a');
            var footer = document.querySelectorAll('footer');
            var owlcarousel = document.querySelectorAll('.owl-carousel');
            
            document.addEventListener('mousemove', function (e) {
              var x = e.clientX;
              var y = e.clientY;
              cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`
            });

            document.addEventListener('mousemove', function (e) {
              var x = e.clientX;
              var y = e.clientY;
              cursorinner.style.left = x + 'px';
              cursorinner.style.top = y + 'px';
            });

            document.addEventListener('mousedown', function () {
              cursor.classList.add('click');
              cursorinner.classList.add('cursor-helper-innerhover')
            });

            document.addEventListener('mouseup', function () {
              cursor.classList.remove('click')
              cursorinner.classList.remove('cursor-helper-innerhover')
            });

            a.forEach(item => {
              item.addEventListener('mouseover', () => {
                cursor.classList.add('cursor-link');
              });
              item.addEventListener('mouseleave', () => {
                cursor.classList.remove('cursor-link');
              });
            });

            footer.forEach(item => {
              item.addEventListener('mouseover', () => {
                cursor.classList.add('cursor-light');
              });
              item.addEventListener('mouseleave', () => {
                cursor.classList.remove('cursor-light');
              });
            });

            owlcarousel.forEach(item => {
              item.addEventListener('mouseover', () => {
                cursor.classList.add('cursor-slider');
              });
              item.addEventListener('mouseleave', () => {
                cursor.classList.remove('cursor-slider');
              });
            });

          }
      
    });

    // === when window loading === //
    $window.on("load", function() {

        /*------------------------------------
            19. Portfolio
        --------------------------------------*/

        var $PortfolioGallery = $('.portfolio-gallery-isotope').isotope({
            // options
        });

        // filter items on button click
        $('.filtering').on('click', 'span', function() {
            var filterValue = $(this).attr('data-filter');
            $PortfolioGallery.isotope({
                filter: filterValue
            });
        });

        $('.filtering').on('click', 'span', function() {
            $(this).addClass('active').siblings().removeClass('active');
        });

        $('.portfolio-gallery,.portfolio-gallery-isotope').lightGallery();

        $('.portfolio-link').on('click', (e) => {
            e.stopPropagation();
        });

    });

})(jQuery);