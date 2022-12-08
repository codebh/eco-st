@extends('style.newIndex')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.about_us')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{'/'}}">{{ trans('user.home_page') }}</a></li> /
                            <span  aria-current="page">{{ trans('user.about_us') }}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- about section start -->
    <section class="about-page section-b-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-section"><img src="{{ asset('about tafseel_Banner.jpg') }}"
                            class="img-fluid blur-up lazyload" alt=""></div>
                </div>
                <div class="col-sm-12">
                    <h4>
                        {{ trans('user.about_title') }}
                    </h4>
                    <p>
                        {{ trans('user.about_intro') }}
                    </p>

                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->
  <style>
    .rtl .testimonial .testimonial-slider .slick-track .slick-slide:nth-child(odd) .media {
        padding-right: 0px
    }
  </style>

    <!--Testimonial start-->
    <section class="testimonial small-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="slide-2 testimonial-slider no-arrow" >
                        <div>
                            <div class="media">
                                <div class="text-center">
                                    <img src="{{ asset('tafseel_vision_icon.png') }}" alt="#">
                                    <h5>
                                        {{ trans('user.about_vision') }}
                                    </h5>
                                </div>
                                <div class="media-body">
                                    <p>
                                        {{ trans('user.about_vision_des') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="media">
                                <div class="text-center">
                                    <img src="{{ asset('tafseel_mision_icon.png') }}" alt="#">
                                    <h5>
                                        {{ trans('user.about_mission') }}
                                    </h5>
                                </div>
                                <div class="media-body">
                                    <p>
                                        {{ trans('user.about_mission_des') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Testimonial ends-->


    <!--Team start-->
    <section id="team" class="team section-b-space slick-default-margin ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h2>{{ trans('user.about_Services') }} </h2>
                    <div class="team-4">
                        <div>
                            <div>
                                <img src="{{ asset('about/tafseel_sellwithus_image.jpg') }}" class="img-fluid blur-up lazyload " alt="">
                            </div>
                            <h4>
                                {{ trans('user.about_Sell_online') }}
                            </h4>
                            @if ( session('lang') == 'ar')
                            <h6  style = "text-align: justify; direction: rtl;">
                                {{ trans('user.about_Sell_online_des') }}
                            </h6>
                            @else
                            <h6  style = "text-align: justify;">
                                {{ trans('user.about_Sell_online_des') }}
                            </h6>

                            @endif

                        </div>
                        <div>
                            <div>
                                <img src="{{ asset('about/tafseel_onlineshopping_image.jpg') }}" class="img-fluid blur-up lazyload " alt="">
                            </div>
                            <h4>
                            {{ trans('user.about_Online_shopping') }}
                            </h4>
                        @if ( session('lang') == 'ar')
                        <h6  style = "text-align: justify; direction: rtl;">
                            {{ trans('user.about_Online_shopping_des') }}
                        </h6>
                        @else
                        <h6  style = "text-align: justify;">
                            {{ trans('user.about_Online_shopping_des') }}
                        </h6>

                        @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Team ends-->


    <!-- how to start section start -->
    <section class="section-b-space become-vendor">
        <div class="container">
            <h4>
                {{ trans('user.about_Why_Tafseel') }}
            </h4>
            <div class="step-bg">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="step-box">
                            <div>
                                <h5 style="text-align: justify;">
                                    {{ trans('user.about_Why_Tafseel_1') }}
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="step-box">
                            <div>
                                <h5 style="text-align: justify">
                                    {{ trans('user.about_Why_Tafseel_2') }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- how to start section end -->


    <!-- service section start -->
    <div class="container">
        <section class="service section-b-space pt-0 mt-5 ">
            <div class="row partition4 p-">
                <div class="col-lg-3 col-md-6 service-block1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 616 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M602 118.6L537.1 15C531.3 5.7 521 0 510 0H106C95 0 84.7 5.7 78.9 15L14 118.6c-33.5 53.5-3.8 127.9 58.8 136.4 4.5.6 9.1.9 13.7.9 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18 20.1 44.3 33.1 73.8 33.1 29.6 0 55.8-13 73.8-33.1 18.1 20.1 44.3 33.1 73.8 33.1 4.7 0 9.2-.3 13.7-.9 62.8-8.4 92.6-82.8 59-136.4zM529.5 288c-10 0-19.9-1.5-29.5-3.8V384H116v-99.8c-9.6 2.2-19.5 3.8-29.5 3.8-6 0-12.1-.4-18-1.2-5.6-.8-11.1-2.1-16.4-3.6V480c0 17.7 14.3 32 32 32h448c17.7 0 32-14.3 32-32V283.2c-5.4 1.6-10.8 2.9-16.4 3.6-6.1.8-12.1 1.2-18.2 1.2z"/></svg>
                    <h4>
                        {{ trans('user.about_Multi_Shops') }}                    </h4>
                    <p style="text-align: justify">
                        {{ trans('user.about_Multi_Shops_des') }}                    </p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M352 160v-32C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128v32H0v272c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V160h-96zm-192-32c0-35.29 28.71-64 64-64s64 28.71 64 64v32H160v-32zm160 120c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm-192 0c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24z"/></svg>
                    <h4>
                        {{ trans('user.about_Smart_Shopping') }}                    </h4>
                    <p style="text-align: justify">
                        {{ trans('user.about_Smart_Shopping_des') }}                     </p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1 border border-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M0 448c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V128H0v320zm448-208c0-8.84 7.16-16 16-16h96c8.84 0 16 7.16 16 16v32c0 8.84-7.16 16-16 16h-96c-8.84 0-16-7.16-16-16v-32zm0 120c0-4.42 3.58-8 8-8h112c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H456c-4.42 0-8-3.58-8-8v-16zM64 264c0-4.42 3.58-8 8-8h304c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zm0 96c0-4.42 3.58-8 8-8h176c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-16zM624 32H16C7.16 32 0 39.16 0 48v48h640V48c0-8.84-7.16-16-16-16z"/></svg>
                    <h4>
                        {{ trans('user.about_Online_payment') }}
                    </h4>
                    <p style="text-align: justify">
                        {{ trans('user.about_Online_payment_des') }}
                     </p>
                </div>
                <div class="col-lg-3 col-md-6 service-block1 border border-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M624 352h-16V243.9c0-12.7-5.1-24.9-14.1-33.9L494 110.1c-9-9-21.2-14.1-33.9-14.1H416V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48v320c0 26.5 21.5 48 48 48h16c0 53 43 96 96 96s96-43 96-96h128c0 53 43 96 96 96s96-43 96-96h48c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm320 0c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48zm80-208H416V144h44.1l99.9 99.9V256z"/></svg>
                    <h4>
                        {{ trans('user.about_Delivery_Service') }}
                    </h4>
                    <p style="text-align: justify">
                        {{ trans('user.about_Delivery_Service_des') }}
                    </p>
                </div>
            </div>
        </section>
    </div>
    <!-- service section end -->




    <!-- start selling section start -->
    <section class="start-selling section-b-space">
        <div class="container">
            <div class="col">
                <div>
                    <h4>
                        {{ trans('user.about_join_tafseel') }}
                    </h4>

                    <a href="{{ route('sellWithUs.page') }}" class="btn btn-solid btn-sm">{{ trans('user.about_register_now') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- start selling section end -->










@endsection
