@if ($shipped == 0)

    <div class="badge badge-danger">
        <h5 data-toggle="modal" data-target="#modal-lg"><i class="fa fa-calendar-plus"></i>
            {{trans('admin.order_Step0')}}
        </h5>
    </div>



@elseif($shipped == 1)

    <div class="badge badge-warning">
        <h5 data-toggle="modal" data-target="#modal-lg"><i class="fa fa-store"></i>
            {{trans('admin.order_Step1')}}
        </h5>
    </div>


@elseif($shipped == 2 )

    <div class="badge badge-success">
        <h5 data-toggle="modal" data-target="#modal-lg"><i class="fa fa-smile-beam"></i>
            {{trans('admin.order_Step2')}}
        </h5>
    </div>

@elseif($shipped == 3 )
    <div class="badge badge-success">
        <h5 data-toggle="modal" data-target="#modal-lg"><i class="fa fa-shipping-fast"></i>
            {{trans('admin.order_Step3')}}
        </h5>
    </div>

@elseif($shipped == 4 )
<div class="badge badge-success">
    <h5 data-toggle="modal" data-target="#modal-lg"><i class="fas fa-spinner"></i>
        {{trans('admin.order_Step4')}}
    </h5>
</div>

@elseif($shipped == 5 )
    <div class="badge badge-info">
        <h5 data-toggle="modal" data-target="#modal-lg"><i class="fas fa-shopping-bag"></i>
            {{trans('admin.order_Step5')}}
        </h5>
    </div>
@elseif($shipped == 6 )
    <div class="badge badge-secondary">
        <h5 data-toggle="modal" data-target="#modal-lg"><i class="far fa-times-circle"></i>
            {{trans('admin.order_Step6')}}
        </h5>
    </div>



@else
    no alert
@endif
