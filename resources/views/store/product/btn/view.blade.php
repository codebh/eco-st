<a href="{{surl('showShop/'.$title)}}" class="btn btn-success"><li class="fa fa-eye"></li></a>
{{--<a href="{{surl('shopOrders/'.$id.$product_id)}}" class="btn btn-success"><li class="fa fa-eye"></li></a>--}}
{{--<a href="{{'shopOrders/'.$product_id.'/edit/'.$id}}" class="btn btn-success"><li class="fa fa-eye"></li></a>--}}
{{--<a href="{{surl('shopOrders/'.$id.'/edit/'.$product_id)}}" class="btn btn-success"><li class="fa fa-eye"></li></a>--}}

{{--'shopOrders/{$id}/edit/{$product_id}'--}}
{{--shopOrders/9/edit/98--}}


{{--<a href="{{surl(route('shopOrders.details',$id.$product_id))}}" class="btn btn-success"><li class="fa fa-eye"></li></a>--}}
{{--'shopOrders/{$id}/edit/{$product_id}--}}

{{--{{$view->color_id}}--}}
{{--{{$order_id}}--}}
{{--{{$product_id}}--}}

{{--{{$order->product_id()->$product_id->id}}--}}
{{--{{$product_id->id}}--}}
{{--{{$order_id.id}}--}}
<!-- Trigger the modal with a button -->
{{--<button type="button" class="btn btn-success " data-toggle="modal" data-target="#del_shop{{$id}}"><li class="fa fa-eye"></li></button>--}}

{{--<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-lg">--}}
        {{--<div class="modal-content">--}}
            {{--...--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--<!-- Modal -->--}}

{{--<div id="del_shop{{$id}}" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">--}}
    {{--<div class="modal-dialog modal-lg">--}}
        {{--<div class="modal-content">--}}
{{--<div id="del_shop{{$id}}" class="modal fade bd-example-modal-lg" role="dialog">--}}
    {{--<div class="modal-dialog">--}}

        {{--<!-- Modal content-->--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                {{--<h4 class="modal-title">{{trans('shop.more_info')}}</h4>--}}
            {{--</div>--}}
            {{--{!! Form::open(['route'=>['countries.destroy',$id],'method'=>'delete']) !!}--}}
            {{--<div class="modal-body">--}}

                {{--<ul class="nav nav-tabs">--}}
                    {{--<li class="active"><a data-toggle="tab" href="#home">{{trans('shop.photo')}}</a></li>--}}
                    {{--<li><a data-toggle="tab" href="#menu1">{{trans('shop.information')}}</a></li>--}}
                    {{--<li><a data-toggle="tab" href="#menu2">{{trans('shop.prices')}}</a></li>--}}
                    {{--<li><a data-toggle="tab" href="#menu3">Menu 3</a></li>--}}
                {{--</ul>--}}

                {{--<div class="tab-content">--}}
                    {{--<div id="home" class="tab-pane fade in active">--}}
                        {{--<h3>{{trans('shop.photo')}}</h3>--}}
                        {{--<hr>--}}
                        {{--<div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
                        {{--<!-- Indicators -->--}}
                        {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#myCarousel" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="1"></li>--}}
                            {{--<li data-target="#myCarousel" data-slide-to="2"></li>--}}
                        {{--</ol>--}}

                        {{--<!-- Wrapper for slides -->--}}
                        {{--<div class="carousel-inner">--}}
                            {{--<div class="item active">--}}
                                {{--<img src="{{asset('storage/'.$photo)}}" alt="Los Angeles">--}}
                            {{--</div>--}}

                            {{--<div class="item">--}}
                                {{--<img src="{{asset('storage/'.$photo)}}" alt="Chicago">--}}
                            {{--</div>--}}

                            {{--<div class="item">--}}
                                {{--<img src="{{asset('storage/'.$photo)}}" alt="New York">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<!-- Left and right controls -->--}}
                        {{--<a class="left carousel-control" href="#myCarousel" data-slide="prev">--}}
                            {{--<span class="glyphicon glyphicon-chevron-left"></span>--}}
                            {{--<span class="sr-only">Previous</span>--}}
                        {{--</a>--}}
                        {{--<a class="right carousel-control" href="#myCarousel" data-slide="next">--}}
                            {{--<span class="glyphicon glyphicon-chevron-right"></span>--}}
                            {{--<span class="sr-only">Next</span>--}}
                        {{--</a>--}}
                    {{--</div>--}}
                       {{--<div class="row">--}}
                           {{--<div class="col-sm-6">--}}
                               {{--<h3>main photo</h3>--}}
                               {{--<img src="{{asset('storage/'.$photo)}}" alt="">--}}
                           {{--</div>--}}
                           {{--<div class="col-sm-6">--}}
                               {{--<h3>anther photo </h3>--}}
                               {{--<img src="{{asset('storage/'.\App\File::plack(''))}}" alt="">--}}

                               {{--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>--}}

                           {{--</div>--}}
                       {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="menu1" class="tab-pane fade">--}}
                        {{--<h3>{{trans('shop.information')}}</h3>--}}
                        {{--<hr>--}}

                    {{--<div class="row">--}}
                        {{--<div class="col-sm-4">--}}
                            {{--<label for="">{{trans('shop.title_name')}}</label>--}}
                            {{--<input id="email"  type="text" class="form-control"   placeholder="{{$title}}" disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-4">--}}
                            {{--<label for="">لون المنتح</label>--}}
                            {{--{!! Form::text('email', old($product->color_id),['class' => 'form-control']) !!}--}}
                            {{--<input id="email"  type="text" class="form-control"   placeholder="{{$view->color_id}}" disabled>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-4">--}}
                            {{--<label for="">{{trans('shop.item_price')}}</label>--}}
                            {{--<div class="input-group">--}}
                                {{--<input id="email"  type="text" class="form-control"   placeholder="{{$price}}" disabled>--}}
                                {{--<span class="input-group-addon">BD</span>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                        {{--<hr>--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-sm-12">--}}
                                {{--<label for="">{{trans('shop.content')}}</label>--}}
                                {{--<textarea class="form-control" disabled  style="width: auto" id="comment" placeholder="{{$content}}"></textarea>--}}

                            {{--</div>--}}
                            {{--<textarea name="" class="form-control" id="" cols="30" rows="10" placeholder="{{$content}}"></textarea>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div id="menu2" class="tab-pane fade">--}}
                        {{--<h3>Menu 2</h3>--}}
                        {{--<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>--}}
                    {{--</div>--}}
                    {{--<div id="menu3" class="tab-pane fade">--}}
                        {{--<h3>Menu 3</h3>--}}
                        {{--<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">{{trans('shop.close')}}</button>--}}
                {{--{!! Form::submit(trans('shop.yes'),['class'=>'btn btn-danger ']) !!}--}}
            {{--</div>--}}

            {{--{!! Form::close() !!}--}}
        {{--</div>--}}

    {{--</div>--}}
{{--</div>--}}
