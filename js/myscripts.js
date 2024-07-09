$(document).ready(function () {
    $('.slider1').slick({
        arrows: false,
        rtl: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 568,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
    $('.slider55').slick({
        prevArrow: '.prev4',
        nextArrow: '.next4',
        rtl: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: false,
        autoplay: true,
        responsive: [
            {
                breakpoint: 568,
                settings: {
                    dots: true,
                    arrows: false,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 992,
                settings: {
                    dots: false,
                    autoplay: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    arrows: true,
                    dots: false,
                    autoplay: true,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                }
            }
        ]
    });
    $('.slider66').slick({
        rtl: true,
        arrows: true,
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true
    });
    $('.slider2').slick({
        arrows: false,
        rtl: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        autoplay: true,
        responsive: [
            {
                breakpoint: 568,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 992,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false
                }
            },
            {
                breakpoint: 1920,
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false
                }
            }
        ]
    });
    $('[data-toggle="tooltip"]').tooltip();
});