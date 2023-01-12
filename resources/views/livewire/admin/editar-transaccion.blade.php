<div x-data>
    <style>
        .dropdown-menu {
            min-width: auto !important;
        }

    </style>
    <div class="row">
        <div class="col-12">
            <div class="card" style="overflow: auto;">
                <div class="card-body">

                    <h4 class="card-title">Transacciones</h4>

                    <div class="input-group flex-nowrap mt-3 mb-3" style="width: 27vw;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Buscar transacción"
                            aria-label="Buscar transacción" aria-describedby="addon-wrapping" wire:model="search">
                    </div>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead>

                            <tr>
                                <th>Transacción</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Estatus</th>
                                <th>Ganancia</th>
                                <th>Asesor</th>
                                <th>Propietario</th>
                                <th>Inquilino</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($transactions as $key => $transaction)
                                <tr>
                                    <td>{{ $transaction->transaction }}</td>
                                    <td>{{ $transaction->name }} {{ $transaction->last_name }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->status }}</td>
                                    <td>{{ $transaction->ganancia }}</td>

                                    <td>
                                        @php
                                            $broker_data = App\Models\Transaction::where('user_id', $transaction->id)
                                                ->where('transaction', $transaction->transaction)
                                                ->orWhere('broker_id', $transaction->id)
                                                ->where('transaction', $transaction->transaction)
                                                ->first();
                                            $broker_user = App\Models\User::where('id', $transaction->user_id)
                                                ->where('type', 'broker')
                                                ->orWhere('id', $transaction->broker_id)
                                                ->orWhere('transaction', $transaction->transaction)
                                                ->where('type', 'broker')
                                                ->first();
                                        @endphp
                                        <span class="d-block text-center"><strong>Registro</strong></span>
                                        @if ($broker_user)
                                            <p style="font-size: 1.3rem;text-align: center;color:#04A268;"><i
                                                    class="fas fa-clipboard-check"></i></p>
                                        @else
                                            <p style="font-size: 1.3rem;text-align: center;color:#CE1508;"><i
                                                    class="fas fa-clipboard"></i></p>
                                        @endif
                                        <hr />
                                        <span class="d-block text-center mt-3"><strong>Datos</strong></span>
                                        @if (($broker_data && $broker_data->fase_broker == 2 && $transaction->type == 'broker') || ($broker_data->transaction == $transaction->user_transaction && $transaction->type == 'broker' && $transaction->fase == 2))
                                            <p style="font-size: 1.3rem;text-align: center;color:#04A268;"><i
                                                    class="fas fa-clipboard-check"></i></p>
                                        @else
                                            <p style="font-size: 1.3rem;text-align: center;color:#CE1508;"><i
                                                    class="fas fa-clipboard"></i></p>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            
                                            $propietario_registro = App\Models\Transaction::where('user_id', $transaction->id)
                                                ->where('transaction', $transaction->transaction)
                                                ->orWhere('propietario_id', $transaction->id)
                                                ->where('transaction', $transaction->transaction)
                                                ->first();
                                            
                                            $propietario_user = App\Models\User::where('type', 'propietario')
                                                ->where('id', $transaction->user_id)
                                                ->orWhere('id', $transaction->propietario_id)
                                                ->orWhere('transaction', $transaction->transaction)
                                                ->where('type', 'propietario')
                                                ->first();
                                            
                                            $propietario_data = App\Models\Owner::where('transaction', $transaction->transaction)->first();
                                        @endphp

                                        <span class="d-block text-center"><strong>Registro</strong></span>

                                        @if ($propietario_registro->asesor_llenara_datos > 0 || $propietario_user)
                                            <p style="font-size: 1.3rem;text-align: center;color:#04A268;"><i
                                                    class="fas fa-clipboard-check"></i></p>
                                        @else
                                            <p style="font-size: 1.3rem;text-align: center;color:#CE1508;"><i
                                                    class="fas fa-clipboard"></i></p>
                                        @endif
                                        <hr />
                                        <span class="d-block text-center mt-3"><strong>Datos</strong></span>
                                        @if ($propietario_data)
                                            <p style="font-size: 1.3rem;text-align: center;color:#04A268;"><i
                                                    class="fas fa-clipboard-check"></i></p>
                                        @else
                                            <p style="font-size: 1.3rem;text-align: center;color:#CE1508;"><i
                                                    class="fas fa-clipboard"></i></p>
                                        @endif

                                    </td>
                                    <td>
                                        @php
                                            
                                            $inquilino_user = App\Models\User::where('type', 'inquilino')
                                                ->where('id', $transaction->user_id)
                                                ->orWhere('id', $transaction->inquilino_id)
                                                ->orWhere('transaction', $transaction->transaction)
                                                ->where('type', 'inquilino')
                                                ->first();
                                            
                                            $inquilino_data = App\Models\TenantRoomie::where('transaction', $transaction->transaction)->first();
                                        @endphp

                                        <span class="d-block text-center"><strong>Registro</strong></span>

                                        @if ($inquilino_user)
                                            <p style="font-size: 1.3rem;text-align: center;color:#04A268;"><i
                                                    class="fas fa-clipboard-check"></i></p>
                                        @else
                                            <p style="font-size: 1.3rem;text-align: center;color:#CE1508;"><i
                                                    class="fas fa-clipboard"></i></p>
                                        @endif
                                        <hr />
                                        <span class="d-block text-center mt-3"><strong>Datos</strong></span>
                                        @if ($inquilino_data)
                                            <p style="font-size: 1.3rem;text-align: center;color:#04A268;"><i
                                                    class="fas fa-clipboard-check"></i></p>
                                        @else
                                            <p style="font-size: 1.3rem;text-align: center;color:#CE1508;"><i
                                                    class="fas fa-clipboard"></i></p>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary" data-toggle="modal"
                                            data-target="#editarTransactionModal"
                                            wire:click="edit('{{ $transaction->transaction }}')">
                                            <i class="far fa-edit"></i>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex align-items-center justify-content-center">
                        {{ $transactions->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <!-- Modal -->
    <div class="modal fade" id="editarTransactionModal" tabinde x="-1" aria-labelledby="editarTransactionModalLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="editTransaction">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarTransactionModalLabel">Editar transacción</h5>
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="text-black font-w600">Estatus <span
                                            class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="Estatus"
                                        wire:model.defer="editForm.status">
                                    @if ($errors->has('editForm.status'))
                                        <span>{{ $errors->first('editForm.status') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-12">
                                <p>Tipos de estatus</p>
                                <ul>
                                    <li>Pendiente</li>
                                    <li>Firmado</li>
                                    <li>Pendiente de firma</li>
                                    <li>Sin contrato</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="submit btn btn-primary" wire:loading.attr="disabled"
                            wire:loading.remove>Actualizar transacción</button>
                        <div wire:loading wire:loading.class="d-flex align-items-center justify-content-center">
                            <x-loading />
                        </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')

        <script>
            Livewire.on('messageUpdateTransaction', function() {
                Swal.fire({
                    title: 'Transaction actualizada',
                    text: '',
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Aceptar'
                });
                $('#editarTransactionModal').modal('hide');
            });
        </script>
    @endpush
</div>
