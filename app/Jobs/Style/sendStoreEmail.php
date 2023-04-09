<?php

namespace App\Jobs\Style;

use App\Mail\Style\StoreOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;

class sendStoreEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details =[];
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details= [])
    {
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new StoreOrder();
        Mail::to($this->details->store->email)->queue($email);
    }
}
