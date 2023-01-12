<?php

namespace App\Http\Livewire;

use App\Mail\MailAvisoNuevoRegistro;
use App\Mail\MailRegister;
use App\Models\Referred;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class FormRegister extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $createForm = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
        'password' => "",
        'type' => "",
        'terminos' => "",
        'inmobiliaria' => "",
    ];

    protected $rules = [
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255|unique:users,email',
        'createForm.password' => 'required|max:255',
        'createForm.type' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'E-mail',
        'createForm.password' => 'Contraseña',
        'createForm.type' => 'Tipo de usuario',
    ];

    public function registrarFormulario()
    {
        $this->validate();

        $user = User::create([
            'type' => trim(
                $this->createForm['type']
            ),
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
            'nombre_inmobiliaria' => trim(
                $this->createForm['inmobiliaria']
            ),
            'password' => bcrypt($this->createForm['password']),
            'pass_temp' => trim($this->createForm['password']),
            'fase' => 0,

        ]);

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        $randomNumber = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        $randomNumber2 = mt_rand(10, 99)
            . mt_rand(10, 99)
            . $characters[rand(0, strlen($characters) - 1)];

        $userRegister = User::where('email', $this->createForm['email'])->first();

        $transaction = strval($userRegister->id) . str_shuffle(strval($randomNumber));
        $referido = strval($userRegister->id) . substr($this->createForm['name'], 0, 2) . str_shuffle(strval($randomNumber2)) . substr($this->createForm['last_name'], 0, 2);


        $userRegister->update(
            [
                'transaction' => $transaction,
            ]
        );
        if (env('APP_ENV') === "production") {
            Mail::to('respaldo@homie.mx')->send(new MailAvisoNuevoRegistro($userRegister->name, $userRegister->email));
        }

        if ($this->createForm['type'] == 'broker') {
            $user->assignRole('broker');
            Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));

            $userRegister->update(
                [
                    'referred_id' => strtolower($referido)
                ]
            );

            Referred::create(
                [
                    'referred_id' => strtolower($referido),
                    'user_id' => $userRegister->id
                ]
            );

            // Transaction::create(
            //     [
            //         'transaction' => $transaction,
            //         'user_id' => $userRegister->id,
            //     ]
            // );

            Auth::login($user);
            return redirect()->route('invitar_brokers');
        } else if ($this->createForm['type'] == 'propietario') {
            $user->assignRole('propietario');
            Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));

            Transaction::create(
                [
                    'transaction' => $transaction,
                    'user_id' => $userRegister->id,
                ]
            );

            Auth::login($user);
            return redirect()->route('propietario.datos_inquilino', $transaction);
        } else if ($this->createForm['type'] == 'inquilino') {
            $user->assignRole('arendatario');
            Mail::to($this->createForm['email'])->send(new MailRegister($user, $this->createForm['password']));

            Transaction::create(
                [
                    'transaction' => $transaction,
                    'user_id' => $userRegister->id,
                ]
            );

            Auth::login($user);
            return redirect()->route('inquilino.datos_propietario', $transaction);
        }
    }

    public function render()
    {
        return view('livewire.form-register');
    }
}
