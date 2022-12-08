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
            {!! Form::open(['url'=>aurl('sizes')]) !!}

            <div class="form-group">
                {!! Form::label('name',trans('admin.size_format')) !!}
                {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>

            {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
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
