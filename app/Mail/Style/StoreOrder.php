<?php

namespace App\Mail\Style;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\OrderProduct;

class StoreOrder extends Mailable
{
    use Queueable, SerializesModels;
    public  $orderProduct;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrderProduct $orderProduct)
    {
       $this->orderProduct = $orderProduct;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->orderProduct->store->email,$this->orderProduct->store->name)
            ->subject('Order for shop')
            ->view('style.emails.orderStore');



    }
}
