@extends('admin.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
            {!! Form::open(['url'=>aurl('orders')]) !!}
            <div class="form-group">
            <div class="col-md-6">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
            <div class="col-md-6">
                {!! Form::label('phone',trans('admin.phone')) !!}
                {!! Form::text('phone',old('phone'),['class'=>'form-control']) !!}
            </div>
            </div>
            <div class="form-group">
                <div class="col-md-6">
                    {!! Form::label('store_id',trans('admin.shop_id')) !!}
                    {!! Form::select('store_id',App\Models\Store::pluck('name','id'),old('store_id'),['class'=>'form-control','placeholder'=>trans('admin.select')]) !!}
                </div>
                <div class="col-md-6">
                    {!! Form::label('product_id',trans('admin.product_id')) !!}
                    {!! Form::select('product_id',App\Models\Product::pluck('title','id'),old('product_id'),['class'=>'form-control','placeholder'=>trans('admin.select')]) !!}
                </div>
              </div>
            <div class="clearfix"></div>
            <div class="form-group">
                <div class="col-md-2">
                    {!! Form::label('size1',trans('admin.size1')) !!}
                    {!! Form::text('size1',old('size1'),['class'=>'form-control']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::label('size2',trans('admin.size2')) !!}
                    {!! Form::text('size2',old('size2'),['class'=>'form-control']) !!}
                </div>
                <div class="col-md-2">
                    {!! Form::label('size3',trans('admin.size3')) !!}
                    {!! Form::text('size3',old('size3'),['class'=>'form-control']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::label('size4',trans('admin.size4')) !!}
                    {!! Form::text('size4',old('size4'),['class'=>'form-control']) !!}
                </div>
                <div class="col-md-2">
                    {!! Form::label('size5',trans('admin.size5')) !!}
                    {!! Form::text('size5',old('size5'),['class'=>'form-control']) !!}
                </div>
              </div>
            <div class="form-group">
                {!! Form::label('address',trans('admin.address')) !!}
                {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    {!! Form::label('color',trans('admin.color')) !!}
                    {!! Form::text('color',old('color'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('price',trans('admin.price')) !!}
                    {!! Form::text('price',old('price'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('order_date',trans('admin.order_date')) !!}
                    {!! Form::text('order_date',old('order_date'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('state',trans('admin.state')) !!}
                    {!! Form::text('state',old('state'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    {!! Form::label('delivery_comp',trans('admin.delivery_comp')) !!}
                    {!! Form::text('delivery_comp',old('delivery_comp'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-4">
                    {!! Form::label('delivery_date',trans('admin.delivery_date')) !!}
                    {!! Form::text('delivery_date',old('delivery_date'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-4">
                    {!! Form::label('delivery_charge',trans('admin.delivery_charge')) !!}
                    {!! Form::text('delivery_charge',old('delivery_charge'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3">
                    {!! Form::label('present',trans('admin.present')) !!}
                    {!! Form::text('present',old('present'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('my_price',trans('admin.my_price')) !!}
                    {!! Form::text('my_price',old('my_price'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('sub_price',trans('admin.sub_price')) !!}
                    {!! Form::text('sub_price',old('sub_price'),['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-3">
                    {!! Form::label('user_id',trans('admin.user_id')) !!}
                    {!! Form::text('user_id',old('user_id'),['class'=>'form-control']) !!}
                </div>
            </div>


            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->




@endsection
