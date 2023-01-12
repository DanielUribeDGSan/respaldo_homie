<div class="text-empty-contrato">
    <form onsubmit="return enviarInvitacionesBroker(event)">
        <div class="form-group row">
            <div class="col-lg-12 col-md-12 col-12 mt-2">
                <label for="email" class="col-form-label fw-600 mt-2 text-center d-block">
                    <p class="text-center mt-3"> <strong><span class="fw-600 bold-ft">Correo electrónico del asesor
                                invitado:</span></strong></p>
                </label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    placeholder="Ingresa un correo válido" wire:model.defer="createForm.email" autocomplete="off">
                @if ($errors->has('createForm.email'))
                    <span>{{ $errors->first('createForm.email') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-4 d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-orange-sm mb-2" wire:loading.attr="disabled"
                    wire:loading.remove>Enviar
                    invitación</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
        </div>
    </form>
    <script>
        const enviarInvitacionesBroker = (e) => {
            e.preventDefault();

            const email = document.querySelector('#email').value;

            if (email == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Email</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    text: 'Tu email no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            Livewire.emitTo('avisos.invitar-broker-mails', 'enviarInvitacion');
        }
    </script>
    @push('script')
        <script>
            Livewire.on('invitacionEnviada', function() {
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
                    title: 'El correo ha sido enviado al invitado'
                })
            });
        </script>
    @endpush
</div>
