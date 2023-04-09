<div class="row">
    <div class="col">
        <div class="form-group">
            {!! Form::label('show',trans('admin.show')) !!}
            {!! Form::select('show',
            ['not active'=>trans('admin.not active'),'active'=>trans('admin.active')]
            ,$product->show,['class'=>'form-control status','placeholder'=>trans('admin.status')]) !!}
        </div>
    </div>
</div>