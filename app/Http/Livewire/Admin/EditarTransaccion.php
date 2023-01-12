<?php

namespace App\Http\Livewire\Admin;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class EditarTransaccion extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render'];

    public $search, $transaction_edit;

    public $editForm = [
        'ganancia' => null,
        'status' => null,

    ];


    public function edit($transaction)
    {

        $this->transaction_edit = Transaction::where('transaction', $transaction)->first();

        $this->editForm['ganancia'] = $this->transaction_edit->ganancia;
        $this->editForm['status'] = $this->transaction_edit->status;
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function editTransaction()
    {

        $this->transaction_edit->update(
            [
                'ganancia' => $this->editForm['ganancia'],
                'status' => $this->editForm['status'],
            ]
        );

        $this->emit('messageUpdateTransaction');
        $this->emit('render');
        $this->reset(['editForm']);
    }

    public function render()
    {
        $transactions = DB::table('users as u')
            ->select(
                'u.id',
                'u.name',
                'u.last_name',
                'u.email',
                'u.phone',
                'u.type',
                'u.fase',
                'u.transaction as user_transaction',
                't.transaction',
                't.status',
                't.ganancia',
                't.user_id',
                't.broker_id',
                't.propietario_id',
                't.inquilino_id',
                't.asesor_llenara_datos'

            )
            ->join('transactions as t', 'u.id', '=', 't.user_id')
            ->where('t.transaction', 'LIKE', "%" . $this->search . "%")
            ->orWhere('u.name', 'LIKE', "%" . $this->search . "%")
            ->orWhere('u.last_name', 'LIKE', "%" . $this->search . "%")
            ->paginate(8);

        return view('livewire.admin.editar-transaccion', compact('transactions'));
    }
}
