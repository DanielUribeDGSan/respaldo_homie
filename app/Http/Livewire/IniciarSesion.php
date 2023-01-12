<?php

namespace App\Http\Livewire;

use App\Mail\ResetPassword;
use App\Models\Login;
use App\Models\PasswordNew;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class IniciarSesion extends Component
{
    protected $listeners = ['validarDatos', 'resetPassword', 'changePassword'];

    public $key;

    public $formLogin = [
        'email' => "",
        'password' => "",
    ];

    public $formLoginPassword = [
        'email' => "",
    ];

    public $formCambiarPassword = [
        'password' => "",
    ];

    protected $rules = [
        'formLogin.email' => 'required|max:255',
        'formLogin.password' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'formLogin.email' => 'Email',
        'formLogin.password' => 'Contraseña',
    ];

    public function changePassword()
    {
        $cambiarPassword = PasswordNew::where('token', $this->key)->first();
        if (!is_null($cambiarPassword)) {
            if ($cambiarPassword->activo == 0) {
                $user = User::where('email', $cambiarPassword->email)->first();
                $user->update(
                    [
                        'password' =>  bcrypt($this->formCambiarPassword['password']),
                        'pass_temp' => trim(
                            $this->formCambiarPassword['password']
                        )
                    ]
                );
                $cambiarPassword->update(
                    [
                        'activo' =>  1
                    ]
                );
                $this->emit('show-recuperar-password');
            } else {
                $this->emit('error-recuperar-password');
            }
        }
    }

    public function resetPassword()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';

        $randomNumber = mt_rand(100, 999)
            . mt_rand(100, 999)
            . $characters[rand(0, strlen($characters) - 1)];

        $user = User::where('email', trim($this->formLoginPassword['email']))->first();


        if (!is_null($user)) {
            $token = strval($user->id) . str_shuffle(strval($randomNumber));

            PasswordNew::create(
                [
                    'token' => $token,
                    'email' => $user->email,
                ]
            );

            Mail::to($user->email)->send(new ResetPassword($user, $token));

            $this->emit('mail-enviado-password');
        }
    }

    public function validarDatos()
    {

        $user = User::where('email', trim($this->formLogin['email']))->first();
        if (!is_null($user)) {
            if (Hash::check(trim($this->formLogin['password']), $user->password)) {
                // Auth::login($user);
                // return redirect()->route('propietario.datos_inquilino', $transaction);
                Login::create(
                    [
                        'estatus' => true,
                        'user_id' => $user->id,
                    ]
                );
                if ($user->hasRole('broker')) {
                    Auth::login($user);
                    return redirect()->route('invitar_brokers', 'contratos');
                } else if ($user->hasRole('propietario')) {
                    Auth::login($user);
                    if ($user->fase == 0) {
                        return redirect()->route('propietario.datos_inquilino', $user->transaction);
                    } else if ($user->fase == 1) {
                        return redirect()->route('propietario.datos_personales', $user->transaction);
                    } else if ($user->fase == 2) {
                        return redirect()->route('registro_completado');
                    }
                } else if ($user->hasRole('arendatario')) {
                    Auth::login($user);
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
                } else if ($user->hasRole('admin')) {
                    Auth::login($user);
                    return redirect()->route('admin-inicio');
                }
            } else {
                $this->emit('errorLogin');
                Login::create(
                    [
                        'estatus' => false,
                        'user_id' => $user->id,
                    ]
                );
            }
        } else {
            $this->emit('errorLogin');
            Login::create(
                [
                    'estatus' => false,
                ]
            );
        }
    }

    public function render()
    {
        return view('livewire.iniciar-sesion');
    }
}
