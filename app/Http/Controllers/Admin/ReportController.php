<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\Admin\ReportsDatatables;
use App\Http\Controllers\Controller;
use App\Mail\Admin\MonthStore;
use App\Models\OrderProduct;
use App\Models\Report;
use App\Models\Store;
use Illuminate\Support\Facades\Mail;
use PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReportsDatatables $admin)
    {
        return $admin->render('admin.reports.index', ['title' => trans('admin.report')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$title =trans('admin.report');

        $now = Carbon::now()->format('yy-m');
        return view('admin.reports.create',compact('title','now'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    //    dd($request->all());
        $this->validate(request(), [
            'date' => 'required',
//            'store_id' => 'required',


        ]);
        $shops = Store::all();

        foreach ($shops as $shop) {
            $report = new Report();
            $report->date = $request->date;
            $report->store_id = $shop->id;
            $report->percentage = $shop->percentage;

            // for make check is first time or not
//             $check_percent = Report::where('date', $request->date)->where('store_id', $shop->id)->count();
// //            dd($check_percent);
//             if ($check_percent > 0) {

//                 $report->percentage = $shop->percentage;
//             } else {
//                 $report->percentage = 0;

//             }
            $total = OrderProduct::
            where('store_id', $shop->id)
                ->where('confirm', 'yes')
                ->whereBetween('created_at', [Carbon::parse($request->date)->startOfMonth(),
                    Carbon::parse($request->date)->endOfMonth()])
                ->sum('price');

                $count = OrderProduct::
            where('store_id', $shop->id)
                ->where('confirm', 'yes')
                ->whereBetween('created_at', [Carbon::parse($request->date)->startOfMonth(),
                    Carbon::parse($request->date)->endOfMonth()])
                ->count('price');


                // $count = OrderProduct::
                // where('store_id', $shop->id)
                //     ->where('confirm', 'yes')
                //     ->whereBetween('created_at', [Carbon::parse($request->date)->startOfMonth(),
                //         Carbon::parse($request->date)->endOfMonth()])
                //     ->count('price');
            $report->total = $total;
            $report->count = $count;
            $cost = $total * $shop->percentage;
            $report->cost = $cost;
            $report->net_price = $total - $cost;
            $report->save();

            Mail::queue(new MonthStore($report));

        }


        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('months'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);

        $title = trans('admin.report1');
        return view('admin.reports.view', compact('report', 'title'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        dd($id);
        $report = Report::findOrFail($id);

        $title = trans('admin.report1');
        return view('admin.reports.edit', compact('report', 'title'));
//        dd($color);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        dd($request->all());
        $this->validate($request, [


            'date' => 'required',
            'store_id' => 'required',
            'percentage' => 'required|numeric',
            'payment_status' => 'required',

        ], [], [
            'date' => trans('admin.report_month'),
            'store_id' => trans('admin.shop_id'),
            'percentage' => trans('admin.report_percentage'),
            'payment_status' => trans('admin.report_payment_status'),

        ]);


        $report = Report::find($id);


//        $report->date = Carbon::parse($request->date)->format('yy-m');
        $report->date = $request->date;
        $report->store_id = $request->store_id;
        $report->percentage = $request->percentage;
        $report->payment_status = $request->payment_status;


        $total = OrderProduct::where('store_id', $request->store_id)
            ->where('confirm', 'yes')
            ->whereBetween('created_at', [Carbon::parse($request->date)->startOfMonth(),
                Carbon::parse($request->date)->endOfMonth()])
            ->sum('price');
        $report->total = $total;
        $cost = $total * $request->percentage;
        $report->cost = $cost;
        $report->net_price = $total - $cost;

        $report->save();


        session()->flash('success', trans('admin.record_added'));
        return redirect(aurl('months'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reports = Report::find($id);

        $reports->delete();
        session()->flash('success', trans('admin.deleted_record'));
        return redirect(aurl('months'));
    }

    public function downloadPDF($id)
    {
        $report = Report::find($id);
        $title = trans('admin.report1');
        $pdf = PDF::loadView('admin.reports.pdf', compact('report', 'title'))->setPaper('a4', 'portrait');
        return $pdf->download('report' . date('YmdHis') . '.pdf');


    }


}
