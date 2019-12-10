jQuery(document).ready(function($){
    var at_window = $(window);
    var at_body = $('body');
    function at_ticker() {
        var ticker = $('.news-notice-content'),
            ticker_first = ticker.children(':first');

        if( ticker_first.length ){
            setInterval(function() {
                if ( !ticker_first.is(":hover") ){
                    ticker_first.fadeOut(function() {
                        ticker_first.appendTo(ticker);
                        ticker_first = ticker.children(':first');
                        ticker_first.fadeIn();
                    });
                }
            },3000);
        }
    }

    at_ticker();
    
    function homeFullScreen() {

        var homeSection = $('#at-banner-slider');
        var windowHeight = at_window.outerHeight();

        if (homeSection.hasClass('home-fullscreen')) {

            $('.home-fullscreen').css('height', windowHeight);
        }
    }
    //make slider full width
    homeFullScreen();

    //window resize
    at_window.resize(function () {
        homeFullScreen();
    });

    at_window.on("load", function() {
        /*slick*/
        $('.acme-slick-carausel').each(function() {
            var at_featured_img_slider = $(this);

            var slidesToShow = parseInt(at_featured_img_slider.data('column'));
            var slidesToScroll = parseInt(at_featured_img_slider.data('column'));
            var prevArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .prev');
            var nextArrow =at_featured_img_slider.closest('.widget').find('.at-action-wrapper > .next');
            at_featured_img_slider.css('visibility', 'visible').slick({
                slidesToShow: slidesToShow,
                slidesToScroll: slidesToScroll,
                autoplay: true,
                adaptiveHeight: true,
                cssEase: 'linear',
                arrows: true,
                prevArrow: prevArrow,
                nextArrow: nextArrow,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: ( slidesToShow > 1 ? slidesToShow - 1 : slidesToShow ),
                            slidesToScroll: ( slidesToScroll > 1 ? slidesToScroll - 1 : slidesToScroll )
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: ( slidesToShow > 2 ? slidesToShow - 2 : slidesToShow ),
                            slidesToScroll: ( slidesToScroll > 2 ? slidesToScroll - 2 : slidesToScroll )
                        }
                    }
                ]
            });
        });

        $('.featured-slider').show().slick({
            autoplay: true,
            adaptiveHeight: true,
            autoplaySpeed: 3000,
            speed: 700,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });
        /*parallax scolling*/
        $('a[href*="\\#"]').click(function(event){
            var at_offset= $.attr(this, 'href');
            var id = at_offset.substring(1, at_offset.length);
            if ( ! document.getElementById( id ) ) {
                return;
            }
            if( $( at_offset ).offset() ){
                $('html, body').animate({
                    scrollTop: $( at_offset ).offset().top-$('.at-navbar').height()
                }, 1000);
                event.preventDefault();
            }

        });
        /*bootstrap sroolpy*/
        at_body.scrollspy({target: ".at-sticky", offset: $('.at-navbar').height()+50 } );

        /*featured slider*/
        $('.acme-gallery').each(function(){
            var $masonry_boxes = $(this);
            var $container = $masonry_boxes.find('.fullwidth-row');
            $container.imagesLoaded( function(){
                $masonry_boxes.fadeIn( 'slow' );
                $container.masonry({
                    itemSelector : '.at-gallery-item'
                });
            });
            /*widget*/
            $masonry_boxes.find('.image-gallery-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                gallery: {
                    enabled: true
                },
                fixedContentPos: false

            });
            $masonry_boxes.find('.single-image-widget').magnificPopup({
                type: 'image',
                closeBtnInside: false,
                fixedContentPos: false
            });
        });

        /*widget slider*/
        $('.acme-widget-carausel').show().slick({
            autoplay: true,
            autoplaySpeed: 3000,
            speed: 700,
            cssEase: 'linear',
            fade: true,
            prevArrow: '<i class="prev fa fa-angle-left"></i>',
            nextArrow: '<i class="next fa fa-angle-right"></i>'
        });

    });

    function stickyMenu() {

        var scrollTop = at_window.scrollTop();
        if ( scrollTop > 250 ) {
            $('.event-star-sticky').addClass('at-sticky');
            $('.sm-up-container').show();
        }
        else {
            $('.event-star-sticky').removeClass('at-sticky');
            $('.sm-up-container').hide();
        }
    }
    //What happen on window scroll
    stickyMenu();
    at_window.on("scroll", function (e) {
        setTimeout(function () {
            stickyMenu();
        }, 300)
    });
    
    /*schedule tab*/
    function schedule_tab() {
        // Runs when the image button is clicked.
        at_body.on('click','.schedule-title a', function(e){
            var $this = $(this),
                schedule_wrap = $this.closest('.at-schedule'),
                schedule_tab_id = $this.data('id'),
                schedule_title = schedule_wrap.find('.schedule-title'),
            schedule_content_wrap = schedule_wrap.find('.schedule-item-content');

            schedule_title.removeClass('active');
            $this.parent().addClass('active');
            schedule_content_wrap.removeClass('active');

            schedule_content_wrap.each(function () {
                if( $(this).data('id') === schedule_tab_id ){
                    $(this).addClass('active')
                }
            });

            e.preventDefault();
        });
    }
    function accordion() {
        // Runs when the image button is clicked.
        at_body.on('click','.accordion-title', function(e){
            var $this = $(this),
                accordion_content  = $this.closest('.accordion-content'),
                accordion_item  = $this.closest('.accordion-item'),
                accordion_details  = accordion_item.find('.accordion-details'),
                accordion_all_items  = accordion_content.find('.accordion-item'),
                accordion_icon  = accordion_content.find('.accordion-icon');

            accordion_icon.each(function () {
                $(this).addClass('fa-plus');
                $(this).removeClass('fa-minus');
            });
            accordion_all_items.each(function () {
                $(this).find('.accordion-details').slideUp();
            });

            if( accordion_details.is(":visible")){
                accordion_details.slideUp();
                $this.find('.accordion-icon').addClass('fa-plus');
                $this.find('.accordion-icon').removeClass('fa-minus');
            }
            else{
                accordion_details.slideDown();
                $this.find('.accordion-icon').addClass('fa-minus');
                $this.find('.accordion-icon').removeClass('fa-plus');
            }
            e.preventDefault();
        });
    }
    function at_site_origin_grid() {
        $('.panel-grid').each(function(){
            var count = $(this).children('.panel-grid-cell').length;
            if( count < 1 ){
                count = $(this).children('.panel-grid').length;
            }
            if( count > 1 ){
                $(this).addClass('at-grid-full-width');
            }
        });
    }
    accordion();
    schedule_tab();
    at_site_origin_grid();

    function count_down() {

        $('.feature-event').each(function () {
            // Set the date we're counting down to

            var at_this = $(this),
                at_day = at_this.find('.day'),
                at_hour = at_this.find('.hour'),
                at_min = at_this.find('.min'),
                at_sec = at_this.find('.sec'),

                at_year_value = parseInt( at_this.data('year') ),
                at_month_value = parseInt( at_this.data('month') ) -1,
                at_day_value = parseInt( at_this.data('day') ),
                at_hour_value = parseInt( at_this.data('hour') ),
                at_minutes_value = parseInt( at_this.data('minutes') ),
                countDownDate =  new Date( at_year_value, at_month_value, at_day_value, at_hour_value, at_minutes_value, 0, 0 ).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get todays date and time
                var now = new Date().getTime();

                // Find the distance between now an the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                at_day.html( days );
                at_hour.html( hours );
                at_min.html( minutes );
                at_sec.html( seconds );
                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    at_this.html( event_star_ajax.event_expire_text );
                }
            }, 1000);
        })

    }
    count_down();
});

/*animation with wow*/
if(typeof WOW !== 'undefined'){
    eb_wow = new WOW({
            boxClass: 'init-animate'
    }
    );
    eb_wow.init();
}