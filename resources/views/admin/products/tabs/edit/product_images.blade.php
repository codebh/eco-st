@push('js')
    <script type="text/javascript">
        var x = 1;
        $(document).on('click', '.add_input1', function () {
            var max_input = 10;

            if (x < max_input) {

                $('.input_tag1').append(
                    '<div class="row">' +
                    '           <div class="col-md-5">' +
                    '               {!! Form::label('input_image',  trans('admin.input_image')) !!}' +
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
    </script>
@endpush

<h3>{{trans('admin.product_media')}}</h3>
<hr>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Bordered Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class=" table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">type</th>
                                <th scope="col">image</th>
                                <th scope="col">action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Main Image</td>
                                <td><img src="{{asset('img/theme/products/'.$product->main_image)}}" style="height: 200px;" alt="..." class="img-thumbnail"></td>
                                <td>
                                    <a href="{{route('delete.single.image',$product->id)}}" type="submit" class="btn btn-primary btn-lg btn-block">X</a>


                                </td>
                            </tr>

                                @foreach($product->image_data()->get() as $image)
                            <tr>
                                <th scope="row">1</th>
                                <td>Other image Image</td>
                                <td>
                                        <img src="{{asset('img/theme/products/'.$image->image_key)}}" style="height: 200px;" alt="..." class="img-thumbnail">
                                </td>





                                <td>
                                    <a href="{{route('delete.single.image',$image->id)}}" type="submit" class="btn btn-primary btn-lg btn-block">X</a>


                                </td>
                            </tr>
                                @endforeach



                            </tbody>
                        </table>

{{--                            <table class="table table-bordered">--}}

{{--                                <thead>--}}
{{--                                <tr>--}}

{{--                                    <th class="text-center">image</th>--}}
{{--                                    @foreach($product->image_data()->get() as $image)--}}
{{--                                        <th class="text-center">--}}
{{--                                            <ul class="users-list clearfix">--}}
{{--                                                <li>--}}
{{--                                                    <img src="{{asset('img/theme/products/'.$image->image_key)}}"--}}
{{--                                                         alt="User Image">--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </th>--}}
{{--                                    @endforeach--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr>--}}
{{--                                    <td>--}}
{{--                                        Action--}}
{{--                                    </td>--}}
{{--                                    @foreach($product->image_data()->get() as $image)--}}


{{--                                        <td>--}}

{{--                                            <a href="{{route('delete.single.image',$image->id)}}" type="submit" class="btn btn-primary btn-lg btn-block">X</a>--}}



{{--                                        </td>--}}

{{--                                    @endforeach--}}
{{--                                </tr>--}}


{{--                                </tbody>--}}
{{--                            </table>--}}


                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->

            </div>

        </div>


    </div><!-- /.container-fluid -->
</section>

<!-- /.content -->
<div class=" input_tag1 col-md-12">

{{--    @foreach($product->image_data()->get() as $image)--}}

{{--        <div class="row">--}}
{{--            <div class="col-md-5">--}}
{{--                {!! Form::label('input_image',  trans('admin.input_key')) !!}--}}
{{--                --}}{{--            {!! Form::text('input_image[]',$image->image_key, ['class' => 'form-control']) !!}--}}
{{--                --}}{{--            {!! Form::file($image->image_key, ['class' => 'form-control']) !!}--}}
{{--                <input type="file" class="form-control" value="{{old(asset('storage/product/'.$image->image_key))}}">--}}
{{--            </div>--}}
{{--            <div class="col-md-5">--}}
{{--                <img src="{{asset('storage/product/'.$image->image_key)}}" class="img-fluid" alt="">--}}
{{--            </div>--}}

{{--            <a href="#" class="remove_input1 btn btn-danger "><i class="fa fa-trash"></i></a>--}}
{{--        </div>--}}
{{--    @endforeach--}}
</div>

<a href="#" class="add_input1 btn btn-info"><i class="fa fa-plus"></i></a>
