<?php

namespace App\Http\Controllers;

use App\Mail\MailAvisoNuevaTransaccion;
use App\Mail\RecordatorioTransaccion;
use App\Models\Transaction;
use App\Models\TransactionSent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

class ApiController extends Controller
{

    public function send_transaction()
    {
        $validate_send_transaction = TransactionSent::get();
        $transaccion = DB::table('users as u')
            ->select(
                'trans.transaction',
                'u.id as usuario_id',
                'u.name',
                'u.last_name',
                'u.email',
                'u.phone',
                'u.password',
                'u.pass_temp',
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
                'o.num_interior as p_num_interior',
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
            ->where('send', 0)
            ->get();


        if ($transaccion->count() > 0) {
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


            if ($transaccion->count() > 0 || $transaccion) {

                foreach ($transaccion as $key => $transaccion_data) {


                    // dd($validate_send_transaction);

                    // Post token

                    $client = new \GuzzleHttp\Client();
                    $response_users_inqilino = $client->request('POST', 'https://homie.mx/oauth/token', [
                        'form_params' => [
                            'email' => 'respaldo@homie.mx',
                            'password' => '909ba7c6fa93f8707dc7290b24e03991',
                            'client_id' => '8qkGd1ub5vfjaf3jbgAF8JJLkToe5wcXUaJTkZqqv_U',
                            'client_secret' => 'I_-aDyEt6lPo65OXeMawAhCm5_ROfNmiLo-DPOKVT9k',
                            'grant_type' => 'password',
                            'scope' => 'users_write homes_write rental_requests_write',
                        ]
                    ]);

                    $token = json_decode($response_users_inqilino->getBody()->getContents())->access_token;

                    // Post user inquilino

                    $request_param_users_inquilino = [
                        "user" => [
                            "name" => $transaccion_data->name,
                            "last_name" => $transaccion_data->last_name,
                            "mobile_phone" => '+52' . $transaccion_data->phone,
                            "email" => $transaccion_data->email,
                            "password" => $transaccion_data->pass_temp,
                            "role" => "user",
                        ],
                        "utm_medium" => "respaldohomie",
                        "campaign" => "respaldohomie"
                    ];

                    $request_data_user_inquilino = json_encode($request_param_users_inquilino, JSON_UNESCAPED_UNICODE);

                    $response_user_inquilino = $client->request(
                        'POST',
                        url('https://homie.mx/api/v1/users'),
                        [
                            'headers' => [
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . $token
                            ],
                            'body' => $request_data_user_inquilino
                        ]
                    );
                    //  dd($response_user_inquilino->getBody()->getContents());
                    $inquilino_id = json_decode($response_user_inquilino->getBody()->getContents())->user->id;

                    // ________________________________________________________________________

                    // Post user broker
                    if ($transaccion_data->broker->count() > 0) {

                        foreach ($transaccion_data->broker as $key => $broker) {

                            $request_param_users_broker = [
                                "user" => [
                                    "name" => $broker->name,
                                    "last_name" => $broker->last_name,
                                    "mobile_phone" => '+52' . $broker->phone,
                                    "email" => $broker->email,
                                    "password" => $broker->pass_temp,
                                    "role" => "advisor",
                                ],
                                "utm_medium" => "respaldohomie",
                                "campaign" => "respaldohomie"
                            ];

                            $request_data_user_broker = json_encode($request_param_users_broker);

                            $response_user_broker = $client->request(
                                'POST',
                                url('https://homie.mx/api/v1/users'),
                                [
                                    'headers' => [
                                        'Accept' => 'application/json',
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer ' . $token
                                    ],
                                    'body' => $request_data_user_broker
                                ]
                            );
                        }
                    } else {
                        foreach ($transaccion_data->propietario as $key => $broker) {

                            $request_param_users_broker = [
                                "user" => [
                                    "name" => $broker->name,
                                    "last_name" => $broker->last_name,
                                    "mobile_phone" => '+52' . $broker->phone,
                                    "email" => $broker->email,
                                    "password" => $broker->pass_temp,
                                    "role" => "advisor",
                                ],
                                "utm_medium" => "respaldohomie",
                                "campaign" => "respaldohomie"
                            ];

                            $request_data_user_broker = json_encode($request_param_users_broker, JSON_UNESCAPED_UNICODE);

                            $response_user_broker = $client->request(
                                'POST',
                                url('https://homie.mx/api/v1/users'),
                                [
                                    'headers' => [
                                        'Accept' => 'application/json',
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer ' . $token
                                    ],
                                    'body' => $request_data_user_broker
                                ]
                            );
                        }
                    }

                    $broker_id = json_decode($response_user_broker->getBody()->getContents())->user->advisor->id;
                    // ________________________________________________________________________

                    // Post user propietario


                    foreach ($transaccion_data->propietario as $key => $propietario) {

                        $request_param_users_propietario = [
                            "user" => [
                                "name" => $propietario->name,
                                "last_name" => $propietario->last_name,
                                "mobile_phone" => '+52' . $propietario->phone,
                                "email" => $propietario->email,
                                "password" => $propietario->pass_temp,
                                "role" => "owner",
                            ],
                            "utm_medium" => "respaldohomie",
                            "campaign" => "respaldohomie"
                        ];

                        $request_data_user_propietario = json_encode($request_param_users_propietario, JSON_UNESCAPED_UNICODE);

                        $response_user_propietario = $client->request(
                            'POST',
                            url('https://homie.mx/api/v1/users'),
                            [
                                'headers' => [
                                    'Accept' => 'application/json',
                                    'Content-Type' => 'application/json',
                                    'Authorization' => 'Bearer ' . $token
                                ],
                                'body' => $request_data_user_propietario
                            ]
                        );
                    }

                    // dd(json_decode($response_user_propietario->getBody()->getContents()));

                    $propietario_id = json_decode($response_user_propietario->getBody()->getContents())->user->owner->id;
                    // ________________________________________________________________________

                    // Post Home


                    $precie_replace = array("$", ",");
                    $request_param_home = [
                        "home" => [
                            "owner_id" => $propietario_id,
                            "advisor_id" => $broker_id,
                            "external_identifier" => $transaccion_data->p_num_exterior,
                            "is_rent_billable" => $transaccion_data->p_puede_facturar == 'Si' ? true : false,
                            "price" => intval(str_replace($precie_replace, "", $transaccion_data->p_precio_propiedad)),
                            "is_services_amount_in_rent_price" => $transaccion_data->p_servicios == 'Si' ? true : false,
                            "country" => $transaccion_data->p_delegacion_alcaldia,
                            "state" => $transaccion_data->p_estado,
                            "neighborhood" => $transaccion_data->p_colonia,
                            "number" => $transaccion_data->p_num_interior,
                            "int_number" => $transaccion_data->p_num_interior,
                            "street" => $transaccion_data->p_calle,
                            "parkings" => 0,
                            "pets_allowed" => intval($transaccion_data->p_cantidad_mascotas),
                            "home_feature" => [
                                "pet_friendly" => $transaccion_data->p_admite_mascotas == 'Si' ? true : false,
                                "furnished" => $transaccion_data->p_esta_amueblado == 'Si' ? true : false
                            ],
                            "owner" => [
                                "owner_charge_way" => $transaccion_data->p_metodo_pago,
                                "bank_transfer_number" => $transaccion_data->p_numero_cuenta
                            ]
                        ],
                        "campaign" => "respaldohomie"

                    ];

                    $request_data_home = json_encode($request_param_home, JSON_UNESCAPED_UNICODE);

                    $response_home = $client->request(
                        'POST',
                        url('https://homie.mx/api/v1/homes.json'),
                        [
                            'headers' => [
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . $token
                            ],
                            'body' => str_replace('\/', "/", $request_data_home)
                        ]
                    );

                    // dd($response_home->getBody()->getContents());
                    $home_id = json_decode($response_home->getBody()->getContents())->home->id;
                    //  dd($response_home->getBody()->getContents());


                    if ($transaccion_data->p_escrituras) {
                        $request_param_home_file = [
                            "url" => $transaccion_data->p_escrituras,
                            "asset_type" => 'ownership_proof',
                        ];
                    } else if ($transaccion_data->p_contrato_compra_venta) {
                        $request_param_home_file = [
                            "url" => $transaccion_data->p_contrato_compra_venta,
                            "asset_type" => 'ownership_proof',
                        ];
                    } else if ($transaccion_data->p_poder_notarial) {
                        $request_param_home_file = [
                            "url" => $transaccion_data->p_poder_notarial,
                            "asset_type" => 'ownership_proof',
                        ];
                    }

                    $request_data_home_file = json_encode($request_param_home_file);

                    $response_home_file = $client->request(
                        'POST',
                        url('https://homie.mx/api/v1/homes/' . $home_id . '/assets.json'),
                        [
                            'headers' => [
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . $token
                            ],
                            'body' => str_replace('\/', "/", $request_data_home_file)

                        ]
                    );

                    $request_param_home_file = [
                        "url" => $transaccion_data->p_comprobante_domicilio,
                        "asset_type" => 'proof_of_address',
                    ];

                    $request_data_home_file = json_encode($request_param_home_file);

                    $response_home_file = $client->request(
                        'POST',
                        url('https://homie.mx/api/v1/homes/' . $home_id . '/assets.json'),
                        [
                            'headers' => [
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . $token
                            ],
                            'body' => str_replace('\/', "/", $request_data_home_file)

                        ]
                    );



                    $request_param_home_file = [
                        "url" => $transaccion_data->p_identificacion_oficial,
                        "asset_type" => 'identification',
                    ];

                    $request_data_home_file = json_encode($request_param_home_file);

                    $response_home_file = $client->request(
                        'POST',
                        url('https://homie.mx/api/v1/homes/' . $home_id . '/assets.json'),
                        [
                            'headers' => [
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . $token
                            ],
                            'body' => str_replace('\/', "/", $request_data_home_file)

                        ]
                    );

                    // ________________________________________________________________________

                    // Post Rental
                    if ($transaccion_data->roomies->count() >= 1) {
                        $request_param_rental = [
                            "rental_request" => [
                                "user_id" => $inquilino_id,
                                "home_id" => $home_id,
                                "person_type" => strtolower($transaccion_data->i_tipo_de_persona),
                                "user" => [
                                    "rfc" => $transaccion_data->i_rfc,
                                    "date_of_birth" => Carbon::parse($transaccion_data->i_fecha_de_nacimiento)->format('d/m/Y'),
                                    "marital_status" => $transaccion_data->i_estado_civil,
                                    "college" => $transaccion_data->i_institucion_educativa
                                ],
                                "address" => [
                                    "zip" => $transaccion_data->i_code_postal,
                                    "country" => $transaccion_data->i_delegacion_alcaldia,
                                    "state" => $transaccion_data->i_estado,
                                    "neighborhood" => $transaccion_data->i_colonia,
                                    "ext_number" => $transaccion_data->i_num_exterior,
                                    "street" => $transaccion_data->i_calle
                                ],
                                "references" => [
                                    [
                                        "name" => $transaccion_data->tr_name,
                                        "last_name" => $transaccion_data->tr_last_name,
                                        "email" => $transaccion_data->tr_email,
                                        "mobile_phone" => '+52' . $transaccion_data->tr_phone
                                    ]
                                ],
                                "home_application_income" => [
                                    "everybodys_income" => intval(str_replace($precie_replace, "", $transaccion_data->i_ingresos_netos)),
                                    "position" => $transaccion_data->i_trabajo,
                                    "number_of_homies" => $transaccion_data->roomies->count(),
                                    "credit_card" => $transaccion_data->i_tarjeta ? true : false,
                                    "credit_card_last_digits" => $transaccion_data->i_tarjeta ? $transaccion_data->i_tarjeta : '0000',
                                    "company" => [
                                        "business_name" => $transaccion_data->i_empresa ? $transaccion_data->i_empresa : "empty",
                                        "company_business_role" => $transaccion_data->i_actividad_empresa ? $transaccion_data->i_actividad_empresa : "empty",
                                    ],

                                    "home_application_income_homies" => [
                                        [
                                            "name" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->name : "empty",
                                            "last_name" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->last_name : "empty",
                                            "email" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->email : "empty",
                                            "mobile_phone" => $transaccion_data->roomies->count() > 0 ? '+52' . $transaccion_data->roomies[0]->phone : "empty",
                                            "rfc" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->rfc : "empty",
                                            "date_of_birth" => $transaccion_data->roomies->count() > 0 ? Carbon::parse($transaccion_data->roomies[0]->fecha_de_nacimiento)->format('d/m/Y') : "empty",
                                            "address" => [
                                                "zip" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->code_postal : "empty",
                                                "country" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->delegacion_alcaldia : "empty",
                                                "state" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->estado : "empty",
                                                "neighborhood" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->colonia : "empty",
                                                "ext_number" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->num_exterior : "empty",
                                                "street" => $transaccion_data->roomies->count() > 0 ? $transaccion_data->roomies[0]->calle : "empty"
                                            ]
                                        ]
                                    ]
                                ]
                            ]

                        ];
                    } else if ($transaccion_data->roomies->count() < 1) {
                        $request_param_rental = [
                            "rental_request" => [
                                "user_id" => $inquilino_id,
                                "home_id" => $home_id,
                                "person_type" => strtolower($transaccion_data->i_tipo_de_persona),
                                "user" => [
                                    "rfc" => $transaccion_data->i_rfc,
                                    "date_of_birth" => Carbon::parse($transaccion_data->i_fecha_de_nacimiento)->format('d/m/Y'),
                                    "marital_status" => $transaccion_data->i_estado_civil,
                                    "college" => $transaccion_data->i_institucion_educativa
                                ],
                                "address" => [
                                    "zip" => $transaccion_data->i_code_postal,
                                    "country" => $transaccion_data->i_delegacion_alcaldia,
                                    "state" => $transaccion_data->i_estado,
                                    "neighborhood" => $transaccion_data->i_colonia,
                                    "ext_number" => $transaccion_data->i_num_exterior,
                                    "street" => $transaccion_data->i_calle
                                ],
                                "references" => [
                                    [
                                        "name" => $transaccion_data->tr_name,
                                        "last_name" => $transaccion_data->tr_last_name,
                                        "email" => $transaccion_data->tr_email,
                                        "mobile_phone" => '+52' . $transaccion_data->tr_phone
                                    ]
                                ],
                                "home_application_income" => [
                                    "everybodys_income" => intval(str_replace($precie_replace, "", $transaccion_data->i_ingresos_netos)),
                                    "position" => $transaccion_data->i_trabajo,
                                    "number_of_homies" => $transaccion_data->roomies->count(),
                                    "credit_card" => $transaccion_data->i_tarjeta ? true : false,
                                    "credit_card_last_digits" => $transaccion_data->i_tarjeta ? $transaccion_data->i_tarjeta : '0000',
                                    "company" => [
                                        "business_name" => $transaccion_data->i_empresa ? $transaccion_data->i_empresa : "empty",
                                        "company_business_role" => $transaccion_data->i_actividad_empresa ? $transaccion_data->i_actividad_empresa : "empty",
                                    ]
                                ]
                            ]

                        ];
                    }

                    $request_data_rental = json_encode($request_param_rental, JSON_UNESCAPED_UNICODE);



                    $response_rental = $client->request(
                        'POST',
                        url('https://homie.mx/api/v1/rental_requests.json'),
                        [
                            'headers' => [
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . $token
                            ],
                            'body' => str_replace('\/', "/", $request_data_rental)
                        ]
                    );

                    // dd($response_rental->getBody()->getContents());
                    $rental_id = json_decode($response_rental->getBody()->getContents())->home_application->id;


                    $request_param_rental_file_i = [
                        "url" => $transaccion_data->i_identificacion_oficial,
                        "asset_type" => 'identification',
                    ];

                    $request_data_rental_file_i = json_encode($request_param_rental_file_i);

                    $response_rental_file_i = $client->request(
                        'POST',
                        url('https://homie.mx/api/v1/rental_requests/' . $rental_id . '/assets.json'),
                        [
                            'headers' => [
                                'Accept' => 'application/json',
                                'Content-Type' => 'application/json',
                                'Authorization' => 'Bearer ' . $token
                            ],
                            'body' => str_replace('\/', "/", $request_data_rental_file_i)

                        ]
                    );
                    $validar_documentos = strpos($transaccion_data->i_documentacion, 'estado_cuenta1');


                    if ($validar_documentos) {

                        $documents_inquilino = json_decode($transaccion_data->i_documentacion);

                        foreach ($documents_inquilino as $d) {

                            $request_param_rental_file_i2 = [
                                "url" => $d->url,
                                "asset_type" => 'proofs_of_income',
                            ];

                            $request_data_rental_file_i2 = json_encode($request_param_rental_file_i2);

                            $response_rental_file_i2 = $client->request(
                                'POST',
                                url('https://homie.mx/api/v1/rental_requests/' . $rental_id . '/assets.json'),
                                [
                                    'headers' => [
                                        'Accept' => 'application/json',
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer ' . $token
                                    ],
                                    'body' => str_replace('\/', "/", $request_data_rental_file_i2)

                                ]
                            );
                        }
                    } else {
                        $documentos_inquilino = strval(str_replace(',', '*', str_replace(['\'', '"', '[', ']'], '', stripslashes($transaccion_data->i_documentacion))));
                        $documentos_inquilino_arr = explode('*', $documentos_inquilino);

                        foreach ($documentos_inquilino_arr as $d2) {
                            $request_param_rental_file_i2 = [
                                "url" => $d2,
                                "asset_type" => 'proofs_of_income',
                            ];

                            $request_data_rental_file_i2 = json_encode($request_param_rental_file_i2);

                            $response_rental_file_i2 = $client->request(
                                'POST',
                                url('https://homie.mx/api/v1/rental_requests/' . $rental_id . '/assets.json'),
                                [
                                    'headers' => [
                                        'Accept' => 'application/json',
                                        'Content-Type' => 'application/json',
                                        'Authorization' => 'Bearer ' . $token
                                    ],
                                    'body' => str_replace('\/', "/", $request_data_rental_file_i2)

                                ]
                            );
                        }
                    }

                    TransactionSent::create([
                        'transaction' =>  $transaccion_data->transaction,
                    ]);

                    $transaction_edit = Transaction::where('transaction', $transaccion_data->transaction)->first();
                    $transaction_edit->update(
                        [
                            'send' => 1,
                        ]
                    );

                    Mail::to('respaldo@homie.mx')->send(new MailAvisoNuevaTransaccion($transaccion_data->name, $transaccion_data->email));
                }
            }
        }
    }

    public function StautsChnage()
    {
        $transaccion = DB::table('users as u')
            ->select(
                'trans.transaction',
                'u.id as usuario_id',
                'u.name',
                'u.last_name',
                'u.email',
                'u.phone',
                'u.password',
                'u.pass_temp',
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
                'o.num_interior as p_num_interior',
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
            ->where('trans.status', 'Pendiente')
            ->get();

        foreach ($transaccion as $key => $item) {
            $transaction_edit = Transaction::where('transaction', $item->transaction)->first();
            $transaction_edit->update(
                [
                    'status' => 'Pendiente de firma',
                ]
            );
        }
    }


    public function sendRT24h()
    {
        // Mail::to('daniel.uribe.garcia07@gmail.com')->send(new RecordatorioTransaccion('Daniel', 'Uribe'));

        $today = Carbon::today();
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

        return response()->json([
            'res' => true,
            'message' => 'Notificacón enviada',
        ], 200);
    }
}
