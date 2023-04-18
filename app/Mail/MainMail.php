<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MainMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;
    public $vlog='';

    public function __construct($body,$vlog='')
    {
        $this->body = $body;
        $this->vlog = $vlog;
    }

    public function build()
    {
        if(empty($this->vlog))
            return $this->view('Pub::layouts.mail'); else
            return $this->view('Pub::layouts.mail')->attach(url($this->vlog));
    }
}
