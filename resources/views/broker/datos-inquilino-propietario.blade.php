<x-layout-web>
    <x-slot name="meta">
        <title>Invita a tu inquilino y propietario</title>
        <meta content="Invita a regístrase a tu inquilino y propietario en menos de un minuto" name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Invita a tu inquilino y propietario" property="og:title" />
        <meta content="Invita a regístrase a tu inquilino y propietario en menos de un minuto"
            property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/" />
        <meta property="og:site_name" content="Invita a tu inquilino y propietario" />
        <meta content="Invita a tu inquilino y propietario" property="twitter:title" />
        <meta content="Invita a regístrase a tu inquilino y propietario en menos de un minuto"
            property="twitter:description" />

        <meta content="summary_large_image" name="twitter:card" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="ypfBSIssuvERYFr6rbtBN5IEg1BZBhRi6_cJz76RPs0" name="google-site-verification" />
        <meta content="Webflow" name="generator" />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="canonical" href="https://www.respaldohomie.mx/" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
    </x-slot>
    <div class="content-code">
        <div class="h-auto d-lg-flex d-md-block d-block  align-items-center justify-content-center ocultar-md">
            <p class="mr-2 title-refered text-center-md text-white">Refiere a tus asesores conocidos y gana más dinero
            </p>
            <div
                class="d-lg-inline-block d-md-flex d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                <button class="copy_btn btn btn-dash-white-light "
                    data-clipboard-text="{{ route('registro.broker', ['_', '_', Auth::user()->referred_id]) }}">Copiar
                    enlace
                    <i class="far fa-clone"></i></button>

            </div>
        </div>
        <div class="row ocultar-pc  p-2">
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
    <section class="section-registro min-vh100">
        <div class="row p-0 m-0">
            <div class="col-lg-4 p-0 bg-gris ocultar-md">
                <img class="img-fluid registro__img" src="{{ asset('assets/images/svg/ilustracion-4.svg') }}"
                    alt="ilustacion homie" />
            </div>
            <div class="col-lg-8">
                <div class="container">
                    <div class="p-3">
                        @if (!Auth::user()->referred_guest)
                            <a type="button" class="btn-code" data-bs-toggle="modal"
                                data-bs-target="#modalReferido">
                                ¿Tienes un código de invitación?
                            </a>
                        @endif
                        <h1 class="text-secundary mt-3">Nuevo contrato</h1>
                        @livewire('broker.datos-personales',['transaccion_user' => $transaccion_user])
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-web>
