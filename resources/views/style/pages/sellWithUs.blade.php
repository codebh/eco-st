@extends('style.newIndex')
@section('content')

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.sell_with_us') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ml-3"><a href="{{'/'}}">{{trans('user.home_page')}}</a></li> /
                            <span style="margin-right: 3px;" >{{trans('user.sell_with_us')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->


    <!-- about section start -->
    <section class="about-page section-b-space" style="padding-top:0px ">
        <div class="container">
            <div class="row">
                {{-- <div class="col-lg-12">
                    <div class="banner-section"><img src="../assets/images/about/vendor.jpg"
                            class="img-fluid blur-up lazyload" alt=""></div>
                </div> --}}
                <div class="col-sm-12">
                    <h4 style="text-align: justify">
                            {{ trans('user.sell_intro') }}
                    </h4>

                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->


    <!-- service section start -->
    <div class="container">
        <section class="service section-b-space pt-0 ">
            <div class="row partition4 ">
                <div class="col-lg-4 col-md-6 service-block1">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M320 384H128V224H64v256c0 17.7 14.3 32 32 32h256c17.7 0 32-14.3 32-32V224h-64v160zm314.6-241.8l-85.3-128c-6-8.9-16-14.2-26.7-14.2H117.4c-10.7 0-20.7 5.3-26.6 14.2l-85.3 128c-14.2 21.3 1 49.8 26.6 49.8H608c25.5 0 40.7-28.5 26.6-49.8zM512 496c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V224h-64v272z"/></svg>
                    <h4>
                    {{ trans('user.sell_icon_0') }}
                   </h4>
                    <p>

                        <ul>
                            <li>
                                {{ trans('user.sell_icon_1') }}
                            </li>
                            <li>
                                {{ trans('user.sell_icon_2') }}

                            </li>
                            <li>
                                {{ trans('user.sell_icon_3') }}

                            </li>

                        </ul>

                    </p>
                </div>
                <div class="col-lg-4 col-md-6 service-block1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M296 32h192c13.255 0 24 10.745 24 24v160c0 13.255-10.745 24-24 24H296c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24zm-80 0H24C10.745 32 0 42.745 0 56v160c0 13.255 10.745 24 24 24h192c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24zM0 296v160c0 13.255 10.745 24 24 24h192c13.255 0 24-10.745 24-24V296c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm296 184h192c13.255 0 24-10.745 24-24V296c0-13.255-10.745-24-24-24H296c-13.255 0-24 10.745-24 24v160c0 13.255 10.745 24 24 24z"/></svg>
                    <h4>
                        {{ trans('user.sell_icon_0.0') }}

                    </h4>
                    <p>
                        <ul>

                            <li>
                                {{ trans('user.sell_icon_0.1') }}
                            </li>
                            <li>
                                {{ trans('user.sell_icon_0.2') }}
                            </li>
                            <li>
                                {{ trans('user.sell_icon_0.3') }}
                            </li>
                            <li>
                                {{ trans('user.sell_icon_0.4') }}
                            </li>
                        </ul>
                    </p>
                </div>

                <div class="col-lg-4 col-md-6 service-block1 border border-0">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!-- Font Awesome Pro 5.15.4 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) --><path d="M275.3 250.5c7 7.4 18.4 7.4 25.5 0l108.9-114.2c31.6-33.2 29.8-88.2-5.6-118.8-30.8-26.7-76.7-21.9-104.9 7.7L288 36.9l-11.1-11.6C248.7-4.4 202.8-9.2 172 17.5c-35.3 30.6-37.2 85.6-5.6 118.8l108.9 114.2zm290 77.6c-11.8-10.7-30.2-10-42.6 0L430.3 402c-11.3 9.1-25.4 14-40 14H272c-8.8 0-16-7.2-16-16s7.2-16 16-16h78.3c15.9 0 30.7-10.9 33.3-26.6 3.3-20-12.1-37.4-31.6-37.4H192c-27 0-53.1 9.3-74.1 26.3L71.4 384H16c-8.8 0-16 7.2-16 16v96c0 8.8 7.2 16 16 16h356.8c14.5 0 28.6-4.9 40-14L564 377c15.2-12.1 16.4-35.3 1.3-48.9z"/></svg>
                    <h4>
                                {{ trans('user.sell_icon_1.0') }}
                    </h4>
                    <p>

                        <ul>
                            <li>
                                {{ trans('user.sell_icon_1.1') }}                            </li>
                            <li>
                                {{ trans('user.sell_icon_1.2') }}                            </li>

                        </ul>


                    </p>
                </div>
            </div>
        </section>
    </div>
    <!-- service section end -->

     <!-- Parallax banner -->
  <section class="p-0">
    <div class="full-banner parallax text-center p-left">
        <img src="{{ asset('sell/medium-shot-woman-holding-tablet.jpg') }}" alt="" class="bg-img blur-up lazyload">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="banner-contain">
                        <h3>{{ trans('user.sell_Register_Now') }}</h3>
                        <h4 style="letter-spacing: 0 ;color:#726189">{{ trans('user.sell_And_start') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Parallax banner end -->


    <!-- how to start section start -->
    <section class="section-b-space become-vendor">
        <div class="container">
            <h4>
                {{ trans('user.sell_process_0') }}
            </h4>
            <div class="step-bg">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="step-box">
                            <div>
                                <div class="steps">1</div>
                                <h4> {{ trans('user.sell_process_1') }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="step-box">
                            <div>
                                <div class="steps">2</div>
                                <h4> {{ trans('user.sell_process_2') }}</h4>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="step-box">
                            <div>
                                <div class="steps">3</div>
                                <h4>  {{ trans('user.sell_process_3') }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- how to start section end -->


    <!-- start selling section start -->
    <section class="start-selling section-b-space">
        <div class="container">
            <div class="col">
                <div>
                    <h4>{{ trans('user.sell_button_0') }}</h4>

                    <a href="https://docs.google.com/forms/d/e/1FAIpQLSd6Kogr67hirpJtVj70JPEJJxJpoANXB6HpqJw9xhPz14vRcg/viewform" class="btn btn-solid btn-sm">{{ trans('user.sell_button_1') }}</a>
                </div>
            </div>
        </div>
    </section>
    <!-- start selling section end -->





{{--
    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.sell_with_us') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ml-3"><a href="{{'/'}}">{{trans('user.home_page')}}</a></li> /
                            <span style="margin-right: 3px;" >{{trans('user.sell_with_us')}}</span>
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
            @forelse (\App\Models\Blog::where('name','sell_with_us')->get() as $blog)
                <div class="row">
                    @if (session('lang')=='ar')


                        {!! $blog->blog_ar !!}

                    @else
                        {!! $blog->blog_en !!}

                    @endif
                </div>
            @empty
                <div class="row">


                    <div class="col-sm-12">

                        <h4 style="text-align: centre; text-justify: inter-word;">Want to sell your clothing items on Tafseel?</h4>
                        <br>
                        </p> join our market-place where you can Expand your fashion business and reach more customers</p>

                        <h4><u> START NOW </u></h4>
                        <br>

                        <h4>Why Sell in Tafseel?    </h4>
                        <br>
                        <h4><u>  Great Worth </u></h4>
                        <br>
                        </p> Create a shop page to List and sell your items for just 10% fees per sale.</p>
                        <br>
                        </p> ●	Fast and Simple. </p>
                        <br>
                        </p> ●	Secure transactions.</p>



                        <h4><u> More Customers </u></h4></h4>
                        <br>
                        </p> ●	Reach shoppers searching on and off Tafseel and attract more buyers. </p>
                        <br>
                        </p> ●	Advertising and digital marketing. </p>
                        <br>
                        </p> ●	Create a sale or coupon to catch the eye of shoppers and reach them. </p>


                        <h4><u>  Simple and effective tools </u></h4></h4>
                        <br>
                        </p> Our tools and services make it easy to manage, promote and grow your business, and enjoy administrating your shop efficiently.</p>
                        <br>
                        </p> ●	Manage orders, edit listings, and respond to buyers instantly, from anywhere. </p>
                        <br>
                        </p> ●	Accept payments seamlessly. </p>
                        <br>
                        </p> ●	Analyze and optimize your shop to help you increase your sales. </p>
                        <br>

                        <h4><u> How to sell on Tafseel ? </u></h4>


                        <h4><u> sign in as a Seller Now </u></h4>


                        <br>
                        </p> ------------------------------------------------------ </p>
                        <br>
                        <h4><u>  Seller User Guid </u></h4></h4>
                        <br>
                        </p>Sellers Policy</p>
                        <br>
                        </p>Fees and payment policy </p>
                        <br>
                        </p>Sellers FAQ </p>

                        <br>
                        </p> ------------------------------------------------------ </p>
                        <br>

                    </div>
                </div>
            @endforelse

        </div>
    </section>


--}}
@stop
