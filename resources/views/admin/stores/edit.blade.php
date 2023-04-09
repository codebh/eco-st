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
            {!! Form::open(['url'=>aurl('stores/'.$shop->id) ,'method'=>'put','files'=>true]) !!}

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('email',trans('admin.email')) !!}
                        {!! Form::email('email', old('email'),['class'=>'form-control','placeholder'=>'enter your new email' ]) !!}
                    </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        {!! Form::label('password',trans('admin.password')) !!}
                        {!! Form::text('password',$shop->password,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('code',trans('admin.code')) !!}
                        {!! Form::text('code',$shop->code,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                            {!! Form::label('name',trans('admin.shop_name')) !!}
                        {!! Form::text('name',$shop->name,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('name',trans('admin.f_name')) !!}
                        {!! Form::text('f_name',$shop->f_name,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('name',trans('admin.l_name')) !!}
                        {!! Form::text('l_name',$shop->l_name,['class'=>'form-control']) !!}
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('mobile',trans('admin.phone')) !!}
                        {!! Form::text('mobile',$shop->mobile,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('cpr',trans('admin.cpr')) !!}
                        {!! Form::text('cpr',$shop->cpr,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('cr',trans('admin.cr')) !!}
                        {!! Form::text('cr',$shop->cr,['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('address',trans('admin.address')) !!}
                        {!! Form::text('address',$shop->address,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('i_account',trans('admin.i_account')) !!}
                        {!! Form::text('i_account',$shop->i_account,['class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        {!! Form::label('new',trans('admin.new_cost')) !!}
                        {!! Form::select('new',['yes'=>'yes','no'=>'no'],$shop->new,
                        ['class'=>'form-control',]) !!}
                    </div>

                </div>

            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('iban',trans('admin.iban')) !!}
                        {!! Form::text('iban',$shop->iban,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('percentage',trans('admin.percentage')) !!}
                        {!! Form::text('percentage',$shop->percentage,['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('logo',trans('admin.logo')) !!}
                        {!! Form::file('logo',['class'=>'form-control']) !!}
                    </div>
                </div>
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
