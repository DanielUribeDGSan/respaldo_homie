<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BrokerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datos_inquilino_propietario($transaccion)
    {
        // if (Auth::user()) {
        //     $user = User::where('email', Auth::user()->email)->first();
        //     if ($user->hasRole('broker')) {
        //         if ($user->fase == 1) {
        //             return redirect()->route('invitar_brokers', 'contratos');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('invitar_brokers', 'contratos');
        //         }
        //     } else if ($user->hasRole('propietario')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('propietario.datos_inquilino', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return redirect()->route('propietario.datos_personales', $user->transaction);
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('registro_completado');
        //         }
        //     } else if ($user->hasRole('arendatario')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('inquilino.datos_propietario', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return redirect()->route('inquilino.datos_personales', $user->transaction);
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('inquilino.referencias', $user->transaction);
        //         } else if ($user->fase == 3) {
        //             return redirect()->route('inquilino.roomies', $user->transaction);
        //         } else if ($user->fase == 4) {
        //             return redirect()->route('registro_completado');
        //         }
        //     }
        // }

        $transaccion_user = $transaccion;

        return view('broker.datos-inquilino-propietario', compact('transaccion_user'));
    }

    public function datos_departamento($transaccion = "")
    {
        // if (Auth::user()) {
        //     $user = User::where('email', Auth::user()->email)->first();
        //     if ($user->hasRole('broker')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('invitar_brokers', 'contratos');
        //         } else if ($user->fase == 1) {
        //             return redirect()->route('invitar_brokers', 'contratos');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('invitar_brokers', 'contratos');
        //         }
        //     } else if ($user->hasRole('propietario')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('propietario.datos_inquilino', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return  redirect()->route('propietario.datos_personales', $user->transaction);
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('registro_completado');
        //         }
        //     } else if ($user->hasRole('arendatario')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('inquilino.datos_propietario', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return redirect()->route('inquilino.datos_personales', $user->transaction);
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('inquilino.referencias', $user->transaction);
        //         } else if ($user->fase == 3) {
        //             return redirect()->route('inquilino.roomies', $user->transaction);
        //         } else if ($user->fase == 4) {
        //             return redirect()->route('registro_completado');
        //         }
        //     }
        // }

        $transaccion_user = $transaccion;

        return view('broker.datos-departamento', compact('transaccion_user'));
    }
}
