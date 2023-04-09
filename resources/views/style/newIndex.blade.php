
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0, max-age=0">

    {{ seo()->render() }}

    {{-- <meta name="description" content="tafseel"> --}}
    {{-- <meta name="keywords" content="tafseel"> --}}
    {{-- <meta name = "keywords" content = "HTML, Meta Tags, Metadata" /> --}}
    {{-- <meta name="author" content="tafseel"> --}}

    {{-- <link rel="icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon"> --}}
    {{-- <link rel="shortcut icon" href="{{asset('img/s_logo.png')}}" type="image/x-icon"> --}}
    {{-- <title>Tafseel</title> --}}


    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons -->
    <link rel="stylesheet" type="text/css" href="{{asset('design/theme/assets/css/vendors/fontawesome.css')}}">

    <!--Slick slider css-->
    <link rel="stylesheet" type="text/css" href="{{asset('design/theme/assets/css/vendors/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('design/theme/assets/css/vendors/slick-theme.css')}}">

    <!-- Animate icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('design/theme/assets/css/vendors/animate.css')}}">

    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('design/theme/assets/css/vendors/themify-icons.css')}}">

    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('design/theme/assets/css/vendors/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- Theme css -->
    <link rel="stylesheet" type="text/css" href="{{asset('design/theme/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch.min.css">
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch-theme-algolia.min.css">
    @livewireStyles
    <link rel="stylesheet" type="text/css" href="{{asset('css/j-sliding-banner.min.css')}}">
    {{--    <script type="text/javascript">--}}
    {{--        $('#container').imagesLoaded( function() {--}}
    {{--            $('.banner').jSlidingBanner({ slideAnimationSpeed : 500 });--}}
    {{--        });--}}
    {{--    </script>--}}

    <link rel="stylesheet" type="text/css" href="{{'load/assets/load-style.css'}}" />
    <link rel="stylesheet" type="text/css" href="{{'load/assets/loaders.css'}}" />
    <style>
        @import'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap';
        /*@import 'https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap';*/
        @import 'https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap';

        @if(direction()=='rtl')
        body ,*{
            /*font-family: 'Almarai', sans-serif;*/
            font-family: 'Tajawal', sans-serif;
        }
        @else
            body ,*{
            /*font-family: 'Almarai', sans-serif;*/
            font-family: 'Montserrat', sans-serif;
        }

        @endif
        .aa-input-container {
            display: block;
            position: relative;
            text-align: center;
            font-weight: bold;
        }
        /*!
 * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
 * Copyright 2015 Daniel Cardoso <@DanielCardoso>
 * Licensed under MIT
 */

        /* loading */

        .la-ball-clip-rotate,
        .la-ball-clip-rotate > div {
            position: relative;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }
        .la-ball-clip-rotate {
            display: block;
            font-size: 0;
            color: #fff;
        }
        .la-ball-clip-rotate.la-dark {
            color: #333;
        }
        .la-ball-clip-rotate > div {
            display: inline-block;
            float: none;
            background-color: currentColor;
            border: 0 solid currentColor;
        }
        .la-ball-clip-rotate {
            width: 32px;
            height: 32px;
        }
        .la-ball-clip-rotate > div {
            width: 32px;
            height: 32px;
            background: transparent;
            border-width: 2px;
            border-bottom-color: transparent;
            border-radius: 100%;
            -webkit-animation: ball-clip-rotate .75s linear infinite;
            -moz-animation: ball-clip-rotate .75s linear infinite;
            -o-animation: ball-clip-rotate .75s linear infinite;
            animation: ball-clip-rotate .75s linear infinite;
        }
        .la-ball-clip-rotate.la-sm {
            width: 16px;
            height: 16px;
        }
        .la-ball-clip-rotate.la-sm > div {
            width: 16px;
            height: 16px;
            border-width: 1px;
        }
        .la-ball-clip-rotate.la-2x {
            width: 64px;
            height: 64px;
        }
        .la-ball-clip-rotate.la-2x > div {
            width: 64px;
            height: 64px;
            border-width: 4px;
        }
        .la-ball-clip-rotate.la-3x {
            width: 96px;
            height: 96px;
        }
        .la-ball-clip-rotate.la-3x > div {
            width: 96px;
            height: 96px;
            border-width: 6px;
        }
        /*
         * Animation
         */
        @-webkit-keyframes ball-clip-rotate {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            50% {
                -webkit-transform: rotate(180deg);
                transform: rotate(180deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-moz-keyframes ball-clip-rotate {
            0% {
                -moz-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            50% {
                -moz-transform: rotate(180deg);
                transform: rotate(180deg);
            }
            100% {
                -moz-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @-o-keyframes ball-clip-rotate {
            0% {
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            50% {
                -o-transform: rotate(180deg);
                transform: rotate(180deg);
            }
            100% {
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
        @keyframes ball-clip-rotate {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }
            50% {
                -webkit-transform: rotate(180deg);
                -moz-transform: rotate(180deg);
                -o-transform: rotate(180deg);
                transform: rotate(180deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }



        /* loading */










        @media only screen and (max-width: 480px) {
            .aa-input-search {
                width: 250px;
                padding: 12px 28px 12px 12px;
                border: 2px solid #e4e4e4;
                border-radius: 4px;
                -webkit-transition: .2s;
                transition: .2s;
                font-family: "Montserrat", sans-serif;
                box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
                font-size: 12px;
                box-sizing: border-box;
                color: #333;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }
        }
        @media only screen and (min-width: 481px) {
            .aa-input-search {
                width: 600px;
                padding: 12px 28px 12px 12px;
                border: 2px solid #e4e4e4;
                border-radius: 4px;
                -webkit-transition: .2s;
                transition: .2s;
                font-family: "Montserrat", sans-serif;
                box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
                font-size: 12px;
                box-sizing: border-box;
                color: #333;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;


            }
        }


        .aa-input-search::-webkit-search-decoration, .aa-input-search::-webkit-search-cancel-button, .aa-input-search::-webkit-search-results-button, .aa-input-search::-webkit-search-results-decoration {
            display: none;
        }

        .aa-input-search:focus {
            outline: 0;
            border-color: #3a96cf;
            box-shadow: 4px 4px 0 rgba(58, 150, 207, 0.1);
        }

        .aa-input-icon {
            height: 16px;
            width: 16px;
            position: absolute;
            top: 50%;
            right: 16px;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            fill: #e4e4e4;
            text-align: center;
        }

        .aa-hint {
            color: #e4e4e4;
        }


        @media only screen and (max-width: 480px) {
            .aa-dropdown-menu {
                background-color: #fff;
                border: 2px solid rgba(228, 228, 228, 0.6);
                border-top-width: 1px;
                font-family: "Montserrat", sans-serif;
                width: 250px;
                margin-top: 10px;
                box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
                font-size: 12px;
                border-radius: 4px;
                box-sizing: border-box;
                word-wrap: break-word;
            }
        }
        @media only screen and (min-width: 481px) {
            .aa-dropdown-menu {
                background-color: #fff;
                border: 2px solid rgba(228, 228, 228, 0.6);
                border-top-width: 1px;
                font-family: "Montserrat", sans-serif;
                width: 600px;
                margin-top: 10px;
                box-shadow: 4px 4px 0 rgba(241, 241, 241, 0.35);
                font-size: 12px;
                border-radius: 4px;
                box-sizing: border-box;
                word-wrap: break-word;
            }
        }


        .aa-suggestion {
            padding: 12px;
            border-top: 1px solid rgba(228, 228, 228, 0.6);
            cursor: pointer;
            -webkit-transition: .2s;
            transition: .2s;
            /* display: -webkit-box;
            display: -ms-flexbox;
            display: flex; */
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .aa-suggestion:hover, .aa-suggestion.aa-cursor {
            background-color: rgba(241, 241, 241, 0.65);
        }

        .aa-suggestion > span:first-child {
            color: #333;
        }

        .aa-suggestion > span:last-child {
            text-transform: uppercase;
            color: #a9a9a9;
        }

        .aa-suggestion span em {
            font-weight: 700;
            font-style: normal;
            background-color:  #726189;
            padding: 2px 0 2px 2px;
        }

        .algolia-result {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .algolia-thumb {
            max-width: 50px;
            max-height: 80px;
        }

        .algolia-details {
            color: #919191;
        }

        .ais-hits--item em {
            background-color: rgba(58, 150, 207, 0.3);
        }

    </style>
</head>
<body class="theme-color-29 {{session('lang') == 'ar' ?'rtl':''}}">


<!-- loader start -->
<div class="loader_skeleton">
    <header class="header-tools zindex-up header-style top-relative">
        <div class="logo-menu-part">
            <div class="container container-lg border-bottom-0 rounded-5">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="main-menu">
                            <div class="menu-left">
                                <div class="brand-logo">
                                    <a href="{{'/'}}"> <img src="{{asset('img/theme/logo/logo03.png')}}"
                                                            style="height: 50px"
                                                            class="img-fluid blur-up lazyload" alt=""></a>
                                </div>
                            </div>
                            <div class="menu-right pull-right">
                                <div>
                                    <nav>
                                        <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                        <ul class="sm pixelstrap sm-horizontal li">
                                            <li>
                                                <div class="mobile-back text-end">{{trans('user.back')}}<i
                                                        class="fa fa-angle-right ps-2"
                                                        aria-hidden="true"></i></div>
                                            </li>
                                            <li><a href="#">{{trans('user.categories')}}</a></li>

                                            <li><a href="{{route('shops')}}">{{trans('user.shops')}}</a></li>
                                            <li><a href="{{route('saleProducts.products')}}">{{trans('user.sell_products')}}</a></li>
                                            <li><a href="{{route('about')}}">{{trans('user.about_us')}}</a></li>
                                            <li><a href="{{route('sellWithUs.page')}}">{{trans('user.sell_with_us')}}</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="top-header">
                                    <ul class="header-dropdown">
                                        <li class="onhover-div mobile-search li">
                                            <div><a href="{{route('search.auto')}}">
                                                    <img
                                                        src="{{asset('design/theme/assets/images/icon/search.png')}}"

                                                        class="img-fluid blur-up lazyload" alt="">
                                                    <i class="ti-search"></i>
                                                </a>
                                            </div>
                                            {{--                                                    <div id="search-overlay" class="search-overlay">--}}
                                            {{--                                                        <div>--}}
                                            {{--                                                            <span class="closebtn" onclick="closeSearch()"--}}
                                            {{--                                                                  title="Close Overlay">×</span>--}}
                                            {{--                                                            <div class="overlay-content">--}}
                                            {{--                                                                <div class="container">--}}
                                            {{--                                                                    <div class="row">--}}
                                            {{--                                                                        <div class="col-xl-12">--}}
                                            {{--                                                                            <form>--}}
                                            {{--                                                                                <div class="form-group">--}}
                                            {{--                                                                                    <input type="text"--}}
                                            {{--                                                                                           class="form-control"--}}
                                            {{--                                                                                           id="exampleInputPassword1"--}}
                                            {{--                                                                                           placeholder="Search a Product">--}}
                                            {{--                                                                                </div>--}}
                                            {{--                                                                                <button type="submit"--}}
                                            {{--                                                                                        class="btn btn-primary"><i--}}
                                            {{--                                                                                        class="fa fa-search"></i>--}}
                                            {{--                                                                                </button>--}}
                                            {{--                                                                            </form>--}}
                                            {{--                                                                        </div>--}}
                                            {{--                                                                    </div>--}}
                                            {{--                                                                </div>--}}
                                            {{--                                                            </div>--}}
                                            {{--                                                        </div>--}}
                                            {{--                                                    </div>--}}
                                        </li>

                                        <li class="onhover-dropdown mobile-account li">
                                            <img src="{{asset('design/theme/assets/images/icon/user-1.png')}}"
                                                 alt="">
                                            <ul class="onhover-show-div">

                                                @guest
                                                    <li>
                                                        <a href="{{ route('login') }}" data-lng="en">
                                                            {{trans('user.login')}}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('register') }}" data-lng="es">
                                                            {{trans('user.register')}}
                                                        </a>
                                                    </li>
                                                @else
                                                    <li>
                                                        <a href="{{route('user.edit')}}" data-lng="en">
                                                            {{trans('user.my_account')}}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                            {{trans('user.logout')}}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            {{ csrf_field() }}
                                                        </form>
                                                    </li>





                                                @endguest


                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="icon-nav d-none d-sm-block">
                                        <ul>
                                            <li class="onhover-div mobile-cart li">
                                                <div><img src="{{asset('design/theme/assets/images/icon/heart-1.png')}}"
                                                          class="img-fluid blur-up lazyload" alt=""> <i
                                                        class="ti-shopping-cart"></i></div>


                                                <ul class="show-div shopping-cart" >

                                                    @auth()
                                                        <li>
                                                            <a href="{{ route('fav.items') }}" data-lng="en">
                                                                {{trans('user.favourite_items').'('.\App\Models\FavItems::where('user_id',auth()->user()->id)->count().')'}}
                                                            </a>
                                                        </li>

                                                        <li>
                                                            <a href="{{ route('fav.shops') }}" data-lng="en">
                                                                {{trans('user.favourite_shops').'('.\App\Models\FavShops::where('user_id',auth()->user()->id)->count().')'}}
                                                            </a>
                                                        </li>
                                                    @endauth
                                                </ul>
                                            </li>
                                            <li class="onhover-div mobile-setting li">
                                                <div><img
                                                        src="{{asset('design/theme/assets/images/icon/setting-1.png')}}"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                    <i class="ti-settings"></i>
                                                </div>
                                                <div class="show-div setting">
                                                    <h6>{{trans('user.language')}}</h6>
                                                    <ul>

                                                        <li><a href="{{url('lang/en')}}">english</a></li>
                                                        <li><a href="{{url('lang/ar')}}">عربي</a></li>
                                                    </ul>

                                                </div>
                                            </li>
                                            @livewire('style.cart-info')
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="home-slider">
        <div class="home"></div>
    </div>
    <section>
        <div class="container container-lg">
            <div class="row margin-default ratio_square">
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <a href="#">
                        <div class="gradient-category">
                            <div class="gradient-border"></div>
                            <h4></h4>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <a href="#">
                        <div class="gradient-category hover-effect">
                            <div class="gradient-border"></div>
                            <h4></h4>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <a href="#">
                        <div class="gradient-category">
                            <div class="gradient-border"></div>
                            <h4></h4>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <a href="#">
                        <div class="gradient-category">
                            <div class="gradient-border"></div>
                            <h4></h4>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <a href="#">
                        <div class="gradient-category">
                            <div class="gradient-border"></div>
                            <h4></h4>
                        </div>
                    </a>
                </div>
                <div class="col-xl-2 col-md-3 col-sm-4 col-6">
                    <a href="#">
                        <div class="gradient-category">
                            <div class="gradient-border"></div>
                            <h4></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="pb-0 ratio2_1">
        <div class="container container-lg">
            <div class="row partition2">
                <div class="col-md-6">
                    <a href="#">
                        <div class="collection-banner p-right text-center">
                            <div class="ldr-bg">
                                <div class="contain-banner">
                                    <div>
                                        <h4></h4>
                                        <h2></h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#">
                        <div class="collection-banner p-right text-center">
                            <div class="ldr-bg">
                                <div class="contain-banner">
                                    <div>
                                        <h4></h4>
                                        <h2></h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="banner-goggles ratio2_1 banner-padding">
        <div class="container container-lg">
            <div class="row partition3">
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-right text-end">
                            <div class="ldr-bg">
                                <div class="contain-banner banner-3">
                                    <div>
                                        <h4></h4>
                                        <h2></h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-right text-end">
                            <div class="ldr-bg">
                                <div class="contain-banner banner-3">
                                    <div>
                                        <h4></h4>
                                        <h2></h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="collection-banner p-right text-end">
                            <div class="ldr-bg">
                                <div class="contain-banner banner-3">
                                    <div>
                                        <h4></h4>
                                        <h2></h2>
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- loader end -->


<!-- header start -->

<header class="header-tools zindex-up header-style top-relative">
    <div class="mobile-fix-option"></div>
    <div class="logo-menu-part">
        <div class="container container-lg border-bottom-0 rounded-5">
            <div class="row">
                <div class="col-sm-12">
                    <div class="main-menu">
                        <div class="menu-left">
                            <div class="brand-logo">
                                <a href="{{'/'}}">
                                    <img src="{{asset('img/theme/logo/logo03.png')}}"
                                         style="height: 50px"
                                         class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                        </div>
                        <div class="menu-right pull-right">
                            <div>
                                <nav id="main-nav">
                                    <div class="toggle-nav"><i class="fa fa-bars sidebar-bar"></i></div>
                                    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
                                        <li>
                                            <div class="mobile-back text-end">{{trans('user.back')}}<i
                                                    class="fa fa-angle-right ps-2"
                                                    aria-hidden="true"></i></div>
                                        </li>



                                        <li class=" ">
                                            <a href="#">{{trans('user.categories')}}</a>
                                            <ul class="onhover-show-div">
                                                <li>
                                                    <a href="{{route('newIn.products')}}">{{trans('user.new_in')}}</a>
                                                </li>
                                                <li>
                                                    <a href="{{'/all-products'}}">{{trans('user.explore_all')}}</a>
                                                </li>

                                                @forelse (\App\Models\Category::all() as $category)
                                                    <li>
                                                        <a href="{{route('find.categories',$category->slug)}}">{{session('lang')== 'ar'?$category->name_ar:$category->name_en}}</a>
                                                    </li>
                                                @empty
                                                    {{trans('user.no_catagory')}}
                                                @endforelse

                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('shops')}}">{{trans('user.shops')}}</a>

                                        </li>

                                        <li>
                                            <a href="{{route('saleProducts.products')}}">{{trans('user.sell_products')}}</a>

                                        </li>
                                        <li><a href="#">{{trans('user.about_us')}}</a>
                                            <ul>
                                                <li>
                                                    <a href="{{route('about')}}">{{trans('user.about_us')}}</a>

                                                </li>
                                                <li>
                                                    <a href="{{route('termAndConditions.page')}}">{{trans('user.term_c')}}</a>
                                                </li>
                                                <li>
                                                    <a href="#"> {{trans('user.policies')}} </a>
                                                    <ul>
                                                        <li>
                                                            <a href="{{route('buyer.page')}}">{{trans('user.buyer_p')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('seller.page')}}">{{trans('user.seller_p')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('paymentPolicy.page')}}">{{trans('user.payment_fees')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('communicationPolicy.page')}}">{{trans('user.communications_p')}}</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('privacy.page')}}">{{trans('user.privacy_p')}}</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{route('faqs.page')}}">{{trans('user.faqs')}}</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{route('sellWithUs.page')}}">{{trans('user.sell_with_us')}}</a>

                                        </li>


                                    </ul>
                                </nav>
                            </div>
                            <div class="top-header">
                                <ul class="header-dropdown">





                                    <li class="onhover-dropdown mobile-wishlist li ">
                                        <img src="{{asset('design/theme/assets/images/icon/heart-1.png')}}"
                                             alt="">

                                        <ul class="onhover-show-div">


                                            @auth()


                                                <li>
                                                    <a href="{{ route('fav.items') }}" data-lng="en">
                                                        {{trans('user.favourite_items').'('.\App\Models\FavItems::where('user_id',auth()->user()->id)->count().')'}}
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{ route('fav.shops') }}" data-lng="en">
                                                        {{trans('user.favourite_shops').'('.\App\Models\FavShops::where('user_id',auth()->user()->id)->count().')'}}
                                                    </a>
                                                </li>
                                            @endauth
                                        </ul>
                                    </li>



                                    <li class="onhover-dropdown mobile-account li">
                                        <img src="{{asset('design/theme/assets/images/icon/user-1.png')}}"
                                             alt="">
                                        <ul class="onhover-show-div">
                                            @guest
                                                <li>
                                                    <a href="{{ route('login') }}" data-lng="en">
                                                        {{trans('user.login')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('register') }}" data-lng="es">
                                                        {{trans('user.register')}}
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{route('user.edit')}}" data-lng="en">
                                                        {{trans('user.my_account')}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{trans('user.logout')}}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            @endguest
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="icon-nav">
                                    <ul>
                                        <li class="onhover-div mobile-search li">
                                            <div><a href="{{route('search.auto')}}">
                                                    <img
                                                        src="{{asset('design/theme/assets/images/icon/search.png')}}"
                                                        onclick="openSearch()"
                                                        class="img-fluid blur-up lazyload" alt="">
                                                    <i class="ti-search" ></i>
                                                </a>
                                            </div>

                                        </li>
                                        <li class="onhover-div mobile-setting li">
                                            <div><img
                                                    src="{{asset('design/theme/assets/images/icon/setting-1.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                                <i class="ti-settings"></i>
                                            </div>
                                            <div class="show-div setting">
                                                <h6>{{trans('user.language')}}</h6>
                                                <ul>
                                                    <li><a href="{{url('lang/en')}}">english</a></li>
                                                    <li><a href="{{url('lang/ar')}}">عربي</a></li>
                                                </ul>

                                            </div>
                                        </li>





                                        @livewire('style.cart-info')


                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- header end -->
{{--@include('style.layouts.message')--}}

@yield('content')
{{ seo('body')->render() }}

<!-- footer -->
<footer class="footer-light">
    {{--            <div class="light-layout">--}}
    {{--                <div class="container container-lg">--}}
    {{--                    <section class="small-section border-section border-top-0">--}}
    {{--                        <div class="row">--}}
    {{--                            <div class="col-lg-6">--}}
    {{--                                <div class="subscribe">--}}
    {{--                                    <div>--}}
    {{--                                        <h4>KNOW IT ALL FIRST!</h4>--}}
    {{--                                        <p>Never Miss Anything From Multikart By Signing Up To Our Newsletter.</p>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                            <div class="col-lg-6">--}}
    {{--                                <form--}}
    {{--                                    action="https://pixelstrap.us19.list-manage.com/subscribe/post?u=5a128856334b598b395f1fc9b&amp;id=082f74cbda"--}}
    {{--                                    class="form-inline subscribe-form auth-form needs-validation" method="post"--}}
    {{--                                    id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank">--}}
    {{--                                    <div class="form-group mx-sm-3">--}}
    {{--                                        <input type="text" class="form-control" name="EMAIL" id="mce-EMAIL"--}}
    {{--                                               placeholder="Enter your email" required="required">--}}
    {{--                                    </div>--}}
    {{--                                    <button type="submit" class="btn btn-solid"--}}
    {{--                                            id="mc-submit">subscribe--}}
    {{--                                    </button>--}}
    {{--                                </form>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </section>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    <section class="section-b-space light-layout">
        <div class="container container-lg">
            <div class="row footer-theme partition-f">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-title footer-mobile-title">
                        <h4>{{trans('user.about_us')}}</h4>
                    </div>
                    <div class="footer-contant">
                        <div class="footer-logo">
                            <img src="{{asset('design/theme/assets/images/Logo-01.png')}}" style="height: 60px;" alt="">
                        </div>
                        <p>{{trans('user.footer_p')}}</p>
                        <div class="footer-social">
                            <ul>
                                {{--                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>--}}
                                {{--                                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>--}}
                                {{--                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>--}}
                                {{--                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>--}}
                                {{--                                        <li><a href="#"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>--}}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col offset-xl-1">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>{{trans('user.joinUs')}}</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="{{route('login')}}">{{trans('user.login')}}</a></li>
                                <li><a href="{{route('sellWithUs.page')}}">{{trans('user.sell_with_us')}}</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>{{trans('user.get_to_know_us')}}</h4>
                        </div>
                        <div class="footer-contant">
                            <ul>
                                <li><a href="{{route('about')}}">{{trans('user.about_us')}}</a></li>
                                <li><a href="{{route('termAndConditions.page')}}">{{trans('user.term_c')}}</a></li>
                                <li><a href="{{route('buyer.page')}}">{{trans('user.buyer_p')}}</a></li>
                                <li><a href="{{route('seller.page')}}">{{trans('user.seller_p')}}</a></li>
                                <li><a href="{{route('paymentPolicy.page')}}">{{trans('user.payment_fees')}}</a></li>
                                <li><a href="{{route('communicationPolicy.page')}}">{{trans('user.communications_p')}}</a></li>
                                <li><a href="{{route('privacy.page')}}">{{trans('user.privacy_p')}}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="sub-title">
                        <div class="footer-title">
                            <h4>{{trans('user.contactUs')}}</h4>
                        </div>
                        <div class="footer-contant">
                            <ul class="contact-list">

                                <li><i class="fa fa-whatsapp"></i><a href="https://wa.me/97338108673">0097338108673</a>  </li>
                                <li><i class="fa fa-envelope-o"></i> <a href="mailto:info@tafseel.net">info@tafseel.net</a>
                                </li>
                                <li><i class="fa fa-instagram"></i><a href="https://www.instagram.com/tafseelplatform/?utm_medium=copy_link">Tafseelplatform</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="sub-footer">
        <div class="container container-lg">
            <div class="row">
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="footer-end">
                        <p><i class="fa fa-copyright" aria-hidden="true"></i> 2021 tafseel.net</p>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6 col-sm-12">
                    <div class="payment-card-bottom">
                        <ul>

                            <li>
                                <img class=" mx-auto d-block"     src="{{url('design')}}/theme/assets/images/icon/paymentbenefitoriginal.png" alt="">
                            </li>
                            <li>
                                <img class=" mx-auto d-block"   src="{{url('design')}}/theme/assets/images/icon/paymentsoriginal.png" alt="" >
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<br>

<!-- footer end -->


<!-- theme setting -->
<div class="theme-settings " style="visibility: hidden;">
    <ul>

        <li class="input-picker">
            <input id="ColorPicker1" type="color" value="#DD5E89" name="Background" hidden>
        </li>
        <li class="input-picker">
            <input id="ColorPicker2" type="color" value="#F7BB97" name="Background" hidden>
        </li>
    </ul>
</div>
<!-- theme setting -->





<!-- tap to top start -->
<div class="tap-top ">
    <div><i class="fa fa-angle-double-up"></i></div>
</div>



<script src="{{asset('design/theme/assets/js/jquery-3.3.1.min.js')}}"></script>
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@livewireScripts
<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">


    <x-livewire-alert::flash />

    <!-- latest jquery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- slick js-->
<script src="{{asset('design/theme/assets/js/slick.js')}}"></script>
<script src="{{asset('design/theme/assets/js/slick-animation.min.js')}}"></script>
<!-- exitintent jquery-->
<script src="{{asset('design/theme/assets/js/jquery.exitintent.js')}}"></script>
<script src="{{asset('design/theme/assets/js/exit.js')}}"></script>

<!-- wow js-->
<script src="{{asset('design/theme/assets/js/wow.min.js')}}"></script>

<!-- menu js-->
<script src="{{asset('design/theme/assets/js/menu.js')}}"></script>

<!-- lazyload js-->
<script src="{{asset('design/theme/assets/js/lazysizes.min.js')}}"></script>

<!-- Bootstrap js-->
<script src="{{asset('design/theme/assets/js/bootstrap.bundle.min.js')}}"></script>

<!-- Bootstrap Notification js-->
<script src="{{asset('design/theme/assets/js/bootstrap-notify.min.js')}}"></script>

<!-- Theme js-->
<script src="{{asset('design/theme/assets/js/theme-setting.js')}}"></script>
{{--        <script src="{{asset('design/theme/assets/js/color-setting.js')}}"></script>--}}
<script src="{{asset('design/theme/assets/js/script.js')}}"></script>
<script src="{{asset('design/theme/assets/js/custom-slick-animated.js')}}"></script>
{{--<!-- Include AlgoliaSearch JS Client and autocomplete.js library -->--}}

<script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://npmcdn.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('js/j-sliding-banner.min.js')}}"></script>
<script src="{{asset('load/assets/plugins.min.js')}}"></script>
<script src="{{asset('load/assets/script.min.js')}}"></script>

<script>
    Livewire.on('gotoTop', () => {
        window.scrollTo({
            top: 15,
            left: 15,
            behaviour: 'smooth'
        })
    });

    $(window).on('load', function () {
            setTimeout(function () {
                $('#exampleModal').modal('show');
            }, 2500);
    });

</script>
@stack('search-js')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // window.livewire.on('userStore', () => {
    //     $('#exampleModal').modal('hide');
    // });

    $('body').imagesLoaded( function() {
        $('.banner').jSlidingBanner({
            slideAnimationSpeed: 1000,
            setOverlay: false,
        });
        //     $('.banner').jSlidingBanner({
        //         setOverlay : false,
        //         overlayColor : "#ffffff",
        //         displayImageDuration : 4000,
        //
        // });
    });
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover()
    });

    function myFunction() {
        var inputc = document.body.appendChild(document.createElement("input"));
        inputc.value = window.location.href;
        inputc.focus();
        inputc.select();
        document.execCommand('copy');
        inputc.parentNode.removeChild(inputc);
        alert("URL Copied.");
    }
</script>
<script>
    @if(Session::has('message_success'))
        @if (direction()== 'ltr')
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    @else
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true,
            "positionClass": "toast-top-left",
        }
    @endif

    toastr.success("{{ session('message_success') }}");
    @endif


        @if(count($errors->all())>0)

        @foreach($errors->all() as $error)

        @if (direction()== 'ltr')
        toastr.options =
        {
            "closeButton" : true,
            // "progressBar" : true,
            "timeOut": "0",
        }
    @else
        toastr.options =
        {
            "closeButton" : true,
            // "progressBar" : true,
            "positionClass": "toast-top-left",
            "timeOut": "0",
        }
    @endif
    toastr.error("{{$error}}");

    @endforeach
        @endif

        {{--                @if(Session::has('error'))--}}

        {{--            --}}
        {{--            @endif--}}

        @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

        @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif
</script>

<script>

    new WOW().init();
    // $(window).on('load', function () {
    //     setTimeout(function () {
    //         $('#exampleModal').modal('show');
    //     }, 2500);
    // });


</script>


</body>

</html>
