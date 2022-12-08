<?php

namespace App\Mail\Admin;

use App\Models\Store;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StoreCreate extends Mailable
{
    use Queueable, SerializesModels;
    public $store;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this
        ->to($this->store->email)
        ->subject('Shop Activated'.'-'.$this->store->name)
        ->markdown('admin.emails.store_create');
    }
}
