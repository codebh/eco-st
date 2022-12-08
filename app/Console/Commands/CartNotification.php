<?php

namespace App\Console\Commands;

use App\Mail\Style\CartNotification as StyleCartNotification;
use App\Models\Cart;
use App\Models\CartItem;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;


class CartNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cart:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to user if  not complete order';

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


        $carts =Cart::whereDate('updated_at',Carbon::tomorrow())->get();


        foreach($carts as $cart){
            if(CartItem::where('cart_id',$cart->id)->count() > 0){
                        Mail::queue(new StyleCartNotification($cart));
                        $this->info('user '.$cart->user_id.' is  have items in cart');
                    }else{
                        $this->info('user '.$cart->user_id.' is not have items in cart');

            }

         }

    }
}
