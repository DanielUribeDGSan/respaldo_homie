<div x-data class="mt-3">
    <form onsubmit="return registrarFormInquilino(event)">
        <div class="form-group row">
            <div class="col-lg-12 col-md-12 col-12 mt-2">
                <label for="name" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.name" autocomplete="off">
                @if ($errors->has('createForm.name'))
                    <span>{{ $errors->first('createForm.name') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-2">
                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.last_name" autocomplete="off">
                @if ($errors->has('createForm.last_name'))
                    <span>{{ $errors->first('createForm.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-2">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    wire:model.defer="createForm.email" autocomplete="off">
                @if ($errors->has('createForm.email'))
                    <span class="text-danger">{{ $errors->first('createForm.email') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-2">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono celular</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm.phone" autocomplete="off">
                @if ($errors->has('createForm.phone'))
                    <span>{{ $errors->first('createForm.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-2">
                <label for="password" class="col-form-label fw-100 mt-2">Contraseña</label>
                <div class="input-field">
                    <input type="password" id="password" maxlength="255" wire:model.defer="createForm.password"
                        autocomplete="new-password" />
                    <i class="fas fa-eye-slash mostrarPass" onclick="mostrarPass()"></i>
                    <i class="fas fa-eye ocultarPass d-none" onclick="ocultarPass()"></i>

                </div>
                @if ($errors->has('createForm.password'))
                    <span>{{ $errors->first('createForm.password') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="checkbox" name="terminos" id="terminos"
                        value="Tengo tarjeta de crédito" wire:model.defer="createForm.terminos">
                    <label class="form-check-label" for="terminos">Acepto los <a class="underline"
                            href="{{ route('home') . '/T&C.pdf' }}" target="_blank">Términos y
                            Condiciones</a></label>
                </div>
            </div>
            <div
                class="col-12 mt-4 d-flex align-items-lg-start justify-content-lg-start align-items-center justify-content-center">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Registrarme</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
        </div>

    </form>

    <script>
        const registrarFormInquilino = (e) => {
            e.preventDefault();

            const name = document.querySelector('#name').value;
            const last_name = document.querySelector('#last_name').value;
            const phone = document.querySelector('#phone').value;
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;
            const terminos = document.querySelector('#terminos').checked;

            if (name == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (last_name == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Apellidos</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Teléfono celular</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone.length < 10 || phone.length > 20) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El teléfono celular no es valido',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (email == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Email</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    text: 'Tu email no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (password == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Contraseña</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (password.length < 8) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Contraseña</b>" es invalido, por lo menos debe de tenr 8 dígitos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!terminos) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'Aún no aceptas los términos y condiciones',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }
            Livewire.emitTo('form-register-inquilino', 'registrarFormulario');
        }
    </script>
    <script>
        const mostrarPass = () => {
            const password = document.querySelector("#password");
            password.type = "text";

            document.querySelector('.mostrarPass').classList.remove('d-inline-block');
            document.querySelector('.mostrarPass').classList.add('d-none');

            document.querySelector('.ocultarPass').classList.remove('d-none');
            document.querySelector('.ocultarPass').classList.add('d-inline-block');
        }

        const ocultarPass = () => {
            const password = document.querySelector("#password");
            password.type = "password";

            document.querySelector('.mostrarPass').classList.remove('d-none');
            document.querySelector('.mostrarPass').classList.add('d-inline-block');

            document.querySelector('.ocultarPass').classList.remove('d-inline-block');
            document.querySelector('.ocultarPass').classList.add('d-none');
        }
    </script>
</div>
