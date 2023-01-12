<div x-data class="mt-3">
    <style>
        @media (max-width: 991px) {
            .text-options-circle {
                min-height: 4rem;
            }
        }

    </style>
    <form onsubmit="return registrarFormInquilinoAPropietario(event)">
        <div class="form-group row">
            <div class="col-12">
                <p class="fw-100 text-orange">Datos del inquilino</p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="name2" class="col-form-label fw-100"><span class="fw-600 bold-ft">Nombre(s)</span></label>
                <input type="text" class="form-input" id="name2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.name" autocomplete="off" placeholder="Nombre(s) del inquilino">
                @if ($errors->has('createForm2.name'))
                    <span>{{ $errors->first('createForm2.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="last_name2" class="col-form-label fw-100"><span
                        class="fw-600 bold-ft">Apellidos</span></label>
                <input type="text" class="form-input" id="last_name2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.last_name" autocomplete="off"
                    placeholder="Escribe los apellidos del inquilino">
                @if ($errors->has('createForm2.last_name'))
                    <span>{{ $errors->first('createForm2.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="email2" class="col-form-label fw-100 mt-2"><span class="fw-600 bold-ft">Correo
                        electrónico</span></label>
                <input type="text" class="form-input" id="email2" maxlength="255"
                    wire:model.defer="createForm2.email" autocomplete="off"
                    placeholder="Ingresa un correo electrónico válido">
                @if ($errors->has('createForm2.email'))
                    <span>{{ $errors->first('createForm2.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="phone2" class="col-form-label fw-100 mt-2"><span class="fw-600 bold-ft">Teléfono
                        celular</span></label>
                <input type="text" class="form-input" id="phone2" onkeyup="onlyNum(this)" maxlength="20"
                    wire:model.defer="createForm2.phone" autocomplete="off"
                    placeholder="Ingresa un número de celular válido">
                @if ($errors->has('createForm2.phone'))
                    <span>{{ $errors->first('createForm2.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <p class="ft-small-p">Le enviaremos un formulario por correo al inquilino que deberá llenar para
                    continuar con el proceso.</p>
            </div>
            {{-- <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-datos">
                <label for="precio" class="col-form-label fw-100">Precio de la propiedad</label>
                <input type="text" class="form-input" id="precio" onkeyup="onlyNumPrecio(this)" maxlength="255"
                    wire:model.defer="createForm.precio" autocomplete="off">
                @if ($errors->has('createForm.precio'))
                    <span>{{ $errors->first('createForm.precio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-datos">
                <label for="calle" class="col-form-label fw-100">Calle</label>
                <input type="text" class="form-input" id="calle" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.calle" autocomplete="off">
                @if ($errors->has('createForm.calle'))
                    <span>{{ $errors->first('createForm.calle') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-datos">
                <label for="num_exterior" class="col-form-label fw-100">Número exterior</label>
                <input type="text" class="form-input" id="num_exterior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_exterior" autocomplete="off">
                @if ($errors->has('createForm.num_exterior'))
                    <span>{{ $errors->first('createForm.num_exterior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-datos">
                <label for="num_interior" class="col-form-label fw-100">Número interior</label>
                <input type="text" class="form-input" id="num_interior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_interior" autocomplete="off">
                @if ($errors->has('createForm.num_interior'))
                    <span>{{ $errors->first('createForm.num_interior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-datos">
                <label for="colonia" class="col-form-label fw-100">Colonia</label>
                <input type="text" class="form-input" id="colonia" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.colonia" autocomplete="off">
                @if ($errors->has('createForm.colonia'))
                    <span>{{ $errors->first('createForm.colonia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-datos">
                <label for="delegacion_alcaldia" class="col-form-label fw-100">Delegación/Alcaldía</label>
                <input type="text" class="form-input" id="delegacion_alcaldia" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.delegacion_alcaldia" autocomplete="off">
                @if ($errors->has('createForm.delegacion_alcaldia'))
                    <span>{{ $errors->first('createForm.delegacion_alcaldia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-datos">
                <label for="estado" class="col-form-label fw-100">Estado</label>
                <select class="form-input" id="estado" wire:model.defer="createForm.estado">
                    <option value="" selected disabled>Selecciona un estado</option>
                    <option value="Aguascalientes">Aguascalientes</option>
                    <option value="Baja California">Baja California</option>
                    <option value="Baja California Sur">Baja California Sur</option>
                    <option value="Campeche">Campeche</option>
                    <option value="Chiapas">Chiapas</option>
                    <option value="Chihuahua">Chihuahua</option>
                    <option value="Ciudad de México">Ciudad de México</option>
                    <option value="Coahuila">Coahuila</option>
                    <option value="Colima">Colima</option>
                    <option value="Durango">Durango</option>
                    <option value="Estado de México">Estado de México</option>
                    <option value="Guanajuato">Guanajuato</option>
                    <option value="Guerrero">Guerrero</option>
                    <option value="Hidalgo">Hidalgo</option>
                    <option value="Jalisco">Jalisco</option>
                    <option value="Michoacán">Michoacán</option>
                    <option value="Morelos">Morelos</option>
                    <option value="Nayarit">Nayarit</option>
                    <option value="Nuevo León">Nuevo León</option>
                    <option value="Oaxaca">Oaxaca</option>
                    <option value="Puebla">Puebla</option>
                    <option value="Querétaro">Querétaro</option>
                    <option value="Quintana Roo">Quintana Roo</option>
                    <option value="San Luis Potosí">San Luis Potosí</option>
                    <option value="Sinaloa">Sinaloa</option>
                    <option value="Sonora">Sonora</option>
                    <option value="Tabasco">Tabasco</option>
                    <option value="Tamaulipas">Tamaulipas</option>
                    <option value="Tlaxcala">Tlaxcala</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Yucatán">Yucatán</option>
                    <option value="Zacatecas">Zacatecas</option>

                </select>
                @if ($errors->has('createForm.estado'))
                    <span>{{ $errors->first('createForm.estado') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-datos">
                <label for="code_postal" class="col-form-label fw-100">Código postal</label>
                <input type="text" class="form-input" id="code_postal" onkeyup="onlyNum(this)" maxlength="5"
                    wire:model.defer="createForm.code_postal" autocomplete="off">
                @if ($errors->has('createForm.code_postal'))
                    <span>{{ $errors->first('createForm.code_postal') }}</span>
                @endif
            </div> --}}


            <div class="col-12 mt-2">
                <hr />

                <p class="fw-100 text-orange mt-2">Datos del propietario</p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="name" class="col-form-label fw-100"><span class="fw-600 bold-ft">Nombre(s)</span></label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.name" autocomplete="off" placeholder="Nombre(s) del propietario">
                @if ($errors->has('createForm.name'))
                    <span>{{ $errors->first('createForm.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label for="last_name" class="col-form-label fw-100"><span
                        class="fw-600 bold-ft">Apellidos</span></label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.last_name" autocomplete="off"
                    placeholder="Escribe los apellidos del propietario">
                @if ($errors->has('createForm.last_name'))
                    <span>{{ $errors->first('createForm.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="email" class="col-form-label fw-100 mt-2"><span class="fw-600 bold-ft">Correo
                        electrónico</span></label>
                <input type="text" class="form-input" id="email" maxlength="255" wire:model.defer="createForm.email"
                    autocomplete="off" placeholder="Ingresa un correo electrónico válido">
                @if ($errors->has('createForm.email'))
                    <span>{{ $errors->first('createForm.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <label for="phone" class="col-form-label fw-100 mt-2"><span class="fw-600 bold-ft">Teléfono
                        celular</span></label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNum(this)" maxlength="20"
                    wire:model.defer="createForm.phone" autocomplete="off"
                    placeholder="Ingresa un número de celular válido">
                @if ($errors->has('createForm.phone'))
                    <span>{{ $errors->first('createForm.phone') }}</span>
                @endif
            </div>

            <div class="col-12 mt-2">
                <hr />
                <p class="mt-4 text-orange"><small>En el siguiente paso necesitaremos información sobre la dirección y
                        características del inmueble, también sobre la comisión y los pagos, así como esta
                        documentación:</small>
                </p>
            </div>
            <div class="col-12">
                <div class="row mt-4">
                    <div class="col-lg-4 mt-3">
                        <p class="text-center"><i class="far fa-address-card text-primary ft-i"></i></p>
                        <p class="mt-1 text-center text-gris"> <span class="fw-600 bold-ft"><small
                                    class="text-gris">Identificación
                                    oficial<br />
                                    del propietario</small></span> </p>
                        <p class="text-gris text-center mt-1 text-options-circle"><small class="ft-small">(INE,
                                pasaporte o cédula
                                profesional)</small></p>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <p class="text-center"><i class="far fa-file-image text-primary ft-i"></i></p>
                        <p class="mt-1 text-center text-gris"> <span class="fw-600 bold-ft"><small
                                    class="text-gris">Comprobante de<br />
                                    domicilio del inmueble</small></span> </p>
                        <p class="text-gris text-center mt-1 text-options-circle"><small class="ft-small">(Recibo
                                de agua, luz, teléfono o cualquier servicio)</small></p>
                    </div>
                    <div class="col-lg-4 mt-3">
                        <p class="text-center"><i class="far fa-file-alt text-primary ft-i"></i></p>
                        <p class="mt-1 text-center text-gris"> <span class="fw-600 bold-ft"><small
                                    class="text-gris">Título de la<br />
                                    propiedad</small></span> </p>
                        <p class="text-gris text-center mt-1 text-options-circle"><small
                                class="ft-small">(Primeras 5 hojas de las escrituras, contrato de compra-venta,
                                poder notarial)</small></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <p class="ft-small-p">Facilita el trabajo del propietario y llena esta información por él. En caso
                    de no tener los datos necesarios, se lo podemos enviar por correo directamente para que lo haga él
                    mismo.</p>
            </div>

            <div class="col-lg-12 col-md-12 col-12 mt-4">

                <p class="fw-100">
                    <span class="fw-600 bold-ft"> ¿Quieres llenar el registro del propietario?</span>
                </p><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="datos_propietario" id="datos_propietario"
                        value="Si" wire:model.defer="createForm.datos_propietario" onchange="validarLlenadoDatoa()">
                    <label class="form-check-label" for="datos_propietario">Sí</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="datos_propietario" id="datos_propietario2"
                        value="No" wire:model.defer="createForm.datos_propietario" onchange="validarLlenadoDatoa()">
                    <label class="form-check-label" for="datos_propietario2">No, prefiero enviárselo por correo.</label>
                </div>
                @if ($errors->has('createForm.datos_propietario'))
                    <span>{{ $errors->first('createForm.datos_propietario') }}</span>
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
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-orange-sm" wire:loading.attr="disabled"
                    wire:loading.remove>Registrar datos</button>
                <div wire:loading wire:loading.class="d-flex align-items-center">
                    <x-loading />
                </div>
            </div>
        </div>
    </form>
    <!-- Button trigger modal -->
    <!-- Button trigger modal -->


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

                        </div>
                    </div>
                </div>
                <div class="modal-footer d-lg-flex align-items-center justify-content-center">
                    <button type="button" class="btn btn-orange-sm btn-loading-code" wire:click='validarCodigo'
                        id="registrarCode">Registrar
                        código</button>

                    <div class="d-flex align-items-center loading-code-btn d-none">
                        <x-loading />
                    </div>
                    <button type="button" class="btn btn-yellow-sm" data-bs-dismiss="modal">No tengo un
                        código</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Cookies inquilino
        $('#name2').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_inquilino_name=" + encodeURIComponent($('#name2').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#last_name2').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_inquilino_last_name=" + encodeURIComponent($('#last_name2').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#email2').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_inquilino_email=" + encodeURIComponent($('#email2').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#phone2').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_inquilino_phone=" + encodeURIComponent($('#phone2').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        // Cookies propietario
        $('#name').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_propietario_name=" + encodeURIComponent($('#name').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#last_name').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_propietario_last_name=" + encodeURIComponent($('#last_name').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#email').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_propietario_email=" + encodeURIComponent($('#email').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#phone').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "broker_propietario_phone=" + encodeURIComponent($('#phone').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
    </script>

    <script>
        const registrarFormInquilinoAPropietario = (e) => {
            e.preventDefault();
            // const precio = document.querySelector('#precio').value;
            // const calle = document.querySelector('#calle').value;
            // const num_exterior = document.querySelector('#num_exterior').value;
            // const num_interior = document.querySelector('#num_interior').value;
            // const colonia = document.querySelector('#colonia').value;
            // const delegacion_alcaldia = document.querySelector('#delegacion_alcaldia').value;
            // const estado = document.querySelector('#estado').value;
            // const code_postal = document.querySelector('#code_postal').value;

            const name = document.querySelector('#name').value;
            const last_name = document.querySelector('#last_name').value;
            const phone = document.querySelector('#phone').value;
            const email = document.querySelector('#email').value;
            const datos_propietario = document.querySelector('#datos_propietario').checked;
            const datos_propietario2 = document.querySelector('#datos_propietario2').checked;

            const name2 = document.querySelector('#name2').value;
            const last_name2 = document.querySelector('#last_name2').value;
            const phone2 = document.querySelector('#phone2').value;
            const email2 = document.querySelector('#email2').value;

            const terminos = document.querySelector('#terminos').checked;

            if (name2 == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (last_name2 == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Apellidos</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone2 == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Teléfono celular</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (phone2.length < 10 || phone2.length > 20) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El Teléfono celular del inquilino no es valido',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (email2 == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Email</b>" del inquilino no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!validar_email(email2)) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    text: 'El email del inquilino no es valido, escribelo correctamente',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!datos_propietario && !datos_propietario2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Quieres llenar todos los datos de registro del propietario?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }
            // else if (precio == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Calle</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // } else if (calle == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Calle</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // } else if (num_exterior == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Número exterior</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // } else if (num_interior == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Número interior</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // } else if (colonia == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Colonia</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // } else if (delegacion_alcaldia == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Delegación/Alcaldía</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // } else if (estado == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Estado</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // } else if (code_postal == '' && datos_propietario2) {
            //     Swal.fire({
            //         icon: 'warning',
            //         title: 'Ups...',
            //         html: 'El campo "<b>Código postal</b>" no puede quedar vacío',
            //         confirmButtonText: 'Aceptar',
            //     });
            //     return false;
            // }
            else if (name == '') {
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
                    html: 'El Teléfono celular no es valido',
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

            document.cookie = "broker_inquilino_name=; max-age=0";
            document.cookie = "broker_inquilino_last_name=; max-age=0";
            document.cookie = "broker_inquilino_email=; max-age=0";
            document.cookie = "broker_inquilino_phone=; max-age=0";
            document.cookie = "broker_propietario_name=; max-age=0";
            document.cookie = "broker_propietario_last_name=; max-age=0";
            document.cookie = "broker_propietario_email=; max-age=0";
            document.cookie = "broker_propietario_phone=; max-age=0";

            Livewire.emitTo('broker.datos-personales', 'registrarFormulario');
        }

        const validarLlenadoDatoa = () => {
            const datos_propietario = document.querySelector('#datos_propietario').checked;
            const datos_propietario2 = document.querySelector('#datos_propietario2').checked;

            if (datos_propietario) {
                const documentos_nomina = document.getElementsByClassName("ocultar-datos");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.add('d-none');
                }
            } else if (datos_propietario2) {
                const estados_cuenta = document.getElementsByClassName("ocultar-datos");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.remove('d-none');
                }
            }
        }
    </script>
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
                const miStorageGlobal2 = window.localStorage;
                if (!miStorageGlobal2.referidos) {
                    miStorageGlobal2.setItem('referidos', 'true');
                    const myModal = new bootstrap.Modal(document.getElementById("modalReferido"), {});
                    document.onreadystatechange = function() {
                        myModal.show();
                    };
                }
            </script>
        @endif
    @endpush

</div>
