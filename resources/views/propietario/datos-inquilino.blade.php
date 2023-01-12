<x-layout-web>
    <x-slot name="meta">
        <title>Invita a tu inquilino</title>
        <meta content="Invita a regístrase a tu inquilino en menos de un minuto" name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Invita a tu inquilino" property="og:title" />
        <meta content="Invita a regístrase a tu inquilino en menos de un minuto" property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/" />
        <meta property="og:site_name" content="Invita a tu inquilino" />
        <meta content="Invita a tu inquilino" property="twitter:title" />
        <meta content="Invita a regístrase a tu inquilino en menos de un minuto" property="twitter:description" />

        <meta content="summary_large_image" name="twitter:card" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="ypfBSIssuvERYFr6rbtBN5IEg1BZBhRi6_cJz76RPs0" name="google-site-verification" />
        <meta content="Webflow" name="generator" />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="canonical" href="https://www.respaldohomie.mx/" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
    </x-slot>
    <section class="section-registro min-vh100">
        <div class="row p-0 m-0">
            <div class="col-lg-4 p-0 bg-gris ocultar-md">
                <img class="img-fluid registro__img" src="{{ asset('assets/images/svg/ilustracion-4.svg') }}"
                    alt="ilustacion homie" />
            </div>
            <div class="col-lg-8">
                <div class="container">
                    <div class="p-3">
                        <h1 class="text-secundary">Datos del inquilino</h1>
                        @livewire('propietario.datos-inquilino',['transaccion_user' => $transaccion_user])

                        {{-- <div class="mt-5">
                            <h1 class="text-secundary">¿No cuentas con un propietario?</h1>
                            <a class="mt-3 d-inline-block ft-md" href="https://homie.mx/h/" target="_blank">Consigue uno
                                aquí</a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-web>
