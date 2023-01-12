<?php

namespace App\Http\Livewire;

use App\Mail\MailAvisoNuevoRegistro;
use App\Mail\MailRegister;
use App\Models\Guest;
use App\Models\Owner;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class FormRegisterPropietario extends Component
{
    protected $listeners = ['registrarFormulario'];
    public $transaccion_user, $email_user;

    public $createForm = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
        'password' => "",
        'terminos' => "",
    ];

    protected $rules = [
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255|unique:users,email',
        'createForm.password' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'E-mail',
        'createForm.password' => 'Contraseña',
    ];

    public function mount()
    {
        if ($this->transaccion_user && $this->email_user) {

            $invitado = Guest::where('transaction', $this->transaccion_user)->where('email', $this->email_user)->first();

            $this->createForm['name'] = $invitado->name;
            $this->createForm['last_name'] = $invitado->last_name;
            $this->createForm['email'] = $invitado->email;
            $this->createForm['phone'] = $invitado->phone;
        }
    }


    public function registrarFormulario()
    {
        $this->validate();

        $user = User::create([
            'type' => 'propietario',
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
            'password' => bcrypt($this->createForm['password']),
            'pass_temp' => trim($this->createForm['password']),
            'fase' => 0,
        ]);


        $user->assignRole('propietario');
        Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $randomNumber = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $userRegister = User::where('email', $this->createForm['email'])->first();
        $transaction = strval($userRegister->id) . str_shuffle(strval($randomNumber));

        if (env('APP_ENV') === "production") {
            Mail::to('respaldo@homie.mx')->send(new MailAvisoNuevoRegistro($userRegister->name, $userRegister->email));
        }

        if ($this->transaccion_user && $this->email_user) {
            $userRegister->update(
                [
                    'transaction' => $this->transaccion_user,
                ]
            );
        } else {
            $userRegister->update(
                [
                    'transaction' => $transaction,
                ]
            );

            Transaction::create(
                [
                    'transaction' => $transaction,
                    'user_id' => $userRegister->id,
                    'asesor_llenara_datos' => 0,
                    'fase_broker' => 0,
                    'fase_inquilino' => 0,
                    'fase_propietario' => 0
                ]
            );
        }
        Auth::login($user);

        if ($this->transaccion_user && $this->email_user) {
            $validarRegistro = Owner::where('transaction', $this->transaccion_user)->first();
            if (!is_null($validarRegistro)) {
                $userRegister->update(
                    [
                        'fase' => 2,
                    ]
                );
                $transaction_updated = Transaction::where('transaction', $this->transaccion_user)->first();

                $transaction_updated->update(
                    [
                        'propietario_id' => Auth::user()->id,
                        'fase_propietario' => 2
                    ]
                );
                return redirect()->route('registro_completado');
            } else {
                $userRegister->update(
                    [
                        'fase' => 1,
                    ]
                );
                $transaction_updated = Transaction::where('transaction', $this->transaccion_user)->first();

                $transaction_updated->update(
                    [
                        'fase_propietario' => 1
                    ]
                );
                return redirect()->route('propietario.datos_personales', $this->transaccion_user);
            }
        } else {
            return redirect()->route('propietario.datos_inquilino', $transaction);
        }
    }
    public function render()
    {
        return view('livewire.form-register-propietario');
    }
}
