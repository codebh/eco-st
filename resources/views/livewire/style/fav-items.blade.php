<div>

    {{--    <!-- breadcrumb start -->--}}
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.favourite_items')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">{{trans('user.home_page')}}</a>
                            </li>/
                            <span class="" aria-current="page">{{trans('user.favourite_items')}}</span>
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

                                                        <div class="front">
                                                            <a href="{{route('all-products.show',$product->product->title)}}"><img
                                                                    src="{{imageDo($product->product->main_image)}}"
                                                                    class="img-fluid blur-up lazyload " alt=""></a>

                                                        </div>
                                                        @foreach($product->product->image_data()->get() as $image)
                                                        @if ($loop->first)
                                                            <div class="back">
                                                                <a href="{{ route('all-products.show', $product->product->title) }}"><img
                                                                        src="{{imageDo($image->image_key)}}"
                                                                        class="img-fluid blur-up lazyload "
                                                                        alt=""></a>
                                                            </div>
                                                        @endif
                                                    @endforeach

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
                                                            {{-- <a href="{{'/all-products/'.$product->product->title}}">
                                                                <h6>{{session('lang') == 'ar' ? $product->product->category->name_ar:$product->product->category->name_en}}</h6>
                                                            </a> --}}
                                                            <button type="button" wire:click="deleteId({{ $product->id }})" class="btn-danger" data-toggle="modal" data-target="#exampleModal_remove_items"> <i class="fa fa-trash"></i></button>
                                                            <h4>{{$product->product->store->name}}</h4>
                                                        </div>

                                                        <div wire:ignore.self class="modal fade" id="exampleModal_remove_items" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">

                                                                   <div class="modal-body">
                                                                        <p>{{ trans('user.favourite_items_delete') }}</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">{{ trans('user.close') }}</button>
                                                                        <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal" data-dismiss="modal">{{ trans('user.yes') }} </button>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                {{-- <h1></h1> --}}
                                            @endforelse

                                        </div>
                                        <div class="product-pagination">
                                            <div class="theme-paggination-block">
                                                <div class="container-fluid p-0">
                                                    <div class="row">
                                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                                            {{ $products->links('vendor.livewire.bootstrap') }}

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

