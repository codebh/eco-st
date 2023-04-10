@extends('store.index')
@section('content')


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->

        <div class="card card-solid">
            <div class="card-body">
                {{-- <h1>  المقاسات الحالية للقطعة </h1> --}}
                <div class="row">
                    <div class="col">
                    </div>
                    <div class="col">
                        <img src="{{ asset('img/a_small_abaya.jpeg') }}" style="width: 250px" alt="">

                    </div>
                    <div class="col">
                    </div>
                </div>

            </div>

        </div>
        <div class="card card-solid">
            <div class="card-body">
                {!! Form::open(['route'=>['product.abayaSize.Table',$product->id],'method'=>'post']) !!}


                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">{{ trans('shop.req_mag1') }}</label>
                            <div class="form-check checkbox-xl">
                                <input type="checkbox"  id="checkboxPrimary1" value="a_size1" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$product->id)->where('size_abaya','a_size1')->exists() ? 'checked' : '' }} >
                                <label for="checkboxPrimary1">
                                    {{ trans('shop.size1') }}
                                </label>
                              </div>

                              <div class="form-check checkbox-lg">
                                <input type="checkbox" id="checkboxPrimary2 " value="a_size2" name='my_name[]'  {{ \App\Models\SizeAbaya::where('product_id',$product->id)->where('size_abaya','a_size2')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary2">
                                    {{ trans('shop.size2') }}
                                </label>
                              </div>
                            <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary3" value="a_size3" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$product->id)->where('size_abaya','a_size3')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary3">
                                    {{ trans('shop.size3') }}
                                </label>
                              </div>

                              <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary4" value="a_size4" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$product->id)->where('size_abaya','a_size4')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary4">
                                    {{ trans('shop.size4') }}
                                </label>
                              </div>
                            <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary5" value="a_size5" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$product->id)->where('size_abaya','a_size5')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary5">
                                    {{ trans('shop.size5') }}
                                </label>
                              </div>

                              <div class="form-check">
                                <input type="checkbox" id="checkboxPrimary6" value="a_size6" name='my_name[]' {{ \App\Models\SizeAbaya::where('product_id',$product->id)->where('size_abaya','a_size6')->exists() ? 'checked' : '' }}>
                                <label for="checkboxPrimary6">
                                    {{ trans('shop.size6') }}
                                </label>
                              </div>

                      <br>
                    <br>
                    <script type="text/javascript">​
                        $("input[name=my_name]").on("change", function(event) {
                            if (true === $(this).prop('checked')) $(this).remove();
                        });​
                    </script>

                        </div>
                        <button type="submit" style="background-color: #726189;color: white"  class="btn btn-lg btn-block">{{ trans('shop.update') }}</button>
                    </div>
                </div>


            {!! Form::close() !!}
            </div>

        </div>
        <!-- /.card -->

    </section>







@endsection
