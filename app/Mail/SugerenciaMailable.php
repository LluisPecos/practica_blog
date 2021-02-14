<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SugerenciaMailable extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject;
    public $contenido;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $contenido)
    {
        $this->subject = $subject;
        $this->contenido = $contenido;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sugerencias.enviada');
    }
}
