$(document).ready(function() {
    $('.owl-post').owlCarousel({
        loop:false,
        margin:5,
        responsiveClass:true,
        autoplay:true,
        dots:false,
        animateOut: 'fadeOut',
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:false,
                loop:false
            }
        }
    })

    $('.owl-project').owlCarousel({
        loop:true,
        margin:5,
        responsiveClass:true,
        autoplay:true,
        dots:true,
        nav:true,
        navText:["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    })

    $('.toggle').on('click', function() {
        open_sidebar();
    });

    $('.close-sidebar').on('click', function() {
        close_sidebar();
    });

    $( ".sm-navigate li.has-dropdown" ).click(function() {
        $(this).find('.dropdown').slideToggle();
    });


    // scroll to top
    var btn = $('#btn_back_top');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });

});

function open_sidebar() {
    $('.overlay').addClass('active');
    $('.sidebar').addClass('open');
    $("body").css("overflow", "hidden");
}

function close_sidebar() {
    $('.overlay').removeClass('active');
    $('.sidebar').removeClass('open');
    $("body").removeAttr("style");
}