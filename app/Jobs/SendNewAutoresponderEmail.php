<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Mail;
use App\Mail\NewAutoresponder;

class SendNewAutoresponderEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $autoresponder;

    public function __construct($autoresponder){
        $this->autoresponder = $autoresponder;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new NewAutoresponder($this->autoresponder);
        Mail::to($this->autoresponder->from_email)->send($email); 
    }
}
