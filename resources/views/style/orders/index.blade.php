@extends('shop.index')
@section('content')
    <style>
        #form_data{
            width: auto;
            overflow-x: scroll;

        }
    </style>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">{{$title}}</h3>
        </div>
        <!-- /.box-header -->

        <div class="box-body">
            {!! Form::open(['id'=>'form_data','url'=>aurl('orders/destroy/all'),'method'=>'delete']) !!}
            {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!}
            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>



 @push('js')
    <script type="text/javascript">
        delete_all();
    </script>
    {!! $dataTable->scripts() !!}
    <script>
        delete_all();
    </script>
    @endpush
@endsection