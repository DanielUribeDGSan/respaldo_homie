<div x-data class="mt-3" wire:ignore>
    <form onsubmit="return datosPersonales(event)">
        <div class="form-group row">
            <div class="col-12 mt-4">
                <p class="fw-100 text-orange">Datos del inmueble</p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="calle" class="col-form-label fw-100"><span class="fw-600 bold-ft">Calle</span></label>
                <input type="text" class="form-input" id="calle" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.calle" autocomplete="off" placeholder="Nombre de la calle">
                @if ($errors->has('createForm.calle'))
                    <span>{{ $errors->first('createForm.calle') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="num_exterior" class="col-form-label fw-100"><span class="fw-600 bold-ft">Número
                        exterior</span></label>
                <input type="text" class="form-input" id="num_exterior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_exterior" autocomplete="off"
                    placeholder="Ingresa el número exterior">
                @if ($errors->has('createForm.num_exterior'))
                    <span>{{ $errors->first('createForm.num_exterior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="num_interior" class="col-form-label fw-100"><span class="fw-600 bold-ft">Número
                        interior</span></label>
                <input type="text" class="form-input" id="num_interior" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.num_interior" autocomplete="off"
                    placeholder="Ingresa el número interior">
                @if ($errors->has('createForm.num_interior'))
                    <span>{{ $errors->first('createForm.num_interior') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="colonia" class="col-form-label fw-100"><span class="fw-600 bold-ft">Colonia</span></label>
                <input type="text" class="form-input" id="colonia" onkeyup="onlyLetrasNum(this)" maxlength="255"
                    wire:model.defer="createForm.colonia" autocomplete="off" placeholder="Nombre de la colonia">
                @if ($errors->has('createForm.colonia'))
                    <span>{{ $errors->first('createForm.colonia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="delegacion_alcaldia" class="col-form-label fw-100"><span class="fw-600 bold-ft">Delegación /
                        Alcaldía / Municipio</span></label>
                <input type="text" class="form-input" id="delegacion_alcaldia" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.delegacion_alcaldia" autocomplete="off"
                    placeholder="Ingresa el nombre de la delegación o municipio">
                @if ($errors->has('createForm.delegacion_alcaldia'))
                    <span>{{ $errors->first('createForm.delegacion_alcaldia') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="estado" class="col-form-label fw-100"><span class="fw-600 bold-ft">Estado</span></label>
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
                <label for="code_postal" class="col-form-label fw-100"><span class="fw-600 bold-ft">Código
                        postal</span></label>
                <input type="text" class="form-input" id="code_postal" onkeyup="onlyNum(this)" maxlength="5"
                    wire:model.defer="createForm.code_postal" autocomplete="off" placeholder="Ingresa el código postal">
                @if ($errors->has('createForm.code_postal'))
                    <span>{{ $errors->first('createForm.code_postal') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100"><span class="fw-600 bold-ft">¿Tiene
                        estacionamiento?</span></label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tiene_estacionamiento"
                        id="tiene_estacionamiento1" value="Si" wire:model.defer="createForm.tiene_estacionamiento"
                        onchange="cantidadEstacionamiento()">
                    <label class="form-check-label" for="tiene_estacionamiento1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="tiene_estacionamiento"
                        id="tiene_estacionamiento2" value="No" wire:model.defer="createForm.tiene_estacionamiento"
                        onchange="cantidadEstacionamiento()">
                    <label class="form-check-label" for="tiene_estacionamiento2">No</label>
                </div>
                @if ($errors->has('createForm.tiene_estacionamiento'))
                    <span>{{ $errors->first('createForm.tiene_estacionamiento') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none cantidad-estacionamiento">
                <label for="cantidad_estacionamiento" class="col-form-label fw-100"><span
                        class="fw-600 bold-ft">Espacios de
                        estacionamiento</span></label>
                <input type="text" class="form-input" name="cantidad_estacionamiento" id="cantidad_estacionamiento"
                    onkeyup="onlyNum(this)" maxlength="255" wire:model.defer="createForm.cantidad_estacionamiento"
                    autocomplete="off" placeholder="Ingresa el número de espacios del estacionamiento">
                @if ($errors->has('createForm.cantidad_estacionamiento'))
                    <span>{{ $errors->first('createForm.cantidad_estacionamiento') }}</span>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100"><span class="fw-600 bold-ft">¿Se encuentra
                        amueblado?</span></label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="esta_amueblado" id="esta_amueblado1" value="Si"
                        wire:model.defer="createForm.esta_amueblado">
                    <label class="form-check-label" for="esta_amueblado1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="esta_amueblado" id="esta_amueblado2" value="No"
                        wire:model.defer="createForm.esta_amueblado">
                    <label class="form-check-label" for="esta_amueblado2">No</label>
                </div>
                @if ($errors->has('createForm.esta_amueblado'))
                    <span>{{ $errors->first('createForm.esta_amueblado') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100"><span class="fw-600 bold-ft">¿Admite mascotas?</span></label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="admite_mascotas" id="admite_mascotas1" value="Si"
                        wire:model.defer="createForm.admite_mascotas" onchange="cantidadMascotas()">
                    <label class="form-check-label" for="admite_mascotas1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="admite_mascotas" id="admite_mascotas2" value="No"
                        wire:model.defer="createForm.admite_mascotas" onchange="cantidadMascotas()">
                    <label class="form-check-label" for="admite_mascotas2">No</label>
                </div>
                @if ($errors->has('createForm.admite_mascotas'))
                    <span>{{ $errors->first('createForm.admite_mascotas') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none cantidad-mascotas">
                <label for="cantidad_mascotas" class="col-form-label fw-100"><span class="fw-600 bold-ft">Cantidad de
                        mascotas permitidas</span></label>
                <input type="text" class="form-input" name="cantidad_mascotas" id="cantidad_mascotas"
                    onkeyup="onlyNum(this)" maxlength="255" wire:model.defer="createForm.cantidad_mascotas"
                    autocomplete="off" placeholder="Ingresa el número de mascotas permitidas">
                @if ($errors->has('createForm.cantidad_mascotas'))
                    <span>{{ $errors->first('createForm.cantidad_mascotas') }}</span>
                @endif
            </div>


            <div class="col-12 mt-5">
                <p class="fw-100 text-orange">Contrato, comisión y pagos</p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 ">
                <label for="fecha_contrato" class="col-form-label fw-100"><span class="fw-600 bold-ft">Fecha de inicio
                        de contrato</span></label>
                <input type="date" class="form-input" name="fecha_contrato" id="fecha_contrato" maxlength="255"
                    wire:model.defer="createForm.fecha_contrato" autocomplete="off">
                @if ($errors->has('createForm.fecha_contrato'))
                    <span>{{ $errors->first('createForm.fecha_contrato') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="plazo_contrato" class="col-form-label fw-100"><span class="fw-600 bold-ft">Plazo del
                        contrato</span></label>
                <select class="form-input" name="plazo_contrato" id="plazo_contrato"
                    wire:model.defer="createForm.plazo_contrato">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="12 meses">12 meses</option>
                    <option value="24 meses">24 meses</option>
                </select>
                @if ($errors->has('createForm.plazo_contrato'))
                    <span>{{ $errors->first('createForm.plazo_contrato') }}</span>
                @endif
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-4">
                <p class="ft-small-p">Nosotros nos podemos encargar de dividir el pago de la primera renta entre
                    propietario y asesor. Indicanos qué porcentaje le corresponde al asesor y le realizaremos el
                    depósito por medio de una cuenta de Sr. Pago.</p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="comision_broker" class="col-form-label fw-100"><span class="fw-600 bold-ft">Comisión de la
                        primera renta al asesor</span></label>
                <select class="form-input" name="comision_broker" id="comision_broker"
                    wire:model.defer="createForm.comision_broker">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="0%">0%</option>
                    <option value="25%">25%</option>
                    <option value="50%">50%</option>
                    <option value="75%">75%</option>
                    <option value="100%">100%</option>
                </select>
                @if ($errors->has('createForm.comision_broker'))
                    <span>{{ $errors->first('createForm.comision_broker') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="metodo_pago" class="col-form-label fw-100"><span class="fw-600 bold-ft">Método de pago -
                        Cómo va a recibir el pago</span></label>
                <select class="form-input" id="metodo_pago" onchange="solicitarNumeroCuenta()"
                    wire:model.defer="createForm.metodo_pago">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Sr Pago">Sr Pago</option>
                    <option value="Transferencia bancaria">Transferencia bancaria</option>
                </select>
                @if ($errors->has('createForm.metodo_pago'))
                    <span>{{ $errors->first('createForm.metodo_pago') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none numero_cuenta">
                <label for="numero_cuenta" class="col-form-label fw-100"><span class="fw-600 bold-ft">Número de
                        cuenta</span></label>
                <input type="text" class="form-input" id="numero_cuenta" onkeyup="onlyLetrasNum(this)"
                    maxlength="255" wire:model.defer="createForm.numero_cuenta" autocomplete="off"
                    placeholder="Número de cuenta">
                @if ($errors->has('createForm.numero_cuenta'))
                    <span>{{ $errors->first('createForm.numero_cuenta') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="precio" class="col-form-label fw-100"><span class="fw-600 bold-ft">Monto de renta
                        mensual</span></label>
                <input type="text" class="form-input" id="precio" onkeyup="onlyNumPrecio(this)" maxlength="255"
                    wire:model.defer="createForm.precio" autocomplete="off" placeholder="$0 MXN">
                @if ($errors->has('createForm.precio'))
                    <span>{{ $errors->first('createForm.precio') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="mantenimiento_mensual" class="col-form-label fw-100"><span class="fw-600 bold-ft">Monto del
                        mantenimiento
                        mensual</span></label>
                <input type="text" class="form-input" id="mantenimiento_mensual" onkeyup="onlyNumPrecio(this)"
                    maxlength="255" wire:model.defer="createForm.mantenimiento_mensual" autocomplete="off"
                    placeholder="$0 MXN">
                @if ($errors->has('createForm.mantenimiento_mensual'))
                    <span>{{ $errors->first('createForm.mantenimiento_mensual') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="servicios" class="col-form-label fw-100"><span
                        class="fw-600 bold-ft">Servicios</span></label>
                <select class="form-input" name="servicios" id="servicios" wire:model.defer="createForm.servicios">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Si">Incluido en el precio de renta</option>
                    <option value="No">No incluido en el precio de renta</option>
                </select>
                @if ($errors->has('createForm.servicios'))
                    <span>{{ $errors->first('createForm.servicios') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100"><span class="fw-600 bold-ft">¿El propietario puede
                        facturar?</span></label><br />
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="puede_facturar" id="puede_facturar1" value="Si"
                        wire:model.defer="createForm.puede_facturar">
                    <label class="form-check-label" for="puede_facturar1">Si</label>
                </div>
                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="radio" name="puede_facturar" id="puede_facturar2" value="No"
                        wire:model.defer="createForm.puede_facturar">
                    <label class="form-check-label" for="puede_facturar2">No</label>
                </div>
                @if ($errors->has('createForm.puede_facturar'))
                    <span>{{ $errors->first('createForm.puede_facturar') }}</span>
                @endif
            </div>


            <div class="col-12 mt-5">
                <p class="fw-100 text-orange">Documentación del propietario y del inmueble</p>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">
                    @if (Auth::user()->type == 'broker')
                        <span class="fw-600 bold-ft">
                            Identificación oficial del propietario
                        </span><br />
                        Puede ser INE, pasaporte o cédula profesional
                    @else
                        <span class="fw-600 bold-ft">
                            Identificación oficial
                        </span><br />
                        Puede ser INE, pasaporte o cédula profesional
                    @endif
                </label>

                <div class="identificacion_subida">
                    <a href="{{ $createForm['identificacion_oficial'] }}" target="_blank"><label
                            for="identificacion_oficial_subida" class="form-input-file text-center"
                            id="file_identificacion_oficial_subida">
                            <i class="far fa-file-pdf"></i> Ver mi
                            archivo subido</label></a>
                    <a class="text-center mt-1 d-block" onclick="subirIdentificaion()">Cambiar archivo</a>
                </div>
                <div class="identificacion_no_subida">
                    <input type="file" accept="image/*,.pdf" class="form-file" name="identificacion_oficial"
                        id="identificacion_oficial" wire:model="identificacion_oficial">
                    <label for="identificacion_oficial" class="form-input-file text-center"
                        id="file_identificacion_oficial">
                        <i class="far fa-file-pdf"></i> Da click aquí
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
                @if ($createForm['identificacion_oficial'])
                    <script>
                        document.querySelector('.identificacion_no_subida').classList.add('d-none');
                    </script>
                @else
                    <script>
                        document.querySelector('.identificacion_subida').classList.add('d-none');
                    </script>
                @endif
                <script>
                    const subirIdentificaion = () => {
                        Swal.fire({
                            title: '¿Estas seguro(a) de que quieres cambiar el archivo que anteriormente habías subido?',
                            html: `<img class="img-fluid" src="{{ $createForm['identificacion_oficial'] }}" />`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, quiero cambiarlo',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('.identificacion_no_subida').classList.remove('d-none');
                                document.querySelector('.identificacion_subida').classList.add('d-none');
                            }
                        })


                    }
                </script>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label class="col-form-label fw-100">

                    <span class="fw-600 bold-ft">
                        Comprobante de domicilio
                    </span><br />
                    Agua, teléfono o cualquier servicio del inmueble

                </label>

                <div class="comprobante_subido">
                    <a href="{{ $createForm['comprobante_domicilio'] }}" target="_blank"><label
                            for="comprobante_subido" class="form-input-file text-center" id="file_comprobante_subido">
                            <i class="far fa-file-pdf"></i> Ver mi
                            archivo subido</label></a>
                    <a class="text-center mt-1 d-block" onclick="subirComprobante()">Cambiar archivo</a>
                </div>

                <div class="comprobante_no_subido">
                    <input type="file" accept="image/*,.pdf" class="form-file" name="comprobante_domicilio"
                        id="comprobante_domicilio" wire:model="comprobante_domicilio">
                    <label for="comprobante_domicilio" class="form-input-file text-center"
                        id="file_comprobante_domicilio"><i class="far fa-file-pdf"></i> Da click aquí
                        para
                        subir
                        tu archivo</label>
                    @if ($errors->has('comprobante_domicilio'))
                        <span>{{ $errors->first('comprobante_domicilio') }}</span>
                    @endif
                    <div wire:loading wire:target="comprobante_domicilio">
                        <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                    </div>
                </div>

                @if ($createForm['comprobante_domicilio'])
                    <script>
                        document.querySelector('.comprobante_no_subido').classList.add('d-none');
                    </script>
                @else
                    <script>
                        document.querySelector('.comprobante_subido').classList.add('d-none');
                    </script>
                @endif
                <script>
                    const subirComprobante = () => {
                        Swal.fire({
                            title: '¿Estas seguro(a) de que quieres cambiar el archivo que anteriormente habías subido?',
                            html: `<img class="img-fluid" src="{{ $createForm['comprobante_domicilio'] }}" />`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, quiero cambiarlo',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('.comprobante_no_subido').classList.remove('d-none');
                                document.querySelector('.comprobante_subido').classList.add('d-none');
                            }
                        })


                    }
                </script>
            </div>

            <div class="col-lg-6 col-md-6 col-12 mt-3">
                <label for="titulo_propiedad" class="col-form-label fw-100"><span class="fw-600 bold-ft">Título de la
                        propiedad</span></label>
                <select class="form-input" name="titulo_propiedad" id="titulo_propiedad"
                    wire:model.defer="createForm.titulo_propiedad" onchange="tituloPropiedad()">
                    <option value="" selected disabled>Selecciona una opción</option>
                    <option value="Primeras 5 hojas de las escrituras">Primeras 5 hojas de las escrituras</option>
                    <option value="Contrato de compra-venta">Contrato de compra-venta</option>
                    <option value="Poder notarial">Poder notarial</option>
                </select>
                @if ($errors->has('createForm.titulo_propiedad'))
                    <span>{{ $errors->first('createForm.titulo_propiedad') }}</span>
                @endif
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none escrituras">
                <label class="col-form-label fw-100"><span class="fw-600 bold-ft">Primeras 5 hojas de las
                        escrituras</span></label>

                <div class="escrituras_subida">
                    <a href="{{ $createForm['escrituras'] }}" target="_blank"><label for="escrituras_subido"
                            class="form-input-file text-center" id="file_escrituras_subido">
                            <i class="far fa-file-pdf"></i> Ver mi
                            archivo subido</label></a>
                    <a class="text-center mt-1 d-block" onclick="subirEscrituras()">Cambiar archivo</a>
                </div>
                <div class="escrituras_no_subida">
                    <input type="file" accept="image/*,.pdf" class="form-file" name="escrituras" id="escrituras"
                        wire:model="escrituras">
                    <label for="escrituras" class="form-input-file text-center" id="file_escrituras"><i
                            class="far fa-file-pdf"></i> Da click aquí
                        para
                        subir
                        tu archivo</label>
                    @if ($errors->has('escrituras'))
                        <span>{{ $errors->first('escrituras') }}</span>
                    @endif
                    <div wire:loading wire:target="escrituras">
                        <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                    </div>
                </div>

                @if ($createForm['escrituras'])
                    <script>
                        document.querySelector('.escrituras_no_subida').classList.add('d-none');
                    </script>
                @else
                    <script>
                        document.querySelector('.escrituras_subida').classList.add('d-none');
                    </script>
                @endif
                <script>
                    const subirEscrituras = () => {
                        Swal.fire({
                            title: '¿Estas seguro(a) de que quieres cambiar el archivo que anteriormente habías subido?',
                            html: `<img class="img-fluid" src="{{ $createForm['escrituras'] }}" />`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, quiero cambiarlo',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('.escrituras_no_subida').classList.remove('d-none');
                                document.querySelector('.escrituras_subida').classList.add('d-none');
                            }
                        })


                    }
                </script>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none contrato_compraventa">
                <label class="col-form-label fw-100"><span class="fw-600 bold-ft">Contrato de
                        compra-venta</span></label>
                <div class="compra_venta_subida">
                    <a href="{{ $createForm['contrato_compraventa'] }}" target="_blank"><label
                            for="compra_venta_subido" class="form-input-file text-center"
                            id="file_compra_venta_subido">
                            <i class="far fa-file-pdf"></i> Ver mi
                            archivo subido</label></a>
                    <a class="text-center mt-1 d-block" onclick="subirCompraVenta()">Cambiar archivo</a>
                </div>
                <div class="compra_venta_no_subida">
                    <input type="file" accept="image/*,.pdf" class="form-file" name="contrato_compraventa"
                        id="contrato_compraventa" wire:model="contrato_compraventa">
                    <label for="contrato_compraventa" class="form-input-file text-center"
                        id="file_contrato_compraventa"><i class="far fa-file-pdf"></i> Da click aquí
                        para
                        subir
                        tu archivo</label>
                    @if ($errors->has('contrato_compraventa'))
                        <span>{{ $errors->first('contrato_compraventa') }}</span>
                    @endif
                    <div wire:loading wire:target="contrato_compraventa">
                        <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                    </div>
                </div>

                @if ($createForm['contrato_compraventa'])
                    <script>
                        document.querySelector('.compra_venta_no_subida').classList.add('d-none');
                    </script>
                @else
                    <script>
                        document.querySelector('.compra_venta_subida').classList.add('d-none');
                    </script>
                @endif
                <script>
                    const subirCompraVenta = () => {
                        Swal.fire({
                            title: '¿Estas seguro(a) de que quieres cambiar el archivo que anteriormente habías subido?',
                            html: `<img class="img-fluid" src="{{ $createForm['contrato_compraventa'] }}" />`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, quiero cambiarlo',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('.compra_venta_no_subida').classList.remove('d-none');
                                document.querySelector('.compra_venta_subida').classList.add('d-none');
                            }
                        })


                    }
                </script>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mt-3 d-none poder_notarial">
                <label class="col-form-label fw-100"><span class="fw-600 bold-ft">Poder notarial</span></label>

                <div class="poder_notarial_subido">
                    <a href="{{ $createForm['poder_notarial'] }}" target="_blank"><label for="poder_notarial_subido"
                            class="form-input-file text-center" id="file_poder_notarial_subido">
                            <i class="far fa-file-pdf"></i> Ver mi
                            archivo subido</label></a>
                    <a class="text-center mt-1 d-block" onclick="subirPoderNotarial()">Cambiar archivo</a>
                </div>
                <div class="poder_notarial_no_subido">

                    <input type="file" accept="image/*,.pdf" class="form-file" name="poder_notarial"
                        id="poder_notarial" wire:model="poder_notarial">
                    <label for="poder_notarial" class="form-input-file text-center" id="file_poder_notarial"><i
                            class="far fa-file-pdf"></i> Da click aquí
                        para
                        subir
                        tu archivo</label>
                    @if ($errors->has('poder_notarial'))
                        <span>{{ $errors->first('poder_notarial') }}</span>
                    @endif
                    <div wire:loading wire:target="poder_notarial">
                        <label class="parpadea">Subiendo el archivo, espera un momento...</label>
                    </div>
                </div>
                @if ($createForm['poder_notarial'])
                    <script>
                        document.querySelector('.poder_notarial_no_subido').classList.add('d-none');
                    </script>
                @else
                    <script>
                        document.querySelector('.poder_notarial_subido').classList.add('d-none');
                    </script>
                @endif
                <script>
                    const subirPoderNotarial = () => {
                        Swal.fire({
                            title: '¿Estas seguro(a) de que quieres cambiar el archivo que anteriormente habías subido?',
                            html: `<img class="img-fluid" src="{{ $createForm['poder_notarial'] }}" />`,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, quiero cambiarlo',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                document.querySelector('.poder_notarial_no_subido').classList.remove('d-none');
                                document.querySelector('.poder_notarial_subido').classList.add('d-none');
                            }
                        })


                    }
                </script>
            </div>
            <div class="col-lg-12 col-md-12 col-12 mt-4">

                <div class="form-check form-check-inline mt-2">
                    <input class="form-check-input" type="checkbox" name="terminos" id="terminos"
                        value="Tengo tarjeta de crédito" wire:model.defer="createForm.terminos">
                    <label class="form-check-label" for="terminos">Acepto los <a class="underline"
                            href="{{ route('home') . '/T&C.pdf' }}" target="_blank">Términos y
                            Condiciones</a></label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-12 mt-5">
                <button type="submit" class="btn btn-orange-sm btn-loading">Registrar datos</button>
                <div class="loading-btn d-none">
                    <x-loading />
                </div>
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


        // asignar valores


        if (readCookie("propietario_estacionamiento_pregunta")) {
            if (readCookie("propietario_estacionamiento_pregunta") == "Si") {
                document.querySelector('.cantidad-estacionamiento').classList.remove('d-none');
            }
        }

        if (readCookie("propietario_admite_mascotas")) {
            if (readCookie("propietario_admite_mascotas") == "Si") {
                document.querySelector('.cantidad-mascotas').classList.remove('d-none');
            }
        }

        if (readCookie("propietario_metodo_pago")) {
            if (readCookie("propietario_metodo_pago") == "Transferencia bancaria") {
                document.querySelector('.numero_cuenta').classList.remove('d-none');
            }
        }

        if (readCookie("propietario_titulo_propiedad")) {

            const escrituras = document.querySelector('.escrituras');
            const contrato_compraventa = document.querySelector('.contrato_compraventa');
            const poder_notarial = document.querySelector('.poder_notarial');

            if (readCookie("propietario_titulo_propiedad") == 'Primeras 5 hojas de las escrituras') {
                contrato_compraventa.classList.add('d-none');
                poder_notarial.classList.add('d-none');
                escrituras.classList.remove('d-none');

                document.querySelector('#poder_notarial').value = "";
                document.querySelector('#contrato_compraventa').value = "";

                document.querySelector(`#file_poder_notarial`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_contrato_compraventa`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

            } else if (readCookie("propietario_titulo_propiedad") == 'Contrato de compra-venta') {
                contrato_compraventa.classList.remove('d-none');
                poder_notarial.classList.add('d-none');
                escrituras.classList.add('d-none');

                document.querySelector('#poder_notarial').value = "";
                document.querySelector('#escrituras').value = "";

                document.querySelector(`#file_poder_notarial`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_escrituras`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';


            } else if (readCookie("propietario_titulo_propiedad") == 'Poder notarial') {
                contrato_compraventa.classList.add('d-none');
                poder_notarial.classList.remove('d-none');
                escrituras.classList.add('d-none');

                document.querySelector('#escrituras').value = "";
                document.querySelector('#contrato_compraventa').value = "";

                document.querySelector(`#file_contrato_compraventa`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_escrituras`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
            }
        }



        // Crear cookies

        $('#calle').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_calle=" + encodeURIComponent($('#calle').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#num_exterior').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_num_exterior=" + encodeURIComponent($('#num_exterior').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#num_interior').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_num_interior=" + encodeURIComponent($('#num_interior').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#colonia').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_colonia=" + encodeURIComponent($('#colonia').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#delegacion_alcaldia').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_delegacion_alcaldia=" + encodeURIComponent($('#delegacion_alcaldia')
                    .val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#estado').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_estado=" + encodeURIComponent($('#estado').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#code_postal').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_code_postal=" + encodeURIComponent($('#code_postal').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#tiene_estacionamiento1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_estacionamiento_pregunta=" + encodeURIComponent($(
                    '#tiene_estacionamiento1').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#tiene_estacionamiento2').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_estacionamiento_pregunta=" + encodeURIComponent($(
                    '#tiene_estacionamiento2').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#cantidad_estacionamiento').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_cantidad_estacionamiento=" + encodeURIComponent($(
                    '#cantidad_estacionamiento').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#esta_amueblado1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_esta_amueblado=" + encodeURIComponent($('#esta_amueblado1').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#esta_amueblado2').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_esta_amueblado=" + encodeURIComponent($('#esta_amueblado2').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#admite_mascotas1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_admite_mascotas=" + encodeURIComponent($('#admite_mascotas1').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#admite_mascotas2').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_admite_mascotas=" + encodeURIComponent($('#admite_mascotas2').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#cantidad_mascotas').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_cantidad_mascotas=" + encodeURIComponent($('#cantidad_mascotas').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#fecha_contrato').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_fecha_contrato=" + encodeURIComponent($('#fecha_contrato').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#plazo_contrato').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_plazo_contrato=" + encodeURIComponent($('#plazo_contrato').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#comision_broker').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_comision_broker=" + encodeURIComponent($('#comision_broker').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#metodo_pago').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_metodo_pago=" + encodeURIComponent($('#metodo_pago').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#numero_cuenta').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_numero_cuenta=" + encodeURIComponent($('#numero_cuenta').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#precio').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_precio=" + encodeURIComponent($('#precio').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#mantenimiento_mensual').keyup(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_mantenimiento_mensual=" + encodeURIComponent($('#mantenimiento_mensual')
                    .val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#servicios').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_servicios=" + encodeURIComponent($('#servicios').val()) + "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#puede_facturar1').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_puede_facturar=" + encodeURIComponent($('#puede_facturar1').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#puede_facturar2').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_puede_facturar=" + encodeURIComponent($('#puede_facturar2').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
        $('#titulo_propiedad').change(function(e) {

            const expiresdate = new Date(2068, 1, 02, 11, 20);
            const cookievalue = e;
            document.cookie = "propietario_titulo_propiedad=" + encodeURIComponent($('#titulo_propiedad').val()) +
                "; expires=" +
                expiresdate
                .toUTCString();
        });
    </script>
    <script>
        const datosPersonales = (e) => {
            e.preventDefault();

            const fecha_contrato = document.querySelector('#fecha_contrato').value;
            const plazo_contrato = document.querySelector('#plazo_contrato').value;
            const comision_broker = document.querySelector('#comision_broker').value;
            const titulo_propiedad = document.querySelector('#titulo_propiedad').value;
            const escrituras = document.querySelector('#escrituras').value;
            const contrato_compraventa = document.querySelector('#contrato_compraventa').value;
            const poder_notarial = document.querySelector('#poder_notarial').value;
            const comprobante_domicilio = document.querySelector('#comprobante_domicilio').value;
            const admite_mascotas1 = document.querySelector('#admite_mascotas1').checked;
            const admite_mascotas2 = document.querySelector('#admite_mascotas2').checked;
            const cantidad_mascotas = document.querySelector('#cantidad_mascotas').value;
            const tiene_estacionamiento1 = document.querySelector('#tiene_estacionamiento1').checked;
            const tiene_estacionamiento2 = document.querySelector('#tiene_estacionamiento2').checked;
            const cantidad_estacionamiento = document.querySelector('#cantidad_estacionamiento').value;
            const servicios = document.querySelector('#servicios').value;
            const esta_amueblado1 = document.querySelector('#esta_amueblado1').checked;
            const esta_amueblado2 = document.querySelector('#esta_amueblado2').checked;
            const identificacion_oficial = document.querySelector('#identificacion_oficial').value;
            const metodo_pago = document.querySelector('#metodo_pago').value;
            const numero_cuenta = document.querySelector('#numero_cuenta').value;
            const puede_facturar1 = document.querySelector('#puede_facturar1').checked;
            const puede_facturar2 = document.querySelector('#puede_facturar2').checked;
            const precio = document.querySelector('#precio').value;
            const mantenimiento_mensual = document.querySelector('#mantenimiento_mensual').value;
            const calle = document.querySelector('#calle').value;
            const num_exterior = document.querySelector('#num_exterior').value;
            const num_interior = document.querySelector('#num_interior').value;
            const colonia = document.querySelector('#colonia').value;
            const delegacion_alcaldia = document.querySelector('#delegacion_alcaldia').value;
            const estado = document.querySelector('#estado').value;
            const code_postal = document.querySelector('#code_postal').value;
            const terminos = document.querySelector('#terminos').checked;


            if (calle == '') {
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
            } else if (!tiene_estacionamiento1 && !tiene_estacionamiento2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Tiene estacionamiento?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (tiene_estacionamiento1 && cantidad_estacionamiento == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Cantidad de espacios del estacionamiento</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!esta_amueblado1 && !esta_amueblado2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Se encuentra amueblado?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!admite_mascotas1 && !admite_mascotas2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿Admite mascotas?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (admite_mascotas1 && cantidad_mascotas == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Cantidad de mascotas admitidas</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (fecha_contrato == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Fecha de Inicio de Contrato</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (plazo_contrato == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Plazo del contrato</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (comision_broker == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Comisión de la primera renta al broker</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (metodo_pago == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Método de pago - como va a recibir el pago</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (metodo_pago == 'Transferencia bancaria' && numero_cuenta == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Número de cuenta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (precio == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Monto de renta mensual</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (mantenimiento_mensual == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Monto del mantenimiento mensual</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (servicios == '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Servicios</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (!puede_facturar1 && !puede_facturar2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>¿El propietario puede facturar?</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (identificacion_oficial == '' && "{{ !$createForm['identificacion_oficial'] }}") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Identificación oficial</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (comprobante_domicilio == '' && "{{ !$createForm['comprobante_domicilio'] }}") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Comprobante de domicilio</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (titulo_propiedad == "") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Título de la propiedad</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (escrituras == "" && titulo_propiedad == 'Primeras 5 hojas de las escrituras' &&
                "{{ !$createForm['escrituras'] }}") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Primeras 5 hojas de las escrituras</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (contrato_compraventa == '' && titulo_propiedad == 'Contrato de compra-venta' &&
                "{{ !$createForm['contrato_compraventa'] }}") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Contrato de compra-venta</b>" no puede quedar vacío',
                    confirmButtonText: 'Aceptar',
                });
                return false;
            } else if (poder_notarial == '' && titulo_propiedad == 'Poder notarial' &&
                "{{ !$createForm['poder_notarial'] }}") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Ups...',
                    html: 'El campo "<b>Poder notarial</b>" no puede quedar vacío',
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

            document.querySelector('.btn-loading').classList.add('d-none');
            document.querySelector('.loading-btn').classList.remove('d-none');

            setTimeout(function() {
                document.cookie = "propietario_calle=; max-age=0";
                document.cookie = "propietario_num_exterior=; max-age=0";
                document.cookie = "propietario_num_interior=; max-age=0";
                document.cookie = "propietario_colonia=; max-age=0";
                document.cookie = "propietario_delegacion_alcaldia=; max-age=0";
                document.cookie = "propietario_estado=; max-age=0";
                document.cookie = "propietario_code_postal=; max-age=0";
                document.cookie = "propietario_estacionamiento_pregunta=; max-age=0";
                document.cookie = "propietario_cantidad_estacionamiento=; max-age=0";
                document.cookie = "propietario_esta_amueblado=; max-age=0";
                document.cookie = "propietario_admite_mascotas=; max-age=0";
                document.cookie = "propietario_cantidad_mascotas=; max-age=0";
                document.cookie = "propietario_fecha_contrato=; max-age=0";
                document.cookie = "propietario_plazo_contrato=; max-age=0";
                document.cookie = "propietario_comision_broker=; max-age=0";
                document.cookie = "propietario_metodo_pago=; max-age=0";
                document.cookie = "propietario_numero_cuenta=; max-age=0";
                document.cookie = "propietario_precio=; max-age=0";
                document.cookie = "propietario_mantenimiento_mensual=; max-age=0";
                document.cookie = "propietario_servicios=; max-age=0";
                document.cookie = "propietario_puede_facturar=; max-age=0";
                document.cookie = "propietario_identificacion_oficial=; max-age=0";
                document.cookie = "propietario_comprobante_domicilio=; max-age=0";
                document.cookie = "propietario_titulo_propiedad=; max-age=0";
                document.cookie = "propietario_escrituras=; max-age=0";
                document.cookie = "propietario_poder_notarial=; max-age=0";


                Livewire.emitTo('propietario.datos-personales', 'registrarFormulario');

            }, 2000);

        }

        const cantidadMascotas = () => {
            const admite_mascotas1 = document.querySelector('#admite_mascotas1').checked;
            const admite_mascotas2 = document.querySelector('#admite_mascotas2').checked;
            if (admite_mascotas1) {
                document.querySelector('.cantidad-mascotas').classList.remove('d-none');
            } else if (admite_mascotas2) {
                document.querySelector('.cantidad-mascotas').classList.add('d-none');
                document.querySelector('#cantidad_mascotas').value = "";

            }
        }

        const cantidadEstacionamiento = () => {
            const tiene_estacionamiento1 = document.querySelector('#tiene_estacionamiento1').checked;
            const tiene_estacionamiento2 = document.querySelector('#tiene_estacionamiento2').checked;
            if (tiene_estacionamiento1) {
                document.querySelector('.cantidad-estacionamiento').classList.remove('d-none');
            } else if (tiene_estacionamiento2) {
                document.querySelector('.cantidad-estacionamiento').classList.add('d-none');
                document.querySelector('#cantidad_estacionamiento').value = "";

            }
        }

        const tituloPropiedad = () => {
            const titulo_propiedad = document.querySelector('#titulo_propiedad').value;
            const escrituras = document.querySelector('.escrituras');
            const contrato_compraventa = document.querySelector('.contrato_compraventa');
            const poder_notarial = document.querySelector('.poder_notarial');

            if (titulo_propiedad == 'Primeras 5 hojas de las escrituras') {
                contrato_compraventa.classList.add('d-none');
                poder_notarial.classList.add('d-none');
                escrituras.classList.remove('d-none');

                document.querySelector('#poder_notarial').value = "";
                document.querySelector('#contrato_compraventa').value = "";

                document.querySelector(`#file_poder_notarial`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_contrato_compraventa`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';

            } else if (titulo_propiedad == 'Contrato de compra-venta') {
                contrato_compraventa.classList.remove('d-none');
                poder_notarial.classList.add('d-none');
                escrituras.classList.add('d-none');

                document.querySelector('#poder_notarial').value = "";
                document.querySelector('#escrituras').value = "";

                document.querySelector(`#file_poder_notarial`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_escrituras`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';


            } else if (titulo_propiedad == 'Poder notarial') {
                contrato_compraventa.classList.add('d-none');
                poder_notarial.classList.remove('d-none');
                escrituras.classList.add('d-none');

                document.querySelector('#escrituras').value = "";
                document.querySelector('#contrato_compraventa').value = "";

                document.querySelector(`#file_contrato_compraventa`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
                document.querySelector(`#file_escrituras`).innerHTML =
                    '<i class="far fa-file-pdf "></i> Da click aquí para subir tu archivo';
            }

        }

        const solicitarNumeroCuenta = () => {
            const metodo_pago = document.querySelector('#metodo_pago').value;
            if (metodo_pago == 'Transferencia bancaria') {
                document.querySelector('.numero_cuenta').classList.remove('d-none');

            } else if (metodo_pago == 'Sr Pago') {
                document.querySelector('.numero_cuenta').classList.add('d-none');
                document.querySelector('#numero_cuenta').value = "";

            }
        }
    </script>
    @push('script')
        <script>
            Livewire.on('errorDocumentosPropietario', function() {
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
