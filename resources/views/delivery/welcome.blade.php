@extends('delivery.layouts.app')
@section ('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All Orders</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead>
            <tr>
                <th>Order id</th>
                <th>Order Date</th>
                <th>Customer name</th>
                <th>Customer number </th>
                {{-- <th>Stores Name</th> --}}
                <th>Delivery Type</th>
                <th>Items Counts </th>
                <th>Items Status</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
               <tr>

                <td ><a href="{{route('order.show',Crypt::encrypt($item->id))}}">{{ $item->id }}</a></td>
                <td>{{ $item->created_at->format('d/M/Y') }}</td>
                <td>{{ $item->billing_email }}</td>
                <td>  {{ $item->billing_name }}</td>
                {{-- <td>
                    @foreach (\App\Models\OrderProduct::where('order_id',$item->id)->get() as $s)
                    {{$s->store_id}} <br>

                    @endforeach
                </td> --}}
                <td>

                    @if ( $item->delivery_type == 1)
                        <span class="badge "  style="background-color: #726189; color: white">
                            deliver all  items together
                        </span>
                        @elseif($item->delivery_type == 2)
                        <span class="badge "  style="background-color: #69b1c9; color: black">
                            deliver each item separate
                        </span>
                    @endif

                </td>
                <td>
                 {{ \App\Models\OrderProduct::where('order_id',$item->id)->count() }}


                </td>
                <td>
                    @foreach (\App\Models\OrderProduct::where('order_id',$item->id)->get() as $item )
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
                        <br>
                    @endforeach
                </td>
               </tr>
                @endforeach
            {{-- @foreach($products as $items)

                @foreach ($items as $user)
                    <tr>
                        <td ><a href="{{route('order.show',$user['order_id'])}}">{{$user['order_id']}}</a></td>
                        <td>{{$user['order_date']}}</td>
                        <td>{{$user['customer_name']}}</td>
                        <td>{{$user['customer_phone']}}</td>
                        <td>
                            @foreach ($user['items_products'] as $item )
                            {{$item['item_store_name']}} <br>
                            @endforeach
                        </td>
                        <td>

                            @if ( $user['delivery_type'] == 1)
                                <span class="badge "  style="background-color: #726189; color: white">
                                    deliver all  items together
                                </span>
                                @elseif($user['delivery_type'] == 2)
                                <span class="badge "  style="background-color: #69b1c9; color: black">
                                    deliver each item separate
                                </span>
                            @endif

                        </td>


                        <td>{{$user['items_count']}}</td>
                        <td>
                            @foreach ($user['items_products'] as $item )
                                @if ($item['order_status'] == 0)
                                    <div class="badge badge-secondary">New order</div>
                                @elseif ($item['order_status'] == 1 )
                                    <div class="badge badge-secondary">prepering order</div>
                                @elseif ($item['order_status'] == 2 )
                                    <div class="badge badge-success">order is ready for pickup</div>
                                @elseif ($item['order_status'] == 3 )
                                    <div class="badge badge-warning">delivering the order</div>
                                @elseif ($item['order_status'] == 4 )
                                    <div class="badge badge-danger">pending delivery</div>
                                @elseif ($item['order_status'] == 5 )
                                    <div class="badge badge-primary">order is delivered</div>
                                @elseif ($item['order_status'] == 6 )
                                    <div class="badge badge-dark">cancel order</div>
                                @endif
                                <br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            @endforeach --}}

            </tbody>
            <tfoot>
            <tr>
                <th>Order id</th>
                <th>Order Date</th>
                <th>Customer name</th>
                <th>Customer number </th>
                {{-- <th>Stores Name</th> --}}
                <th>Delivery Type</th>
                <th>Items Counts </th>

                <th>Items Status</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>




@endsection
