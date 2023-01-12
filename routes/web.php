<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(
    ['middleware' => ['role:admin']],
    function () {

        Route::get('/ver-data', function () {



            $transaccion = DB::table('users as u')
                ->select(
                    'trans.transaction',
                    'u.id as usuario_id',
                    'u.name',
                    'u.last_name',
                    'u.email',
                    'u.phone',
                    'u.password',
                    'o.id as identificador',
                    'o.transaction as p_transaction',
                    'o.admite_mascotas as p_admite_mascotas',
                    'o.cantidad_mascotas as p_cantidad_mascotas',
                    'o.tiene_estacionamiento as p_tiene_estacionamiento',
                    'o.servicios as p_servicios',
                    'o.esta_amueblado as p_esta_amueblado',
                    'o.metodo_pago as p_metodo_pago',
                    'o.numero_cuenta as p_numero_cuenta',
                    'o.puede_facturar as p_puede_facturar',
                    'o.precio_propiedad as p_precio_propiedad',
                    'o.calle as p_calle',
                    'o.num_exterior as p_num_exterior',
                    'o.colonia as p_colonia',
                    'o.code_postal as p_code_postal',
                    'o.delegacion_alcaldia as p_delegacion_alcaldia',
                    'o.estado as p_estado',
                    'o.escrituras as p_escrituras',
                    'o.contrato_compra_venta as p_contrato_compra_venta',
                    'o.poder_notarial as p_poder_notarial',
                    'o.comprobante_domicilio as p_comprobante_domicilio',
                    'o.identificacion_oficial as p_identificacion_oficial',
                    't.tipo_de_persona as i_tipo_de_persona',
                    't.rfc as i_rfc',
                    't.fecha_de_nacimiento as i_fecha_de_nacimiento',
                    't.estado_civil as i_estado_civil',
                    't.ingresos_netos as i_ingresos_netos',
                    't.tarjeta as i_tarjeta',
                    't.calle as i_calle',
                    't.num_exterior as i_num_exterior',
                    't.colonia as i_colonia',
                    't.code_postal as i_code_postal',
                    't.delegacion_alcaldia as i_delegacion_alcaldia',
                    't.estado as i_estado',
                    't.institucion_educativa as i_institucion_educativa',
                    't.trabajo as i_trabajo',
                    't.empresa as i_empresa',
                    't.actividad_empresa as i_actividad_empresa',
                    't.identificacion_oficial as i_identificacion_oficial',
                    't.documentacion as i_documentacion',
                    'tr.name as tr_name',
                    'tr.last_name as tr_last_name',
                    'tr.email as tr_email',
                    'tr.phone as tr_phone',

                )
                ->join('tenants as t', 'u.id', '=', 't.user_id')
                ->join('tenant_references as tr', 'u.id', '=', 'tr.user_id')
                ->join('transactions as trans', 'u.id', '=', 'trans.inquilino_id')
                ->join('owners as o', 'trans.transaction', '=', 'o.transaction')
                ->get();



            foreach ($transaccion as $dataUser) {

                $broker_id = DB::table('transactions')
                    ->select('broker_id', 'transaction')
                    ->where('transaction', $dataUser->transaction)
                    ->first();

                $broker = DB::table('users')
                    ->select('name', 'last_name', 'email', 'phone', 'password', 'pass_temp')
                    ->where('type', 'broker')
                    ->where('id', $broker_id->broker_id)
                    ->get();

                $dataUser->broker = $broker;
            }

            foreach ($transaccion as $dataUser) {

                $propietario_id = DB::table('transactions')
                    ->select('propietario_id', 'transaction')
                    ->where('transaction', $dataUser->transaction)
                    ->first();


                $propietario = DB::table('users')
                    ->select('name', 'last_name', 'email', 'phone', 'password', 'pass_temp')
                    ->where('type', 'propietario')
                    ->where('id', $propietario_id->propietario_id)
                    ->get();

                $dataUser->propietario = $propietario;

                if ($propietario->count() == 0) {
                    $propietario = DB::table('guests')
                        ->select('name', 'last_name', 'email', 'phone', 'pass_temp')
                        ->where('type', 'propietario')
                        ->where('transaction', $dataUser->transaction)
                        ->get();
                    $dataUser->propietario = $propietario;
                }
            }

            foreach ($transaccion as $data) {
                $roomies = DB::table('tenant_roomies')
                    ->select(
                        'compartira_renta',
                        'name',
                        'last_name',
                        'email',
                        'phone',
                        'fecha_de_nacimiento',
                        'rfc',
                        'calle',
                        'num_exterior',
                        'colonia',
                        'code_postal',
                        'delegacion_alcaldia',
                        'estado',
                        'identificacion_oficial',
                        'documentacion'
                    )
                    ->where('user_id', $data->usuario_id)
                    ->where('transaction', $data->transaction)
                    ->get();
                $data->roomies = $roomies;
            }

            foreach ($transaccion as $data) {
                if ($data->propietario->count() == 0) {
                    $transaccion = "";
                }
            }

            // dd($transaccion);
            return view('data.ver-data', compact('transaccion'));
        })->name('ver_data');
    }
);


Route::get('/', [App\Http\Controllers\WebController::class, 'home'])->name('home');
Route::get('/registro', [App\Http\Controllers\WebController::class, 'registro'])->name('registro');
Route::get('/soy-asesor/{transaccion?}/{email?}/{invitacion?}', [App\Http\Controllers\WebController::class, 'registro_broker'])->name('registro.broker');
Route::get('/soy-inquilino/{transaccion?}/{email?}', [App\Http\Controllers\WebController::class, 'registro_inquilino'])->name('registro.inquilino');
Route::get('/soy-propietario/{transaccion?}/{email?}', [App\Http\Controllers\WebController::class, 'registro_propietario'])->name('registro.propietario');
Route::get('/iniciar-sesion/{key?}', [App\Http\Controllers\WebController::class, 'iniciar_sesion'])->name('iniciar_sesion');
Route::get('/faqs', [App\Http\Controllers\WebController::class, 'preguntas_respuestas'])->name('preguntas_respuestas');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/comenzar-proceso', [App\Http\Controllers\WebController::class, 'comenzar_proceso'])->name('comenzar-proceso');
    Route::get('/registro-completado', [App\Http\Controllers\WebController::class, 'registro_completado'])->name('registro_completado');
    Route::get('/referidos', [App\Http\Controllers\WebController::class, 'referidos'])->name('broker.referidos');
});


// Inquilino
Route::group(['middleware' => ['role:arendatario']], function () {
    Route::get('/datos-del-propietario/{transaccion}', [App\Http\Controllers\InquilinoController::class, 'datos_propietario'])->name('inquilino.datos_propietario');
    Route::get('/inquilino-datos-personales/{transaccion}', [App\Http\Controllers\InquilinoController::class, 'datos_personales'])->name('inquilino.datos_personales');
    Route::get('/inquilino-referencias/{transaccion}', [App\Http\Controllers\InquilinoController::class, 'referencias'])->name('inquilino.referencias');
    Route::get('/inquilino-roomies/{transaccion}', [App\Http\Controllers\InquilinoController::class, 'roomies'])->name('inquilino.roomies');
});

// Propietario
Route::group(['middleware' => ['role:propietario']], function () {
    Route::get('/datos-del-inquilino/{transaccion}', [App\Http\Controllers\PropietarioController::class, 'datos_inquilino'])->name('propietario.datos_inquilino');
});

Route::get('/propietario-datos-personales/{transaccion}', [App\Http\Controllers\PropietarioController::class, 'datos_personales'])->name('propietario.datos_personales');

// Broker
Route::group(['middleware' => ['role:broker']], function () {
    Route::get('/invitar-asesores', [App\Http\Controllers\WebController::class, 'invitar_brokers_code'])->name('broker.invitados');
    Route::get('/datos-inquilino-propietario/{transaccion}', [App\Http\Controllers\BrokerController::class, 'datos_inquilino_propietario'])->name('broker.datos_propietario_inquilino');
    Route::get('/datos-departamento/{transaccion?}', [App\Http\Controllers\BrokerController::class, 'datos_departamento'])->name('broker.datos_departamento');
    Route::get('/datos-asesor/{type?}', [App\Http\Controllers\WebController::class, 'invitar_brokers'])->name('invitar_brokers');
});


// Admin
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('admin-inicio', [App\Http\Controllers\AdminController::class, 'inicio'])->name('admin-inicio');
    Route::get('admin-usuarios', [App\Http\Controllers\AdminController::class, 'usuarios'])->name('admin-usuarios');
    Route::get('admin-transacciones', [App\Http\Controllers\AdminController::class, 'transacciones'])->name('admin-transacciones');
    Route::get('admin-referidos', [App\Http\Controllers\AdminController::class, 'referidos'])->name('admin-referidos');
    Route::get('/emails-referidos/{email}', [App\Http\Controllers\AdminController::class, 'emails_referidos'])->name('emails-referidos');
});
