@extends('store.index')
@push('js')
    <script>
        var x = 1;
        $(document).on('click', '.add_input1', function () {

            var max_input = 5;

            if (x < max_input) {

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
        $(document).on('click', '.remove_input1', function () {
            $(this).parent('div').remove();
            x--;
            return false;
        });
        var y = 1;
        $(document).on('click', '.add_input2', function () {

            var max_input = 5;

            if (y < max_input) {

                $('.input_tag2').append(
                    '<div class="row">' +
                    '           <div class="col-md-5">' +
                    '               {!! Form::label('size',  trans('shop.size')) !!}' +
                    '               {{ Form::select('size[]', App\Models\Size::pluck('name','name'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}' +
                    '           </div>' +
                    '           <div class="col-md-5">' +
                    '               {!! Form::label('size qty',  trans('shop.qty')) !!}' +
                    '               {!! Form::number('size_qty[]','', ['class' => 'form-control']) !!}' +
                    '           </div>' +
                    '        <a href="#" class="remove_input2 btn btn-danger"><i class="fa fa-trash"></i></a>' +
                    '    </div>'

                );
                y++;

            }
            return false;
        });
        $(document).on('click', '.remove_input2', function () {
            $(this).parent('div').remove();
            y--;
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
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">{{trans('shop.product_content')}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            {{--<div class="row">
                <div class="col-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title',trans('shop.title')) !!}
                        <input type="text" class="form-control" placeholder="only english" name="title" value="{{old('title')}}" onkeypress="return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122) || (event.charCode >= 48 && event.charCode <= 57)">
                    </div>
                </div>--}}

            </div>
            <input type="text" name="category_id" class="form-control" value="{{$category_master->id}}"
                   placeholder="Enter ..."
                   hidden>
            <input type="text" name="store_id" class="form-control" value="{{store()->user()->id}}"
                   placeholder="Enter ..."
                   hidden>
            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
{{--                    <textarea id="summernote">--}}
{{--                Place <em>some</em> <u>text</u> <strong>here</strong>--}}
{{--              </textarea>--}}
                    <div class="form-group">
                        {!! Form::label('content',trans('admin.product_content')) !!}
                        {!! Form::textarea('content',old('content'),['id'=>'summernote','class'=>'form-control bg-light','placeholder'=>trans('admin.product_content')]) !!}
                    </div>
                </div>
            </div>


        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{trans('shop.product_prices')}}</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('price',trans('shop.price')) !!}
                        {!! Form::text('price',old('price'),['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('price_offer',trans('shop.price_offer')) !!}
                        {!! Form::text('price_offer',old('price_offer'),['class'=>'form-control','placeholder'=>trans('admin.price_offer')]) !!}
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {!! Form::label('status',trans('shop.status')) !!}
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


                        {!! Form::select('tags[]',App\Models\Tag::pluck(session('lang')== 'ar'?'name_ar':'name_en','id')

                            ,old('tag[]'),['class'=>'form-control select2','multiple'=>'multiple']) !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
   @if ($category_master->id == 1)
       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">{{trans('shop.product_color')}}</h3>
           </div>
           <div class="card-body">

               <div class="row">
                   <div class="col-md-3">
                       <div class="form-group">
                           {!! Form::label('color',  trans('admin.product_colors_A')) !!}
                           {!! Form::select('color',App\Models\Color::pluck(session('lang')== 'ar'?'name_ar':'name_en','id')

                               ,old('color'),['class'=>'form-control select2',]) !!}
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label for="">{{trans('shop.active_show')}}</label>
                           {{--                            @if ($product->show =='active')--}}
                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger" value="active" type="radio" id="activeRadio1" name="show" >
                               <label for="activeRadio1" class="custom-control-label">  <h4>{{trans('shop.yes')}}</h4> </label>
                           </div>


                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger" value="not active" type="radio" id="activeRadio2" name="show"  >
                               <label for="activeRadio2" class="custom-control-label"><h4>{{trans('shop.no')}}</h4></label>
                           </div>

                       </div>


                   </div>
                   <div class="col-md-3">

                       <div class="form-group">
                           <label for="">{{trans('shop.include_sh_info')}}</label>

                           <div class="custom-control custom-radio">
                               <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="include_shailah" >
                               <label for="customRadio1" class="custom-control-label"> <h4> {{trans('shop.include_sh')}}</h4> </label>
                           </div>

                           <div class="custom-control custom-radio">
                               <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="include_shailah"  >
                               <label for="customRadio2" class="custom-control-label">  <h4>{{trans('shop.not_include_sh')}}</h4> </label>
                           </div>

                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label for=""> {{trans('shop.qty')}}</label>
                           <input type="number" class="form-control" name="qty" value="1">
                       </div>
                   </div>
               </div>
               {{--            <div class="row">--}}
               {{--                <div class="col-12">--}}
               {{--                    <div class="form-group">--}}


               {{--                        {!! Form::label('color',  trans('admin.product_colors_S')) !!}--}}
               {{--                        {!! Form::select('color_key[]',[''=>trans('admin.not active'),App\Models\Color::pluck('name_ar','id')]--}}

               {{--                            ,old('color_key[]'),['class'=>'form-control select2',]) !!}--}}
               {{--                    </div>--}}
               {{--                </div>--}}
               {{--            </div>--}}

           </div>
           <!-- /.card-body -->
       </div>


       @elseif ($category_master->id == 2)
       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">{{trans('shop.product_color')}}</h3>
           </div>
           <div class="card-body">


               <div class="row">
                   <div class="col-md-6">
                       <div class="form-group">
                           {!! Form::label('color',  trans('admin.product_colors_A')) !!}
                           {!! Form::select('color',App\Models\Color::pluck(session('lang')== 'ar'?'name_ar':'name_en','id')

                               ,old('color'),['class'=>'form-control select2',]) !!}
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="form-group">
                           <label for="">{{trans('shop.active_show')}}</label>
                           {{--                            @if ($product->show =='active')--}}
                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger" value="active" type="radio" id="activeRadio1" name="show" >
                               <label for="activeRadio1" class="custom-control-label">  <h4>{{trans('shop.yes')}}</h4> </label>
                           </div>


                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger" value="not active" type="radio" id="activeRadio2" name="show"  >
                               <label for="activeRadio2" class="custom-control-label"><h4>{{trans('shop.no')}}</h4></label>
                           </div>

                       </div>


                   </div>

                   <div class="col-md-3">
                       <div class="form-group">
                           <label for=""> {{trans('shop.qty')}}</label>
                           <input type="number" class="form-control" name="qty" value="1">
                       </div>
                   </div>
               </div>


           </div>
           <!-- /.card-body -->
       </div>

   @else

       <div class="card card-info">
           <div class="card-header">
               <h3 class="card-title">{{trans('shop.product_color')}}</h3>
           </div>
           <div class="card-body">

               <div class="row">
                   <div class="col-md-8">
                       <div class="form-group">
                           {!! Form::label('color',  trans('admin.product_colors_A')) !!}
                           {!! Form::select('color',App\Models\Color::pluck(session('lang')== 'ar'?'name_ar':'name_en','id')

                               ,old('color'),['class'=>'form-control select2',]) !!}
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label for="">{{trans('shop.active_show')}}</label>
                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger" value="active" type="radio" id="activeRadio1" name="show" >
                               <label for="activeRadio1" class="custom-control-label">  <h4>{{trans('shop.yes')}}</h4> </label>
                           </div>
                           <div class="custom-control custom-radio">
                               <input class="custom-control-input custom-control-input-danger" value="not active" type="radio" id="activeRadio2" name="show" >
                               <label for="activeRadio2" class="custom-control-label"><h4>{{trans('shop.no')}}</h4></label>
                           </div>

                       </div>


                   </div>



           </div>
           <!-- /.card-body -->
       </div>
       <div class="card card-danger">
           <div class="card-header">
               <h3 class="card-title">{{trans('shop.sizes')}}</h3>
           </div>
           <div class="card-body">
               <div class="row">
                   <div class="col-12">
                       <div class="form-group">
                           <label>{{trans('shop.size_guide')}}</label>
                           <input type="file" name="size_chart" class="form-control" value="{{old('size_chart')}}">
                       </div>
                   </div>


               </div>

               <div class=" input_tag2 col-md-12">
                   <div class="row">
                       <div class="col-md-5">
                           {!! Form::label('size',  trans('shop.size')) !!}
                           {{ Form::select('size[]', App\Models\Size::pluck('name','name'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}

                           {{--               {!! Form::text('input_key[]','', ['class' => 'form-control']) !!}--}}
                       </div>
                       <div class="col-md-5">
                           {!! Form::label('size_qty',  trans('shop.qty')) !!}
                           {!! Form::number('size_qty[]','', ['class' => 'form-control']) !!}
                       </div>
                       <a href="#" class="remove_input2 btn btn-danger"><i class="fa fa-trash"></i></a>
                   </div>
               </div>
               {{--            <div class=" input_tag2 ">--}}
               {{--                <div class="row">--}}
               {{--                    <div class="col-4">--}}
               {{--                        <div class="form-group">--}}
               {{--                            <label>المقاسات </label>--}}

               {{--                            <select name="size" id="" class="form-control select2">--}}
               {{--                                @forelse (App\Models\Size::all() as $item)--}}
               {{--                                    <option value="{{$item->name}}">{{$item->name}}</option>--}}
               {{--                                @empty--}}
               {{--                                    <option>No Size</option>--}}
               {{--                                @endforelse--}}
               {{--                            </select>--}}
               {{--                        </div>--}}

               {{--                    </div>--}}
               {{--                    <div class="col-4">--}}
               {{--                        <div class="form-group">--}}
               {{--                            <label>الكمية</label>--}}

               {{--                            <input type="number" name="size_qty" class="form-control" value="{{old('size_qty')}}">--}}
               {{--                        </div>--}}
               {{--                    </div>--}}
               {{--                </div>--}}



               {{--                        <a href="#" class="remove_input2 btn btn-danger "><i class="fa fa-trash"></i></a>--}}

               {{--            </div>--}}
               <div class="row">
                   <a href="#" class="add_input2 btn "><i class="fa fa-plus"></i></a>
               </div>
               <!-- /.card-body -->
           </div>
       </div>

   @endif

    <!-- /.card -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{trans('shop.product_image')}}</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <label for="">{{trans('shop.main_image')}}</label>
                    {!! Form::file('main_image', ['class' => 'form-control']) !!}
                </div>
            </div>
            <br>
            <div class=" input_tag1 col-md-12">
                <div class="row">
                    <div class="col-10">
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
