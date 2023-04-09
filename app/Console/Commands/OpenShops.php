<?php

namespace App\Console\Commands;

use App\Mail\Style\BeforeDayToOpenShop;
use App\Mail\Style\OpenShop;
use App\Models\Store ;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OpenShops extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'open:shops';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change status for all shops when the dates is = today';

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
        // // return 0;
        // $lastDay = Carbon::now()->subDays(1)->format('yy-m-d');
        // $thisDay = Carbon::now()->format('yy-m-d');

        // $lastDayStores =Store::where('close', 'yes')
        // ->whereDate('date_of_end', Carbon::now()->subDays(1))
        // ->get();
        // // $this->info($lastDayStores);


        $DayStores =Store::where('close', 'yes')
        ->whereDate('date_of_end',Carbon::today())
        ->get();





        // foreach ($lastDayStores as $shop){

            //     Mail::queue(new BeforeDayToOpenShop($shop));
            //     $this->info('Successfully sent  email to shop for auto open shop');

            // }


            foreach ($DayStores as $shop){

                $store = Store::findOrFail($shop->id);
                $store->close= 'no';


                $store->save();
                Mail::queue(new OpenShop($shop));
                // $this->info($DayStores);
            // Log::alert('send ');
            $this->info('Successfully sent  email to shop it is open  '.$shop->name);
         }

    }
}
