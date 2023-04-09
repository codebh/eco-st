@extends('admin.index')
@section('content')
    <style>
        .overData{
            overflow-x: auto;
        }
    </style>
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
            {!! Form::open(['id'=>'form_data','url'=>aurl('products/destroy/all'),'method'=>'delete']) !!}
                        <div style="overflow-x: auto">
            {!! $dataTable->table(['class'=>'dataTable overData table table-striped table-hover  table-bordered'],true) !!}
                        </div>
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


    <!-- Modal -->
    <div class="modal fade" id="mulDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">{{trans('admin.delete')}}</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <div class="empty_record hidden" >
                            <h4> {{trans('admin.pleace_check_some_records')}}? </h4>

                        </div>

                        <div class="not_empty_record hidden" >
                            <h4> {{trans('admin.ask_admin_item')}} <span class="record_count"></span>?</h4>

                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.close')}}</button>

                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('admin.no')}}</button>
                        <input type="submit" name="del_all"  value="{{trans('admin.yes')}}" class="btn btn-danger del_all">
                    </div>
                </div>
            </div>
        </div>
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