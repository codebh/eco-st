

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
            border-bottom: 1px solid #726189;
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
            color: #726189
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
            border-left: 6px solid #726189
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            /*border-collapse: collapse;*/
            /*border-spacing: 0;*/
            /*margin-bottom: 20px;*/
            /*border: 1px solid;*/
        }

        .invoice table td, .invoice table th {
            padding: 7px;
            border: 1px solid;
            /*background: #eee;*/
            /*border-bottom: 1px solid #fff*/

        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: black;
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
            /*border: none*/
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
            color: #726189;
            font-size: 1.4em;
            font-weight: bold;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
        }

        .invoice table tfoot tr td:first-child {
            border: none;
            /*border: 1px solid;*/
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

{{--    <div class="toolbar hidden-print">--}}
{{--        <div class="text-right">--}}
{{--            <button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>--}}
{{--            <a href="{{aurl('months/PDF/'.$report->id)}}" type="submit" class="btn btn-info">Export as PDF</a>--}}
{{--            <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> </button>--}}
{{--        </div>--}}
{{--        <hr>--}}
{{--    </div>--}}
    <div class="invoice overflow-auto">
        <div style="min-width: 300px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="{{ surl() }}">
                            <img src="{{asset('design/theme/assets/images/Logo-02.png')}}"style="height: 80px;"
                                 data-holder-rendered="true"/>
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="{{url('/')}}" style="color:#726189 ">
                                Tafseel.net
                            </a>
                        </h2>
                        <div> BAHRAIN</div>
                        <div>+(973) 38108673</div>
                        <div>info@tafseel.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light" >INVOICE TO:
                        <h2 class="to">{{$report->store->name}}</h2>
                        </div>
{{--                        <div class="address"> Bahrain</div>--}}
                        <div class="email">{{$report->store->email}}</div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id" style="color:#726189">INVOICE #{{$report->id}}</h1>
{{--                        <div class="date">Month Report: {{$report->date}}</div>--}}
                        <div class="date">From: {{Carbon\Carbon::parse($report->date)->startOfMonth()->toDateString()}}</div>
                        <div class="date">To: {{Carbon\Carbon::parse($report->date)->endOfMonth()->toDateString()}}</div>
                    </div>
                </div>
                <table  cellspacing="0" cellpadding="0">
                    <thead style="background-color: white" class="text-center">
                    <tr>
                        <th>#</th>
                        <th class="text-center"><strong>Customer name</strong></th>
                        <th class="text-center"><strong>Order Id</strong></th>
                        <th class="text-center"><strong>ITEM</strong></th>
                        <th class="text-center"><strong>Qty</strong></th>

                        <th class="text-center"><strong>PRICE</strong></th>
{{--                        <th class="text-center"><strong>ORDER STATUS</strong></th>--}}
                        <th class="text-center"><strong>TAFSEEL %</strong></th>
                        <th class="text-center"><strong>TAFSEEL FEES</strong></th>
                        <th class="text-center"><strong>NET PROFIT (BD)</strong></th>
                    </tr>
                    </thead>
                    <tbody class="text-center">

                        @forelse($items =App\Models\OrderProduct::where('store_id',$report->store_id)
                                ->where('confirm','yes')
                            ->whereBetween('created_at',[\Carbon\Carbon::parse($report->date)->startOfMonth(),
                                                          \Carbon\Carbon::parse($report->date)->endOfMonth()])


                           ->get() as $item)
                            <tr>
                                <td class="">{{$loop->iteration}}</td>
                                <td class="text-center"><h3>

                                            {{$item->order->billing_name}}

                                    </h3>
{{--                                    <a target="_blank" href="https://www.youtube.com/channel/UC_UMEcP_kF0z4E6KbxCpV1w">--}}
{{--
{{--                                    </a>--}}

                                </td>
                                <td class="">
                                    <h3>{{$item->order_id}}</h3></td>
                                <td class="">
                                  <h3>  {{$item->product->title}}</h3>
                                </td>
                                <td class="">
                             <h3>      1</h3>
                                </td>

                                <td class=""> <h3> {{ presentPrice($item->price)}}</h3></td>
{{--                                <td class="">--}}
{{--                                    @if ($item->shipped == 0)--}}
{{--                             <h3>       {{trans('user.orderStep')}}</h3>--}}
{{--                                    @elseif ($item->shipped == 1)--}}
{{--                                 <h3>   {{trans('user.orderStep1')}}</h3>--}}

{{--                                    @elseif ($item->shipped == 2)--}}
{{--                               <h3>    {{trans('user.orderStep2')}}</h3>--}}
{{--                                    @elseif ($item->shipped == 2)--}}
{{--                              <h3>     {{trans('user.orderStep3')}}</h3>--}}

{{--                                    @endif--}}
{{--                                </td>--}}
                                <td class=""><h3>{{getPercentage($report->percentage)}}</h3></td>
                                <td class=""><h3>{{presentPrice(getPrice1($item->price,$report->percentage))}}</h3></td>
                                <td class=""><h3>{{getTotal($item->price,getPrice1($item->price,$report->percentage))}}</h3></td>
{{--                                <td class=""><h3>{{$item->price}}</h3></td>--}}


                            </tr>
                        @empty
                           <tr>
                              <td colspan="9">
                                  <h4 class="alert-heading">No Records</h4>

                              </td>
                           </tr>
                        @endforelse



                    </tbody>
                    <tfoot>
                    <tr>

                        <td colspan="8">SUBTOTAL</td>
                        <td>{{presentPrice($items->sum('price'))}}</td>
                    </tr>
                    <tr>

                        <td colspan="8">TAFSEEL FEES</td>
                        <td>{{presentPrice($report->cost)}}</td>


                    </tr>
                    <tr>

                        <td colspan="8">GRAND TOTAL</td>
                        <td>{{presentPrice($report->net_price)}}</td>
                    </tr>
                    </tfoot>
                </table>
                <div class="thanks">Thank you!</div>
                <p>

                    This invoice includes all the orders that are made via Tafseel during the above-mentioned period, <br>
                     The prices of the canceled orders are not subtracted from the invoice.
                </p>

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
    window.addEventListener("load", window.print());
</script>
{{--<script>--}}
{{--    $('#printInvoice').click(function () {--}}
{{--        Popup($('.invoice')[0].outerHTML);--}}

{{--        function Popup(data) {--}}
{{--            window.print();--}}
{{--            return true;--}}
{{--        }--}}
{{--    });--}}
{{--</script>--}}
</html>
