<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-lg{{$id}}">
    <i class="fa fa-truck-loading"></i>
</button>

<div class="modal fade" id="modal-lg{{$id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ trans('admin.order_id') }} :{{$order_id}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                {!! Form::open(['url'=>aurl('orderProduct/state/'.$id),'method'=>'post']) !!}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('shipped',trans('admin.shipped')) !!}
                            {!! Form::select('shipped',
                            [
                            '0'=>trans('admin.order_Step0'),
                            '1'=>trans('admin.order_Step1'),
                            '2'=>trans('admin.order_Step2'),
                            '3'=>trans('admin.order_Step3'),
                            '4'=>trans('admin.order_Step4'),
                            '5'=>trans('admin.order_Step5'),
                            '6'=>trans('admin.order_Step6'),
                            ]
                            ,$shipped,['class'=>'form-control status']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('est_date',trans('admin.shipped')) !!}
                            {{ Form::date('est_date',$est_date, ['class' => 'form-control', 'id'=>'datetimepicker']) }}

                        </div>
                    </div>


                </div>


                {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('admin.close')}}</button>
{{--                <button type="button" class="btn btn-primary">Save changes</button>--}}
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
