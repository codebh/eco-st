@extends('admin.index')
@section('content')

<style>
    .products-list .product-img{
        float: {{session('lang')=='ar'? 'right':'left'}};
    }
    .float-right{
        float: {{session('lang')=='ar'? 'left':'right'}} !important;
    }
    </style>

    <section class="content">
        <div class="row">
            <div class="col-12">
                {!! Form::open(['url'=>aurl('orderProduct/'.$order->id),'method'=>'put']) !!}

                <div class="card">
                    <div class="card-header bg-primary">
                        {{trans('admin.orderDetails')}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_name')) !!}
                                    {!! Form::text('billing_name',$order->billing_name,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_email')) !!}
                                    {!! Form::text('billing_email',$order->billing_email,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.user_id')) !!}
                                    {!! Form::text('billing_email',$order->user->name,['class'=>'form-control','disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div class="card">
                    <div class="card-header bg-primary">
                          {{trans('admin.address')}}
                    </div>
                    <div class="card-body">


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_country')) !!}
                                    {!! Form::text('billing_country',$order->billing_country,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_city')) !!}
                                    {!! Form::text('billing_city',$order->billing_city,['class'=>'form-control']) !!}
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_phone')) !!}
                                    {!! Form::text('billing_phone',$order->billing_phone,['class'=>'form-control']) !!}
                                </div>

                            </div>
                        </div>


                <div class="card">
                    <div class="card-body">
                    <blockquote class="blockquote">
                        <p>
                            {{trans('admin.address_bahrain')}}
                        </p>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('billing_buliding',trans('admin.billing_buliding')) !!}
                                    {!! Form::text('billing_buliding',$order->billing_buliding,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('billing_road',trans('admin.billing_road')) !!}
                                    {!! Form::text('billing_road',$order->billing_road,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('billing_block',trans('admin.billing_block')) !!}
                                    {!! Form::text('billing_block',$order->billing_block,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_speical_direcstions')) !!}
                                    {!! Form::text('billing_speical_direcstions',$order->billing_speical_direcstions,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </blockquote>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <blockquote class="blockquote">
                        <p>                          {{trans('admin.address_out_bahrain')}}        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('billing_address',trans('admin.billing_address')) !!}
                                    {!! Form::text('billing_address',$order->billing_address,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('billing_address2',trans('admin.billing_address2')) !!}
                                    {!! Form::text('billing_address2',$order->billing_address2,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('billing_province',trans('admin.billing_province')) !!}
                                    {!! Form::text('billing_province',$order->billing_province,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    {!! Form::label('billing_postalcode',trans('admin.billing_postalcode')) !!}
                                    {!! Form::text('billing_postalcode',$order->billing_postalcode,['class'=>'form-control']) !!}
                                </div>

                            </div>

                        </div>
                    </blockquote>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header bg-warning">
                        {{trans('admin.payments')}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_discount',trans('admin.billing_discount')) !!}
                                    {!! Form::text('billing_discount',$order->billing_discount,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_discount_code',trans('admin.billing_discount_code')) !!}
                                    {!! Form::text('billing_discount_code',$order->billing_discount_code,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_subtotal',trans('admin.billing_subtotal')) !!}
                                    {!! Form::text('billing_subtotal',$order->billing_subtotal,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_tax',trans('admin.billing_tax')) !!}
                                    {!! Form::text('billing_tax',$order->billing_tax,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_delivery',trans('admin.billing_delivery')) !!}
                                    {!! Form::text('billing_delivery',$order->billing_delivery,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_total',trans('admin.billing_total')) !!}
                                    {!! Form::text('billing_total',$order->billing_total,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                      <div class="card-body">
                        <blockquote class="blockquote">
{{--                          <p>رقم الطلب والتاكيد</p>--}}

                          <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('payment_gateway',trans('admin.payment_gateway')) !!}
                                    {!! Form::text('payment_gateway',$order->payment_gateway,['class'=>'form-control']) !!}


                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('transactionId',trans('admin.transactionId')) !!}
                                    {!! Form::text('transactionId',$order->transactionId,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('invoice_id',trans('admin.invoice_id')) !!}
                                    {!! Form::text('invoice_id',$order->invoice_id,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('shipped',trans('admin.shipped')) !!}
                                    {!! Form::text('shipped',$order->shipped,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('confirm',trans('admin.confirm')) !!}
                                    {!! Form::text('confirm',$order->confirm,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('error',trans('admin.error')) !!}
                                    {!! Form::text('error',$order->error,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>
                        </blockquote>
                      </div>
                    </div>
                </div>

                {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}

             </div>

    </div>









{{--

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
            {!! Form::open(['url'=>aurl('orderProduct/'.$order->id),'method'=>'put']) !!}
                        <h2 class="text-center">  العنوان</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_name')) !!}
                                    {!! Form::text('billing_name',$order->billing_name,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_email')) !!}
                                    {!! Form::text('billing_email',$order->billing_email,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_city')) !!}
                                    {!! Form::text('billing_city',$order->billing_city,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_province')) !!}
                                    {!! Form::text('billing_province',$order->billing_province,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_postal')) !!}
                                    {!! Form::text('billing_postalcode',$order->billing_postalcode,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_phone')) !!}
                                    {!! Form::text('billing_phone',$order->billing_phone,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.billing_address')) !!}
                                    {!! Form::text('billing_address',$order->billing_address,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>


                        <hr>
                        <h2 class="text-center">المقاسات</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.size1')) !!}
                                    {!! Form::text('size1',$order->size1,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.size2')) !!}
                                    {!! Form::text('size2',$order->size2,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.size3')) !!}
                                    {!! Form::text('size3',$order->size3,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.size4')) !!}
                                    {!! Form::text('size4',$order->size4,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.size5')) !!}
                                    {!! Form::text('size5',$order->size5,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('city_name_ar',trans('admin.size6')) !!}
                                    {!! Form::text('size6',$order->size6,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>
                        <hr>
                        <h2 class="text-center"> المدفوعات</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_discount',trans('admin.billing_discount')) !!}
                                    {!! Form::text('billing_discount',$order->billing_discount,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_discount_code',trans('admin.billing_discount_code')) !!}
                                    {!! Form::text('billing_discount_code',$order->billing_discount_code,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_subtotal',trans('admin.billing_subtotal')) !!}
                                    {!! Form::text('billing_subtotal',$order->billing_subtotal,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_tax',trans('admin.billing_tax')) !!}
                                    {!! Form::text('billing_tax',$order->billing_tax,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_delivery',trans('admin.billing_delivery')) !!}
                                    {!! Form::text('billing_delivery',$order->billing_delivery,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('billing_total',trans('admin.billing_total')) !!}
                                    {!! Form::text('billing_total',$order->billing_total,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>
                        <hr>
                        <h2 class="text-center">  التاكيد</h2>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('payment_gateway',trans('admin.payment_gateway')) !!}
                                    {!! Form::text('payment_gateway',$order->payment_gateway,['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {!! Form::label('confirm',trans('admin.confirm')) !!}
                                    {!! Form::text('confirm',$order->confirm,['class'=>'form-control']) !!}
                                </div>
                            </div>

                        </div>




            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col --> --}}
        {{-- </div> --}}
        <!-- /.row -->


        <div class="row">
            <div class="col">
                <!-- PRODUCT LIST -->
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">{{trans('admin.products')}}</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button> --}}
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                      @foreach (\App\Models\OrderProduct::where('order_id',$order->id)->get() as $item)

                          <li class="item">
                            <div class="product-img">
                              <img src="{{imageDo($item->product->main_image)}}" alt="Product Image" class="img-size-50">
                            </div>
                            <div class="product-info">
                              <a href="javascript:void(0)" class="product-title">{{$item->product->title}}
                                <span class="badge badge-warning float-right">{{presentPrice($item->price)}}</span></a>
                              <span class="product-description">
                                {{$item->color}}
                              </span>
                            </div>
                          </li>
                      @endforeach


                  </ul>
                </div>
                <!-- /.card-body -->

                <!-- /.card-footer -->
              </div
            </div>
        </div>
    </section>
    <!-- /.content -->





@endsection
