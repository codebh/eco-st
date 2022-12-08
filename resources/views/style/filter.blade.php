@extends('style.newIndex')
@section('content')
    <!-- breadcrumb start -->
    <div class="breadcrumb-section ">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>collection</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Explore Items</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb end -->
    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                <form action="{{route('search')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-sm-3 collection-filter">
                            <!-- side-bar colleps block stat -->
                            <div class="collection-filter-block">
                                <!-- brand filter start -->
                                <div class="collection-mobile-back"><span class="filter-back"><i
                                            class="fa fa-angle-left"
                                            aria-hidden="true"></i> back</span>
                                </div>
                                <div class="collection-collapse-block ">
                                    <h3 class="collapse-block-title">Categories</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            @forelse (App\Models\Category::all() as $category)
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">

                                                    <input type="checkbox"  name="category" value="{{$category->id}}"
                                                        {{ isset($selected_category) && $selected_category == $category->id ? 'checked' : '' }}
                                                           class="custom-control-input click-check" id="zara"
                                                    >
                                                    <label class="custom-control-label"
                                                           for="zara">{{$category->name_en}}</label>
                                                </div>
                                            @empty
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    {{--                                                <input type="checkbox" class="custom-control-input" id="zara">--}}
                                                    <label class="custom-control-label" for="zara">No category</label>
                                                </div>
                                            @endforelse


                                        </div>
                                    </div>
                                </div>
                                <!-- color filter start here -->
                            {{--                                <div class="collection-collapse-block open">--}}
                            {{--                                    <h3 class="collapse-block-title">colors</h3>--}}
                            {{--                                    <div class="collection-collapse-block-content">--}}
                            {{--                                        @forelse()--}}
                            {{--                                        <div class="color-selector" name="colors[]">--}}
                            {{--                                            <ul>--}}
                            {{--                                                <li class="color-1 active" value="{{}}"></li>--}}
                            {{--                                                <li class="color-2" value="{{}}"></li>--}}
                            {{--                                                <li class="color-3 value={{}}"></li>--}}
                            {{--                                                <li class="color-4"></li>--}}
                            {{--                                                <li class="color-5"></li>--}}
                            {{--                                                <li class="color-6"></li>--}}
                            {{--                                                <li class="color-7"></li>--}}
                            {{--                                            </ul>--}}
                            {{--                                        </div>--}}
                            {{--                                        @empty--}}
                            {{--                                            <div class="color-selector">--}}
                            {{--                                                <ul>--}}
                            {{--                                                    <li class="color-1 active" value="{{}}"></li>--}}
                            {{--                                                   --}}
                            {{--                                                </ul>--}}
                            {{--                                            </div>--}}
                            {{--                                        @endforelse--}}
                            {{--                                        --}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            <!-- size filter start here -->
                                <div class="collection-collapse-block border-0 open">
                                    <h3 class="collapse-block-title">Colors</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            @forelse (App\Models\Color::all() as $item)

                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="checkbox" name="colors[]"  value="{{$item->id}}"
                                                           {{ isset($selected_colors) && in_array($item->id, $selected_colors) ? 'checked' : '' }}

                                                           class="custom-control-input" id="hundred">
                                                    <label class="custom-control-label"
                                                           for="hundred">{{$item->name_en}}</label>
                                                </div>
                                            @empty
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="hundred">
                                                    <label class="custom-control-label" for="hundred">s</label>
                                                </div>


                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                {{--                                tags--}}
                                <div class="collection-collapse-block border-0 open">
                                    <h3 class="collapse-block-title">Tags</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            @forelse (App\Models\Tag::where('c_show', 'active')->get() as $item)

                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="checkbox" name="tags[]"  value="{{$item->id}}"
                                                           {{ isset($selected_tags) && in_array($item->id, $selected_tags) ? 'checked' : '' }}
                                                           class="custom-control-input" id="hundred">
                                                    <label class="custom-control-label"
                                                           for="hundred">{{$item->name_en}}</label>
                                                </div>
                                            @empty
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="hundred">
                                                    <label class="custom-control-label" for="hundred">s</label>
                                                </div>


                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <!-- magerments-->
                                <div class="collection-collapse-block border-0 open">
                                    <h3 class="collapse-block-title">Sizes</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="collection-brand-filter">
                                            @forelse (App\Models\Size::all() as $item)

                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="checkbox" name="sizes[]"  value="{{$item->id}}"
                                                           {{ isset($selected_sizes) && in_array($item->id, $selected_sizes) ? 'checked' : '' }}

                                                           class="custom-control-input" id="hundred">
                                                    <label class="custom-control-label"
                                                           for="hundred">{{$item->name}}</label>
                                                </div>
                                            @empty
                                                <div class="custom-control custom-checkbox collection-filter-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="hundred">
                                                    <label class="custom-control-label" for="hundred">s</label>
                                                </div>


                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                {{--                                price--}}
                                <div class="collection-collapse-block border-0 close">
                                    <h3 class="collapse-block-title">price</h3>
                                    <div class="collection-collapse-block-content">
                                        <div class="wrapper mt-3">
                                            <div class="range-slider">
                                                <input type="text" class="js-range-slider" value=""/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <button type=submit" name="" id="" class="btn btn-primary btn-lg btn-block
                                "> submit
                                    </button>
                                </div>

                            </div>
                            <!-- silde-bar colleps block end here -->
                            <!-- side-bar single product slider start -->
                            <div class="theme-card">
                                <h5 class="title-border">new product</h5>
                                <div class="offer-slider slide-1">
                                    <div>
                                        <div class="media">
                                            <a href=""><img class="img-fluid blur-up lazyload"
                                                            src="../assets/images/pro/1.jpg" alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Slim Fit Cotton Shirt</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a href=""><img class="img-fluid blur-up lazyload"
                                                            src="../assets/images/pro/1.jpg" alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Slim Fit Cotton Shirt</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a href=""><img class="img-fluid blur-up lazyload"
                                                            src="../assets/images/pro/1.jpg" alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Slim Fit Cotton Shirt</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="media">
                                            <a href=""><img class="img-fluid blur-up lazyload"
                                                            src="../assets/images/pro/1.jpg" alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Slim Fit Cotton Shirt</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a href=""><img class="img-fluid blur-up lazyload"
                                                            src="../assets/images/pro/1.jpg" alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Slim Fit Cotton Shirt</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <a href=""><img class="img-fluid blur-up lazyload"
                                                            src="../assets/images/pro/1.jpg" alt=""></a>
                                            <div class="media-body align-self-center">
                                                <div class="rating"><i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                        class="fa fa-star"></i></div>
                                                <a href="product-page(no-sidebar).html">
                                                    <h6>Slim Fit Cotton Shirt</h6>
                                                </a>
                                                <h4>$500.00</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- side-bar single product slider end -->
                            <!-- side-bar banner start here -->
                            <div class="collection-sidebar-banner">
                                <a href="#"><img src="{{url('design')}}/theme/assets/images/side-banner.png"
                                                 class="img-fluid blur-up lazyload" alt=""></a>
                            </div>
                            <!-- side-bar banner end here -->
                        </div>
                        <div class="collection-content col">
                            <div class="page-main-content">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="collection-product-wrapper">
                                            <div class="product-top-filter">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="filter-main-btn"><span
                                                                class="filter-btn btn btn-theme"><i
                                                                    class="fa fa-filter"
                                                                    aria-hidden="true"></i> Filter</span></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="product-filter-content">
                                                            <div class="search-count">
                                                                <h5>Showing Products 1-24 of 10 Result</h5>
                                                            </div>
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li><i class="fa fa-list-ul list-layout-view"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="collection-grid-view">
                                                                <ul>
                                                                    <li><img
                                                                            src="{{url('design')}}/theme/assets/images/icon/2.png"
                                                                            alt="" class="product-2-layout-view"></li>
                                                                    <li><img
                                                                            src="{{url('design')}}/theme/assets/images/icon/3.png"
                                                                            alt="" class="product-3-layout-view"></li>
                                                                    <li><img
                                                                            src="{{url('design')}}/theme/assets/images/icon/4.png"
                                                                            alt="" class="product-4-layout-view"></li>
                                                                    <li><img
                                                                            src="{{url('design')}}/theme/assets/images/icon/6.png"
                                                                            alt="" class="product-6-layout-view"></li>
                                                                </ul>
                                                            </div>
                                                            <div class="product-page-per-view">
                                                                <select>
                                                                    <option value="High to low">24 Products Par Page
                                                                    </option>
                                                                    <option value="Low to High">50 Products Par Page
                                                                    </option>
                                                                    <option value="Low to High">100 Products Par Page
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="product-page-filter">
                                                                <select>
                                                                    <option value="High to low">Sorting items</option>
                                                                    <option value="Low to High">50 Products</option>
                                                                    <option value="Low to High">100 Products</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-wrapper-grid product-load-more">
                                                <div class="row margin-res">
                                                    @forelse ($products as $product)

                                                        <div class="col-xl-3 col-6 col-grid-box">
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    @foreach($product->image_data()->get() as $image)
                                                                        @if ($loop->first)
                                                                            <div class="front">
                                                                                <a href="{{'/products/'.\Illuminate\Support\Facades\Crypt::encrypt($product->id)}}"><img
                                                                                        src="{{asset('storage/product/'.$product->id.'/'.$image->image_key)}}"
                                                                                        class="img-fluid blur-up lazyload bg-img"
                                                                                        alt=""></a>
                                                                            </div>
                                                                        @endif

                                                                        @if ($loop->last)
                                                                            <div class="back">
                                                                                <a href="{{'/products/'.\Illuminate\Support\Facades\Crypt::encrypt($product->id)}}">
                                                                                    <img
                                                                                        src="{{asset('storage/product/'.$product->id.'/'.$image->image_key)}}"
                                                                                        class="img-fluid blur-up lazyload bg-img"
                                                                                        alt="">
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                    <div class="cart-info cart-wrap">
                                                                        <button data-toggle="modal"
                                                                                data-target="#addtocart"
                                                                                title="Add to cart"><i
                                                                                class="ti-shopping-cart"></i></button>
                                                                        <a href="javascript:void(0)"
                                                                           title="Add to Wishlist"><i
                                                                                class="ti-heart" aria-hidden="true"></i></a>
                                                                        <a href="#" data-toggle="modal"
                                                                           data-target="#quick-view{{$product->id}}"
                                                                           title="Quick View"><i
                                                                                class="ti-search"
                                                                                aria-hidden="true"></i></a>
                                                                        <a
                                                                            href="compare.html" title="Compare"><i
                                                                                class="ti-reload"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        <a href="{{'/products/'.\Illuminate\Support\Facades\Crypt::encrypt($product->id)}}">
                                                                            <h6>{{$product->title}}</h6>
                                                                        </a>
                                                                        <a href="product-page(no-sidebar).html">
                                                                            <h5>{{$product->store->name}}</h5>
                                                                            <h5>{{$product->category->name_en}}</h5>
                                                                        </a>
                                                                        <p>{{$product->content}}
                                                                        </p>
                                                                        <h4>{{presentPrice($product->price)}}</h4>
                                                                        <ul class="color-variant">
                                                                            @forelse ($product->other_data()->get() as $item)

                                                                                <li style="background-color: {{$item->color->color}}"></li>
                                                                            @empty

                                                                                <li class="bg-light1"></li>
                                                                            @endforelse
                                                                            {{--                                                                            <li class="bg-light2"></li>--}}
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @empty
                                                        <div class="col-xl-3 col-6 col-grid-box">
                                                            <div class="product-box">
                                                                <div class="img-wrapper">
                                                                    <div class="front">
                                                                        <a href="#"><img
                                                                                src="{{url('design')}}/theme/assets/images/pro3/35.jpg"
                                                                                class="img-fluid blur-up lazyload bg-img"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="back">
                                                                        <a href="#"><img
                                                                                src="{{url('design')}}/theme/assets/images/pro3/36.jpg"
                                                                                class="img-fluid blur-up lazyload bg-img"
                                                                                alt=""></a>
                                                                    </div>
                                                                    <div class="cart-info cart-wrap">
                                                                        <button data-toggle="modal"
                                                                                data-target="#addtocart"
                                                                                title="Add to cart"><i
                                                                                class="ti-shopping-cart"></i></button>
                                                                        <a href="javascript:void(0)"
                                                                           title="Add to Wishlist"><i
                                                                                class="ti-heart" aria-hidden="true"></i></a>
                                                                        <a href="#" data-toggle="modal"
                                                                           data-target="#quick-view" title="Quick View"><i
                                                                                class="ti-search"
                                                                                aria-hidden="true"></i></a> <a
                                                                            href="compare.html" title="Compare"><i
                                                                                class="ti-reload"
                                                                                aria-hidden="true"></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="product-detail">
                                                                    <div>
                                                                        <div class="rating"><i class="fa fa-star"></i>
                                                                            <i
                                                                                class="fa fa-star"></i> <i
                                                                                class="fa fa-star"></i> <i
                                                                                class="fa fa-star"></i> <i
                                                                                class="fa fa-star"></i></div>
                                                                        <a href="product-page(no-sidebar).html">
                                                                            <h6>Slim Fit Cotton Shirt</h6>
                                                                        </a>
                                                                        <p>Lorem Ipsum is simply dummy text of the
                                                                            printing
                                                                            and typesetting industry. Lorem Ipsum has
                                                                            been
                                                                            the industry's standard dummy text ever
                                                                            since
                                                                            the 1500s, when an unknown printer took a
                                                                            galley
                                                                            of type and scrambled it to make a type
                                                                            specimen
                                                                            book
                                                                        </p>
                                                                        <h4>$500.00</h4>
                                                                        <ul class="color-variant">
                                                                            <li class="bg-light0"></li>
                                                                            <li class="bg-light1"></li>
                                                                            <li class="bg-light2"></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    @endforelse
                                                </div>
                                            </div>
                                            <div class="load-more-sec"><a href="javascript:void(0)" class="loadMore">load
                                                    more</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- section End -->

@stop
