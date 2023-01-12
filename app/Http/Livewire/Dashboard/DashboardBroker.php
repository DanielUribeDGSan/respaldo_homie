<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Owner;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardBroker extends Component
{

    public $type;

    public $createForm = [
        'name' => "",
        'last_name' => "",
        'phone' => "",
        'email' => "",
        'inmobiliaria' => "",

    ];


    public function mount()
    {
        $this->createForm['name'] = Auth::user()->name;
        $this->createForm['last_name'] = Auth::user()->last_name;
        $this->createForm['email'] = Auth::user()->email;
        $this->createForm['phone'] = Auth::user()->phone;
        $this->createForm['inmobiliaria'] = Auth::user()->inmobiliaria;
    }

    public function render()
    {

        $contratos = Transaction::select('transaction', 'user_id', 'broker_id', 'propietario_id', 'inquilino_id', 'fase_broker', 'asesor_llenara_datos', 'status', 'ganancia')->where('user_id', Auth::user()->id)->get();
        if ($contratos->count() == 0) {
            $contratos = Transaction::select('transaction', 'user_id', 'broker_id', 'propietario_id', 'inquilino_id', 'fase_broker', 'asesor_llenara_datos', 'status', 'ganancia')->where('user_id', Auth::user()->id)->get();
        }
        foreach ($contratos as $data_contrato) {

            $propietario = DB::table('users')
                ->select('fase', 'name', 'last_name', 'transaction')
                ->where('type', 'propietario')
                ->where('transaction', $data_contrato->transaction)
                ->first();

            if ($propietario) {
                $data_contrato->propietario = $propietario;
                $data_contrato->propietario_datos = null;
            } else {
                $propietario_guest = DB::table('guests')
                    ->select('pass_temp as fase', 'transaction', 'name', 'last_name')
                    ->where('type', 'propietario')
                    ->where('transaction', $data_contrato->transaction)
                    ->first();

                $owner_validar = DB::table('owners')
                    ->select('transaction')
                    ->where('transaction', $data_contrato->transaction)
                    ->first();

                $data_contrato->propietario = $propietario_guest;
                if ($owner_validar) {
                    $data_contrato->propietario_datos = $owner_validar;
                } else {
                    $data_contrato->propietario_datos = null;
                }
            }

            $inquilino = DB::table('users')
                ->select('fase', 'name', 'last_name', 'transaction')
                ->where('type', 'inquilino')
                ->where('transaction', $data_contrato->transaction)
                ->first();

            if ($inquilino) {
                $data_contrato->inquilino = $inquilino;
                $data_contrato->inquilino_datos = null;
            } else {
                $inquilino_guest = DB::table('guests')
                    ->select('pass_temp as fase', 'transaction', 'name', 'last_name')
                    ->where('type', 'inquilino')
                    ->where('transaction', $data_contrato->transaction)
                    ->first();

                if (!$inquilino_guest) {
                    $inquilino_guest = DB::table('guests')
                        ->select('pass_temp as fase', 'transaction', 'name', 'last_name')
                        ->where('type', 'broker')
                        ->where('transaction', $data_contrato->transaction)
                        ->first();
                }

                $inquilino_validar = DB::table('tenants')
                    ->select('transaction')
                    ->where('transaction', $data_contrato->transaction)
                    ->first();

                $data_contrato->inquilino = $inquilino_guest;
                if ($inquilino_validar) {
                    $data_contrato->inquilino_datos = $inquilino_validar;
                } else {
                    $data_contrato->inquilino_datos = null;
                }
            }
        }

        // $referidos = User::select('name', 'last_name', 'transaction')->where('referred_guest', Auth::user()->referred_id)->get();
        $referidos = DB::table('users as u')
            ->select(
                'u.id',
                'u.name',
                'u.last_name',
                'u.transaction as transaction_user',
                'u.ganancia',
            )
            ->where('referred_guest', Auth::user()->referred_id)
            ->get();

        // 't.transaction',
        //                 't.status',
        // dd($referidos);

        // dd($contratos);

        return view('livewire.dashboard.dashboard-broker', compact('contratos', 'referidos'));
    }
}
