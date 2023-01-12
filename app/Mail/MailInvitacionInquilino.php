<?php

namespace App\Mail;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailInvitacionInquilino extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $user, $inquilino, $email;

    public function __construct(Guest $user, User $inquilino, $email)
    {
        $this->user = $user;
        $this->inquilino = $inquilino;
        $this->email = $email;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-invitacion-inquilino')->from('respaldo@homie.mx', 'Respaldo Homie - Nueva invitación')
            ->subject('¡Renta sin aval ni depósito de garantía con Respaldo Homie!');
    }
}
