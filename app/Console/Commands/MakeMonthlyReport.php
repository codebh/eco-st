<?php

namespace App\Console\Commands;

use App\Mail\Admin\MonthStore;
use App\Models\OrderProduct;
use App\Models\Report;
use App\Models\Store;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class MakeMonthlyReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:Report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make Monthly Report- to send email for all seller';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;

        $stores =Store::all();
        $now = Carbon::now();
        $lastMonth =  $now->subMonth()->format('yy-m'); // 2022-04
        $lastMonth_format = $now->subMonth();



        foreach ($stores as $item){

            // Report::create([
            //     'date'=>$lastMonth,
            //     'store_id'=>$item->id,
            //     'total'=>$item->id,
            //     'net_price'=>$item->id,
            //     'percentage'=>$item->percentage,
            //     'cost'=>$item->id,
            //     'payment_status'=>0,
            // ]);


            if (Report::where('date',$lastMonth)->where('store_id',$item->id)->exists()) {
                $this->info('this'.$item->name.'already inserted.');

            }else{
                $report = new Report();
                $report->date = $lastMonth;
                $report->store_id = $item->id;
                $report->percentage = $item->percentage;

                $total = OrderProduct::
                where('store_id', $item->id)
                    ->where('confirm', 'yes')
                    ->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(),
                        Carbon::now()->subMonth()->endOfMonth()])
                    ->sum('price');

                $count = OrderProduct::
                where('store_id', $item->id)
                    ->where('confirm', 'yes')
                    ->whereBetween('created_at', [Carbon::now()->subMonth()->startOfMonth(),
                        Carbon::now()->subMonth()->endOfMonth()])
                    ->count('price');

                    $report->total = $total;
                    $report->count = $count;
                    $cost = $total * $item->percentage;
                    $report->cost = $cost;
                    $report->net_price = $total - $cost;
                    $report->payment_status = 0;
                    $report->save();
                    Mail::queue(new MonthStore($report));

                $this->info('Successfully sent monthly report to everyone.');
            }



        }






        // for make check is first time or not
//             $check_percent = Report::where('date', $request->date)->where('store_id', $shop->id)->count();
// //            dd($check_percent);
//             if ($check_percent > 0) {

//                 $report->percentage = $shop->percentage;
//             } else {
//                 $report->percentage = 0;

//             }


            // $count = OrderProduct::
            // where('store_id', $shop->id)
            //     ->where('confirm', 'yes')
            //     ->whereBetween('created_at', [Carbon::parse($request->date)->startOfMonth(),
            //         Carbon::parse($request->date)->endOfMonth()])
            //     ->count('price');




    }
}
