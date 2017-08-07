<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAutoresponder extends Mailable
{
    use Queueable, SerializesModels;

    protected $autoresponder;

    public function __construct($autoresponder){
        $this->autoresponder = $autoresponder;
    }

    public function build()
    {
        return $this->view('email.new_autoresponder')->with([
            'token' => $this->autoresponder->token,
        ]);
    }
}
