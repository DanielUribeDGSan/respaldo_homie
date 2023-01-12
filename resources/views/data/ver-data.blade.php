<x-layout-web>
    <style>
        .dataTables_wrapper {
            overflow: auto;
        }

    </style>
    <div class="section">
        <div class="container">
            <hr />
            <h1 class="mt-2">Transacciones</h1>
            <table id="table_repaldo_homie01" class="table table-striped table-bordered dt-responsive nowrap mt-5"
                style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                <thead>

                    <tr>
                        <th>DATOS INQUILINO -></th>
                        <th>inq_nombre</th>
                        <th>inq_apellido</th>
                        <th>inq_correo</th>
                        <th>inq_telefono</th>
                        <th>inq_contrasena</th>
                        <th>inq_identificacion_oficial</th>
                        <th>inq_documentacion</th>

                        <th>DATOS PROPIETARIO -></th>
                        <th>prop_nombre</th>
                        <th>prop_apellido</th>
                        <th>prop_correo</th>
                        <th>prop_telefono</th>
                        <th>prop_contrasena</th>
                        <th>prop_escrituras</th>
                        <th>prop_contrato_compra_venta</th>
                        <th>prop_poder_notarial</th>
                        <th>prop_comprobante_domicilio</th>
                        <th>prop_identificacion_oficial</th>

                        <th>DATOS BROKER -></th>
                        <th>bro_nombre</th>
                        <th>bro_apellido</th>
                        <th>bro_correo</th>
                        <th>bro_telefono</th>
                        <th>bro_contrasena</th>

                        <th>DATOS INMUEBLE -></th>
                        <th>inm_identificador_unico</th>
                        <th>inm_admite_mascotas</th>
                        <th>inm_numero_mascotas</th>
                        <th>inm_tiene_estacionamiento</th>
                        <th>inm_costo_de_servicio_esta_incluido_en_la_renta</th>
                        <th>inm_se_encuentra_amueblado</th>
                        <th>inm_metodo_de_pago</th>
                        <th>inm_numero_de_cuenta_bancaria</th>
                        <th>inm_propietario_puede_facturar</th>
                        <th>inm_precio_renta</th>
                        <th>inm_direccion</th>
                        <th>inm_tipo_de_producto</th>

                        <th>SOLICITUD DE RENTA (DE INQUILINO) -></th>
                        <th>sol_tipo_de_persona</th>
                        <th>sol_rfc</th>
                        <th>sol_fecha_de_nacimiento</th>
                        <th>sol_estado_civil</th>
                        <th>sol_ingresos_netos_mensuales</th>
                        <th>sol_ultimos_4_digitos_de_tarjeta</th>
                        <th>sol_direccion_vivienda_actual</th>
                        <th>sol_nombre_institucion_educativa</th>
                        <th>sol_trabajo</th>
                        <th>sol_nombre_de_la_empresa</th>
                        <th>sol_actividad_de_la_empresa</th>

                        <th>REFERENCIAS DEL INQUILINO -></th>
                        <th>ref_nombre</th>
                        <th>ref_apellido</th>
                        <th>ref_correo</th>
                        <th>ref_telefono</th>

                        <th>DATOS DE ROOMIES-></th>
                        <th>roo_compartira_renta</th>
                        <th>roo_nombre</th>
                        <th>roo_apellido</th>
                        <th>roo_correo</th>
                        <th>roo_telefono</th>
                        <th>roo_fecha_de_nacimiento</th>
                        <th>roo_rfc</th>
                        <th>roo_direccion_vivienda_actual</th>
                        <th>roo_identificacion_oficial</th>
                        <th>roo_documentacion</th>

                    </tr>
                </thead>

                <tbody>
                    @if ($transaccion->count() > 0)

                        @foreach ($transaccion as $key => $item)
                            <tr>

                                {{-- <td><a href="{{ $inquilino_item2->identificacion_oficial }}"
                                    target="_blank">{{ $inquilino_item2->identificacion_oficial }}</a></td>
                            <td>

                                @php
                                    $data = strval(str_replace(',', '*', str_replace(['\'', '"', '[', ']'], '', stripslashes($inquilino_item2->documentacion))));
                                    $documentos = explode('*', $data);
                                @endphp
                                @foreach ($documentos as $doc)
                                    <a href="{{ $doc }}" target="_blank"> {{ $doc }}</a><br />
                                @endforeach

                            </td> --}}
                                <td></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->password }}</td>
                                <td>{{ $item->i_identificacion_oficial }}</td>
                                <td>{{ str_replace(',', '  ', str_replace(['\'', '"', '[', ']'], '', stripslashes($item->i_documentacion))) }}
                                </td>

                                <td></td>
                                <td>{{ $item->propietario[0]->name }}</td>
                                <td>{{ $item->propietario[0]->last_name }}</td>
                                <td>{{ $item->propietario[0]->email }}</td>
                                <td>{{ $item->propietario[0]->phone }}</td>
                                <td>
                                    @isset($item->propietario[0]->password)
                                        {{ $item->propietario[0]->password }}
                                    @endisset
                                </td>
                                <td>{{ $item->p_escrituras }}</td>
                                <td>{{ $item->p_contrato_compra_venta }}</td>
                                <td>{{ $item->p_poder_notarial }}</td>
                                <td>{{ $item->p_comprobante_domicilio }}</td>
                                <td>{{ $item->p_identificacion_oficial }}</td>

                                <td></td>
                                @if ($item->broker->count() > 0)
                                    <td> {{ $item->broker[0]->name }}</td>
                                    <td>{{ $item->broker[0]->last_name }}</td>
                                    <td>{{ $item->broker[0]->email }}</td>
                                    <td>{{ $item->broker[0]->phone }}</td>
                                    <td>{{ $item->broker[0]->password }}</td>
                                @else
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                @endif

                                <td></td>
                                <td>{{ $item->identificador }}</td>
                                <td>{{ $item->p_admite_mascotas }}</td>
                                <td>{{ $item->p_cantidad_mascotas }}</td>
                                <td>{{ $item->p_tiene_estacionamiento }}</td>
                                <td>{{ $item->p_servicios }}</td>
                                <td>{{ $item->p_esta_amueblado }}</td>
                                <td>{{ $item->p_metodo_pago }}</td>
                                <td>{{ $item->p_numero_cuenta }}</td>
                                <td>{{ $item->p_puede_facturar }}</td>
                                <td>{{ $item->p_precio_propiedad }}</td>
                                <td>{{ $item->p_calle . ' ' . $item->p_num_exterior . ' ' . $item->p_colonia . ' ' . $item->p_code_postal . ' ' . $item->p_delegacion_alcaldia . ' ' . $item->p_estado }}
                                </td>
                                <td>{{ $item->transaction }}</td>
                                <td></td>
                                <td>{{ $item->i_tipo_de_persona }}</td>
                                <td>{{ $item->i_rfc }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->i_fecha_de_nacimiento)->format('d/m/Y') }}</td>
                                <td>{{ $item->i_estado_civil }}</td>
                                <td>{{ $item->i_ingresos_netos }}</td>
                                <td>{{ $item->i_tarjeta }}</td>
                                <td>{{ $item->i_calle . ' ' . $item->i_num_exterior . ' ' . $item->i_colonia . ' ' . $item->i_code_postal . ' ' . $item->i_delegacion_alcaldia . ' ' . $item->i_estado }}
                                </td>
                                <td>{{ $item->i_institucion_educativa }}</td>
                                <td>{{ $item->i_trabajo }}</td>
                                <td>{{ $item->i_empresa }}</td>
                                <td>{{ $item->i_actividad_empresa }}</td>

                                <td></td>
                                <td>{{ $item->tr_name }}</td>
                                <td>{{ $item->tr_last_name }}</td>
                                <td>{{ $item->tr_email }}</td>
                                <td>{{ $item->tr_phone }}</td>

                                <td></td>
                                <td>{{ $item->roomies[0]->compartira_renta }}</td>
                                <td>{{ $item->roomies[0]->name }}</td>
                                <td>{{ $item->roomies[0]->last_name }}</td>
                                <td>{{ $item->roomies[0]->email }}</td>
                                <td>{{ $item->roomies[0]->phone }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->roomies[0]->fecha_de_nacimiento)->format('d/m/Y') }}
                                </td>

                                <td>{{ $item->roomies[0]->rfc }}</td>
                                <td>{{ $item->roomies[0]->calle . ' ' . $item->roomies[0]->num_exterior . ' ' . $item->roomies[0]->colonia . ' ' . $item->roomies[0]->code_postal . ' ' . $item->roomies[0]->delegacion_alcaldia . ' ' . $item->roomies[0]->estado }}
                                </td>
                                <td>{{ $item->roomies[0]->identificacion_oficial }}</td>
                                <td>{{ str_replace(',', '  ', str_replace(['\'', '"', '[', ']'], '', stripslashes($item->roomies[0]->documentacion))) }}
                                </td>

                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>





        </div>
    </div>
    <!-- DATATABLE -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#table_repaldo_homie01 thead th').each(function() {
                var title = $('#table_repaldo_homie01 thead th').eq($(this).index()).text();
                $(this).html(title + '<input type="text" class="form-control" placeholder="Buscar" />');
            });
            var table = $('#table_repaldo_homie01').DataTable({
                dom: 'Bfrtip',
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Demostración _START_ en _END_, de _TOTAL_ datos registrados",
                    "infoEmpty": "Showing 0 to 0 of 0 entries",
                    "infoFiltered": "(filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Seleccionar el número de entradas _MENU_",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "No se encontraron registros coincidentes",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activar para ordenar la columna ascendente",
                        "sortDescending": ": activar para ordenar la columna descendente"
                    }
                },
                dom: 'lBfrtip',
                buttons: [{
                        extend: 'csvHtml5',
                        title: 'Datos de la transaccion',
                        text: '<i class="fas fa-file-csv"></i>',
                        titleAttr: 'Exportar a CSV',
                        charset: 'UTF-16LE',
                        bom: true,
                        autoFilter: false,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },

                ],
                "lengthMenu": [
                    [10, 20, 30, 50, -1],
                    [10, 20, 30, 50, "Todos"]
                ]
            });
            table.columns().eq(0).each(function(colIdx) {
                $('input', table.column(colIdx).header()).on('keyup change', function() {
                    table
                        .column(colIdx)
                        .search(this.value)
                        .draw();
                });
            });
            // table.columns([6, 7, 9]).visible(false);
        });
    </script>

</x-layout-web>
