<div>

    <!-- breadcrumb start -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>{{ trans('user.checkout') }}</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active "><a href="/">{{trans('user.home_page')}}</a></li> /
                            <span>{{ trans('user.checkout') }}</span>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb End -->

    <div wire:loading.delay.long>
        <div style="display: flex; justify-content: center; align-items: center; background-color:black;
                    position: fixed; top: 0px; left:0px; z-index: 9999; width: 100%; height:100%; opacity:.50; ">
            <div class="la-ball-clip-rotate la-3x" >
                <div></div>

            </div>
        </div>
    </div>
    <!-- section start -->
    <section class="section-b-space">
        <div class="container">
            <div class="checkout-page">
                <div class="checkout-form">
                    <form  wire:submit.prevent="store">
                        {{csrf_field()}}
                        @if ($cart_count> 0)
                            <div class="row">
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="row check-out">
                                        <div class="checkout-title">
                                            <h3>{{ trans('user.delivery_method') }}</h3>
                                        </div>
                                        @foreach($cities as $key => $city)
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <label class="form-check-label"  wire:click.delay="changeEvent($event.target.value)">
                                                    <input type="radio" class="form-check-input @error('delivery_method')is-invalid @endif"  name="delivery_method" id="" value="{{ $key }}"
                                                           wire:model="delivery_method" >
                                                    @if ($key == 1)
                                                        {{ trans('user.local_delivery') }}
                                                    @else
                                                        {{ trans('user.global_delivery') }}
                                                    @endif
                                                    @error('delivery_method')
                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                    @enderror
                                                </label>
                                            </div>
                                        @endforeach

                                        @if (  $city_id  == 1)
                                            <div class="checkout-title">
                                                <h3>{{ trans('user.address_shipping') }}</h3>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.email')}}</div>
                                                <input type="email" class="form-control @error('billing_email')is-invalid @endif"
                                                       wire:model.lazy="billing_email"  placeholder="email"/>
                                                @error('billing_email')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.country')}}</div>
                                                <input type="text" name="billing_country" value="Bahrain" disabled placeholder="">
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.name')}}</div>
                                                <input type="text" class="form-control @error('billing_name')is-invalid @endif"
                                                       wire:model.lazy="billing_name"  placeholder="Full Name"/>
                                                @error('billing_name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.city')}}</div>
                                                <input type="text" class="form-control @error('billing_city')is-invalid @endif"
                                                       wire:model.lazy="billing_city"  placeholder="city">
                                                @error('billing_city')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.buliding')}}</div>
                                                <input type="text" name="billing_buliding" class="form-control @error('billing_buliding')is-invalid @endif"
                                                       wire:model.lazy="billing_buliding" placeholder="buliding number">
                                                @error('billing_buliding')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.road')}}</div>
                                                <input type="text" name="billing_road"  class="form-control @error('billing_road')is-invalid @endif"
                                                       wire:model.lazy="billing_road" placeholder=" road">
                                                @error('billing_road')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-4 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.block')}}</div>
                                                <input type="text" name="billing_block"  class="form-control @error('billing_block')is-invalid @endif"
                                                       wire:model.lazy="billing_block" placeholder="block">
                                                @error('billing_block')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.speical_direcstion')}}({{ trans('user.Optinal') }})</div>
                                                <input type="text" name="billing_speical_direcstions"  class="form-control @error('billing_speical_direcstions')is-invalid @endif"
                                                       wire:model.lazy="billing_speical_direcstions" placeholder="">
                                                @error('billing_speical_direcstions')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.phone')}}</div>
                                                <input type="text" name="billing_phone"class="form-control @error('billing_phone')is-invalid @endif"
                                                       wire:model.lazy="billing_phone" placeholder="xxxxxxxx">
                                                @error('billing_phone')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @elseif ( $city_id  == 2)
                                            <div class="checkout-title">
                                                <h3>{{ trans('user.address_shipping') }}</h3>
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.email')}}</div>
                                                <input type="email" name="billing_email" class="form-control @error('billing_email')is-invalid @endif"
                                                       wire:model.lazy="billing_email" placeholder="email">
                                                @error('billing_email')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.name')}}</div>
                                                <input type="text" class="form-control @error('billing_name')is-invalid @endif" wire:model.lazy="billing_name" placeholder=" full name">
                                                @error('billing_name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.address')}}</div>
                                                <input type="text"   class="form-control @error('billing_address')is-invalid @endif" wire:model.lazy="billing_address" placeholder="address">
                                                @error('billing_address')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-12 col-sm-6 col-xs-12">
                                                <input type="text"class="form-control @error('billing_address1')is-invalid @endif" wire:model.lazy="billing_address1"   placeholder="address 2">
                                                @error('billing_address1')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.country')}}</div>
                                                <select name="billing_country"  class="form-control @error('billing_country')is-invalid @endif" wire:model.lazy="billing_country" >
                                                    <option value="">-- Select Country  --</option>
                                                    <option value="KSA">{{ trans('user.Country_ksa') }}</option>
                                                    <option value="UAE">{{ trans('user.Country_uae') }}</option>
                                                    <option value="QTR">{{ trans('user.Country_qtr') }}</option>
                                                    <option value="OMAN">{{ trans('user.Country_oman') }}</option>
                                                    <option value="KWT">{{ trans('user.Country_kuwait') }}</option>
                                                </select>

                                                @error('billing_country')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.city')}}</div>
                                                <input type="text"  class="form-control @error('billing_city')is-invalid @endif" wire:model.lazy="billing_city" placeholder="city">
                                                @error('billing_city')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                            <div class="form-group col-md-4 col-sm-12 col-xs-12">
                                                <div class="field-label">{{trans('user.province')}}</div>
                                                <input type="text" name="billing_province" class="form-control @error('billing_province')is-invalid @endif" wire:model.lazy="billing_province" placeholder="">
                                                @error('billing_province')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-3 col-sm-12 col-xs-12">
                                                <div class="field-label">{{trans('user.postal_code')}}</div>
                                                <input type="text" class="form-control @error('billing_postalcode')is-invalid @endif" wire:model.lazy="billing_postalcode" placeholder="zip code">
                                                @error('billing_postalcode')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                                <div class="field-label">{{trans('user.phone')}}</div>
                                                <input type="text" class="form-control @error('billing_phone')is-invalid  @enderror" wire:model.lazy="billing_phone"  placeholder=" phone number">
                                                @error('billing_phone')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12 col-xs-12">
                                    <div class="checkout-details">
                                        <div class="order-box">
                                            <div class="title-box">
                                                <div>{{trans('user.product_name')}} <span>{{trans('user.price')}}</span></div>
                                            </div>
                                            <ul class="qty">
                                                @forelse($cart_content as $item)
                                                    <li>{{$item->product->title}} × 1
                                                        <br>{{$item->product->store->name}}
                                                        @foreach ($item->cart_option()->get() as $i)
                                                        <br>{{ trans('user.notes') }}:{{ $i->notes }}
                                                        @endforeach
                                                        <span>{{presentPrice($item->price)}}</span>
                                                    </li>
                                                @empty

                                                @endforelse
                                            </ul>
                                            <ul class="sub-total">
                                                <li>{{trans('user.subtotal')}} <span class="count">{{presentPrice($cart_subtotal)}}</span></li>
                                                @if (  $city_id  == 1)
                                                    <li>
                                                        {{ trans('user.shipping_type') }}
                                                        <div class="shipping">
                                                            @foreach($delivery_types as $key => $city)
                                                                <div class="shopping-option" >
                                                                    <input type="radio" name="shipping_type"  wire:click="changeshipping($event.target.value)"
                                                                      wire:model="shipping_type"   value="{{ $key }}"  required>
                                                                    @error('shipping_type')
                                                                    <p class="invalid-feedback">{{ $message }}</p>
                                                                    @enderror
                                                                    @if ($key  == 1)
                                                                        <label for="free-shipping"  >{{ trans('user.delivery_multi') }}</label>
                                                                        <i class="fa fa-question-circle" data-toggle="modal" data-target="#exampleModalMulti"></i>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModalMulti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <div class="modal-body">
                                                                                        @if ($key  == 1)
                                                                                            <div class="alert alert-warning" role="alert">
                                                                                                <h4 class="mb-0">{{ trans('user.delivery_multi_info') }}</h4>
                                                                                            </div>
                                                                                            <table class="table table-bordered">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>{{ trans('user.product_name') }}</th>
                                                                                                    <th>{{ trans('user.price') }}</th>
                                                                                                </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                @foreach ($cart_content as $item )
                                                                                                    <tr>
                                                                                                        <td scope="row">{{$loop->iteration}}</td>
                                                                                                        <td>{{$item->product->title}}</td>
                                                                                                        @if ($loop->first)
                                                                                                            <td class="text-center" rowspan="{{$cart_count}}">{{presentPrice(1)}}</td>
                                                                                                        @endif
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                <tr>
                                                                                                    <td colspan="2"  scope="row">{{ trans('user.delivery') }}</td>
                                                                                                    <td colspan="1"  scope="row">{{presentPrice(1)}}</td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        @else
                                                                                            <label for="free-shipping">{{ trans('user.delivery_single') }}</label>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('user.close') }}</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @elseif ($key == 2)
                                                                        <label for="free-shipping" >{{ trans('user.delivery_single') }}</label>
                                                                        <i class="fa fa-question-circle" data-toggle="modal" data-target="#exampleModal2"></i>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">

                                                                                    <div class="modal-body">
                                                                                        @if ($key  == 2)
                                                                                            <div class="alert alert-warning" role="alert">
                                                                                                <h4 class="mb-0">{{ trans('user.delivery_single_info') }}</h4>
                                                                                            </div>
                                                                                            <table class="table table-bordered">
                                                                                                <thead>
                                                                                                <tr>
                                                                                                    <th>#</th>
                                                                                                    <th>{{ trans('user.product_name') }}</th>
                                                                                                    <th>{{ trans('user.price') }}</th>
                                                                                                </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                @foreach ($cart_content as $item )
                                                                                                    <tr>
                                                                                                        <td scope="row">{{$loop->iteration}}</td>
                                                                                                        <td>{{$item->product->title}}</td>
                                                                                                        <td >{{presentPrice(1)}}</td>
                                                                                                    </tr>
                                                                                                @endforeach
                                                                                                <tr>
                                                                                                    <td colspan="2"  scope="row">{{ trans('user.delivery') }}</td>
                                                                                                    <td colspan="1"  scope="row">{{presentPrice(1*$cart_count)}}</td>
                                                                                                </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('user.close') }}</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                    </li>
                                                @elseif ( $city_id  == 2)
                                                    <li>
                                                        {{ trans('user.shipping_type') }}
                                                        @foreach($delivery_types as $key => $city)
                                                            @if ($loop->first)
                                                                <div class="shipping">
                                                                    <div class="shopping-option">
                                                                        <input type="radio" name="shipping_type1" wire:model="shipping_type1"  id="free-shipping1"    value="{{ $key }}"   wire:click="changeshipping($event.target.value)"  checked required >
                                                                        <label for="local-pickup"  >{{ trans('user.delivery_multi') }}</label>
                                                                        <i class="fa fa-question-circle" data-toggle="modal" data-target="#exampleModal222"></i>
                                                                        <div class="modal fade" id="exampleModal222" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-body">
                                                                                        <table class="table table-bordered">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>{{ trans('user.product_name') }}</th>
                                                                                                <th>{{ trans('user.price') }}</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                            @foreach ($cart_content as $item )
                                                                                                <tr>
                                                                                                    <td scope="row">{{$loop->iteration}}</td>
                                                                                                    <td>{{$item->product->title}}</td>
                                                                                                    <td >{{presentPrice(3.500)}}</td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                            <tr>
                                                                                                <td colspan="2"  scope="row">{{ trans('user.delivery') }}</td>
                                                                                                <td colspan="1"  scope="row">{{presentPrice(3.500*$cart_count)}}</td>
                                                                                            </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('user.close') }}</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        @endforeach
                                                    </li>
                                                @endif
                                            </ul>
                                            <ul class="total">
                                                @if (session()->has('coupon'))
                                                    <li>{{trans('user.discount')}} ({{ session()->get('coupon')['name'] }}) :
                                                        <span class="count">{{ presentPrice(session()->get('coupon')['discount'] ) }} </span>
                                                    </li>
                                                @endif
                                            </ul>
                                            <ul class="total">
                                                <li>{{trans('user.delivery')}} <span class="count">    {{presentPrice($costDeli)}}</span></li>
                                            </ul>
                                            <ul class="total">
                                                <li>{{trans('user.total')}} <span class="count">       {{presentPrice($newTotal)}}</span></li>
                                            </ul>
                                        </div>
                                        <div class="payment-box">
                                            <div class="upper-box">
                                                <div class="payment-options">
                                                    <ul>
                                                        <li>
                                                            <div class="radio-option" style="display: flex">
                                                                <input type="radio" name="payment_group" id="payment-1"
                                                                       checked="checked" value="1" wire:model = 'payment_group' >
                                                                <label for="payment-1" >Benefit</label>

                                                                <span class="image_benefit" >        <img src="{{asset('img/theme/benefit0.png')}}" style="height: 60px;" alt=""></span>
                                                            </div>
                                                        </li>
                                                        <li style="margin-top: 30px;">
                                                            <div class="radio-option" style="display: flex">
                                                                <input type="radio" name="payment_group" id="payment-2" value="2" wire:model = 'payment_group'>
                                                                <label for="payment-2">CreditCard</label>
                                                                <span class="image_benefit" >        <img src="{{asset('img/theme/payments-cards1.png')}}" style="width: 170px;margin-right: 5px;" alt=""></span>

                                                            </div>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                @if ($errors->isEmpty())
                                                @endif
                                                <div>
                                                    <button class="btn 6 btn-solid" wire:loading.attr="disabled">
                                                        {{ trans('user.checkout') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            no products
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
</div>
