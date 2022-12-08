<?php

namespace App\Mail\Admin;
use App\Models\OrderProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCancelStore extends Mailable
{
    use Queueable, SerializesModels;

    public  $orderCancel;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(OrderProduct $orderCancel)
    {
        $this->orderCancel = $orderCancel;  
      }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->to($this->orderCancel->store->email)
        ->subject('Order cancel'.$this->orderCancel->order->id)
        ->markdown('admin.emails.cancel_order_store');
    }
}
