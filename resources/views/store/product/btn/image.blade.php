<img src="{{imageDo($main_image)}}" class="img-thumbnail rounded-top" style="width: 120px; " alt="">
{{-- <img src="{{imageDo($main_image) asset('img/theme/product/'.$main_image)}}" class="img-thumbnail rounded-top" style="width: 120px; " alt=""> --}}
{{--{{$main_image}}--}}
{{--{{presentPrice($price)}}--}}

{{--@if ($shipped == 0)--}}

{{--<div class="badge badge-danger">--}}
{{--    <h5><i class="fa fa-calendar-plus"></i>--}}
{{--        {{trans('shop.orderStep')}}--}}
{{--    </h5>--}}
{{--</div>--}}



{{--@elseif($shipped == 1)--}}

{{--    <div class="badge badge-warning">--}}
{{--        <h5><i class="fa fa-store"></i>--}}
{{--            {{trans('shop.orderStep1')}}--}}
{{--        </h5>--}}
{{--    </div>--}}


{{--@elseif($shipped == 2 )--}}

{{--    <div class="badge badge-primary">--}}
{{--        <h5><i class="fa fa-shipping-fast"></i>--}}
{{--            {{trans('shop.orderStep2')}}--}}
{{--        </h5>--}}
{{--    </div>--}}

{{--@elseif($shipped == 3 )--}}
{{--    <div class="badge badge-success">--}}
{{--        <h5><i class="fa fa-smile-beam"></i>--}}
{{--            {{trans('shop.orderStep3')}}--}}
{{--        </h5>--}}
{{--    </div>--}}



{{--@else--}}
{{--    no alert--}}
{{--@endif--}}





{{--@foreach($product_id->image_data()->get() as $image)--}}
    {{--@if ($loop->first)--}}
        {{--<img src="{{asset('storage/product/'.$product_id.'/'.$image->image_key)}}" class="img-fluid rounded-top" style="width: 50px; height:50px" alt="">--}}

    {{--@endif--}}

    {{--@endforeach--}}
{{--11--}}

{{--{{$product_id->title}}--}}
{{--11--}}
