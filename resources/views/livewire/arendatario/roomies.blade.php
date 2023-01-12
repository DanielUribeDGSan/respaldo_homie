<div x-data class="mt-3" wire:ignore>
    <form onsubmit="return roomiesForm(event)">
        <div class="form-group row">
            <div class="col-lg-6 col-md-6 col-12 mt-2">
                <label class="col-form-label fw-100">Compartirá renta</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="compartira_renta" id="compartira_renta1"
                        value="Si" wire:model.defer="createForm.compartira_renta" onchange="compartiraRenta()">
                    <label class="form-check-label" for="compartira_renta1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="compartira_renta" id="compartira_renta2"
                        value="No" wire:model.defer="createForm.compartira_renta" onchange="compartiraRenta()">
                    <label class="form-check-label" for="compartira_renta2">No</label>
                </div>
                @if ($errors->has('createForm.compartira_renta'))
                    <span>{{ $errors->first('createForm.compartira_renta') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="name" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.name" autocomplete="off">
                @if ($errors->has('createForm.name'))
                    <span>{{ $errors->first('createForm.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="last_name" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.last_name" autocomplete="off">
                @if ($errors->has('createForm.last_name'))
                    <span>{{ $errors->first('createForm.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
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
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="email" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email" maxlength="255"
                    wire:model.defer="createForm.email" autocomplete="off">
                @if ($errors->has('createForm.email'))
                    <span>{{ $errors->first('createForm.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 ocultar-roomie">
                <label for="phone" class="col-form-label fw-100 mt-2">Teléfono celular</label>
                <input type="text" class="form-input" id="phone" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm.phone" autocomplete="off">
                @if ($errors->has('createForm.phone'))
                    <span>{{ $errors->first('createForm.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="fecha_nacimiento" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento"
                    wire:model.defer="createForm.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="rfc" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm.rfc" autocomplete="off">
                @if ($errors->has('createForm.rfc'))
                    <span>{{ $errors->first('createForm.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="calle" class="col-form-label fw-100">Calle</label>
                <input type="text" class="form-input" id="calle" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.calle" autocomplete="off">
                @if ($errors->has('createForm.calle'))
                    <span>{{ $errors->first('createForm.calle') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="num_exterior" class="col-form-label fw-100">Número exterior</label>
                <input type="text" class="form-input" id="num_exterior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_exterior" autocomplete="off">
                @if ($errors->has('createForm.num_exterior'))
                    <span>{{ $errors->first('createForm.num_exterior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="num_interior" class="col-form-label fw-100">Número interior</label>
                <input type="text" class="form-input" id="num_interior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_interior" autocomplete="off">
                @if ($errors->has('createForm.num_interior'))
                    <span>{{ $errors->first('createForm.num_interior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="colonia" class="col-form-label fw-100">Colonia</label>
                <input type="text" class="form-input" id="colonia" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.colonia" autocomplete="off">
                @if ($errors->has('createForm.colonia'))
                    <span>{{ $errors->first('createForm.colonia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="delegacion_alcaldia" class="col-form-label fw-100">Delegación/Alcaldía</label>
                <input type="text" class="form-input" id="delegacion_alcaldia" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.delegacion_alcaldia" autocomplete="off">
                @if ($errors->has('createForm.delegacion_alcaldia'))
                    <span>{{ $errors->first('createForm.delegacion_alcaldia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="code_postal" class="col-form-label fw-100">Código postal</label>
                <input type="text" class="form-input" id="code_postal" onkeyup="onlyNum(this)" maxlength="5"
                    wire:model.defer="createForm.code_postal" autocomplete="off">
                @if ($errors->has('createForm.code_postal'))
                    <span>{{ $errors->first('createForm.code_postal') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 ocultar-roomie">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta d-none">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta d-none">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta d-none">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina d-none">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3 meses</label>
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
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
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie tarjeta1">
                <label for="tarjeta" class="col-form-label fw-100">Últimos 4 dígitos de tu tarjeta</label>
                <input type="text" class="form-input" id="tarjeta" onkeyup="onlyNum(this)" maxlength="4"
                    wire:model.defer="createForm.tarjeta" autocomplete="off">
                @if ($errors->has('createForm.tarjeta'))
                    <span>{{ $errors->first('createForm.tarjeta') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ocultar-roomie">
                <label for="cantidad_roomies" class="col-form-label fw-100 ">Cantidad de roomies extras</label>
                <select class="form-input" id="cantidad_roomies" wire:model.defer="createForm.cantidad_roomies"
                    onchange="validarCantidadRoomies()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="0">No hay mas roomies</option>
                    <option value="1">Hay un roomie extra</option>
                    <option value="2">Hay dos roomies extras</option>
                    <option value="3">Hay tres roomies extras</option>

                </select>

                @if ($errors->has('createForm.cantidad_roomies'))
                    <span>{{ $errors->first('createForm.cantidad_roomies') }}</span>
                @endif
            </div>
        </div>

        {{-- __________________________________ Roomie2 __________________________________ --}}
        <div class="form-group row">
            <div class="col-lg-12 col-md-6 col-12 mt-2 roomie1">
                <hr />
                <h2 class=" fw-100 text-secundary">Datos del segundo roomie</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie1">
                <label for="name2" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.name" autocomplete="off">
                @if ($errors->has('createForm2.name'))
                    <span>{{ $errors->first('createForm2.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie1">
                <label for="last_name2" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.last_name" autocomplete="off">
                @if ($errors->has('createForm2.last_name'))
                    <span>{{ $errors->first('createForm2.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie1">
                <label class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial2"
                    wire:model="identificacion_oficial2">
                <label for="identificacion_oficial2" class="form-input-file text-center"
                    id="file_identificacion_oficial2"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial2'))
                    <span>{{ $errors->first('identificacion_oficial2') }}</span>
                @endif
                <div wire:loading wire:target="identificacion_oficial2">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie1">
                <label for="email2" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email2" maxlength="255"
                    wire:model.defer="createForm2.email" autocomplete="off">
                @if ($errors->has('createForm2.email'))
                    <span>{{ $errors->first('createForm2.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie1">
                <label for="phone2" class="col-form-label fw-100 mt-2">Teléfono celular</label>
                <input type="text" class="form-input" id="phone2" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm2.phone" autocomplete="off">
                @if ($errors->has('createForm2.phone'))
                    <span>{{ $errors->first('createForm2.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="fecha_nacimiento2" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento2"
                    wire:model.defer="createForm2.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm2.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm2.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="rfc2" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc2" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm2.rfc" autocomplete="off">
                @if ($errors->has('createForm2.rfc'))
                    <span>{{ $errors->first('createForm2.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="calle2" class="col-form-label fw-100">Calle</label>
                <input type="text" class="form-input" id="calle2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.calle" autocomplete="off">
                @if ($errors->has('createForm2.calle'))
                    <span>{{ $errors->first('createForm2.calle') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="num_exterior2" class="col-form-label fw-100">Número exterior</label>
                <input type="text" class="form-input" id="num_exterior2" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm2.num_exterior" autocomplete="off">
                @if ($errors->has('createForm2.num_exterior'))
                    <span>{{ $errors->first('createForm2.num_exterior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="num_interior2" class="col-form-label fw-100">Número interior</label>
                <input type="text" class="form-input" id="num_interior2" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm2.num_interior" autocomplete="off">
                @if ($errors->has('createForm2.num_interior'))
                    <span>{{ $errors->first('createForm2.num_interior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="colonia2" class="col-form-label fw-100">Colonia</label>
                <input type="text" class="form-input" id="colonia2" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm2.colonia" autocomplete="off">
                @if ($errors->has('createForm2.colonia'))
                    <span>{{ $errors->first('createForm2.colonia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="delegacion_alcaldia2" class="col-form-label fw-100">Delegación/Alcaldía</label>
                <input type="text" class="form-input" id="delegacion_alcaldia2" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm2.delegacion_alcaldia" autocomplete="off">
                @if ($errors->has('createForm2.delegacion_alcaldia'))
                    <span>{{ $errors->first('createForm2.delegacion_alcaldia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="estado2" class="col-form-label fw-100">Estado</label>
                <select class="form-input" id="estado2" wire:model.defer="createForm2.estado">
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
                @if ($errors->has('createForm2.estado'))
                    <span>{{ $errors->first('createForm2.estado') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label for="code_postal2" class="col-form-label fw-100">Código postal</label>
                <input type="text" class="form-input" id="code_postal2" onkeyup="onlyNum(this)" maxlength="5"
                    wire:model.defer="createForm2.code_postal" autocomplete="off">
                @if ($errors->has('createForm2.code_postal'))
                    <span>{{ $errors->first('createForm2.code_postal') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 roomie1">
                <label for="documentacion2" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion2" wire:model.defer="createForm2.documentacion"
                    onchange="tipoDocumentacion2()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm2.documentacion'))
                    <span>{{ $errors->first('createForm2.documentacion') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta2 d-none">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie1"
                    wire:model="estado_cuenta_roomie1">
                <label for="estado_cuenta_roomie1" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie1"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie1'))
                    <span>{{ $errors->first('estado_cuenta_roomie1') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie1">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta2 d-none">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie2"
                    wire:model="estado_cuenta_roomie2">
                <label for="estado_cuenta_roomie2" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie2"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie2'))
                    <span>{{ $errors->first('estado_cuenta_roomie2') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie2">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta2 d-none">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie3"
                    wire:model="estado_cuenta_roomie3">
                <label for="estado_cuenta_roomie3" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie3"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie3'))
                    <span>{{ $errors->first('estado_cuenta_roomie3') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie3">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina2 d-none">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3
                    meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina2"
                    name="nominas2[]" wire:model="nominas2" multiple onchange="validarCantidadFiles2()">
                <label for="comprobante_nomina2" class="form-input-file text-center" id="file_comprobante_nomina2"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas2'))
                    <span>{{ $errors->first('nominas2') }}</span>
                @endif
                <div wire:loading wire:target="nominas2">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>

            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio2"
                        id="historial_crediticio2" value="Tengo tarjeta de crédito"
                        wire:model.defer="createForm2.historial_crediticio" onchange="validarTarjeta2()">
                    <label class="form-check-label" for="historial_crediticio2">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio2"
                        id="historial_crediticio_no2" value="No tengo tarjeta de crédito"
                        wire:model.defer="createForm2.historial_crediticio" onchange="validarTarjeta2()">
                    <label class="form-check-label" for="historial_crediticio_no2">No tengo tarjeta de crédito</label>
                </div>
                @if ($errors->has('createForm2.historial_crediticio'))
                    <span>{{ $errors->first('createForm2.historial_crediticio') }}</span>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie1 tarjeta2">
                <label for="tarjeta2" class="col-form-label fw-100">Últimos 4 dígitos de tu tarjeta</label>
                <input type="text" class="form-input" id="tarjeta2" onkeyup="onlyNum(this)" maxlength="4"
                    wire:model.defer="createForm2.tarjeta" autocomplete="off">
                @if ($errors->has('createForm2.tarjeta'))
                    <span>{{ $errors->first('createForm2.tarjeta') }}</span>
                @endif
            </div>
        </div>
        {{-- __________________________________ Roomie3 __________________________________ --}}
        <div class="form-group row">
            <div class="col-lg-12 col-md-6 col-12 mt-2 roomie2">
                <hr />
                <h2 class=" fw-100 text-secundary">Datos del tercer roomie</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie2">
                <label for="name3" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name3" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm3.name" autocomplete="off">
                @if ($errors->has('createForm3.name'))
                    <span>{{ $errors->first('createForm3.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie2">
                <label for="last_name3" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name3" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm3.last_name" autocomplete="off">
                @if ($errors->has('createForm3.last_name'))
                    <span>{{ $errors->first('createForm3.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie2">
                <label class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial3"
                    wire:model="identificacion_oficial3">
                <label for="identificacion_oficial3" class="form-input-file text-center"
                    id="file_identificacion_oficial3"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial3'))
                    <span>{{ $errors->first('identificacion_oficial3') }}</span>
                @endif
                <div wire:loading wire:target="identificacion_oficial3">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie2">
                <label for="email3" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email3" maxlength="255"
                    wire:model.defer="createForm3.email" autocomplete="off">
                @if ($errors->has('createForm3.email'))
                    <span>{{ $errors->first('createForm3.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie2">
                <label for="phone3" class="col-form-label fw-100 mt-2">Teléfono celular</label>
                <input type="text" class="form-input" id="phone3" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm3.phone" autocomplete="off">
                @if ($errors->has('createForm3.phone'))
                    <span>{{ $errors->first('createForm3.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="fecha_nacimiento3" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento3"
                    wire:model.defer="createForm3.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm3.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm3.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="rfc3" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc3" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm3.rfc" autocomplete="off">
                @if ($errors->has('createForm3.rfc'))
                    <span>{{ $errors->first('createForm3.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="calle3" class="col-form-label fw-100">Calle</label>
                <input type="text" class="form-input" id="calle3" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm3.calle" autocomplete="off">
                @if ($errors->has('createForm3.calle'))
                    <span>{{ $errors->first('createForm3.calle') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="num_exterior3" class="col-form-label fw-100">Número exterior</label>
                <input type="text" class="form-input" id="num_exterior3" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm3.num_exterior" autocomplete="off">
                @if ($errors->has('createForm3.num_exterior'))
                    <span>{{ $errors->first('createForm3.num_exterior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="num_interior3" class="col-form-label fw-100">Número interior</label>
                <input type="text" class="form-input" id="num_interior3" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm3.num_interior" autocomplete="off">
                @if ($errors->has('createForm3.num_interior'))
                    <span>{{ $errors->first('createForm3.num_interior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="colonia3" class="col-form-label fw-100">Colonia</label>
                <input type="text" class="form-input" id="colonia3" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm3.colonia" autocomplete="off">
                @if ($errors->has('createForm3.colonia'))
                    <span>{{ $errors->first('createForm3.colonia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="delegacion_alcaldia3" class="col-form-label fw-100">Delegación/Alcaldía</label>
                <input type="text" class="form-input" id="delegacion_alcaldia3" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm3.delegacion_alcaldia" autocomplete="off">
                @if ($errors->has('createForm3.delegacion_alcaldia'))
                    <span>{{ $errors->first('createForm3.delegacion_alcaldia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="estado3" class="col-form-label fw-100">Estado</label>
                <select class="form-input" id="estado3" wire:model.defer="createForm3.estado">
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
                @if ($errors->has('createForm3.estado'))
                    <span>{{ $errors->first('createForm3.estado') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label for="code_postal3" class="col-form-label fw-100">Código postal</label>
                <input type="text" class="form-input" id="code_postal3" onkeyup="onlyNum(this)" maxlength="5"
                    wire:model.defer="createForm3.code_postal" autocomplete="off">
                @if ($errors->has('createForm3.code_postal'))
                    <span>{{ $errors->first('createForm3.code_postal') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 roomie2">
                <label for="documentacion3" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion3" wire:model.defer="createForm3.documentacion"
                    onchange="tipoDocumentacion3()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm3.documentacion'))
                    <span>{{ $errors->first('createForm3.documentacion') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta3 d-none">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie11"
                    wire:model="estado_cuenta_roomie11">
                <label for="estado_cuenta_roomie11" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie11"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie11'))
                    <span>{{ $errors->first('estado_cuenta_roomie11') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie11">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta3 d-none">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie22"
                    wire:model="estado_cuenta_roomie22">
                <label for="estado_cuenta_roomie22" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie22"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie22'))
                    <span>{{ $errors->first('estado_cuenta_roomie22') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie22">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta3 d-none">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie33"
                    wire:model="estado_cuenta_roomie33">
                <label for="estado_cuenta_roomie33" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie33"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie33'))
                    <span>{{ $errors->first('estado_cuenta_roomie33') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie33">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina3 d-none">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3
                    meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina3"
                    name="nominas3[]" wire:model="nominas3" multiple onchange="validarCantidadFiles3()">
                <label for="comprobante_nomina3" class="form-input-file text-center" id="file_comprobante_nomina3"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas3'))
                    <span>{{ $errors->first('nominas3') }}</span>
                @endif
                <div wire:loading wire:target="nominas3">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio3"
                        id="historial_crediticio3" value="Tengo tarjeta de crédito"
                        wire:model.defer="createForm3.historial_crediticio" onchange="validarTarjeta3()">
                    <label class="form-check-label" for="historial_crediticio3">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio3"
                        id="historial_crediticio_no3" value="No tengo tarjeta de crédito"
                        wire:model.defer="createForm3.historial_crediticio" onchange="validarTarjeta3()">
                    <label class="form-check-label" for="historial_crediticio_no3">No tengo tarjeta de crédito</label>
                </div>
                @if ($errors->has('createForm3.historial_crediticio'))
                    <span>{{ $errors->first('createForm3.historial_crediticio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2 tarjeta3">
                <label for="tarjeta3" class="col-form-label fw-100">Últimos 4 dígitos de tu tarjeta</label>
                <input type="text" class="form-input" id="tarjeta3" onkeyup="onlyNum(this)" maxlength="4"
                    wire:model.defer="createForm3.tarjeta" autocomplete="off">
                @if ($errors->has('createForm3.tarjeta'))
                    <span>{{ $errors->first('createForm3.tarjeta') }}</span>
                @endif
            </div>
        </div>
        {{-- __________________________________ Roomie4 __________________________________ --}}
        <div class="form-group row">
            <div class="col-lg-12 col-md-6 col-12 mt-2 roomie3">
                <hr />
                <h2 class=" fw-100 text-secundary">Datos del cuarto roomie</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie3">
                <label for="name4" class="col-form-label fw-100">Nombre</label>
                <input type="text" class="form-input" id="name4" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm4.name" autocomplete="off">
                @if ($errors->has('createForm4.name'))
                    <span>{{ $errors->first('createForm4.name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie3">
                <label for="last_name4" class="col-form-label fw-100">Apellidos</label>
                <input type="text" class="form-input" id="last_name4" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm4.last_name" autocomplete="off">
                @if ($errors->has('createForm4.last_name'))
                    <span>{{ $errors->first('createForm4.last_name') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie3">
                <label class="col-form-label fw-100">Identificación oficial</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="identificacion_oficial4"
                    wire:model="identificacion_oficial4">
                <label for="identificacion_oficial4" class="form-input-file text-center"
                    id="file_identificacion_oficial4"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('identificacion_oficial4'))
                    <span>{{ $errors->first('identificacion_oficial4') }}</span>
                @endif
                <div wire:loading wire:target="identificacion_oficial4">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie3">
                <label for="email4" class="col-form-label fw-100 mt-2">Correo
                    electrónico</label>
                <input type="email" class="form-input" id="email4" maxlength="255"
                    wire:model.defer="createForm4.email" autocomplete="off">
                @if ($errors->has('createForm4.email'))
                    <span>{{ $errors->first('createForm4.email') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-2 roomie3">
                <label for="phone4" class="col-form-label fw-100 mt-2">Teléfono celular</label>
                <input type="text" class="form-input" id="phone4" onkeyup="onlyNumPhone(this)" maxlength="20"
                    wire:model.defer="createForm4.phone" autocomplete="off">
                @if ($errors->has('createForm4.phone'))
                    <span>{{ $errors->first('createForm4.phone') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="fecha_nacimiento4" class="col-form-label fw-100">Fecha de nacimiento</label>
                <input type="date" class="form-input" id="fecha_nacimiento4"
                    wire:model.defer="createForm4.fecha_nacimiento" autocomplete="off">
                @if ($errors->has('createForm4.fecha_nacimiento'))
                    <span>{{ $errors->first('createForm4.fecha_nacimiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="rfc4" class="col-form-label fw-100">RFC</label>
                <input type="text" class="form-input" id="rfc4" onkeyup="onlyLetrasNum(this)" maxlength="13"
                    wire:model.defer="createForm4.rfc" autocomplete="off">
                @if ($errors->has('createForm4.rfc'))
                    <span>{{ $errors->first('createForm4.rfc') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="calle4" class="col-form-label fw-100">Calle</label>
                <input type="text" class="form-input" id="calle4" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm4.calle" autocomplete="off">
                @if ($errors->has('createForm4.calle'))
                    <span>{{ $errors->first('createForm4.calle') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="num_exterior4" class="col-form-label fw-100">Número exterior</label>
                <input type="text" class="form-input" id="num_exterior4" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm4.num_exterior" autocomplete="off">
                @if ($errors->has('createForm4.num_exterior'))
                    <span>{{ $errors->first('createForm4.num_exterior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="num_interior4" class="col-form-label fw-100">Número interior</label>
                <input type="text" class="form-input" id="num_interior4" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm4.num_interior" autocomplete="off">
                @if ($errors->has('createForm4.num_interior'))
                    <span>{{ $errors->first('createForm4.num_interior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="colonia4" class="col-form-label fw-100">Colonia</label>
                <input type="text" class="form-input" id="colonia4" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm4.colonia" autocomplete="off">
                @if ($errors->has('createForm4.colonia'))
                    <span>{{ $errors->first('createForm4.colonia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="delegacion_alcaldia4" class="col-form-label fw-100">Delegación/Alcaldía</label>
                <input type="text" class="form-input" id="delegacion_alcaldia4" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm4.delegacion_alcaldia" autocomplete="off">
                @if ($errors->has('createForm4.delegacion_alcaldia'))
                    <span>{{ $errors->first('createForm4.delegacion_alcaldia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="estado4" class="col-form-label fw-100">Estado</label>
                <select class="form-input" id="estado4" wire:model.defer="createForm4.estado">
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
                @if ($errors->has('createForm4.estado'))
                    <span>{{ $errors->first('createForm4.estado') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3">
                <label for="code_postal4" class="col-form-label fw-100">Código postal</label>
                <input type="text" class="form-input" id="code_postal4" onkeyup="onlyNum(this)" maxlength="5"
                    wire:model.defer="createForm4.code_postal" autocomplete="off">
                @if ($errors->has('createForm4.code_postal'))
                    <span>{{ $errors->first('createForm4.code_postal') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-3 roomie3">
                <label for="documentacion4" class="col-form-label fw-100">Documentación</label>
                <select class="form-input" id="documentacion4" wire:model.defer="createForm4.documentacion"
                    onchange="tipoDocumentacion4()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Comprobantes de nómina timbrados SAT (3 últimos meses)">Comprobantes de nómina
                        timbrados SAT (3 últimos meses)</option>
                    <option value="Estados de cuenta completos (3 meses)">Estados de cuenta completos (3 meses)</option>

                </select>

                @if ($errors->has('createForm4.documentacion'))
                    <span>{{ $errors->first('createForm4.documentacion') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta4 d-none">
                <label class="col-form-label fw-100">Primer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie111"
                    wire:model="estado_cuenta_roomie111">
                <label for="estado_cuenta_roomie111" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie111"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie111'))
                    <span>{{ $errors->first('estado_cuenta_roomie111') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie111">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta4 d-none">
                <label class="col-form-label fw-100">Segundo estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie222"
                    wire:model="estado_cuenta_roomie222">
                <label for="estado_cuenta_roomie222" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie222"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie222'))
                    <span>{{ $errors->first('estado_cuenta_roomie222') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie222">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 estados-cuenta4 d-none">
                <label class="col-form-label fw-100">Tercer estado de cuenta</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="estado_cuenta_roomie333"
                    wire:model="estado_cuenta_roomie333">
                <label for="estado_cuenta_roomie333" class="form-input-file text-center"
                    id="file_estado_cuenta_roomie333"><i class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tu archivo</label>
                @if ($errors->has('estado_cuenta_roomie333'))
                    <span>{{ $errors->first('estado_cuenta_roomie333') }}</span>
                @endif
                <div wire:loading wire:target="estado_cuenta_roomie333">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 comprobante-nomina4 d-none">
                <label class="col-form-label fw-100">Selecciona tus 6 archivos de nomina, de tus ultimos 3
                    meses</label>
                <input type="file" accept="image/*,.pdf" class="form-file" id="comprobante_nomina4"
                    name="nominas4[]" wire:model="nominas4" multiple onchange="validarCantidadFiles4()">
                <label for="comprobante_nomina4" class="form-input-file text-center" id="file_comprobante_nomina4"><i
                        class="far fa-file-pdf"></i> Da click aquí
                    para
                    subir
                    tus archivos</label>
                @if ($errors->has('nominas4'))
                    <span>{{ $errors->first('nominas4') }}</span>
                @endif
                <div wire:loading wire:target="nominas4">
                    <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie2">
                <label class="col-form-label fw-100">Historial crediticio</label>
                <br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio4"
                        id="historial_crediticio4" value="Tengo tarjeta de crédito"
                        wire:model.defer="createForm4.historial_crediticio" onchange="validarTarjeta4()">
                    <label class="form-check-label" for="historial_crediticio4">Tengo tarjeta de crédito</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="historial_crediticio4"
                        id="historial_crediticio_no4" value="No tengo tarjeta de crédito"
                        wire:model.defer="createForm4.historial_crediticio" onchange="validarTarjeta4()">
                    <label class="form-check-label" for="historial_crediticio_no4">No tengo tarjeta de crédito</label>
                </div>
                @if ($errors->has('createForm4.historial_crediticio'))
                    <span>{{ $errors->first('createForm4.historial_crediticio') }}</span>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-3 roomie3 tarjeta4">
                <label for="tarjeta4" class="col-form-label fw-100">Últimos 4 dígitos de tu tarjeta</label>
                <input type="text" class="form-input" id="tarjeta4" onkeyup="onlyNum(this)" maxlength="4"
                    wire:model.defer="createForm4.tarjeta" autocomplete="off">
                @if ($errors->has('createForm4.tarjeta'))
                    <span>{{ $errors->first('createForm4.tarjeta') }}</span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6 mt-5">
                <button type="submit" class="btn btn-orange-sm btn-loading">Registrar datos</button>
                <div class="loading-btn d-none">
                    <x-loading />
                </div>
            </div>
            <div class="col-6 mt-5 d-flex align-items-center justify-content-end">
                <article>
                    <h1 class="text-secundary">3/3</h1>
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

        if (readCookie("inquilino_roomies_historial_crediticio")) {
            if (readCookie("inquilino_roomies_historial_crediticio") == "Tengo tarjeta de crédito") {
                const tarjeta_cookie = document.getElementsByClassName("tarjeta1");
                for (let i = 0; i < tarjeta_cookie.length; i++) {
                    tarjeta_cookie[i].classList.remove('d-none');
                }
            } else if (readCookie("inquilino_roomies_historial_crediticio") == "No tengo tarjeta de crédito") {
                const tarjeta_cookie2 = document.getElementsByClassName("tarjeta1");
                for (let i = 0; i < tarjeta_cookie2.length; i++) {
                    tarjeta_cookie2[i].classList.add('d-none');
                    document.querySelector("#tarjeta").value = "";

                }
            }
        }


        // Crear cookies    
        $('#name').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_name=" + encodeURIComponent($('#name').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#last_name').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_last_name=" + encodeURIComponent($('#last_name').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#email').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_email=" + encodeURIComponent($('#email').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#phone').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_phone=" + encodeURIComponent($('#phone').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#rfc').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_rfc=" + encodeURIComponent($('#rfc').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#fecha_nacimiento').change(function(e) {
            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_fecha_nacimiento=" + encodeURIComponent($('#fecha_nacimiento')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#calle').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_calle=" + encodeURIComponent($('#calle').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#num_exterior').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_num_exterior=" + encodeURIComponent($('#num_exterior').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#num_interior').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_num_interior=" + encodeURIComponent($('#num_interior').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#colonia').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_colonia=" + encodeURIComponent($('#colonia').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#delegacion_alcaldia').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_delegacion_alcaldia=" + encodeURIComponent($(
                        '#delegacion_alcaldia')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#estado').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_estado=" + encodeURIComponent($('#estado').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#code_postal').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_code_postal=" + encodeURIComponent($('#code_postal').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#historial_crediticio1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_historial_crediticio=" + encodeURIComponent($(
                        '#historial_crediticio1')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#historial_crediticio_no1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_historial_crediticio=" + encodeURIComponent($(
                        '#historial_crediticio_no1')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });

        $('#tarjeta').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "inquilino_roomies_tarjeta=" + encodeURIComponent($('#tarjeta')
                    .val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
    </script>
    <script>
        const roomiesForm = (e) => {
            e.preventDefault();

            const compartira_renta1 = document.querySelector('#compartira_renta1').checked;
            const compartira_renta2 = document.querySelector('#compartira_renta2').checked;
            const cantidad_roomies = document.querySelector('#cantidad_roomies').value;
            const name = document.querySelector('#name').value;
            const last_name = document.querySelector('#last_name').value;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const email = document.querySelector('#email').value;
            const phone = document.querySelector('#phone').value;
            const fecha_nacimiento = document.querySelector('#fecha_nacimiento').value;
            const rfc = document.querySelector('#rfc').value;
            const calle = document.querySelector('#calle').value;
            const num_exterior = document.querySelector('#num_exterior').value;
            const num_interior = document.querySelector('#num_interior').value;
            const colonia = document.querySelector('#colonia').value;
            const delegacion_alcaldia = document.querySelector('#delegacion_alcaldia').value;
            const estado = document.querySelector('#estado').value;
            const code_postal = document.querySelector('#code_postal').value;
            const documentacion = document.querySelector('#documentacion').value;
            const estado_cuenta1 = document.querySelector('#estado_cuenta1').value;
            const estado_cuenta2 = document.querySelector('#estado_cuenta2').value;
            const estado_cuenta3 = document.querySelector('#estado_cuenta3').value;
            const comprobante_nomina1 = document.querySelector('#comprobante_nomina1').value;
            const historial_crediticio = document.querySelector('#historial_crediticio1').checked;
            const historial_crediticio_no1 = document.querySelector('#historial_crediticio_no1').checked;

            const tarjeta = document.querySelector('#tarjeta').value;


            // Roomie1
            const name2 = document.querySelector('#name2').value;
            const last_name2 = document.querySelector('#last_name2').value;
            const identificacion_oficial2 = document.querySelector('#identificacion_oficial2').value;
            const email2 = document.querySelector('#email2').value;
            const phone2 = document.querySelector('#phone2').value;
            const fecha_nacimiento2 = document.querySelector('#fecha_nacimiento2').value;
            const rfc2 = document.querySelector('#rfc2').value;
            const calle2 = document.querySelector('#calle2').value;
            const num_exterior2 = document.querySelector('#num_exterior2').value;
            const num_interior2 = document.querySelector('#num_interior2').value;
            const colonia2 = document.querySelector('#colonia2').value;
            const delegacion_alcaldia2 = document.querySelector('#delegacion_alcaldia2').value;
            const estado2 = document.querySelector('#estado2').value;
            const code_postal2 = document.querySelector('#code_postal2').value;
            const documentacion2 = document.querySelector('#documentacion2').value;
            const estado_cuenta_roomie1 = document.querySelector('#estado_cuenta_roomie1').value;
            const estado_cuenta_roomie2 = document.querySelector('#estado_cuenta_roomie2').value;
            const estado_cuenta_roomie3 = document.querySelector('#estado_cuenta_roomie3').value;
            const comprobante_nomina2 = document.querySelector('#comprobante_nomina2').value;
            const historial_crediticio2 = document.querySelector('#historial_crediticio2').checked;
            const historial_crediticio_no2 = document.querySelector('#historial_crediticio_no2').checked;

            const tarjeta2 = document.querySelector('#tarjeta2').value;

            // Roomie2
            const name3 = document.querySelector('#name3').value;
            const last_name3 = document.querySelector('#last_name3').value;
            const identificacion_oficial3 = document.querySelector('#identificacion_oficial3').value;
            const email3 = document.querySelector('#email3').value;
            const phone3 = document.querySelector('#phone3').value;
            const fecha_nacimiento3 = document.querySelector('#fecha_nacimiento3').value;
            const rfc3 = document.querySelector('#rfc3').value;
            const calle3 = document.querySelector('#calle3').value;
            const num_exterior3 = document.querySelector('#num_exterior3').value;
            const num_interior3 = document.querySelector('#num_interior3').value;
            const colonia3 = document.querySelector('#colonia3').value;
            const delegacion_alcaldia3 = document.querySelector('#delegacion_alcaldia3').value;
            const estado3 = document.querySelector('#estado3').value;
            const code_postal3 = document.querySelector('#code_postal3').value;
            const documentacion3 = document.querySelector('#documentacion3').value;
            const estado_cuenta_roomie11 = document.querySelector('#estado_cuenta_roomie11').value;
            const estado_cuenta_roomie22 = document.querySelector('#estado_cuenta_roomie22').value;
            const estado_cuenta_roomie33 = document.querySelector('#estado_cuenta_roomie33').value;
            const comprobante_nomina3 = document.querySelector('#comprobante_nomina3').value;
            const historial_crediticio3 = document.querySelector('#historial_crediticio3').checked;
            const historial_crediticio_no3 = document.querySelector('#historial_crediticio_no3').checked;

            const tarjeta3 = document.querySelector('#tarjeta3').value;

            // Roomie3
            const name4 = document.querySelector('#name4').value;
            const last_name4 = document.querySelector('#last_name4').value;
            const identificacion_oficial4 = document.querySelector('#identificacion_oficial4').value;
            const email4 = document.querySelector('#email4').value;
            const phone4 = document.querySelector('#phone4').value;
            const fecha_nacimiento4 = document.querySelector('#fecha_nacimiento4').value;
            const rfc4 = document.querySelector('#rfc4').value;
            const calle4 = document.querySelector('#calle4').value;
            const num_exterior4 = document.querySelector('#num_exterior4').value;
            const num_interior4 = document.querySelector('#num_interior4').value;
            const colonia4 = document.querySelector('#colonia4').value;
            const delegacion_alcaldia4 = document.querySelector('#delegacion_alcaldia4').value;
            const estado4 = document.querySelector('#estado4').value;
            const code_postal4 = document.querySelector('#code_postal4').value;
            const documentacion4 = document.querySelector('#documentacion4').value;
            const estado_cuenta_roomie111 = document.querySelector('#estado_cuenta_roomie111').value;
            const estado_cuenta_roomie222 = document.querySelector('#estado_cuenta_roomie222').value;
            const estado_cuenta_roomie333 = document.querySelector('#estado_cuenta_roomie333').value;
            const comprobante_nomina4 = document.querySelector('#comprobante_nomina4').value;
            const historial_crediticio4 = document.querySelector('#historial_crediticio4').checked;
            const historial_crediticio_no4 = document.querySelector('#historial_crediticio_no4').checked;

            const tarjeta4 = document.querySelector('#tarjeta4').value;

            if (!compartira_renta1 && !compartira_renta2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Compartirá Renta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            }

            if (compartira_renta1) {

                if (cantidad_roomies == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Cantidad de roomies extras</b>" no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (name == '') {
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
                } else if (identificacion_oficial == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Identificación oficial</b>" no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (email == '') {
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
                } else if (phone == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Teléfono</b>" no puede quedar vacío',
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
                } else if (fecha_nacimiento == '') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Fecha de nacimiento</b>" no puede quedar vacío',
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
                } else if (documentacion == 'Estados de cuenta completos (3 meses)' && !
                    estado_cuenta1 ||
                    documentacion == 'Estados de cuenta completos (3 meses)' && !
                    estado_cuenta2 || documentacion == 'Estados de cuenta completos (3 meses)' && !
                    estado_cuenta3) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'Los campos "<b>Estados de cuenta</b>" no pueden quedar vacíos',
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
                }
                // Validar roomie1 ___________________________________________
                else if (name2 == '' && cantidad_roomies == '1' || name2 == '' && cantidad_roomies == '2' || name2 ==
                    '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Nombre</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (last_name2 == '' && cantidad_roomies == '1' || last_name2 == '' && cantidad_roomies == '2' ||
                    last_name2 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Apellidos</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (identificacion_oficial2 == '' && cantidad_roomies == '1' || identificacion_oficial2 == '' &&
                    cantidad_roomies == '2' ||
                    identificacion_oficial2 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Identificación oficial</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (email2 == '' && cantidad_roomies == '1' || email2 == '' &&
                    cantidad_roomies == '2' ||
                    email2 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        html: 'El campo "<b>Email</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                }
                // else if (!validar_email(email2) == '' && cantidad_roomies == '1' || !validar_email(email2) == '' &&
                //     cantidad_roomies == '2' ||
                //     !validar_email(email2) == '' &&
                //     cantidad_roomies == '3') {
                //     console.log(email2);
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Ups...',
                //         text: 'Tu email no es valido, escribelo correctamente',
                //         confirmButtonText: 'Aceptar',
                //     });
                //     return false;
                // } 
                else if (phone2 == '' && cantidad_roomies == '1' || phone2 == '' &&
                    cantidad_roomies == '2' ||
                    phone2 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Teléfono</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (phone2.length < 10 && cantidad_roomies == '1' || phone2.length < 10 &&
                    cantidad_roomies == '2' ||
                    phone2.length < 10 &&
                    cantidad_roomies == '3' || phone2.length > 20 && cantidad_roomies == '1' || phone2.length > 20 &&
                    cantidad_roomies == '2' ||
                    phone2.length > 20 &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El teléfono celular del segundo roomie no es valido',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (fecha_nacimiento2 == '' && cantidad_roomies == '1' || fecha_nacimiento2 == '' &&
                    cantidad_roomies == '2' ||
                    fecha_nacimiento2 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Fecha de nacimiento</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (rfc2 == '' && cantidad_roomies == '1' || rfc2 == '' &&
                    cantidad_roomies == '2' ||
                    rfc2 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>RFC</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (calle2 == '' && cantidad_roomies == '1' || calle2 == '' && cantidad_roomies == '2' ||
                    calle2 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Calle</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (num_exterior2 == '' && cantidad_roomies == '1' || num_exterior2 == '' && cantidad_roomies ==
                    '2' ||
                    num_exterior2 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Número exterior</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (colonia2 == '' && cantidad_roomies == '1' || colonia2 == '' && cantidad_roomies ==
                    '2' ||
                    colonia2 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Colonia</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (delegacion_alcaldia2 == '' && cantidad_roomies == '1' || delegacion_alcaldia2 == '' &&
                    cantidad_roomies ==
                    '2' ||
                    delegacion_alcaldia2 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Delegación/Alcaldía</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (estado2 == '' && cantidad_roomies == '1' || estado2 == '' &&
                    cantidad_roomies ==
                    '2' ||
                    estado2 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Estado</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (code_postal2 == '' && cantidad_roomies == '1' || code_postal2 == '' &&
                    cantidad_roomies ==
                    '2' ||
                    code_postal2 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Código postal</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion2 == '' && cantidad_roomies == '1' || documentacion2 == '' &&
                    cantidad_roomies == '2' ||
                    documentacion2 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Documentación</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion2 == 'Comprobantes de nómina timbrados SAT (3 últimos meses)' &&
                    cantidad_roomies ==
                    '1' && !comprobante_nomina2 || documentacion2 ==
                    'Comprobantes de nómina timbrados SAT (3 últimos meses)' &&
                    cantidad_roomies == '2' && !comprobante_nomina2 ||
                    documentacion2 == 'Comprobantes de nómina timbrados SAT (3 últimos meses)' &&
                    cantidad_roomies == '3' && !comprobante_nomina2) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'Los campos "<b>Comprobantes de nómina</b>" del segundo roomie no pueden quedar vacíos',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion2 == 'Estados de cuenta completos (3 meses)' && cantidad_roomies ==
                    '1' && !
                    estado_cuenta_roomie1 ||
                    documentacion2 == 'Estados de cuenta completos (3 meses)' && cantidad_roomies ==
                    '1' && !
                    estado_cuenta_roomie2 || documentacion2 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '1' && !
                    estado_cuenta_roomie3 || documentacion2 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '2' && !
                    estado_cuenta_roomie1 ||
                    documentacion2 == 'Estados de cuenta completos (3 meses)' && cantidad_roomies ==
                    '2' && !
                    estado_cuenta_roomie2 || documentacion2 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '2' && !
                    estado_cuenta_roomie3 || documentacion2 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie1 ||
                    documentacion2 == 'Estados de cuenta completos (3 meses)' && cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie2 || documentacion2 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie3) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'Los campos "<b>Estados de cuenta</b>" del segundo roomie no pueden quedar vacíos',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (!historial_crediticio2 && cantidad_roomies == '1' && !historial_crediticio_no2 || !
                    historial_crediticio2 &&
                    cantidad_roomies == '2' && !historial_crediticio_no2 ||
                    !historial_crediticio2 &&
                    cantidad_roomies == '3' && !historial_crediticio_no2) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Historial crediticio</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (tarjeta2 == "" && cantidad_roomies == '1' && historial_crediticio2 ||
                    tarjeta2 == "" &&
                    cantidad_roomies == '2' && historial_crediticio2 ||
                    tarjeta2 == "" &&
                    cantidad_roomies == '3' && historial_crediticio2) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Últimos 4 dígitos de tu tarjeta</b>" del segundo roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                }
                // Validar roomie2 ___________________________________________
                else if (name3 == '' && cantidad_roomies == '2' || name3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Nombre</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (last_name3 == '' && cantidad_roomies == '2' ||
                    last_name3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Apellidos</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (identificacion_oficial3 == '' &&
                    cantidad_roomies == '2' ||
                    identificacion_oficial3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Identificación oficial</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (email3 == '' &&
                    cantidad_roomies == '2' ||
                    email3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        html: 'El campo "<b>Email</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                }
                // else if (!validar_email(email3) == '' &&
                //     cantidad_roomies == '2' ||
                //     !validar_email(email3) == '' &&
                //     cantidad_roomies == '3') {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Ups...',
                //         text: 'Tu email no es valido, escribelo correctamente',
                //         confirmButtonText: 'Aceptar',
                //     });
                //     return false;
                // } 
                else if (phone3 == '' &&
                    cantidad_roomies == '2' ||
                    phone3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Teléfono</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (phone3.length < 10 &&
                    cantidad_roomies == '2' ||
                    phone3.length < 10 &&
                    cantidad_roomies == '3' || phone3.length > 20 &&
                    cantidad_roomies == '2' ||
                    phone3.length > 20 &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El teléfono celular del tercer roomie no es valido',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (fecha_nacimiento3 == '' &&
                    cantidad_roomies == '2' ||
                    fecha_nacimiento3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Fecha de nacimiento</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (rfc3 == '' && cantidad_roomies == '2' ||
                    rfc3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>RFC</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (calle3 == '' && cantidad_roomies == '2' ||
                    calle3 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Calle</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (num_exterior3 == '' && cantidad_roomies ==
                    '2' ||
                    num_exterior3 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Número exterior</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (colonia3 == '' && cantidad_roomies ==
                    '2' ||
                    colonia3 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Colonia</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (delegacion_alcaldia3 == '' &&
                    cantidad_roomies ==
                    '2' ||
                    delegacion_alcaldia3 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Delegación/Alcaldía</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (estado3 == '' &&
                    cantidad_roomies ==
                    '2' ||
                    estado3 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Estado</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (code_postal3 == '' &&
                    cantidad_roomies ==
                    '2' ||
                    code_postal3 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Código postal</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion3 == '' &&
                    cantidad_roomies == '2' ||
                    documentacion3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Documentación</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion3 == '' &&
                    cantidad_roomies == '2' ||
                    documentacion3 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Documentación</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion3 ==
                    'Comprobantes de nómina timbrados SAT (3 últimos meses)' &&
                    cantidad_roomies == '2' && !comprobante_nomina3 ||
                    documentacion3 == 'Comprobantes de nómina timbrados SAT (3 últimos meses)' &&
                    cantidad_roomies == '3' && !comprobante_nomina3) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'Los campos "<b>Comprobantes de nómina</b>" del tercer roomie no pueden quedar vacíos',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion3 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '2' && !
                    estado_cuenta_roomie11 ||
                    documentacion3 == 'Estados de cuenta completos (3 meses)' && cantidad_roomies ==
                    '2' && !
                    estado_cuenta_roomie22 || documentacion3 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '2' && !
                    estado_cuenta_roomie33 || documentacion3 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie11 ||
                    documentacion3 == 'Estados de cuenta completos (3 meses)' && cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie22 || documentacion3 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie33) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'Los campos "<b>Estados de cuenta</b>" del tercer roomie no pueden quedar vacíos',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (
                    !historial_crediticio3 &&
                    cantidad_roomies == '2' && !historial_crediticio_no3 ||
                    !historial_crediticio3 &&
                    cantidad_roomies == '3' && !historial_crediticio_no3) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Historial crediticio</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (tarjeta3 == "" &&
                    cantidad_roomies == '2' && historial_crediticio3 ||
                    tarjeta3 == "" &&
                    cantidad_roomies == '3' && historial_crediticio3) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Últimos 4 dígitos de tu tarjeta</b>" del tercer roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                }
                // Validar roomie3 ___________________________________________
                else if (name4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Nombre</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (last_name4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Apellidos</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (identificacion_oficial4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Identificación oficial</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (email4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ups...',
                        html: 'El campo "<b>Email</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                }
                // else if (!validar_email(email4) == '' &&
                //     cantidad_roomies == '3') {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Ups...',
                //         text: 'Tu email no es valido, escribelo correctamente',
                //         confirmButtonText: 'Aceptar',
                //     });
                //     return false;
                // } 
                else if (phone4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Teléfono</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (phone4.length < 10 &&
                    cantidad_roomies == '3' || phone4.length > 20 &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El teléfono celular del cuarto roomie no es valido',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (fecha_nacimiento4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Fecha de nacimiento</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (rfc4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>RFC</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (calle4 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Calle</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (num_exterior4 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Número exterior</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (colonia4 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Colonia</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (delegacion_alcaldia4 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Delegación/Alcaldía</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (estado4 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Estado</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (code_postal4 == '' && cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Código postal</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion4 == '' &&
                    cantidad_roomies == '3') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Documentación</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion4 == documentacion4 ==
                    'Comprobantes de nómina timbrados SAT (3 últimos meses)' &&
                    cantidad_roomies == '3' && !comprobante_nomina4) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'Los campos "<b>Comprobantes de nómina</b>" del cuarto roomie no pueden quedar vacíos',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (documentacion4 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie111 ||
                    documentacion4 == 'Estados de cuenta completos (3 meses)' && cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie222 || documentacion4 == 'Estados de cuenta completos (3 meses)' &&
                    cantidad_roomies ==
                    '3' && !
                    estado_cuenta_roomie333) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'Los campos "<b>Estados de cuenta</b>" del cuarto roomie no pueden quedar vacíos',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (!historial_crediticio4 &&
                    cantidad_roomies == '3' && !historial_crediticio_no4) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Historial crediticio</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                } else if (tarjeta4 == "" &&
                    cantidad_roomies == '3' && historial_crediticio4) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Ups...',
                        html: 'El campo "<b>Últimos 4 dígitos de tu tarjeta</b>" del cuarto roomie no puede quedar vacío',
                        confirmButtonText: 'Aceptar',
                    });
                    return false;
                }
            }
            document.querySelector('.btn-loading').classList.add('d-none');
            document.querySelector('.loading-btn').classList.remove('d-none');
            if (cantidad_roomies == '1' || cantidad_roomies == '2' || cantidad_roomies == '3') {
                setTimeout(function() {
                    Livewire.emitTo('arendatario.roomies', 'registrarFormulario');
                }, 4000);
            } else {
                setTimeout(function() {
                    Livewire.emitTo('arendatario.roomies', 'registrarFormulario');
                }, 2000);
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
            }
        }
        const validarTarjeta2 = () => {
            const historial_crediticio2 = document.querySelector('#historial_crediticio2').checked;
            const historial_crediticio_no2 = document.querySelector('#historial_crediticio_no2').checked;
            if (historial_crediticio2) {
                const tarjeta = document.getElementsByClassName("tarjeta2");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.remove('d-none');
                }
            } else if (historial_crediticio_no2) {
                const tarjeta = document.getElementsByClassName("tarjeta2");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.add('d-none');
                }
            }
        }
        const validarTarjeta3 = () => {
            const historial_crediticio3 = document.querySelector('#historial_crediticio3').checked;
            const historial_crediticio_no3 = document.querySelector('#historial_crediticio_no3').checked;
            if (historial_crediticio3) {
                const tarjeta = document.getElementsByClassName("tarjeta3");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.remove('d-none');
                }
            } else if (historial_crediticio_no3) {
                const tarjeta = document.getElementsByClassName("tarjeta3");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.add('d-none');
                }
            }
        }
        const validarTarjeta4 = () => {
            const historial_crediticio4 = document.querySelector('#historial_crediticio4').checked;
            const historial_crediticio_no4 = document.querySelector('#historial_crediticio_no4').checked;
            if (historial_crediticio4) {
                const tarjeta = document.getElementsByClassName("tarjeta4");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.remove('d-none');
                }
            } else if (historial_crediticio_no4) {
                const tarjeta = document.getElementsByClassName("tarjeta4");
                for (let i = 0; i < tarjeta.length; i++) {
                    tarjeta[i].classList.add('d-none');
                }
            }
        }
        const tipoDocumentacion4 = () => {
            const documentacion = document.querySelector('#documentacion4').value;

            if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina4");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.remove('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta4");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.add('d-none');
                }

                document.querySelector('#estado_cuenta_roomie111').value = "";
                document.querySelector('#estado_cuenta_roomie222').value = "";
                document.querySelector('#estado_cuenta_roomie333').value = "";

                document.querySelector(`#file_estado_cuenta_roomie111`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta_roomie222`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta_roomie333`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

            } else if (documentacion == 'Estados de cuenta completos (3 meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina4");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.add('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta4");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.remove('d-none');
                }

                document.querySelector('#comprobante_nomina4').value = "";

                document.querySelector(`#file_comprobante_nomina4`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
            }
        }

        const tipoDocumentacion3 = () => {
            const documentacion = document.querySelector('#documentacion3').value;

            if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina3");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.remove('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta3");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.add('d-none');
                }

                document.querySelector('#estado_cuenta_roomie11').value = "";
                document.querySelector('#estado_cuenta_roomie22').value = "";
                document.querySelector('#estado_cuenta_roomie33').value = "";

                document.querySelector(`#file_estado_cuenta_roomie11`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta_roomie22`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta_roomie33`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

            } else if (documentacion == 'Estados de cuenta completos (3 meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina3");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.add('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta3");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.remove('d-none');
                }

                document.querySelector('#comprobante_nomina3').value = "";

                document.querySelector(`#file_comprobante_nomina3`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
            }
        }

        const tipoDocumentacion2 = () => {
            const documentacion = document.querySelector('#documentacion2').value;

            if (documentacion == 'Comprobantes de nómina timbrados SAT (3 últimos meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina2");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.remove('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta2");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.add('d-none');
                }

                document.querySelector('#estado_cuenta_roomie1').value = "";
                document.querySelector('#estado_cuenta_roomie2').value = "";
                document.querySelector('#estado_cuenta_roomie3').value = "";

                document.querySelector(`#file_estado_cuenta_roomie1`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta_roomie2`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_estado_cuenta_roomie3`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

            } else if (documentacion == 'Estados de cuenta completos (3 meses)') {
                const documentos_nomina = document.getElementsByClassName("comprobante-nomina2");
                for (let i = 0; i < documentos_nomina.length; i++) {
                    documentos_nomina[i].classList.add('d-none');
                }

                const estados_cuenta = document.getElementsByClassName("estados-cuenta2");
                for (let i = 0; i < estados_cuenta.length; i++) {
                    estados_cuenta[i].classList.remove('d-none');
                }

                document.querySelector('#comprobante_nomina2').value = "";

                document.querySelector(`#file_comprobante_nomina2`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
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
                    html: 'Tienes que seleccionar 6 archivos',
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

        const validarCantidadFiles2 = () => {
            const fileUpload = $("#comprobante_nomina2");

            if (parseInt(fileUpload.get(0).files.length) > 6 || parseInt(fileUpload.get(0).files.length) < 6) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Archivos incorrectos',
                    html: 'Tienes que seleccionar 6 archivos',
                    confirmButtonText: 'Aceptar',
                });
                document.querySelector('#comprobante_nomina2').value = "";
                document.querySelector(`#file_comprobante_nomina2`).innerHTML =
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
                        document.querySelector('#comprobante_nomina2').value = "";
                        document.querySelector(`#file_comprobante_nomina2`).innerHTML =
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
                            document.querySelector('#file_comprobante_nomina2').innerHTML = '6 archivos seleccionados';
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Formato incorrecto',
                                html: `El archivo ${fileName} no tiene un formato valido. <br/>Formatos validos ( .jpg | .jpeg | .png | .pdf)`,
                                confirmButtonText: 'Aceptar',
                            });

                            document.querySelector('#comprobante_nomina2').value = "";
                            document.querySelector(`#file_comprobante_nomina2`).innerHTML =
                                '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
                        }
                    }
                }
            }
        }

        const validarCantidadFiles3 = () => {
            const fileUpload = $("#comprobante_nomina3");

            if (parseInt(fileUpload.get(0).files.length) > 6 || parseInt(fileUpload.get(0).files.length) < 6) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Archivos incorrectos',
                    html: 'Tienes que seleccionar 6 archivos',
                    confirmButtonText: 'Aceptar',
                });
                document.querySelector('#comprobante_nomina3').value = "";
                document.querySelector(`#file_comprobante_nomina3`).innerHTML =
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
                        document.querySelector('#comprobante_nomina3').value = "";
                        document.querySelector(`#file_comprobante_nomina3`).innerHTML =
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
                            document.querySelector('#file_comprobante_nomina3').innerHTML = '6 archivos seleccionados';
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Formato incorrecto',
                                html: `El archivo ${fileName} no tiene un formato valido. <br/>Formatos validos ( .jpg | .jpeg | .png | .pdf)`,
                                confirmButtonText: 'Aceptar',
                            });

                            document.querySelector('#comprobante_nomina3').value = "";
                            document.querySelector(`#file_comprobante_nomina3`).innerHTML =
                                '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
                        }
                    }
                }
            }
        }

        const validarCantidadFiles4 = () => {
            const fileUpload = $("#comprobante_nomina4");

            if (parseInt(fileUpload.get(0).files.length) > 6 || parseInt(fileUpload.get(0).files.length) < 6) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Archivos incorrectos',
                    html: 'Tienes que seleccionar 6 archivos',
                    confirmButtonText: 'Aceptar',
                });
                document.querySelector('#comprobante_nomina4').value = "";
                document.querySelector(`#file_comprobante_nomina4`).innerHTML =
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
                        document.querySelector('#comprobante_nomina4').value = "";
                        document.querySelector(`#file_comprobante_nomina4`).innerHTML =
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
                            document.querySelector('#file_comprobante_nomina4').innerHTML = '6 archivos seleccionados';
                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Formato incorrecto',
                                html: `El archivo ${fileName} no tiene un formato valido. <br/>Formatos validos ( .jpg | .jpeg | .png | .pdf)`,
                                confirmButtonText: 'Aceptar',
                            });

                            document.querySelector('#comprobante_nomina4').value = "";
                            document.querySelector(`#file_comprobante_nomina4`).innerHTML =
                                '<i class="far fa-file-pdf "></i> Da click aquí para subir tus archivos';
                        }
                    }
                }
            }
        }

        const compartiraRenta = () => {
            const compartira_renta1 = document.querySelector('#compartira_renta1').checked;
            const compartira_renta2 = document.querySelector('#compartira_renta2').checked;

            if (compartira_renta1) {
                const roomies = document.getElementsByClassName("ocultar-roomie");
                for (let i = 0; i < roomies.length; i++) {
                    roomies[i].classList.remove('d-none');
                }
            } else if (compartira_renta2) {
                const roomies = document.getElementsByClassName("ocultar-roomie");
                for (let i = 0; i < roomies.length; i++) {
                    roomies[i].classList.add('d-none');
                }

                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.add('d-none');
                }
                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.add('d-none');
                }
                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.add('d-none');
                }

            }

        }

        const validarCantidadRoomies = () => {
            const cantidad_roomies = document.querySelector('#cantidad_roomies').value;
            if (cantidad_roomies == '1') {
                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.remove('d-none');
                }
                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.add('d-none');
                }
                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.add('d-none');
                }
            } else if (cantidad_roomies == '2') {
                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.remove('d-none');
                }
                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.remove('d-none');
                }
                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.add('d-none');
                }
            } else if (cantidad_roomies == '3') {
                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.remove('d-none');
                }

                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.remove('d-none');
                }
                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.remove('d-none');
                }
            } else {
                const roomie1 = document.getElementsByClassName("roomie1");
                for (let i = 0; i < roomie1.length; i++) {
                    roomie1[i].classList.add('d-none');
                }

                const roomie2 = document.getElementsByClassName("roomie2");
                for (let i = 0; i < roomie2.length; i++) {
                    roomie2[i].classList.add('d-none');
                }

                const roomie3 = document.getElementsByClassName("roomie3");
                for (let i = 0; i < roomie3.length; i++) {
                    roomie3[i].classList.add('d-none');
                }
            }
        }

        const documentos_nomina = document.getElementsByClassName("comprobante-nomina");
        for (let i = 0; i < documentos_nomina.length; i++) {
            documentos_nomina[i].classList.add('d-none');
        }

        const documentos_nomina2 = document.getElementsByClassName("comprobante-nomina2");
        for (let i = 0; i < documentos_nomina2.length; i++) {
            documentos_nomina2[i].classList.add('d-none');
        }

        const documentos_nomina3 = document.getElementsByClassName("comprobante-nomina3");
        for (let i = 0; i < documentos_nomina3.length; i++) {
            documentos_nomina3[i].classList.add('d-none');
        }

        const documentos_nomina4 = document.getElementsByClassName("comprobante-nomina4");
        for (let i = 0; i < documentos_nomina4.length; i++) {
            documentos_nomina4[i].classList.add('d-none');
        }

        const estados_cuenta = document.getElementsByClassName("estados-cuenta");
        for (let i = 0; i < estados_cuenta.length; i++) {
            estados_cuenta[i].classList.add('d-none');
        }

        const estados_cuenta2 = document.getElementsByClassName("estados-cuenta2");
        for (let i = 0; i < estados_cuenta2.length; i++) {
            estados_cuenta2[i].classList.add('d-none');
        }

        const estados_cuenta3 = document.getElementsByClassName("estados-cuenta3");
        for (let i = 0; i < estados_cuenta3.length; i++) {
            estados_cuenta3[i].classList.add('d-none');
        }

        const estados_cuenta4 = document.getElementsByClassName("estados-cuenta4");
        for (let i = 0; i < estados_cuenta4.length; i++) {
            estados_cuenta4[i].classList.add('d-none');
        }

        const roomie1 = document.getElementsByClassName("roomie1");
        for (let i = 0; i < roomie1.length; i++) {
            roomie1[i].classList.add('d-none');
        }

        const roomie2 = document.getElementsByClassName("roomie2");
        for (let i = 0; i < roomie2.length; i++) {
            roomie2[i].classList.add('d-none');
        }

        const roomie3 = document.getElementsByClassName("roomie3");
        for (let i = 0; i < roomie3.length; i++) {
            roomie3[i].classList.add('d-none');
        }
    </script>

    @push('script')
        <script>
            Livewire.on('errorDocumentosRoomies', function() {
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
