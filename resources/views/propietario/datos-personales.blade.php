<x-layout-web>
    <x-slot name="meta">
        <title>Datos del propietario</title>
        <meta content="Llena tus datos en menos de 4 minutos" name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Datos del propietario" property="og:title" />
        <meta content="Llena tus datos en menos de 4 minutos" property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/" />
        <meta property="og:site_name" content="Datos del propietario" />
        <meta content="Datos del propietario" property="twitter:title" />
        <meta content="Llena tus datos en menos de 4 minutos" property="twitter:description" />

        <meta content="summary_large_image" name="twitter:card" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="ypfBSIssuvERYFr6rbtBN5IEg1BZBhRi6_cJz76RPs0" name="google-site-verification" />
        <meta content="Webflow" name="generator" />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="canonical" href="https://www.respaldohomie.mx/" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
    </x-slot>
    @if (Auth::user()->type == 'broker')
        <div class="content-code">
            <div class="h-auto d-lg-flex d-md-block d-block  align-items-center justify-content-center ocultar-md">
                <p class="mr-2 title-refered text-center-md text-white">Refiere a tus asesores conocidos y gana más
                    dinero
                </p>
                <div
                    class="d-lg-inline-block d-md-flex d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                    <button class="copy_btn btn btn-dash-white-light "
                        data-clipboard-text="{{ route('registro.broker', ['_', '_', Auth::user()->referred_id]) }}">Copiar
                        enlace
                        <i class="far fa-clone"></i></button>

                </div>
            </div>
            <div class="row p-2 ocultar-pc">
                <div class="col-7">
                    <p class="mr-2 title-refered text-left text-white">Refiere a tus asesores conocidos y gana más
                        dinero
                    </p>
                </div>
                <div class="col-5 d-flex align-items-center justify-content-center">
                    <button class="copy_btn btn btn-dash-white-light "
                        data-clipboard-text="{{ route('registro.broker', ['_', '_', Auth::user()->referred_id]) }}">Copiar
                        enlace
                        <i class="far fa-clone"></i></button>
                </div>
            </div>
        </div>
    @endif
    <section class="section-registro min-vh100">
        <div class="row p-0 m-0">
            <div class="col-lg-4 p-0 bg-gris ocultar-md">
                <img class="img-fluid registro__img" src="{{ asset('assets/images/svg/ilustracion-4.svg') }}"
                    alt="ilustacion homie" />
            </div>
            <div class="col-lg-8">
                <div class="container">
                    <div class="p-3">
                        <div class="row">
                            <div class="col-10">
                                @if (Auth::user()->type == 'broker')
                                    <h1 class="text-secundary"><a class="mr-3"
                                            href="{{ route('invitar_brokers', 'contratos') }}"><i
                                                class="fas fa-chevron-left text-secundary ft-arrow"></i></a> Nuevo
                                        contrato</h1>
                                @else
                                    <h1 class="text-secundary">Datos personales</h1>
                                @endif
                            </div>
                            <div class="col-2 d-flex justify-content-end">
                                <article>
                                    @if (Auth::user()->type == 'broker')
                                        <h1 class="text-secundary">1/1
                                        </h1>
                                    @else
                                        <h1 class="text-secundary">2/2</h1>
                                    @endif
                                </article>
                            </div>
                        </div>

                        @livewire('propietario.datos-personales',['transaccion_user' => $transaccion_user])
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-web>
