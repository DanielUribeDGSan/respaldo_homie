@extends('layouts.dashboard')

@section('content')

    <h4 class="mt-2 ">Transacciones</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes anterior</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes actual</h5>
                        </div>
                    </div>
                    <div id="transaccionesChart" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="totalTransaccion"></h3> Transacciones en total
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="totalNewTransaccion"></h3> Transacciones nuevas
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="mesAnteriorTransaccion"></h3> Transacciones del mes anterior
                </div>
            </div>
        </div>

    </div>

    <script>
        let dateObjTrans = new Date();
        let monthTrans = String(dateObjTrans.getMonth() + 1).padStart(2, '0');
        let monthLastTrans = String(dateObjTrans.getMonth()).padStart(2, '0');

        let yearTrans = dateObjTrans.getFullYear();

        let outputTrans = yearTrans + '-' + monthTrans;
        let outputLastTrans = yearTrans + '-' + monthLastTrans;
        var transArr = [];
        var transNew = [];
        var transLast = [];

        @foreach ($transactions as $key => $transaction)
        
            if ('{{ $transaction->created_at }}'.substr(0, 7) == outputTrans) {
            transNew.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 7),
            actual: outputTrans
            });
        
        
            }
        
            if ('{{ $transaction->created_at }}'.substr(0, 7) == outputLastTrans) {
            transLast.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 10),
            actual: outputTrans
            });
            }
            transArr.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 10),
            actual: outputTrans
            });
        @endforeach

        const transTotal = transArr.length;
        const transNuevos = transNew.length;
        const transAnteriores = transLast.length;

        document.getElementById("totalTransaccion").innerHTML = `${transTotal}`;
        document.getElementById("totalNewTransaccion").innerHTML = `${transNuevos}`;
        document.getElementById("mesAnteriorTransaccion").innerHTML = `${transAnteriores}`;

        new Morris.Bar({
            element: 'transaccionesChart',
            data: [{
                y: outputLastTrans,
                a: transTotal,
                b: transAnteriores
            }, {
                y: outputTrans,
                a: transTotal,
                b: transNuevos
            }, ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Transacciones Totales', 'Transacciones Nuevas']
        });
    </script>


    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>

    <h4 class="mt-2 ">Transacciones y estatus</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">

                    <div id="transaccionesEstatus" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="transaccionPendiente"></h3> Transacciones pendientes
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="transaccionFirmada"></h3> Transacciones firmadas
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionPendienteFirma"></h3> Transacciones pendientes de firma
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionSinContrato"></h3> Transacciones sin contrato
                </div>
            </div>
        </div>

    </div>

    <script>
        var transEstatusTotalArr = [];
        var transPendiente = [];
        var transFirmado = [];
        var transPendienteFirma = [];
        var transSinContrato = [];


        @foreach ($transactions as $key => $transaction)
        
        
            transEstatusTotalArr.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 7),
            });
        
            if ('{{ $transaction->status }}' == 'Pendiente') {
            transPendiente.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Firmado') {
            transFirmado.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Pendiente de firma') {
            transPendienteFirma.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Sin contrato') {
            transSinContrato.push({
            fecha: '{{ $transaction->created_at }}'.substr(0, 10),
            });
            }
        
        @endforeach

        document.getElementById("transaccionPendiente").innerHTML = `${transPendiente.length}`;
        document.getElementById("transaccionFirmada").innerHTML = `${transFirmado.length}`;
        document.getElementById("transaccionPendienteFirma").innerHTML = `${transPendienteFirma.length}`;
        document.getElementById("transaccionSinContrato").innerHTML = `${transSinContrato.length}`;

        new Morris.Bar({
            element: 'transaccionesEstatus',
            data: [{
                y: transEstatusTotalArr.length,
                a: transPendiente.length,
                b: transFirmado.length,
                c: transPendienteFirma.length,
                d: transSinContrato.length,
            }],
            xkey: 'y',
            ykeys: ['a', 'b', 'c', 'd'],
            labels: ['Transacciones pendientes', 'Transacciones firmadas', 'Transacciones pendientes de firma',
                'Transacciones sin contrato'
            ]
        });
    </script>


    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>


    <h4 class="mt-2 ">Transacciones y usuarios</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">

                    <div id="transaccionesUsuarios" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">


    </div>

    <script>
        var transUserTotalArr = [];
        var transUserArr = [];
        var transUser = [];
        var transUserCant1 = [];
        var transUserCant2 = [];
        var transUserCant3 = [];
        var transUserCant4 = [];
        var transUserCant5 = [];



        @foreach ($transactions_users as $key => $transaction_user)
        
            if('{{ $transaction_user->cantidad_transaccion }}' ==1){
            transUserCant1.push({
            cantidad: '{{ $transaction_user->id }}',
            });
            }
        
            if('{{ $transaction_user->cantidad_transaccion }}' ==2){
            transUserCant2.push({
            cantidad: '{{ $transaction_user->id }}',
            });
            }
        
        
            if('{{ $transaction_user->cantidad_transaccion }}' ==3){
            transUserCant3.push({
            cantidad: '{{ $transaction_user->id }}',
            });
            }
        
            if('{{ $transaction_user->cantidad_transaccion }}' ==4){
            transUserCant4.push({
            cantidad: '{{ $transaction_user->id }}',
            });
            }
        
            if('{{ $transaction_user->cantidad_transaccion }}' ==5){
            transUserCant5.push({
            cantidad: '{{ $transaction_user->id }}',
            });
            }
        
            if('{{ $transaction_user->cantidad_transaccion }}' == 1
            || '{{ $transaction_user->cantidad_transaccion }}' == 2
            || '{{ $transaction_user->cantidad_transaccion }}' == 3
            || '{{ $transaction_user->cantidad_transaccion }}' == 4
            || '{{ $transaction_user->cantidad_transaccion }}' == 5){
            transUserTotalArr.push({
            cantidad: '{{ $transaction_user->id }}' });
            }
        @endforeach

        transUser.push({
            y: transUserTotalArr.length,
            a: transUserCant1.length,
            b: transUserCant2.length,
            c: transUserCant3.length,
            d: transUserCant4.length,
            e: transUserCant5.length,
        });

        // console.log(transUser);

        // document.getElementById("transaccionPendiente").innerHTML = `${transPendiente.length}`;
        // document.getElementById("transaccionFirmada").innerHTML = `${transFirmado.length}`;
        // document.getElementById("transaccionPendienteFirma").innerHTML = `${transPendienteFirma.length}`;
        // document.getElementById("transaccionSinContrato").innerHTML = `${transSinContrato.length}`;

        new Morris.Bar({
            element: 'transaccionesUsuarios',
            data: transUser,
            xkey: 'y',
            ykeys: ['a', 'b', 'c', 'd', 'e'],
            labels: ['1 transacción', '2 transacciones', '3 transacciones', '4 transacciones', '5 transacciones']
        });
    </script>


    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>


    <h4 class="mt-4 ">Referidos registrados</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">

                    <div id="referidosRegistrados" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="usersTotalReferidosId"></h3> Total usuarios
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="usersReferidosId"></h3> Usuarios referidos
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="usersNoReferidosId"></h3> Usuarios no referidos
                </div>
            </div>
        </div>


    </div>

    <script>
        var usersReferidosTotalArr = [];
        var usersReferidosArr = [];
        var usersNoReferidosArr = [];



        @foreach ($users_full as $key => $user)
        
        
            usersReferidosTotalArr.push({
            fecha: '{{ $user->created_at }}'.substr(0, 7),
            });
        
            if ('{{ $user->referred_guest }}') {
            usersReferidosArr.push({
            fecha: '{{ $user->created_at }}'.substr(0, 10),
            });
            }
        
            if (!'{{ $user->referred_guest }}') {
            usersNoReferidosArr.push({
            fecha: '{{ $user->created_at }}'.substr(0, 10),
            });
            }
        
        
        
        @endforeach

        document.getElementById("usersTotalReferidosId").innerHTML = `${usersReferidosTotalArr.length}`;
        document.getElementById("usersReferidosId").innerHTML = `${usersReferidosArr.length}`;
        document.getElementById("usersNoReferidosId").innerHTML = `${usersNoReferidosArr.length}`;


        new Morris.Bar({
            element: 'referidosRegistrados',
            data: [{
                y: usersReferidosTotalArr.length,
                a: usersReferidosArr.length,
                b: usersNoReferidosArr.length,
            }],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Usuarios referidos', 'Usuarios no referidos']
        });
    </script>


    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>


    <h4 class="mt-2 ">Asesores</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes anterior</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes actual</h5>
                        </div>
                    </div>
                    <div id="morris-users" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="totalUser"></h3> Usuarios en total
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="newUsers"></h3> Usuarios nuevos
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="mesAnterior"></h3> Usuarios del mes anterior
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-xl-6">
            <div class="row text-center mt-4">
                <div class="col-12">
                    <h5 class="mb-0 font-size-18">Usuarios</h5>
                </div>
            </div>
            <div id="morris-users2" class="morris-charts morris-chart-height"></div>
        </div>
    </div>
    <!-- end row -->


    {{-- Transacciones estatus y broker --}}
    <h4 class="mt-4 ">Transacciones y estatus broker</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">

                    <div id="brokersStatus" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="transaccionPendienteBroker"></h3> Transacciones pendientes
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="transaccionFirmadaBroker"></h3> Transacciones firmadas
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionPendienteFirmaBroker"></h3> Transacciones pendientes de
                    firma
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionSinContratoBroker"></h3> Transacciones sin contrato
                </div>
            </div>
        </div>

    </div>

    <script>
        var transEstatusbrokerTotalArr = [];
        var transPendienteBroker = [];
        var transFirmadoBroker = [];
        var transPendienteFirmaBroker = [];
        var transSinContratoBroker = [];

        @foreach ($transactions_brokers as $key => $transaction)
        
        
            transEstatusbrokerTotalArr.push({
            fecha: '{{ $transaction->id }}'.substr(0, 7),
            });
        
            if ('{{ $transaction->status }}' == 'Pendiente') {
            transPendienteBroker.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Firmado') {
            transFirmadoBroker.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Pendiente de firma') {
            transPendienteFirmaBroker.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Sin contrato') {
            transSinContratoBroker.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
        
        @endforeach

        document.getElementById("transaccionPendienteBroker").innerHTML = `${transPendienteBroker.length}`;
        document.getElementById("transaccionFirmadaBroker").innerHTML = `${transFirmadoBroker.length}`;
        document.getElementById("transaccionPendienteFirmaBroker").innerHTML = `${transPendienteFirmaBroker.length}`;
        document.getElementById("transaccionSinContratoBroker").innerHTML = `${transSinContratoBroker.length}`;

        new Morris.Bar({
            element: 'brokersStatus',
            data: [{
                y: transEstatusbrokerTotalArr.length,
                a: transPendienteBroker.length,
                b: transFirmadoBroker.length,
                c: transPendienteFirmaBroker.length,
                d: transSinContratoBroker.length,
            }],
            xkey: 'y',
            ykeys: ['a', 'b', 'c', 'd'],
            labels: ['Transacciones pendientes', 'Transacciones firmadas', 'Transacciones pendientes de firma',
                'Transacciones sin contrato'
            ]
        });
    </script>


    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>
    <!-- end user -->
    <h4 class="mt-2 ">Propietarios</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes anterior</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes actual</h5>
                        </div>
                    </div>
                    <div id="morris-usersp" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="totalUserp"></h3> Usuarios en total
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="newUsersp"></h3> Usuarios nuevos
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="mesAnteriorp"></h3> Usuarios del mes anterior
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-xl-6">
            <div class="row text-center mt-4">
                <div class="col-12">
                    <h5 class="mb-0 font-size-18">Usuarios</h5>
                </div>
            </div>
            <div id="morris-users2p" class="morris-charts morris-chart-height"></div>
        </div>
    </div>
    <!-- end row -->

    {{-- Transacciones estatus y propietario --}}
    <h4 class="mt-4 ">Transacciones y estatus propietario</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">

                    <div id="propietariosStatus" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="transaccionPendientePropietario"></h3> Transacciones pendientes
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="transaccionFirmadaPropietario"></h3> Transacciones firmadas
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionPendienteFirmaPropietario"></h3> Transacciones pendientes
                    de
                    firma
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionSinContratoPropietario"></h3> Transacciones sin contrato
                </div>
            </div>
        </div>

    </div>

    <script>
        var transEstatuspropietarioTotalArr = [];
        var transPendientePropietario = [];
        var transFirmadoPropietario = [];
        var transPendienteFirmaPropietario = [];
        var transSinContratoPropietario = [];

        @foreach ($transactions_propietarios as $key => $transaction)
        
        
            transEstatuspropietarioTotalArr.push({
            fecha: '{{ $transaction->id }}'.substr(0, 7),
            });
        
            if ('{{ $transaction->status }}' == 'Pendiente') {
            transPendientePropietario.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Firmado') {
            transFirmadoPropietario.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Pendiente de firma') {
            transPendienteFirmaPropietario.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Sin contrato') {
            transSinContratoPropietario.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
        
        @endforeach

        document.getElementById("transaccionPendientePropietario").innerHTML = `${transPendientePropietario.length}`;
        document.getElementById("transaccionFirmadaPropietario").innerHTML = `${transFirmadoPropietario.length}`;
        document.getElementById("transaccionPendienteFirmaPropietario").innerHTML =
            `${transPendienteFirmaPropietario.length}`;
        document.getElementById("transaccionSinContratoPropietario").innerHTML = `${transSinContratoPropietario.length}`;

        new Morris.Bar({
            element: 'propietariosStatus',
            data: [{
                y: transEstatuspropietarioTotalArr.length,
                a: transPendientePropietario.length,
                b: transFirmadoPropietario.length,
                c: transPendienteFirmaPropietario.length,
                d: transSinContratoPropietario.length,
            }],
            xkey: 'y',
            ykeys: ['a', 'b', 'c', 'd'],
            labels: ['Transacciones pendientes', 'Transacciones firmadas', 'Transacciones pendientes de firma',
                'Transacciones sin contrato'
            ]
        });
    </script>

    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>
    <!-- end user -->
    <h4 class="mt-2 ">Inquilinos</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">
                    <div class="row text-center mt-4">
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes anterior</h5>
                        </div>
                        <div class="col-6">
                            <h5 class="mb-0 font-size-18">Mes actual</h5>
                        </div>
                    </div>
                    <div id="morris-usersi" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="totalUseri"></h3> Usuarios en total
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="newUsersi"></h3> Usuarios nuevos
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="mesAnteriori"></h3> Usuarios del mes anterior
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-xl-6">
            <div class="row text-center mt-4">
                <div class="col-12">
                    <h5 class="mb-0 font-size-18">Usuarios</h5>
                </div>
            </div>
            <div id="morris-users2i" class="morris-charts morris-chart-height"></div>
        </div>
    </div>
    <!-- end row -->

    {{-- Transacciones estatus y inquilino --}}
    <h4 class="mt-4 ">Transacciones y estatus inquilino</h4>
    <div class="header-bg mt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mb-4 pt-5">

                    <div id="inquilinosStatus" class="morris-charts morris-chart-height"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-info mt-2" id="transaccionPendienteInquilino"></h3> Transacciones pendientes
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-purple mt-2" id="transaccionFirmadaInquilino"></h3> Transacciones firmadas
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionPendienteFirmaInquilino"></h3> Transacciones pendientes de
                    firma
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-6 ">
            <div class="card text-center">
                <div class="mb-2 card-body text-muted">
                    <h3 class="text-primary mt-2" id="transaccionSinContratoInquilino"></h3> Transacciones sin contrato
                </div>
            </div>
        </div>

    </div>

    <script>
        var transEstatusinquilinoTotalArr = [];
        var transPendienteInquilino = [];
        var transFirmadoInquilino = [];
        var transPendienteFirmaInquilino = [];
        var transSinContratoInquilino = [];

        @foreach ($transactions_inquilinos as $key => $transaction)
        
        
            transEstatusinquilinoTotalArr.push({
            fecha: '{{ $transaction->id }}'.substr(0, 7),
            });
        
            if ('{{ $transaction->status }}' == 'Pendiente') {
            transPendienteInquilino.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Firmado') {
            transFirmadoInquilino.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Pendiente de firma') {
            transPendienteFirmaInquilino.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
            if ('{{ $transaction->status }}' == 'Sin contrato') {
            transSinContratoInquilino.push({
            fecha: '{{ $transaction->id }}'.substr(0, 10),
            });
            }
        
        
        @endforeach

        document.getElementById("transaccionPendienteInquilino").innerHTML = `${transPendienteInquilino.length}`;
        document.getElementById("transaccionFirmadaInquilino").innerHTML = `${transFirmadoInquilino.length}`;
        document.getElementById("transaccionPendienteFirmaInquilino").innerHTML = `${transPendienteFirmaInquilino.length}`;
        document.getElementById("transaccionSinContratoInquilino").innerHTML = `${transSinContratoInquilino.length}`;

        new Morris.Bar({
            element: 'inquilinosStatus',
            data: [{
                y: transEstatusinquilinoTotalArr.length,
                a: transPendienteInquilino.length,
                b: transFirmadoInquilino.length,
                c: transPendienteFirmaInquilino.length,
                d: transSinContratoInquilino.length,
            }],
            xkey: 'y',
            ykeys: ['a', 'b', 'c', 'd'],
            labels: ['Transacciones pendientes', 'Transacciones firmadas', 'Transacciones pendientes de firma',
                'Transacciones sin contrato'
            ]
        });
    </script>

    <div class="row">
        <div class="col-xl-12">
            <hr />
        </div>
    </div>
    <!-- end user -->
    <script>
        let dateObj = new Date();
        let month = String(dateObj.getMonth() + 1).padStart(2, '0');
        let monthLast = String(dateObj.getMonth()).padStart(2, '0');
        let day = String(dateObj.getDate()).padStart(2, '0');

        let year = dateObj.getFullYear();
        let hora = String(dateObj.getHours()).padStart(2, '0');
        let minutos = String(dateObj.getMinutes()).padStart(2, '0');
        let segundos = String(dateObj.getSeconds()).padStart(2, '0');
        let output = year + '-' + month;
        let outputLast = year + '-' + monthLast;
        var usersArr = [];
        var usersNew = [];
        var usersLast = [];

        @foreach ($users as $key => $user)
        
            if ('{{ $user->created_at }}'.substr(0, 7) == output) {
            usersNew.push({
            fecha: '{{ $user->created_at }}'.substr(0, 7),
            actual: output
            });
        
        
            }
            if ('{{ $user->created_at }}'.substr(0, 7) == outputLast) {
            usersLast.push({
            fecha: '{{ $user->created_at }}'.substr(0, 10),
            actual: output
            });
            }
            usersArr.push({
            fecha: '{{ $user->created_at }}'.substr(0, 10),
            actual: output
            });
        @endforeach

        let usuariosTotal = usersArr.length;
        let usuariosNuevos = usersNew.length;
        let usuariosAnteriores = usersLast.length;

        document.getElementById("totalUser").innerHTML = `${usuariosTotal}`;
        document.getElementById("newUsers").innerHTML = `${usuariosNuevos}`;
        document.getElementById("mesAnterior").innerHTML = `${usuariosAnteriores}`;

        new Morris.Bar({
            element: 'morris-users',
            data: [{
                y: outputLast,
                a: usuariosTotal,
                b: usuariosAnteriores
            }, {
                y: output,
                a: usuariosTotal,
                b: usuariosNuevos
            }, ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Usuarios Totales', 'Usuarios Nuevos']
        });
        new Morris.Donut({
            element: 'morris-users2',
            data: [{
                    label: "Usuarios totales",
                    value: usuariosTotal
                },
                {
                    label: "Usuarios Nuevos",
                    value: usuariosNuevos
                },
                {
                    label: "Usuarios Pasados",
                    value: usuariosAnteriores
                }

            ]
        });
    </script>



    <script>
        let dateObj2 = new Date();
        let month2 = String(dateObj2.getMonth() + 1).padStart(2, '0');
        let monthLast2 = String(dateObj2.getMonth()).padStart(2, '0');
        let day2 = String(dateObj2.getDate()).padStart(2, '0');

        let year2 = dateObj2.getFullYear();
        let hora2 = String(dateObj2.getHours()).padStart(2, '0');
        let minutos2 = String(dateObj2.getMinutes()).padStart(2, '0');
        let segundos2 = String(dateObj2.getSeconds()).padStart(2, '0');
        let output2 = year2 + '-' + month2;
        let outputLast2 = year2 + '-' + monthLast2;
        var usersArr2 = [];
        var usersNew2 = [];
        var usersLast2 = [];

        @foreach ($users2 as $key => $user2)
        
            if ('{{ $user2->created_at }}'.substr(0, 7) == output2) {
            usersNew2.push({
            fecha: '{{ $user2->created_at }}'.substr(0, 7),
            actual: output2
            });
        
        
            }
            if ('{{ $user2->created_at }}'.substr(0, 7) == outputLast2) {
            usersLast2.push({
            fecha: '{{ $user2->created_at }}'.substr(0, 10),
            actual: output2
            });
            }
            usersArr2.push({
            fecha: '{{ $user2->created_at }}'.substr(0, 10),
            actual: output2
            });
        @endforeach

        let usuariosTotal2 = usersArr2.length;
        let usuariosNuevos2 = usersNew2.length;
        let usuariosAnteriores2 = usersLast2.length;

        document.getElementById("totalUserp").innerHTML = `${usuariosTotal2}`;
        document.getElementById("newUsersp").innerHTML = `${usuariosNuevos2}`;
        document.getElementById("mesAnteriorp").innerHTML = `${usuariosAnteriores2}`;

        new Morris.Bar({
            element: 'morris-usersp',
            data: [{
                y: outputLast2,
                a: usuariosTotal2,
                b: usuariosAnteriores2
            }, {
                y: output2,
                a: usuariosTotal2,
                b: usuariosNuevos2
            }, ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Usuarios Totales', 'Usuarios Nuevos']
        });
        new Morris.Donut({
            element: 'morris-users2p',
            data: [{
                    label: "Usuarios totales",
                    value: usuariosTotal2
                },
                {
                    label: "Usuarios Nuevos",
                    value: usuariosNuevos2
                },
                {
                    label: "Usuarios Pasados",
                    value: usuariosAnteriores2
                }

            ]
        });
    </script>

    <script>
        let dateObj3 = new Date();
        let month3 = String(dateObj3.getMonth() + 1).padStart(2, '0');
        let monthLast3 = String(dateObj3.getMonth()).padStart(2, '0');
        let day3 = String(dateObj3.getDate()).padStart(2, '0');

        let year3 = dateObj3.getFullYear();
        let hora3 = String(dateObj3.getHours()).padStart(2, '0');
        let minutos3 = String(dateObj3.getMinutes()).padStart(2, '0');
        let segundos3 = String(dateObj3.getSeconds()).padStart(2, '0');
        let output3 = year3 + '-' + month3;
        let outputLast3 = year3 + '-' + monthLast3;
        var usersArr3 = [];
        var usersNew3 = [];
        var usersLast3 = [];

        @foreach ($users3 as $key => $user3)
        
            if ('{{ $user3->created_at }}'.substr(0, 7) == output3) {
            usersNew3.push({
            fecha: '{{ $user3->created_at }}'.substr(0, 7),
            actual: output3
            });
        
        
            }
            if ('{{ $user3->created_at }}'.substr(0, 7) == outputLast3) {
            usersLast3.push({
            fecha: '{{ $user3->created_at }}'.substr(0, 10),
            actual: output3
            });
            }
            usersArr3.push({
            fecha: '{{ $user3->created_at }}'.substr(0, 10),
            actual: output3
            });
        @endforeach

        let usuariosTotal3 = usersArr3.length;
        let usuariosNuevos3 = usersNew3.length;
        let usuariosAnteriores3 = usersLast3.length;

        document.getElementById("totalUseri").innerHTML = `${usuariosTotal3}`;
        document.getElementById("newUsersi").innerHTML = `${usuariosNuevos3}`;
        document.getElementById("mesAnteriori").innerHTML = `${usuariosAnteriores3}`;

        new Morris.Bar({
            element: 'morris-usersi',
            data: [{
                y: outputLast3,
                a: usuariosTotal3,
                b: usuariosAnteriores3
            }, {
                y: output3,
                a: usuariosTotal3,
                b: usuariosNuevos3
            }, ],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Usuarios Totales', 'Usuarios Nuevos']
        });
        new Morris.Donut({
            element: 'morris-users2i',
            data: [{
                    label: "Usuarios totales",
                    value: usuariosTotal3
                },
                {
                    label: "Usuarios Nuevos",
                    value: usuariosNuevos3
                },
                {
                    label: "Usuarios Pasados",
                    value: usuariosAnteriores3
                }

            ]
        });
    </script>
@endsection
