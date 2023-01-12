<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecordatorioTransaccion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $name, $last_name;

    public function __construct($name, $last_name)
    {
        $this->name = $name;
        $this->last_name = $last_name;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.recordatorio-terminar-transaccion')->from('respaldo@homie.mx', 'Respaldo Homie - Datos faltantes')
            ->subject('No has completado tu registro en Respaldo Homie');
    }
}
