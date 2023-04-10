@extends('store.index')

@section('content')

{{--<h2>{{$product->title}}</h2>--}}



    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">

                        {{-- <div class=" animated infinite slow flash delay-2s alert alert-success" role="alert">
                            <h4 class="alert-heading"> not active</h4>
                            <p><s><s></s></s></p>
                            <p class="mb-0">ssss</p>
                          </div> --}}
                        {{-- <h3 class="d-inline-block d-sm-none">{{$product->title}}</h3> --}}
                        <div class="col-12">
                            <img src="{{imageDo($product->main_image)}}" class="product-image img-thumbnail" alt="Product Image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <div class="product-image-thumb active"><img src="{{imageDo($product->main_image)}}" alt="Product Image"></div>
                            @foreach ($product->image_data()->get() as $item)
                            <div class="product-image-thumb" ><img src="{{imageDo($item->image_key)}}" alt="Product Image"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">


                        @if ($product->show  =='pending')
                        <div class=" animated infinite slower 2s flash  alert alert-warning" role="alert">
                            <h4 class="alert-heading">{{ trans('shop.pending_product') }}</h4>
                            <p class="mb-0">{{ trans('shop.pending_p') }}</p>
                          </div>
                        @endif

                        <h3 class="my-3">{{$product->title}}</h3>
                        <h1 class="my-3 badge badge-danger">{{session('lang')== 'ar'?$product->category->name_ar:$product->category->name_en}}</h1>
{{--                        <p>{!! $product->content !!}</p>--}}

                        <hr>

                       @if($product->category_id ==1)
                            <h4>{{trans('shop.color_qty')}}</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                    {{session('lang')== 'ar'?$product->color->name_ar:$product->color->name_en}}
{{--                                    {{$product->color->name_ar}}--}}
                                    <br>
                                    <i class="fas fa-circle fa-2x" style="color: {{$product->color->color}} ;border: black 1px solid ; border-radius: 50%"></i>
                                    <br>
                                    qty: {{$product->qty}}
                                </label>

                            </div>



                           @elseif ($product->category_id ==2)
                            <h4>{{trans('shop.color_qty')}}</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                    {{session('lang')== 'ar'?$product->color->name_ar:$product->color->name_en}}
                                    <br>
                                    <i class="fas fa-circle fa-2x" style="color: {{$product->color->color}} ;border: black 1px solid ; border-radius: 50%"></i>
                                    <br>
                                    qty: {{$product->qty}}
                                </label>

                            </div>


                           @else
                            <h4>{{trans('shop.color')}}</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-default text-center active">
                                    <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                                    {{session('lang')== 'ar'?$product->color->name_ar:$product->color->name_en}}
                                    <br>
                                    <i class="fas fa-circle fa-2x" style="color: {{$product->color->color}} ;border: black 1px solid ; border-radius: 50%"></i>

                                </label>

                            </div>

                            <h4 class="mt-3">{{trans('shop.size_qty')}}</h4>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach ($product->size_data()->get() as $item)

                                    <label class="btn btn-default text-center">
                                        <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                                        <span class="text-xl">{{$item->size_data}}</span>
                                        <br>
                                        {{$item->size_qty}}
                                    </label>
                                @endforeach

                            </div>

                        @endif
                        <div class="bg-gray py-2 px-3 mt-4">

                            @if ($product->status =='active'and $product->price_offer >0 )
                                <h2 class="mt-0">
                                    {{presentPrice($product->price_offer)}}

                                </h2>
                                <h4 class="mb-0">
                                    <small>{{presentPrice($product->price)}} </small>
                                </h4>
                            @else
                            <h2 class="mb-0">
                                {{presentPrice($product->price)}}
                            </h2>
                            @endif
                        </div>
                        <br>
                        @if ($product->include_shailah == 1 and $product->category_id ==1)
                        <div class="alert alert-danger alert-dismissible">

                            <h5><i class="icon fas fa-info"></i>{{trans('shop.alert')}}!</h5>
                            {{trans('shop.include_sh')}}                        </div>
                            @elseif ($product->include_shailah == 0 and $product->category_id ==1)

                            <div class="alert alert-info alert-dismissible">

                                <h5><i class="icon fas fa-info"></i>{{trans('shop.alert')}}!</h5>
                                {{trans('shop.not_include_sh')}}
                            </div>

                        @endif
                        <hr>
                        <h4>{{trans('shop.product_content')}}</h4>
                        <p>{!! $product->content !!}</p>
                        <hr>
                @if ($product->category_id == 1)



                        <h4>{{trans('shop.req_mag')}}</h4>



                        @forelse (\App\Models\SizeAbaya::where('product_id',$product->id)->get() as $item )


                            @if ($item->size_abaya =='a_size1')

                            <p>{{ trans('shop.size1') }}</p>
                            @elseif($item->size_abaya =='a_size2')
                            <p>{{ trans('shop.size2') }}</p>
                            @elseif($item->size_abaya =='a_size3')
                            <p>{{ trans('shop.size3') }}</p>
                            @elseif($item->size_abaya =='a_size4')
                            <p>{{ trans('shop.size4') }}</p>
                            @elseif($item->size_abaya =='a_size5')
                            <p>{{ trans('shop.size5') }}</p>
                            @elseif($item->size_abaya =='a_size6')
                            <p>{{ trans('shop.size6') }}</p>


                            @endif
                        @empty
                        <p>this products not have size of Abaya</p>

                        @endforelse
                        <form action="{{ route('product.abayaSize', ['id'=>$product->id]) }}" method="POST">
                            @csrf

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="">{{ trans('shop.req_mag1') }}</label>
                                                            <select name="my_name[]" class="form-control select2" id="" multiple>
                                                            <option value="a_size1">{{ trans('shop.size1') }}</option>
                                                            <option value="a_size2">{{ trans('shop.size2') }}</option>
                                                            <option value="a_size3">{{ trans('shop.size3') }}</option>
                                                            <option value="a_size4">{{ trans('shop.size4') }}</option>
                                                            <option value="a_size5">{{ trans('shop.size5') }}</option>
                                                            <option value="a_size6">{{ trans('shop.size6') }}</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" style="background-color: #726189;color: white"  class="btn btn-lg btn-block">{{ trans('shop.update') }}</button>
                                                    </div>
                                                </div>
                        </form>
                        <hr>
                        @endif

                        <h4>{{trans('user.tags')}}</h4>


                        @forelse ($tags as $item )

                        <p>{{ session('lang')== 'ar'? $item->tag->name_ar:$item->tag->name_en }}</p>
                        @empty
                        <p>this products not have tags</p>

                        @endforelse

<form action="{{ route('product.view.tags', ['id'=>$product->id]) }}" method="POST">
    @csrf

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="">{{session('lang') == 'ar' ? 'اختر صفات للقطعة':'Add tags that describe the item  '}}</label>
                                    <select name="tags[]" class="form-control select2" id="" multiple>
                                    @foreach (\App\Models\Tag::all() as $item)
                                    <option value="{{$item->id}}"  >{{session('lang')=='ar'? $item->name_ar:$item->name_en}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <button type="submit" style="background-color: #726189;color: white"  class="btn btn-lg btn-block">{{ trans('shop.update') }}</button>
                            </div>
                        </div>
</form>




                    </div>
                </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
<!-- Content Wrapper. Contains page content -->

@endsection
