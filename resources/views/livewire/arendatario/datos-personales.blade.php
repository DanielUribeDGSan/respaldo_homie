<div x-data class="mt-3" wire:ignore>
    <form onsubmit="return datosPersonales(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">Tipo de persona</label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tipo_persona" id="tipo_persona1" value="Moral"
                        wire:model.defer="createForm.tipo_persona">
                    <label class="form-check-label" for="tipo_persona1">Moral</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tipo_persona" id="tipo_persona2" value="Fisica"
                        wire:model.defer="createForm.tipo_persona">
                    <label class="form-check-label" for="tipo_persona2">Fisica</label>
                </div>
                @if ($errors->has('createForm.tipo_persona'))
                    <span>{{ $errors->first('createForm.tipo_persona') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="rfc" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm.rfc" autocomplete="off">
                @if ($errors->has('createForm.rfc'))
                    <span>{{ $errors->first('createForm.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="estado_civil" class="col-form-label fw-100">Estado civil</label>
                <select class="form-input" id="estado_civil" wire:model.defer="createForm.estado_civil">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Soltero">Soltero</option>
                    <option value="Casado">Casado</option>
                    <option value="Otro">Otro</option>
                </select>
                @if ($errors->has('createForm.estado_civil'))
                    <span>{{ $errors->first('createForm.estado_civil') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="ingresos_netos" class="col-form-label fw-100">Ingresos netos mensuales</label>
                <input type="text" class="form-input" id="ingresos_netos" onkeyup="onlyNumPrecio(this)"
                    maxlength="255" wire:model.defer="createForm.ingresos_netos" autocomplete="off">
                @if ($errors->has('createForm.ingresos_netos'))
                    <span>{{ $errors->first('createForm.ingresos_netos') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial"
                    wire:model="identificacion_oficial">
                <label for="identificacion_oficial" class="form-input-file text-center"
                    id="file_identificacion_oficial"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial'))
                    <span>{{ $errors->first('identificacion_oficial') }}</span>
                @endif
                <div wire:loading wire:target="identificacion_oficial">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="calle" class="col-form-label fw-100">Calle</label>
                <input type="text" class="form-input" id="calle" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.calle" autocomplete="off">
                @if ($errors->has('createForm.calle'))
                    <span>{{ $errors->first('createForm.calle') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="num_exterior" class="col-form-label fw-100">Número exterior</label>
                <input type="text" class="form-input" id="num_exterior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_exterior" autocomplete="off">
                @if ($errors->has('createForm.num_exterior'))
                    <span>{{ $errors->first('createForm.num_exterior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="num_interior" class="col-form-label fw-100">Número interior</label>
                <input type="text" class="form-input" id="num_interior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_interior" autocomplete="off">
                @if ($errors->has('createForm.num_interior'))
                    <span>{{ $errors->first('createForm.num_interior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="colonia" class="col-form-label fw-100">Colonia</label>
                <input type="text" class="form-input" id="colonia" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.colonia" autocomplete="off">
                @if ($errors->has('createForm.colonia'))
                    <span>{{ $errors->first('createForm.colonia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="delegacion_alcaldia" class="col-form-label fw-100">Delegación/Alcaldía</label>
                <input type="text" class="form-input" id="delegacion_alcaldia" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.delegacion_alcaldia" autocomplete="off">
                @if ($errors->has('createForm.delegacion_alcaldia'))
                    <span>{{ $errors->first('createForm.delegacion_alcaldia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="code_postal" class="col-form-label fw-100">Código postal</label>
                <input type="text" class="form-input" id="code_postal" onkeyup="onlyNum(this)" maxlength="5"
                    wire:model.defer="createForm.code_postal" autocomplete="off">
                @if ($errors->has('createForm.code_postal'))
                    <span>{{ $errors->first('createForm.code_postal') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="institucion_educativa" class="col-form-label fw-100">¿Dondé estudiaste?</label>
                <input type="text" class="form-input" id="institucion_educativa" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.institucion_educativa" autocomplete="off">
                @if ($errors->has('createForm.institucion_educativa'))
                    <span>{{ $errors->first('createForm.institucion_educativa') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio" id="historial_crediticio1"
                        value="Tengo tarjeta de crédito" wire:model.defer="createForm.historial_crediticio"
                        onchange="validarTarjeta1()">
                    <label class="form-check-label" for="historial_crediticio1">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio"
                        id="historial_crediticio_no1" value="No tengo tarjeta de crédito"
                        wire:model.defer="createForm.historial_crediticio" onchange="validarTarjeta1()">
                    <label class="form-check-label" for="historial_crediticio_no1">No tengo tarjeta de crédito</label>
                </div>
                @if ($errors->has('createForm.historial_crediticio'))
                    <span>{{ $errors->first('createForm.historial_crediticio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 tarjeta1">
                <label for="tarjeta" class="col-form-label fw-100">Últimos 4 dígitos de tu tarjeta</label>
                <input type="text" class="form-input" id="tarjeta" onkeyup="onlyNum(this)" maxlength="4"
                    wire:model.defer="createForm.tarjeta" autocomplete="off">
                @if ($errors->has('createForm.tarjeta'))
                    <span>{{ $errors->first('createForm.tarjeta') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">Trabajo</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="trabajo" id="trabajo1" value="Empleado"
                        wire:model.defer="createForm.trabajo" onchange="trabajoEmpleado()">
                    <label class="form-check-label" for="trabajo1">Empleado</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="trabajo" id="trabajo2" value="Independiente"
                        wire:model.defer="createForm.trabajo" onchange="trabajoIndependiente()">
                    <label class="form-check-label" for="trabajo2">Independiente</label>
                </div>
                @if ($errors->has('createForm.trabajo'))
                    <span>{{ $errors->first('createForm.trabajo') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 nombre-empresa d-none">
                <label for="empresa" class="col-form-label fw-100">Nombre de la empresa</label>
                <input type="text" class="form-input" id="empresa" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.empresa" autocomplete="off">
                @if ($errors->has('createForm.empresa'))
                    <span>{{ $errors->first('createForm.empresa') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 actividad-empresa d-none">
                <label for="actividad_empresa" class="col-form-label fw-100">Actividad de la empresa</label>
                <input type="text" class="form-input" id="actividad_empresa" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.actividad_empresa" autocomplete="off">
                @if ($errors->has('createForm.actividad_empresa'))
                    <span>{{ $errors->first('createForm.actividad_empresa') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100"><span class="">¿Tiene mascotas?</span></label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tiene_mascotas" id="tiene_mascotas1" value="Si"
                        wire:model.defer="createForm.tiene_mascotas" onchange="cantidadMascotas()">
                    <label class="form-check-label" for="tiene_mascotas1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tiene_mascotas" id="tiene_mascotas2" value="No"
                        wire:model.defer="createForm.tiene_mascotas" onchange="cantidadMascotas()">
                    <label class="form-check-label" for="tiene_mascotas2">No</label>
                </div>
                @if ($errors->has('createForm.tiene_mascotas'))
                    <span>{{ $errors->first('createForm.tiene_mascotas') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none cantidad-mascotas">
                <label for="cantidad_mascotas" class="col-form-label fw-100"><span class="">Cantidad de
                        mascotas</span></label>
                <input type="text" class="form-input" name="cantidad_mascotas" id="cantidad_mascotas"
                    onkeyup="onlyNum(this)" maxlength="255" wire:model.defer="createForm.cantidad_mascotas"
                    autocomplete="off" placeholder="Ingresa el número de mascotas que tiene">
                @if ($errors->has('createForm.cantidad_mascotas'))
                    <span>{{ $errors->first('createForm.cantidad_mascotas') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-lg-12 col-md-12 col-12 mt-3">
                <label for="documentacion" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion" wire:model.defer="createForm.documentacion"
                    onchange="tipoDocumentacion()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm.documentacion'))
                    <span>{{ $errors->first('createForm.documentacion') }}</span>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta1"
                    wire:model="estado_cuenta1">
                <label for="estado_cuenta1" class="form-input-file text-center" id="file_estado_cuenta1"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta1'))
                    <span>{{ $errors->first('estado_cuenta1') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta1">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta2"
                    wire:model="estado_cuenta2">
                <label for="estado_cuenta2" class="form-input-file text-center" id="file_estado_cuenta2"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta2'))
                    <span>{{ $errors->first('estado_cuenta2') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta2">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta3"
                    wire:model="estado_cuenta3">
                <label for="estado_cuenta3" class="form-input-file text-center" id="file_estado_cuenta3"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta3'))
                    <span>{{ $errors->first('estado_cuenta3') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta3">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3
                    meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina1"
                    name="nominas[]" wire:model="nominas" multiple onchange="validarCantidadFiles()">
                <label for="comprobante_nomina1" class="form-input-file text-center" id="file_comprobante_nomina1"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas'))
                    <span>{{ $errors->first('nominas') }}</span>
                @endif
                <div wire:loading wire:target="nominas">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>

        </div>
        <div class="form-group row">
            <div class="col-6 mt-5">
                <button type="submit" class="btn btn-orange-sm btn-loading">Siguiente</button>
                <div class="loading-btn d-none">
                    <x-loading />
                </div>
            </div>
            <div class="col-6 mt-5 d-flex align-items-center justify-content-end">
                <article>
                    <h1 class="text-secundary">1/3</h1>
                </article>
            </div>
        </div>
    </form>
    <script>
        // Leer cookies        
        function readCookie(name) {

            var nameEQ = name + "=";
            var ca = document.cookie.split(';');

            for (var i = 0; i < ca.length; i++) {

                var c = ca[i];
                while (c.charAt(0) == ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0) {
                    return decodeURIComponent(c.substring(nameEQ.length, c.length));
                }

            }

            return null;

        }

        if (readCookie("inquilino_historial_crediticio")) {
            if (readCookie("inquilino_historial_crediticio") == "Tengo tarjeta de crédito") {
                const tarjeta_cookie = document.getElementsByClassName("tarjeta1");
                for (let i = 0; i < tarjeta_cookie.length; i++) {
                    tarjeta_cookie[i].classList.remove('d-none');
                }
            } else if (readCookie("inquilino_historial_crediticio") == "No tengo tarjeta de crédito") {
                const tarjeta_cookie2 = document.getElementsByClassName("tarjeta1");
                for (let i = 0; i < tarjeta_cookie2.length; i++) {
                    tarjeta_cookie2[i].classList.add('d-none');
                    document.querySelector("#tarjeta").value = "";

                }
            }
        }

        if (readCookie("inquilino_trabajo")) {

            if (readCookie("inquilino_trabajo") == "Empleado") {
                document.querySelector('.nombre-empresa').classList.remove('d-none');

                document.querySelector("#actividad_empresa").value = "";
            } else if (readCookie("inquilino_trabajo") == "Independiente") {

                document.querySelector('.actividad-empresa').classList.remove('d-none');
                document.querySelector("#empresa").value = "";


            }
        }

        if (readCookie("inquilino_tiene_mascotas")) {
            if (readCookie("inquilino_tiene_mascotas") == "Si") {
                document.querySelector('.cantidad-mascotas').classList.remove('d-none');
            } else if (readCookie("inquilino_tiene_mascotas") == "No") {
                document.querySelector('.cantidad-mascotas').classList.add('d-none');
                document.querySelector('#cantidad_mascotas').value = "";
            }
        }

        // Crear cookies
        $('#tipo_persona1').change(function(e) {
            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_tipo_persona=" + encodeURIComponent($('#tipo_persona1').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#tipo_persona2').change(function(e) {
            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_tipo_persona=" + encodeURIComponent($('#tipo_persona2').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#rfc').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_rfc=" + encodeURIComponent($('#rfc').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#fecha_nacimiento').change(function(e) {
            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_fecha_nacimiento=" + encodeURIComponent($('#fecha_nacimiento').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#estado_civil').change(function(e) {
            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_estado_civil=" + encodeURIComponent($('#estado_civil').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#ingresos_netos').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_ingresos_netos=" + encodeURIComponent($('#ingresos_netos').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#calle').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_calle=" + encodeURIComponent($('#calle').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#num_exterior').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_num_exterior=" + encodeURIComponent($('#num_exterior').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#num_interior').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_num_interior=" + encodeURIComponent($('#num_interior').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#colonia').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_colonia=" + encodeURIComponent($('#colonia').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#delegacion_alcaldia').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_delegacion_alcaldia=" + encodeURIComponent($('#delegacion_alcaldia')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#estado').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_estado=" + encodeURIComponent($('#estado').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#code_postal').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_code_postal=" + encodeURIComponent($('#code_postal').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#institucion_educativa').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_institucion_educativa=" + encodeURIComponent($('#institucion_educativa')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#historial_crediticio1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_historial_crediticio=" + encodeURIComponent($('#historial_crediticio1')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#historial_crediticio_no1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_historial_crediticio=" + encodeURIComponent($('#historial_crediticio_no1')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });

        $('#tarjeta').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_tarjeta=" + encodeURIComponent($('#tarjeta')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });


        $('#trabajo1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_trabajo=" + encodeURIComponent($('#trabajo1')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#trabajo2').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_trabajo=" + encodeURIComponent($('#trabajo2')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });

        $('#empresa').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_empresa=" + encodeURIComponent($('#empresa')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#actividad_empresa').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_actividad_empresa=" + encodeURIComponent($('#actividad_empresa')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });

        $('#tiene_mascotas1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_tiene_mascotas=" + encodeURIComponent($('#tiene_mascotas1')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#tiene_mascotas2').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_tiene_mascotas=" + encodeURIComponent($('#tiene_mascotas2')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });

        $('#cantidad_mascotas').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_cantidad_mascotas=" + encodeURIComponent($('#cantidad_mascotas')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
    </script>
    <script>
        const datosPersonales = (e) => {
            e.preventDefault();

            const tipo_persona = document.querySelector('#tipo_persona1').checked;
            const tipo_persona2 = document.querySelector('#tipo_persona2').checked;
            const rfc = document.querySelector('#rfc').value;
            const fecha_nacimiento = document.querySelector('#fecha_nacimiento').value;
            const estado_civil = document.querySelector('#estado_civil').value;
            const ingresos_netos = document.querySelector('#ingresos_netos').value;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const calle = document.querySelector('#calle').value;
            const num_exterior = document.querySelector('#num_exterior').value;
            const num_interior = document.querySelector('#num_interior').value;
            const colonia = document.querySelector('#colonia').value;
            const delegacion_alcaldia = document.querySelector('#delegacion_alcaldia').value;
            const estado = document.querySelector('#estado').value;
            const code_postal = document.querySelector('#code_postal').value;
            const institucion_educativa = document.querySelector('#institucion_educativa').value;
            const historial_crediticio = document.querySelector('#historial_crediticio1').checked;
            const historial_crediticio_no1 = document.querySelector('#historial_crediticio_no1').checked;
            const tarjeta = document.querySelector('#tarjeta').value;
            // const historial_crediticio2 = document.querySelector('#historial_crediticio2').checked;
            const trabajo = document.querySelector('#trabajo1').checked;
            const trabajo2 = document.querySelector('#trabajo2').checked;
            const empresa = document.querySelector('#empresa').value;
            const actividad_empresa = document.querySelector('#actividad_empresa').value;

            const tiene_mascotas1 = document.querySelector('#tiene_mascotas1').checked;
            const tiene_mascotas2 = document.querySelector('#tiene_mascotas2').checked;
            const cantidad_mascotas = document.querySelector('#cantidad_mascotas').value;


            const documentacion = document.querySelector('#documentacion').value;
            const estado_cuenta1 = document.querySelector('#estado_cuenta1').value;
            const estado_cuenta2 = document.querySelector('#estado_cuenta2').value;
            const estado_cuenta3 = document.querySelector('#estado_cuenta3').value;
            const comprobante_nomina1 = document.querySelector('#comprobante_nomina1').value;

            if (!tipo_persona && !tipo_persona2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Tipo de persona</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (rfc == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>RFC</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (fecha_nacimiento == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Fecha de nacimiento</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (estado_civil == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Estado civil</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (ingresos_netos == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Ingresos netos mensuales</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (identificacion_oficial == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Identificación oficial</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (calle == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Calle</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (num_exterior == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Número exterior</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (colonia == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Colonia</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (delegacion_alcaldia == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Delegación/Alcaldía</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (estado == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Estado</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (code_postal == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Código postal</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (institucion_educativa == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Institución Educativa</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!historial_crediticio && !historial_crediticio_no1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Historial crediticio</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (tarjeta == "" && historial_crediticio) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Últimos 4 dígitos de tu tarjeta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!trabajo && !trabajo2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Trabajo</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (empresa == '' && trabajo) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Nombre de la empresa</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (actividad_empresa == '' && trabajo2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Actividad de la empresa</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!tiene_mascotas1 && !tiene_mascotas2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Tiene mascotas?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (tiene_mascotas1 && cantidad_mascotas == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>El número de mascotas que tiene</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Documentación</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)' && !
                comprobante_nomina1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'Los campos "<b>Comprobantes de nómina</b>" no pueden quedar vacíos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (documentacion == 'Estados de cuenta completos (3 meses)' && !estado_cuenta1 && !estado_cuenta2 &&
                !estado_cuenta3) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'Los campos "<b>Estados de cuenta</b>" no pueden quedar vacíos',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            document.querySelector('.btn-loading').classList.add('d-none');
            document.querySelector('.loading-btn').classList.remove('d-none');

            setTimeout(function() {
                Livewire.emitTo('arendatario.datos-personales', 'registrarFormulario');
            }, 2000);

        }



        const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
        for (let i = 0; i < documentos_nomina.length; i++) {
            documentos_nomina[i].classList.add('d-none');
        }
        const estados_cuenta = document.getElementsByClassName("estados-cuenta");
        for (let i = 0; i < estados_cuenta.length; i++) {
            estados_cuenta[i].classList.add('d-none');
        }

        const cantidadMascotas = () => {
            const tiene_mascotas1 = document.querySelector('#tiene_mascotas1').checked;
            const tiene_mascotas2 = document.querySelector('#tiene_mascotas2').checked;
            if (tiene_mascotas1) {
                document.querySelector('.cantidad-mascotas').classList.remove('d-none');
            } else if (tiene_mascotas2) {
                document.querySelector('.cantidad-mascotas').classList.add('d-none');
                document.querySelector('#cantidad_mascotas').value = "";

            }
        }


        const validarTarjeta1 = () => {
            const historial_crediticio1 = document.querySelector('#historial_crediticio1').checked;
            const historial_crediticio_no1 = document.querySelector('#historial_crediticio_no1').checked;
            if (historial_crediticio1) {
                const tarjeta = document.getElementsByClassName("tarjeta1");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.remove('d-none');
                }
            } else if (historial_crediticio_no1) {
                const tarjeta = document.getElementsByClassName("tarjeta1");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.add('d-none');
                }
                document.querySelector('#tarjeta').value = "";

            }
        }

        const trabajoEmpleado = () => {
            const trabajo = document.querySelector('#trabajo1').checked;
            const nombre_empresa = document.querySelector('.nombre-empresa');
            const actividad_empresa = document.querySelector('.actividad-empresa');

            if (trabajo) {
                actividad_empresa.classList.remove('d-block');
                actividad_empresa.classList.add('d-none');
                nombre_empresa.classList.remove('d-none');
                document.querySelector("#actividad_empresa").value = "";

            }
        }

        const trabajoIndependiente = () => {
            const trabajo2 = document.querySelector('#trabajo2').checked;
            const nombre_empresa = document.querySelector('.nombre-empresa');
            const actividad_empresa = document.querySelector('.actividad-empresa');

            if (trabajo2) {
                nombre_empresa.classList.remove('d-block');
                nombre_empresa.classList.add('d-none');
                actividad_empresa.classList.remove('d-none');
                document.querySelector("#empresa").value = "";
            }
        }

        const tipoDocumentacion = () => {
            const documentacion = document.querySelector('#documentacion').value;

            if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.remove('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.add('d-none');
                }

                document.querySelector('#estado_cuenta1').value = "";
                document.querySelector('#estado_cuenta2').value = "";
                document.querySelector('#estado_cuenta3').value = "";

                document.querySelector(`#file_estado_cuenta1`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta2`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta3`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

            } else if (documentacion == 'Estados de cuenta completos (3 meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.add('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.remove('d-none');
                }

                document.querySelector('#comprobante_nomina1').value = "";

                document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
            }
        }

        const validarCantidadFiles = () => {
            const fileUpload = $("#comprobante_nomina1");

            if (parseInt(fileUpload.get(0).files.length) > 6 || parseInt(fileUpload.get(0).files.length) < 6) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Archivos incorrectos',
                    html: 'Tiene que seleccionar 6 archivos',
                    confirmButtonText: 'Aceptar',
                });
                document.querySelector('#comprobante_nomina1').value = "";
                document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
                return false;
            } else {
                for (let index = 0; index < fileUpload.get(0).files.length; index++) {

                    const fileName = fileUpload.get(0).files[index].name;
                    const fileSize = fileUpload.get(0).files[index].size;

                    if (fileSize > 40000000) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tamaño no permitido',
                            html: `El archivo ${fileName} no debe de ser mayor a 2 megas`,
                            confirmButtonText: 'Aceptar',
                        });
                        document.querySelector('#comprobante_nomina1').value = "";
                        document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                            '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';

                    } else {

                        let ext = fileName.split('.').pop();
                        ext = ext.toLowerCase();

                        const arrExtenciones = [
                            "jpg",
                            "JPG",
                            "jpeg",
                            "JPEG",
                            "png",
                            "PNG",
                            "pdf",
                            "PDF"
                        ];

                        let validarExtencion = arrExtenciones.includes(ext);
                        if (validarExtencion) {
                            document.querySelector('#file_comprobante_nomina1').innerHTML = '6 archivos seleccionados';
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Formato incorrecto',
                                html: `El archivo ${fileName} no tiene un formato valido. <br/>Formatos validos ( .jpg | .jpeg | .png | .pdf)`,
                                confirmButtonText: 'Aceptar',
                            });

                            document.querySelector('#comprobante_nomina1').value = "";
                            document.querySelector(`#file_comprobante_nomina1`).innerHTML =
                                '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
                        }
                    }
                }
            }
        }
    </script>

    @push('script')
        <script>
            Livewire.on('errorDocumentos', function() {
                document.querySelector('.btn-loading').classList.remove('d-none');
                document.querySelector('.loading-btn').classList.add('d-none');
                Swal.fire({
                    icon: 'warning',
                    title: 'Espera un momento...',
                    html: 'Tus documentos aún no se suben, espera 10 segundos mas.',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            });
        </script>
    @endpush

</div>
