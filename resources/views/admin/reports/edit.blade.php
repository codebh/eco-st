@extends('admin.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}} {{$report->date}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        {{--                        <form action="{{aurl('months')}}" method="put">--}}
                        {!! Form::open(['url'=>aurl('months/'.$report->id),'method'=>'PUT']) !!}
                        {{--
                                                  {{csrf_field()}}--}}
{{--                        <div class="animate__animated animate__bounce animate__infinite">Example</div>--}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    {!! Form::label('date',trans('admin.report_month')) !!} <span class="badge badge-success animate__animated animate__pulse animate__infinite">{{$report->date}}</span>
                                    <input class="form-control" type="month" name="date" value="{{old('date')}}"  >
                                </div>
                            </div>
                            <div class="col-md-2">
                                    <div class="form-group">
                                        {!! Form::label('store_id',trans('admin.shop_name')) !!}
                                        {!! Form::select('store_id',App\Models\Store::pluck('name','id'),$report->store_id,
                                        ['class'=>'form-control']) !!}
                                    </div>
                            </div>
                            <div class="col-md-3">
                                    <div class="form-group">
                                        {!! Form::label('percentage',trans('admin.report_percentage')) !!}
                                        {!! Form::text('percentage',$report->percentage,['class'=>'form-control','placeholder'=>trans('admin.report_percentage')]) !!}

                                    </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    {!! Form::label('payment_status',trans('admin.report_payment_status')) !!}
                                    {!! Form::select('payment_status',[1=>'yes',0=>'no'],$report->payment_status,
                                    ['class'=>'form-control',]) !!}
                                </div>
                            </div>
                            <div class="col-md-2">
                                {!! Form::label('submit',trans('admin.update_date')) !!}

                                {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary btn-block']) !!}
                                        {!! Form::close() !!}
                            </div>
                        </div>


                                {{--                        <div class="form-group">--}}
                                {{--                            {!! Form::label('date',trans('admin.date')) !!}--}}
                                {{--                            {{ Form::text('deadline', null, ['class' => 'form-control', 'id'=>'datetimepicker']) }}--}}
                                {{--                        </div>--}}
                                {{--                        <div class="form-group">--}}
                                {{--                            {!! Form::label('country_name_en',trans('admin.country_name_en')) !!}--}}
                                {{--                            {!! Form::text('country_name_en',old('country_name_en'),['class'=>'form-control']) !!}--}}
                                {{--                        </div>--}}
                                {{--                        <div class="form-group">--}}
                                {{--                            {!! Form::label('code',trans('admin.code')) !!}--}}
                                {{--                            {!! Form::text('code',old('code'),['class'=>'form-control']) !!}--}}
                                {{--                        </div>--}}
                                {{--                        <div class="form-group">--}}
                                {{--                            {!! Form::label('mob',trans('admin.mob')) !!}--}}
                                {{--                            {!! Form::text('mob',old('mob'),['class'=>'form-control']) !!}--}}
                                {{--                        </div>--}}
                                {{--                        <div class="form-group">--}}
                                {{--                            {!! Form::label('currency',trans('admin.currency')) !!}--}}
                                {{--                            {!! Form::text('currency',old('currency'),['class'=>'form-control']) !!}--}}
                                {{--                        </div>--}}
                                {{--                        <div class="form-group">--}}
                                {{--                            {!! Form::label('logo',trans('admin.country_flag')) !!}--}}
                                {{--                            {!! Form::file('logo',['class'=>'form-control']) !!}--}}
                                {{--                        </div>--}}



                                {{--                        {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}--}}
                                {{--                        {!! Form::close() !!}--}}

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
{{--@push('js')--}}
{{--    <script type="text/javascript">--}}
{{--        $('#datetimepicker').datetimepicker({--}}
{{--            format: 'yyyy-mm-dd'--}}
{{--        });--}}
{{--    </script>--}}

{{--@endpush--}}
