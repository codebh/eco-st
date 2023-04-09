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
            {!! Form::open(['url'=>aurl('faq')]) !!}

            <div class="form-group">
                {!! Form::label('question',trans('admin.question')) !!}
                {!! Form::text('question',old('question'),['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('answer',trans('admin.answer')) !!}
                {!! Form::textarea('answer', old('answer'), ['id'=>'','class' => 'form-control']) !!}

            </div>
            <div class="form-group">
                {!! Form::label('lang',trans('admin.lang')) !!}
                {!! Form::select('lang', [
                                               'ar'=>trans('admin.ar'),
                                               'en'=>trans('admin.en'),

                                                 ]
                                                ,old('lang') , ['class' => 'form-control']) !!}
            </div>
            {{-- <div class="form-group">
                {!! Form::label('type',trans('admin.type')) !!}
                {!! Form::select('type', [
                    'user'=>trans('admin.user'),
                    'store'=>trans('admin.store'),

                                                 ]
                                                ,old('type') , ['class' => 'form-control']) !!}
            </div> --}}

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
