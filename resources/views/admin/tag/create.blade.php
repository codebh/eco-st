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
                        {!! Form::open(['url'=>aurl('tag'),'files'=>true]) !!}
                        <div class="form-group">
                                {!! Form::label('name_ar',trans('admin.name_ar')) !!}
                                {!! Form::text('name_ar' ,old('name_ar'), ['class' => 'form-control','placeholder'=>trans('admin.name_ar')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name_en',trans('admin.name_en')) !!}
                            {!! Form::text('name_en' ,old('name_en'), ['class' => 'form-control','placeholder'=>trans('admin.name_en')]) !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            {!! Form::label('des_ar',trans('admin.des_ar')) !!}
                            {!! Form::textarea('des_ar' ,old('des_ar'), ['class' => 'form-control','placeholder'=>trans('admin.des_ar')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('des_en',trans('admin.nades_en')) !!}
                            {!! Form::textarea('des_en' ,old('des_en'), ['class' => 'form-control','placeholder'=>trans('admin.des_en')]) !!}
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                            {!! Form::label('collection',trans('admin.collection')) !!}
                            {!! Form::select('collection',
                            ['false'=>trans('admin.false'),'true'=>trans('admin.true')]
                            ,old('status'),['class'=>'form-control status','placeholder'=>trans('admin.collection')]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('c_show',trans('admin.status')) !!}
                            {!! Form::select('c_show',
                            ['active'=>trans('admin.active'),'not active'=>trans('admin.not active')]
                            ,old('c_show'),['class'=>'form-control status','placeholder'=>trans('admin.status')]) !!}
{{--                        </div>--}}
                        <div class="form-group">
                            {!! Form::label('started_at',trans('admin.start_at')) !!}
                            {!! Form::date('started_at'

                            ,old('started_at'),['class'=>'form-control status','placeholder'=>trans('admin.start_at')]) !!}
                        </div>
                     <div class="form-group">
                            {!! Form::label('ended_at',trans('admin.end_at')) !!}
                            {!! Form::date('ended_at'

                            ,old('ended_at'),['class'=>'form-control status','placeholder'=>trans('admin.end_at')]) !!}
                        </div>
                            <div class="form-group">
                                {!! Form::label('c_image',trans('admin.image_ar')) !!}
                                {!! Form::file('c_image'

                                ,old('c_image'),['class'=>'form-control status','placeholder'=>trans('admin.end_at')]) !!}


                            </div>

                            <div class="form-group">
                                {!! Form::label('c_image_en',trans('admin.image_en')) !!}
                                {!! Form::file('c_image_en' ,old('c_image_en'),['class'=>'form-control status','placeholder'=>trans('admin.c_image_en')]) !!}


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
