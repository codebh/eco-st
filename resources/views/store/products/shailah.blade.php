@extends('store.index')
@push('js')
    <script>
        var x =1;
        $(document).on('click','.add_input1',function () {

            var max_input =5;

            if (x<max_input){

                $('.input_tag1').append(

                    '<div class="row mt-3">' +
                    '           <div class="col-10">' +
                    {{--                    '               {!! Form::label('input_image',  trans('admin.input_image')) !!}' +--}}
                        '               {!! Form::file('input_image[]', ['class' => 'form-control']) !!}' +
                    '           </div>' +
                    '        <a href="#" class="remove_input1 btn btn-danger"><i class="fa fa-trash"></i></a>' +
                    '    </div>'
                );
                x++;

            }
            return false;
        });
        $(document).on('click','.remove_input1',function () {
            $(this).parent('div').remove();
            x--;
            return false;
        });
    </script>
@endpush
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{trans('shop.add_product')}} {{$category_master->name_en }}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
 {!! Form::open(['route' => 'add_product.store', 'method' => 'post','files'=>'true']) !!}
    {{csrf_field()}}
    <!-- general form elements disabled -->
    <div class="card card-outline card-info">
        <div class="card-header">
            <h3 class="card-title">تفاصيل المنتج</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title',trans('admin.product_title')) !!}
                        {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>trans('admin.product_title')]) !!}
                    </div>
                </div>
            </div>
            <input type="text" name="category_id" class="form-control" value="{{$category_master->id}}" placeholder="Enter ..."
                   hidden>
            <input type="text" name="store_id" class="form-control" value="{{store()->user()->id}}" placeholder="Enter ..."
                   hidden>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('content',trans('admin.product_content')) !!}
                        {!! Form::textarea('content',old('content'),['id'=>'summernote','class'=>'form-control','placeholder'=>trans('admin.product_content')]) !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">ااسعار المنتج </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('price',trans('admin.price')) !!}
                        {!! Form::text('price',old('price'),['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('price_offer',trans('admin.price_offer')) !!}
                        {!! Form::text('price_offer',old('price_offer'),['class'=>'form-control','placeholder'=>trans('admin.price_offer')]) !!}
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {!! Form::label('status',trans('admin.status')) !!}
                        {!! Form::select('status',
                        ['not active'=>trans('admin.not active'),'active'=>trans('admin.active')]
                        ,old('status'),['class'=>'form-control status','placeholder'=>trans('admin.status')]) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        {{Form::label('tags', 'tags')}}
                        {!! Form::select('tags[]',App\Models\Tag::pluck('name_ar','id')

                            ,old('tag[]'),['class'=>'form-control select2','multiple'=>'multiple']) !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">الوان المنتج</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        {!! Form::label('color',  trans('admin.Primary_color')) !!}
                        {!! Form::select('color',App\Models\Color::pluck('name_ar','id')

                            ,old('color'),['class'=>'form-control select2']) !!}
                    </div>
                </div>
                <div class="col-3">

                    {!! Form::label('qty', 'Qty', ['class' => 'control-label']) !!}
                    {!! Form::number('qty', old('qty'), ['class' => 'form-control']) !!}
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="">تفعيل المنتج</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" value="active" type="radio" id="activeRadio1" name="show" checked>
                            <label for="activeRadio1" class="custom-control-label">  <h4>تفعيل المنتج</h4> </label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" value="not active" type="radio" id="activeRadio2" name="show" >
                            <label for="activeRadio2" class="custom-control-label"><h4>غير مفعل</h4></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">صور المنتج </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    {!! Form::label('Main image', 'Main image', ['class' => 'control-label']) !!}
                    {!! Form::file('main_image', ['class' => 'form-control']) !!}
                </div>
            </div>
            <br>
            <div class=" input_tag1 col-md-12">
                <div class="row">
                    <div class="col-10">
                        {{--                        {!! Form::label('input_image',  trans('admin.input_image', ['class'=>'custom-file-label'])) !!}--}}
                        {!! Form::file('input_image[]', ['class' => 'form-control']) !!}
                    </div>

                    <a href="#" class="remove_input1 btn btn-danger "><i class="fa fa-trash"></i></a>
                </div>
            </div>
            <br>
            <div class="row">

                <a href="#" class="add_input1 btn btn-primary btn-block"><i class="fa fa-plus"></i></a>
            </div>

        </div>
        <!-- /.card-body -->
    </div>

 <button type="submit" class="btn btn-success btn-rounded btn-block">{{trans('shop.add_new_product')}}</button>
 <br>
 {!! Form::close() !!}



@endsection
