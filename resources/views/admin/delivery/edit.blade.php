@extends('admin.index')
@section('content')

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            {!! Form::open(['url'=>aurl('delivery/'.$admin->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('f_name',trans('admin.f_name')) !!}
                {!! Form::text('f_name',$admin->f_name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('l_name',trans('admin.l_name')) !!}
                {!! Form::text('l_name',$admin->l_name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('mobile',trans('admin.phone')) !!}
                {!! Form::text('mobile',$admin->mobile,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$admin->email,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password',trans('admin.password')) !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>





@endsection
