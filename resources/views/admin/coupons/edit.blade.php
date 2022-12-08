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
                        {!! Form::open(['url'=>aurl('coupons/'.$coupon->id),'method'=>'put']) !!}


                        <div class="form-group">
                            {!! Form::label('code',trans('admin.coupon_code')) !!}
                            {!! Form::text('code',$coupon->code,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('type',trans('admin.coupon_type')) !!}

                            {!! Form::select('type', ['fixed'=>trans('admin.coupon_fixed'),
                                                      'percent'=>trans('admin.coupon_percent')  ]
                                                       ,$coupon->type , ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('value',trans('admin.coupon_value')) !!}
                            {!! Form::text('value',$coupon->value,['class'=>'form-control']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('qty',trans('admin.qty')) !!}
                            {!! Form::text('qty',$coupon->qty,['class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('end',trans('admin.end_at')) !!}
                            {!! Form::date('end',$coupon->end,['class'=>'form-control']) !!}
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
