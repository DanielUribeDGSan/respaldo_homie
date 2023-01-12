<div x-data class="mt-3">
    <form onsubmit="return formLogin(event)">

        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="email" class="col-form-label fw-100 mt-2"><span class="fw-600 bold-ft">Correo
                        electrónico</span></label>
                <input type="text" class="form-input" id="email" maxlength="255" wire:model.defer="formLogin.email"
                    placeholder="Ingresa el correo con el que te registraste" autofocus>
                @if ($errors->has('formLogin.email'))
                    <span>{{ $errors->first('formLogin.email') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="password" class="col-form-label fw-100 mt-2"><span
                        class="fw-600 bold-ft">Contraseña</span></label>

                <div class="input-field">

                    <input type="password" style="display:none">
                    <input type="password" id="password" maxlength="255" wire:model.defer="formLogin.password"
                        placeholder="Ingresa tu contraseña" autocomplete="new-password" />
                    <i class="fas fa-eye-slash mostrarPass" onclick="mostrarPass()"></i>
                    <i class="fas fa-eye ocultarPass d-none" onclick="ocultarPass()"></i>

                </div>

                @if ($errors->has('formLogin.password'))
                    <span>{{ $errors->first('formLogin.password') }}</span>
                @endif
            </div>
            <div class="col-12 mt-4">
                <a class="text-orange" data-bs-toggle="modal" data-bs-target="#olvidePassword">¿Olvidaste tu
                    contraseña?</a>
            </div>
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled">Entrar</button>

            </div>
        </div>
    </form>
    <!-- Modal -->
    <div class="modal fade" id="olvidePassword" tabindex="-1" aria-labelledby="olvidePasswordLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close btn-close-password" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="show-content-password">
                        <div class="container">

                            <p class="text-center">Para recuperar tu contraseña, ingresa el correo electrónico con el
                                que
                                te
                                registraste</p>
                            <div class="form-group row mt-4">
                                <div class="col-12">
                                    <input type="text" class="form-input" id="email_password" maxlength="255"
                                        wire:model.defer="formLoginPassword.email"
                                        placeholder="Ingresa tu correo electrónico">
                                </div>
                                <div class="col-12 mt-4 d-flex align-items-center justify-content-center">
                                    <button type="button" class="btn btn-primary-sm" wire:loading.attr="disabled"
                                        onclick="recuperarPassword()">Siguiente</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="hiden-content-password d-none">
                        <div class="container">
                            <div class="text-center">
                                <svg width="87" height="95" viewBox="0 0 87 95" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M85.8078 38.5801H1C12.6938 48.9441 27.7783 54.6667 43.4039 54.6667C59.0295 54.6667 74.114 48.9441 85.8078 38.5801Z"
                                        fill="#238D7E" stroke="#444545" stroke-width="0.9" stroke-linejoin="round" />
                                    <path d="M1 38.5807L43.4005 1L85.8078 38.5807H1Z" fill="#238D7E" stroke="#444545"
                                        stroke-width="0.9" stroke-linejoin="round" />
                                    <path
                                        d="M43.9241 17.0165L47.1282 14.7715L49.6438 17.7684L53.3187 16.4298L54.97 19.9783L58.8698 19.6339L59.5479 23.4881L63.3985 24.1662L63.0577 28.0625L66.6027 29.7137L65.2641 33.3922L68.261 35.9042L66.0159 39.1084L68.261 42.3126L65.2641 44.8246L66.6027 48.5031L63.0577 50.1544L63.3985 54.0506L59.5479 54.7287L58.8698 58.5829L54.97 58.2385L53.3187 61.787L49.6438 60.4484L47.1282 63.4453L43.9241 61.2003L40.7199 63.4453L38.2079 60.4484L34.5329 61.787L32.8781 58.2385L28.9818 58.5829L28.3037 54.7287L24.4531 54.0506L24.7939 50.1544L21.249 48.5031L22.5875 44.8246L19.5907 42.3126L21.8357 39.1084L19.5907 35.9042L22.5875 33.3922L21.249 29.7137L24.7939 28.0625L24.4531 24.1662L28.3037 23.4881L28.9818 19.6339L32.8781 19.9783L34.5329 16.4298L38.2079 17.7684L40.7199 14.7715L43.9241 17.0165Z"
                                        fill="#F6B248" stroke="#444545" stroke-width="0.76" stroke-linejoin="round" />
                                    <path
                                        d="M45.5631 32.5984C45.5631 32.5984 44.8078 30.8171 45.2715 27.9432C46.0023 23.425 48.806 24.0012 49.0203 26.1865C49.1713 27.6937 49.3997 30.2479 50.5345 32.5421C51.0729 33.5824 51.7859 34.5224 52.6425 35.3212C53.0964 35.7589 53.4371 36.3003 53.6353 36.8989C53.8336 37.4974 53.8836 38.1351 53.7809 38.7572L52.5336 46.4585C52.4031 47.2697 52.0318 48.0229 51.468 48.6206C50.9042 49.2182 50.1738 49.6327 49.3716 49.8102C46.7301 50.3187 44.0182 50.3425 41.3682 49.8805"
                                        fill="white" />
                                    <path
                                        d="M45.5631 32.5984C45.5631 32.5984 44.8078 30.8171 45.2715 27.9432C46.0023 23.425 48.806 24.0012 49.0203 26.1865C49.1713 27.6937 49.3997 30.2479 50.5345 32.5421C51.0729 33.5824 51.7859 34.5224 52.6425 35.3212C53.0964 35.7589 53.4371 36.3003 53.6353 36.8989C53.8336 37.4974 53.8836 38.1351 53.7808 38.7572L52.5336 46.4585C52.4031 47.2697 52.0318 48.0229 51.468 48.6206C50.9042 49.2182 50.1738 49.6327 49.3716 49.8102C46.7301 50.3187 44.0182 50.3425 41.3682 49.8805"
                                        stroke="#444545" stroke-width="0.76" stroke-miterlimit="10" />
                                    <path
                                        d="M45.2134 32.6378L37.7357 31.4293C36.5155 31.2321 35.3666 32.0606 35.1696 33.2799C34.9726 34.4991 35.802 35.6473 37.0222 35.8445L44.4999 37.053C45.7201 37.2502 46.869 36.4216 47.066 35.2024C47.263 33.9832 46.4336 32.835 45.2134 32.6378Z"
                                        fill="white" stroke="#444545" stroke-width="0.76" stroke-miterlimit="10" />
                                    <path
                                        d="M45.3468 37.1894L36.3048 35.7281C35.0846 35.5309 33.9358 36.3595 33.7387 37.5787C33.5417 38.7979 34.3711 39.9461 35.5913 40.1433L44.6333 41.6046C45.8534 41.8018 47.0023 40.9732 47.1994 39.754C47.3964 38.5348 46.567 37.3866 45.3468 37.1894Z"
                                        fill="white" stroke="#444545" stroke-width="0.76" stroke-miterlimit="10" />
                                    <path
                                        d="M43.9553 41.6479L35.7328 40.319C34.5092 40.1213 33.357 40.9521 33.1594 42.1748C32.9618 43.3975 33.7936 44.549 35.0172 44.7468L43.2397 46.0757C44.4634 46.2734 45.6155 45.4426 45.8131 44.2199C46.0107 42.9972 45.179 41.8457 43.9553 41.6479Z"
                                        fill="white" stroke="#444545" stroke-width="0.762163" stroke-miterlimit="10" />
                                    <path
                                        d="M42.5033 45.7941L37.162 44.9309C36.0165 44.7458 34.938 45.5235 34.753 46.668C34.5681 47.8126 35.3467 48.8904 36.4922 49.0756L41.8335 49.9387C42.9789 50.1239 44.0575 49.3461 44.2424 48.2016C44.4274 47.0571 43.6487 45.9792 42.5033 45.7941Z"
                                        fill="white" stroke="#444545" stroke-width="0.76" stroke-miterlimit="10" />
                                    <path
                                        d="M85.8078 38.5801C74.114 48.9441 59.0295 54.6667 43.4039 54.6667C27.7783 54.6667 12.6938 48.9441 1 38.5801V93.8494H85.8078V38.5801Z"
                                        fill="#238D7E" stroke="#444545" stroke-width="0.9" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <p class="text-center mt-4">Hemos enviado a tu correo un link para restablecer tu contraseña
                            </p>
                            <div class="d-flex align-items-center justify-content-center mt-4">
                                <button type="button" class="btn btn-primary-sm" data-bs-dismiss="modal"
                                    aria-label="Close">Entendido</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="recuperarPassword" tabindex="-1" aria-labelledby="recuperarPasswordLabel"
        aria-hidden="true" wire:ignore>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" id="close-modal-pass" class="btn-close btn-close-password"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">

                        <p class="text-center">Escribe aquí tu nueva contraseña</p>
                        <div class="form-group row mt-4">
                            <div class="col-12">

                                <div class="input-field">
                                    <input type="password" id="cambiar_password" maxlength="255"
                                        wire:model.defer="formCambiarPassword.password"
                                        placeholder="Debe contener al menos 8 caracteres" />
                                    <i class="fas fa-eye-slash mostrarPass2" onclick="mostrarPass2()"></i>
                                    <i class="fas fa-eye ocultarPass2 d-none" onclick="ocultarPass2()"></i>

                                </div>
                            </div>
                            <div class="col-12 mt-5 d-flex align-items-center justify-content-center">
                                <button type="button" class="btn btn-primary-sm" wire:loading.attr="disabled"
                                    onclick="cambiarPassword()">Restablecer contraseña</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const cambiarPassword = () => {
            const cambiar_password = document.querySelector('#cambiar_password').value;
            if (cambiar_password == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Contraseña</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (cambiar_password.length < 8) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Contraseña</b>" es invalido, por lo menos debe de tenr 8 dígitos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            Livewire.emitTo('iniciar-sesion', 'changePassword');


        }

        const recuperarPassword = () => {
            const email = document.querySelector('#email_password').value;

            if (email == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Correo electrónico</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    text: 'Tu correo electrónico no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            Livewire.emitTo('iniciar-sesion', 'resetPassword');

        }

        const formLogin = (e) => {
            e.preventDefault();
            const email = document.querySelector('#email').value;
            const password = document.querySelector('#password').value;

            if (email == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Correo electrónico</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    text: 'Tu correo electrónico no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (password == '') {
                Swal.fire({
                    icon: 'error',
                    title: 'Ups...',
                    html: 'El campo "<b>Contraseña</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            Livewire.emitTo('iniciar-sesion', 'validarDatos');
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

        const mostrarPass2 = () => {
            const password = document.querySelector("#cambiar_password");
            password.type = "text";

            document.querySelector('.mostrarPass2').classList.remove('d-inline-block');
            document.querySelector('.mostrarPass2').classList.add('d-none');

            document.querySelector('.ocultarPass2').classList.remove('d-none');
            document.querySelector('.ocultarPass2').classList.add('d-inline-block');
        }

        const ocultarPass2 = () => {
            const password = document.querySelector("#cambiar_password");
            password.type = "password";

            document.querySelector('.mostrarPass2').classList.remove('d-none');
            document.querySelector('.mostrarPass2').classList.add('d-inline-block');

            document.querySelector('.ocultarPass2').classList.remove('d-inline-block');
            document.querySelector('.ocultarPass2').classList.add('d-none');
        }
    </script>
    <script></script>
    @push('script')

        @if ($key != 0)
            <script>
                const myModalRecuperarPassword = new bootstrap.Modal(document.getElementById("recuperarPassword"), {});
                document.onreadystatechange = function() {
                    myModalRecuperarPassword.show();
                };
            </script>
        @endif



        <script>
            Livewire.on('show-recuperar-password', function() {
                Swal.fire({
                    icon: 'success',
                    title: 'Contraseña cambiada',
                    html: 'Ya puedes usar la contraseña que acabas de poner, para poder acceder y continuar con tu proceso',
                    confirmButtonText: 'Aceptar',
                });
                $("#close-modal-pass").click();


            });
        </script>

        <script>
            Livewire.on('mail-enviado-password', function() {
                document.querySelector('.show-content-password').classList.add('d-none');
                document.querySelector('.hiden-content-password').classList.remove('d-none');

            });
        </script>

        <script>
            Livewire.on('error-recuperar-password', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Token utilizado',
                    html: 'Este token para restablecer la contraseña ya fue utilizado, si quieres cambiar tu contraseña. Debes solicitar uno nuevo',
                    confirmButtonText: 'Aceptar',
                });
                $("#close-modal-pass").click();

            });
        </script>
        <script>
            Livewire.on('errorLogin', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Datos incorrectos',
                    html: 'El correo electrónico o la contraseña son incorrectos',
                    confirmButtonText: 'Aceptar',
                });
            });
        </script>
    @endpush
</div>
