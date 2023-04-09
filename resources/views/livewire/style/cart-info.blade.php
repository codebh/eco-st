<li class="onhover-div mobile-cart li">
    <div>
        @if (Route::current()->getName() !== 'confirm.index')


        <img src="{{asset('design/theme/assets/images/icon/cart.png')}}"
              class="img-fluid blur-up lazyload" alt=""> <i
            class="ti-shopping-cart"></i>

        @else
        <a href="{{ route('ShoppingCart.index') }}">

            <img src="{{asset('design/theme/assets/images/icon/cart.png')}}"
                  class="img-fluid blur-up lazyload" alt=""> <i
                class="ti-shopping-cart"></i>
            </a>
        @endif
        </div>
    @if(Auth::check())
        <span class="cart_qty_cls">{{$cart_count}}</span>


        @if (Route::current()->getName() !== 'confirm.index')
        <ul class="show-div shopping-cart">
            @forelse($cart_content as $item)
                <li>
                    <div class="media">
                        <a href="{{ route('all-products.show',$item->product->title) }}"><img alt="" class="me-3"
                                        src="{{imageDo($item->product->main_image)}}"></a>
                        <div class="media-body">
                            <a href="{{ route('all-products.show',$item->product->title) }}">
                                <h4>{{$item->product->title}}         </h4>
                            </a>
                            <h4><span>{{presentPrice($item->price)}}</span></h4>
                        </div>
                    </div>

                    <div class="close-circle">

                        <button type="button" wire:click.prevent="deleteItem('{{$item->id}}')" ><i class="fa fa-times"
                                                    aria-hidden="true"></i></button>
                    </div>
                </li>




                    @empty
                        <h3> {{trans('user.card_empty')}}</h3>
                    @endforelse


                    @if ($cart_count > 0)

                    <li>
                        <div class="total">
                            @if (direction()== 'ltr')

                                <h5>{{trans('user.subtotal')}} : <span>{{presentPrice($sub)}}</span></h5>
                            @else
                                <h5>{{presentPrice($sub)}} <span>{{trans('user.subtotal')}}:</span>  </h5>
                            @endif
                        </div>
                    </li>



                    @endif

                <li>
                    <div class="buttons">

                        <a href="{{route('ShoppingCart.index')}}"
                        class="view-cart">{{trans('user.cart')}}</a>
                        <a href="{{route('confirm.index')}}"
                        class="checkout">{{trans('user.quick_checkout')}}</a>
                    </div>
                </li>

        </ul>
        @endif
    @else
    <ul class="show-div shopping-cart">

                    <h3> {{trans('user.card_empty')}}</h3>
{{--

            <li>
                <div class="buttons">

                    <a href="{{route('ShoppingCart.index')}}"
                    class="view-cart">{{trans('user.cart')}}</a>
                    <a href="{{route('confirm.index')}}"
                    class="checkout">{{trans('user.quick_checkout')}}</a>
                </div>
            </li> --}}

    </ul>
    @endif

</li>





