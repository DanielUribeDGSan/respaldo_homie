<?php

namespace App\Http\Livewire\Broker;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContinuarContrato extends Component
{
    public $transaction, $fase;

    public function resetProceso()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        $randomNumber = mt_rand(100000, 999999)
            . mt_rand(100000, 999999)
            . $characters[rand(0, strlen($characters) - 1)];
        $transaction = strval(Auth::user()->id) . str_shuffle(strval($randomNumber));

        $user = User::where('email', Auth::user()->email)->first();
        $user->update(
            [
                'fase' => 0,
                'transaction' => $transaction,

            ]
        );
        Transaction::create(
            [
                'transaction' => $transaction,
                'user_id' => Auth::user()->id

            ]
        );
        return redirect()->route('broker.datos_propietario_inquilino', $transaction);
    }

    public function continueProceso($transaction)
    {
        $transaction_user = Transaction::where('transaction', $transaction)->first();

        if ($transaction_user->fase_broker >= 0) {
            if ($transaction_user->fase_broker == 0) {
                return redirect()->route('broker.datos_propietario_inquilino', $transaction);
            } else if ($transaction_user->fase_broker == 1) {
                return redirect()->route('propietario.datos_personales', $transaction);
            }
        } else {
            if (Auth::user()->fase == 0) {
                return redirect()->route('broker.datos_propietario_inquilino', Auth::user()->transaction);
            } else if (Auth::user()->fase == 1) {
                return redirect()->route('propietario.datos_personales', Auth::user()->transaction);
            }
        }
    }

    public function render()
    {
        $verificarNewUser = Transaction::where('transaction', Auth::user()->transaction)->first();
        $verificarProceso = Transaction::where('transaction', Auth::user()->transaction)->where('broker_id', Auth::user()->id)->first();

        return view('livewire.broker.continuar-contrato', compact('verificarProceso', 'verificarNewUser'));
    }
}
