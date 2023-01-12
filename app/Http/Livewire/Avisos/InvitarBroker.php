<?php

namespace App\Http\Livewire\Avisos;

use App\Mail\MailCodigoInvitacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class InvitarBroker extends Component
{
    protected $listeners = ['enviarInvitacion'];

    public $createForm = [
        'email' => "",
    ];

    public function enviarInvitacion()
    {
        $inquilino = User::where('email', Auth::user()->email)->first();

        $transaction = "_";
        $email = "_";
        Mail::to($this->createForm['email'])->send(new MailCodigoInvitacion($inquilino, Auth::user()->referred_id, $transaction, $email));
        $this->reset('createForm');
        $this->emit('invitacionEnviada');
    }

    public function render()
    {
        return view('livewire.avisos.invitar-broker');
    }
}
