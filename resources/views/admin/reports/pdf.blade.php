{{--@extends('admin.index')--}}
{{--@section('content')--}}

{{--    <section class="content">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3 class="card-title">{{$title}}..{{$report->date}}</h3>--}}
{{--                    </div>--}}
{{--                    <!-- /.card-header -->--}}
{{--                    <div class="card-body">--}}
{{--                        --}}{{--                        {{$report->date}}--}}
{{--                        --}}{{--                        $fromDate = Carbon::create($request->date)->startOfMonth()->toDateString();--}}
{{--                        --}}{{--                        $toDate =Carbon::create($request->date)->endOfMonth()->toDateString();--}}
{{--                        @if (\App\Model\OrderProduct::whereBetween($report->date,[\Carbon\Carbon::parse($report->date)->startOfMonth(),--}}
{{--                                                                                  \Carbon\Carbon::parse($report->date)->endOfMonth()]))--}}
{{--                            @forelse(\App\Model\OrderProduct::where('shop_id',$report->shop_id)--}}
{{--                                ->whereBetween('created_at',[\Carbon\Carbon::parse($report->date)->startOfMonth(),--}}
{{--                                                              \Carbon\Carbon::parse($report->date)->endOfMonth()])--}}


{{--                               ->get() as $item)--}}
{{--                                {{$item->order->billing_name}} <br>--}}
{{--                            @empty--}}
{{--                                <div class="alert alert-danger" role="alert">--}}
{{--                                    <h4 class="alert-heading">no have record</h4>--}}
{{--                                    <p></p>--}}
{{--                                    <p class="mb-0"></p>--}}
{{--                                </div>--}}
{{--                            @endforelse--}}
{{--                        @else--}}
{{--                            not have--}}

{{--                        @endif--}}



{{--                        --}}{{--                        @if(count(\App\Model\OrderProduct::whereBetween($color->date,\Carbon\Carbon::create($color->date)->startOfMonth()--}}
{{--                        --}}{{--,\Carbon\Carbon::create($color->date)->endOfMonth())))--}}
{{--                        --}}{{--                            has one and more--}}
{{--                        --}}{{--                        @else--}}
{{--                        --}}{{--no have--}}
{{--                        --}}{{--                        @endif--}}

{{--                        --}}{{--            {!! Form::open(['url'=>aurl('colors/'.$color->id),'method'=>'put']) !!}--}}
{{--                        --}}{{--            <div class="form-group">--}}
{{--                        --}}{{--                {!! Form::label('name_ar',trans('admin.city_name_ar')) !!}--}}
{{--                        --}}{{--                {!! Form::text('name_ar',$color->name_ar,['class'=>'form-control']) !!}--}}
{{--                        --}}{{--            </div>--}}
{{--                        --}}{{--            <div class="form-group">--}}
{{--                        --}}{{--                {!! Form::label('name_en',trans('admin.city_name_en')) !!}--}}
{{--                        --}}{{--                {!! Form::text('name_en',$color->name_en,['class'=>'form-control']) !!}--}}
{{--                        --}}{{--            </div>--}}

{{--                        --}}{{--            <div class="form-group">--}}
{{--                        --}}{{--                {!! Form::label('color',trans('admin.color')) !!}--}}
{{--                        --}}{{--                {!! Form::color('color',$color->color,['class'=>'form-control']) !!}--}}
{{--                        --}}{{--            </div>--}}


{{--                        --}}{{--            {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}--}}
{{--                        --}}{{--            {!! Form::close() !!}--}}
{{--                    </div>--}}
{{--                    <!-- /.card-body -->--}}
{{--                </div>--}}
{{--                <!-- /.card -->--}}
{{--            </div>--}}
{{--            <!-- /.col -->--}}
{{--        </div>--}}
{{--        <!-- /.row -->--}}
{{--    </section>--}}
{{--    <!-- /.content -->--}}




{{--@endsection--}}


        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Month reports</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        #invoice {
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: -100px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td, .invoice table th {
            padding: 7px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty, .invoice table .total, .invoice table .unit {
            text-align: center;
            font-size: 0.7em
        }

        .invoice table .no {
            color: #fff;
            font-size: 0.7em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

        @media print {
            .invoice {
                font-size: 11px !important;
                overflow: hidden !important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice > div:last-child {
                page-break-before: always
            }
        }
    </style>
</head>
<body>

<!--Author      : @arboshiki-->
<div id="invoice">


    <div class="invoice overflow-auto">
        <div style="min-width: 300px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://lobianijs.com">
                            <img src="http://lobianijs.com/lobiadmin/version/1.0/ajax/img/logo/lobiadmin-logo-text-64.png"
                                 data-holder-rendered="true"/>
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="#">
                                Anaqti
                            </a>
                        </h2>
                        <div> BAHRAIN</div>
                        <div>+(973) 17221722</div>
                        <div>support-anaqti@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">INVOICE TO:</div>
                        <h2 class="to">{{$report->store->name}}</h2>
                        <div class="address"> Bahrain</div>
                        <div class="email"><a href="mailto:#">{{$report->store->email}}</a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE #{{$report->id}}</h1>
                        <div class="date">Month Report: {{$report->date}}</div>
                        <div class="date">Date of
                            Report: {{Carbon\Carbon::parse($report->date)->startOfMonth()->toDateString()}}</div>
                        <div class="date">Due
                            Date: {{Carbon\Carbon::parse($report->date)->endOfMonth()->toDateString()}}</div>
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Customer name</th>
                        <th class="text-center">item</th>
                        <th class="text-center">Qty</th>
                        <th class="text-center">item Price</th>
                        <th class="text-center">confrim</th>
                        <th class="text-center">A %</th>
                        <th class="text-center">A Price</th>
                        <th class="text-center">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if (\App\Models\OrderProduct::whereBetween($report->date,[\Carbon\Carbon::parse($report->date)->startOfMonth(),
                                                                                 \Carbon\Carbon::parse($report->date)->endOfMonth()]))
                        @forelse($items =App\Models\OrderProduct::where('store_id',$report->store_id)
                                ->where('confirm','yes')
                            ->whereBetween('created_at',[\Carbon\Carbon::parse($report->date)->startOfMonth(),
                                                          \Carbon\Carbon::parse($report->date)->endOfMonth()])


                           ->get() as $item)
                            {{--                            {{$item->order->billing_name}} <br>--}}
                            <tr>
                                <td class="no">{{$loop->iteration}}</td>
                                <td class="text-center">

                                        {{$item->order->billing_name}}


                                    {{--                                    <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">--}}
                                    {{--
                                    {{--                                    </a>--}}

                                </td>
                                <td class="qty">
                                    {{$item->product->title}}
                                </td>
                                <td class="qty">
                                    1
                                </td>
                                <td class="unit">  {{presentPrice($item->price)}}</td>
                                <td class="qty">
                                    @if ($item->confirm == 'yes')
                                        <label  class="badge badge-success">yes</label>
                                    @else
                                        <label  class="badge badge-danger">no</label>
                                    @endif
                                </td>
                                <td class="qty">{{getPercentage($report->percentage)}}</td>
                                <td class="qty">{{presentPrice(getPrice1($item->price,$report->percentage))}}</td>
                                <td class="total">{{getTotal($item->price,getPrice1($item->price,$report->percentage))}}</td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                <h4 class="alert-heading">no have record</h4>
                                <p></p>
                                <p class="mb-0"></p>
                            </div>
                        @endforelse
                    @else
                        not have

                    @endif



                    </tbody>
                    <tfoot>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="4">SUBTOTAL</td>
                        <td>{{presentPrice($items->sum('price'))}}</td>
                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="4">ANAQTI COST</td>
                        <td>{{presentPrice($report->cost)}}</td>

                    </tr>
                    <tr>
                        <td colspan="4"></td>
                        <td colspan="4">GRAND TOTAL</td>
                        <td>{{presentPrice($report->net_price)}}</td>
                    </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <div class="notices">
                    <div>NOTICE:</div>
                    <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                </div>
            </main>
            <footer>
                Invoice was created on a computer and is valid without the signature and seal.
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>
</body>
<script>
    $('#printInvoice').click(function () {
        Popup($('.invoice')[0].outerHTML);

        function Popup(data) {
            window.print();
            return true;
        }
    });
</script>
</html>
