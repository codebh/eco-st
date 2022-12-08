
{{--{{presentPrice($price)}}--}}

@if ($shipped == 0)

<div class="badge badge-danger">
    <h5><i class="fa fa-calendar-plus"></i>
        {{trans('shop.orderStep')}}
    </h5>
</div>



@elseif($shipped == 1)

    <div class="badge badge-warning">
        <h5><i class="fa fa-store"></i>
            {{trans('shop.orderStep1')}}
        </h5>
    </div>

    @elseif($shipped == 2 )

    <div class="badge badge-success">
        <h5><i class="fa fa-shipping-fast"></i>
            {{trans('shop.orderStep2')}}
        </h5>
    </div>

    @elseif($shipped == 3 )
    <div class="badge badge-success">
        <h5><i class="fa fa-shipping-fast"></i>
            {{trans('shop.orderStep2')}}
        </h5>
    </div>
    @elseif($shipped == 4 )
    <div class="badge badge-success">
        <h5><i class="fa fa-shipping-fast"></i>
            {{trans('shop.orderStep2')}}
        </h5>
    </div>

    @elseif($shipped == 5 )
    <div class="badge badge-info">
        <h5><i class=" fa fa-shopping-bag"></i>
            {{trans('shop.orderStep4')}}
        </h5>
    </div>
    @elseif($shipped == 6 )
    <div class="badge badge-secondary">
        <h5>
            <i class="fas fa-window-close"></i>
            {{trans('shop.orderStep7')}}
        </h5>
    </div>


@else
    no alert
@endif



