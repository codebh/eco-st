




@extends('style.newIndex')

@section('content')

    <style>
        .card{
            font-family: 'Roboto', sans-serif;
        }

        img {
            transition: transform .25s ease;
        }

        /* img:hover{
            transform: scale(1.1);
        } */
    </style>



    <style>
        @media only screen and (max-width: 480px) {
            .img-fluid-sec {
                height: 148px !important;


            }
        }

        @media only screen and (min-width: 480px) and (max-width: 600px) {
            .img-fluid-sec {
                height: 180px !important;


            }
        }

        @media only screen and (min-width: 600px) and  (max-width: 1024px) {
            .img-fluid-sec {
                height: 138px !important;


            }
        }

        @media only screen and  (min-width: 1024px) {
            .img-fluid-sec {
                height: 250px !important;
                text-align: center !important;

            }
        }


    </style>



    {{-- <div class="banner">
        <div class="sliding-banner-container">
            <ul class="sliding-banner">
                @forelse(\App\Models\Ads::all()->where('type',session('lang') =='ar'?'ar':'en') as  $item)

                    <li class="sliding-banner-item">
                        <a href="{{$item->url}}">

                        <img class="sliding-banner-img" src="https://images.tafseel.net/{{$item->image}}" alt="">
                        </a>


                    </li>
                @empty

                @endforelse
            </ul>
        </div>
    </div> --}}



    <div class="slide-ads">

        @foreach (\App\Models\Ads::all()->where('type',session('lang') =='ar'?'ar':'en') as $item)
            <div>

                @if($item->url !==null)
                <a href="{{$item->url}}">
                    {{-- <picture>
                        <source media="(max-width:200px)" srcset="{{imageDo($item ->image)}}">
                        <source media="(max-width:200px)" srcset="{{imageDo($item ->image)}}">
                        <img src="{{imageDo($item ->image)}}" class="img-fluid"  style="width:auto;">
                    </picture> --}}


                    <img src="{{imageDo($item ->image)}}" alt="" class="img-fluid ">
                </a>
                @else
                <img src="{{imageDo($item ->image)}}" alt="" class="img-fluid ">




                @endif
            </div>
        @endforeach
    </div>





    <section class="section-b-space pt-0 ">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="title1 section-t-space">

                    <h2 class="title-inner1"> {{trans('user.shop_by_category')}}</h2>
                </div>
            </div>

        </div>
        <div class="row margin-default ratio_square slide-category">
            @forelse (App\Models\Category::all() as $category)
                <div class="col-xl-2 col-sm-3 col-4">
                    <a href="{{route('find.categories',$category->slug)}}">
                        <div class="img-category">
                            <div class="img-sec">
                                {{-- <picture>
                                    <source media="(min-width:100px)" srcset="{{imageDo($category->image)}}">
                                        <source media="(min-width:100px)" srcset="{{imageDo($category->image)}}">
                                            <div class="img-sec">
                                            <img
                                            src="{{imageDo($category->image)}}"
                                            class="img-fluid bg-img "alt="Flowers" style="width:auto;">
                                        </div>
                                    </picture> --}}
                                <img src="{{imageDo($category->image)}}" class="img-fluid bg-img"
                                     alt="">
                            </div>
                            <h4>{{session('lang')== 'ar'?$category->name_ar:$category->name_en}}</h4>
                        </div>
                    </a>
                </div>

            @empty

            @endforelse

        </div>

    </div>
</section>


@if (count(\App\Models\Campaign::all()) >0)


<div class="slide-camp">

    @foreach (\App\Models\Campaign::where('type',session('lang')== 'ar'?'ar':'en')->whereDate('date_of_start','<=', \Carbon\Carbon::now())
    ->whereDate('date_of_end','>=', \Carbon\Carbon::now())->get() as $item)
            <div class="p-4">
            @if($item->url !==null)
                <a href="{{$item->url}}">
                    <img src="{{imageDo($item ->image)}}" alt="" class="img-fluid ">
                </a>
                @else
                <img src="{{imageDo($item ->image)}}" alt="" class="img-fluid ">
                @endif
            </div>
    @endforeach
</div>
 <!-- collection banner -->
 {{-- <section class="pb-0 ratio2_1">
    <div class="container">
        <div class="row partition2 slide-camp">
            @foreach (\App\Models\Campaign::whereDate('date_of_start','<=', \Carbon\Carbon::now())
            ->whereDate('date_of_end','>=', \Carbon\Carbon::now())->get() as $item)
            <div class="col-md-6">
                <a href="#">
                    <div class="">
                        <div class="img-part">
                            <img src="{{ imageDo($item->image) }}" class="img-fluid blur-up lazyload bg-img"
                                alt="">
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
</section> --}}
<!-- collection banner end -->
@endif

{{-- @if (count(App\Models\Category::all())  > 0 )
<div class="row">
    <div class="col">
        <div class="title1">
            <a  href="{{ route('shops') }}" class="btn btn-solid" >{{ trans('user.load_more_tab') }}</a>
        </div>
    </div>
</div>
@endif --}}




    <section class="section-b-space pt-5 light-layout">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="theme-tab">

                        <ul class="tabs tab-title nav-material">
                            <li class="current li"><a href="tab-4">{{trans('user.new_in')}}</a></li>
                            <li class=" li"><a href="tab-5">{{trans('user.sell_products')}}</a></li>
                            <li class=" li"><a href="tab-6">{{trans('user.explore_all')}}</a></li>
                        </ul>
                        <div class="tab-content-cls">
                            <div id="tab-4" class="tab-content active default">

                                <div class="no-slider row  ratio_asos">

                                    @forelse ($products as $product)
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="lable-block">
                                                    <span class="lable3">{{trans('user.new')}}</span>
                                                   @if ($product->category_id  == 1)
                                                        @if ($product->qty > 0)
                                                        @else
                                                         <span class="lable4" style="background-color: white">{{trans('user.sold_out')}}</span>
                                                        @endif
                                                    @elseif ($product->category_id == 2)
                                                       @if ($product->qty > 0)
                                                       @else
                                                        <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                       @endif
                                                    @else
                                                       @if ( count($product->size_data()->where('size_qty','>',0)->get())>0)
                                                       @else
                                                           <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                       @endif
                                               @endif
                                                </div>
                                                <div class="front">
                                                    <a href="{{route('all-products.show', $product->title)}}">
                                                        {{-- <picture>
                                                            <source media="(min-width:650px)" srcset="{{imageDo($product->main_image)}}">
                                                            <source media="(min-width:465px)" srcset="{{imageDo($product->main_image)}}">
                                                                <img
                                                                src="{{imageDo($product->main_image)}}"
                                                                class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                            </picture> --}}
                                                        <img
                                                            src="{{imageDo($product->main_image)}}"
                                                            class="img-fluid blur-up lazyload " alt=""></a>

                                                </div>
                                                @foreach($product->image_data()->get() as $image)
                                                    @if ($loop->first)
                                                        <div class="back">
                                                            <a href="{{ route('all-products.show', $product->title) }}">


                                                                {{-- <picture>
                                                                    <source media="(min-width:650px)" srcset="{{imageDo($image->image_key)}}">
                                                                    <source media="(min-width:465px)" srcset="{{imageDo($image->image_key)}}">
                                                                        <img
                                                                        src="{{imageDo($image->image_key)}}"
                                                                        class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                                </picture> --}}
                                                                <img
                                                                    src="{{imageDo($image->image_key)}}"
                                                                    class="img-fluid blur-up lazyload "
                                                                    alt=""></a>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>

                                            <div class="product-detail">
                                                <div class="detail-inline">
                                                    <a href="{{route('all-products.show', $product->title)}}">
                                                        <h6 style="text-transform: lowercase;">{{$product->title}}</h6>
                                                    </a>
                                                    @if ($product->price_offer > 0 and $product->status =='active')

                                                        <h4> {{presentPrice($product->price_offer)}}
                                                            <del>{{presentPrice($product->price)}}</del>
                                                        </h4>
                                                    @else
                                                        <h4>{{presentPrice($product->price)}}</h4>
                                                    @endif
                                                </div>
                                                <hr>
                                                <div class="detail-inline">
                                                    <a href="{{route('find.categories', $product->category->name_en)}}">
                                                        <h6>{{session('lang') == 'ar' ? $product->category->name_ar:$product->category->name_en}}</h6>
                                                    </a>
                                                    <h4>
                                                            <a href="{{ route('shops.find',$product->store->slug ) }}" style="color:black">
                                                                {{$product->store->name}}
                                                            </a>
                                                        </h4>
                                                </div>
                                                {{-- @if ($product->category_id !==1 or $product->category_id !==2)
                                                <ul class="color-variant quantity-variant box-l">
                                                    @foreach ($product->size_data()->get() as $size)
                                                        <li class="bg-white"  data-toggle="tooltip" data-placement="top"
                                                            title="qty:{{$size->size_qty}}">{{$size->size_data}}</li>
                                                    @endforeach
                                                </ul>
                                                @endif --}}
                                            </div>
                                        </div>


                                    @empty
                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="lable-block"><span class="lable3">new</span>
                                                    <span class="lable4">on sale</span>
                                                </div>
                                                <div class="front">
                                                    <a href="product-page(no-sidebar).html"><img
                                                            src="{{asset('img/theme/product/792338062.jpg')}}"
                                                            class="img-fluid blur-up lazyload " alt=""></a>
                                                </div>
                                                <div class="back">
                                                    <a href="product-page(no-sidebar).html"><img
                                                            src="../assets/images/pro3/2.jpg"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i class="ti-shopping-cart"></i>
                                                    </button>
                                                    <a
                                                        href="javascript:void(0)" title="Add to Wishlist"><i
                                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                            data-bs-toggle="modal"
                                                                                                            data-bs-target="#quick-view"
                                                                                                            title="Quick View"><i
                                                            class="ti-search" aria-hidden="true"></i></a>
                                                    <a href="compare.html" title="Compare"><i class="ti-reload"
                                                                                              aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>sleevles white tshirt with text</h6>
                                                </a>
                                                <h4>$65.00</h4>
                                                <ul class="color-variant">
                                                    <li class="bg-light0" data-toggle="tooltip" data-placement="top"
                                                        title="Tooltip on top"></li>
                                                    <li class="bg-light1"></li>
                                                    <li class="bg-light2"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforelse
                                    @if (count($products) > 0)

                                    <div class="row">
                                        <div class="col">
                                            <div class="title1 section-t-space">
                                                <a  href="{{ route('newIn.products') }}" class="btn btn-solid" >{{ trans('user.load_more_tab') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div id="tab-5" class="tab-content">
                                <div class="no-slider row">
                                    @forelse ($saleItems as $sale)

                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="lable-block">
                                                    <span class="lable4" style="background-color: white">{{trans('user.sale')}}</span>
                                                </div>
                                                <div class="front">
                                                    <a href="{{route('all-products.show', $sale->title) }}">

                                                        {{-- <picture>
                                                            <source media="(min-width:650px)" srcset="{{imageDo($sale->main_image)}}">
                                                            <source media="(min-width:465px)" srcset="{{imageDo($sale->main_image)}}">
                                                                <img
                                                                src="{{imageDo($sale->main_image)}}"
                                                                class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                        </picture> --}}

                                                        <img
                                                            src="{{imageDo($sale->main_image)}}"
                                                            class="img-fluid blur-up lazyload " alt="">
                                                    </a>
                                                </div>
                                                @foreach($sale->image_data()->get() as $image)
                                                    @if ($loop->first)
                                                        <div class="back">
                                                            <a href="{{route('all-products.show', $sale->title) }}">

{{--
                                                                <picture>
                                                                    <source media="(min-width:650px)" srcset="{{imageDo($image->image_key)}}">
                                                                    <source media="(min-width:465px)" srcset="{{imageDo($image->image_key)}}">
                                                                        <img
                                                                        src="{{imageDo($image->image_key)}}"
                                                                        class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                                </picture> --}}
                                                                <img src="{{imageDo($image->image_key)}}"
                                                                    class="img-fluid blur-up lazyload "
                                                                    alt="">
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                            <div class="product-detail">
                                                <div class="detail-inline">
                                                    <a href="{{route('all-products.show', $sale->title) }}">
                                                        <h6 style="text-transform: lowercase;">{{$sale->title}}</h6>
                                                    </a>
                                                    @if ($sale->price_offer > 0 and $sale->status =='active')

                                                        <h4> {{presentPrice($sale->price_offer)}}
                                                            <del>{{presentPrice($sale->price)}}</del>
                                                        </h4>
                                                    @else
                                                        <h4>{{presentPrice($sale->price)}}</h4>
                                                    @endif

                                                </div>
                                                <hr>
                                                <div class="detail-inline">
                                                    <a href="{{route('find.categories', $sale->category->name_en)}}">
                                                        <h6>{{session('lang') == 'ar' ? $sale->category->name_ar:$sale->category->name_en}}</h6>

                                                    </a>
                                                    <h4>
                                                        <a href="{{ route('shops.find',$sale->store->slug ) }}" style="color:black">
                                                            {{$sale->store->name}}
                                                        </a>
                                                    </h4>
                                                </div>

                                                {{-- @if ($sale->category_id !==1 or $sale->category_id !==2)

                                                    <ul class="color-variant quantity-variant box-l">
                                                        @foreach ($sale->size_data()->get() as $size)
                                                            <li class="bg-white"  data-toggle="tooltip" data-placement="top"
                                                                title="qty:{{$size->size_qty}}">{{$size->size_data}}</li>
                                                        @endforeach
                                                    </ul>
                                                @endif --}}
                                            </div>
                                        </div>
                                    @empty
                                        <div class="j-box ratio_square">
                                            <div class="product-box">
                                                <div class="img-wrapper">
                                                    <div class="lable-block">
                                                        <span class="lable3">new</span>
                                                        <span class="lable4">on sale</span>
                                                    </div>
                                                    <div class="front">
                                                        <a href="product-page(no-sidebar).html"><img
                                                                src="{{asset('img/theme/product/792338062.jpg')}}"
                                                                class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                    </div>
                                                    <div class="cart-info cart-wrap">
                                                        <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                                title="Add to cart"><i
                                                                class="ti-shopping-cart"></i></button>
                                                        <a href="javascript:void(0)" title="Add to Wishlist"><i
                                                                class="ti-heart"
                                                                aria-hidden="true"></i></a>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view"
                                                           title="Quick View"><i class="ti-search"
                                                                                 aria-hidden="true"></i></a>
                                                        <a href="compare.html" title="Compare"><i class="ti-reload"
                                                                                                  aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                                <div class="product-detail">
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <a href="product-page(no-sidebar).html">
                                                        <h6>Slim Fit Cotton Shirt</h6>
                                                    </a>
                                                    <h4>$500.00</h4>
                                                    <ul class="color-variant">
                                                        <li class="bg-light0" data-toggle="tooltip" data-placement="top"
                                                            title="Tooltip on top"></li>
                                                        <li class="bg-light1"></li>
                                                        <li class="bg-light2"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                    @endforelse
                                    @if (count($saleItems) > 0)

                                    <div class="row">
                                        <div class="col">
                                            <div class="title1 section-t-space">
                                                <a  href="{{ route('saleProducts.products') }}" class="btn btn-solid" >{{ trans('user.load_more_tab') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                </div>
                            </div>
                            <div id="tab-6" class="tab-content">
                                <div class="no-slider row">
                                    @forelse ($exploreItems as $item)
                                        <div class="product-box">

                                            <div class="img-wrapper">
                                                <div class="lable-block">
                                                    {{-- <span class="lable3">{{trans('user.new')}}</span> --}}

                                                   @if ($item->category_id  == 1)

                                                        @if ( $item->qty > 0 and  $item->show == 'active' )


                                                        @else
                                                        <span class="lable4" style="background-color: white">{{trans('user.sold_out')}}</span>

                                                        @endif



                                                    @elseif ($item->category_id == 2)
                                                       @if ($item->qty > 0 or $item->show == 'active'   )
                                                       @else
                                                        <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                       @endif
                                                    @else
                                                       @if ( count($item->size_data()->where('size_qty','>',0)->get())>0 or $item->show == 'active'  )
                                                       @else
                                                           <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                       @endif
                                               @endif
                                                </div>
                                                <div class="front">
                                                    <a href="{{route('all-products.show', $item->title) }}">

                                                        {{-- <picture>
                                                            <source media="(min-width:650px)" srcset="{{imageDo($item->main_image)}}">
                                                            <source media="(min-width:465px)" srcset="{{imageDo($item->main_image)}}">
                                                                <img
                                                                src="{{imageDo($item->main_image)}}"
                                                                class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                        </picture> --}}
                                                        <img
                                                            src="{{imageDo($item->main_image)}}"
                                                            class="img-fluid blur-up lazyload " alt=""></a>
                                                </div>
                                                @foreach($item->image_data()->get() as $image)
                                                    @if ($loop->first)
                                                        <div class="back">
                                                            <a href="{{route('all-products.show', $item->title) }}">
                                                                {{-- <picture>
                                                                    <source media="(min-width:650px)" srcset="{{imageDo($image->image_key)}}">
                                                                    <source media="(min-width:465px)" srcset="{{imageDo($image->image_key)}}">
                                                                        <img
                                                                        src="{{imageDo($image->image_key)}}"
                                                                        class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                                </picture>
                                                                 --}}

                                                                <img
                                                                    src="{{imageDo($image->image_key)}}"
                                                                    class="img-fluid blur-up lazyload "
                                                                    alt=""></a>
                                                        </div>
                                                    @endif
                                                @endforeach


                                            </div>
                                            <div class="product-detail">
                                                <div class="detail-inline">
                                                    <a href="{{route('all-products.show', $item->title) }}">
                                                        <h6 style="text-transform: lowercase;">{{$item->title}}</h6>
                                                    </a>
                                                    @if ($item->price_offer > 0 and $item->status =='active')

                                                        <h4> {{presentPrice($item->price_offer)}}
                                                            <del>{{presentPrice($item->price)}}</del>
                                                        </h4>
                                                    @else
                                                        <h4>{{presentPrice($item->price)}}</h4>
                                                    @endif

                                                </div>
                                                <hr>
                                                <div class="detail-inline">
                                                    <a href="{{route('find.categories', $item->category->name_en)}}">
                                                        <h6>{{session('lang') == 'ar' ? $item->category->name_ar:$item->category->name_en}}</h6>

                                                    </a>
                                                    <h4>
                                                        <a href="{{ route('shops.find',$item->store->slug ) }}" style="color:black">
                                                            {{$item->store->name}}
                                                        </a>
                                                    </h4>
                                                </div>

                                                {{-- @if ($item->category_id !==1 or $item->category_id !==2)

                                                    <ul class="color-variant quantity-variant box-l">
                                                        @foreach ($item->size_data()->get() as $size)

                                                            <li class="bg-white"  data-toggle="tooltip" data-placement="top"
                                                                title="qty:{{$size->size_qty}}">{{$size->size_data}}</li>
                                                        @endforeach

                                                    </ul>
                                                @endif --}}


                                            </div>
                                        </div>
                                    @empty

                                        <div class="product-box">
                                            <div class="img-wrapper">
                                                <div class="front">
                                                    <a href="product-page(no-sidebar).html"><img
                                                            src="../assets/images/pro3/27.jpg"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="back">
                                                    <a href="product-page(no-sidebar).html"><img
                                                            src="../assets/images/pro3/28.jpg"
                                                            class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                                </div>
                                                <div class="cart-info cart-wrap">
                                                    <button data-bs-toggle="modal" data-bs-target="#addtocart"
                                                            title="Add to cart"><i class="ti-shopping-cart"></i>
                                                    </button>
                                                    <a
                                                        href="javascript:void(0)" title="Add to Wishlist"><i
                                                            class="ti-heart" aria-hidden="true"></i></a> <a href="#"
                                                                                                            data-bs-toggle="modal"
                                                                                                            data-bs-target="#quick-view"
                                                                                                            title="Quick View"><i
                                                            class="ti-search" aria-hidden="true"></i></a>
                                                    <a href="compare.html" title="Compare"><i class="ti-reload"
                                                                                              aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-detail">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>purple solid polo tshirt</h6>
                                                </a>
                                                <h4>$35.00</h4>
                                                <ul class="color-variant">
                                                    <li class="bg-light0"></li>
                                                    <li class="bg-light1"></li>
                                                    <li class="bg-light2"></li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endforelse
                                    @if (count($exploreItems) > 0)

                                    <div class="row">
                                        <div class="col">
                                            <div class="title1 section-t-space">
                                                <a  href="{{ route('all-products.index') }}" class="btn btn-solid" >{{ trans('user.load_more_tab') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <br>
    <section class="vector-category">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title1 section-t-space">
                        {{--                    <h4>Recent Story</h4>--}}
                        <h2 class="title-inner1"> {{trans('user.shops')}}</h2>
                    </div>
                </div>
            </div>
            <div class="slide-shops category-slide margin-default ratio_square">
                @forelse ($stores as $store)


                    <div class="">
                        <a href="{{route('shops.find',$store->slug)}}">
                            <div class="img-category">
                                        <div class="img-sec">
                                                <img src="{{imageDo($store->logo)}}" class="img-fluid" alt="">
                                            </div>

                                <h4>{{$store->name}}</h4>
                            </div>
                        </a>
                    </div>
                @empty


                    <div class="">
                        <a href="#">
                            <div class="img-category">
                                <div class="img-sec">
                                    <img src="{{asset('img/theme/shop/banner-shop.png')}}" class="img-fluid" alt="">
                                </div>
                                <h4>more shops</h4>
                            </div>
                        </a>
                    </div>
                @endforelse




            </div>
            @if (count($stores) > 0)
            <div class="row ">
                <div class="col">
                    <div class="title1 ">
                        <a  href="{{ route('shops') }}" class="btn btn-solid" >{{ trans('user.load_more_tab') }}</a>
                    </div>
                </div>

            </div>

            @endif
        </div>
    </section>

    <!-- service layout -->
    <!--Team start-->
    <section id="team" class="team section-b-space slick-default-margin ratio_asos light-layout">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title1 ">
                        {{--                    <h4>Recent Story</h4>--}}
                        <h2 class="title-inner1"> {{trans('user.services')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="team-4">
                        <div>
                            <img src="{{asset('img/theme/servise/icons8-online-store-64.png')}}" alt="">
                            <div class="media-body">
                                <h4>{{trans('user.multiple_shops')}}</h4>
                            </div>

                        </div>

                        <div>
                            <img src="{{asset('img/theme/servise/icons8-rent-64.png')}}" alt="">
                                                    <div class="media-body">
                                                        <h4> {{trans('user.Smart_shopping')}}</h4>
                                                    </div>
                        </div>
                        <div>
                            <img src="{{asset('img/theme/servise/icons8-card-payment-64.png')}}" alt="">
                                                    <div class="media-body">
                                                        <h4>{{trans('user.online_payment')}}</h4>
                                                    </div>
                        </div>
                        <div>
                            <img src="{{asset('img/theme/servise/icons8-shipped-64.png')}}" alt="">
                                                    <div class="media-body">
                                                        <h4>
                                                            {{trans('user.delivery_service')}}
                                                        </h4>
                                                    </div>
                        </div>






                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Team ends-->



    @if (count($collections) >0)
        <section class="blog p-t-0 ratio2_3">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="title1 ">
                            <h2 class="title-inner1">{{trans('user.collections')}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="slide_collections no-arrow">
                            @forelse ($collections as $item)
                                <div class="col-md-12 p-3">
                                    <a href="{{'/collection/'.$item->slug}}">
                                        <div class="classic-effect">
                                            <div>
                                            @if (session('lang') == 'ar')
                                                    <img src="{{imageDo($item->c_image)}}"
                                                        class="img-fluid blur-up lazyload bg-img"
                                                        alt="">
                                                @else
                                                    <img src="{{imageDo($item->c_image_en)}}"
                                                        class="img-fluid blur-up lazyload bg-img"
                                                        alt="">
                                            @endif
                                            </div>
                                            <span></span>
                                        </div>
                                    </a>
                                    <div class="blog-details">
                                        {{-- <a href="{{'/collection/'.$item->namer_en}}">
                                            <h4>
                                                {{session('lang')== 'ar'?$item->name_ar:$item->name_en}}

                                            </h4>

                                        </a> --}}
                                        {{--                                    <hr class="style1">--}}
                                        @if ($item->ended_at !== null)

                                            <h6>{{ trans('user.due_date') }}: {{$item->ended_at}}</h6>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <h2>no collection</h2>
                            @endforelse

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- blog section end -->

    <br>




@endsection
