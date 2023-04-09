<?php

namespace App\Mail\Store;

use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductToAdmin extends Mailable
{
    use Queueable, SerializesModels;


    public $product;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this
        ->to('admin@tafseel.net')

        ->subject('a new Items From '.'-'.$this->product->store->name)
        ->markdown('store.emails.product_confirm_toAdmin');
    }
}
