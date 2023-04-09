<?php

namespace App\Mail\Style;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OpenShop extends Mailable
{
    use Queueable, SerializesModels;
    public  $shop;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Store $shop)
    {
        $this->shop =$shop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->shop->email,$this->shop->name)
            ->subject('Your Online Shop Is open  Now')
            ->markdown('style.emails.shop_open');
    }
}
