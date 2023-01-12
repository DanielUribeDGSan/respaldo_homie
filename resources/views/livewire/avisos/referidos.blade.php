<div>
    <!-- Modal -->
    <div class="modal fade" id="modalReferido" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modalReferidoLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalReferidoLabel">¿Cuentas con un código de invitación?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-lg-12 col-md-12 col-12 mt-2">
                            <label for="referred_guest" class="col-form-label fw-100">Ingresa tu código</label>
                            <input type="text" class="form-input" id="referred_guest" onkeyup="onlyLetrasNum(this)"
                                maxlength="255" wire:model.defer="createFormReferido.referred_guest" autocomplete="off">
                            @if ($errors->has('createFormReferido.referred_guest'))
                                <span>{{ $errors->first('createFormReferido.referred_guest') }}</span>
                            @endif
                        </div>
                        <div class="col-12 mt-3">
                            <button type="button" class="btn btn-orange-sm btn-loading-code" wire:click='validarCodigo'
                                id="registrarCode">Registrar
                                código</button>

                            <div class="d-flex align-items-center loading-code-btn d-none">
                                <x-loading />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-yellow-sm" data-bs-dismiss="modal">No tengo un
                        código</button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            Livewire.on('errorCode', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Código no econtrado',
                    html: 'El código de invitación que registraste no existe',
                    confirmButtonText: 'Aceptar',
                });
                document.querySelector('#referred_guest').value = "";
                document.querySelector('.loading-code-btn').classList.add('d-none');
                document.querySelector('.btn-loading-code').classList.remove('d-none');
                return false;
            });
            Livewire.on('successCode', function() {
                Swal.fire({
                    title: 'Código registrado',
                    text: 'Has apoyado a al broker que te invito correctamente',
                    imageUrl: "{{ asset('assets/images/svg/ilustracion-1.svg') }}",
                    imageWidth: 400,
                    imageHeight: 200,
                    imageAlt: 'Custom image',
                    confirmButtonText: 'Aceptar',

                })
                $("#close-modal").click();
                document.querySelector('.loading-code-btn').classList.add('d-none');
                document.querySelector('.btn-loading-code').classList.remove('d-none');
                return false;
            });


            $("#registrarCode").click(function() {
                document.querySelector('.loading-code-btn').classList.remove('d-none');
                document.querySelector('.btn-loading-code').classList.add('d-none');
            });
        </script>
        @if (!Auth::user()->referred_guest)
            <script>
                const miStorageGlobal = window.localStorage;

                if (!miStorageGlobal.referidos) {
                    miStorageGlobal.setItem('referidos', 'true');
                    const myModal = new bootstrap.Modal(document.getElementById("modalReferido"), {});
                    document.onreadystatechange = function() {
                        myModal.show();
                    };
                }
            </script>
        @endif
    @endpush
</div>
