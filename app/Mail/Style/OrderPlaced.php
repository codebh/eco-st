<?php

namespace App\Mail\Style;


use App\Models\OrderProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderPlaced extends Mailable
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
            ->to($this->orderProduct->order->billing_email,$this->orderProduct->order->billing_name)
            ->bcc('admin@tafseel.net')
            ->subject('Order Placed')
            ->markdown('style.emails.orderPlaced');
    }
}
