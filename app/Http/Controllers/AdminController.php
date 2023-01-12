<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function inicio()
    {
        $users = DB::table('users')->where('email', '!=', 'admin@respaldohomie.com')->where('type', 'broker')->get();
        $users2 = DB::table('users')->where('email', '!=', 'admin@respaldohomie.com')->where('type', 'propietario')->get();
        $users3 = DB::table('users')->where('email', '!=', 'admin@respaldohomie.com')->where('type', 'inquilino')->get();
        $transactions = DB::table('transactions')->get();
        $users_full = DB::table('users')->get();

        $transactions_users = DB::table('users')
            ->select(
                'id',
                'name',
                'last_name',
                'email',
            )->get();

        foreach ($transactions_users as $dataUser) {

            $cantidad_transaccion = DB::table('transactions')
                ->select('user_id')
                ->where('user_id', $dataUser->id)
                ->get();

            $dataUser->cantidad_transaccion = $cantidad_transaccion->count();
        }
        // dd($transactions_users);

        $transactions_brokers = DB::table('users as u')
            ->select(
                'u.id',
                'u.name',
                'u.last_name',
                'u.email',
                't.status'
            )->join('transactions as t', 'u.id', '=', 't.user_id')
            ->where('u.type', 'broker')
            ->get();

        $transactions_inquilinos = DB::table('users as u')
            ->select(
                'u.id',
                'u.name',
                'u.last_name',
                'u.email',
                't.status'
            )->join('transactions as t', 'u.id', '=', 't.user_id')
            ->where('u.type', 'inquilino')
            ->get();

        $transactions_propietarios = DB::table('users as u')
            ->select(
                'u.id',
                'u.name',
                'u.last_name',
                'u.email',
                't.status'
            )->join('transactions as t', 'u.id', '=', 't.user_id')
            ->where('u.type', 'propietario')
            ->get();


        return view('dashboard.inicio', compact('users', 'users2', 'users3', 'transactions', 'users_full', 'transactions_users', 'transactions_brokers', 'transactions_inquilinos', 'transactions_propietarios'));
    }

    public function usuarios()
    {
        $users = DB::table('users')->where('email', '!=', 'admin@respaldohomie.com')->get();
        return view("dashboard.usuarios", compact('users'));
    }

    public function transacciones()
    {
        return view("dashboard.transacciones");
    }

    public function referidos()
    {
        return view("dashboard.referidos");
    }

    public function emails_referidos($email)
    {
        $user =  User::where('email', $email)->first();
        $referidos_user = User::where('referred_guest', $user->referred_id)->get();
        return view("dashboard.emails-referidos", compact('referidos_user'));
    }
}
