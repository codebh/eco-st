<?php

namespace App\Mail\Store;

use App\Models\OrderProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PickupDelivery extends Mailable
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
        if($this->orderProduct->order->billing_country =='bahrain' and $this->orderProduct->order->delivery_type =='2'){
            $emailDelivery ='Aza92_@hotmail.com';
        }
        elseif ($this->orderProduct->order->billing_country =='bahrain' and $this->orderProduct->order->delivery_type =='1') {
            $emailDelivery ='Aza92_@hotmail.com';
        }
        elseif ($this->orderProduct->order->billing_country =='KSA' or $this->orderProduct->order->billing_country =='KSA') {
            $emailDelivery ='Aza92_@hotmail.com';

        }

        return $this
        ->to($emailDelivery)
        ->bcc('tawseeltafseel@gmail.com')
        ->subject('Order ready to pickup'.$this->orderProduct->order->id)
        ->markdown('store.emails.delivery_order-pickup');
    }
}
