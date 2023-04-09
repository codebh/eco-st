<div>
    <section class="banner-padding banner-furniture absolute_banner ratio3_2 ">
        <div class="container">
            <div class="title1 ">
                <h2 class="title-inner1"> {{trans('user.shops')}}</h2>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="top-banner-wrapper">
                        <div class="text-justify">
                            <h3>
                                {{session('lang')=='ar'?
                                        'متاجر أزياء توفر تصاميم فريدة لتشكيلة متنوعة من العبايات الخليجية وملابس المحجبات والبدلات العملية والجلابيات والفساتين.'
                                :
                                'Tafseel Fashion designers Provide unique designs of various collections of abayas, suits, jalabiyas, dresses, and modest clothing.'
                                }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <br>





            <div class="collection-product-wrapper">
                <div class="product-top-filter">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-filter-content">
                                    <div class="search-count">
                                        <h5>{{trans('user.count_shop')}}{{$count_shop}} </h5>
                                    </div>


                                    <div class="product-page-per-view">
                                        <select wire:model="perPage">
                                            <option value="4"> {{trans('user.viewed_shops')}} 4</option>
                                            <option value="8">{{trans('user.viewed_shops')}}  8</option>
                                            <option value="12">{{trans('user.viewed_shops')}} 12</option>
                                        </select>
                                    </div>
                                    <div class="product-page-filter">
                                        <select wire:model="orderSelect">
                                            <option value='{"key":"created_at","direction":"desc"}' selected>{{trans('user.order_by_shop')}}</option>
                                            {{--                                            <option value='{"key":"meta->rating","direction":"desc"}'>Best Rating</option>--}}
                                            <option value='{"key":"name","direction":"asc"}'>{{{trans('user.a_to_z')}}}</option>
                                            <option value='{"key":"name","direction":"desc"}'>{{trans('user.z_to_a')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row ">
                @foreach ($stores as $store)
                <div class="col-xl-3 col-6 col-grid-box mt-5">
                    <div class="collection-banner p-left text-start">

                        <a href="{{route('shops.find',$store->slug)}}">
                            <img src="{{imageDo($store->logo)}}" alt=""
                                 class="img-fluid blur-up lazyload bg-img">
                        </a>

                            <div class="absolute-contain">
                                <a href="{{route('shops.find',$store->slug)}}">
                            <h3>{{$store->name}}</h3>
                                </a>
                            @if ($store->close == 'yes')

                            <div class="label-section">
                                <span class="badge" style="background-color:#69B1C9;"> {{ trans('user.busy') }}</span>
                            </div>
                            @endif

                            </div>
                        </div>
                </div>


                @endforeach
                @if ($stores->hasMorePages() )
                    <div class="load-more-sec  mt-5">
                        <a href="javascript:void(0)"  wire:click.prevet="loadMore" class="loadMore">
                           {{ trans('user.load_more') }}

                        </a>
                    </div>
                @else
                    <div class="load-more-sec">
                        <div class="title2">

                            <h2 class="title-inner2">{{ trans('user.no_more_shops') }}</h2>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>




</div>
