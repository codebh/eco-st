



    <div class="container mt-3">



                <div class="collection-content col">
                    <div class="page-main-content">
                        <div class="row">
                            <div class="col">
                                <div class="title1 section-t-space">
                                    <h2 class="title-inner1"> {{session('lang')=='ar'?  $tag->name_ar:$tag->name_en}}</h2>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="top-banner-wrapper">
                                    <div class="top-banner-content small-section">

                                        <p>
                                            {{session('lang')=='ar'?  $tag->des_ar:$tag->des_en}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="collection-product-wrapper">
                                    <div class="product-wrapper-grid">
                                        <div class="row margin-res">
                                            @forelse ($collections as $product)
                                            @if ($product->product->show == 'active' or $product->product->show == 'not active')
                                                <div class="col-xl-3 col-6 col-grid-box">
                                                    <div class="product-box">
                                                        <div class="img-wrapper">
                                                            <div class="front">
                                                                <a href="{{route('all-products.show',$product->product->title)}}"><img src="{{imageDo($product->product->main_image)}}"
                                                                                class="img-fluid blur-up lazyload "
                                                                                alt=""></a>
                                                            </div>
                                                            <div class="back">
                                                                <a href="{{route('all-products.show',$product->product->title)}}">
                                                                    @foreach ($product->product->image_data()->get() as $item)
                                                                        @if ($loop->first)
                                                                        <img src="{{ imageDo($item->image_key) }}"
                                                                                    class="img-fluid blur-up lazyload"
                                                                                    alt="">
                                                                        @endif
                                                                    @endforeach
                                                                </a>
                                                            </div>

                                                        </div>
                                                        <div class="product-detail">
                                                            <div class="detail-inline">
                                                                <a href="{{route('all-products.show',$product->product->title)}}">
                                                                    <h6 style="text-transform: lowercase;">{{$product->product->title}}</h6>
                                                                </a>
                                                                @if ($product->product->price_offer > 0 and $product->product->status =='active')

                                                                    <h4> {{presentPrice($product->product->price_offer)}}
                                                                        <del>{{presentPrice($product->product->price)}}</del>
                                                                    </h4>
                                                                @else
                                                                    <h4>{{presentPrice($product->product->price)}}</h4>
                                                                @endif
                                                            </div>
                                                            <hr>
                                                            <div class="detail-inline">
                                                                <a href="{{route('all-products.show',$product->product->title)}}">
                                                                    <h6>{{session('lang') == 'ar' ? $product->product->category->name_ar:$product->product->category->name_en}}</h6>

                                                                </a>

                                                                {{-- <h4>{{$product->product->store->name}}</h4> --}}
                                                                <h4>
                                                                    <a href="{{ route('shops.find',$product->product->store->name ) }}" style="color:black">
                                                                        {{$product->product->store->name}}
                                                                    </a>
                                                                </h4>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                                @endif
                                                    @empty
                                                <div class="col-xl-12">
                                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                                        <strong>No result</strong>
                                                    </div>


                                                </div>
                                                @endforelse
                                        </div>
                                    </div>
                                    <div class="product-pagination">
                                        <div class="theme-paggination-block">
                                            <div class="row">
                                                <div class="col-xl-6 col-md-12 col-sm-12">

                                                    {{ $collections->onEachSide(1)->links('vendor.livewire.bootstrap') }}
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
