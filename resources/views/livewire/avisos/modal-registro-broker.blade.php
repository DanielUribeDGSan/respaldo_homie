<div x-data>

    @if ($invitado)
        <div class="modal fade" id="registroFormAsesor" tabindex="-1" aria-labelledby="registroFormAsesorLabel"
            aria-hidden="true" wire:ignore>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="d-flex align-items-center justify-content-center">
                                <svg width="141" height="78" viewBox="0 0 141 78" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M140.13 1H1V63.97H140.13V1Z" fill="white" stroke="#444545"
                                        stroke-width="0.76" stroke-miterlimit="10" stroke-linecap="round" />
                                    <path d="M23.9502 63.4805V76.1305L34.3401 63.4805" fill="white" />
                                    <path d="M23.9502 63.4805V76.1305L34.3401 63.4805" stroke="#444545"
                                        stroke-width="0.76" stroke-miterlimit="10" stroke-linecap="round" />
                                    <path
                                        d="M36.8699 55.3803C50.0032 55.3803 60.6498 44.7336 60.6498 31.6003C60.6498 18.467 50.0032 7.82031 36.8699 7.82031C23.7365 7.82031 13.0898 18.467 13.0898 31.6003C13.0898 44.7336 23.7365 55.3803 36.8699 55.3803Z"
                                        fill="#F6B248" stroke="#444545" stroke-width="0.76" stroke-miterlimit="10" />
                                    <path
                                        d="M50.7001 31.5996C50.7001 35.2676 49.243 38.7853 46.6494 41.3789C44.0557 43.9725 40.538 45.4296 36.8701 45.4296C33.2021 45.4296 29.6844 43.9725 27.0908 41.3789C24.4971 38.7853 23.04 35.2676 23.04 31.5996H50.7001Z"
                                        fill="white" stroke="#444545" stroke-width="0.76" stroke-miterlimit="10" />
                                    <path
                                        d="M27.9399 24.4296C28.5143 24.4296 28.9799 23.964 28.9799 23.3896C28.9799 22.8152 28.5143 22.3496 27.9399 22.3496C27.3656 22.3496 26.8999 22.8152 26.8999 23.3896C26.8999 23.964 27.3656 24.4296 27.9399 24.4296Z"
                                        stroke="#444545" stroke-width="0.76" stroke-miterlimit="10"
                                        stroke-linecap="round" />
                                    <path
                                        d="M45.1299 24.4296C45.7043 24.4296 46.1699 23.964 46.1699 23.3896C46.1699 22.8152 45.7043 22.3496 45.1299 22.3496C44.5555 22.3496 44.0898 22.8152 44.0898 23.3896C44.0898 23.964 44.5555 24.4296 45.1299 24.4296Z"
                                        stroke="#444545" stroke-width="0.76" stroke-miterlimit="10"
                                        stroke-linecap="round" />
                                    <path
                                        d="M126.9 32.0609L102.81 11.2109V25.6209H69.8701V38.5009H102.81V52.9109L126.9 32.0609Z"
                                        fill="#238D7E" stroke="#444545" stroke-width="0.76" stroke-linejoin="round" />
                                </svg>

                            </div>
                            <p class="text-center mt-3"><span class="fw-600 bold-ft">¡Hola!</span></p>
                            <p class="text-center mt-3">Has ingresado a Respaldo Homie como referido de
                                {{ $invitado[0]->u_name }}
                                {{ $invitado[0]->u_last_name }} , ahora sólo regístrate para empezar a utilizar tu
                                nueva
                                herramienta como asesor inmobiliario.
                            </p>

                            <div class="form-group row">
                                <div class="col-12 mt-3 d-flex align-items-center justify-content-center">
                                    <a class="btn btn-primary-sm ocultar-md" data-scroll href="#registro"
                                        data-bs-dismiss="modal" aria-label="Close">Registrarme</a>
                                    <a class="btn btn-primary-sm ocultar-pc" data-scroll href="#_registro"
                                        data-bs-dismiss="modal" aria-label="Close">Registrarme</a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const btn_registro = document.getElementsByClassName("btn-registro-menu");
            for (let i = 0; i < btn_registro.length; i++) {
                btn_registro[i].classList.add('d-none');
            }
        </script>
        @push('script')
            <script>
                const myModalregistroFormAsesor = new bootstrap.Modal(document.getElementById("registroFormAsesor"), {});
                document.onreadystatechange = function() {
                    myModalregistroFormAsesor.show();
                };
            </script>
        @endpush
    @endif
</div>
