


<div class="collection-content col">
    <div class="page-main-content">
        <div class="row">
            <div class="row">
                <div class="col-sm-12">
                    <div class="top-banner-wrapper">
                        <div class="text-justify">
                            <h3>
                                {{session('lang')=='ar'?
                                   '  أكتشف مجموعة من موديلات  الملابس  والعبايات والفساتين والبدلات العملية والجلابيات وملابس المحجبات'
                                    :
                                    'Explore all designs of clothes, dresses, bayas, suits, jalabiyas, dresses, and modest clothing.'
                                }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="collection-product-wrapper">
                    <div class="product-top-filter">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="filter-main-btn"><span
                                        class="filter-btn btn btn-theme"><i class="fa fa-filter"
                                                                            aria-hidden="true"></i> {{ trans('user.filter') }}</span></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="product-filter-content">
                                    <div class="search-count">
                                        <h5>{{ trans('user.total_number_items')}} {{$count_products}}</h5>
                                    </div>
                                    <div class="collection-view">
                                        <ul>
                                            <li class="li"><i class="fa fa-th grid-layout-view"></i></li>
                                            <li class="li"><i class="fa fa-list-ul list-layout-view"></i></li>
                                        </ul>
                                    </div>

                                    <div class="product-page-per-view">
                                        <select class="form-select" aria-label="Sort By" wire:model="colorSelect">
                                                <option value='' selected>{{ trans('user.colors') }}</option>
                                            @forelse (\App\Models\Color::all() as $color)
                                                <option value='{"key":"{{$color->id}}"}' selected>{{session('lang') == 'ar' ?$color->name_ar:$color->name_en}}</option>

                                            @empty

                                            <option value=''>No Colors </option>
                                            @endforelse

                                        </select>
                                    </div>
                                    <div class="product-page-filter">
                                        <select class="form-select" aria-label="Sort By" wire:model="orderSelect">
                                            <option value='{"key":"created_at","direction":"desc"}' selected>{{ trans('user.sort') }}</option>
                                            <option value='{"key":"price","direction":"asc"}'>{{ trans('user.price_l_to_h') }}</option>
                                            <option value='{"key":"price","direction":"desc"}'>{{ trans('user.price_h_to_l') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-wrapper-grid">
                        <div class="row margin-res">
                            @forelse ($products as $product)
                                <div class="col-xl-3 col-6 col-grid-box">
                                    <div class="product-box">
                                        <div class="img-wrapper">
                                            <div class="front">
                                            <a href="{{ route('all-products.show',$product->title) }}">
                                                <img src="{{imageDo($product->main_image)}}"
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
                                                <a href="{{'/all-products/'.$product->title}}">
                                                    <h6>{{session('lang') == 'ar' ? $product->category->name_ar:$product->category->name_en}}</h6>
                                                    {{--                                                        <h6>{{ $product->category->name_ar}}</h6>--}}
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
                                </div>
                            @empty
                                <div class="col-xl-12">
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">

                                        <strong>No result</strong>
                                    </div>


                                </div>
                            @endforelse







                         </div>
                    <div class="product-pagination">
                        <div class="theme-paggination-block">
                            <div class="row">
                                <div class="col-xl-6 col-md-12 col-sm-12">

                                    {{ $products->onEachSide(1)->links('vendor.livewire.bootstrap') }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
