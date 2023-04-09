<div>

    {{--    <!-- breadcrumb start -->--}}
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.new_in')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{trans('user.home_page')}}</a>
                            </li>/
                            <span class="" aria-current="page">{{trans('user.new_in')}}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    {{--    <!-- breadcrumb end -->--}}



<!-- section start -->
<section class="section-b-space ratio_asos">
    <div class="collection-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="top-banner-wrapper">
                        <div class="text-justify">
                            <h3>
                                {{session('lang')=='ar'?
                                   'وصل حديثاً في موقع تفصيل | الموديلات الجديدة من الملابس والفساتين والعبايات والبدلات العملية والجلابيات وملابس المحجبات'
                                    :
                                    'New in Tafseel | the latest designs of clothes, dresses, abayas, suits, jalabiyas, dresses, and modest clothing'
                                }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">

                                    <div class="collection-product-wrapper">


                                        <div class="no-slider row  ratio_asos">

                                            @forelse ($products as $product)

                                                <div class="product-box">
                                                    <div class="img-wrapper">

                                                        <div class="lable-block">
                                                            <span class="lable3">{{trans('user.new')}}</span>
                                                            @if ($product->category_id  == 1)
                                                                 @if ($product->qty > 0 and $product->show =='active')
                                                                 @else
                                                                  <span class="lable4" style="background-color: white">{{trans('user.sold_out')}}</span>
                                                                 @endif
                                                             @elseif ($product->category_id == 2)
                                                                @if ($product->qty > 0 and $product->show =='active')
                                                                @else
                                                                 <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                                @endif
                                                             @else
                                                                @if ( count($product->size_data()->where('size_qty','>',0)->get())>0 and $product->show =='active')
                                                                @else
                                                                    <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                                @endif
                                                        @endif
                                                        </div>
                                                        <div class="front">
                                                            <a href="{{route('all-products.show',$product->title)}}"><img
                                                                    src="{{imageDo($product->main_image)}}"
                                                                    class="img-fluid blur-up lazyload " alt=""></a>

                                                        </div>
                                                        @foreach($product->image_data()->get() as $image)
                                                        @if ($loop->first)
                                                            <div class="back">
                                                                <a href="{{ route('all-products.show', $product->title) }}"><img
                                                                        src="{{imageDo($image->image_key)}}"
                                                                        class="img-fluid blur-up lazyload "
                                                                        alt=""></a>
                                                            </div>
                                                        @endif
                                                    @endforeach

                                                    </div>

                                                    <div class="product-detail">
                                                        <div class="detail-inline">
                                                            <a href="{{route('all-products.show',$product->title)}}">
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

                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            {{ $products->onEachSide(1)->links('vendor.livewire.bootstrap') }}
{{--                                                            <nav aria-label="Page navigation">--}}
{{--                                                                <ul class="pagination">--}}
{{--                                                                    <li class="page-item"><a class="page-link" href="#"--}}
{{--                                                                                             aria-label="Previous"><span--}}
{{--                                                                                aria-hidden="true"><i--}}
{{--                                                                                    class="fa fa-chevron-left"--}}
{{--                                                                                    aria-hidden="true"></i></span> <span--}}
{{--                                                                                class="sr-only">Previous</span></a></li>--}}
{{--                                                                    <li class="page-item active"><a class="page-link"--}}
{{--                                                                                                    href="#">1</a></li>--}}
{{--                                                                    <li class="page-item"><a class="page-link"--}}
{{--                                                                                             href="#">2</a></li>--}}
{{--                                                                    <li class="page-item"><a class="page-link"--}}
{{--                                                                                             href="#">3</a></li>--}}
{{--                                                                    <li class="page-item"><a class="page-link" href="#"--}}
{{--                                                                                             aria-label="Next"><span--}}
{{--                                                                                aria-hidden="true"><i--}}
{{--                                                                                    class="fa fa-chevron-right"--}}
{{--                                                                                    aria-hidden="true"></i></span> <span--}}
{{--                                                                                class="sr-only">Next</span></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </nav>--}}
                                                        </div>
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            <div class="product-search-count-bottom">
                                                                <h5>Showing Products 1-24 of 10 Result</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- section End -->

</div>

