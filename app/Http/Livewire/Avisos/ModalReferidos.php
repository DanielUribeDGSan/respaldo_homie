<?php

namespace App\Http\Livewire\Avisos;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalReferidos extends Component
{

    public $invitacion_user, $referido;

    public function mount()
    {
        if ($this->invitacion_user) {

            $this->referido = DB::table('users as u')
                ->select(
                    'u.transaction',
                    'u.name as u_name',
                    'u.last_name as u_last_name',
                    'u.type as u_type',
                )
                ->where('u.referred_id', $this->invitacion_user)
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.avisos.modal-referidos');
    }
}
