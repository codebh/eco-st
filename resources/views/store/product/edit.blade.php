@extends('store.index')
@push('js')
    {{-- <script>
        var x = 1;
        $(document).on('click', '.add_input1', function () {

            var max_input = 5;

            if (x < max_input) {

                $('.input_tag1').append(
                    '<div class="row mt-3">' +
                    '           <div class="col-10">' +

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



        // $('[data-toggle="switch"]').bootstrapSwitch();




    </script> --}}

    {{-- <script>
        var y = 1;
        $(document).on('click', '.add_input2', function () {

            var max_input = 5;

            if (y < max_input) {

                $('.input_tag2').append(


                        '<div class="row mt-4">' +
                        '           <div class="col-md-5">' +

                        '               {{ Form::select('size[]', App\Models\Size::pluck('name','id'), null, array('class'=>'form-control', 'placeholder'=>'Please select ...')) }}' +
                        '           </div>' +
                        '           <div class="col-md-5">' +




                        '<select class="form-control" name="size_qty[]" >'+
                            '@for ($i = 1; $i < 21; $i++)'+
                            '<option value="{{ $i }}">{{ $i }}</option>'+
                           ' @endfor'+
                        '</select>'+
                        '           </div>' +
                        '        <a href="#" class="remove_input2 btn btn-danger"><i class="fa fa-trash"></i></a>' +
                        '</div>'


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
    </script> --}}

@endpush
@section('content')

  @livewire('store.edit-product-full', ['post' => $product])
  @livewire('store.edit-product', ['post' => $product])

  @livewire('store.main-image',['post' => $product])
  @livewire('store.other-image',['post' => $product])




    {{-- {!! Form::open(['url'=>surl('showShop/'.$product->id),'method'=>'put','files'=>true]) !!}
@csrf


    <!-- general form elements disabled -->
    <div class="card card-info card-outline">
        <div class="card-header">
            <h3 class="card-title">{{trans('shop.product_content')}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('title',trans('shop.title')) !!}
                        {!! Form::text('title',$product->title, array('disabled' => 'disabled','class'    =>'form-control')) !!}



                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <!-- text input -->
                    <div class="form-group">
                        {!! Form::label('content',trans('shop.content')) !!}
                        {!! Form::textarea('content',$product->content,['id'=>'summernote','class'=>'form-control','placeholder'=>trans('shop.content')]) !!}
                    </div>
                </div>
            </div>


        </div>
        <!-- /.card-body -->
    </div> --}}
    <!-- /.card -->
    {{-- <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">{{trans('shop.product_prices')}} </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <input type="text" name="category_id" value="{{$product->category_id}}" hidden >
                <input type="text" name="store_id" value="{{$product->store_id}}" hidden >
                <div class="col-3">
                    <div class="form-group">
                        {!! Form::label('price',trans('shop.price')) !!}
                        {!! Form::text('price',$product->price,['class'=>'form-control','placeholder'=>trans('shop.price')]) !!}
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('price_offer',trans('shop.price_offer')) !!}
                        {!! Form::text('price_offer',$product->price_offer,['class'=>'form-control','placeholder'=>trans('shop.price_offer')]) !!}
                    </div>
                </div>
                <div class="col-5">
                    <div class="form-group">
                        {!! Form::label('status',trans('shop.status')) !!}
                        {!! Form::select('status',
                        ['not active'=>trans('shop.not active'),'active'=>trans('shop.active')]
                        ,$product->status,['class'=>'form-control status','placeholder'=>trans('shop.status')]) !!}
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card --> --}}


{{--
    @if ($product->category_id ==1)
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">{{trans('shop.product_color')}}</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('color_id',  trans('shop.color')) !!}
                            {!! Form::select('color_id',App\Models\Color::pluck('name_ar','id')

                                ,$product->color_id,['class'=>'form-control select2',]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">{{trans('shop.active_show')}}</label>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-danger" value="active" type="radio" id="activeRadio1" name="show" {{$product->show =='active' ? 'checked': ''}}>
                                <label for="activeRadio1" class="custom-control-label">  <h4>{{trans('shop.yes')}}</h4> </label>
                            </div>


                            <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-danger" value="not active" type="radio" id="activeRadio2" name="show" {{$product->show =='not active' ? 'checked': ''}} >
                                <label for="activeRadio2" class="custom-control-label"><h4>{{trans('shop.no')}}</h4></label>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-3">

                        <div class="form-group">
                            <label for="">{{trans('shop.include_sh_info')}}</label>

                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="1" type="radio" id="customRadio1" name="include_shailah" {{$product->include_shailah =='1' ? 'checked': ''}}>
                                <label for="customRadio1" class="custom-control-label"> <h4> {{trans('shop.include_sh')}}</h4> </label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" value="0" type="radio" id="customRadio2" name="include_shailah" {{$product->include_shailah =='0' ? 'checked': ''}}>
                                <label for="customRadio2" class="custom-control-label">  <h4>{{trans('shop.not_include_sh')}}</h4> </label>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">{{trans('shop.qty')}}</label>
                            <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
                        </div>

                    </div>


            </div>
            <!-- /.card-body -->
        </div>
        @elseif ($product->category_id ==2)
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">{{trans('shop.product_color')}}</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            {!! Form::label('color',  trans('shop.color')) !!}
                            {!! Form::select('color_id',App\Models\Color::pluck('name_ar','id')

                                ,$product->color_id,['class'=>'form-control select2',]) !!}
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">{{trans('shop.color_qty')}}</label>
                            <input type="number" class="form-control" name="qty" value="1">
                        </div>
                    </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">{{trans('shop.active_show')}}</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" value="active" type="radio" id="activeRadio1" name="show" {{$product->show =='active' ? 'checked': ''}}>
                            <label for="activeRadio1" class="custom-control-label">  <h4>{{trans('shop.yes')}}</h4> </label>
                        </div>


                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" value="not active" type="radio" id="activeRadio2" name="show" {{$product->show =='not active' ? 'checked': ''}} >
                            <label for="activeRadio2" class="custom-control-label"><h4>{{trans('shop.no')}}</h4></label>
                        </div>

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
                            {!! Form::label('color',  trans('shop.color')) !!}
                            {!! Form::select('color_id',App\Models\Color::pluck('name_ar','id')

                                ,$product->color_id,['class'=>'form-control select2',]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">{{trans('shop.active_show')}}</label>
                            {{--                            @if ($product->show =='active')--}}
                            {{-- <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-danger" value="active" type="radio" id="activeRadio1" name="show" {{$product->show =='active' ? 'checked': ''}}>
                                <label for="activeRadio1" class="custom-control-label">  <h4>{{trans('shop.yes')}}</h4> </label>
                            </div>


                            <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-danger" value="not active" type="radio" id="activeRadio2" name="show" {{$product->show =='not active' ? 'checked': ''}} >
                                <label for="activeRadio2" class="custom-control-label"><h4>{{trans('shop.no')}}</h4></label>
                            </div>

                        </div> --}}
{{--
                    </div>

                </div>


            </div>
            <!-- /.card-body -->
        </div>
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('shop.product_mag')}}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <img src="{{imageDo($product->size_chart)}}" style="height: 200px;" alt="..." class="img-thumbnail">
                                    <br>
                                    <label>{{trans('shop.sizes')}}</label>

                                    <input type="file" name="size_chart" class="form-control" value="{{old('size_chart')}}">
                                </div>
                            </div>


                        </div>
                        @livewire('store.edit-product', ['post' => $product])



                    </div>
                </div>
    @endif --}}



{{--
    <button type="submit" class="btn btn-success btn-rounded btn-block">{{trans('shop.add_new_product')}}</button>
    <br>
    {!! Form::close() !!} --}}





@endsection
