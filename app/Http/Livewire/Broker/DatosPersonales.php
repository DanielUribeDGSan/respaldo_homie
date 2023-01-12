<?php

namespace App\Http\Livewire\Broker;

use App\Mail\BrokerRegistroTerminado;
use App\Mail\MailInvitacionInquilino;
use App\Mail\MailInvitacionPropietario;
use App\Mail\MailProcesoTerminado;
use App\Models\Guest;
use App\Models\Referred;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DatosPersonales extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $transaccion_user, $codeRefered;

    public $createFormReferido = [
        'referred_guest' => "",

    ];

    public $createForm = [
        'precio' => "",
        'calle' => "",
        'num_exterior' => "",
        'num_interior' => "",
        'colonia' => "",
        'delegacion_alcaldia' => "",
        'estado' => "",
        'code_postal' => "",
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
        'datos_propietario' => "",
    ];

    public $createForm2 = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
    ];

    public function mount()
    {
        if (isset($_COOKIE['broker_inquilino_name'])) {
            $this->createForm2['name'] = $_COOKIE['broker_inquilino_name'];
        }
        if (isset($_COOKIE['broker_inquilino_last_name'])) {
            $this->createForm2['last_name'] = $_COOKIE['broker_inquilino_last_name'];
        }
        if (isset($_COOKIE['broker_inquilino_email'])) {
            $this->createForm2['email'] = $_COOKIE['broker_inquilino_email'];
        }
        if (isset($_COOKIE['broker_inquilino_phone'])) {
            $this->createForm2['phone'] = $_COOKIE['broker_inquilino_phone'];
        }

        if (isset($_COOKIE['broker_propietario_name'])) {
            $this->createForm['name'] = $_COOKIE['broker_propietario_name'];
        }
        if (isset($_COOKIE['broker_propietario_last_name'])) {
            $this->createForm['last_name'] = $_COOKIE['broker_propietario_last_name'];
        }
        if (isset($_COOKIE['broker_propietario_email'])) {
            $this->createForm['email'] = $_COOKIE['broker_propietario_email'];
        }
        if (isset($_COOKIE['broker_propietario_phone'])) {
            $this->createForm['phone'] = $_COOKIE['broker_propietario_phone'];
        }
    }

    public function validarCodigo()
    {

        $code = Referred::where('referred_id', $this->createFormReferido['referred_guest'])->first();
        if (!is_null($code)) {
            $this->codeRefered = $this->createFormReferido['referred_guest'];
            $this->emit('successCode');

            $transaction_user_refered = Transaction::where('transaction', Auth::user()->transaction)->first();
            $user_refered = User::where('id', $transaction_user_refered->user_id)->first();
            $user_refered->update(
                [
                    'referred_guest' => $this->codeRefered
                ]
            );
            Referred::create([
                'user_id' => Auth::user()->id,
                'referred_id' => $this->codeRefered
            ]);
        } else {
            $this->emit('errorCode');
        }
    }

    public function registrarFormulario()
    {


        $user = Guest::create([
            'name' => trim(
                $this->createForm['name']
            ),
            'last_name' => trim(
                $this->createForm['last_name']
            ),
            'phone' => trim(
                $this->createForm['phone']
            ),
            'email' => trim(
                $this->createForm['email']
            ),
            'transaction' => trim(
                $this->transaccion_user
            ),
            'type' => 'propietario',
            'precio' => trim(
                $this->createForm['precio']
            ),
            'calle' => trim(
                $this->createForm['calle']
            ),
            'num_exterior' => trim(
                $this->createForm['num_exterior']
            ),
            'num_interior' => trim(
                $this->createForm['num_interior']
            ),
            'colonia' => trim(
                $this->createForm['colonia']
            ),
            'delegacion_alcaldia' => trim(
                $this->createForm['delegacion_alcaldia']
            ),
            'estado' => trim(
                $this->createForm['estado']
            ),
            'code_postal' => trim(
                $this->createForm['code_postal']
            ),
        ]);


        if ($this->createForm2['email']) {

            $user2 = Guest::create([
                'name' => trim(
                    $this->createForm2['name']
                ),
                'last_name' => trim(
                    $this->createForm2['last_name']
                ),
                'phone' => trim(
                    $this->createForm2['phone']
                ),
                'email' => trim(
                    $this->createForm2['email']
                ),
                'transaction' => trim(
                    $this->transaccion_user
                ),
                'type' => 'inquilino',
            ]);
        }
        $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();
        $inquilino = User::where('id', $transaction_user->user_id)->first();
        if ($this->createForm['datos_propietario'] == 'Si') {
            $transaction_updated = Transaction::where('transaction', $this->transaccion_user)->first();
            $transaction_updated->update(
                [
                    'asesor_llenara_datos' => true,
                    'fase_broker' => 1,
                ]
            );

            $inquilino->update(
                [
                    'fase' => 1,
                ]
            );
        } else if ($this->createForm['datos_propietario'] == 'No') {

            $transaction_updated = Transaction::where('transaction', $this->transaccion_user)->first();

            $transaction_updated->update(
                [
                    'broker_id' => Auth::user()->id,
                    'asesor_llenara_datos' => false,
                    'fase_broker' => 2
                ]
            );

            $inquilino->update(
                [
                    'fase' => 2

                ]
            );

            // $transaction_completed_validate = Transaction::where('transaction', Auth::user()->transaction)->first();

            // if ($transaction_completed_validate->status == 'Pendiente') {
            //     $transaction_completed =
            //         DB::table('users as u')
            //         ->select('u.type', 'u.transaction', 't.broker_id', 't.propietario_id', 't.inquilino_id')
            //         ->join('transactions as t', 'u.transaction', '=', 't.transaction')
            //         ->where('t.transaction', Auth::user()->transaction)
            //         ->get();

            //     foreach ($transaction_completed as $transaction_validate) {
            //         if ($transaction_validate->broker_id && $transaction_validate->propietario_id && $transaction_validate->inquilino_id || $transaction_validate->propietario_id && $transaction_validate->inquilino_id) {

            //             $transaction_completed = Transaction::where('transaction', Auth::user()->transaction)->first();

            //             $transaction_completed->update(
            //                 [
            //                     'status' => 'Cerrado',
            //                 ]
            //             );
            //         }
            //     }
            // }

        }

        if ($this->createForm['datos_propietario'] == 'No') {
            Mail::to($this->createForm['email'])->send(new MailInvitacionPropietario($user, $inquilino, $this->createForm['email']));
        }
        Mail::to($this->createForm2['email'])->send(new MailInvitacionInquilino($user2, $inquilino, $this->createForm2['email']));

        Mail::to(Auth::user()->email)->send(new BrokerRegistroTerminado($inquilino));
        if ($this->createForm['datos_propietario'] == 'Si') {
            return redirect()->route('propietario.datos_personales', $this->transaccion_user);
        } else if ($this->createForm['datos_propietario'] == 'No') {
            return redirect()->route('broker.invitados');
        }
    }

    public function render()
    {
        return view('livewire.broker.datos-personales');
    }
}
