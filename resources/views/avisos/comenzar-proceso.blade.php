<x-layout-web>
    <x-slot name="meta">
        <title>Nuevo proceso</title>
        <meta content="Comienza un nuevo proceso en respaldo homie" name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Nuevo proceso" property="og:title" />
        <meta content="Comienza un nuevo proceso en respaldo homie" property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/" />
        <meta property="og:site_name" content="Nuevo proceso" />
        <meta content="Nuevo proceso" property="twitter:title" />
        <meta content="Comienza un nuevo proceso en respaldo homie" property="twitter:description" />

        <meta content="summary_large_image" name="twitter:card" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="ypfBSIssuvERYFr6rbtBN5IEg1BZBhRi6_cJz76RPs0" name="google-site-verification" />
        <meta content="Webflow" name="generator" />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="canonical" href="https://www.respaldohomie.mx/" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
    </x-slot>
    <section class="section">
        <div class="container">

            <h1 class="text-primary text-center">¿Quieres comenzar con tu transacción?</h1>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 d-flex align-items-center justify-content-center">
                    <div class="h-auto">
                        <a class="copy_btn btn btn-dash-morado-light mt-lg-4 mt-md-3 mt-3 mb-lg-4 mb-md-3 mb-3 mr-3"
                            href="{{ route('broker.datos_propietario_inquilino', Auth::user()->transaction) }}">Si,
                            comenzar
                            ahora
                        </a>
                        <a class="copy_btn btn btn-dash-morado-light mt-lg-4 mt-md-3 mt-3 mb-lg-4 mb-md-3 mb-3"
                            href="{{ route('invitar_brokers', 'contratos') }}">No,
                            comenzar
                            después
                        </a>
                    </div>
                </div>
                <div class="col-12">
                    <img class="img-fluid mt-lg-0 mt-md-5 mt-5"
                        src="{{ asset('assets/images/svg/ilustracion-1.svg') }}" alt="ilustacion homie" />
                </div>
            </div>
        </div>

    </section>
    <script>
        document.querySelector('.header-bottom').classList.remove('sticky-bar');
    </script>
</x-layout-web>
