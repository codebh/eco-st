@extends('style.newIndex')

@section('content')
    @include('style.layouts.message')
    <!-- breadcrumb start -->

    @livewire('style.cart-page')

{{-- @livewire('style.save-for-later', ['user' => Cart::instance('saveForLater')->content()]) --}}





@endsection




















{{--@extends('style.index')--}}
{{--@section('content')--}}
{{--    <br> <br>--}}
{{--    <main>--}}

{{--        <!-- Main Container -->--}}
{{--        <div class="container">--}}

{{--            <section class="section ">--}}

{{--                <!-- Shopping Cart table -->--}}
{{--                <br><br><br>--}}
{{--                @include('style.layouts.message')--}}

{{--                @if (Cart::count() > 0)--}}
{{--                    <h2></h2>--}}
{{--                    <br>--}}
{{--                    <!-- Card -->--}}

{{--                    <!-- Card -->--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-md-8">--}}
{{--                            <div class="card card-cascade wider">--}}

{{--                                <!-- Card image -->--}}
{{--                                <div class="view view-cascade gradient-card-header white text-dark ">--}}

{{--                                    <!-- Title -->--}}
{{--                                    <h3 class="card-header-title mb-3">Cart</h3>--}}
{{--                                    <!-- Text -->--}}
{{--                                    <h4 class="mb-0"><i class="fas fa-shopping-cart mr-2"></i>{{Cart::count()}} item(s)--}}
{{--                                        in Shopping Cart</h4>--}}

{{--                                </div>--}}


{{--                                <!-- Card content -->--}}
{{--                                <div class="card-body card-body-cascade text-center">--}}

{{--                                    <table class="table product-table table-cart-v-1">--}}

{{--                                        <!-- Table head -->--}}
{{--                                        <thead>--}}

{{--                                        <tr>--}}
{{--                                            <th>--}}
{{--                                                <strong>Image</strong>--}}
{{--                                            </th>--}}
{{--                                            <th>--}}
{{--                                                <strong>Information</strong>--}}
{{--                                            </th>--}}
{{--                                            <th class="font-weight-bold">--}}
{{--                                                <strong>Price</strong>--}}
{{--                                            </th>--}}
{{--                                            <th class="font-weight-bold">--}}
{{--                                                <strong>Remove Item </strong>--}}
{{--                                            </th>--}}

{{--                                        </tr>--}}

{{--                                        </thead>--}}
{{--                                        <!-- Table head -->--}}

{{--                                        <!-- Table body -->--}}
{{--                                        <tbody>--}}
{{--                                        @foreach(Cart::content() as $item)--}}
{{--                                            <!-- First row -->--}}
{{--                                            <tr>--}}

{{--                                                <td scope="row">--}}
{{--                                                    @foreach($item->model->image_data()->get() as $image)--}}
{{--                                                        @if ($loop->first)--}}

{{--                                                            <a href="{{'shopProduct/'.$item->model->id}}">--}}
{{--                                                                <img src="{{asset('storage/product/'.$item->model->id.'/'.$image->image_key)}}"--}}
{{--                                                                     alt=""--}}
{{--                                                                     class="img-fluid z-depth-0"--}}
{{--                                                                     style="">--}}
{{--                                                            </a>--}}
{{--                                                        @endif--}}
{{--                                                    @endforeach--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <a href="{{'shopProduct/'.$item->model->id}}">{{$item->model->title}}</a><br>--}}
{{--                                                    <p><strong>Store:</strong>{{$item->model->store->name}}</p>--}}
{{--                                                    <p><strong>Abaya Color:</strong>{{$item->color}}</p>--}}
{{--                                                    <p><strong>Shela Color:</strong>{{$item->color1}}</p>--}}

{{--                                                    <strong>Notes:{{$item->note}}</strong><br>--}}
{{--                                                    <strong>qty:1</strong>--}}
{{--                                                </td>--}}

{{--                                                <td class="font-weight-bold">--}}
{{--                                                    @if($item->price_offer >0 and  $item->status == "active")--}}
{{--                                                        <span class="badge badge-pill danger-color animated flash infinite slow">{{trans('shop.sale')}}</span>--}}
{{--                                                        <br>--}}
{{--                                                        <strong>{{presentPrice($item->price_offer)}} </strong>--}}
{{--                                                    @else--}}
{{--                                                        <strong>{{presentPrice($item->price)}}</strong>--}}
{{--                                                    @endif--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <form action="{{route('ShoppingCart.destroy',$item->rowId)}}"--}}
{{--                                                          method="post">--}}
{{--                                                        {{csrf_field()}}--}}
{{--                                                        {{method_field('DELETE')}}--}}

{{--                                                        <button type="submit" class="btn btn-sm btn-danger"--}}
{{--                                                                data-toggle="tooltip" data-placement="top"--}}
{{--                                                                title="Remove item"><i class="fas fa-trash"></i>--}}

{{--                                                        </button>--}}

{{--                                                    </form>--}}

{{--                                                </td>--}}
{{--                                            </tr>--}}


{{--                                        @endforeach--}}

{{--                                        </tbody>--}}
{{--                                        <!-- Table body -->--}}

{{--                                    </table>--}}


{{--                                </div>--}}
{{--                                <!-- Card content -->--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-4">--}}

{{--                            <div class="card  border border-light rounded-0">--}}
{{--                                <div class="card-body">--}}
{{--                                    <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Have a Code?</h4>--}}
{{--                                    <hr>--}}
{{--                                    <form action="{{route('coupon.store')}}" method="POST">--}}

{{--                                        {{ csrf_field() }}--}}
{{--                                        <div class="input-group">--}}
{{--                                            <div class="input-group-prepend">--}}
{{--                                                <span class="input-group-text">Coupon Code</span>--}}
{{--                                            </div>--}}

{{--                                            <input type="text" name="coupon_code" id="coupon_code"--}}
{{--                                                   aria-label="Coupon Code" class="form-control">--}}
{{--                                        </div>--}}
{{--                                        <br>--}}

{{--                                        <button type="submit" class=" btn btn-primary btn-block btn-block  btn-lg">--}}
{{--                                            Apply--}}
{{--                                        </button>--}}
{{--                                    </form>--}}


{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="card z-depth-0 border border-light rounded-0">--}}

{{--                                <!--Card content-->--}}
{{--                                <div class="card-body">--}}
{{--                                    <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Summary</h4>--}}

{{--                                    <hr>--}}


{{--                                    <dl class="row">--}}
{{--                                        <dt class="col-sm-8" style="">--}}
{{--                                            SubTotal--}}

{{--                                        </dt>--}}
{{--                                        <dt class="col-sm-4">--}}
{{--                                            {{presentPrice(Cart::subtotal())}}--}}

{{--                                        </dt>--}}
{{--                                    </dl>--}}
{{--                                    <hr>--}}
{{--                                    <dl class="row">--}}
{{--                                        <dt class="col-sm-8" style="">--}}
{{--                                            Tax--}}

{{--                                        </dt>--}}
{{--                                        <dt class="col-sm-4">--}}
{{--                                            {{presentPrice($newTax)}}--}}

{{--                                        </dt>--}}
{{--                                    </dl>--}}


{{--                                    @if (session()->has('coupon'))--}}
{{--                                        <hr>--}}
{{--                                    @endif--}}
{{--                                    <dl class="row">--}}
{{--                                        <dt class="col-sm-8" style="">--}}
{{--                                            @if (session()->has('coupon'))--}}
{{--                                                Discount ({{ session()->get('coupon')['name'] }}) :--}}
{{--                                                <form action="{{route('coupon.del')}}" method="post"--}}
{{--                                                      style="display: inline">--}}
{{--                                                    {{csrf_field()}}--}}
{{--                                                    {{method_field('DELETE')}}--}}
{{--                                                    <button type="submit" class=" btn btn-block btn-danger"><i--}}
{{--                                                                class="fas fa-trash-alt"></i></button>--}}
{{--                                                </form>--}}


{{--                                                <hr>--}}
{{--                                                New SubTotal--}}
{{--                                            @endif--}}
{{--                                        </dt>--}}
{{--                                        <dt class="col-sm-4">--}}
{{--                                            @if (session()->has('coupon'))--}}

{{--                                                                                       {{ presentPrice(session()->get('coupon')['discount'] ) }}--}}
{{--                                                {{presentPrice($discount)}}--}}
{{--                                                <br><br><br>--}}
{{--                                                <hr>--}}
{{--                                                <p class="text-danger"> {{presentPrice($newSubtotal)}}</p>--}}


{{--                                            @endif--}}

{{--                                        </dt>--}}
{{--                                    </dl>--}}
{{--                                    <hr>--}}
{{--                                    <dl class="row">--}}
{{--                                        <dt class="col-sm-8" style="">--}}

{{--                                            Delivery Charge--}}

{{--                                        </dt>--}}
{{--                                        <dt class="col-sm-4">--}}

{{--                                            {{presentPrice($costDeli)}}--}}

{{--                                        </dt>--}}
{{--                                    </dl>--}}
{{--                                    <hr>--}}
{{--                                    <dl class="row">--}}
{{--                                        <dt class="col-sm-8" style="">--}}
{{--                                            Total--}}

{{--                                        </dt>--}}
{{--                                        <dt class="col-sm-4">--}}
{{--                                            {{presentPrice($newTotal)}}--}}

{{--                                        </dt>--}}
{{--                                    </dl>--}}
{{--                                    <hr>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}


{{--                    </div>--}}


{{--                    <!-- Card Regular -->--}}

{{--                    <!-- Card Regular -->--}}


{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <a href="{{route('confirm.index')}}" type="button"--}}
{{--                               class="btn btn-dark btn-lg  btn-rounded btn-block">Complete--}}
{{--                                purchase--}}

{{--                                <i class="fas fa-angle-right right"></i>--}}

{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <a href="{{'products'}}" type="button"--}}
{{--                               class="btn btn-success btn-lg btn-block  btn-rounded">Continue Shopping--}}

{{--                                <i class="fa fa-shopping-basket right"></i>--}}

{{--                            </a>--}}
{{--                        </div>--}}


{{--                    </div>--}}

{{--                    <!-- Shopping Cart table -->--}}
{{--                @else--}}
{{--                    <div class="container my-5 py-5 z-depth-1 white">--}}


{{--                        <!--Section: Content-->--}}
{{--                        <section class="text-center px-md-5 mx-md-5 dark-grey-text ">--}}

{{--                            <h1 class="font-weight-bold"><i class="fas fa-frown-open fa-2x"></i>--}}
{{--                                The Cart is Empty </h1>--}}
{{--                            <a href="{{'products'}}">Continue Shopping</a>--}}

{{--                        </section>--}}
{{--                        <!--Section: Content-->--}}

{{--                    </div>--}}
{{--                @endif--}}


{{--            </section>--}}


{{--        </div>--}}
{{--        <!-- Main Container -->--}}

{{--    </main>--}}
{{--@endsection--}}
