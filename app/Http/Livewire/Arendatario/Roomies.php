<?php

namespace App\Http\Livewire\Arendatario;

use App\Mail\MailInquilinoProcesoTerminado;
use App\Mail\MailProcesoTerminado;
use App\Mail\MailProcesoTerminadoInquilino;
use App\Models\TenantRoomie;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Roomies extends Component
{
    use WithFileUploads;

    protected $listeners = ['registrarFormulario', 'resetCantidad'];

    public $identificacion_oficial, $documentos, $nominas = [];

    public $estado_cuenta1, $estado_cuenta2, $estado_cuenta3;

    public $transaccion_user;

    public $createForm = [
        'compartira_renta' => "",
        'cantidad_roomies' => "",
        'name' => "",
        'last_name' => "",
        'identificacion_oficial' => "",
        'email' => "",
        'phone' => "",
        'fecha_nacimiento' => "",
        'rfc' => "",
        'calle' => "",
        'num_exterior' => "",
        'num_interior' => "",
        'colonia' => "",
        'delegacion_alcaldia' => "",
        'estado' => "",
        'code_postal' => "",
        'documentacion' => "",
        'historial_crediticio' => "",
        'tarjeta' => "",
    ];

    public $identificacion_oficial2, $documentos2, $nominas2 = [];

    public $estado_cuenta_roomie1, $estado_cuenta_roomie2, $estado_cuenta_roomie3;

    public $createForm2 = [
        'name' => "",
        'last_name' => "",
        'identificacion_oficial' => "",
        'email' => "",
        'phone' => "",
        'fecha_nacimiento' => "",
        'rfc' => "",
        'calle' => "",
        'num_exterior' => "",
        'num_interior' => "",
        'colonia' => "",
        'delegacion_alcaldia' => "",
        'estado' => "",
        'code_postal' => "",
        'documentacion' => "",
        'historial_crediticio' => "",
        'tarjeta' => "",
    ];

    public $identificacion_oficial3, $documentos3, $nominas3 = [];

    public $estado_cuenta_roomie11, $estado_cuenta_roomie22, $estado_cuenta_roomie33;

    public $createForm3 = [
        'name' => "",
        'last_name' => "",
        'identificacion_oficial' => "",
        'email' => "",
        'phone' => "",
        'fecha_nacimiento' => "",
        'rfc' => "",
        'calle' => "",
        'num_exterior' => "",
        'num_interior' => "",
        'colonia' => "",
        'delegacion_alcaldia' => "",
        'estado' => "",
        'code_postal' => "",
        'documentacion' => "",
        'historial_crediticio' => "",
        'tarjeta' => "",
    ];

    public $identificacion_oficial4, $documentos4, $nominas4 = [];

    public $estado_cuenta_roomie111, $estado_cuenta_roomie222, $estado_cuenta_roomie333;

    public $createForm4 = [
        'name' => "",
        'last_name' => "",
        'identificacion_oficial' => "",
        'email' => "",
        'phone' => "",
        'fecha_nacimiento' => "",
        'rfc' => "",
        'calle' => "",
        'num_exterior' => "",
        'num_interior' => "",
        'colonia' => "",
        'delegacion_alcaldia' => "",
        'estado' => "",
        'code_postal' => "",
        'documentacion' => "",
        'historial_crediticio' => "",
        'tarjeta' => "",
    ];


    public function mount()
    {
        if (isset($_COOKIE['inquilino_roomies_name'])) {
            $this->createForm['name'] = $_COOKIE['inquilino_roomies_name'];
        }
        if (isset($_COOKIE['inquilino_roomies_last_name'])) {
            $this->createForm['last_name'] = $_COOKIE['inquilino_roomies_last_name'];
        }
        if (isset($_COOKIE['inquilino_roomies_email'])) {
            $this->createForm['email'] = $_COOKIE['inquilino_roomies_email'];
        }
        if (isset($_COOKIE['inquilino_roomies_phone'])) {
            $this->createForm['phone'] = $_COOKIE['inquilino_roomies_phone'];
        }

        if (isset($_COOKIE['inquilino_roomies_rfc'])) {
            $this->createForm['rfc'] = $_COOKIE['inquilino_roomies_rfc'];
        }

        if (isset($_COOKIE['inquilino_roomies_fecha_nacimiento'])) {
            $this->createForm['fecha_nacimiento'] = $_COOKIE['inquilino_roomies_fecha_nacimiento'];
        }

        if (isset($_COOKIE['inquilino_roomies_calle'])) {
            $this->createForm['calle'] = $_COOKIE['inquilino_roomies_calle'];
        }

        if (isset($_COOKIE['inquilino_roomies_num_exterior'])) {
            $this->createForm['num_exterior'] = $_COOKIE['inquilino_roomies_num_exterior'];
        }

        if (isset($_COOKIE['inquilino_roomies_num_interior'])) {
            $this->createForm['num_interior'] = $_COOKIE['inquilino_roomies_num_interior'];
        }

        if (isset($_COOKIE['inquilino_roomies_colonia'])) {
            $this->createForm['colonia'] = $_COOKIE['inquilino_roomies_colonia'];
        }

        if (isset($_COOKIE['inquilino_roomies_delegacion_alcaldia'])) {
            $this->createForm['delegacion_alcaldia'] = $_COOKIE['inquilino_roomies_delegacion_alcaldia'];
        }

        if (isset($_COOKIE['inquilino_roomies_estado'])) {
            $this->createForm['estado'] = $_COOKIE['inquilino_roomies_estado'];
        }

        if (isset($_COOKIE['inquilino_roomies_code_postal'])) {
            $this->createForm['code_postal'] = $_COOKIE['inquilino_roomies_code_postal'];
        }

        if (isset($_COOKIE['inquilino_roomies_historial_crediticio'])) {

            $this->createForm['historial_crediticio'] = $_COOKIE['inquilino_roomies_historial_crediticio'];
        }

        if (isset($_COOKIE['inquilino_roomies_tarjeta']) && isset($_COOKIE['inquilino_roomies_historial_crediticio'])) {
            if ($_COOKIE['inquilino_roomies_historial_crediticio'] == "Tengo tarjeta de crédito") {

                $this->createForm['tarjeta'] = $_COOKIE['inquilino_roomies_tarjeta'];
            }
        }
    }


    public function resetCantidad()
    {
        $this->createForm['cantidad_roomies'] = '0';
    }

    public function registrarFormulario()
    {
        $transaction_updated = Transaction::where('transaction', Auth::user()->transaction)->first();

        $transaction_updated->update(
            [
                'inquilino_id' => Auth::user()->id
            ]
        );

        // $transaction_completed_validate = Transaction::where('transaction', Auth::user()->transaction)->first();

        // if ($transaction_completed_validate->status == 'Pendiente') {
        //     $transaction_completed =
        //         DB::table('users as u')
        //         ->select('u.type', 'u.transaction', 't.broker_id', 't.propietario_id', 't.inquilino_id')
        //         ->join('transactions as t', 'u.transaction', '=', 't.transaction')
        //         ->where('t.transaction', Auth::user()->transaction)
        //         ->get();

        //     foreach ($transaction_completed as $transaction_validate) {
        //         if ($transaction_validate->broker_id && $transaction_validate->propietario_id && $transaction_validate->inquilino_id || $transaction_validate->propietario_id && $transaction_validate->inquilino_id) {

        //             $transaction_completed = Transaction::where('transaction', Auth::user()->transaction)->first();

        //             $transaction_completed->update(
        //                 [
        //                     'status' => 'Abierto',
        //                 ]
        //             );
        //         }
        //     }
        // }

        if ($this->createForm['compartira_renta'] == 'Si') {

            if ($this->createForm['cantidad_roomies'] == '0' || $this->createForm['cantidad_roomies'] == '') {
                if ($this->estado_cuenta1 && $this->estado_cuenta2 && $this->estado_cuenta3 && $this->identificacion_oficial || $this->nominas && $this->identificacion_oficial) {

                    $url =  Storage::disk('s3')->put('files', $this->identificacion_oficial, 'public');

                    $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

                    $this->createForm['identificacion_oficial'] = $url_final;

                    if ($this->createForm['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                        $documentos = array();

                        foreach ($this->nominas as $doc) {
                            $url2 =  Storage::disk('s3')->put('files', $doc, 'public');

                            $url2_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url2;
                            $documentos[] = $url2_final;
                        }
                        $this->documentos = json_encode($documentos);
                    } else if ($this->createForm['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                        $url3 =  Storage::disk('s3')->put('files', $this->estado_cuenta1, 'public');

                        $url3_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url3;

                        $url_esatdo_cuenta1 = $url3_final;

                        $url4 =  Storage::disk('s3')->put('files', $this->estado_cuenta2, 'public');

                        $url4_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url4;
                        $url_esatdo_cuenta2 = $url4_final;

                        $url5 =  Storage::disk('s3')->put('files', $this->estado_cuenta3, 'public');

                        $url5_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url5;
                        $url_esatdo_cuenta3 = $url5_final;
                        $this->documentos = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3 . '"}}';
                    }


                    $inquilino = TenantRoomie::create([
                        'transaction' => Auth::user()->transaction,
                        'user_id' => Auth::user()->id,
                        'compartira_renta' => trim(
                            $this->createForm['compartira_renta']
                        ),
                        'name' => trim(
                            $this->createForm['name']
                        ),
                        'last_name' => trim(
                            $this->createForm['last_name']
                        ),
                        'identificacion_oficial' => trim(
                            $this->createForm['identificacion_oficial']
                        ),
                        'email' => trim(
                            $this->createForm['email']
                        ),
                        'phone' => trim(
                            $this->createForm['phone']
                        ),
                        'fecha_de_nacimiento' => trim(
                            $this->createForm['fecha_nacimiento']
                        ),
                        'rfc' => trim(
                            $this->createForm['rfc']
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
                        'documentacion' => $this->documentos,
                        'historial_crediticio' => trim(
                            $this->createForm['historial_crediticio']
                        ),
                        'tarjeta' => trim(
                            $this->createForm['tarjeta']
                        ),
                    ]);

                    $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();

                    $transaction_user->update(
                        [
                            'fase_inquilino' => 4
                        ]
                    );


                    $user = User::where('id', Auth::user()->id)->first();
                    $user->update(
                        [
                            'fase' => 4,
                        ]
                    );
                    Mail::to(Auth::user()->email)->send(new MailInquilinoProcesoTerminado($user));

                    $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
                    if (!is_null($user_invitacion)) {
                        if ($user_invitacion->hasRole('broker')) {
                            Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                        }
                        if ($user_invitacion->hasRole('propietario')) {
                            Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                        }
                    }

                    return redirect()->route('registro_completado');
                } else {
                    $this->emit('errorDocumentosRoomies');
                }
            }
            // Roomie extra 1
            else if ($this->createForm['cantidad_roomies'] == '1') {
                $url =  Storage::disk('s3')->put('files', $this->identificacion_oficial, 'public');

                $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

                $this->createForm['identificacion_oficial'] = $url_final;

                if ($this->createForm['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos = array();

                    foreach ($this->nominas as $doc) {
                        $url2 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url2_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url2;
                        $documentos[] = $url2_final;
                    }
                    $this->documentos = json_encode($documentos);
                } else if ($this->createForm['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url3 =  Storage::disk('s3')->put('files', $this->estado_cuenta1, 'public');

                    $url3_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url3;

                    $url_esatdo_cuenta1 = $url3_final;

                    $url4 =  Storage::disk('s3')->put('files', $this->estado_cuenta2, 'public');

                    $url4_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url4;
                    $url_esatdo_cuenta2 = $url4_final;

                    $url5 =  Storage::disk('s3')->put('files', $this->estado_cuenta3, 'public');

                    $url5_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url5;
                    $url_esatdo_cuenta3 = $url5_final;
                    $this->documentos = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3 . '"}}';
                }


                $inquilino = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm['name']
                    ),
                    'last_name' => trim(
                        $this->createForm['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm['email']
                    ),
                    'phone' => trim(
                        $this->createForm['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm['rfc']
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
                    'documentacion' => $this->documentos,
                    'historial_crediticio' => trim(
                        $this->createForm['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm['tarjeta']
                    ),
                ]);

                // Roomie 2

                $url6 =  Storage::disk('s3')->put('files', $this->identificacion_oficial2, 'public');

                $url6_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url6;

                $this->createForm2['identificacion_oficial'] = $url6_final;

                if ($this->createForm2['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos2 = array();

                    foreach ($this->nominas2 as $doc) {
                        $url7 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url7_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url7;
                        $documentos2[] = $url7_final;
                    }
                    $this->documentos2 = json_encode($documentos2);
                } else if ($this->createForm2['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url8 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie1, 'public');

                    $url8_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url8;
                    $url_esatdo_cuenta11 = $url8_final;

                    $url9 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie2, 'public');

                    $url9_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url9;
                    $url_esatdo_cuenta22 = $url9_final;

                    $url10 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie3, 'public');

                    $url10_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url10;
                    $url_esatdo_cuenta33 = $url10_final;

                    $this->documentos2 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta11 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta22 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta33 . '"}}';
                }

                $inquilino2 = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm2['name']
                    ),
                    'last_name' => trim(
                        $this->createForm2['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm2['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm2['email']
                    ),
                    'phone' => trim(
                        $this->createForm2['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm2['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm2['rfc']
                    ),
                    'calle' => trim(
                        $this->createForm2['calle']
                    ),
                    'num_exterior' => trim(
                        $this->createForm2['num_exterior']
                    ),
                    'num_interior' => trim(
                        $this->createForm2['num_interior']
                    ),
                    'colonia' => trim(
                        $this->createForm2['colonia']
                    ),
                    'delegacion_alcaldia' => trim(
                        $this->createForm2['delegacion_alcaldia']
                    ),
                    'estado' => trim(
                        $this->createForm2['estado']
                    ),
                    'code_postal' => trim(
                        $this->createForm2['code_postal']
                    ),
                    'documentacion' => $this->documentos2,
                    'historial_crediticio' => trim(
                        $this->createForm2['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm2['tarjeta']
                    ),
                ]);

                $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();

                $transaction_user->update(
                    [
                        'fase_inquilino' => 4
                    ]
                );

                $user = User::where('id', Auth::user()->id)->first();
                $user->update(
                    [
                        'fase' => 4,
                    ]
                );
                Mail::to(Auth::user()->email)->send(new MailInquilinoProcesoTerminado($user));

                $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
                if (!is_null($user_invitacion)) {
                    if ($user_invitacion->hasRole('broker')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                    if ($user_invitacion->hasRole('propietario')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                }

                return redirect()->route('registro_completado');
            }
            // Roomi extra 2
            else if ($this->createForm['cantidad_roomies'] == '2') {

                $url =  Storage::disk('s3')->put('files', $this->identificacion_oficial, 'public');

                $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

                $this->createForm['identificacion_oficial'] = $url_final;

                if ($this->createForm['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos = array();

                    foreach ($this->nominas as $doc) {
                        $url2 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url2_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url2;
                        $documentos[] = $url2_final;
                    }
                    $this->documentos = json_encode($documentos);
                } else if ($this->createForm['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url3 =  Storage::disk('s3')->put('files', $this->estado_cuenta1, 'public');

                    $url3_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url3;

                    $url_esatdo_cuenta1 = $url3_final;

                    $url4 =  Storage::disk('s3')->put('files', $this->estado_cuenta2, 'public');

                    $url4_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url4;
                    $url_esatdo_cuenta2 = $url4_final;

                    $url5 =  Storage::disk('s3')->put('files', $this->estado_cuenta3, 'public');

                    $url5_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url5;
                    $url_esatdo_cuenta3 = $url5_final;
                    $this->documentos = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3 . '"}}';
                }

                $inquilino = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm['name']
                    ),
                    'last_name' => trim(
                        $this->createForm['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm['email']
                    ),
                    'phone' => trim(
                        $this->createForm['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm['rfc']
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
                    'documentacion' => $this->documentos,
                    'historial_crediticio' => trim(
                        $this->createForm['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm['tarjeta']
                    ),
                ]);

                // Roomie 2
                $url6 =  Storage::disk('s3')->put('files', $this->identificacion_oficial2, 'public');

                $url6_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url6;

                $this->createForm2['identificacion_oficial'] = $url6_final;

                if ($this->createForm2['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos2 = array();

                    foreach ($this->nominas2 as $doc) {
                        $url7 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url7_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url7;
                        $documentos2[] = $url7_final;
                    }
                    $this->documentos2 = json_encode($documentos2);
                } else if ($this->createForm2['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url8 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie1, 'public');

                    $url8_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url8;
                    $url_esatdo_cuenta11 = $url8_final;

                    $url9 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie2, 'public');

                    $url9_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url9;
                    $url_esatdo_cuenta22 = $url9_final;

                    $url10 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie3, 'public');

                    $url10_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url10;
                    $url_esatdo_cuenta33 = $url10_final;

                    $this->documentos2 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta11 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta22 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta33 . '"}}';
                }

                $inquilino2 = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm2['name']
                    ),
                    'last_name' => trim(
                        $this->createForm2['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm2['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm2['email']
                    ),
                    'phone' => trim(
                        $this->createForm2['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm2['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm2['rfc']
                    ),
                    'calle' => trim(
                        $this->createForm2['calle']
                    ),
                    'num_exterior' => trim(
                        $this->createForm2['num_exterior']
                    ),
                    'num_interior' => trim(
                        $this->createForm2['num_interior']
                    ),
                    'colonia' => trim(
                        $this->createForm2['colonia']
                    ),
                    'delegacion_alcaldia' => trim(
                        $this->createForm2['delegacion_alcaldia']
                    ),
                    'estado' => trim(
                        $this->createForm2['estado']
                    ),
                    'code_postal' => trim(
                        $this->createForm2['code_postal']
                    ),
                    'documentacion' => $this->documentos2,
                    'historial_crediticio' => trim(
                        $this->createForm2['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm2['tarjeta']
                    ),
                ]);

                // Roomie 3        
                $url11 =  Storage::disk('s3')->put('files', $this->identificacion_oficial3, 'public');

                $url11_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url11;
                $this->createForm3['identificacion_oficial'] = $url11_final;

                if ($this->createForm3['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos3 = array();

                    foreach ($this->nominas3 as $doc) {
                        $url12 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url12_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url12;
                        $documentos3[] = $url12_final;
                    }
                    $this->documentos3 = json_encode($documentos3);
                } else if ($this->createForm3['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url13 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie11, 'public');

                    $url13_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url13;
                    $url_esatdo_cuenta111 = $url13_final;

                    $url14 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie22, 'public');

                    $url14_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url14;
                    $url_esatdo_cuenta222 = $url14_final;

                    $url15 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie33, 'public');

                    $url15_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url15;
                    $url_esatdo_cuenta333 = $url15_final;
                    $this->documentos3 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta111 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta222 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta333 . '"}}';
                }

                $inquilino3 = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm3['name']
                    ),
                    'last_name' => trim(
                        $this->createForm3['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm3['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm3['email']
                    ),
                    'phone' => trim(
                        $this->createForm3['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm3['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm3['rfc']
                    ),
                    'calle' => trim(
                        $this->createForm3['calle']
                    ),
                    'num_exterior' => trim(
                        $this->createForm3['num_exterior']
                    ),
                    'num_interior' => trim(
                        $this->createForm3['num_interior']
                    ),
                    'colonia' => trim(
                        $this->createForm3['colonia']
                    ),
                    'delegacion_alcaldia' => trim(
                        $this->createForm3['delegacion_alcaldia']
                    ),
                    'estado' => trim(
                        $this->createForm3['estado']
                    ),
                    'code_postal' => trim(
                        $this->createForm3['code_postal']
                    ),
                    'documentacion' => $this->documentos3,
                    'historial_crediticio' => trim(
                        $this->createForm3['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm3['tarjeta']
                    ),
                ]);

                $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();

                $transaction_user->update(
                    [
                        'fase_inquilino' => 4
                    ]
                );


                $user = User::where('id', Auth::user()->id)->first();
                $user->update(
                    [
                        'fase' => 4,
                    ]
                );
                Mail::to(Auth::user()->email)->send(new MailInquilinoProcesoTerminado($user));

                $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
                if (!is_null($user_invitacion)) {
                    if ($user_invitacion->hasRole('broker')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                    if ($user_invitacion->hasRole('propietario')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                }

                return redirect()->route('registro_completado');
            }
            // Roomi extra 3
            else if ($this->createForm['cantidad_roomies'] == '3') {

                $url =  Storage::disk('s3')->put('files', $this->identificacion_oficial, 'public');

                $url_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url;

                $this->createForm['identificacion_oficial'] = $url_final;

                if ($this->createForm['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos = array();

                    foreach ($this->nominas as $doc) {
                        $url2 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url2_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url2;
                        $documentos[] = $url2_final;
                    }
                    $this->documentos = json_encode($documentos);
                } else if ($this->createForm['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url3 =  Storage::disk('s3')->put('files', $this->estado_cuenta1, 'public');

                    $url3_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url3;

                    $url_esatdo_cuenta1 = $url3_final;

                    $url4 =  Storage::disk('s3')->put('files', $this->estado_cuenta2, 'public');

                    $url4_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url4;
                    $url_esatdo_cuenta2 = $url4_final;

                    $url5 =  Storage::disk('s3')->put('files', $this->estado_cuenta3, 'public');

                    $url5_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url5;
                    $url_esatdo_cuenta3 = $url5_final;
                    $this->documentos = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3 . '"}}';
                }



                $inquilino = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm['name']
                    ),
                    'last_name' => trim(
                        $this->createForm['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm['email']
                    ),
                    'phone' => trim(
                        $this->createForm['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm['rfc']
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
                    'documentacion' => $this->documentos,
                    'historial_crediticio' => trim(
                        $this->createForm['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm['tarjeta']
                    ),
                ]);

                // Roomie 2
                $url6 =  Storage::disk('s3')->put('files', $this->identificacion_oficial2, 'public');

                $url6_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url6;

                $this->createForm2['identificacion_oficial'] = $url6_final;

                if ($this->createForm2['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos2 = array();

                    foreach ($this->nominas2 as $doc) {
                        $url7 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url7_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url7;
                        $documentos2[] = $url7_final;
                    }
                    $this->documentos2 = json_encode($documentos2);
                } else if ($this->createForm2['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url8 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie1, 'public');

                    $url8_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url8;
                    $url_esatdo_cuenta11 = $url8_final;

                    $url9 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie2, 'public');

                    $url9_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url9;
                    $url_esatdo_cuenta22 = $url9_final;

                    $url10 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie3, 'public');

                    $url10_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url10;
                    $url_esatdo_cuenta33 = $url10_final;

                    $this->documentos2 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta11 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta22 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta33 . '"}}';
                }

                $inquilino2 = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm2['name']
                    ),
                    'last_name' => trim(
                        $this->createForm2['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm2['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm2['email']
                    ),
                    'phone' => trim(
                        $this->createForm2['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm2['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm2['rfc']
                    ),
                    'calle' => trim(
                        $this->createForm2['calle']
                    ),
                    'num_exterior' => trim(
                        $this->createForm2['num_exterior']
                    ),
                    'num_interior' => trim(
                        $this->createForm2['num_interior']
                    ),
                    'colonia' => trim(
                        $this->createForm2['colonia']
                    ),
                    'delegacion_alcaldia' => trim(
                        $this->createForm2['delegacion_alcaldia']
                    ),
                    'estado' => trim(
                        $this->createForm2['estado']
                    ),
                    'code_postal' => trim(
                        $this->createForm2['code_postal']
                    ),
                    'documentacion' => $this->documentos2,
                    'historial_crediticio' => trim(
                        $this->createForm2['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm2['tarjeta']
                    ),
                ]);

                // Roomie 3
                $url11 =  Storage::disk('s3')->put('files', $this->identificacion_oficial3, 'public');

                $url11_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url11;
                $this->createForm3['identificacion_oficial'] = $url11_final;

                if ($this->createForm3['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos3 = array();

                    foreach ($this->nominas3 as $doc) {
                        $url12 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url12_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url12;
                        $documentos3[] = $url12_final;
                    }
                    $this->documentos3 = json_encode($documentos3);
                } else if ($this->createForm3['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url13 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie11, 'public');

                    $url13_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url13;
                    $url_esatdo_cuenta111 = $url13_final;

                    $url14 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie22, 'public');

                    $url14_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url14;
                    $url_esatdo_cuenta222 = $url14_final;

                    $url15 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie33, 'public');

                    $url15_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url15;
                    $url_esatdo_cuenta333 = $url15_final;
                    $this->documentos3 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta111 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta222 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta333 . '"}}';
                }

                $inquilino3 = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm3['name']
                    ),
                    'last_name' => trim(
                        $this->createForm3['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm3['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm3['email']
                    ),
                    'phone' => trim(
                        $this->createForm3['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm3['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm3['rfc']
                    ),
                    'calle' => trim(
                        $this->createForm3['calle']
                    ),
                    'num_exterior' => trim(
                        $this->createForm3['num_exterior']
                    ),
                    'num_interior' => trim(
                        $this->createForm3['num_interior']
                    ),
                    'colonia' => trim(
                        $this->createForm3['colonia']
                    ),
                    'delegacion_alcaldia' => trim(
                        $this->createForm3['delegacion_alcaldia']
                    ),
                    'estado' => trim(
                        $this->createForm3['estado']
                    ),
                    'code_postal' => trim(
                        $this->createForm3['code_postal']
                    ),
                    'documentacion' => $this->documentos3,
                    'historial_crediticio' => trim(
                        $this->createForm3['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm3['tarjeta']
                    ),
                ]);
                // Roomie 4
                $url16 =  Storage::disk('s3')->put('files', $this->identificacion_oficial4, 'public');

                $url16_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url16;

                $this->createForm4['identificacion_oficial'] = $url16_final;

                if ($this->createForm4['documentacion'] == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                    $documentos4 = array();

                    foreach ($this->nominas4 as $doc) {
                        $url17 =  Storage::disk('s3')->put('files', $doc, 'public');

                        $url17_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url17;
                        $documentos4[] = $url17_final;
                    }
                    $this->documentos4 = json_encode($documentos4);
                } else if ($this->createForm4['documentacion'] == 'Estados de cuenta completos (3 meses)') {
                    $url18 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie111, 'public');

                    $url18_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url18;
                    $url_esatdo_cuenta1111 = $url18_final;

                    $url19 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie222, 'public');

                    $url19_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url19;
                    $url_esatdo_cuenta2222 = $url19_final;

                    $url20 =  Storage::disk('s3')->put('files', $this->estado_cuenta_roomie333, 'public');

                    $url20_final = 'https://respaldohomiebucket.s3.us-west-2.amazonaws.com/' . $url20;
                    $url_esatdo_cuenta3333 = $url20_final;
                    $this->documentos4 = '{"estado_cuenta1":{"url":"' . $url_esatdo_cuenta1111 . '"},"estado_cuenta2":{"url":"' . $url_esatdo_cuenta2222 . '"},"estado_cuenta3":{"url":"' . $url_esatdo_cuenta3333 . '"}}';
                }

                $inquilino4 = TenantRoomie::create([
                    'transaction' => Auth::user()->transaction,
                    'user_id' => Auth::user()->id,
                    'compartira_renta' => trim(
                        $this->createForm['compartira_renta']
                    ),
                    'name' => trim(
                        $this->createForm4['name']
                    ),
                    'last_name' => trim(
                        $this->createForm4['last_name']
                    ),
                    'identificacion_oficial' => trim(
                        $this->createForm4['identificacion_oficial']
                    ),
                    'email' => trim(
                        $this->createForm4['email']
                    ),
                    'phone' => trim(
                        $this->createForm4['phone']
                    ),
                    'fecha_de_nacimiento' => trim(
                        $this->createForm4['fecha_nacimiento']
                    ),
                    'rfc' => trim(
                        $this->createForm4['rfc']
                    ),
                    'calle' => trim(
                        $this->createForm4['calle']
                    ),
                    'num_exterior' => trim(
                        $this->createForm4['num_exterior']
                    ),
                    'num_interior' => trim(
                        $this->createForm4['num_interior']
                    ),
                    'colonia' => trim(
                        $this->createForm4['colonia']
                    ),
                    'delegacion_alcaldia' => trim(
                        $this->createForm4['delegacion_alcaldia']
                    ),
                    'estado' => trim(
                        $this->createForm4['estado']
                    ),
                    'code_postal' => trim(
                        $this->createForm4['code_postal']
                    ),
                    'documentacion' => $this->documentos4,
                    'historial_crediticio' => trim(
                        $this->createForm4['historial_crediticio']
                    ),
                    'tarjeta' => trim(
                        $this->createForm4['tarjeta']
                    ),
                ]);

                $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();

                $transaction_user->update(
                    [
                        'fase_inquilino' => 4
                    ]
                );


                $user = User::where('id', Auth::user()->id)->first();
                $user->update(
                    [
                        'fase' => 4,
                    ]
                );
                Mail::to(Auth::user()->email)->send(new MailInquilinoProcesoTerminado($user));

                $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
                if (!is_null($user_invitacion)) {
                    if ($user_invitacion->hasRole('broker')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                    if ($user_invitacion->hasRole('propietario')) {
                        Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                    }
                }

                return redirect()->route('registro_completado');
            }
        } else if ($this->createForm['compartira_renta'] == 'No') {
            $inquilino = TenantRoomie::create([
                'transaction' => Auth::user()->transaction,
                'user_id' => Auth::user()->id,
                'compartira_renta' => trim(
                    $this->createForm['compartira_renta']
                ),
            ]);

            $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();

            $transaction_user->update(
                [
                    'fase_inquilino' => 4
                ]
            );

            $user = User::where('id', Auth::user()->id)->first();
            $user->update(
                [
                    'fase' => 4,
                ]
            );
            Mail::to(Auth::user()->email)->send(new MailInquilinoProcesoTerminado($user));

            $user_invitacion = User::where('transaction', Auth::user()->transaction)->first();
            if (!is_null($user_invitacion)) {
                if ($user_invitacion->hasRole('broker')) {
                    Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                }
                if ($user_invitacion->hasRole('propietario')) {
                    Mail::to($user_invitacion->email)->send(new MailProcesoTerminadoInquilino($user_invitacion, Auth::user()->name, Auth::user()->last_name));
                }
            }

            return redirect()->route('registro_completado');
        }
    }

    public function render()
    {
        return view('livewire.arendatario.roomies');
    }
}
