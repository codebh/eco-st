@extends('delivery.layouts.app')
@section('content')

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Customer Information</h3>


        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                    {{-- @foreach($order as $item) --}}
                        <div class="row">


                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Id</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">   {{$order->id}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted"> Name</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">   {{$order->billing_name}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                {{-- <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Address</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$item['customer_address']}}</span>
                                    </div>
                                </div> --}}
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Phone Number</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_phone}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Country</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_country}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">City</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_city}}</span>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Province</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$item['customer_province']}}</span>
                                    </div>
                                </div>
                            </div> --}}



                            @if ($order->billing_country == 'bahrain')
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Home</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_buliding}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Road</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_road}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Block</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_block}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-3">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Speical Direcstions</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_speical_direcstions}}</span>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Address</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_address}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Address2</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_address2}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">province</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_province}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">Postal Code</span>
                                        <span
                                            class="info-box-number text-center text-muted mb-0">{{$order->billing_postalcode}}</span>
                                    </div>
                                </div>
                            </div>



                            @endif
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">Delivery Type</span>
                                        @if ( $order->delivery_type == 1)
                                        <span class="badge "  style="background-color: #726189; color: white">
                                            deliver all  items together
                                        </span>
                                        @elseif($order->delivery_type == 2)
                                        <span class="badge "  style="background-color: #69b1c9; color: black">
                                            deliver each item separate
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">Delivery Price</span>

                                        @if ( $order->delivery_type == 1)
                                        <button type="button" style="background-color: #726189; color: white" class="btn"style data-toggle="modal" data-target="#exampleModal">
                                            Delivery Price
                                          </button>

                                        @elseif($order->delivery_type == 2)

                                        <button type="button"  style="background-color: #69b1c9; color: black" class="btn"style data-toggle="modal" data-target="#exampleModal">
                                            Delivery Price
                                          </button>
                                        @endif


                                          <!-- Modal -->
                                           <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLabel">Delivery Price</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if ($order->billing_country == 'bahrain')
                                                        @if ( $order->delivery_type ==1)
                                                        <table class="table table-bordered  table-head-fixed text-nowrap">
                                                            <thead class="thead-inverse">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>item</th>


                                                                </tr>
                                                            </thead>
                                                                <tbody>

                                                                    @foreach($items as $item )
                                                                    <tr>
                                                                        <td scope="row">{{$loop->iteration }}</td>
                                                                        <td>{{ $item->product->title }}</td>


                                                                    </tr>
                                                                    @endforeach

                                                                    <tr>
                                                                        <td >total delivery price</td>
                                                                        <td colspan="1">1 BD</td>

                                                                    </tr>
                                                                </tbody>
                                                        </table>


                                                        @elseif($order->delivery_type == 2)

                                                        <table class="table table-bordered  table-head-fixed text-nowrap">
                                                            <thead class="thead-inverse">
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>item</th>
                                                                    <th>price</th>


                                                                </tr>
                                                            </thead>
                                                                <tbody>

                                                                    @foreach($items as $item )
                                                                    <tr>
                                                                        <td scope="row">{{$loop->iteration }}</td>
                                                                        <td>{{ $item->product->title }}</td>
                                                                        <td>1 BD</td>


                                                                    </tr>

                                                                    @endforeach
                                                                    <tr>
                                                                        <td colspan="2">total delivery price</td>
                                                                        <td colspan="1">

                                                                          {{  count($items ) * 1  }} BD



                                                                        </td>

                                                                    </tr>
                                                                </tbody>
                                                        </table>

                                                        @endif
                                                    @else


                                                    <table class="table table-bordered  table-head-fixed text-nowrap">
                                                        <thead class="thead-inverse">
                                                            <tr>
                                                                <th>#</th>
                                                                <th>item</th>
                                                                <th>price</th>


                                                            </tr>
                                                        </thead>
                                                            <tbody>

                                                                @foreach($items as $item )
                                                                <tr>
                                                                    <td scope="row">{{$loop->iteration }}</td>
                                                                    <td>{{ $item->product->title }}</td>
                                                                    <td>3.5 BD</td>


                                                                </tr>

                                                                @endforeach
                                                                <tr>
                                                                    <td colspan="2">total delivery price</td>
                                                                    <td colspan="1">
                                                                        {{-- 0.9 BD --}}


                                                                        {{ count($items ) * 3.5  }} BD



                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                    </table>



                                                    @endif

                                                </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>





                                    </div>
                                </div>
                            </div>





                        </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h3 class="card-title">Order details <span class="badge badge-primary">{{$item['items_count']}}</span></h3> --}}
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 300px;">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Store</th>
                                            <th>store mobile</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($items as $item )
                                                <tr>
                                                    <td>{{$item->id}}</td>
                                                    <td>{{$item->product->title}}</td>
                                                    <td>{{$item->store->name}}</td>
                                                    <td>{{$item->store->mobile}}</td>
                                                    <td>
                                                        @if ($item->shipped == 0)
                                                            <div class="badge badge-secondary">New order</div>
                                                        @elseif ($item->shipped == 1 )
                                                            <div class="badge badge-secondary">prepering order</div>
                                                        @elseif ($item->shipped == 2 )
                                                            <div class="badge badge-success">order is ready for pickup</div>
                                                        @elseif ($item->shipped == 3 )
                                                            <div class="badge badge-warning">delivering the order</div>
                                                        @elseif ($item->shipped == 4 )
                                                            <div class="badge badge-danger">pending delivery</div>
                                                        @elseif ($item->shipped == 5 )
                                                            <div class="badge badge-primary">order is delivered</div>
                                                        @elseif ($item->shipped == 6 )
                                                            <div class="badge badge-dark">cancel order</div>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default{{$item->id}}">
                                                         Action
                                                        </button>
                                                        <div class="modal fade" id="modal-default{{$item->id}}" data-backdrop="false">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">{{$item->product->title}}----- {{$item->store->name}}</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <h2>Change Item status</h2>
                                                                        <hr>
                                                                        <form action="{{ route('order.update', Crypt::encrypt($item->id) )}}" method="post">
                                                                            {{csrf_field()}}
                                                                            {{-- @method('PUT') --}}
                                                                            @if ($item->shipped == 0)
                                                                                <div class="badge badge-secondary">this status cannot be updated</div>
                                                                            @elseif ($item->shipped == 1 )
                                                                                <div class="badge badge-secondary">this status cannot be updated</div>
                                                                            @elseif ($item->shipped == 2 )
                                                                                <label for="">item Status</label>
                                                                                <select class="form-control" name="shipped">
                                                                                    <option value="3">delivering the order</option>
                                                                                </select>

                                                                            @elseif ($item->shipped == 3 )
                                                                                <label for="">item Status</label>
                                                                                <select class="form-control" name="shipped">
                                                                                    <option value="4">pending delivery</option>
                                                                                    <option value="5">order is delivered</option>
                                                                                </select>
                                                                            @elseif ($item->shipped == 4 )
                                                                                <label for="">item Status</label>
                                                                                <select class="form-control" name="shipped">
                                                                                    <option value="5">order is delivered</option>
                                                                                </select>

                                                                            @elseif ($item->shipped == 5 )
                                                                                <div class="badge badge-primary">order is delivered</div>
                                                                            @elseif ($item->shipped == 6 )
                                                                                <div class="badge badge-dark">cancel order</div>
                                                                            @endif

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                        @if ($item->shipped > 1  and  $item->shipped < 5 )

                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        @else

                                                                        @endif
                                                                    </div>
                                                                        </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

@endsection
