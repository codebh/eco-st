@if ($confirm == 'yes')
    <div class="badge badge-success">
        <h6><i class="fa fa-check-circle"></i>
            {{trans('admin.confirm0')}}
        </h6>
    </div>


@elseif($confirm =='no')

    <div class="badge badge-danger">
        <h6><i class="fas fa-times-circle"></i>
            {{trans('admin.confirm1')}}
        </h6>
    </div>
@else

    <div class="badge badge-danger">
        <h6><i class="fas fa-times-circle"></i>
            {{trans('admin.confirm1')}}
        </h6>
    </div>

@endif

