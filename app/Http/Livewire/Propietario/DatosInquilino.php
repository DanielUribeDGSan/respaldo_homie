<?php

namespace App\Http\Livewire\Propietario;

use App\Mail\MailInvitacionBroker;
use App\Mail\MailInvitacionInquilino;
use App\Models\Guest;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class DatosInquilino extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $transaccion_user;

    public $createForm = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
    ];

    public $createForm2 = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
    ];

    protected $rules = [
        'createForm.name' => 'required|max:255',
        'createForm.last_name' => 'required|max:255',
        'createForm.phone' => 'required|max:20',
        'createForm.email' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'Nombre',
        'createForm.last_name' => 'Apellidos',
        'createForm.phone' => 'Teléfono',
        'createForm.email' => 'Email',
    ];

    public function mount()
    {
        if (isset($_COOKIE['propietario_broker_name'])) {
            $this->createForm2['name'] = $_COOKIE['propietario_broker_name'];
        }
        if (isset($_COOKIE['propietario_broker_last_name'])) {
            $this->createForm2['last_name'] = $_COOKIE['propietario_broker_last_name'];
        }
        if (isset($_COOKIE['propietario_broker_email'])) {
            $this->createForm2['email'] = $_COOKIE['propietario_broker_email'];
        }
        if (isset($_COOKIE['propietario_broker_phone'])) {
            $this->createForm2['phone'] = $_COOKIE['propietario_broker_phone'];
        }

        if (isset($_COOKIE['propietario_inquilino_name'])) {
            $this->createForm['name'] = $_COOKIE['propietario_inquilino_name'];
        }
        if (isset($_COOKIE['propietario_inquilino_last_name'])) {
            $this->createForm['last_name'] = $_COOKIE['propietario_inquilino_last_name'];
        }
        if (isset($_COOKIE['propietario_inquilino_email'])) {
            $this->createForm['email'] = $_COOKIE['propietario_inquilino_email'];
        }
        if (isset($_COOKIE['propietario_inquilino_phone'])) {
            $this->createForm['phone'] = $_COOKIE['propietario_inquilino_phone'];
        }
    }

    public function registrarFormulario()
    {
        $this->validate();

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
            'type' => 'inquilino',
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
                'type' => 'broker',
            ]);
        }
        $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();
        $inquilino = User::where('id', $transaction_user->user_id)->first();

        $transaction_user->update(
            [
                'fase_propietario' => 1
            ]
        );

        $inquilino->update(
            [
                'fase' => 1,
            ]
        );
        Mail::to($this->createForm['email'])->send(new MailInvitacionInquilino($user, $inquilino, $this->createForm['email']));

        if ($this->createForm2['email']) {
            Mail::to($this->createForm2['email'])->send(new MailInvitacionBroker($user2, $inquilino, $this->createForm2['email']));
        }

        return redirect()->route('propietario.datos_personales', $this->transaccion_user);
    }
    public function render()
    {
        return view('livewire.propietario.datos-inquilino');
    }
}
