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
            {!! Form::open(['url'=>aurl('users/'.$user->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',$user->name,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email',trans('admin.email')) !!}
                {!! Form::email('email',$user->email,['class'=>'form-control']) !!}
            </div>
            {{-- <div class="form-group">
                {!! Form::label('level',trans('admin.level')) !!}
                {!! Form::select('level',
                ['user'=> trans('admin.users'),
                'company'=> trans('admin.company'),
                'vendor'=> trans('admin.vendor')],$user->level,
                ['class'=>'form-control','placeholder'=>'...............']) !!}
            </div> --}}
            <div class="form-group">
                {!! Form::label('password',trans('admin.password')) !!}
                {!! Form::password('password',['class'=>'form-control']) !!}
            </div>

            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
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
