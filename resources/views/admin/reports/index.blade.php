@extends('admin.index')
@section('content')

<style>

.spinner-border{
        display: none;
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
                        @livewire('admin-report-table')
                        {{-- <livewire:admin-report-table/> --}}

{{--                        {!! Form::open(['id'=>'form_data','url'=>aurl('reports/destroy/all'),'method'=>'delete']) !!}--}}
{{--                        {!! Form::close() !!}--}}

{{-- {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!} --}}
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


    <!-- Trigger the modal with a button -->

    <!-- Modal -->
    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger">
                        <div class="empty_record hidden">
                            <h4>{{ trans('admin.please_check_some_records') }} </h4>
                        </div>
                        <div class="not_empty_record hidden">
                            <h4>{{ trans('admin.ask_admin_item') }} <span class="record_count"></span> ? </h4>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
                        <input type="submit"  value="{{ trans('admin.yes') }}"  class="btn btn-danger del_all" />
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- @push('js')
        <script>
            delete_all();
        </script>
        {!! $dataTable->scripts() !!}
    @endpush --}}

@endsection

{{--@extends('admin.index')--}}
{{--@section('content')--}}
{{--    <!-- Main content -->--}}
{{--    <section class="content">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="card card-primary card-outline">--}}
{{--                        <div class="card-header">--}}
{{--                            <h3 class="card-title">--}}
{{--                                <i class="fas fa-edit"></i>--}}
{{--                                {{trans('shop.monReport')}}--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body pad table-responsive">--}}
{{--                            <div class="list-group">--}}
{{--                                <button type="button" class="list-group-item list-group-item-action active">--}}
{{--                                    {{trans('shop.month')}} <i class="fa fa-edit"></i>--}}
{{--                                </button>--}}
{{--                                --}}{{--                                @foreach($users as $user)--}}
{{--                                --}}{{--                                @endforeach--}}
{{--                                <button type="button" class="list-group-item list-group-item-action">02-2020</button>--}}
{{--                                <table class="table table-striped table-inverse table-responsive">--}}
{{--                                    <thead class="thead-inverse">--}}
{{--                                    <tr>--}}
{{--                                        <th>id</th>--}}
{{--                                        <th>المحل التجاري</th>--}}
{{--                                        <th> الشهر</th>--}}
{{--                                        <th>مجموع الربح</th>--}}
{{--                                        <th>رسوم اناقتي</th>--}}
{{--                                        <th>صافي الريح</th>--}}
{{--                                        <th>تسديد الربح الشهري</th>--}}
{{--                                        <th>view</th>--}}
{{--                                        <th>PDF </th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @foreach ($reports as $report)--}}


{{--                                    <tr class="text-center">--}}
{{--                                        <td scope="row">{{$report->id}}</td>--}}
{{--                                        <td>{{$report->shop->name}}</td>--}}
{{--                                        <td>{{$report->date}}</td>--}}
{{--                                        <td>{{$report->total}}</td>--}}
{{--                                        <td>{{$report->cost}}</td>--}}
{{--                                        <td>{{$report->net_price}}</td>--}}
{{--                                        <td>--}}
{{--                                            @if ( $report->payment_status == 'yes')--}}
{{--                                                <i class="fa fa-check-circle text-success"></i>--}}
{{--                                            @else--}}
{{--                                                <i class="fa fa-times-circle text-danger"></i>--}}

{{--                                            @endif--}}

{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{aurl('months/'.$report->id.'/edit')}}" type="submit" class="btn btn-success"><i class="fa fa-eye"></i></a>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{aurl('months/PDF/'.$report->id)}}" type="submit" class="btn btn-primary"><i class="fa fa-print"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    @endforeach--}}
{{--                                    --}}{{--                                    <tr>--}}
{{--                                    --}}{{--                                        <td scope="row"></td>--}}
{{--                                    --}}{{--                                        <td></td>--}}
{{--                                    --}}{{--                                        <td></td>--}}
{{--                                    --}}{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- /.card -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- /.col -->--}}
{{--            </div>--}}
{{--            <!-- ./row -->--}}


{{--            <!-- /. row -->--}}
{{--        </div><!-- /.container-fluid -->--}}
{{--    </section>--}}
{{--    <!-- /.content -->--}}
{{--@endsection--}}
