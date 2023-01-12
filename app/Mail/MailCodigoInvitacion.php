<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailCodigoInvitacion extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $inquilino, $invitacion, $transaction, $email;

    public function __construct(User $inquilino, $invitacion, $transaction, $email)
    {
        $this->inquilino = $inquilino;
        $this->invitacion = $invitacion;
        $this->transaction = $transaction;
        $this->email = $email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-code-invitacion-broker')->from('respaldo@homie.mx', 'Respaldo Homie - Nueva invitación')
            ->subject('Te enviaron una invitación para Respaldo Homie');
    }
}
