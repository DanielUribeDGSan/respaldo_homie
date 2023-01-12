<div x-data>
    <style>
        .dropdown-menu {
            min-width: auto !important;
        }

        /* Alerta */
        .fixed {
            position: fixed;
        }

        .sm\:p-10 {
            padding: 2.5rem;
        }

        .z-100 {
            z-index: 100000;
        }

        .pin-l {
            right: 10%;
        }

        .pin-b {
            bottom: 40%;
        }

        .shadow-md {
            -webkit-box-shadow: 0 4px 8px 0 rgb(0 0 0 / 12%),
                0 2px 4px 0 rgb(0 0 0 / 8%);
            box-shadow: 0 4px 8px 0 rgb(0 0 0 / 12%), 0 2px 4px 0 rgb(0 0 0 / 8%) !important;
        }

        .bg-white {
            background-color: #fff !important;
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .relative {
            position: relative;
        }

        .w-16 {
            width: 6rem;
        }

        .w-full {
            width: 100%;
        }

        p {
            line-height: 0.7;
        }

        .block {
            display: block;
        }

        .leading-normal {
            line-height: 1.5;
        }

        .px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .bg-lf-teal {
            border: 0px;
            background-color: #0fccce;
        }

        .rounded-lg {
            border-radius: 0.5rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .mar-2 {
            margin-right: 0.9rem;
        }

        .w-alert {
            width: 60vw;
        }

    </style>
    <div class="row">
        <div class="col-12">
            <div class="card" style="overflow: auto;">
                <div class="card-body">

                    <h4 class="card-title">Referidos</h4>

                    <div class="input-group flex-nowrap mt-3 mb-3" style="width: 27vw;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Buscar email" aria-label="Buscar email"
                            aria-describedby="addon-wrapping" wire:model="search">
                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>

                            <tr>
                                <th>Email</th>
                                <th>Nombre</th>
                                <th>Cantidad referidos</th>
                                <th>Ganancia</th>
                                <th>Ver referidos</th>
                                <th>Editar ganancia</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($referidos as $key => $referido)
                                <tr>
                                    <td>{{ $referido->email }}</td>
                                    <td>
                                        {{ $referido->name }} {{ $referido->last_name }}
                                    </td>
                                    <td>
                                        @php
                                            $count_referidos = App\Models\User::where('referred_guest', $referido->referred_id)->get();
                                        @endphp
                                        @if ($count_referidos->count() > 0)
                                            {{ $count_referidos->count() }}
                                        @else
                                            0
                                        @endif
                                    </td>
                                    <td>{{ $referido->ganancia }}</td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a class="btn btn-secondary"
                                                onclick="abrir_Popup('{{ $referido->email }}')">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a class="btn btn-secondary" data-toggle="modal"
                                                data-target="#editarGananciaModal"
                                                wire:click="edit('{{ $referido->email }}')">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex align-items-center justify-content-center">
                        {{ $referidos->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <script>
        var objeto_window_referencia;
        var configuracion_ventana = "menubar=yes,location=yes,resizable=yes,scrollbars=yes,status=yes,width=120,height=300";

        function abrir_Popup(email) {

            window.open(`https://www.respaldohomie.mx/emails-referidos/${email}`, "ventana1",
                "width=700,height=500,scrollbars=NO")

        }
    </script>
    <!-- Modal -->



    <div class="modal fade" id="editarGananciaModal" tabinde x="-1" aria-labelledby="editarGananciaModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="editGanancia">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarGananciaModalLabel">Editar ganancia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Ganancia <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="Ganancia"
                                        wire:model.defer="editForm.ganancia">
                                    @if ($errors->has('editForm.ganancia'))
                                        <span>{{ $errors->first('editForm.ganancia') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                            wire:loading.remove>Actualizar ganancia</button>
                        <div wire:loading wire:loading.class="d-flex align-items-center justify-content-center">
                            <x-loading />
                        </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')

        <script>
            Livewire.on('messageUpdateGanancia', function() {
                Swal.fire({
                    title: 'Ganancia actualizada',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#editarGananciaModal').modal('hide');
            });
        </script>
    @endpush

</div>
