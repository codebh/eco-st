@extends('admin.index')
@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        {{--<h3 class="d-inline-block d-sm-none">LOWA Men’s Renegade GTX Misssssd Hiking Boots Review</h3>--}}
                        <div class="col-12">
                            @foreach($order->product->image_data()->get() as $key => $image)
                                @if ($loop->first)
                                    <img src="{{imageDo($image->image_key)}}"
                                         class="img-fluid" alt="Product Image">

                                @endif
                            @endforeach

                        </div>
                        <div class="col-12 product-image-thumbs">

                            @foreach($order->product->image_data()->get() as $key => $image)
                                <div class="product-image-thumb {{$key == 0 ? 'active' : '' }}">
                                    <img src="{{imageDo($image->image_key)}}"
                                         alt="Product Image">
                                </div>

                            @endforeach


                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="alert alert-info " role="alert">

                            <h4 class="alert-heading"> <i class="fa fa-info-circle"></i> {{ trans('shop.note') }}</h4>
                            <h6 class="text-justify">
                                {{ trans('shop.delivery_notes') }}
                            </h6>
                            <p class="mb-0"></p>
                          </div>
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <span></span>
                                {{--<h3 class="animated infinite bounce delay-2s text-left">Example</h3>--}}
                                <h3 class="card-title">{{trans('shop.orderUpdate')}}
                                    {{--<div class="animated infinite bounce delay-2s"> pandding</div>--}}
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($order->shipped == 0)
                                <div class="animated infinite flash slow badge badge-danger">
                                    <h2><i class="fa fa-calendar-plus"></i>
                                    {{trans('admin.order_Step0')}}
                                </h2>
                                </div>
                            @elseif($order->shipped == 1)
                                <div class="animated infinite flash slow badge badge-warning">
                                    <h2><i class="fa fa-store"></i>
                                     {{trans('admin.order_Step1')}}
                                    </h2>
                                </div>
                            @elseif($order->shipped == 2)
                                <div class="animated infinite flash slow badge badge-success">
                                    <h2><i class="fa fa-smile-beam"></i>
                                      {{trans('admin.order_Step2')}}
                                    </h2>
                                </div>

                            @elseif($order->shipped == 3)
                                <div class="animated  bounceIn slow badge badge-success">
                                    <h2><i class="fa fa-shipping-fast"></i>
                                     {{trans('admin.order_Step3')}}
                                    </h2>
                                </div>
                            @elseif($order->shipped == 4)
                                <div class="animated  bounceIn slow badge badge-success">
                                    <h2><i class="fas fa-spinner"></i>
                                     {{trans('admin.order_Step4')}}
                                </h2>
                                </div>
                            @elseif($order->shipped == 5)
                                <div class="animated  bounceIn slow badge badge-info">
                                    <h2><i class="fas fa-shopping-bag"></i>
                                    {{trans('admin.order_Step5')}}
                                    </h2>
                                </div>
                            @elseif($order->shipped == 6)
                                <div class="animated  bounceIn slow badge badge-secondary">
                                    <h2><i class="far fa-times-circle"></i>
                                     {{trans('admin.order_Step6')}}
                                </h2>
                                </div>


                            @else
                                <span>postponed</span>
                            @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('shop.sizes')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">


                                @if ($order->product->category_id ==1)

                                <div class="col">
                                    <div class="text-center">


                                        <img src="{{asset('img/a_size.jpeg')}}"  style="height: 400px;" class="rounded" alt="">

                                    </div>
                                </div>
                                <table class="table table-striped table-valign-middle text-center table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>{{trans('shop.measruing_type')}} </th>
                                        <th>{{trans('shop.size')}}</th>
                                        <th>{{trans('shop.measruing_unit')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>{{trans('shop.size1')}}</td>
                                        <td>
                                      {{$order->ab_size1}}
                                        </td>
                                        <td>
                                           inch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2
                                        </td>
                                        <td>{{trans('shop.size2')}}</td>
                                        <td>
                                            {{$order->ab_size2}}
                                        </td>
                                        <td>
                                            inch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3
                                        </td>
                                        <td>{{trans('shop.size3')}}</td>
                                        <td>
                                            {{$order->ab_size3}}
                                        </td>
                                        <td>
                                            inch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4
                                        </td>
                                        <td>{{trans('shop.size4')}}</td>
                                        <td>
                                            {{$order->ab_size4}}
                                        </td>
                                        <td>
                                            inch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            5
                                        </td>
                                        <td>{{trans('shop.size5')}}</td>
                                        <td>
                                            {{$order->ab_size5}}
                                        </td>
                                        <td>
                                            inch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            6
                                        </td>
                                        <td>{{trans('shop.size6')}}</td>
                                        <td>
                                            {{$order->ab_size6}}
                                        </td>
                                        <td>
                                            inch
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            {{trans('shop.notes')}}
                                        </td>

                                        <td>
                                            <strong style="color: red"> {{$order->notes}}</strong>
                                        </td>
                                    </tr>

                                </table>


                                    <br>





                                @elseif ($order->product->category_id ==2)

                                    <table class="table table-striped table-valign-middle table-bordered text-center">
                                        <thead>

                                        </thead>
                                        <tbody>



                                        <tr>
                                            <td colspan="2">
                                                {{trans('shop.notes')}}
                                            </td>
                                            <td>
                                                <strong style="color: red"> {{$order->notes}}</strong>
                                            </td>
                                        </tr>

                                    </table>


                                @else
                                    <table class="table table-striped table-valign-middle text-center table-bordered">
                                        <thead>
                                        <tr>
                                            <th>{{trans('shop.measruing_type')}} </th>
                                            <th>{{$order->de_size}}</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td>
                                                {{trans('shop.notes')}}
                                            </td>

                                            <td>
                                                <strong style="color: red"> {{$order->notes}}</strong>
                                            </td>

                                        </tr>


                                    </table>
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </div>

                        <br>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('shop.order_content')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-1">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('shop.order_id')}}</span>
                                                <span class="info-box-number">{{$order->order->id}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="far fa-user"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('shop.customer_name')}}</span>
                                                <span class="info-box-number">{{$order->order->billing_name}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="far fa-envelope"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('shop.customer_email')}}</span>
                                                <span class="info-box-number">{{$order->order->billing_email}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-3">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="fa fa-address-book"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_address')}}</span>
                                                @if ($order->order->billing_country =='bahrain')

                                                <span class="info-box-number">{{ trans('admin.billing_buliding') }} :{{$order->order->billing_buliding}}</span>
                                                <span class="info-box-number">{{ trans('admin.billing_road') }} :{{$order->order->billing_road}}</span>
                                                <span class="info-box-number">{{ trans('admin.billing_block') }} :{{$order->order->billing_block}}</span>
                                                <span class="info-box-number">{{ trans('admin.billing_speical_direcstions') }} :{{$order->order->billing_speical_direcstions}}</span>
                                                @else
                                                <span class="info-box-number">{{ trans('admin.billing_address') }} :{{$order->order->billing_address}}</span>
                                                <span class="info-box-number">{{ trans('admin.billing_address2') }} :{{$order->order->billing_address2}}</span>
                                                <span class="info-box-number">{{ trans('admin.billing_province') }} :{{$order->order->billing_province}}</span>
                                                <span class="info-box-number">{{ trans('admin.billing_postalcode') }} :{{$order->order->billing_postalcode}}</span>

                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-1">
                                        <div class="info-box bg-warning-gradient">
                                            <span class="info-box-icon"><i class="fa fa-home"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_country')}}</span>
                                                <span class="info-box-number">{{$order->order->billing_country}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-1">
                                        <div class="info-box bg-warning-gradient">
                                            <span class="info-box-icon"><i class="fa fa-home"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_city')}}</span>
                                                <span class="info-box-number">{{$order->order->billing_city}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-2">
                                        <div class="info-box bg-warning-gradient">
                                            <span class="info-box-icon"><i class="fa fa-phone"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_phone')}}</span>


                                                <span class="info-box-number">{{$order->order->billing_phone}}</span>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <div class="info-box bg-warning-gradient">
                                            <span class="info-box-icon"><i class="fa fa-list"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_discount_code')}}</span>
                                                <span class="info-box-number">{{$order->order->billing_discount_code}}</span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="fa fa-list"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_discount')}}</span>
                                                <span class="info-box-number">{{$order->order->billing_discount}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="fa fa-truck"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_delivery')}}</span>
                                                <span class="info-box-number">{{presentPrice($order->order->billing_delivery)}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="fa fa-money-bill"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_subtotal')}}</span>
                                                <span class="info-box-number">{{presentPrice($order->order->billing_subtotal)}}</span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-2">
                                        <div class="info-box bg-warning">
                                            <span class="info-box-icon"><i class="fa fa-money-bill"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.billing_total')}}</span>
                                                <span class="info-box-number">{{presentPrice($order->order->billing_total)}}</span>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title"> {{trans('admin.orders_status')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="info-box bg-info-gradient">
                                            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.est_date')}}</span>
                                                <span class="info-box-number">{{$order->est_date}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="info-box bg-info-gradient">
                                            <span class="info-box-icon"><i class="far fa-user"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.confirm')}}</span>
                                                @if ($order->confirm ==' yes')

                                                    <span class="info-box-number ">{{trans('admin.confirm1')}}</span>
                                                @else
                                                    <span class="info-box-number">{{trans('admin.confirm0')}}</span>

                                                @endif
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="info-box bg-info-gradient">
                                            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.payment_gateway')}}</span>
                                                <span class="info-box-number">{{$order->order->payment_gateway}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="info-box bg-info-gradient">
                                            <span class="info-box-icon"><i class="far fa-user"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.error')}}</span>

                                                <span class="info-box-number">{{$order->order->error}}</span>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('admin.order_product')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-success-gradient">
                                            <span class="info-box-icon"><i class="fa fa-sort-numeric-up-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.product_id')}}</span>
                                                <span class="info-box-number">{{$order->product->id}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-success-gradient">
                                            <span class="info-box-icon"><i class="far fa-user"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.product_title')}}</span>

                                                <span class="info-box-number">{{$order->product->title}}</span>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="info-box bg-success-gradient">
                                            <span class="info-box-icon"><i class="fa fa-box"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.shop_name_ar')}}</span>
                                                <span class="info-box-number">{{$order->store->name}}</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="info-box bg-success-gradient">
                                            <span class="info-box-icon"><i class="fa fa-tint"
                                                                           style="color: {{$order->product->color->color}}"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.color')}}</span>
                                                <span class="info-box-number">{{$order->product->color->name_ar}}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('admin.orders_item')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">

                                        @foreach (\App\Models\OrderProduct::where('order_id',$order->order_id)->get() as $item)
                                    <div class="col-12 col-sm-6 col-md-3">
{{--                                                                                            <h1>{{$item->id}}</h1>--}}
                                        <div class="info-box">

                                            <span class="info-box-icon bg-info elevation-1">


                                                <img src="{{imageDo($order->product->main_image)}}" alt="">

                                            </span>


                                            <div class="info-box-content">
                                                <span class="info-box-text">{{trans('admin.product_id')}}:{{$item->product->id}}</span>
                                                                                                                                    {{presentPrice($item->price)}}
{{--                                                                                                                    <small>%</small>--}}
                                                <span class="info-box-number">
                                                    {{trans('admin.product_title')}}:{{$item->product->title}}
                                                </span>
                                                <span class="info-box-number">
                                                    {{trans('admin.shop_name_ar')}}:{{$item->store->name}}
                                                </span>
                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                        <!-- /.info-box -->
                                    </div>
                                        @endforeach


                                </div>


                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>





@endsection
