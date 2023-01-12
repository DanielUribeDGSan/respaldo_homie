<x-layout-web>
    <x-slot name="meta">
        <title>Refiere asesores</title>
        <meta content="Refiere a tus asesores y gana dinero" name="description" />
        <meta name="robots" content="noindex, follow" />

        <meta content="Refiere asesores" property="og:title" />
        <meta content="Refiere a tus asesores y gana dinero" property="og:description" />
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:url" content="https://www.respaldohomie.mx/" />
        <meta property="og:site_name" content="Refiere asesores" />
        <meta content="Refiere asesores" property="twitter:title" />
        <meta content="Refiere a tus asesores y gana dinero" property="twitter:description" />

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
            <h1 class="text-primary text-center">¡Invita a tus brokers conocidos y gana hasta $5,000 por referido!
            </h1>
            <div class="d-flex align-items-center justify-content-center">
                <a class="copy_btn btn btn-dash-morado-light mt-3 mb-3"
                    href="{{ route('registro_completado') }}">Referir
                    mas
                    tarde
                </a>
            </div>
            <p class="mt-3 text-center">Tenemos dos maneras en las que puedes invitar a <span
                    class="text-orange">cuantos
                    brokers
                    quieras</span> a usar Respaldo Homie:</p>
            <div class="row mt-3 mb-3">
                <div
                    class="col-lg-12 col-md-12 col-12 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                    <a class="copy_btn"
                        data-clipboard-text="{{ route('registro.broker', ['_', '_', Auth::user()->referred_id]) }}">
                        <p class="mt-3 text-center">Comparte tu código:<br /> <span
                                class="text-orange">{{ Auth::user()->referred_id }}</span>
                        </p>
                    </a>
                </div>
                {{-- <div
                    class="col-lg-3 col-md-6 col-12 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A//www.respaldohomie.mx/soy-asesor/_/_/{{ Auth::user()->referred_id }}"
                        target="_blank">
                        <p class="text-center"> Compartir en: <br />
                            <i class="fab fa-facebook-f text-orange"></i>
                        </p>
                    </a>
                </div>
                <div
                    class="col-lg-3 col-md-6 col-12 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                    <a href="https://twitter.com/intent/tweet?text=Encuentra%20tu%20departamento%20favorito,%20usando%20mi%20c%C3%B3digo%20personal%0A%0Ahttps%3A//www.respaldohomie.mx/soy-asesor/_/_/{{ Auth::user()->referred_id }}"
                        target="_blank">
                        <p class="text-center">compartir en: <br />
                            <i class="fab fa-twitter text-orange"></i>
                        </p>
                    </a>
                </div>
                <div
                    class="col-lg-3 col-md-6 col-12 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=https%3A//www.respaldohomie.mx/soy-asesor/_/_/{{ Auth::user()->referred_id }}&title=Usa%20mi%20c%C3%B3digo%20y%20encuentra%20tu%20departamento%20favorito&summary=&source="
                        target="_blank">
                        <p class="text-center">compartir en: <br />
                            <i class="fab fa-linkedin-in text-orange"></i>
                        </p>
                    </a>
                </div> --}}

            </div>
            <hr />
            <p class="mt-3">Ingresa el correo electrónico de otros Brokers y gana dinero
                cuando
                contraten el Respaldo Homie para sus clientes.</p>
            @livewire('avisos.invitar-broker',key('broker-invitar'))
        </div>
    </section>
    <script>
        document.querySelector('.header-bottom').classList.remove('sticky-bar');
    </script>

    <script>
        $(document).ready(function() {

            const clipboard = new ClipboardJS('.copy_btn');

            clipboard.on('success', function(e) {
                console.info('Action:', e.action);
                console.info('Text:', e.text);
                console.info('Trigger:', e.trigger);

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'success',
                    title: 'Código copiado'
                });


                e.clearSelection();
            });


        });
    </script>

</x-layout-web>
