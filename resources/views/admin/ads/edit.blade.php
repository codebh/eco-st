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
                        {!! Form::open(['url'=>aurl('ads/'.$ads->id),'method'=>'put' ,'files'=>'true']) !!}
                        <div class="form-group">
                            {!! Form::label('title',trans('admin.ads_title')) !!}
                            {!! Form::text('title',$ads->title,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('type',trans('admin.ads_type')) !!}
                            {!! Form::select('type', [
                                                     'ar'=>trans('admin.ar'),
                                                     'en'=>trans('admin.en'),
                                                     ]
                                                     ,$ads->type , ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('url',trans('admin.ads_url')) !!}
                            {!! Form::text('url',$ads->url,['class'=>'form-control']) !!}
                        </div>



                        <div class="form-group">
                            {!! Form::label('image',trans('admin.ads_image')) !!}
                            {!! Form::file('image',['class'=>'form-control']) !!}
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
