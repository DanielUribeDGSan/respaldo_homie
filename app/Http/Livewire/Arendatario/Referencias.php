<?php

namespace App\Http\Livewire\Arendatario;

use App\Models\TenantReference;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Referencias extends Component
{
    protected $listeners = ['registrarFormulario'];

    public $transaccion_user;


    public $createForm = [
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
        if (isset($_COOKIE['inquilino_referencia_name'])) {
            $this->createForm['name'] = $_COOKIE['inquilino_referencia_name'];
        }
        if (isset($_COOKIE['inquilino_referencia_last_name'])) {
            $this->createForm['last_name'] = $_COOKIE['inquilino_referencia_last_name'];
        }
        if (isset($_COOKIE['inquilino_referencia_email'])) {
            $this->createForm['email'] = $_COOKIE['inquilino_referencia_email'];
        }
        if (isset($_COOKIE['inquilino_referencia_phone'])) {
            $this->createForm['phone'] = $_COOKIE['inquilino_referencia_phone'];
        }
    }

    public function registrarFormulario()
    {
        $this->validate();

        $user = TenantReference::create([
            'transaction' => Auth::user()->transaction,
            'user_id' => Auth::user()->id,
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
        ]);

        $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();

        $transaction_user->update(
            [
                'fase_inquilino' => 3
            ]
        );

        $inquilino = User::where('id', Auth::user()->id)->first();
        $inquilino->update(
            [
                'fase' => 3,
            ]
        );

        return redirect()->route('inquilino.roomies', $this->transaccion_user);
    }

    public function render()
    {
        return view('livewire.arendatario.referencias');
    }
}
