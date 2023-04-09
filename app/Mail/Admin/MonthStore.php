<?php

namespace App\Mail\Admin;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MonthStore extends Mailable
{
    use Queueable, SerializesModels;

    public  $report;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Report $report)
    {
        $this->report =$report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->to($this->report->store->email)
            ->subject('shop months amount'.$this->report->store->name)
            ->view('admin.emails.month');
    }
}
