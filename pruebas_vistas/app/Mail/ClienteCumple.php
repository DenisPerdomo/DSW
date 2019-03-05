<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Cliente;

class ClienteCumple extends Mailable
{
    use Queueable, SerializesModels;
    public $cliente;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('appingnet@gmail.com', 'APP FELICITACIONES')
                    ->subject('Feliz Cumpleaños')
                    ->view('mail');
    }
}
