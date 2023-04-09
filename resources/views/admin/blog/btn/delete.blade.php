
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-danger " data-toggle="modal" data-target="#del_admin{{$id}}"><li class="fa fa-trash"></li></button>

<!-- Modal -->
<div id="del_admin{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('admin.delete')}}</h4>
            </div>
            {!! Form::open(['route'=>['blog.destroy',$id],'method'=>'delete']) !!}
            <div class="modal-body">
                <h4>{{trans('admin.delete_this'). $name }}</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.no')}}</button>
                {!! Form::submit(trans('admin.yes'),['class'=>'btn btn-danger ']) !!}
            </div>

            {!! Form::close() !!}
        </div>

    </div>
</div>
