<div>
    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
                  <!-- breadcrumb end -->
              <div class="row">
                <div class="col-sm-12">
                    <div class="top-banner-wrapper">
                        <div class="text-justify">
                            <h3>
                                {{session('lang')=='ar'?
                                '  تخفيضات على قطع من الملابس  والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات'
                                :
                                'Explore all designs of clothes, dresses, bayas, suits, jalabiyas, dresses, and modest clothing.'
                                }}
                            </h3>
                        </div>
                    </div>
                </div>
              </div>
              <br>



                <div class="row">
                    <div class="collection-content col">
                        <div class="page-main-content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="collection-product-wrapper">
                                        <div class="product-top-filter">
                                            <div class="container-fluid p-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="product-filter-content">
                                                            <div class="search-count">
                                                                <h5>{{ trans('user.total_number_items') }} {{$count_products}} </h5>
                                                            </div>
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li  class="li"><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li  class="li"><i class="fa fa-list-ul list-layout-view"></i>
                                                                     </li>
                                                                </ul>
                                                            </div>

                                                            <div class="product-page-per-view">
                                                                <select class="form-select" aria-label="Sort By" wire:model="colorSelect">
                                                                    <option value='' selected>{{ trans('user.colors') }}</option>
                                                                    @forelse (\App\Models\Color::all() as $color)
                                                                        <option value='{"key":"{{$color->id}}"}' selected>{{session('lang')== 'ar' ? $color->name_ar:$color->name_en}}</option>

                                                                    @empty

                                                                        <option value=''>No Colors </option>
                                                                    @endforelse

                                                                </select>

                                                            </div>

                                                            <div class="product-page-filter">
                                                                <select class="form-select" aria-label="Sort By" wire:model="orderSelect">
                                                                    <option value='{"key":"created_at","direction":"desc"}' selected>{{ trans('user.sort') }}</option>
                                                                    {{--                                            <option value='{"key":"meta->rating","direction":"desc"}'>Best Rating</option>--}}
                                                                    <option value='{"key":"price_offer","direction":"asc"}'>{{ trans('user.price_l_to_h') }}</option>
                                                                    <option value='{"key":"price_offer","direction":"desc"}'>{{ trans('user.price_h_to_l') }}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="product-wrapper-grid">
                                            <div class="row margin-res tools-grey border-box ratio_square">
                                                @forelse ($products as $product)

                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box ">
                                                            <div class="img-wrapper">
                                                                <div class="ribbon"><span>{{ trans('user.sale') }}</span></div>
                                                                <div class="front">
                                                                    <a href="{{ route('all-products.show',$product->title) }}"><img src="{{imageDo($product->main_image)}}"
                                                                                     class="img-fluid blur-up lazyload "
                                                                                     alt=""></a>
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
                                                                <div>

                                                                    <a href="{{ route('all-products.show',$product->title) }}">
                                                                        <h6 style="text-transform: lowercase;">{{$product->title}}</h6>
                                                                    </a>
                                                                    <a href="{{ route('shops.find', $product->store->slug) }}">
                                                                        <h6>{{$product->store->name}}</h6>
                                                                    </a>

                                                                    <h4>{{presentPrice($product->price_offer)}} <del>{{presentPrice($product->price)}}</del></h4>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            {{$products->onEachSide(1)->links('vendor.livewire.bootstrap')}}
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
    </section>
    <!-- section End -->

</div>
