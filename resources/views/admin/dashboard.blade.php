@extends('admin.index')
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
                        <h3>{{count(App\Models\OrderProduct::all()->where('confirm','yes')->whereIn('shipped',0))}}</h3>

                        <h5> {{trans('shop.orderStep')}}</h5>
                    </div>
                    <div class="icon">
                        <i class=" fa fa-calendar-plus"></i>
                    </div>
                    <a href="{{aurl('shopOrders')}}" data-toggle="modal" data-target="#exampleModal3"
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
                                    @if (count(App\Models\OrderProduct::all()->where('confirm','yes')->whereIn('shipped',0)) > 0)
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

                                            @forelse(App\Models\OrderProduct::all()->where('confirm','yes')->whereIn('shipped',0) as  $item)
                                                <tr>
                                                    <td>{{$item->order->id}}</td>
                                                    <td>{{$item->order->billing_name}}</td>
                                                    <td>{{$item->product->title}}</td>
                                                    <td>{{$item->created_at->format('d/m/y')}}</td>
                                                    <td>{{$item->updated_at->format('d/m/y')}}</td>
                                                    <td><a href="{{aurl('orderProduct/'.$item->id)}}"
                                                           class="btn btn-info"><i class="fa fa-info"></i></a></td>

                                                </tr>


                                            @empty
                                                <tr colspan=6>
                                                    no items
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
                                       href="{{aurl('orderProduct')}}">{{trans('shop.orders')}}</a>
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
                        <h3>{{count(App\Models\OrderProduct::all()->where('confirm','yes')->whereIn('shipped',1))}}</h3>

                        <h5>{{trans('shop.orderStep1')}}</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-store"></i>
                    </div>
                    <a href="{{aurl('orderProduct')}}" data-toggle="modal" data-target="#exampleModal2"
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
                                    @if (count(App\Models\OrderProduct::all()->where('confirm','yes')->whereIn('shipped',1)) >0)


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

                                            @foreach(App\Models\OrderProduct::all()->where('confirm','yes')->whereIn('shipped',1) as  $item)
                                                <tr>
                                                    <tr>
                                                        <td>{{$item->order->id}}</td>
                                                        <td>{{$item->order->billing_name}}</td>
                                                        <td>{{$item->product->title}}</td>

                                                        <td>{{$item->created_at->format('d/m/y')}}</td>
                                                        <td>{{$item->updated_at->format('d/m/y')}}</td>

                                                        <td>
                                                            <a href="{{aurl('orderProduct/'.$item->id)}}"
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
                                       href="{{aurl('orderProduct')}}">{{trans('shop.orders')}}</a>
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
                            App\Models\OrderProduct::all()->where('confirm','yes')
                            ->whereBetween('shipped', [2,4])

                            )}}</h3>

                        <h5>{{trans('shop.orderStep2')}}</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shipping-fast"></i>
                    </div>
                    <a href="{{aurl('orderProduct')}}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                    <!-- /.modal -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{count(App\Models\OrderProduct::all()->where('confirm','yes')->whereIn('shipped',5))}}</h3>

                        <h5>{{trans('shop.all_orders')}}</h5>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag "></i>
                    </div>
                    <a href="{{aurl('orderProduct')}}" class="small-box-footer">More info <i
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
                        <th class="text-center"> {{trans('shop.shop_name')}}</th>
                        <th class="text-center">{{trans('shop.status')}}</th>
                        <th class="text-center">{{trans('shop.progress')}}</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($items =App\Models\OrderProduct::orderBy('shipped')->where('confirm','yes')->paginate(5) as $item)

                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td class="text-center">{{$item->order_id}}</td>
                            <td class="text-center">{{$item->order->billing_name}}</td>
                            <td class="text-center">{{$item->product->title}}</td>
                            <td class="text-center">{{$item->store->name}}</td>
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
                                    @elseif($item->shipped == 7 )
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
                        <h3 class="card-title">{{trans('shop.chart_order_title') }}</h3>

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


            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('admin.sales')}} </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        {!! $chart05->container() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



            </div>
            <div class="col-md-6">
                <!-- DONUT CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('admin.pending_items')}} </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        {!! $chart06->container() !!}
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



            </div>
            <!-- /.col (RIGHT) -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.latest_shops') }}</h3>

                    <div class="card-tools">
                      {{-- <span class="badge badge-danger">8 New Members</span> --}}
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>

                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                    @foreach (\App\Models\Store::orderBy('id', 'desc')->paginate(4) as $item)
                        <li>
                            <img src="{{ imageDo($item->logo) }}" alt="User Image">
                            <a class="users-list-name">{{ $item->name }}</a>
                            <span class="users-list-date">{{ $item->created_at->format('yy-m-d') }}</span>
                         </li>
                    @endforeach


                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ '/admin/stores' }}">{{ trans('admin.view_all') }}</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">{{ trans('admin.latest_items') }}</h3>

                    <div class="card-tools">
                      {{-- <span class="badge badge-danger">8 New Members</span> --}}
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>

                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    {{-- <ul class="users-list clearfix">
                    @foreach (\App\Models\Product::orderBy('id', 'desc')->paginate(4) as $item)
                        <li>
                            <img src="{{ imageDo($item->logo) }}" alt="User Image">
                            <a class="users-list-name">{{ $item->name }}</a>
                            <span class="users-list-date">{{ $item->created_at->format('yy-m-d') }}</span>
                         </li>
                    @endforeach


                    </ul> --}}


                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach (\App\Models\Product::orderBy('id', 'desc')->paginate(4) as $item)
                        <li class="item">
                          <div class="product-img">
                            <img src="{{ imageDo($item->main_image) }}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{ $item->title }}
                                    @if ($item->show  =='pending')
                                    <span class="badge badge-warning float-right">{{ trans('admin.pending') }}</span></a>

                                    @elseif ($item->show  =='approved')
                                    <span class="badge badge-info float-right">{{ trans('admin.approved') }}</span></a>

                                    @elseif ($item->show  =='not active')
                                    <span class="badge badge-primary float-right">{{ trans('admin.not active') }}</span></a>

                                    @elseif ($item->show  =='active')
                                    <span class="badge badge-success float-right">{{ trans('admin.active') }}</span></a>


                                    @elseif ($item->show  =='delete')
                                    <span class="badge badge-danger float-right">{{ trans('admin.delete') }}</span></a>

                                    @endif

                            <span class="product-description">
                            {{ presentPrice($item->price) }}
                            </span>
                            <span class="product-description">
                                {{$item->store->name }}
                                </span>
                          </div>
                        </li>
                        @endforeach
                        <!-- /.item -->

                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ '/admin/products' }}">{{ trans('admin.view_all') }}</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>

              <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('admin.Canceled_orders')}}</h3>
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
                                <th class="text-center"> {{trans('shop.shop_name')}}</th>
                                <th class="text-center">{{trans('shop.status')}}</th>
                                {{-- <th class="text-center">{{trans('shop.progress')}}</th> --}}

                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items_cancel =App\Models\OrderProduct::orderBy('id', 'desc')->where('confirm','yes')->where(function ($q){
                                $q->where('shipped', '7')->orWhere('shipped', '6');
                            })->paginate(4) as $item)

                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td class="text-center">{{$item->order_id}}</td>
                                    <td class="text-center">{{$item->order->billing_name}}</td>
                                    <td class="text-center">{{$item->product->title}}</td>
                                    <td class="text-center">{{$item->store->name}}</td>
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

                                </tr>

                            @endforeach


                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="d-flex justify-content-end">
                            {!! $items_cancel->appends(['sort' => 'id'])->links("pagination::bootstrap-4") !!}
                            {{-- {!! $items->appends(['sort' => 'shipped'])->links("pagination::bootstrap-4") !!} --}}

                        </div>


                    </div>

                    {{--                {{$items->links('pagination pagination-sm')}}--}}
                </div>

              </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- AREA CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('admin.shops_users') .now()->year}}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            {!! $chart04->container() !!}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- PIE CHART -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">{{trans('admin.sales') .now()->year}}</h3>

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


@endsection
