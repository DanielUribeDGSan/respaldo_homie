<x-layout-web>
    <x-slot name="meta">
        <title>Registro completado</title>

    </x-slot>
    <section class="section">
        <div class="container">
            @if (Auth::user()->type == 'broker')

                <h1 class="text-primary text-center">Hemos recibido tus datos exitosamente.<br />
                    Te daremos respuesta máximo 24 horas después de que hayan sido completadas.</h1>
            @endif

            @if (Auth::user()->type == 'propietario')

                <h1 class="text-primary text-center">Hemos recibido tus datos exitosamente.<br />
                    Te daremos respuesta máximo 24 horas después de que hayan sido completadas.</h1>
            @endif

            @if (Auth::user()->type == 'inquilino')
                <h1 class="text-primary text-center">
                    Hemos recibido tus datos exitosamente.
                    Te daremos respuesta máximo 24 horas después de que tu propietario haya completado su aplicación.
                </h1>
            @endif

            @if (Auth::user()->type == 'broker')
                <div class="d-flex align-items-center justify-content-center">
                    <a class="copy_btn btn btn-dash-morado-light mt-lg-4 mt-md-3 mt-3 mb-lg-4 mb-md-3 mb-3"
                        href="{{ route('invitar_brokers', 'contratos') }}">Ver
                        mis
                        datos
                    </a>
                </div>
            @endif

            <img class="img-fluid mt-lg-0 mt-md-5 mt-5" src="{{ asset('assets/images/svg/ilustracion-1.svg') }}"
                alt="ilustacion homie" />
        </div>

    </section>
    <script>
        document.querySelector('.header-bottom').classList.remove('sticky-bar');
    </script>
</x-layout-web>
