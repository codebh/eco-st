<div>
    <section class="banner-padding banner-furniture absolute_banner ratio3_2">
        <div class="container">
            <div class="title1 section-t-space">
                {{-- <h4>{{trans('user.shop_by_category')}}</h4> --}}
                <h2 class="title-inner1"> {{trans('user.favorite_shops')}}</h2>
            </div>
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
                                            <option value='{"key":"created_at","direction":"asc"}'>{{{trans('user.a_to_z')}}}</option>
                                            <option value='{"key":"created_at","direction":"desc"}'>{{trans('user.z_to_a')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row ">
                {{--                                                <div class="col-xl-3 col-6 col-grid-box">--}}
                @foreach ($stores as $store)
                <div class="col-xl-3 col-6 col-grid-box mt-5">
                    <div class="collection-banner p-left text-start">
                            <a href="{{route('shops.find',$store->store->name)}}">
                            <img src="{{imageDo($store->store->logo)}}" alt=""
                                 class="img-fluid blur-up lazyload bg-img">
                                </a>
                            <div class="absolute-contain">
{{--                                <h3>casual collection</h3>--}}
<a href="{{route('shops.find',$store->store->name)}}">
                                <h3>{{$store->store->name}}</h3>
</a>
                                {{-- <button wire:click.prevent="removeFav({{$store->id}})"  type="submit" id="cartEffect" class="btn  hover-solid "><i class="fa fa-trash me-1" style="color: red" aria-hidden="true"></i></button>
                                <div wire:loading.delay.long>
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                      </div>
                                </div> --}}


                                {{-- <button type="submit" class="btn ">x</button> --}}






                                <button type="button" wire:click="deleteId({{ $store->id }})" class=" btn-danger" data-toggle="modal" data-target="#exampleModal_remove_fav"> <i class="fa fa-trash"></i></button>
                            </div>


                        </div>


                    <div wire:ignore.self class="modal fade" id="exampleModal_remove_fav" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                {{-- <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true close-btn">×</span>
                                    </button>
                                </div> --}}
                               <div class="modal-body">
                                    <p>{{ trans('user.favourite_shops_delete') }}</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{ trans('user.close') }}</button>
                                    <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">{{ trans('user.yes') }}</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if ($stores->hasMorePages() )
                    <div class="load-more-sec  mt-5">
                        <a href="javascript:void(0)"  wire:click.prevet="loadMore" class="loadMore">
                           {{ trans('user.load_more') }}

                        </a></div>
                @else
                    <div class="load-more-sec">
                        <div class="title2">

                            <h3 class="title-inner2">{{ trans('user.no_more_shops') }}</h2>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

</div>


