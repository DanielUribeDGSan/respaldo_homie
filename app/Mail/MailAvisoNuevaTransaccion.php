<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailAvisoNuevaTransaccion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance. 
     *
     * @return void
     */
    public  $name, $email;

    public function __construct($name, $email)
    {
        $this->name = $name;
        $this->email = $email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-aviso-nueva-transaccion')->from('respaldo@homie.mx', 'Respaldo Homie - Nueva transacción')
            ->subject('Se ha completado una aplicación en Respaldo Homie, es tiempo de atenderla');
    }
}
