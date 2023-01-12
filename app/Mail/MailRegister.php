<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailRegister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $user, $password;

    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.mail-register')->from('respaldo@homie.mx', 'Respaldo Homie - Registro éxitoso')
            ->subject('¡Gracias por registrarte en Respaldo Homie!');
    }
}
