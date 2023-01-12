<x-layout-web>
    <x-slot name="meta">
        <title>Registro</title>
        <meta content="Regístrate en menos de 1 minuto" name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Iniciar sesión" property="og:title" />
        <meta content="Regístrate en menos de 1 minuto" property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/registro" />
        <meta property="og:site_name" content="Iniciar sesión" />
        <meta content="Iniciar sesión" property="twitter:title" />
        <meta content="Regístrate en menos de 1 minuto" property="twitter:description" />

        <meta content="summary_large_image" name="twitter:card" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="ypfBSIssuvERYFr6rbtBN5IEg1BZBhRi6_cJz76RPs0" name="google-site-verification" />
        <meta content="Webflow" name="generator" />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="canonical" href="https://www.respaldohomie.mx/registro" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
    </x-slot>
    <section class="section-registro min-vh100">
        <div class="row p-0 m-0">
            <div class="col-lg-4 p-0 bg-gris">
                <img class="img-fluid registro__img" src="{{ asset('assets/images/svg/ilustracion-4.svg') }}"
                    alt="ilustacion homie" />
            </div>
            <div class="col-lg-8">
                <div class="container">
                    <div class="p-3">
                        <h1 class="text-secundary">Registro</h1>
                        @livewire('form-register')
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout-web>
