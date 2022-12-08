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
            {!! Form::open(['url'=>aurl('cities/'.$city->id),'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('city_name_ar',trans('admin.city_name_ar')) !!}
                {!! Form::text('city_name_ar',$city->city_name_ar,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('city_name_en',trans('admin.city_name_en')) !!}
                {!! Form::text('city_name_en',$city->city_name_en,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('country_id',trans('admin.country_id')) !!}
                {!! Form::select('country_id',App\Model\Country::pluck('country_name_'.session('lang'),'id'),$city->country_id,['class'=>'form-control']) !!}
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