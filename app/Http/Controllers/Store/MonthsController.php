<?php

namespace App\Http\Controllers\Store;

use App\DataTables\Store\MonthsDatatables;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MonthsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MonthsDatatables $month)
    {
        return $month->render('store.reports.index', ['title' => trans('shop.report')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = shop()->user()->id;
     $d_id =  Crypt::decrypt($id);


        if ($report = Report::where('store_id', $shop)->find($d_id)) {


            $title = trans('admin.report1');
            return view('store.reports.view', compact('report', 'title'));


        } else {
            return view(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function downloadPDF($id)
    {
        $report = Report::find($id);

        $title = trans('admin.report1');


        $pdf = PDF::loadView('store.reports.pdf', compact('report', 'title'))->setPaper('a4', 'landscape');


        return $pdf->download('report' . date('YmdHis') . '.pdf');


    }
}
