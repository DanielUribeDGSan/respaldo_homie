<?php

namespace App\Http\Livewire\Propietario;

use App\Mail\MailInvitacionPropietario;
use App\Mail\MailProcesoTerminado;
use App\Mail\MailProcesoTerminadoPropietario;
use App\Models\Guest;
use App\Models\Owner;
use App\Models\Transaction;
use App\Models\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;


class DatosPersonales extends Component
{
    use WithFileUploads;

    protected $listeners = ['registrarFormulario'];

    public $transaccion_user;

    public $escrituras, $contrato_compraventa, $poder_notarial, $comprobante_domicilio, $identificacion_oficial;


    public $createForm = [
        'fecha_contrato' => "",
        'plazo_contrato' => "",
        'comision_broker' => "",
        'titulo_propiedad' => "",
        'escrituras' => "",
        'contrato_compraventa' => "",
        'poder_notarial' => "",
        'comprobante_domicilio' => "",
        'admite_mascotas' => "",
        'cantidad_mascotas' => "",
        'tiene_estacionamiento' => "",
        'cantidad_estacionamiento' => "",
        'servicios' => "",
        'esta_amueblado' => "",
        'identificacion_oficial' => "",
        'metodo_pago' => "",
        'numero_cuenta' => "",
        'puede_facturar' => "",
        'precio' => "",
        'mantenimiento_mensual' => "",
        'calle' => "",
        'num_exterior' => "",
        'num_interior' => "",
        'colonia' => "",
        'delegacion_alcaldia' => "",
        'estado' => "",
        'code_postal' => "",
    ];

    protected $rules = [
        'createForm.admite_mascotas' => "required|max:255",
        'createForm.tiene_estacionamiento' => "required|max:255",
        'createForm.servicios' => "required|max:255",
        'createForm.esta_amueblado' => "required|max:255",
        'createForm.metodo_pago' => "required|max:255",
        'createForm.puede_facturar' => "required|max:255",
        'createForm.precio' => "required|max:255",
    ];

    protected $validationAttributes = [
        'createForm.admite_mascotas' => "¿Admite mascotas?",
        'createForm.tiene_estacionamiento' => "¿Tiene estacionamiento?",
        'createForm.servicios' => "Servicios",
        'createForm.esta_amueblado' => "¿Se encuentra amueblado?",
        'createForm.metodo_pago' => "Método de pago - como va a recibir el pago",
        'createForm.puede_facturar' => "¿El propietario puede facturar?",
        'createForm.precio' => "Precio de la propiedad",

    ];

    public function mount()
    {

        // $invitado = Guest::where('transaction', $this->transaccion_user)->first();
        // if (!is_null($invitado)) {

        //     if ($invitado->precio && $invitado->calle) {
        //         $this->createForm['precio'] = $invitado->precio;
        //         $this->createForm['calle'] = $invitado->calle;
        //         $this->createForm['num_exterior'] = $invitado->num_exterior;
        //         $this->createForm['num_interior'] = $invitado->num_interior;
        //         $this->createForm['colonia'] = $invitado->colonia;
        //         $this->createForm['delegacion_alcaldia'] = $invitado->delegacion_alcaldia;
        //         $this->createForm['estado'] = $invitado->estado;
        //         $this->createForm['code_postal'] = $invitado->code_postal;
        //     }
        // }

        if (isset($_COOKIE['propietario_calle'])) {
            $this->createForm['calle'] = $_COOKIE['propietario_calle'];
        }
        if (isset($_COOKIE['propietario_num_exterior'])) {
            $this->createForm['num_exterior'] = $_COOKIE['propietario_num_exterior'];
        }
        if (isset($_COOKIE['propietario_num_interior'])) {
            $this->createForm['num_interior'] = $_COOKIE['propietario_num_interior'];
        }
        if (isset($_COOKIE['propietario_colonia'])) {
            $this->createForm['colonia'] = $_COOKIE['propietario_colonia'];
        }
        if (isset($_COOKIE['propietario_delegacion_alcaldia'])) {
            $this->createForm['delegacion_alcaldia'] = $_COOKIE['propietario_delegacion_alcaldia'];
        }
        if (isset($_COOKIE['propietario_estado'])) {
            $this->createForm['estado'] = $_COOKIE['propietario_estado'];
        }
        if (isset($_COOKIE['propietario_code_postal'])) {
            $this->createForm['code_postal'] = $_COOKIE['propietario_code_postal'];
        }
        if (isset($_COOKIE['propietario_estacionamiento_pregunta'])) {
            $this->createForm['tiene_estacionamiento'] = $_COOKIE['propietario_estacionamiento_pregunta'];
        }
        if (isset($_COOKIE['propietario_cantidad_estacionamiento']) && isset($_COOKIE['propietario_estacionamiento_pregunta'])) {
            if ($_COOKIE['propietario_estacionamiento_pregunta'] == "Si") {
                $this->createForm['cantidad_estacionamiento'] = $_COOKIE['propietario_cantidad_estacionamiento'];
            }
        }
        if (isset($_COOKIE['propietario_esta_amueblado'])) {
            $this->createForm['esta_amueblado'] = $_COOKIE['propietario_esta_amueblado'];
        }
        if (isset($_COOKIE['propietario_admite_mascotas'])) {
            $this->createForm['admite_mascotas'] = $_COOKIE['propietario_admite_mascotas'];
        }
        if (isset($_COOKIE['propietario_cantidad_mascotas']) && isset($_COOKIE['propietario_admite_mascotas'])) {
            if ($_COOKIE['propietario_admite_mascotas'] == "Si") {
                $this->createForm['cantidad_mascotas'] = $_COOKIE['propietario_cantidad_mascotas'];
            }
        }
        if (isset($_COOKIE['propietario_fecha_contrato'])) {
            $this->createForm['fecha_contrato'] = $_COOKIE['propietario_fecha_contrato'];
        }
        if (isset($_COOKIE['propietario_plazo_contrato'])) {
            $this->createForm['plazo_contrato'] = $_COOKIE['propietario_plazo_contrato'];
        }
        if (isset($_COOKIE['propietario_comision_broker'])) {
            $this->createForm['comision_broker'] = $_COOKIE['propietario_comision_broker'];
        }
        if (isset($_COOKIE['propietario_metodo_pago'])) {
            $this->createForm['metodo_pago'] = $_COOKIE['propietario_metodo_pago'];
        }
        if (isset($_COOKIE['propietario_numero_cuenta']) && isset($_COOKIE['propietario_metodo_pago'])) {
            if ($_COOKIE['propietario_metodo_pago'] == "Transferencia bancaria") {
                $this->createForm['numero_cuenta'] = $_COOKIE['propietario_numero_cuenta'];
            }
        }
        if (isset($_COOKIE['propietario_precio'])) {
            $this->createForm['precio'] = $_COOKIE['propietario_precio'];
        }
        if (isset($_COOKIE['propietario_mantenimiento_mensual'])) {
            $this->createForm['mantenimiento_mensual'] = $_COOKIE['propietario_mantenimiento_mensual'];
        }
        if (isset($_COOKIE['propietario_servicios'])) {
            $this->createForm['servicios'] = $_COOKIE['propietario_servicios'];
        }
        if (isset($_COOKIE['propietario_puede_facturar'])) {
            $this->createForm['puede_facturar'] = $_COOKIE['propietario_puede_facturar'];
        }
        if (isset($_COOKIE['propietario_identificacion_oficial'])) {
            $this->identificacion_oficial = $_COOKIE['propietario_identificacion_oficial'];
            $this->createForm['identificacion_oficial'] = $_COOKIE['propietario_identificacion_oficial'];
        }
        if (isset($_COOKIE['propietario_comprobante_domicilio'])) {
            $this->identificacion_oficial = $_COOKIE['propietario_comprobante_domicilio'];
            $this->createForm['comprobante_domicilio'] = $_COOKIE['propietario_comprobante_domicilio'];
        }
        if (isset($_COOKIE['propietario_titulo_propiedad'])) {

            $this->createForm['titulo_propiedad'] = $_COOKIE['propietario_titulo_propiedad'];
        }
        if (isset($_COOKIE['propietario_escrituras'])) {
            $this->escrituras = $_COOKIE['propietario_escrituras'];
            $this->createForm['escrituras'] = $_COOKIE['propietario_escrituras'];
        }
        if (isset($_COOKIE['propietario_contrato_compraventa'])) {
            $this->contrato_compraventa = $_COOKIE['propietario_contrato_compraventa'];
            $this->createForm['contrato_compraventa'] = $_COOKIE['propietario_contrato_compraventa'];
        }
        if (isset($_COOKIE['propietario_poder_notarial'])) {
            $this->poder_notarial = $_COOKIE['propietario_poder_notarial'];
            $this->createForm['poder_notarial'] = $_COOKIE['propietario_poder_notarial'];
        }
    }

    // public function updatedIdentificacionOficial()
    // {

    //     if ($this->createForm['identificacion_oficial']) {
    //         $image = str_replace("https://respaldohomiebucket.s3.us-west-2.amazonaws.com/", "", $this->createForm['identificacion_oficial']);

    //         Storage::disk('s3')->delete($image);
    //     }
    //     $url =  Storage::disk('s3')->put('files', $this->identificacion_oficial, 'public');

    //     $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

    //     setcookie('propietario_identificacion_oficial', $url_final, time() + 60 * 60 * 24 * 365, '/', false, true);
    // }
    // public function updatedComprobanteDomicilio()
    // {
    //     if ($this->createForm['comprobante_domicilio']) {
    //         $image = str_replace("https://respaldohomiebucket.s3.us-west-2.amazonaws.com/", "", $this->createForm['comprobante_domicilio']);

    //         Storage::disk('s3')->delete($image);
    //     }
    //     $url =  Storage::disk('s3')->put('files', $this->comprobante_domicilio, 'public');

    //     $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

    //     setcookie('propietario_comprobante_domicilio', $url_final, time() + 60 * 60 * 24 * 365, '/', false, true);
    // }
    // public function updatedEscrituras()
    // {
    //     if ($this->createForm['escrituras']) {
    //         $image = str_replace("https://respaldohomiebucket.s3.us-west-2.amazonaws.com/", "", $this->createForm['escrituras']);

    //         Storage::disk('s3')->delete($image);
    //     }
    //     $url =  Storage::disk('s3')->put('files', $this->escrituras, 'public');

    //     $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

    //     setcookie('propietario_escrituras', $url_final, time() + 60 * 60 * 24 * 365, '/', false, true);
    // }
    // public function updatedContratoCompraventa()
    // {
    //     if ($this->createForm['contrato_compraventa']) {
    //         $image = str_replace("https://respaldohomiebucket.s3.us-west-2.amazonaws.com/", "", $this->createForm['contrato_compraventa']);

    //         Storage::disk('s3')->delete($image);
    //     }
    //     $url =  Storage::disk('s3')->put('files', $this->contrato_compraventa, 'public');

    //     $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

    //     setcookie('propietario_contrato_compraventa', $url_final, time() + 60 * 60 * 24 * 365, '/', false, true);
    // }
    // public function updatedPoderNotarial()
    // {
    //     if ($this->createForm['poder_notarial']) {
    //         $image = str_replace("https://respaldohomiebucket.s3.us-west-2.amazonaws.com/", "", $this->createForm['poder_notarial']);

    //         Storage::disk('s3')->delete($image);
    //     }
    //     $url =  Storage::disk('s3')->put('files', $this->poder_notarial, 'public');

    //     $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

    //     setcookie('propietario_poder_notarial', $url_final, time() + 60 * 60 * 24 * 365, '/', false, true);
    // }


    public function registrarFormulario()
    {
        $this->validate();
        if ($this->escrituras || $this->contrato_compraventa || $this->poder_notarial && $this->comprobante_domicilio && $this->identificacion_oficial) {
            if (!$this->createForm['escrituras']) {
                $url =  Storage::disk('s3')->put('files', $this->escrituras, 'public');

                $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;
                $this->createForm['escrituras'] = $url_final;
            } else if (!$this->createForm['contrato_compraventa']) {
                $url2 =  Storage::disk('s3')->put('files', $this->contrato_compraventa, 'public');

                $url2_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url2;
                $this->createForm['contrato_compraventa'] = $url2_final;
            } else if (!$this->createForm['poder_notarial']) {
                $url3 =  Storage::disk('s3')->put('files', $this->poder_notarial, 'public');

                $url3_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url3;
                $this->createForm['poder_notarial'] = $url3_final;
            }
            if (!$this->createForm['comprobante_domicilio']) {
                $url4 =  Storage::disk('s3')->put('files', $this->comprobante_domicilio, 'public');

                $url4_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url4;
                $this->createForm['comprobante_domicilio'] = $url4_final;
            }
            if (!$this->createForm['identificacion_oficial']) {

                $url5 =  Storage::disk('s3')->put('files', $this->identificacion_oficial, 'public');

                $url5_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url5;
                $this->createForm['identificacion_oficial'] = $url5_final;
            }

            $propietario = Owner::create([
                'transaction' => $this->transaccion_user,
                'user_id' => Auth::user()->id,
                'fecha_contrato' =>  $this->createForm['fecha_contrato'],
                'plazo_contrato' => trim(
                    $this->createForm['plazo_contrato']
                ),
                'comision_renta' => trim(
                    $this->createForm['comision_broker']
                ),
                'escrituras' => trim(
                    $this->createForm['escrituras']
                ),
                'contrato_compra_venta' => trim(
                    $this->createForm['contrato_compraventa']
                ),
                'poder_notarial' => trim(
                    $this->createForm['poder_notarial']
                ),
                'comprobante_domicilio' => trim(
                    $this->createForm['comprobante_domicilio']
                ),
                'admite_mascotas' => trim(
                    $this->createForm['admite_mascotas']
                ),
                'cantidad_mascotas' => trim(
                    $this->createForm['cantidad_mascotas']
                ),
                'tiene_estacionamiento' => trim(
                    $this->createForm['tiene_estacionamiento']
                ),
                'cantidad_estacionamiento' => trim(
                    $this->createForm['cantidad_estacionamiento']
                ),
                'servicios' => trim(
                    $this->createForm['servicios']
                ),
                'esta_amueblado' => trim(
                    $this->createForm['esta_amueblado']
                ),
                'identificacion_oficial' => trim(
                    $this->createForm['identificacion_oficial']
                ),
                'metodo_pago' => trim(
                    $this->createForm['metodo_pago']
                ),
                'numero_cuenta' => trim(
                    $this->createForm['numero_cuenta']
                ),
                'puede_facturar' => trim(
                    $this->createForm['puede_facturar']
                ),
                'precio_propiedad' => trim(
                    $this->createForm['precio']
                ),
                'mantenimiento_mensual' => trim(
                    $this->createForm['mantenimiento_mensual']
                ),
                'calle' => trim(
                    $this->createForm['calle']
                ),
                'num_exterior' => trim(
                    $this->createForm['num_exterior']
                ),
                'num_interior' => trim(
                    $this->createForm['num_interior']
                ),
                'colonia' => trim(
                    $this->createForm['colonia']
                ),
                'delegacion_alcaldia' => trim(
                    $this->createForm['delegacion_alcaldia']
                ),
                'estado' => trim(
                    $this->createForm['estado']
                ),
                'code_postal' => trim(
                    $this->createForm['code_postal']
                ),
            ]);

            $user = User::where('id', Auth::user()->id)->first();

            setcookie('propietario_identificacion_oficial', "", time() - 60 * 60 * 24 * 365, '/', false, true);
            setcookie('propietario_comprobante_domicilio', "", time() - 60 * 60 * 24 * 365, '/', false, true);
            setcookie('propietario_escrituras', "", time() - 60 * 60 * 24 * 365, '/', false, true);
            setcookie('propietario_contrato_compraventa', "", time() - 60 * 60 * 24 * 365, '/', false, true);
            setcookie('propietario_poder_notarial', "", time() - 60 * 60 * 24 * 365, '/', false, true);


            $user->update(
                [
                    'fase' => 2,
                ]
            );

            if ($user->hasRole('broker')) {
                $inquilino = User::where('id', Auth::user()->id)->first();
                $user_guest = Guest::where('transaction', $this->transaccion_user)->where('type', 'propietario')->first();
                Mail::to($user_guest->email)->send(new MailInvitacionPropietario($user_guest, $inquilino, $user_guest->email));

                $transaction_updated = Transaction::where('transaction', $this->transaccion_user)->first();

                $transaction_updated->update(
                    [
                        'propietario_id' => $user_guest->id,
                        'broker_id' => Auth::user()->id,
                        'fase_propietario' => 2,
                        'fase_broker' => 2

                    ]
                );

                // $transaction_completed_validate = Transaction::where('transaction', $this->transaccion_user)->first();

                // if ($transaction_completed_validate->status == 'Pendiente') {
                //     $transaction_completed =
                //         DB::table('users as u')
                //         ->select('u.type', 'u.transaction', 't.broker_id', 't.propietario_id', 't.inquilino_id')
                //         ->join('transactions as t', 'u.transaction', '=', 't.transaction')
                //         ->where('t.transaction', $this->transaccion_user)
                //         ->get();

                //     foreach ($transaction_completed as $transaction_validate) {
                //         if ($transaction_validate->broker_id && $transaction_validate->propietario_id && $transaction_validate->inquilino_id || $transaction_validate->propietario_id && $transaction_validate->inquilino_id) {

                //             $transaction_completed = Transaction::where('transaction', $this->transaccion_user)->first();

                //             $transaction_completed->update(
                //                 [
                //                     'status' => 'Abierto',
                //                 ]
                //             );
                //         }
                //     }
                // }

                return redirect()->route('broker.invitados');
            } else if ($user->hasRole('propietario')) {
                Mail::to(Auth::user()->email)->send(new MailProcesoTerminado($user));

                $transaction_updated = Transaction::where('transaction', $this->transaccion_user)->first();

                $transaction_updated->update(
                    [
                        'propietario_id' => Auth::user()->id,
                        'fase_propietario' => 2,
                    ]
                );

                // $transaction_completed_validate = Transaction::where('transaction', $this->transaccion_user)->first();

                // if ($transaction_completed_validate->status == 'Pendiente') {
                //     $transaction_completed =
                //         DB::table('users as u')
                //         ->select('u.type', 'u.transaction', 't.broker_id', 't.propietario_id', 't.inquilino_id')
                //         ->join('transactions as t', 'u.transaction', '=', 't.transaction')
                //         ->where('t.transaction', $this->transaccion_user)
                //         ->get();

                //     foreach ($transaction_completed as $transaction_validate) {
                //         if ($transaction_validate->broker_id && $transaction_validate->propietario_id && $transaction_validate->inquilino_id || $transaction_validate->propietario_id && $transaction_validate->inquilino_id) {

                //             $transaction_completed = Transaction::where('transaction', $this->transaccion_user)->first();

                //             $transaction_completed->update(
                //                 [
                //                     'status' => 'Abierto',
                //                 ]
                //             );
                //         }
                //     }
                // }

                $user_invitacion = User::where('transaction', $this->transaccion_user)->first();
                if (!is_null($user_invitacion)) {
                    if ($user_invitacion->hasRole('broker')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoPropietario($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                    if ($user_invitacion->hasRole('arendatario')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoPropietario($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                }
                return redirect()->route('registro_completado');
            }
        } else {
            $this->emit('errorDocumentosPropietario');
        }
    }

    public function render()
    {
        return view('livewire.propietario.datos-personales');
    }
}
