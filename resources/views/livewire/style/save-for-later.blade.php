<div>
    {{-- Care about people's approval and you will be their prisoner. --}}


    <!--section start-->
    <section class="cart-section section-b-space">
        <div class="container">
            <div class="row">


                @if (Cart::instance('saveForLater')->count() > 0)
                <h2>({{ Cart::instance('saveForLater')->count() }}) {{ trans('user.save_for_leter_item') }}</h2>


                <div class="col-sm-12 table-responsive-xs">
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
                        @foreach (Cart::instance('saveForLater')->content() as $item)
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <a href="{{ route('all-products.show', $item->model->title) }}"><img src="{{imageDo($item->model->main_image)}}" alt=""></a>
                                </td>
                                <td class="text-center"><a href="{{ route('all-products.show', $item->model->title) }}">{{ $item->model->title }}</a>
                                    <div class="mobile-cart-content row">
                                        <div class="col">
                                            @if($item->model->price_offer >0 and  $item->model->status == "active")
                                                <h2 class="td-color">{{presentPrice($item->model->price_offer)}}</h2>
                                            @else
                                                <h2 class="td-color">{{presentPrice($item->model->price)}}</h2>
                                            @endif


                                        </div>
                                        <div class="col">
                                            <div>
                                                <ul class="color-variant">

                                                    <li class="" style="background-color:{{$item->model->color->color}} ;border-radius: 50% ;border: 1px solid black "></li>
                                                </ul>
                                            </div>
                                        </div>

                                        <div class="col">
                                                {{-- <button type="submit"  wire:click="deleteItem({{$item->id}})" class="btn btn-sm btn-danger icon"
                                                ><i class="ti-close"></i> --}}

                                                </button>
                                                <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <button type="submit" class="cart-options btn-danger"><i class="ti-close"></i></button>
                                                </form>


                                                <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">                                                            {{ csrf_field() }}

                                                        <button type="submit" style="background-color: #726189; color:white;" class="cart-options mt-1"><i class="ti-shopping-cart"></i></button>
                                                    </form>





                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">

                                    <h2 class="td-color">{{$item->model->store->name}}</h2>



                                </td>
                                <td class="text-center">
                                    @if($item->model->price_offer >0 and  $item->model->status == "active")
                                    <h2 class="td-color">{{presentPrice($item->model->price_offer)}}</h2>
                                @else
                                    <h2 class="td-color">{{presentPrice($item->model->price)}}</h2>
                                @endif

                                <td class="text-center">
                                    <ul class="color-variant">

                                        <li class="" style="background-color:{{$item->model->color->color}} ;border-radius: 50% ;border: 1px solid black "></li>
                                    </ul>



                                </td>
                                <td class="text-center">
                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}

                                        <button type="submit" class="cart-options btn-solid">Move to Cart</button>
                                    </form>
<br>
                                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" class="cart-options btn-danger"><i class="ti-close"></i></button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach

                    </table>

                </div>
                @endif

            </div>

        </div>
    </section>
    <!--section end-->

</div>
