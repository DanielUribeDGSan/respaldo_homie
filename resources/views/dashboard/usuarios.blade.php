@extends('layouts.dashboard')


@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card" style="overflow: auto;">
                <div class="card-body">

                    <h4 class="card-title">Datos de usuarios</h4>
                    <p class="card-title-desc">En esta sección puedes imprimir los datos de los usuarios, exportarlos a
                        Excel, csv y pdf.<br />También puedes mostrar y ocultar columnas de la tabla que no necesites
                        exportar.
                    </p>
                    <!-- <a href="{{ url('/descargar-excel') }}" class="btn btn-primary">Descargar Usuarios Activos</a> -->

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>

                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Tipo de usuario</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->



    <script>
        $(document).ready(function() {

            $('#datatable-buttons thead th').each(function() {
                var title = $('#datatable-buttons thead th').eq($(this).index()).text();
                $(this).html(title + '<input type="text" class="form-control" placeholder="Buscar" />');
            });

            var table = $('#datatable-buttons').DataTable({
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
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir tabla',
                        exportOptions: {
                            columns: ':visible'
                        },
                        customize: function(win) {
                            $(win.document.body)
                                .css('font-size', '10pt')
                                .prepend(
                                    '<img src="../theme-assets/images/China-Logo.png" style="position:absolute; top:0; left:0;" />'
                                );

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        autoFilter: true,
                        sheetName: 'Exported data',
                        exportOptions: {
                            columns: ':visible'
                        }


                    },
                    {
                        extend: 'csvHtml5',
                        text: '<i class="fas fa-file-csv"></i>',
                        titleAttr: 'Exportar a CSV',
                        charset: 'UTF-16LE',
                        bom: true,
                        autoFilter: false,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        messageTop: '',
                        text: '<i class="fas fa-file-pdf"></i>',
                        titleAttr: 'Exportar a PDF',
                        orientation: 'landscape',
                        pageSize: 'LEGAL',
                        filename: 'Usuarios-Wavin',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"> </i>',
                        titleAttr: 'Visibilidad de las columnas',
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
@endsection
