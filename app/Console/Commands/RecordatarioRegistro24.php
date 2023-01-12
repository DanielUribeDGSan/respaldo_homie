<?php

namespace App\Console\Commands;

use App\Mail\RecordatorioTransaccion;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RecordatarioRegistro24 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recordatorioRegistro:24';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $today = Carbon::today()->add(1, 'day');
        $tomorrow = date_format($today, "Y-m-d");

        $user = DB::table('users as u')
            ->select('u.id', 'u.type', 'u.transaction', 'u.email', 'u.name', 'u.last_name', 'u.created_at')
            ->get();


        if ($user->count() > 0) {
            foreach ($user as $key => $user_data) {

                $date_validate = Carbon::parse($user_data->created_at)->add(1, 'day')->format('Y-m-d');

                $transaccionBroker = DB::table('transactions as t')
                    ->select('t.broker_id',  't.transaction')
                    ->where('t.broker_id', $user_data->id)
                    ->get();

                if ($transaccionBroker->count() == 0 && $user_data->type == 'broker') {
                    if ($date_validate == $tomorrow) {
                        Mail::to($user_data->email)->send(new RecordatorioTransaccion($user_data->name, $user_data->last_name));
                    }
                }

                $transaccionPropietario = DB::table('transactions as t')
                    ->select('t.propietario_id', 't.transaction')
                    ->where('t.propietario_id', $user_data->id)
                    ->get();

                if ($transaccionPropietario->count() == 0 && $user_data->type == 'propietario') {
                    if ($date_validate == $tomorrow) {
                        Mail::to($user_data->email)->send(new RecordatorioTransaccion($user_data->name, $user_data->last_name));
                    }
                }

                $transaccionInquilino = DB::table('transactions as t')
                    ->select('t.inquilino_id', 't.transaction')
                    ->where('t.inquilino_id', $user_data->id)
                    ->get();

                if ($transaccionInquilino->count() == 0 && $user_data->type == 'inquilino') {
                    if ($date_validate == $tomorrow) {
                        Mail::to($user_data->email)->send(new RecordatorioTransaccion($user_data->name, $user_data->last_name));
                    }
                }
            }
        }
    }
}
