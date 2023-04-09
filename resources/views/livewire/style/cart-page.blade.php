<div>
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{trans('user.cart')}}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">{{trans('user.home_page')}}</a></li>{{session('lang') == 'ar' ? '/':''}}

                            <li class="breadcrumb-item active">{{trans('user.cart')}} </li> {{session('lang') == 'ar' ? '':'/'}}

                            {{-- <span class="">{{Cart::instance('cart')->count()}}</span> --}}
                            <span class="">{{$cart_count_model}}</span>
                            {{-- <span class="">{{$newSubtotalModel}}</span> --}}
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">


            @if ($cart_count_model > 0)
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table cart-table">
                            <thead>
                            <tr class="table-head">
                                <th scope="col">{{trans('user.product_image')}}</th>
                                <th scope="col">{{trans('user.product_name')}}</th>
                                <th scope="col">{{trans('user.shop_name')}}</th>
                                <th scope="col">{{trans('user.product_price')}}</th>
                                <th scope="col">{{trans('user.colors')}}</th>
                                <th scope="col">{{trans('user.delete')}}</th>
                            </tr>
                            </thead>




                            @foreach ($cart_items_model as $item )
                                <tbody>
                                <tr>
                                    <td class="text-center">
                                        <a href="{{ route('all-products.show', $item->product->title) }}"><img src="{{imageDo($item->product->main_image)}}"
                                                         alt="">
                                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="#">{{$item->product->title}}</a>
                                        <br style="margin-top: 1px;">
                                        @if ($item->product->category_id == 1)
                                        <button type="button" class="btn btn-solid" data-toggle="modal" data-target="#exampleModal{{$item->product->id}}">
                                            {{ trans('user.sizes') }}
                                        </button>
                                        <div class="modal fade" id="exampleModal{{$item->product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header ">
                                                        <h5 class="modal-title" id="exampleModalLabel"> {{ trans('user.sizes') }} </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span  aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                            <div class="text-center">

                                                                <img src="{{asset('img/a_small_abaya.jpeg')}}"
                                                                     class="rounded  " height="400" alt="...">
                                                            </div>
                                                            <div class="compare-page">
                                                                <div class="table-wrapper table-responsive">
                                                                    <table class="table">

                                                                        <tbody id="table-compare">
                                                                        <tr>

                                                                            <th class="product-name" colspan="2">{{ trans('user.cart_size') }}</th>

                                                                        </tr>

                                                                        @foreach ($item->cart_option()->get() as $size)

                                                                        {{-- size: {{$size->de_size }} --}}
                                                                        <tr>

                                                                            <th class="product-name">1.:{{trans('user.a_size1')}} = {{$size->a_size1}} </th>
                                                                            <th class="product-name">2.:{{trans('user.a_size2')}} = {{$size->a_size2}} </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="product-name">3.:{{trans('user.a_size3')}} = {{$size->a_size3}} </th>
                                                                            <th class="product-name">4.:{{trans('user.a_size4')}} = {{$size->a_size4}} </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th class="product-name">5.:{{trans('user.a_size5')}} = {{$size->a_size5}} </th>
                                                                            <th class="product-name">6.:{{trans('user.a_size6')}} = {{$size->a_size6}} </th>
                                                                        </tr>

                                                                        @endforeach
                                                                        @foreach ($item->cart_option()->get() as $size)

                                                                        <tr>
                                                                            <th class="product-name" colspan="2">{{trans('user.notes')}} : {{$size->notes}}</th>
                                                                        </tr>
                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('user.close') }}</button>
                                                        {{--                                                        <button type="button" class="btn btn-primary">Save changes</button>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @elseif ($item->product->category_id == 2)
                                            @foreach ($item->cart_option()->get() as $size)

                                            notes: {{$size->notes}}
                                            @endforeach

                                        @else
                                            @foreach ($item->cart_option()->get() as $size)

                                            size: {{$size->de_size }} <br>
                                            notes: {{$size->notes}}
                                            @endforeach

                                        @endif

                                        <div class="mobile-cart-content row">

                                            <div class="col">

                                                    <h3 class="td-color">{{presentPrice($item->price)}}</h3>


                                            </div>
                                            <div class="col">
                                                <div>
                                                    <ul class="color-variant">

                                                        <li class="" style="background-color:{{$item->product->color->color}} ;border-radius: 50% ;border: 1px solid black "></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col">
                                                    <button type="submit"  wire:click.prevent="deleteItemCart('{{$item->id}}')" class="btn btn-sm btn-danger icon"
                                                    ><i class="ti-close"></i>

                                                    </button>

{{--
                                                        <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                            {{ csrf_field() }}

                                                            <button type="submit" style="background-color: #726189; color:white;" class="cart-options mt-1"><i class="ti-save"></i></button>
                                                        </form> --}}





                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">

                                        <h3 class="td-color">{{$item->product->store->name}}</h3>
                                    </td>
                                    <td class="text-center">
                                        {{-- @if($item->product->price_offer >0 and  $item->product->status == "active")
                                            <h3 class="td-color">{{presentPrice($item->product->price_offer)}}</h3>
                                        @else
                                            <h3 class="td-color">{{presentPrice($item->product->price)}}</h3>
                                        @endif --}}
                                        <h3 class="td-color">{{presentPrice($item->price)}}</h3>

                                    </td>
                                    <td class="text-center">
                                        <div class="qty-box">
                                            <div>
                                                <ul class="color-variant">

                                                    <li class="" style="background-color:{{$item->product->color->color}} ;border-radius: 50% ;border: 1px solid black "data-toggle="tooltip" data-placement="top" title="{{session('lang')=='ar'?$item->product->color->name_ar:$item->product->color->name_en}}" ></li>



                                                </ul>
                                            </div>

                                        </div>
                                    </td>


                                    <td class="text-center">




                                             <button type="submit"  wire:click="deleteItemCart('{{$item->id}}')" class="btn btn-sm btn-danger icon"
                                            ><i class="ti-close"></i>

                                            </button>


                                            {{-- <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">
                                                {{ csrf_field() }}

                                                <button type="submit mt-1" style="background-color: #726189; color:white;" class="cart-options mt-1"><i class="ti-save"></i></button>
                                            </form> --}}





                                    </td>

                                </tr>
                                </tbody>

                            @endforeach
                        </table>




                        <br>
                       @livewire('style.coupon-code')
                        <div class="table-responsive-md">
                            <table class="table cart-table ">
                                <tfoot>
                                <tr>
                                    <td>{{trans('user.subtotal')}}:</td>
                                    <td>
                                        {{-- <h4 style="font-size: 18px">{{presentPrice(Cart::instance('cart')->subtotal())}}</h4> --}}
                                        <h4 style="font-size: 18px">{{presentPrice($sub)}}</h4>
                                    </td>
                                </tr>

                                {{-- old cart --}}
{{--
                                @if (session()->has('coupon'))
                                    <tr>
                                        <td>{{trans('user.discount')}} ({{ session()->get('coupon')['name'] }}) :
                                            <button type="submit"  wire:click="del_coupon" class="close bg-danger" >
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </td>
                                        <td>
                                            <h4 style="font-size: 18px; color:red">  <strong>-</strong>
                                                     {{ presentPrice(session()->get('coupon')['discount'] ) }}
                                                    </h4>
                                        </td>
                                    </tr>
                                @endif
                                @if (session()->has('coupon'))
                                    <tr>
                                        <td>{{trans('user.subtotal')}}:</td>
                                        <td>
                                            <h4 style="font-size: 18px">{{presentPrice($newSubtotal)}}</h4>
                                        </td>
                                    </tr>

                                @endif --}}

                                {{-- //new cart --}}

                               @if (session()->has('coupon'))
                                    <tr>
                                        <td>{{trans('user.discount')}} ({{ session()->get('coupon')['name'] }}) :
                                            <button type="submit"  wire:click="del_coupon" class="close bg-danger" >
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </td>
                                        <td>
                                            <h4 style="font-size: 18px; color:red">  <strong>-</strong>
                                                     {{ presentPrice(session()->get('coupon')['discount'] ) }}
                                                    </h4>
                                        </td>
                                    </tr>
                                @endif
                                @if (session()->has('coupon'))
                                    <tr>
                                        <td>{{trans('user.subtotal')}}:</td>
                                        <td>
                                            <h4 style="font-size: 18px">{{presentPrice($newSubtotalModel)}}</h4>
                                        </td>
                                    </tr>

                                @endif




                                {{-- <tr>
                                    <td>{{trans('user.delivery')}}:</td>
                                    <td>
                                        <h4 style="font-size: 18px">{{presentPrice($costDeli)}}</h4>
                                    </td>
                                </tr> --}}
                                {{-- <tr>
                                    <td>{{trans('user.total')}}:</td>
                                    <td>
                                        <h4 style="font-size: 18px">{{presentPrice($newTotal)}}</h4>
                                    </td>
                                </tr> --}}
                                </tfoot>
                            </table>
                        </div>


                    </div>
                </div>
                <div class="row cart-buttons">
                    <div class="col-6"><a href="{{'/all-products'}}"
                                          class="btn btn-solid">{{trans('user.continue_shopping')}}</a></div>
                    <div class="col-6"><a href="{{route('confirm.index')}}"
                                          class="btn btn-solid">{{trans('user.checkout')}}</a></div>
                </div>
            @else
                <div class="container my-5 py-5 z-depth-1 white">


                    <!--Section: Content-->
                    <section class="text-center px-md-5 mx-md-5 dark-grey-text ">

                        <h1 class="font-weight-bold"><i class="fas fa-frown-open fa-2x"></i>
                            {{trans('user.card_empty')}} </h1>
                        <a href="{{'/all-products'}}" class="btn btn-solid">{{trans('user.continue_shopping')}}</a>


                    </section>
                    <!--Section: Content-->

                </div>

            @endif


        </div>
    </section>


    <!--section end-->
</div>
