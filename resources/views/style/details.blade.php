@extends('style.newIndex')
@section('content')

    {{--    @include('style.layouts.message')--}}
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.product_details') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>{{session('lang') =='ar'? '/':''}}
                            <li class="breadcrumb-item " aria-current="page">
                                <a href="/shops/{{$product->store->slug}}">
                                    {{$product->store->name}}
                                </a>
                            </li>{{session('lang') =='ar'? '':'/'}}
                            <span class="" >{{$product->title}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <!-- section start -->
    <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-slick">
                            <div><img src="https://images.tafseel.net/{{$product->main_image}}" alt=""
                                      class="img-fluid blur-up lazyload image_zoom_cls-0"></div>
                            @foreach($product->image_data()->get() as $image)


                                <div>
                                    {{-- <picture>
                                        <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                        <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                            <img
                                            src="{{imageDo($image->image_key)}}"
                                            class="img-fluid blur-up lazyload image_zoom_cls-0"alt="Flowers" style="width:auto;">
                                        </picture> --}}

                                     <img src="{{imageDo($image->image_key)}}" alt=""
                                          class="img-fluid blur-up lazyload image_zoom_cls-0">
                                        </div>
                            @endforeach

                        </div>
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-nav">
                                    <div><img src="https://images.tafseel.net/{{$product->main_image}}" alt=""
                                              class="img-fluid blur-up lazyload image_zoom_cls-0"></div>

                                    @foreach($product->image_data()->get() as $image)
                                        <div>
                                            <img src="{{imageDo($image->image_key)}}" alt=""
                                                  class="img-fluid blur-up lazyload">
                                                  {{-- <picture>
                                                    <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                                    <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                                        <img
                                                        src="{{imageDo($image->image_key)}}"
                                                        class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                    </picture> --}}
                                                </div>

                                    @endforeach


                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-6 rtl-text mt-3">
                        <div class="product-right">
                        <div id="selectSize" class="addeffect-section product-description mb-3 ">
                                <h6 class="product-title size-text" >
                                    {{ session('lang')=='ar'?  $product->category->name_ar :  $product->category->name_en}}

                                    <span style="font-size: 18px">

                                            <a href="{{ route('shops.find',$product->store->slug ) }}" style="color:black">
                                                {{$product->store->name}}
                                            </a>

                                         {{-- {{$product->store->name }} --}}
                                    </span>
                                </h6>
                        </div>

                            <div id="selectSize" class="addeffect-section product-description border-product">
                                <h6 class="product-title size-text" style="text-transform: lowercase;">
                                    {{ $product->title }}

                                    <span>

                                            @if ($product->category_id  == 1)
                                                @if ($product->qty > 0)

                                                <div class="label-section">
                                                    <span class="badge" style="background-color:#69B1C9;">{{ trans('user.inStoke') }}</span>
                                                </div>
                                                @else
                                                <div class="label-section">
                                                    <span class="badge" style="background-color:#CB4E41;">{{trans('user.out_of_stock')}}</span>
                                                </div>
                                                @endif
                                            @elseif ($product->category_id == 2)

                                                    @if ($product->qty > 0)

                                                    <div class="label-section">
                                                        <span class="badge" style="background-color:#69B1C9;">{{ trans('user.inStoke') }}</span>
                                                    </div>
                                                    @else
                                                    <div class="label-section">
                                                        <span class="badge" style="background-color:#CB4E41;">{{trans('user.out_of_stock')}}</span>
                                                    </div>
                                                    @endif
                                            @else
                                                    @if ( count($product->size_data()->where('size_qty','>',0)->get())>0)
                                                        <div class="label-section">
                                                            <span class="badge" style="background-color:#69B1C9;">{{ trans('user.inStoke') }}</span>
                                                        </div>

                                                        @else
                                                          <div class="label-section">
                                                            <span class="badge" style="background-color:#CB4E41;">{{trans('user.out_of_stock')}}</span>
                                                          </div>

                                                    @endif


                                            @endif


                                    </span>
                                </h6>
                            </div>
                            <div id="selectSize" class="addeffect-section product-description border-product">
                                <h6 class="product-title size-text">
                                    {{-- <h6 class="product-title size-text">{{trans('user.color')}}</h6> --}}
                                    <ul class="color-variant">
                                        @if (session('lang') =='ar')
                                        <li class=""  data-toggle="tooltip" data-placement="top"
                                        title="{{ $product->color->name_ar }}" style="background-color:{{$product->color->color}} ;border: 1px black solid"></li>


                                        @else
                                        <li class=""  data-toggle="tooltip" data-placement="top"
                                        title="{{ $product->color->name_en }}" style="background-color:{{$product->color->color}} ;border: 1px black solid"></li>


                                        @endif


                                            <span>
                                                @if ($product->price_offer > 0 and $product-> status =='active' )

                                                <h5>
                                                    <del>{{presentPrice($product->price)}}</del>
                                                     <span style="color:red">{{persent($product->price_offer,$product->price)}}</span>
                                                </h5>
                                                <h4><strong>{{presentPrice($product->price_offer)}}</strong></h4>
                                            @else

                                                <h3>{{presentPrice($product->price)}}</h3>
                                            @endif
                                           </span>
                                    </ul>
                                </h6>
                            </div>
                                                @if (Auth::check())

                                                @livewire('style.products',['post' => $product])

                                                @else
                                                    <div class="text-center">
                                                        <a href="{{ route('login') }}">

                                                            <h3>{{ trans('user.login_first') }}</h3>
                                                        </a>
                                                    </div>
                                                @endif



                                            <div class="border-product mt-0">
                                                <h6 class="product-title">{{trans('user.product_details')}}</h6>
                                                <p style="display: flex">{!! $product->content !!}</p>
                                            </div>
                                            <div class="border-product mt-6">
                                                <h6 class="product-title">{{trans('user.tags')}}</h6>
                                                <div class="product-icon">
                                                    <ul class="product-social">
                                                        @forelse (\App\Models\TagData::where('product_id',$product->id)->get() as $tag)
                                                            @if ($tag->tag->collection == true and $tag->tag->c_show == 'active' )
                                                            <li class="li">
                                                                <a href="{{ route('find.collection',$tag->tag->slug ) }}">{{session('lang') =='ar'?$tag->tag->name_ar:$tag->tag->name_en}}</a></li>
                                                            @else
                                                            <li class="li">{{session('lang') =='ar'?$tag->tag->name_ar:$tag->tag->name_en}}</a></li>
                                                            @endif
                                                        @empty
                                                        @endforelse
                                                    </ul>

                                                </div>
                                            </div>
                                            <div class="border-product">
                                                <h6 class="product-title">{{ trans('user.share_it') }}</h6>
                                                <div class="product-icon">
                                                    <ul class="product-social">
{{-- {{url('all-products/'.$product->title)}} --}}
                                                        <li class="li"><a href="whatsapp://send?text={{url('all-products/'.$product->title)}}"><i class="fa fa-whatsapp"></i></a></li>
                                                        <li class="li" onclick="myFunction()"><i class="fa fa-copy"></i></li>

                                                    </ul>

                                                </div>
                                            </div>


                                        <br>




                                    </div>

                            </div>

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>



    <section id="team" class="team section-b-space slick-default-margin ratio_asos light-layout">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title1 ">
                        {{--                    <h4>Recent Story</h4>--}}
                        <h2 class="title-inner1"> {{trans('user.RelatedStore')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="team-4">
                        @foreach ($mightAlsoLikeStore as $item )
                        <div class="product-box">
                            <div class="img-wrapper">

                                <div class="front">
                                    <a href="{{ route('all-products.show',$item->title) }}">
                                        <picture>
                                            <source media="(min-width:650px)" srcset="{{imageDo($item->main_image)}}">
                                            <source media="(min-width:465px)" srcset="{{imageDo($item->main_image)}}">
                                                <img
                                                src="{{imageDo($item->main_image)}}"
                                                class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                            </picture>


                                        </a>
                                </div>


                                @foreach($item->image_data()->get() as $image)
                                @if ($loop->first)
                                    <div class="back">
                                        <a href="{{ route('all-products.show', $item->title) }}">
                                            {{-- <picture>
                                                <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                                <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                                    <img
                                                    src="{{imageDo($image->image_key)}}"
                                                    class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                </picture> --}}
                                            <img
                                                src="{{imageDo($image->image_key)}}"
                                                class="img-fluid blur-up lazyload "
                                                alt="">

                                            </a>
                                    </div>
                                @endif
                                @endforeach

                                <div class="lable-block">

                                    @if ($item->category_id  == 1)
                                         @if ($item->qty > 0 and $item->show == 'active')
                                         @else
                                          <span class="lable4" style="background-color: white">{{trans('user.sold_out')}}</span>
                                         @endif
                                     @elseif ($item->category_id == 2)
                                        @if ($item->qty > 0 and $item->show == 'active')
                                        @else
                                         <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                        @endif
                                     @else
                                        @if ( count($item->size_data()->where('size_qty','>',0)->get())>0 and $item->show == 'active')
                                        @else
                                            <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                        @endif
                                @endif
                                 </div>

                            </div>
                            <div class="product-detail">

                                <a href="{{ route('all-products.show',$item->title) }}">
                                    <h6>{{ $item->title }}</h6>
                                </a>
                                @if ($item->price_offer > 0 and $item-> status =='active' )
                                <del>

                                    <h6>{{presentPrice($item->price)}}</h6>
                                </del>
                                <h4>{{presentPrice($item->price_offer)}}</h4>
                                @else
                                <h4>{{presentPrice($item->price)}}</h4>
                                @endif

                            </div>
                        </div>


                        {{-- <div>
                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="{{ route('all-products.show',$item->title) }}"><img src="https://images.tafseel.net/{{$item->main_image}}"
                                                         class="img-fluid blur-up lazyload " alt=""></a>
                                    </div>
                                    <div class="back">
                                        <a href="{{ route('all-products.show',$item->title) }}"><img src="../assets/images/pro3/34.jpg"
                                                         class="img-fluid blur-up lazyload bg-img" alt=""></a>
                                    </div>
                                </div>
                                <div class="product-detail">

                                    <a href="{{ route('all-products.show',$item->title) }}">
                                        <h6>{{ $item->title }}</h6>
                                    </a>
                                    @if ($item->price_offer > 0 and $item-> status =='active' )

                                    <h3>
                                        <del>{{presentPrice($item->price)}}</del>

                                    </h3>
                                    <h4>{{presentPrice($item->price_offer)}}</h4>
                                @else

                                    <h3>{{presentPrice($item->price)}}</h3>
                                @endif

                                </div>
                            </div>

                        </div> --}}

                        @endforeach





                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team" class="team section-b-space slick-default-margin ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="title1 ">
                        <h2 class="title-inner1"> {{trans('user.RelatedProduct')}}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="team-4">
                        @foreach ($mightAlsoLike as $item )



                            <div class="product-box">
                                <div class="img-wrapper">
                                    <div class="front">
                                        <a href="{{ route('all-products.show',$item->title) }}">

                                            {{-- <picture>
                                                <source media="(min-width:600px)" srcset="{{imageDo($item->main_image)}}">
                                                <source media="(min-width:600px)" srcset="{{imageDo($item->main_image)}}">
                                                    <img
                                                    src="{{imageDo($item->main_image)}}"
                                                    class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                </picture> --}}
                                            <img src="{{imageDo($item->main_image)}}"
                                                         class="img-fluid blur-up lazyload " alt="">


                                                        </a>
                                    </div>

                                    @foreach($item->image_data()->get() as $image)
                                    @if ($loop->first)
                                        <div class="back">
                                            <a href="{{ route('all-products.show', $item->title) }}">
{{--
                                                <picture>
                                                    <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                                    <source media="(min-width:600px)" srcset="{{imageDo($image->image_key)}}">
                                                        <img
                                                        src="{{imageDo($image->image_key)}}"
                                                        class="img-fluid blur-up lazyload "alt="Flowers" style="width:auto;">
                                                    </picture> --}}

                                                <img
                                                    src="{{imageDo($image->image_key)}}"
                                                    class="img-fluid blur-up lazyload "
                                                    alt="">
                                                </a>
                                        </div>
                                    @endif
                                    @endforeach


                                </div>
                                <div class="product-detail">

                                    <a href="{{ route('all-products.show',$item->title) }}">
                                        <h6>{{ $item->title }}</h6>
                                    </a>
                                    {{-- <h6 style="color:black"><strong>{{ $item->store->name }}</strong></h6> --}}
                                    <h6>
                                        <a href="{{ route('shops.find',$product->store->slug ) }}" style="color:black">
                                            {{$item->store->name}}
                                        </a>
                                    </h6>
                                    @if ($item->price_offer > 0 and $item-> status =='active' )
                                    <del>

                                        <h6>{{presentPrice($item->price)}}</h6>
                                    </del>
                                    <h4>{{presentPrice($item->price_offer)}}</h4>
                                    @else
                                    <h4>{{presentPrice($item->price)}}</h4>
                                    @endif

                                </div>
                            </div>



                        @endforeach
                        {{-- <div>
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
                        </div> --}}






                    </div>
                </div>
            </div>
        </div>
    </section>







@endsection




