<x-layout-web>
    <x-slot name="meta">
        <title>Inquilinos</title>
        <meta content="Si ya tienes un inmueble para rentar pero no
                    cuentas con aval, somos tu mejor opción" name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Inquilinos" property="og:title" />
        <meta content="Si ya tienes un inmueble para rentar pero no
                    cuentas con aval, somos tu mejor opción" property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/soy-inquilino" />
        <meta property="og:site_name" content="Inquilinos" />
        <meta content="Inquilinos" property="twitter:title" />
        <meta content="Si ya tienes un inmueble para rentar pero no
                    cuentas con aval, somos tu mejor opción" property="twitter:description" />

        <meta content="summary_large_image" name="twitter:card" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="ypfBSIssuvERYFr6rbtBN5IEg1BZBhRi6_cJz76RPs0" name="google-site-verification" />
        <meta content="Webflow" name="generator" />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="canonical" href="https://www.respaldohomie.mx/soy-inquilino" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
    </x-slot>
    <section class="section"
        title="Si ya tienes un inmueble para rentar pero no cuentas con aval, somos tu mejor opción">
        <div class="container">
            <div class="d-flex align-items-center justify-content-center">
                <h1 class="text-orange text-center content-banner-title">Si ya tienes un inmueble para rentar pero no
                    cuentas con aval, somos tu mejor opción</h1>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <p class="mt-3 content-banner-text text-center">Te protegemos con el Respaldo Homie para que puedas
                    rentar el inmueble que quieras.
                </p>
            </div>

            <div class="row d-flex align-items-center justify-content-center mt-5">
                <div class="col-lg-3 col-md-6 col-6 mt-lg-0 mt-md-3 mt-3">
                    <div class="h-auto d-flex align-items-center justify-content-center">
                        <img class="img-fluid img-options-circle" src="{{ asset('assets/images/svg/Grupo_134.svg') }}"
                            alt="ilustacion homie" />
                    </div>
                    <p class="text-options-circle mt-2 text-center">
                        <small class="text-center">
                            Despreocúpate si no cuentas con aval.
                        </small>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-6 mt-lg-0 mt-md-3 mt-3">
                    <div class="h-auto d-flex align-items-center justify-content-center">
                        <img class="img-fluid img-options-circle" src="{{ asset('assets/images/svg/Grupo_123.svg') }}"
                            alt="ilustacion homie" />
                    </div>
                    <p class="text-options-circle mt-2 text-center">
                        <small class="text-center">
                            Paga tu renta a través de múltiples formas.
                        </small>
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 col-6 mt-lg-0 mt-md-3 mt-3">
                    <div class="h-auto d-flex align-items-center justify-content-center">
                        <img class="img-fluid img-options-circle" src="{{ asset('assets/images/svg/Grupo_118.svg') }}"
                            alt="ilustacion homie" />
                    </div>
                    <p class="text-options-circle mt-2 text-center">
                        <small class="text-center">
                            Realiza el proceso 100% digital y seguro.
                        </small>
                    </p>
                </div>
            </div>
        </div>
        <div id="registro_inquilino"></div>

    </section>


    <section class="section bg-gris position-relative">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 d-flex align-items-end">
                    <article>
                        <h1 class="text-gris">¿Cómo Funciona?</h1>
                    </article>
                </div>
                <div class="col-lg-6 col-md-12 col-12 d-flex align-items-end ocultar-md">
                    <article>
                        <h1 class="text-orange">Regístrate</h1>
                    </article>
                </div>
            </div>
            <div class="w-100 mt-4 ocultar-pc">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img-card-fase img-fluid z-1"
                                    src="{{ asset('assets/images/svg/card-1.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-verde number-card">1.</p>
                                    <p class="text-center text-verde title-card-fase"><small>Regístrate</small></p>
                                    <p class="text-center mt-4"><small>Solo necesitas tus datos y los del propietario
                                            del inmueble que quieres rentar.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img2-card-fase img-fluid z-1"
                                    src="{{ asset('assets/images/svg/card-2.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-primary number-card">2.</p>
                                    <p class="text-center text-primary title-card-fase"><small>Confirma el
                                            registro</small></p>
                                    <p class="text-center mt-4"><small>El propietario recibirá un correo para confirmar
                                            su registro.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img3-card-fase img-fluid z-1"
                                    src="{{ asset('assets/images/svg/card-3.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-orange number-card">3.</p>
                                    <p class="text-center text-orange title-card-fase"><small>Realiza la firma de
                                            contrato</small></p>
                                    <p class="text-center mt-4"><small>Analizamos tu perfil de riesgo en menos de 24
                                            horas y procedemos a la firma de contrato.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img-card-fase img-fluid z-1"
                                    src="{{ asset('assets/images/svg/card-4.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-morado number-card">4.</p>
                                    <p class="text-center text-morado title-card-fase"><small>Recibe tus llaves</small>
                                    </p>
                                    <p class="text-center mt-4"><small>¡Estás listo para disfrutar del hogar de tus
                                            sueños!</small></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mt-3">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            @push('script')
                <script>
                    var swiper = new Swiper(".mySwiper", {
                        pagination: {
                            el: ".swiper-pagination",
                        },
                        spaceBetween: 30,
                        breakpoints: {
                            320: {
                                slidesPerView: 1
                            },
                            576: {
                                slidesPerView: 1
                            },
                            768: {
                                slidesPerView: 2
                            }
                        },
                    });
                </script>
            @endpush
            <div class="row pb-5 pt-4">
                <div class="col-lg-6 col-md-12 col-12 ocultar-md" title="¿Cómo Funciona?">
                    <div class="row h-100">
                        <div class="col-lg-6 col-md-12 col-12 pb-4 centrar-f">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img-card-fase img-fluid z-1 ocultar-md"
                                    src="{{ asset('assets/images/svg/card-1.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-verde number-card">1.</p>
                                    <p class="text-center text-verde title-card-fase"><small>Regístrate</small></p>
                                    <p class="text-center mt-4"><small>Solo necesitas tus datos y los del propietario
                                            del inmueble que quieres rentar.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 pb-lg-4">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img2-card-fase img-fluid z-1 ocultar-md"
                                    src="{{ asset('assets/images/svg/card-2.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-primary number-card">2.</p>
                                    <p class="text-center text-primary title-card-fase"><small>Confirma el
                                            registro</small></p>
                                    <p class="text-center mt-4"><small>El propietario recibirá un correo para confirmar
                                            su registro.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 pt-4">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img3-card-fase img-fluid z-1 ocultar-md"
                                    src="{{ asset('assets/images/svg/card-3.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-orange number-card">3.</p>
                                    <p class="text-center text-orange title-card-fase"><small>Realiza la firma de
                                            contrato</small></p>
                                    <p class="text-center mt-4"><small>Analizamos tu perfil de riesgo en menos de 24
                                            horas y procedemos a la firma de contrato.</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-12 pt-4">
                            <div class="card-fase d-flex justify-content-center position-relative">
                                <img class="img-card-fase img-fluid z-1 ocultar-md"
                                    src="{{ asset('assets/images/svg/card-4.svg') }}" alt="svg respaldo homie" />
                                <div class="h-auto z-2">
                                    <p class="h1 text-morado number-card">4.</p>
                                    <p class="text-center text-morado title-card-fase"><small>Recibe tus llaves</small>
                                    </p>
                                    <p class="text-center mt-4"><small>¡Estás listo para disfrutar del hogar de tus
                                            sueños!</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 d-flex align-items-end ocultar-pc mb-2 mt-2">
                    <div id="_registro_inquilino"></div>
                    <article>
                        <h1 class="text-orange mt-4 mb-4">Regístrate</h1>
                    </article>
                </div>
                <div class="col-lg-6 col-md-12 col-12" title="Regístrate">
                    <div class="card-fase">
                        @livewire('form-register-inquilino',['transaccion_user' => $transaccion_user,'email_user' =>
                        $email_user])
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="section bg-rosa position-relative">
        <img class="img-banner-inquilino img-fluid z-1" src="{{ asset('assets/images/svg/img-banner.svg') }}"
            alt="svg respaldo homie" />
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-lg-center">
                    <p class="h1 text-verde text-center-pc text-left-md">¿Aún no tienes<br /> un inmueble?</p>
                </div>
                <div class="col-lg-6 col-md-6 col-12 d-flex align-items-center">
                    <div class="h-auto">
                        <p class="text-left-md">
                            Respaldo Homie inquilinos es para aquellos que encontraron el hogar de sus sueños y buscan
                            protección legal para su renta.<br />
                            <strong><span class="fw-600 bold-ft"> Si tú aún no encuentras un inmueble, ¡nosotros te
                                    podemos
                                    ayudar!</span></strong>
                        </p>
                        <div
                            class="d-lg-inline-block d-md-flex d-flex align-items-center justify-content-lg-center mt-lg-0 mt-md-3 mt-3">
                            <a class="btn btn-morado mt-3" title="Buscar un hogar" href="https://homie.mx/h/"
                                target="_blank">Buscar un hogar</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-bottom" title="Registra a tus clientes">
        <div class="container">
            <div class="row position-relative">
                <div class="col-lg-1 ocultar-md">
                    <img class="img-fluid img-beneficios-left" src="{{ asset('assets/images/svg/Grupo_116.svg') }}"
                        alt="ilustacion respaldo homie" />
                </div>
                <div class="col-lg-10 d-flex align-items-center justify-content-center pb-5">
                    <div class="h-auto">
                        <article>
                            <h1 class="text-primary text-center">
                                ¿Cuál es el costo?
                            </h1>
                            <p class="mt-3 text-center">Obtén todos los beneficios del Respaldo Homie
                                por un solo pago inicial.</p>
                        </article>

                        <div class="row mt-4 d-flex align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card-precios">
                                    <p class="bold-ft text-verde text-center mb-3">Pago único</p>
                                    <p class="text-center"><small><strong><span class="bold-ft fw-900">A partir de
                                                    15 días de renta + IVA</span></strong>
                                            <br />
                                            Se define a partir de la evaluación del perfil del inquilino y puede ser
                                            negociado entre propietario e inquiilino.
                                        </small></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-1 ocultar-md">
                    <img class="img-fluid img-beneficios-right" src="{{ asset('assets/images/svg/Grupo_115.svg') }}"
                        alt="ilustacion respaldo homie" />
                </div>

            </div>
        </div>
    </section>
    @livewire('avisos.modal-registro-inquilino', ['transaccion_user' => $transaccion_user,'email_user' =>
    $email_user],
    key('modal-registro-inquilino-key'))
</x-layout-web>
