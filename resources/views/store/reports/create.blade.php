@extends('admin.index')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
{{--                        <h3 class="card-title">{{$title}}</h3>--}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">


                        <form action="{{aurl('months')}}" method="post">
                            {{csrf_field()}}
                         <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{trans('admin.other_data')}}</label>
                                    <input class="form-control" type="month" name="date" value="{{old('date')}}"  >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">{{trans('admin.shop_id')}}</label>
                                    <select name="shop_id" class="form-control" >
                                        @foreach(App\Model\Shop::all() as $shop)
                                        <option value="{{$shop->id}}">{{$shop->name}}</option>
                                        @endforeach
{{--                                        <option value="2">2</option>--}}
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="">{{trans('admin.other_data')}}</label>
                                     <input class="form-control" type="text" name="percentage" value="{{old('percentage')}}"  >
                                 </div>
                             </div>
                             <div class="col-md-3">
                                 <label for="">create</label>
                                 <button class=" btn btn-primary btn-block"> add</button>
                             </div>
                         </div>
                        </form>

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
