<?php

namespace App\Http\Livewire\Arendatario;

use App\Models\Tenant;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class DatosPersonales extends Component
{
    use WithFileUploads;

    protected $listeners = ['registrarFormulario'];

    public $identificacion_oficial, $documentos, $nominas = [];

    public $estado_cuenta1, $estado_cuenta2, $estado_cuenta3;

    public $transaccion_user;

    public $createForm = [
        'tipo_persona' => "",
        'rfc' => "",
        'fecha_nacimiento' => "",
        'estado_civil' => "",
        'ingresos_netos' => "",
        'identificacion_oficial' => "",
        'calle' => "",
        'num_exterior' => "",
        'num_interior' => "",
        'colonia' => "",
        'delegacion_alcaldia' => "",
        'estado' => "",
        'code_postal' => "",
        'institucion_educativa' => "",
        'historial_crediticio' => "",
        'tarjeta' => "",
        'trabajo' => "",
        'empresa' => "",
        'actividad_empresa' => "",
        'tiene_mascotas' => "",
        'cantidad_mascotas' => "",
        'documentacion' => "",
    ];

    protected $rules = [
        'createForm.tipo_persona' => 'required|max:255',
        'createForm.rfc' => 'required|max:13',
        'createForm.fecha_nacimiento' => 'required|max:255',
        'createForm.estado_civil' => 'required|max:255',
        'createForm.ingresos_netos' => 'required|max:255',
        'createForm.institucion_educativa' => 'required|max:255',
        'createForm.historial_crediticio' => 'required|max:255',
        'createForm.trabajo' => 'required|max:255',
        'createForm.documentacion' => 'required|max:255',
    ];

    protected $validationAttributes = [
        'createForm.tipo_persona' => 'Persona',
        'createForm.rfc' => 'RFC',
        'createForm.fecha_nacimiento' => 'Fecha de nacimiento',
        'createForm.estado_civil' => 'Estado civil',
        'createForm.ingresos_netos' => 'Ingresos netos mensuales',
        'createForm.identificacion_oficial' => 'Identificación oficial',
        'createForm.institucion_educativa' => 'Institución educativa',
        'createForm.historial_crediticio' => 'Historial crediticio',
        'createForm.trabajo' => 'Trabajo',
        'createForm.empresa' => 'Nombre de la empresa',
        'createForm.actividad_empresa' => 'Actividad de la empresa',
        'createForm.documentacion' => 'Documentación',

    ];

    public function mount()
    {
        if (isset($_COOKIE['inquilino_tipo_persona'])) {
            $this->createForm['tipo_persona'] = $_COOKIE['inquilino_tipo_persona'];
        }

        if (isset($_COOKIE['inquilino_rfc'])) {
            $this->createForm['rfc'] = $_COOKIE['inquilino_rfc'];
        }

        if (isset($_COOKIE['inquilino_fecha_nacimiento'])) {
            $this->createForm['fecha_nacimiento'] = $_COOKIE['inquilino_fecha_nacimiento'];
        }

        if (isset($_COOKIE['inquilino_estado_civil'])) {
            $this->createForm['estado_civil'] = $_COOKIE['inquilino_estado_civil'];
        }

        if (isset($_COOKIE['inquilino_ingresos_netos'])) {
            $this->createForm['ingresos_netos'] = $_COOKIE['inquilino_ingresos_netos'];
        }

        if (isset($_COOKIE['inquilino_calle'])) {
            $this->createForm['calle'] = $_COOKIE['inquilino_calle'];
        }

        if (isset($_COOKIE['inquilino_num_exterior'])) {
            $this->createForm['num_exterior'] = $_COOKIE['inquilino_num_exterior'];
        }

        if (isset($_COOKIE['inquilino_num_interior'])) {
            $this->createForm['num_interior'] = $_COOKIE['inquilino_num_interior'];
        }

        if (isset($_COOKIE['inquilino_colonia'])) {
            $this->createForm['colonia'] = $_COOKIE['inquilino_colonia'];
        }

        if (isset($_COOKIE['inquilino_delegacion_alcaldia'])) {
            $this->createForm['delegacion_alcaldia'] = $_COOKIE['inquilino_delegacion_alcaldia'];
        }

        if (isset($_COOKIE['inquilino_estado'])) {
            $this->createForm['estado'] = $_COOKIE['inquilino_estado'];
        }

        if (isset($_COOKIE['inquilino_code_postal'])) {
            $this->createForm['code_postal'] = $_COOKIE['inquilino_code_postal'];
        }

        if (isset($_COOKIE['inquilino_institucion_educativa'])) {
            $this->createForm['institucion_educativa'] = $_COOKIE['inquilino_institucion_educativa'];
        }

        if (isset($_COOKIE['inquilino_historial_crediticio'])) {

            $this->createForm['historial_crediticio'] = $_COOKIE['inquilino_historial_crediticio'];
        }

        if (isset($_COOKIE['inquilino_tarjeta']) && isset($_COOKIE['inquilino_historial_crediticio'])) {
            if ($_COOKIE['inquilino_historial_crediticio'] == "Tengo tarjeta de crédito") {
                $this->createForm['tarjeta'] = $_COOKIE['inquilino_tarjeta'];
            }
        }

        if (isset($_COOKIE['inquilino_trabajo'])) {
            $this->createForm['trabajo'] = $_COOKIE['inquilino_trabajo'];
        }

        if (isset($_COOKIE['inquilino_empresa']) && isset($_COOKIE['inquilino_trabajo'])) {
            if ($_COOKIE['inquilino_trabajo'] == "Empleado") {
                $this->createForm['empresa'] = $_COOKIE['inquilino_empresa'];
            }
        }

        if (isset($_COOKIE['inquilino_actividad_empresa']) && isset($_COOKIE['inquilino_trabajo'])) {
            if ($_COOKIE['inquilino_trabajo'] == "Independiente") {
                $this->createForm['actividad_empresa'] = $_COOKIE['inquilino_actividad_empresa'];
            }
        }


        if (isset($_COOKIE['inquilino_tiene_mascotas'])) {
            $this->createForm['tiene_mascotas'] = $_COOKIE['inquilino_tiene_mascotas'];
        }

        if (isset($_COOKIE['inquilino_cantidad_mascotas']) && isset($_COOKIE['inquilino_tiene_mascotas'])) {
            if ($_COOKIE['inquilino_tiene_mascotas'] == "Si") {
                $this->createForm['cantidad_mascotas'] = $_COOKIE['inquilino_cantidad_mascotas'];
            }
        }
    }


    public function registrarFormulario()
    {

        $this->validate();
        if ($this->estado_cuenta1 && $this->estado_cuenta2 && $this->estado_cuenta3 && $this->identificacion_oficial || $this->nominas &&  $this->identificacion_oficial) {

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

            $inquilino = Tenant::create([
                'transaction' => $this->transaccion_user,
                'user_id' => Auth::user()->id,
                'tipo_de_persona' => trim(
                    $this->createForm['tipo_persona']
                ),
                'rfc' => trim(
                    $this->createForm['rfc']
                ),
                'fecha_de_nacimiento' => trim(
                    $this->createForm['fecha_nacimiento']
                ),
                'estado_civil' => trim(
                    $this->createForm['estado_civil']
                ),
                'ingresos_netos' => trim(
                    $this->createForm['ingresos_netos']
                ),
                'identificacion_oficial' => trim(
                    $this->createForm['identificacion_oficial']
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
                'institucion_educativa' => trim(
                    $this->createForm['institucion_educativa']
                ),
                'historial_crediticio' => trim(
                    $this->createForm['historial_crediticio']
                ),
                'tarjeta' => trim(
                    $this->createForm['tarjeta']
                ),
                'trabajo' => trim(
                    $this->createForm['trabajo']
                ),
                'empresa' => trim(
                    $this->createForm['empresa']
                ),
                'actividad_empresa' => trim(
                    $this->createForm['actividad_empresa']
                ),
                'cantidad_mascotas' => trim(
                    $this->createForm['cantidad_mascotas']
                ),
                'documentacion' => $this->documentos,

            ]);

            $transaction_user = Transaction::where('transaction', $this->transaccion_user)->first();

            $transaction_user->update(
                [
                    'fase_inquilino' => 2
                ]
            );

            $inquilino = User::where('id', Auth::user()->id)->first();
            $inquilino->update(
                [
                    'fase' => 2,
                ]
            );

            return redirect()->route('inquilino.referencias', $this->transaccion_user);
        } else {

            $this->emit('errorDocumentos');
        }
    }

    public function render()
    {
        return view('livewire.arendatario.datos-personales');
    }
}
