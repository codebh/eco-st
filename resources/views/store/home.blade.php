{{--@extends('store.index')--}}

{{--@section('content')--}}
{{--    <div class="card">--}}
{{--        <div class="card-header">--}}
{{--            <h3 class="card-title">{{trans('shop.y_products')}}</h3>--}}

{{--            --}}{{--<div class="card-tools">--}}
{{--            --}}{{--<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">--}}
{{--            --}}{{--<i class="fas fa-minus"></i></button>--}}
{{--            --}}{{--<button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">--}}
{{--            --}}{{--<i class="fas fa-times"></i></button>--}}
{{--            --}}{{--</div>--}}
{{--        </div>--}}
{{--        <div class="card-body p-0">--}}
{{--            <table class="table table-striped projects">--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th class="text-center" style="width: 1%">--}}
{{--                        ID--}}
{{--                    </th>--}}
{{--                    <th class="text-center" style="width: 8%">--}}
{{--                        {{trans('shop.title')}}--}}
{{--                    </th>--}}
{{--                    <th class="text-center" style="width: 8%">--}}
{{--                        {{trans('shop.content')}}--}}
{{--                    </th>--}}
{{--                    <th class="text-center" style="width: 10%">--}}
{{--                        {{trans('shop.photo')}}--}}
{{--                    </th>--}}
{{--                    <th style="width: 5%" class="text-center">--}}
{{--                        {{trans('shop.colors')}}--}}
{{--                    </th>--}}
{{--                    <th style="width: 5%" class="text-center">--}}
{{--                        {{trans('shop.price')}}--}}
{{--                    </th>--}}
{{--                    <th style="width: 5%" class="text-center">--}}
{{--                        {{trans('shop.price_offer')}}--}}
{{--                    </th>--}}
{{--                    <th style="width: 5%" class="text-center">--}}
{{--                        {{trans('shop.status')}}--}}
{{--                    </th>--}}
{{--                    <th style="width: 5%" class="text-center">--}}
{{--                        {{trans('shop.show')}}--}}
{{--                    </th>--}}
{{--                    <th style="width: 5%" class="text-center">--}}
{{--                        {{trans('shop.edit')}}--}}
{{--                    </th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
{{--                <tbody>--}}
{{--                @if (count($products) > 0)--}}
{{--                    @forelse($products as $product)--}}
{{--                        <tr>--}}
{{--                            <td class="text-center">--}}
{{--                                {{$product->id}}--}}
{{--                            </td>--}}
{{--                            <td class="text-center">--}}
{{--                                {{$product->title}}--}}
{{--                            </td>--}}
{{--                            <td class="text-center">--}}
{{--                                {{$product->content}}--}}
{{--                            </td>--}}
{{--                            <td class="text-center">--}}
{{--                                @foreach($product->image_data()->get() as $image)--}}
{{--                                    <li class="list-inline-item">--}}
{{--                                        @if ($loop->first)--}}
{{--                                            <img alt="Avatar" data-toggle="modal"--}}
{{--                                                 data-target="#exampleModalCenter-{{$product->id}}" class="table-avatar"--}}
{{--                                                 src="{{asset('storage/product/'.$product->id.'/'.$image->image_key)}}"--}}
{{--                                                 style="height: 80px; width: 80px">--}}
{{--                                        @endif--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                                <div class="modal fade" id="exampleModalCenter-{{$product->id}}" tabindex="-1"--}}
{{--                                     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title"--}}
{{--                                                    id="exampleModalLongTitle">{{$product->title}}</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                        aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <div id="myCarousel" class="carousel slide" data-ride="carousel">--}}
{{--                                                    <ol class="carousel-indicators">--}}
{{--                                                        @foreach($product->image_data()->get() as $key => $slider)--}}
{{--                                                            <li data-target="#myCarousel"--}}
{{--                                                                data-slide-to="{{$slider->image_key}}"--}}
{{--                                                                class="active"></li>--}}
{{--                                                        @endforeach--}}
{{--                                                    </ol>--}}
{{--                                                    <div class="carousel-inner">--}}
{{--                                                        @foreach($product->image_data()->get() as $key => $slider)--}}
{{--                                                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">--}}
{{--                                                                <img--}}
{{--                                                                    src="{{asset('storage/product/'.$product->id.'/'. $slider->image_key)}}"--}}
{{--                                                                    class="d-block w-100" alt="...">--}}
{{--                                                            </div>--}}
{{--                                                        @endforeach--}}
{{--                                                    </div>--}}
{{--                                                    <a class="carousel-control-prev" href="#myCarousel" role="button"--}}
{{--                                                       data-slide="prev">--}}
{{--                                                        <span class="carousel-control-prev-icon"--}}
{{--                                                              aria-hidden="true">     </span>--}}
{{--                                                        <span class="sr-only">Previous</span>--}}
{{--                                                    </a>--}}
{{--                                                    <a class="carousel-control-next" href="#myCarousel" role="button"--}}
{{--                                                       data-slide="next">--}}
{{--                                                        <span class="carousel-control-next-icon"--}}
{{--                                                              aria-hidden="true"></span>--}}
{{--                                                        <span class="sr-only">Next</span>--}}
{{--                                                    </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                            </td>--}}
{{--                            <td class="project_progress text-center">--}}

{{--                                <!-- Modal -->--}}
{{--                                @if (count($product->other_data()->get()) > 1)--}}
{{--                                    <a data-toggle="modal" data-target="#exampleModal{{$product->id}}">--}}

{{--                                        <img src="{{asset('img/wheel.png')}}" alt="" style="max-width: 80px"--}}
{{--                                             class=" img-responsive img-fluid">--}}
{{--                                    </a>--}}
{{--                                @else--}}
{{--                                    @foreach($product->other_data()->get() as $item)--}}
{{--                                        <label class="badge" style="background-color: {{$item->color->color}}">--}}
{{--                                            {{$item->color->name_ar}}--}}
{{--                                        </label><br>--}}
{{--                                    @endforeach--}}

{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td class="project-state text-center">--}}
{{--                                {{ presentPrice($product->price)}}--}}
{{--                            </td>--}}
{{--                            <td class="project-state text-center">--}}
{{--                                {{presentPrice($product->price_offer)}}--}}
{{--                            </td>--}}
{{--                            <td class="project-state text-center">--}}
{{--                                @if ($product->status == "active")--}}
{{--                                    <span class="badge badge-success">فعال</span>--}}
{{--                                @else--}}
{{--                                    <span class="badge badge-danger">غير فعال</span>--}}

{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td class="project-state text-center">--}}
{{--                                @if ($product->show == "active")--}}
{{--                                    <span class="badge badge-success">فعال</span>--}}
{{--                                @else--}}
{{--                                    <span class="badge badge-danger">غير فعال</span>--}}

{{--                                @endif--}}
{{--                            </td>--}}
{{--                            <td class="project-actions text-center">--}}

{{--                            <!-- Button trigger modal -->--}}
{{--                                <button type="button" class="btn btn-primary" data-toggle="modal"--}}
{{--                                        data-target="#exampleModalCenter1-{{$product->id}}">--}}
{{--                                    <i class="fa fa-edit"></i>--}}
{{--                                </button>--}}

{{--                                <!-- Modal -->--}}
{{--                                <div class="modal fade" id="exampleModalCenter1-{{$product->id}}" tabindex="-1"--}}
{{--                                     role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--                                    <div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title" id="exampleModalLongTitle">التعديل</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal"--}}
{{--                                                        aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <h2><i class="fa fa-money-bill"></i>{{trans('shop.item_price')}} </h2>--}}
{{--                                                <hr>--}}
{{--                                                {!! Form::open(['url'=>surl('showShop/'.$product->id),'method'=>'put','files'=>true]) !!}--}}
{{--                                                --}}{{--{!! Form::open(['url'=>surl('showShop/',$product->id),'method'=>'put']) !!}--}}
{{--                                                --}}{{--                                        {!! Form::open(['url'=>aurl('colors/'.$color->id),'method'=>'put']) !!}--}}

{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            {!! Form::label('price',trans('shop.price')) !!}--}}
{{--                                                            {!! Form::text('price',$product->price,['class'=>'form-control']) !!}--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            {!! Form::label('price_offer',trans('shop.price_offer')) !!}--}}
{{--                                                            {!! Form::text('price_offer',$product->price_offer,['class'=>'form-control']) !!}--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                </div>--}}
{{--                                                <div class="row">--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            {!! Form::label('status',trans('shop.status')) !!}--}}
{{--                                                            {!! Form::select('status',--}}
{{--                                                            ['not active'=>trans('shop.not active_sale'),'active'=>trans('shop.active_sale')]--}}
{{--                                                            ,$product->status,['class'=>'form-control']) !!}--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="col-md-6">--}}
{{--                                                        <div class="form-group">--}}
{{--                                                            {!! Form::label('show',trans('shop.show')) !!}--}}
{{--                                                            {!! Form::select('show',--}}
{{--                                                            ['not active'=>trans('shop.not active_show'),'active'=>trans('shop.active_show')]--}}
{{--                                                            ,$product->show,['class'=>'form-control']) !!}--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <button class="btn btn-success btn-block btn-rounded" type="submit"><i class="fa fa-save"></i></button>--}}
{{--                                                {!! Form::submit(trans('shop.update_price'),['class'=>'btn btn-success btn-block btn-rounded']) !!}--}}
{{--                                                {!! Form::close() !!}--}}


{{--                                                <hr>--}}
{{--                                                <h2><i class="fa fa-fill-drip"></i> {{trans('shop.items_color')}} </h2>--}}
{{--                                                <hr>--}}
{{--                                                <table class="table table-bordered">--}}

{{--                                                    <tbody>--}}

{{--                                                    @foreach($product->other_data()->get() as $item)--}}
{{--                                                        {!! Form::open(['url'=>surl('showShop/color/'.$item->id),'method'=>'put','files'=>true]) !!}--}}

{{--                                                        <tr>--}}
{{--                                                            <td>{{$loop->iteration}}</td>--}}
{{--                                                            <td>{{$item->color->name_ar}}</td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span--}}
{{--                                                                    style="width: 25px;height: 25px;background-color: {{$item->color->color}} ;display: block;"></span>--}}
{{--                                                            </td>--}}
{{--                                                            <td>--}}


{{--                                                                {!! Form::select('data_value',  ['0'=>trans('shop.not active_color'),'1'=>trans('shop.active_color')]--}}
{{--                                                              ,$item->data_value,['class'=>'form-control']) !!}--}}

{{--                                                            </td>--}}
{{--                                                            <td>--}}
{{--                                                                @if ($item->data_value ==0)--}}
{{--                                                                    <label class="badge badge-danger">غير فعال</label>--}}
{{--                                                                @else--}}
{{--                                                                    <label class="badge badge-success"> فعال</label>--}}

{{--                                                                @endif--}}

{{--                                                            </td>--}}

{{--                                                            <td>--}}
{{--                                                                <button class="btn btn-rounded btn-primary"><i--}}
{{--                                                                        class="fa fa-list"></i></button>--}}

{{--                                                            </td>--}}
{{--                                                        </tr>--}}

{{--                                                        {!! Form::close() !!}--}}
{{--                                                    @endforeach--}}

{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                                <h2><i class="fa fa-fill-drip"></i> {{trans('shop.items_color_s')}}--}}
{{--                                                </h2>--}}
{{--                                                <hr>--}}
{{--                                                <table class="table table-bordered">--}}

{{--                                                    <tbody>--}}

{{--                                                    @foreach($product->other_color()->get() as $item)--}}
{{--                                                        {!! Form::open(['url'=>surl('showShop/colorsShela/'.$item->id),'method'=>'put','files'=>true]) !!}--}}

{{--                                                        <tr>--}}
{{--                                                            <td>{{$loop->iteration}}</td>--}}
{{--                                                            <td>{{$item->color->name_ar}}</td>--}}
{{--                                                            <td align="center">--}}
{{--                                                                <span--}}
{{--                                                                    style="width: 25px;height: 25px;background-color: {{$item->color->color}} ;display: block;"></span>--}}
{{--                                                            </td>--}}
{{--                                                            <td>--}}


{{--                                                                {!! Form::select('color_show',  ['0'=>trans('shop.not active_color'),'1'=>trans('shop.active_color')]--}}
{{--                                                              ,$item->color_show,['class'=>'form-control']) !!}--}}

{{--                                                            </td>--}}
{{--                                                            <td>--}}
{{--                                                                @if ($item->color_show ==0)--}}
{{--                                                                    <label class="badge badge-danger">غير فعال</label>--}}
{{--                                                                @else--}}
{{--                                                                    <label class="badge badge-success"> فعال</label>--}}

{{--                                                                @endif--}}

{{--                                                            </td>--}}

{{--                                                            <td>--}}
{{--                                                                <button class="btn btn-rounded btn-primary"><i--}}
{{--                                                                        class="fa fa-list"></i></button>--}}

{{--                                                            </td>--}}
{{--                                                        </tr>--}}

{{--                                                        {!! Form::close() !!}--}}
{{--                                                    @endforeach--}}

{{--                                                    </tbody>--}}
{{--                                                </table>--}}
{{--                                            </div>--}}

{{--                                            <div class="modal-footer">--}}
{{--                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">--}}
{{--                                                    Close--}}
{{--                                                </button>--}}

{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @empty--}}
{{--                        <tr>no data</tr>--}}
{{--                    @endforelse--}}
{{--                @endif--}}
{{--                </tbody>--}}
{{--            </table>--}}
{{--        </div>--}}
{{--        <!-- /.card-body -->--}}
{{--    </div>--}}




{{--@endsection--}}

@extends('store.index')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{$title}} </h1>
            </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
    <style>
        .page-item.active .page-link {
            z-index: 1;
            color: black;
            background-color: #FFCE53;
            border-color: #007bff;
        }
        .btn-success {
        color: #ffffff;
        background-color: #726189;
        border-color: #726189;
        box-shadow: 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-primary {
            color: #ffffff;
            background-color: #317087;
            border-color: #317087;
            box-shadow: 0 1px 1px rgb(0 0 0 / 8%);
        }
            .bg-success, .alert-success, .label-success, .bg-success a, .alert-success a, .label-success a {
                color: #ffffff !important;
            }

            .alert-success {
                border-color: #726189;
            }
            .bg-success, .alert-success, .label-success {
                background-color: #726189 !important;
            }
            .alert .close, .alert .mailbox-attachment-close {
            color: white;
            /* opacity: .2; */
            }
    </style>

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
            $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
})
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
