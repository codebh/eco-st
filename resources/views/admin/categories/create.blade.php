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
{{--                        {!! Form::open(['url'=>aurl('products'),'files'=>true]) !!}--}}
            {!! Form::open(['url'=>aurl('categories') ,'files'=>'true']) !!}

            <div class="form-group">
                {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name_en',trans('admin.name_en')) !!}
                {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('des_ar',trans('admin.des_ar')) !!}
                {!! Form::textarea('des_ar',old('des_ar'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('des_en',trans('admin.des_en')) !!}
                {!! Form::textarea('des_en',old('des_en'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image',trans('admin.image_category')) !!}
                {!! Form::file('image',old('image'),['class'=>'form-control']) !!}
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
