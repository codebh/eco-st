@extends('store.index')
@section('content')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">


                        <div class="col-12">
                            <img src="{{imageDo($order->product->main_image)}}" class="product-image img-thumbnail" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img src="{{imageDo($order->product->main_image)}}" alt="Product Image"></div>
                            @foreach ($order->product->image_data()->get() as $item)
                            <div class="product-image-thumb" ><img src="{{imageDo($item->image_key)}}" alt="Product Image"></div>
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
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @if($order->shipped == 0)
                                    {!! Form::open(['url'=>surl('shopOrders/'.$order->id),'method'=>'put']) !!}

                                    {{--{!! Form::open(['url'=>surl('shopOrders/'.$order->id)]) !!}--}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::label('est_date',trans('shop.est_date')) !!}
                                                {!! Form::date('est_date',$order->est_date,['class'=>'form-control', 'id'=>'txtDate']) !!}
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                {!! Form::hidden('shipped',$order->shipped,['class'=>'form-control ']) !!}

                                                {!! Form::label('est_date_label',trans('shop.est_date_label')) !!}

                                                {!! Form::submit(trans('shop.orderUpdate'),['class'=>'btn btn-success btn-block']) !!}
                                            </div>
                                        </div>

                                    </div>
                                    {!! Form::close() !!}




                                @elseif($order->shipped == 1)
                                    {{--                {!! Form::open(['url'=>surl('shopOrders/'.$order->id),'method'=>'put']) !!}--}}

                                    {{--{!! Form::open(['url'=>surl('shopOrders/'.$order->id)]) !!}--}}
                                    <div class="row">


                                        <div class="col-md-12">

                                            <div class="form-group">


                                                <button type="button" class="btn btn-success  btn-block " data-toggle="modal" data-target="#modal-sm">
                                                    {{trans('shop.CompleteOrder')}}
                                                </button>
                                                <div class="modal fade" id="modal-sm">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title"> {{ trans('shop.CompleteOrder') }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>{{trans('shop.confirm_order')}}: <strong class="text-danger">{{$order->id}}</strong></p>
                                                                {!! Form::open(['url'=>surl('shopOrders/'.$order->id),'method'=>'put']) !!}
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        {{--{!! Form::label('shipped',trans('shop.shipped')) !!}--}}
                                                                        {!! Form::hidden('shipped',$order->shipped,['class'=>'form-control ']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">

                                                                    <div class="col-md-6">
                                                                <button type="button" class="btn btn-dark btn-block" data-dismiss="modal">{{trans('shop.close')}}</button>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                {!! Form::submit(trans('shop.CompleteOrder'),['class'=>'btn btn-success  btn-block']) !!}
                                                                {!! Form::close() !!}

                                                                    </div>


                                                                {{--<button type="submit" class="btn btn-success btn-block">{{trans('shop.CompleteOrder')}}</button>--}}
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->




                                            </div>
                                        </div>

                                    </div>

                                    @elseif($order->shipped == 2 )

                                    <div class="badge badge-success">
                                        <h5><i class="fa fa-shipping-fast"></i>
                                            {{trans('shop.orderStep2')}}
                                        </h5>
                                    </div>

                                    @elseif($order->shipped == 3 )
                                    <div class="badge badge-success">
                                        <h5><i class="fa fa-shipping-fast"></i>
                                            {{trans('shop.orderStep2')}}
                                        </h5>
                                    </div>
                                    @elseif($order->shipped == 4 )
                                    <div class="badge badge-success">
                                        <h5><i class="fa fa-shipping-fast"></i>
                                            {{trans('shop.orderStep2')}}
                                        </h5>
                                    </div>
                                    @elseif($order->shipped == 5 )
                                    <div class="badge badge-info">
                                        <h5><i class=" fa fa-shopping-bag"></i>
                                            {{trans('shop.orderStep4')}}
                                        </h5>
                                    </div>
                                    @elseif($order->shipped == 6 )
                                    <div class="badge badge-secondary">
                                        <h5>
                                            <i class="fas fa-window-close"></i>
                                            {{trans('shop.orderStep7')}}
                                        </h5>
                                    </div>

                                @else
                                    <span>postponed</span>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>


                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('shop.sizes')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
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
                        <div class="card card-outline card-info">
                            {{-- <div class="card-header">
                                <h3 class="card-title">{{trans('shop.colors')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div> --}}
                            <!-- /.card-header -->
                            <div class="card-body">


                                <table class="table table-striped table-valign-middle text-center table-bordered">
                                    <thead>
                                    <tr>

                                        <th> {{trans('shop.color')}}</th>
                                        <th>{{session('lang')== 'ar'? $order->product->color->name_ar:$order->product->color->name_en}}</th>

                                    </tr>
                                    </thead>
                                    <tbody>



                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title">{{trans('shop.orders')}}</h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">





                                </table>
                                <table class="table table-striped table-inverse text-center ">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('shop.product_title') }}</th>
                                            <th>{{ trans('shop.product_prices') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (\App\Models\OrderProduct::where('order_id',$order->order_id)->get() as $item )
                                            <tr>
                                                <td scope="row">{{ $loop->iteration}}</td>
                                                <td>{{ $item->product->title }}</td>
                                                <td>{{ presentPrice($item->price) }}</td>
                                            </tr>
                                            @endforeach


                                        </tbody>

                                        <tfoot>
                                            <tr>
                                              <td colspan="2">{{ trans('user.subtotal') }}</td>
                                              <td>{{ presentPrice($order->order->billing_subtotal )}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">{{ trans('user.delivery') }}</td>
                                                <td>{{ presentPrice($order->order->billing_delivery )}}</td>
                                            </tr>
                                            @if ($order->order->billing_discount_code !== null and $order->order->billing_discount > 0 )
                                            <tr>
                                              <td colspan="2">{{ trans('user.discount') }}</td>
                                              <td>{{ presentPrice($order->order->billing_discount)}}</td>
                                            </tr>

                                            @endif

                                              <tr>
                                                <td colspan="2">{{ trans('user.total') }}</td>
                                                <td>{{ presentPrice($order->order->billing_total)}}</td>
                                              </tr>

                                        </tfoot>


                                </table>
                                @if ($order->order->billing_discount_code !== null and $order->order->billing_discount > 0 )
                                <div class="alert alert-warning" role="alert">
                                  <h4 class="alert-heading">{{ trans('shop.note') }}</h4>
                                  <h5>
                                      {{ trans('shop.coupon_notes') }}
                                  </h5>
                                  <p class="mb-0"></p>
                                </div>
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
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
         <div class="row">
             <div class="col-12 col-sm-2">
                 <div class="info-box bg-warning">
                     <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">{{trans('shop.order_id')}}</span>
                         <span class="info-box-number">{{$order->id}}</span>
                     </div>
                 </div>
             </div>
             <div class="col-12 col-sm-2">
                 <div class="info-box bg-warning">
                     <span class="info-box-icon"><i class="far fa-user"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">{{trans('shop.customer_name')}}</span>
                         <span class="info-box-number">{{$order->order->billing_name}}</span>
                     </div>
                 </div>

             </div>

             <div class="col-12 col-sm-2">
                 <div class="info-box bg-warning">
                     <span class="info-box-icon"><i class="fa fa-money-bill-alt"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">{{trans('shop.order_price')}}</span>
                         <span class="info-box-number">{{presentPrice($order->price)}}</span>
                     </div>
                 </div>

             </div>
             <div class="col-12 col-sm-2">
                 <div class="info-box bg-warning">
                     <span class="info-box-icon"><i class="fa fa-list-alt"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">{{trans('shop.order_status')}}</span>
                             @if ($order->shipped == 0)
                                <span class="info-box-number">
                                     {{trans('shop.orderStep')}}
                                </span>
                             @elseif($order->shipped == 1)
                                <span class="info-box-number">
                                    {{trans('shop.orderStep1')}}
                                </span>
                             @elseif($order->shipped == 2 )
                                <span class="info-box-number">
                                    {{trans('shop.orderStep2')}}
                                </span>
                             @elseif($order->shipped == 3 )
                                <span class="info-box-number">
                                    {{trans('shop.orderStep2')}}
                                </span>

                            @elseif($order->shipped == 4 )
                                <span class="info-box-number">
                                    {{trans('shop.orderStep2')}}
                                </span>
                            @elseif($order->shipped == 5 )
                                <span class="info-box-number">
                                    {{trans('shop.orderStep4')}}
                                </span>
                            @elseif($order->shipped == 6 )
                                <span class="info-box-number">
                                    {{trans('shop.orderStep7')}}
                                </span>
                            @else
                             no alert
                            @endif








                     </div>
                 </div>

             </div>
             <div class="col-12 col-sm-2">
                 <div class="info-box bg-warning">
                     <span class="info-box-icon"><i class="fa fa-box"></i></span>
                     <div class="info-box-content">
                         <span class="info-box-text">{{trans('shop.product_title')}}</span>
                         <span class="info-box-number">{{$order->product->title}}</span>
                     </div>
                 </div>


             </div>
             <div class="col-12 col-sm-2">
                <div class="info-box bg-warning">
                    <span class="info-box-icon"><i class="fa fa-box"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">{{trans('shop.order_date')}}</span>
                        <span class="info-box-number">{{$order->created_at->format('d-m-yy')}}</span>
                    </div>
                </div>


            </div>
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
