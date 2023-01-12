<x-layout-web>
    <x-slot name="meta">
        <title>Mis trasacciones</title>
        <meta content="Consulta todas tus transacciones y verifica si tu inquilino y propietario ya llenaron sus datos"
            name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Mis trasacciones" property="og:title" />
        <meta content="Consulta todas tus transacciones y verifica si tu inquilino y propietario ya llenaron sus datos"
            property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/datos-asesor/contratos" />
        <meta property="og:site_name" content="Mis trasacciones" />
        <meta content="Mis trasacciones" property="twitter:title" />
        <meta content="Consulta todas tus transacciones y verifica si tu inquilino y propietario ya llenaron sus datos"
            property="twitter:description" />

        <meta content="summary_large_image" name="twitter:card" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="ypfBSIssuvERYFr6rbtBN5IEg1BZBhRi6_cJz76RPs0" name="google-site-verification" />
        <meta content="Webflow" name="generator" />
        <link rel="profile" href="https://gmpg.org/xfn/11">
        <link rel="canonical" href="https://www.respaldohomie.mx/datos-asesor/contratos" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
    </x-slot>
    <section class="section">
        <div class="container">
            @livewire('dashboard.dashboard-broker',['type' => $type])
            {{-- <div class="col-lg-12 col-md-12 col-12 d-flex align-items-center justify-content-center">
                    <div class="h-auto">
                        @if (Auth::user()->fase == 2)
                            <article>
                                <h1 class="text-primary text-center">Muchas gracias, tu registro ha sido completado.
                                    <br />
                                    Se ha enviado un correo al propietario e inquilino para continuar con la aplicación.
                                    Te daremos respuesta máximo 24 horas después de que hayan sido completadas.
                                </h1>
                            </article>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-12 d-flex align-items-center justify-content-center">
                    <img class="img-fluid broker__img mt-lg-5 mt-md-5 mt-5"
                        src="{{ asset('assets/images/svg/ilustracion-1.svg') }}" alt="ilustacion homie" />
                </div>
                <div class="col-lg-12 col-md-12 col-12 mt-5">
                    <div class="h-auto ">
                        <h1 class="text-primary">¡Invita a tus brokers conocidos y gana hasta $5,000 por referido!
                        </h1>

                        <p class="mt-3">Tenemos dos maneras en las que puedes invitar a <span
                                class="text-orange">cuantos brokers quieras</span> a usar Respaldo Homie:</p>
                        <p class="mt-3">Comparte tu código: <span
                                class="text-orange">{{ Auth::user()->referred_id }}</span>
                        </p>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.respaldohomie.mx/registro-broker/_/_/1212"
                            target="_blank">Compartir en
                            facebok</a>
                        <a href="https://twitter.com/intent/tweet?text=Usa%20mi%20c%C3%B3digo%20y%20encuentra%20el%20departamento%20que%20siempre%20quisiste%20%20%0Ahttps%3A//www.respaldohomie.mx/registro-broker/_/_/1212"
                            target="_blank">compartir en twitter</a>
                        <p class="mt-3">Ingresa el correo electrónico de otros Brokers y gana dinero
                            cuando
                            contraten el Respaldo Homie para sus clientes.</p>
                        @livewire('avisos.invitar-broker',key('broker-invitar'))
                    </div>
                </div>

                @if (Auth::user()->fase == 2)
                    <div class="col-lg-12 col-md-12 col-12 mt-lg-5 mt-md-5 mt-5">

                        <article>
                            <h1 class="text-primary">Empieza un nuevo proceso
                            </h1>
                        </article>
                        @livewire('broker.reiniciar-proceso',key('broker-reset'))

                    </div>
                @endif
            </div> --}}


    </section>
    <script>
        document.querySelector('.header-bottom').classList.remove('sticky-bar');
    </script>
</x-layout-web>
