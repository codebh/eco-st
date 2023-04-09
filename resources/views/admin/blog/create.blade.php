@extends('admin.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('admin.add')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
            {!! Form::open(['url'=>aurl('blog')]) !!}

            <div class="form-group">
                {!! Form::label('name',trans('admin.name')) !!}
                {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('blog_ar',trans('admin.blog_ar')) !!}
                {!! Form::textarea('blog_ar', old('blog_ar'), ['id'=>'summernote','class' => 'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('blog_en',trans('admin.blog_en')) !!}
                {!! Form::textarea('blog_en', old('blog_aen'), ['id'=>'summernote1','class' => 'form-control']) !!}

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
