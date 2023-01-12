<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

use Livewire\Component;

class Referidos extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['render'];

    public $search, $user_edit, $referidos_user;

    public $editForm = [
        'ganancia' => null,

    ];


    public function edit($email)
    {

        $this->user_edit = User::where('email', $email)->first();

        $this->editForm['ganancia'] = $this->user_edit->ganancia;
    }

    public function verReferidos($email)
    {
        $transaction =  User::where('email', $email)->first();
        $this->referidos_user = User::where('referred_guest', $transaction->referred_id)->get();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function editGanancia()
    {

        $this->user_edit->update(
            [
                'ganancia' => $this->editForm['ganancia'],
            ]
        );

        $this->emit('messageUpdateGanancia');
        $this->emit('render');
        $this->reset(['editForm']);
    }

    public function render()
    {
        $referidos = DB::table('users as u')
            ->select(
                'u.id',
                'u.referred_id',
                'u.referred_guest',
                'u.name',
                'u.last_name',
                'u.email',
                'u.ganancia',
                'u.type',
            )->where('email', '!=', 'admin@respaldohomie.com')
            ->where('type', '=', 'broker')
            ->where('u.email', 'LIKE', "%" . $this->search . "%")
            ->paginate(8);

        return view('livewire.admin.referidos', compact('referidos'));
    }
}
