<?php

namespace App\Http\Controllers;

use App\Mail\RecordatorioTransaccion;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function home()
    {
        return view('home.home');
    }

    public function preguntas_respuestas()
    {
        return view('preguntas.preguntas-respuestas');
    }

    public function referidos()
    {
        return view('avisos.referidos');
    }

    public function invitar_brokers_code()
    {
        return view('avisos.broker-invitar-mail');
    }

    public function comenzar_proceso()
    {
        return view('avisos.comenzar-proceso');
    }

    public function registro()
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
        //             return  redirect()->route('propietario.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('registro_completado');
        //         }
        //     } else if ($user->hasRole('arendatario')) {
        //         if ($user->fase == 0) {
        //             return   redirect()->route('inquilino.datos_propietario', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return  redirect()->route('inquilino.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('inquilino.referencias');
        //         } else if ($user->fase == 3) {
        //             return redirect()->route('inquilino.roomies');
        //         } else if ($user->fase == 4) {
        //             return redirect()->route('registro_completado');
        //         }
        //     }
        // }

        return view('registro.registro');
    }

    public function registro_broker($transaccion = "", $email = "", $invitacion = "")
    {
        if ($transaccion && $transaccion != '_') {
            $validar_transaccion = Transaction::where('transaction', $transaccion)->first();

            if (is_null($validar_transaccion)) {
                return  redirect()->route('registro.broker');
            }
        }

        if ($email && $email != '_') {
            $validar_registro_usuario = User::where('email', $email)->first();

            if (!is_null($validar_registro_usuario)) {
                return  redirect()->route('broker.datos_propietario_inquilino', $transaccion);
            }
        }

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
        //             return redirect()->route('propietario.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('registro_completado');
        //         }
        //     } else if ($user->hasRole('arendatario')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('inquilino.datos_propietario', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return redirect()->route('inquilino.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('inquilino.referencias');
        //         } else if ($user->fase == 3) {
        //             return redirect()->route('inquilino.roomies');
        //         } else if ($user->fase == 4) {
        //             return redirect()->route('registro_completado');
        //         }
        //     }
        // }

        $transaccion_user = $transaccion;
        $email_user = $email;
        $invitacion_user = $invitacion;

        return view('registro.registro-broker', compact('transaccion_user', 'email_user',  'invitacion_user'));
    }

    public function registro_inquilino($transaccion = "", $email = "")
    {
        if ($transaccion) {
            $validar_transaccion = Transaction::where('transaction', $transaccion)->first();

            if (is_null($validar_transaccion)) {
                return  redirect()->route('registro.inquilino');
            }
        }

        if ($email) {
            $validar_registro_usuario = User::where('email', $email)->first();

            if (!is_null($validar_registro_usuario)) {
                return  redirect()->route('inquilino.datos_personales', $transaccion);
            }
        }

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
        //             return redirect()->route('propietario.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('registro_completado');
        //         }
        //     } else if ($user->hasRole('arendatario')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('inquilino.datos_propietario', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return redirect()->route('inquilino.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('inquilino.referencias');
        //         } else if ($user->fase == 3) {
        //             return redirect()->route('inquilino.roomies');
        //         } else if ($user->fase == 4) {
        //             return redirect()->route('registro_completado');
        //         }
        //     }
        // }

        $transaccion_user = $transaccion;
        $email_user = $email;

        return view('registro.registro-inquilino', compact('transaccion_user', 'email_user'));
    }

    public function registro_propietario($transaccion = "", $email = "")
    {
        if ($transaccion) {
            $validar_transaccion = Transaction::where('transaction', $transaccion)->first();

            if (is_null($validar_transaccion)) {
                return  redirect()->route('registro.propietario');
            }
        }

        if ($email) {
            $validar_registro_usuario = User::where('email', $email)->first();

            if (!is_null($validar_registro_usuario)) {
                return  redirect()->route('propietario.datos_personales', $transaccion);
            }
        }

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
        //             return redirect()->route('propietario.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('registro_completado');
        //         }
        //     } else if ($user->hasRole('arendatario')) {
        //         if ($user->fase == 0) {
        //             return redirect()->route('inquilino.datos_propietario', $user->transaction);
        //         } else if ($user->fase == 1) {
        //             return redirect()->route('inquilino.datos_personales');
        //         } else if ($user->fase == 2) {
        //             return redirect()->route('inquilino.referencias');
        //         } else if ($user->fase == 3) {
        //             return redirect()->route('inquilino.roomies');
        //         } else if ($user->fase == 4) {
        //             return redirect()->route('registro_completado');
        //         }
        //     }
        // }

        $transaccion_user = $transaccion;
        $email_user = $email;

        return view('registro.registro-propietario', compact('transaccion_user', 'email_user'));
    }

    public function iniciar_sesion($key = 0)
    {
        if (Auth::user()) {
            $user = User::where('email', Auth::user()->email)->first();
            if ($user->hasRole('broker')) {
                if ($user->fase == 0) {
                    return redirect()->route('invitar_brokers', 'contratos');
                } else if ($user->fase == 1) {
                    return redirect()->route('invitar_brokers', 'contratos');
                } else if ($user->fase == 2) {
                    return redirect()->route('invitar_brokers', 'contratos');
                }
            } else if ($user->hasRole('propietario')) {
                if ($user->fase == 0) {
                    return redirect()->route('propietario.datos_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('propietario.datos_personales', $user->transaction);
                } else if ($user->fase == 2) {
                    return redirect()->route('registro_completado');
                }
            } else if ($user->hasRole('arendatario')) {
                if ($user->fase == 0) {
                    return redirect()->route('inquilino.datos_propietario', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('inquilino.datos_personales', $user->transaction);
                } else if ($user->fase == 2) {
                    return redirect()->route('inquilino.referencias', $user->transaction);
                } else if ($user->fase == 3) {
                    return redirect()->route('inquilino.roomies', $user->transaction);
                } else if ($user->fase == 4) {
                    return redirect()->route('registro_completado');
                }
            }
        }

        return view('login.login', compact('key'));
    }

    public function registro_completado()
    {
        if (Auth::user()) {
            $user = User::where('email', Auth::user()->email)->first();
            if ($user->hasRole('broker')) {
                // if ($user->fase == 0) {
                //     return redirect()->route('invitar_brokers', 'contratos');
                // } else if ($user->fase == 1) {
                //     return redirect()->route('invitar_brokers', 'contratos');
                // }
            } else if ($user->hasRole('propietario')) {
                if ($user->fase == 0) {
                    return redirect()->route('propietario.datos_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('propietario.datos_personales', $user->transaction);
                }
            } else if ($user->hasRole('arendatario')) {
                if ($user->fase == 0) {
                    return redirect()->route('inquilino.datos_propietario', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('inquilino.datos_personales', $user->transaction);
                } else if ($user->fase == 2) {
                    return redirect()->route('inquilino.referencias', $user->transaction);
                } else if ($user->fase == 3) {
                    return redirect()->route('inquilino.roomies', $user->transaction);
                }
            }
        }
        return view('avisos.registro-completado');
    }

    public function invitar_brokers($type = 'contratos')
    {
        if (Auth::user()) {
            $user = User::where('email', Auth::user()->email)->first();
            if ($user->hasRole('propietario')) {
                if ($user->fase == 0) {
                    return redirect()->route('propietario.datos_inquilino', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('propietario.datos_personales', $user->transaction);
                }
            } else if ($user->hasRole('arendatario')) {
                if ($user->fase == 0) {
                    return redirect()->route('inquilino.datos_propietario', $user->transaction);
                } else if ($user->fase == 1) {
                    return redirect()->route('inquilino.datos_personales', $user->transaction);
                } else if ($user->fase == 2) {
                    return redirect()->route('inquilino.referencias', $user->transaction);
                } else if ($user->fase == 3) {
                    return redirect()->route('inquilino.roomies', $user->transaction);
                }
            }
        }
        return view('avisos.invitar-brokers', compact('type'));
    }
}
