@extends('admin.index')
@section('content')




    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none">{{$product->title}}</h3>
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
                        <h3 class="my-3">{{$product->title}}</h3>
                        <h3 class="my-3">{{$product->store->name}}</h3>
                        <h1 class="my-3 badge badge-danger">{{session('lang')== 'ar'?$product->category->name_ar:$product->category->name_en}}</h1>
{{--                        <p>{!! $product->content !!}</p>--}}

                        <hr>
                        @if ($product->show == 'pending')
                        <div class="row">
                        <div class="col">
                            <div class=" animated infinite slower 2s flash  alert alert-warning" role="alert">
                                <h4 class="alert-heading"> القطعة  غير مفعلة </h4>

                                {{-- <p class="mb-0">سيتم تفعيل القطعة من قبل  ادارة الموقع</p> --}}
                              </div>

                              {!! Form::open(['url'=>aurl('products_change/state/'.$product->id),'method'=>'post']) !!}

                              <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                          {{-- {!! Form::label('show',trans('admin.show')) !!} --}}
                                          {!! Form::select('show',
                                          [
                                            'approved'=>trans('admin.approved'),
                                            'pending'=>trans('admin.pending'),
                                            'delete'=>trans('admin.delete'),
                                            'active'=>trans('admin.active'),
                                            'not active'=>trans('admin.not active'),
                                        ]
                                          ,$product->show,['class'=>'form-control status']) !!}
                                      </div>
                                  </div>



                              </div>


                              {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
                              {!! Form::close() !!}
                        </div>
                        </div>
                        <hr>
                        @endif

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
{{--                            <h2 class="mb-0">--}}
{{--                                {{presentPrice($product->price)}}--}}
{{--                            </h2>--}}
{{--                            <h4 class="mt-0">--}}
{{--                                <small>{{presentPrice($product->price_offer)}} </small>--}}
{{--                            </h4>--}}
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
{{--                            <h4 class="mt-0">--}}
{{--                                <small>{{$product->price_offer}} </small>--}}
{{--                            </h4>--}}
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
                        <h4>{{trans('shop.content')}}</h4>
                        <p>{!! $product->content !!}</p>
                        <hr>

                        <h4>{{trans('admin.tags')}}</h4>






                        @forelse ($tags as $item )

                        <p>{{ session('lang')== 'ar'? $item->tag->name_ar:$item->tag->name_en }}</p>
                        @empty
                        <p>this products not have tags</p>

                        @endforelse

                        <form action="{{ route('product.view.tags.admin', ['id'=>$product->id]) }}" method="POST">
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

{{--                        <div class="mt-4">--}}
{{--                            <div class="btn btn-primary btn-lg btn-flat">--}}
{{--                                <i class="fas fa-cart-plus fa-lg mr-2"></i>--}}
{{--                                Add to Cart--}}
{{--                            </div>--}}

{{--                            <div class="btn btn-default btn-lg btn-flat">--}}
{{--                                <i class="fas fa-heart fa-lg mr-2"></i>--}}
{{--                                Add to Wishlist--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="mt-4 product-share">--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fab fa-facebook-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fab fa-twitter-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fas fa-envelope-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                            <a href="#" class="text-gray">--}}
{{--                                <i class="fas fa-rss-square fa-2x"></i>--}}
{{--                            </a>--}}
{{--                        </div>--}}

                    </div>
                </div>
{{--                <div class="row mt-4">--}}
{{--                    <nav class="w-100">--}}
{{--                        <div class="nav nav-tabs" id="product-tab" role="tablist">--}}
{{--                            <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>--}}
{{--                            <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>--}}
{{--                            <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>--}}
{{--                        </div>--}}
{{--                    </nav>--}}
{{--                    <div class="tab-content p-3" id="nav-tabContent">--}}
{{--                        <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>--}}
{{--                        <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>--}}
{{--                        <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
<!-- Content Wrapper. Contains page content -->

@endsection
