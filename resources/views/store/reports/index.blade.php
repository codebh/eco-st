@extends('store.index')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$title}}</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> {{trans('shop.insight_month')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">


                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-money-check-alt"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.report_profit')}}</span>
                                        <span class="info-box-number">{{presentPrice(
    App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->whereBetween(
       'created_at',[now()->startOfMonth(),now()->endOfMonth()]
    )->sum('price')
)}}
                                               </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="fas fa-percent"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.report_cost')}}</span>
                                        <span class="info-box-number">
                                                    {{presentPrice(getPrice1(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->whereBetween('created_at',[now()->startOfMonth(),now()->endOfMonth()])->sum('price'),0.10))}}

                                            </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">

                                    <span class="info-box-icon bg-warning"><i class="fas fa-funnel-dollar"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.report_netPrice')}}</span>
                                        <span class="info-box-number">
                                                {{getTotal(
    App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->whereBetween(
       'created_at',[now()->startOfMonth(),now()->endOfMonth()]
    )->sum('price'),
    getPrice1(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->whereBetween('created_at',[now()->startOfMonth(),now()->endOfMonth()])->sum('price'),0.10)

)}}
                                            </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="far fa-list-alt"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.orders_count')}}</span>
                                        <span class="info-box-number">
                                        {{count(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->whereBetween('created_at',[now()->startOfMonth(),now()->endOfMonth()]))}}
                                            </span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->


                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">


                    </div>

                    {{--                {{$items->links('pagination pagination-sm')}}--}}
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('shop.insight_year')}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-info">
                                    <span class="info-box-icon"><i class="fas fa-money-check-alt"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.report_profit')}}</span>
                                        <span class="info-box-number">
                                            {{presentPrice(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->sum('price'))}}
                                        </span>


                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-success">
                                    <span class="info-box-icon"><i class="fas fa-percent"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.report_cost')}}</span>
                                        <span class="info-box-number">
                                             {{presentPrice(getPrice1(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->sum('price'),0.10))}}
                                        </span>


                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-warning">
                                    <span class="info-box-icon"><i class="fas fa-funnel-dollar"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.report_netPrice')}}</span>
                                        <span class="info-box-number">
                                            {{getTotal(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->sum('price'),
                                               getPrice1(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes')->sum('price'),0.10))}}
                                        </span>


                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box bg-danger">
                                    <span class="info-box-icon"><i class="far fa-list-alt"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">{{trans('shop.orders_count')}}</span>
                                        <span class="info-box-number">
                                            {{count(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id) ->where('confirm','yes'))}}
                                        </span>

                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">


                    </div>

                    {{--                {{$items->links('pagination pagination-sm')}}--}}
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$title}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        {!! Form::open(['class'=>'table-responsive-lg',]) !!}
                        {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered '],true) !!}
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
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>
                    <div class="not_empty_record hidden">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">{{ trans('admin.no') }}</button>
                        <input type="submit" value="{{ trans('admin.yes') }}" class="btn btn-danger del_all"/>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            delete_all();
        </script>
        {!! $dataTable->scripts() !!}
    @endpush

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
