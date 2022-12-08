@extends('store.index')



@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{trans('shop.control_panel')}} </h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{count(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')->whereIn('shipped',0))}}</h3>

                            <h5> {{trans('shop.orderStep')}}</h5>
                        </div>
                        <div class="icon">
                            <i class=" fa fa-calendar-plus"></i>
                        </div>
                        <a href="{{surl('shopOrders')}}" data-toggle="modal" data-target="#exampleModal3"
                           class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


                        <div class="modal fade " id="exampleModal3">
                            <div class="modal-dialog  modal-dialog-scrollable">
                                <div class="modal-content text-dark">
                                    <div class="modal-header  bg-danger">
                                        <h4 class="modal-title">{{trans('shop.orderStep')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body ">
                                        @if (count(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')->whereIn('shipped',0)) > 0)
                                            <table id="example2" class="table table-bordered table-hover ">
                                                <thead>
                                                <tr>
                                                    <th>{{trans('shop.order_id')}}</th>
                                                    <th>{{trans('shop.customer_name')}}</th>
                                                    <th>{{trans('shop.product_title')}}</th>
                                                    <th>{{trans('shop.order_date')}}</th>
                                                    {{-- <th>{{trans('shop.order_date_update')}}</th> --}}
                                                    <th>{{trans('shop.more_info')}}</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @forelse(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')->whereIn('shipped',0) as  $item)
                                                    <tr>
                                                        <td>{{$item->order->id}}</td>
                                                        <td>{{$item->order->billing_name}}</td>
                                                        <td>{{$item->product->title}}</td>
                                                        {{--                                                        <td>{{$item->order->billing_name}}</td>--}}

                                                        <td>{{$item->created_at->format('d/m/y')}}</td>
                                                        {{-- <td>{{$item->updated_at->format('d/m/y')}}</td> --}}

                                                        {{--                                                        <td>{{$item->product_id}}</td>--}}
                                                        <td><a href="{{surl('shopOrders/'.$item->id)}}"
                                                               class="btn btn-info"><i class="fa fa-info"></i></a></td>

                                                    </tr>


                                                @empty
                                                    <tr>
                                                        no items
                                                        <td>{{$item->product->title}}</td>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->order->billing_name}}</td>
                                                        <td>{{$item->created_at->format('d/m/y')}}</td>
                                                        <td>{{$item->updated_at->format('d/m/y')}}</td>

                                                        <td>{{$item->product_id}}</td>
                                                        <td><a href="{{surl('shopOrders/'.$item->id)}}"
                                                               class="btn btn-info"><i class="fa fa-info"></i></a></td>

                                                    </tr>

                                                @endforelse


                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                <strong>No</strong> Item have
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                                        <a type="button" class="btn btn-primary"
                                           href="{{surl('shopOrders')}}">{{trans('shop.orders')}}</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{count(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')->whereIn('shipped',1))}}</h3>

                            <h5>{{trans('shop.orderStep1')}}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-store"></i>
                        </div>
                        <a href="{{surl('shopOrders')}}" data-toggle="modal" data-target="#exampleModal2"
                           class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>


                        <div class="modal fade" id="exampleModal2">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h4 class="modal-title ">{{trans('shop.orderStep1')}}</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @if (count(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')->whereIn('shipped',1)) >0)


                                            <table id="example2" class="table table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>{{trans('shop.order_id')}}</th>
                                                    <th>{{trans('shop.customer_name')}}</th>
                                                    <th>{{trans('shop.product_title')}}</th>
                                                    <th>{{trans('shop.order_date')}}</th>
                                                    <th>{{trans('shop.order_date_update')}}</th>
                                                    <th>{{trans('shop.more_info')}}</th>

                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')->whereIn('shipped',1) as  $item)
                                                    <tr>
                                                        <tr>
                                                            <td>{{$item->order->id}}</td>
                                                            <td>{{$item->order->billing_name}}</td>
                                                            <td>{{$item->product->title}}</td>

                                                            <td>{{$item->created_at->format('d/m/y')}}</td>
                                                            <td>{{$item->updated_at->format('d/m/y')}}</td>

                                                            <td>
                                                                <a href="{{surl('shopOrders/'.$item->id)}}"
                                                                   class="btn btn-info"><i class="fa fa-info"></i></a>
                                                            </td>

                                                        </tr>

                                                    </tr>
                                                @endforeach


                                                </tbody>

                                            </table>
                                        @else
                                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                                <strong>No</strong> Item have
                                            </div>
                                        @endif
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">X</button>
                                        <a type="button" class="btn btn-primary"
                                           href="{{surl('shopOrders')}}">{{trans('shop.orders')}}</a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{count(
                                App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')
                                ->whereBetween('shipped', [2,4])

                                )}}</h3>

                            <h5>{{trans('shop.orderStep2')}}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shipping-fast"></i>
                        </div>
                        <a href="{{surl('shopOrders')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                        <!-- /.modal -->
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{count(App\Models\OrderProduct::all()->where('store_id', shop()->user()->id)->where('confirm','yes')->whereIn('shipped',5))}}</h3>

                            <h5>{{trans('shop.all_orders')}}</h5>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-bag "></i>
                        </div>
                        <a href="{{surl('shopOrders')}}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('shop.orders')}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered table-responsive-md">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th class="text-center">{{trans('shop.order_id')}}</th>
                            <th class="text-center"> {{trans('shop.billing_name')}}</th>
                            <th class="text-center"> {{trans('shop.title')}}</th>
                            <th class="text-center">{{trans('shop.status')}}</th>
                            <th class="text-center">{{trans('shop.progress')}}</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($items =App\Models\OrderProduct::orderBy('shipped')->where('store_id', shop()->user()->id)->where('confirm','yes')->paginate(5) as $item)

                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$item->order_id}}</td>
                                <td class="text-center">{{$item->order->billing_name}}</td>
                                <td class="text-center">{{$item->product->title}}</td>
                                <td class="text-center">
                                    @if ($item->shipped == 0)

                                        <div class="badge badge-danger">
                                            <h5><i class="fa fa-calendar-plus"></i>
                                                {{trans('shop.orderStep')}}
                                            </h5>
                                        </div>



                                    @elseif($item->shipped == 1)

                                        <div class="badge badge-warning">
                                            <h5><i class="fa fa-store"></i>
                                                {{trans('shop.orderStep1')}}
                                            </h5>
                                        </div>


                                    @elseif($item->shipped == 2 )

                                        <div class="badge badge-success">
                                            <h5><i class="fa fa-shipping-fast"></i>
                                                {{trans('shop.orderStep2')}}
                                            </h5>
                                        </div>

                                        @elseif($item->shipped == 3 )
                                        <div class="badge badge-success">
                                            <h5><i class="fa fa-shipping-fast"></i>
                                                {{trans('shop.orderStep2')}}
                                            </h5>
                                        </div>
                                        @elseif($item->shipped == 4 )
                                        <div class="badge badge-success">
                                            <h5><i class="fa fa-shipping-fast"></i>
                                                {{trans('shop.orderStep2')}}
                                            </h5>
                                        </div>
                                        @elseif($item->shipped == 5 )
                                        <div class="badge badge-info">
                                            <h5><i class=" fa fa-shopping-bag"></i>
                                                {{trans('shop.orderStep4')}}
                                            </h5>
                                        </div>
                                        @elseif($item->shipped == 6 )
                                        <div class="badge badge-secondary">
                                            <h5>
                                                <i class="fas fa-window-close"></i>
                                                {{trans('shop.orderStep7')}}
                                            </h5>
                                        </div>




                                    @else
                                        no order
                                    @endif

                                </td>
                                <td>
                                    @if ($item->shipped == 0)

                                        <div class="progress progress">
                                            <div class="progress-bar bg-danger" style="width: 25%; ">25%</div>
                                        </div>



                                    @elseif($item->shipped == 1)

                                        <div class="progress progress">
                                            <div class="progress-bar bg-warning" style="width: 50%">50%</div>
                                        </div>


                                    @elseif($item->shipped == 2 )

                                        <div class="progress progress">
                                            <div class="progress-bar bg-success" style="width: 75%">75%</div>
                                        </div>



                                    @elseif($item->shipped == 3 )
                                        <div class="progress progress">
                                            <div class="progress-bar bg-success" style="width: 75%">75%</div>
                                        </div>

                                        @elseif($item->shipped == 4 )
                                        <div class="progress progress">
                                            <div class="progress-bar bg-success" style="width: 75%">75%</div>
                                        </div>

                                        @elseif($item->shipped == 5 )
                                        <div class="progress progress">
                                            <div class="progress-bar bg-info" style="width: 100%">100%</div>
                                        </div>

                                        @elseif($item->shipped == 6)
                                        <div class="progress progress">
                                            <div class="progress-bar bg-secondary" style="width: 100%">0%</div>
                                        </div>

                                    @else
                                        no alert
                                    @endif


                                </td>

                            </tr>

                        @endforeach


                        </tbody>
                    </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <div class="d-flex justify-content-end">
                        {!! $items->appends(['sort' => 'shipped'])->links("pagination::bootstrap-4") !!}
                    </div>


                </div>

                {{--                {{$items->links('pagination pagination-sm')}}--}}
            </div>

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- AREA CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{trans('shop.chart_order_title') .now()->year}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                {!! $chart->container() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                    <!-- DONUT CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{trans('shop.order_status')}} </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            {!! $chart02->container() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                </div>
                <!-- /.col (RIGHT) -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- PIE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">{{trans('shop.chart_Sales_title') .now()->year}}</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>

                            </div>
                        </div>
                        <div class="card-body">
                            {!! $chart03->container() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@stop
