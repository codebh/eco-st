
    <h3>{{trans('admin.product_info')}}</h3>



    <div class="form-group">
        {!! Form::label('title',trans('admin.product_title')) !!}
        {!! Form::text('title',old('title'),['class'=>'form-control','placeholder'=>trans('admin.product_title')]) !!}
    </div>
    <div class="form-group">
        {!! Form::label('content',trans('admin.product_content')) !!}
        {!! Form::textarea('content',old('content'),['class'=>'form-control','placeholder'=>trans('admin.product_content')]) !!}
    </div>

