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
            {!! Form::open(['url'=>aurl('colors/'.$color->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                {!! Form::text('name_ar',$color->name_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name_en',trans('admin.name_en')) !!}
                {!! Form::text('name_en',$color->name_en,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('color',trans('admin.color')) !!}
                {!! Form::color('color',$color->color,['class'=>'form-control']) !!}
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
