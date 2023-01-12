<div x-data class="row">
    <style>
        main section:first-child {
            padding: 0rem 0rem 4rem 0rem;
        }

        @media (max-width:767px) {
            .row>* {
                padding-right: 10px;
                padding-left: 10px;
            }
        }

    </style>
    <div class="col-12 mb-4 content-code">
        <div class="h-auto d-lg-flex d-md-block d-block  align-items-center justify-content-center ocultar-md">
            <p class="mr-2 title-refered text-center-md text-white">Refiere a tus asesores conocidos y gana más dinero
            </p>
            <div
                class="d-lg-inline-block d-md-flex d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                <button class="copy_btn btn btn-dash-white-light "
                    data-clipboard-text="{{ route('registro.broker', ['_', '_', Auth::user()->referred_id]) }}">Copiar
                    enlace
                    <i class="far fa-clone"></i></button>

            </div>
        </div>
        <div class="row ocultar-pc p-2">
            <div class="col-7">
                <p class="mr-2 title-refered text-left text-white">Refiere a tus asesores conocidos y gana más
                    dinero
                </p>
            </div>
            <div class="col-5 d-flex align-items-center justify-content-center">
                <button class="copy_btn btn btn-dash-white-light "
                    data-clipboard-text="{{ route('registro.broker', ['_', '_', Auth::user()->referred_id]) }}">Copiar
                    enlace
                    <i class="far fa-clone"></i></button>
            </div>
        </div>
    </div>
    <div class="col-lg-2 d-lg-flex align-items-center ">
        <p>¡Hola {{ Auth::user()->name }}!</p>
    </div>
    <div class="col-lg-3 d-lg-flex align-items-center mt-lg-0 mt-md-3 mt-3">
        @if ($type == 'contratos')
            <div class="ocultar-md">
                @livewire('broker.reiniciar-proceso',key('broker-reset'))
            </div>
        @endif
    </div>
    <div class="col-lg-6 d-lg-flex align-items-center justify-content-end"></div>
    <div class="col-12 mt-lg-5 mtmd-3 mt-3">
        <div class="d-lg-flex d-md-block d-block align-items-start">
            <div class="nav flex-column nav-pills me-3 ocultar-md" id="v-pills-tab" role="tablist"
                aria-orientation="vertical">
                <a href="{{ route('invitar_brokers', 'contratos') }}"
                    class="nav-link-dash {{ $type == 'contratos' ? 'active' : '' }}" id="v-pills-home-tab">Mis
                    contratos</a>
                <a href="{{ route('invitar_brokers', 'referidos') }}"
                    class="nav-link-dash {{ $type == 'referidos' ? 'active' : '' }}" id="v-pills-profile-tab">Mis
                    referidos</a>
                <a href="{{ route('invitar_brokers', 'datos') }}"
                    class="nav-link-dash {{ $type == 'datos' ? 'active' : '' }}" id="v-pills-messages-tab">Mis
                    datos</a>

                <a class="btn btn-dash-morado-light mt-lg-5 mtmd-3 mt-3" href="mailto:respaldo@homie.mx">Contáctanos</a>

            </div>
            <div class="tab-content w-100" id="v-pills-tabContent">
                <div class="tab-pane fade {{ $type == 'contratos' ? 'show active' : '' }}" id="v-pills-home"
                    role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <p class="ocultar-pc text-primary text-center mt-3">
                        <strong><span class="fw-600 bold-ft text-primary"> Mis contratos</span></strong>
                    </p>
                    @if ($type == 'contratos')
                        <div class="ocultar-pc d-flex align-items-center justify-content-center mt-3">
                            @livewire('broker.reiniciar-proceso',key('broker-reset-2'))
                        </div>
                    @endif
                    @if ($contratos->count() < 1)
                        <div class="d-flex align-items-center justify-content-center mt-lg-0 mt-md-4 mt-4">
                            <img class="img-fluid img-empty-contrato"
                                src="{{ asset('assets/images/dashboards/empty-folder.png') }}" />
                        </div>

                        <p class="text-empty-contrato text-center">Aún no has cargado ningún contrato,<br />
                            comienza a registrar a tus clientes</p>

                        <div class="d-flex justify-content-center mt-3">
                            @livewire('broker.reiniciar-proceso',key('broker-reset'))
                        </div>

                    @else
                        <div class="accordion accordion-contratos mt-4 ocultar-pc" id="accordionContratos">
                            @foreach ($contratos as $key => $contrato)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}"
                                            aria-expanded="false" aria-controls="collapse{{ $key }}">
                                            <div class="row w-100">
                                                <div class="col-5 d-flex ">
                                                    <p class="pr-3 w-100 text-gris font-movil">
                                                        <strong><span class="fw-600 bold-ft text-gris">
                                                                Transacción</span></strong>
                                                    </p>
                                                </div>
                                                <div class="col-6  d-flex">
                                                    <p class="pr-3 w-100 font-movil">
                                                        {{ $contrato->transaction }}</p>
                                                </div>
                                                <div class="col-5 d-flex mt-3">
                                                    <p class="pr-3 w-100 text-gris font-movil">
                                                        <strong><span class="fw-600 bold-ft text-gris">
                                                                Estado</span></strong>
                                                    </p>
                                                </div>
                                                <div class="col-6  d-flex  mt-3">
                                                    @if ($contrato->status == 'Pendiente')
                                                        <span class="ping-pendiente font-movil">
                                                            {{ $contrato->status }}
                                                        </span>
                                                    @elseif ($contrato->status == 'Firmado')
                                                        <span class="ping-cerrado font-movil">
                                                            {{ $contrato->status }}
                                                        </span>
                                                    @elseif ($contrato->status == 'Pendiente de firma')
                                                        <span class="ping-firma font-movil">
                                                            {{ $contrato->status }}
                                                        </span>
                                                    @elseif ($contrato->status == 'Sin contrato')
                                                        <span class="text-gris font-movil">
                                                            {{ $contrato->status }}
                                                        </span>
                                                    @endif
                                                </div>

                                            </div>

                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $key }}"
                                        data-bs-parent="#accordionContratos">
                                        <div class="accordion-body">

                                            <div class="row w-100">
                                                <div class="col-5 d-flex ">
                                                    <p class="pr-3 w-100 text-gris font-movil">
                                                        <strong><span class="fw-600 bold-ft text-gris">
                                                                Ganancia</span></strong>
                                                    </p>
                                                </div>
                                                <div class="col-6  d-flex">
                                                    @if ($contrato->ganancia == '$0' || $contrato->ganancia == '$0 MXN')
                                                        <p class="font-movil">Por definir</p>

                                                    @else
                                                        <p class="font-movil">{{ $contrato->ganancia }}</p>
                                                    @endif
                                                </div>
                                                <div class="col-12 mt-2 mb-2">
                                                    <hr />
                                                </div>
                                            </div>

                                            <div class="row w-100 m-0">
                                                <div class="col-3 pl-0" style="padding-left: 0px">
                                                    <p class="pr-3 w-100 text-gris font-movil">
                                                        <strong><span class="fw-600 bold-ft text-gris">
                                                                Usuario</span></strong>
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    @if ($contrato->propietario)
                                                        <span
                                                            class="d-block">{{ $contrato->propietario->last_name }}
                                                            {{ $contrato->propietario->name[0] }}.</span>
                                                        <span class="text-gris d-block">(Propietario)</span>
                                                    @endif
                                                </div>
                                                <div class="col-5">
                                                    @if ($contrato->inquilino)
                                                        <span
                                                            class="d-block">{{ $contrato->inquilino->last_name }}
                                                            {{ $contrato->inquilino->name[0] }}.</span>
                                                        <span class="text-gris d-block">(Inquilino)</span>
                                                    @endif

                                                </div>
                                            </div>

                                            <div class="row w-100 mt-3 m-0">
                                                <div class="col-3 d-flex " style="padding-left: 0px">
                                                    <p class="pr-3 w-100 text-gris font-movil">
                                                        <strong><span class="fw-600 bold-ft text-gris">
                                                                Registro</span></strong>
                                                    </p>
                                                </div>
                                                <div class="col-4">
                                                    @if ($contrato->asesor_llenara_datos && $contrato->asesor_llenara_datos == 1)
                                                        <span class="text-verde d-block">Completado</span>
                                                    @else
                                                        @if ($contrato->propietario)
                                                            @if ($contrato->propietario->fase <= 2)
                                                                <span class="text-verde d-block">Completado</span>
                                                            @else
                                                                <span class="text-danger d-block">Pendiente <a
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Recuerda a tu propietario registrarse en la plataforma."><i
                                                                            class="far fa-question-circle"></i></a></span>
                                                            @endif
                                                        @elseif ($contrato->propietario_datos)
                                                            <span class="text-verde d-block">Completado</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="col-5">
                                                    @if ($contrato->inquilino)
                                                        @if ($contrato->inquilino->fase <= 4)
                                                            <span
                                                                class="text-verde d-block font-movil">Completado</span>
                                                        @else
                                                            <span class="text-danger d-block font-movil">Pendiente <a
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Recuerda a tu inquilino registrarse en la plataforma."><i
                                                                        class="far fa-question-circle"></i></a></span>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row w-100 mt-3 m-0">
                                                <div class="col-3 d-flex " style="padding-left: 0px">
                                                    <p class="pr-3 w-100 text-gris font-movil">
                                                        <strong><span class="fw-600 bold-ft text-gris">
                                                                Datos</span></strong>
                                                    </p>
                                                </div>
                                                <div class="col-4 ">
                                                    @if (!$contrato->propietario_datos && $contrato->asesor_llenara_datos && $contrato->asesor_llenara_datos == 1)
                                                        <span class="text-danger d-block">Pendiente <a
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Recuerda que debes completar los datos de tu propietario."><i
                                                                    class="far fa-question-circle"></i></a></span>
                                                    @else

                                                        @if ($contrato->propietario)
                                                            @if ($contrato->propietario->fase == 2 || ($contrato->propietario->fase == 111111 && $contrato->propietario_datos))
                                                                <span class="text-verde d-block">Completado</span>
                                                            @else
                                                                <span class="text-danger d-block">Pendiente <a
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Recuerda a tu propietario completar sus datos."><i
                                                                            class="far fa-question-circle"></i></a></span>
                                                            @endif
                                                        @elseif ($contrato->propietario_datos)
                                                            <span class="text-verde d-block">Completado</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="col-5 ">
                                                    @if ($contrato->inquilino)
                                                        @if ($contrato->inquilino->fase == 4)
                                                            <span class="text-verde d-block">Completado</span>
                                                        @else
                                                            <span class="text-danger d-block">Pendiente <a
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    title="Recuerda a tu inquilino completar sus datos."><i
                                                                        class="far fa-question-circle"></i></a></span>
                                                            <span class="text-gris d-block"
                                                                style="height: 1.4rem;"></span>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="row w-100">
                                                <div class="col-12 d-flex align-items-center justify-content-center">
                                                    @livewire('broker.continuar-contrato', ['transaction' =>
                                                    $contrato->transaction,'fase' =>
                                                    $contrato->fase_broker], key('broker-continuar-proceso2'))
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                        <div class="table-responsive table-dash mt-lg-0 mt-md-5 mt-5 ocultar-md">
                            <table class="table">
                                @foreach ($contratos as $contrato)
                                    <thead>
                                        <tr class="title-th">
                                            <th scope="col" class="text-center">Transacción</th>
                                            <th scope="col" class="text-center">Estado</th>
                                            <th scope="col" class="text-center">Ganancia <a tabindex="0"
                                                    data-bs-container="body" role="button" data-bs-toggle="popover"
                                                    data-bs-trigger="focus" data-bs-placement="top" title="Ganancia"
                                                    data-bs-content="Este es el monto total que Homie te ha depositado por el cierre de cada contrato"><i
                                                        class="far fa-question-circle"></i></a>
                                            </th>
                                            <th scope="col" class="text-center">Usuario</th>
                                            <th scope="col" class="text-center">Registro</th>
                                            <th scope="col" class="text-center">Datos</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td class="text-center">
                                                {{ $contrato->transaction }}
                                            </td>

                                            <td class="text-center d-flex align-items-center justify-content-center">
                                                @if ($contrato->status == 'Pendiente')
                                                    <span class="ping-pendiente">
                                                        {{ $contrato->status }}
                                                    </span>
                                                @elseif ($contrato->status == 'Firmado')
                                                    <span class="ping-cerrado">
                                                        {{ $contrato->status }}
                                                    </span>
                                                @elseif ($contrato->status == 'Pendiente de firma')
                                                    <span class="ping-firma">
                                                        {{ $contrato->status }}
                                                    </span>
                                                @elseif ($contrato->status == 'Sin contrato')
                                                    <span class="text-gris">
                                                        {{ $contrato->status }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                @if ($contrato->ganancia != '$0')
                                                    {{ $contrato->ganancia }}
                                                @else
                                                    <span class="text-gris">Por definir</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center justify-content-center"
                                                    style="border-left: 1px solid #000;">
                                                    <div class="h-auto">
                                                        <div class="top_dashboard">
                                                            @if ($contrato->propietario)
                                                                <span
                                                                    class="d-block">{{ $contrato->propietario->last_name }}
                                                                    {{ $contrato->propietario->name[0] }}.</span>
                                                                <span class="text-gris d-block">(Propietario)</span>
                                                            @endif
                                                        </div>
                                                        <div
                                                            class="top_dashboard d-flex align-items-center justify-content-center">
                                                            <div>
                                                                @if ($contrato->inquilino)
                                                                    <span
                                                                        class="d-block">{{ $contrato->inquilino->last_name }}
                                                                        {{ $contrato->inquilino->name[0] }}.</span>
                                                                    <span class="text-gris d-block">(Inquilino)</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="top_dashboard">
                                                    @if ($contrato->asesor_llenara_datos && $contrato->asesor_llenara_datos == 1)
                                                        <span class="text-verde d-block">Completado</span>
                                                    @else
                                                        @if ($contrato->propietario)
                                                            @if ($contrato->propietario->fase <= 2)
                                                                <span class="text-verde d-block">Completado</span>
                                                            @else
                                                                <span class="text-danger d-block">Pendiente <a
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Recuerda a tu propietario registrarse en la plataforma."><i
                                                                            class="far fa-question-circle"></i></a></span>
                                                            @endif
                                                        @elseif ($contrato->propietario_datos)
                                                            <span class="text-verde d-block">Completado</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div
                                                    class="top_dashboard d-flex align-items-center justify-content-center">
                                                    <div>
                                                        @if ($contrato->inquilino)
                                                            @if ($contrato->inquilino->fase <= 4)
                                                                <span class="text-verde d-block">Completado</span>
                                                            @else
                                                                <span class="text-danger d-block">Pendiente <a
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Recuerda a tu inquilino registrarse en la plataforma.">
                                                                        <i
                                                                            class="far fa-question-circle"></i></a></span>
                                                                <span class="text-gris d-block"
                                                                    style="height: 1.4rem;"></span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <div class="top_dashboard">
                                                    @if (!$contrato->propietario_datos && $contrato->asesor_llenara_datos && $contrato->asesor_llenara_datos == 1)
                                                        <span class="text-danger d-block">Pendiente <a
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Recuerda que debes completar los datos de tu propietario."><i
                                                                    class="far fa-question-circle"></i></a></span>
                                                    @else
                                                        @if ($contrato->propietario)
                                                            @if ($contrato->propietario->fase == 2 || ($contrato->propietario->fase == 111111 && $contrato->propietario_datos))
                                                                <span class="text-verde d-block">Completado</span>
                                                            @else
                                                                <span class="text-danger d-block">Pendiente <a
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Recuerda a tu propietario completar sus datos."><i
                                                                            class="far fa-question-circle"></i></a></span>
                                                            @endif
                                                        @elseif ($contrato->propietario_datos)
                                                            <span class="text-verde d-block">Completado</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div
                                                    class="top_dashboard d-flex align-items-center justify-content-center">
                                                    <div>
                                                        @if ($contrato->inquilino)
                                                            @if ($contrato->inquilino->fase == 4)
                                                                <span class="text-verde d-block">Completado</span>
                                                            @else
                                                                <span class="text-danger d-block">Pendiente <a
                                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                                        title="Recuerda a tu inquilino completar sus datos."><i
                                                                            class="far fa-question-circle"></i></a></span>
                                                                <span class="text-gris d-block"
                                                                    style="height: 1.4rem;"></span>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr style="box-shadow: none">
                                            <td class="p-0">
                                                @livewire('broker.continuar-contrato', ['transaction' =>
                                                $contrato->transaction,'fase' =>
                                                $contrato->fase_broker], key('broker-continuar-proceso1'))

                                            </td>
                                        </tr>

                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade {{ $type == 'referidos' ? 'show active' : '' }}" id="v-pills-profile"
                    role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    <p class="ocultar-pc text-primary mt-3">
                        Referidos
                    </p>
                    @if ($referidos->count() < 1)
                        <div class="d-flex align-items-center justify-content-center mt-lg-0 mt-md-4 mt-4">
                            <img class="img-fluid img-empty-contrato"
                                src="{{ asset('assets/images/dashboards/refered.png') }}" />
                        </div>

                        <p class="text-empty-contrato text-center"> <strong><span class="fw-600 bold-ft">Aún no tienes
                                    ningún asesor referido,
                                    comienza a compartir tu código. </span></strong></p>

                        <div class="d-flex justify-content-center">
                            <button class="copy_btn btn btn-dash-morado-light mt-3"
                                data-clipboard-text="{{ route('registro.broker', ['_', '_', Auth::user()->referred_id]) }}">Código
                                <i class="far fa-clone"></i></button>
                        </div>
                        <p class="text-empty-contrato text-center mt-3"> Si ya lo compartiste, recuerda a tus asesores
                            que realicen su registro para asegurar tu comisión. </p>
                        <div class="d-flex align-items-center justify-content-center">
                            <hr class="hr-dash" />
                        </div>
                        <p class="text-empty-contrato text-center mt-3"> <strong><span class="fw-600 bold-ft">O
                                    ingresa
                                    el correo electrónico de otros asesores y gana dinero cuando contraten el Respaldo
                                    Homie para sus clientes: </span></strong></p>

                        @livewire('avisos.invitar-broker-mails',key('broker-invitar-mails'))

                    @else
                        <div class="container">
                            <div class="row mt-4 ocultar-pc">
                                <div class="col-6 d-flex align-items-center ">
                                    <p class="text-left text-gris">Nombre del asesor referido</p>
                                </div>
                                <div class="col-6 d-flex align-items-center justify-content-center">
                                    <p class="text-left text-gris">Estado</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion accordion-contratos mt-4 ocultar-pc" id="accordionContratos">
                            @foreach ($referidos as $key => $referido)
                                @php
                                    $transaction_data = App\Models\Transaction::where('user_id', $referido->id)->first();
                                    
                                @endphp
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $key }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}"
                                            aria-expanded="false" aria-controls="collapse{{ $key }}">
                                            <div class="row w-100">
                                                <div class="col-6 d-flex align-items-center">
                                                    <p class="pr-3 w-100" style="font-size: 1.1rem">
                                                        {{ $referido->name }}
                                                        {{ $referido->last_name }}</p>
                                                </div>
                                                <div class="col-6 d-flex align-items-center justify-content-center">
                                                    @if ($transaction_data)
                                                        @if ($transaction_data->status == 'Pendiente')
                                                            <span style="font-size: 1.1rem" class="ping-pendiente">
                                                                {{ $transaction_data->status }}
                                                            </span>
                                                        @elseif ($transaction_data->status == 'Firmado')
                                                            <span style="font-size: 1.1rem" class="ping-cerrado">
                                                                {{ $transaction_data->status }}
                                                            </span>
                                                        @elseif ($transaction_data->status == 'Pendiente de firma')
                                                            <span style="font-size: 1.1rem" class="ping-firma">
                                                                {{ $transaction_data->status }}
                                                            </span>
                                                        @elseif ($transaction_data->status == 'Sin contrato')
                                                            <span style="font-size: 1.1rem" class="text-gris">
                                                                {{ $transaction_data->status }}
                                                            </span>
                                                        @endif
                                                    @else
                                                        <span style="font-size: 1.1rem" class="ping-pendiente">
                                                            Pendiente de transacción
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>


                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $key }}"
                                        data-bs-parent="#accordionContratos">
                                        <div class="accordion-body">


                                            <div class="row row-cols-1">
                                                <div class="col">
                                                    @if ($transaction_data)
                                                        <p class="text-gris mt-3">Transacción</p>
                                                        <p>{{ $transaction_data->transaction }}</p>
                                                    @else
                                                        <p class="text-gris mt-3">Sin transacción</p>
                                                    @endif
                                                </div>
                                                <div class="col  mt-3">
                                                    @if ($referido->ganancia == '$0' || $referido->ganancia == '$0 MXN')
                                                        <p class="text-gris mt-3">Ganancia</p>
                                                        <p>Por definir</p>

                                                    @else
                                                        <p class="text-gris mt-3">Ganancia</p>
                                                        <p>{{ $referido->ganancia }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>

                        <div class="table-responsive table-dash mt-lg-0 mt-md-5 mt-5 ocultar-md">
                            <table class="table">
                                <thead>
                                    <tr class="title-th">
                                        <th scope="col" class="text-center">Mis asesores referidos</th>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-center">Transacción</th>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-center">Estado del contrato</th>
                                        <th scope="col"></th>
                                        <th scope="col" class="text-center">Ganancia <a tabindex="0"
                                                data-bs-container="body" role="button" data-bs-toggle="popover"
                                                data-bs-trigger="focus" data-bs-placement="top" title="Ganancia"
                                                data-bs-content="Este es el monto total que Homie te ha depositado por referir a este asesor"><i
                                                    class="far fa-question-circle"></i></a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($referidos as $referido)
                                        @php
                                            $transaction_data = App\Models\Transaction::where('user_id', $referido->id)->first();
                                            
                                        @endphp
                                        <tr>

                                            <td class="text-center">{{ $referido->name }}
                                                {{ $referido->last_name }}</td>
                                            <td></td>
                                            <td class="text-center">
                                                @if ($transaction_data)
                                                    {{ $transaction_data->transaction }}
                                                @else
                                                    Sin transacción
                                                @endif
                                            </td>
                                            <td></td>
                                            <td class="text-center d-flex align-items-center justify-content-center">
                                                @if ($transaction_data)
                                                    @if ($transaction_data->status == 'Pendiente')
                                                        <span class="ping-pendiente">
                                                            {{ $transaction_data->status }}
                                                        </span>
                                                    @elseif ($transaction_data->status == 'Firmado')
                                                        <span class="ping-cerrado">
                                                            {{ $transaction_data->status }}
                                                        </span>
                                                    @elseif ($transaction_data->status == 'Pendiente de firma')
                                                        <span class="ping-firma">
                                                            {{ $transaction_data->status }}
                                                        </span>
                                                    @elseif ($transaction_data->status == 'Sin contrato')
                                                        <span class="text-gris">
                                                            {{ $transaction_data->status }}
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="ping-pendiente">
                                                        Pendiente de transacción
                                                    </span>
                                                @endif
                                            </td>
                                            <td></td>
                                            <td class="text-center">
                                                @if ($referido->ganancia != '$0')
                                                    <span>{{ $referido->ganancia }}</span>
                                                @else
                                                    <span class="text-gris">Por definir</span>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr class="espacio-tr"></tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
                <div class="tab-pane fade {{ $type == 'datos' ? 'show active' : '' }}" id=" v-pills-messages"
                    role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <p class="ocultar-pc text-primary mt-3 mb-3">
                        Mis datos
                    </p>
                    <form onsubmit="return editarUsuario(event)">
                        <label class="text-gris">Datos personales:</label>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label for="name" class="col-form-label fw-100">Nombre</label>
                                <input type="text" readonly class="form-input cursor-default" id="name"
                                    onkeyup="onlyLetrasNum(this)" maxlength="255" wire:model.defer="createForm.name"
                                    autocomplete="off">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                                <input type="text" readonly class="form-input cursor-default" id="last_name"
                                    onkeyup="onlyLetrasNum(this)" maxlength="255"
                                    wire:model.defer="createForm.last_name" autocomplete="off">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label for="inmobiliaria" class="col-form-label fw-100">Nombre de la
                                    inmobiliaria</label>
                                <input type="text" readonly class="form-input cursor-default" id="inmobiliaria"
                                    onkeyup="onlyLetrasNum(this)" maxlength="255"
                                    wire:model.defer="createForm.inmobiliaria" autocomplete="off">
                            </div>
                        </div>
                        <label class="mt-4 text-gris">Datos de contacto:</label>
                        <div class="form-group row">
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label for="phone" class="col-form-label fw-100">Celular</label>
                                <input type="text" readonly class="form-input cursor-default" id="phone"
                                    onkeyup="onlyLetrasNum(this)" maxlength="255" wire:model.defer="createForm.phone"
                                    autocomplete="off">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt-2">
                                <label for="email" class="col-form-label fw-100">Email</label>
                                <input type="text" readonly class="form-input cursor-default" id="email"
                                    onkeyup="onlyLetrasNum(this)" maxlength="255" wire:model.defer="createForm.email"
                                    autocomplete="off">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            const clipboard = new ClipboardJS('.copy_btn');

            clipboard.on('success', function(e) {
                console.info('Action:', e.action);
                console.info('Text:', e.text);
                console.info('Trigger:', e.trigger);

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Código copiado'
                });


                e.clearSelection();
            });


        });
    </script>


</div>
