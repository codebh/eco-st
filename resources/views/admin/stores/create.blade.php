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
            {!! Form::open(['url'=>aurl('stores') ,'files'=>true ])!!}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('email',trans('admin.email')) !!}
                        {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">

                    <div class="form-group">
                        {!! Form::label('password',trans('admin.password')) !!}
                        {!! Form::password('password',['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('code',trans('admin.code')) !!}
                        {!! Form::text('code',old('code'),['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('name',trans('admin.shop_name')) !!}
                        {!! Form::text('name',old('name'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('name',trans('admin.f_name')) !!}
                        {!! Form::text('f_name',old('f_name'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('name',trans('admin.l_name')) !!}
                        {!! Form::text('l_name',old('l_name'),['class'=>'form-control']) !!}
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('mobile',trans('admin.phone')) !!}
                        {!! Form::text('mobile',old('mobile'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('cpr',trans('admin.cpr')) !!}
                        {!! Form::text('cpr',old('cpr'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('cr',trans('admin.cr')) !!}
                        {!! Form::text('cr',old('cr'),['class'=>'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('address',trans('admin.address')) !!}
                        {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('i_account',trans('admin.i_account')) !!}
                        {!! Form::text('i_account',old('i_account'),['class'=>'form-control']) !!}
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('iban',trans('admin.iban')) !!}
                        {!! Form::text('iban',old('iban'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('percentage',trans('admin.percentage')) !!}
                        {!! Form::text('percentage',old('percentage'),['class'=>'form-control']) !!}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        {!! Form::label('logo',trans('admin.shop_logo')) !!}
                        {!! Form::file('logo',old('logo'),['class'=>'form-control']) !!}
                    </div>
                </div>
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
