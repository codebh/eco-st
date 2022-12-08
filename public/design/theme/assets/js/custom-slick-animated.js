
$('.slide-camp').slick({
    infinite: false,
    dots: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,

    speed: 700,
    lazyLoad: 'progressive',
    prevArrow: null,
    nextArrow: null,



    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});

$('.slide-ads').slick({
    infinite: true,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    speed: 900,
    lazyLoad: 'progressive',
    prevArrow: null,
    nextArrow: null,
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$('.slide-shops').slick({
    // infinite: true,
    dots: true,
    slidesToShow: 6,
    slidesToScroll: 2,
    autoplay: true,
    speed: 800,
    lazyLoad: 'progressive',
    prevArrow: null,
    nextArrow: null,
    infinite: false,
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 7,
                slidesToScroll: 2,
                dots: true,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2,
                dots: true,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                dots: true,
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$('.slide-category').slick({
    infinite: true,
    dots: false,
    slidesToShow: 6,
    slidesToScroll: 2,
    autoplay: true,
    speed: 800,
    lazyLoad: 'progressive',
    prevArrow: null,
    nextArrow: null,
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 7,
                slidesToScroll: 2,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$('.slide_collections').slick({
    infinite: true,
    dots: true,
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    speed: 800,
    lazyLoad: 'progressive',
    prevArrow: null,
    nextArrow: null,
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});



$('.slider-animate').slick({
  autoplay: true,
  speed: 800,
  lazyLoad: 'progressive',
  fade: true,
  dots: false,
}).slickAnimation();


$('.product-slick-animated').slick({
  autoplay: true,
  speed: 1000,
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: true,
  lazyLoad: 'progressive',
  fade: true,
  asNavFor: '.animated-nav',
}).slickAnimation();


$('.center-home-slider').slick({
    infinite: true,
    // dots: true,

    autoplay: true,
  centerMode: true,
    centerPadding: '0px',
  slidesToShow: 1,
  responsive: [
    {
      breakpoint: 769,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1
      }
    }
  ]
}).slickAnimation();





