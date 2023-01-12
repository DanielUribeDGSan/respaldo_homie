<?php

namespace App\Http\Livewire\Avisos;

use App\Models\Guest;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ModalRegistroPropietario extends Component
{
    public $transaccion_user, $email_user, $invitado;

    public function mount()
    {
        if ($this->transaccion_user && $this->email_user) {

            $this->invitado = DB::table('transactions as t')
                ->select(
                    't.transaction as t_transaction',
                    'g.transaction',
                    'u.name as u_name',
                    'u.last_name as u_last_name',
                    'u.type as u_type',
                    'g.name',
                    'g.last_name',
                    'g.email',
                )
                ->join('guests as g', 't.transaction', '=', 'g.transaction')
                ->join('users as u', 'u.id', '=', 't.user_id')
                ->where('g.transaction', $this->transaccion_user)
                ->where('g.email', $this->email_user)
                ->get();
        }
    }


    public function render()
    {
        return view('livewire.avisos.modal-registro-propietario');
    }
}
