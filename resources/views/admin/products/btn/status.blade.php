
@if ($status == 'active')
    <div class="badge badge-success">
        <h6><i class="fa fa-check-circle"></i>


        </h6>
    </div>


@elseif($status =='not active')

    <div class="badge badge-danger">
        <h6><i class="fas fa-times-circle"></i>

        </h6>
    </div>
@else

    <div class="badge badge-danger">
        <h6><i class="fas fa-times-circle"></i>

        </h6>
    </div>

@endif
