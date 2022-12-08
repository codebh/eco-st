@extends('admin.index')
@section('content')

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
            {!! Form::open(['route'=>'delivery.store']) !!}
            <div class="form-group">
                {!! Form::label('f_name',trans('admin.f_name')) !!}
                {!! Form::text('f_name',old('f_name'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('l_name',trans('admin.l_name')) !!}
                {!! Form::text('l_name',old('l_name'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('mobile',trans('admin.phone')) !!}
                {!! Form::text('mobile',old('mobile'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password',trans('admin.password')) !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            {!! Form::submit(trans('admin.create_admin'),['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}

        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </section>
    <!-- /.content -->





@endsection
