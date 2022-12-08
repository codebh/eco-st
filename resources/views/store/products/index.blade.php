@extends('store.index')
@push('js')

    <script>

         // $(document).ready(function () {
         //     $.viewMap = {
         //         '0': $([]),
         //         'category-1': $('#category-1'),
         //         'category-2': $('#category-2'),
         //         'category-3': $('#category-3'),
         //         'category-4': $('#category-4'),
         //         'category-5': $('#category-5'),
         //         'category-6': $('#category-6'),
         //         'category-7': $('#category-7'),
         //         'category-8': $('#category-8'),
         //         'category-9': $('#category-9'),
         //     };
         //     $('#category-1').hide();
         //     $('#category-2').hide();
         //     $('#category-3').hide();
         //     $('#category-4').hide();
         //     $('#category-5').hide();
         //     $('#category-6').hide();
         //     $('#category-7').hide();
         //     $('#category-8').hide();
         //     $('#category-9').hide();
         //
         //     $('#viewSelector').change(function () {
         //         // hide all
         //         $.each($.viewMap, function () {
         //             this.hide();
         //         });
         //         // show current
         //         $.viewMap[$(this).val()].show();
         //     });
         // });


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

    <!-- /.col -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Products</h3>

                <div class="card-tools">
                    {!! $products->links() !!}
{{--                    <ul class="pagination pagination-sm float-right">--}}
{{--                        --}}
{{--                        {{}}--}}
{{--                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
{{--                    </ul>--}}
                </div>
            </div>
            <!-- /.card-header -->




            <div class="card-body p-0 table-responsive ">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
{{--                        <th style="width: 40px">Label</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $product)

                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title}}</td>
                            <td>{{$product->category->name_ar}}</td>
                            <td>{{presentPrice($product->price)}}</td>
{{--                            <td>--}}
{{--                                <div class="progress progress-xs">--}}
{{--                                    <div class="progress-bar progress-bar-danger" style="width: 55%"></div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
                            @if ($product->show == 'active')

                            <td><span class="badge bg-success">Approve</span></td>
                            @elseif($product->show == 'not active')
                            <td><span class="badge bg-warning">Pending</span></td>

                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No products</td>


                        </tr>
                    @endforelse


                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->



@endsection
