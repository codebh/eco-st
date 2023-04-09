
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info " data-toggle="modal" data-target="#close_admin{{$id}}"><li class="fa fa-store"></li></button>

<!-- Modal -->
<div id="close_admin{{$id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{trans('admin.close')}}</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>['update_close',$id],'method'=>'update']) !!}
                {{-- <input type="text"> --}}

                <div class="form-group">
                    {!! Form::label('date_of_end',trans('admin.date_of_end')) !!}
                    {!! Form::date('date_of_end',$date_of_end,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('close',trans('admin.close')) !!}
                    {!! Form::select('close', ['no','yes'], $close, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reason',trans('admin.reason')) !!}
                    {!! Form::textarea('reason',$reason,['class'=>'form-control']) !!}
                </div>
                    <div class="form-group">
                        {!! Form::submit(trans('admin.save'),['class'=>'btn btn-success btn-block ']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.no')}}</button>
                </div>
            </div>

    </div>
</div>
