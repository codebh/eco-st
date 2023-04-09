<div>
    <!-- section start -->
    <section class="vendor-profile pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile-left">
                        <div class="profile-image">
                            <div>
                                <img src="{{imageDo($store->logo)}}" alt="" class="img-fluid">
                                <h3>{{$store->name}}</h3>
                                <h6>{{ trans('user.products') }}: {{$count_products}}</h6>
                                @if ($store->close == 'yes')
                                <div class="label-section">
                                    <span class="badge" style="background-color:#69B1C9;">{{ trans('user.busy') }} </span>
                                </div>

                                 <!--modal popup start-->
                                            <div class="modal fade bd-example-modal-lg theme-modal" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body modal1">
                                                        <div class="container-fluid p-0">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="modal-bg">
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                            aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        <div class="offer-content text-center">
                                                                            <h3 style="  line-height: normal; color: #5A6670;">{{ trans('user.busy_info') }}</h3>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!--modal popup end-->

                                @endif

                            </div>
                        </div>
                        <div class="profile-detail">
                            <div>
                                <p>
                                    {{ $store->bio }}
                                </p>

                            </div>
                        </div>
                        <div class="vendor-contact">
                            <div>

                                @auth
                                @if ($check_product == 1)

                                <button type="submit"  wire:click.prevent="removeFav({{ auth()->user()->id}}, '{{ $product_id }}')"  wire:loading.class="bg-gray" style="background-color: #8E9AA4;color: white" class="btn  btn-sm">{{ trans('user.re_to_fav') }}</button>
                                    <div wire:loading.delay.long>
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                          </div>
                                    </div>
                                {{-- <div class="product-buttons">
                                    <button  type="submit" id="cartEffect" class="btn  hover-solid btn-animation"><i class="fa fa-heart me-1" style="color: #726189" aria-hidden="true"></i>remove form fav</button>
                                </div> --}}

                                @else
                                <button type="submit"  wire:click.prevent="addFav({{ auth()->user()->id}}, '{{ $product_id }}')"  wire:loading.class="bg-gray" style="background-color: #726189;color: white" class="btn    btn-sm">{{ trans('user.add_to_fav') }}</button>
                                    <div wire:loading.delay.long>
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Loading...</span>
                                          </div>
                                    </div>


                                @endif
                                @else
                                <div class="product-buttons">
                                    <button  type="submit" id="cartEffect" class="btn  hover-solid btn-animation"> {{ trans('user.login_first_shop') }}</button>
                                    {{-- <a href="#" class="btn btn-solid"><i class="fa fa-bookmark fz-16 me-2" aria-hidden="true"></i>wishlist</a> --}}

                                </div>

                                @endauth








                                {{-- <a href="#" class="btn btn-solid btn-sm">Add To fav</a> --}}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- section start -->
    <section class="section-b-space ratio_asos">
        <div class="collection-wrapper">
            <div class="container">
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
                                                                <h5>{{ trans('user.count_products') }} {{$count_products}} </h5>
                                                            </div>
                                                            <div class="collection-view">
                                                                <ul>
                                                                    <li class="li"><i class="fa fa-th grid-layout-view"></i></li>
                                                                    <li class="li"><i class="fa fa-list-ul list-layout-view"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                            <div class="product-page-per-view">
                                                                <select class="form-select" aria-label="Sort By" wire:model="colorSelect">
                                                                    <option value='' selected>{{ trans('user.colors') }}</option>
                                                                    @forelse (\App\Models\Color::all() as $color)
                                                                        <option value='{"key":"{{$color->id}}"}' selected>{{$color->name_en}}</option>

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
                                            <div class="row margin-res">

                                                @foreach($products_shop as $product)

                                                    <div class="col-xl-3 col-6 col-grid-box">
                                                        <div class="product-box">

                                                            <div class="img-wrapper">
                                                                <div class="front">
                                                                    <a href="{{route('shops.find.product',$product->title)}}"><img src="{{imageDo($product->main_image)}}" class="img-fluid blur-up lazyload " alt=""></a>
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
                                                                <div class="lable-block">

                                                                    @if ($product->category_id  == 1)
                                                                         @if ($product->qty > 0  and  $product->show == 'active')
                                                                         @else
                                                                          <span class="lable4" style="background-color: white">{{trans('user.sold_out')}}</span>
                                                                         @endif
                                                                     @elseif ($product->category_id == 2)
                                                                        @if ($product->qty > 0  and  $product->show == 'active')
                                                                        @else
                                                                         <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                                        @endif
                                                                     @else
                                                                        @if ( count($product->size_data()->where('size_qty','>',0)->get())>0  and  $product->show == 'active')
                                                                        @else
                                                                            <span class="lable4" style="background-color: white ">{{trans('user.sold_out')}}</span>
                                                                        @endif
                                                                @endif
                                                                 </div>

                                                            </div>

                                                            <div class="product-detail">
                                                                <div>

                                                                    <a href="{{route('shops.find.product',$product->title)}}">
                                                                        <h6 style="text-transform: lowercase;">{{{$product->title}}}</h6>
                                                                    </a>
                                                                    <p>{!! $product->content !!}</p>

                                                                    @if ($product->price_offer > 0 and $product->status =='active')

                                                                    <h4> {{presentPrice($product->price_offer)}}
                                                                        <del>{{presentPrice($product->price)}}</del>
                                                                    </h4>
                                                                @else
                                                                    <h4>{{presentPrice($product->price)}}</h4>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach


                                            </div>
                                            <div class="product-pagination">
                                                <div class="theme-paggination-block">
                                                    <div class="container-fluid p-0">
                                                        <div class="row">
                                                            <div class="col-xl-12 col-md-12 col-sm-12">
                                                                {{$products_shop->onEachSide(1)->links('vendor.livewire.bootstrap')}}
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
