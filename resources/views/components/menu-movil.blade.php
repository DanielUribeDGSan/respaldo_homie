<div class="off-canvas-active">
    <a class="off-canvas-close"><i class=" ti-close "></i></a>
    <div class="off-canvas-wrap">
        {{-- <div class="welcome-text off-canvas-margin-padding">
             <p>Default Welcome Msg! </p>
         </div> --}}
        <div class="mobile-menu-wrap off-canvas-margin-padding-2 h-100">
            <div id="mobile-menu" class="slinky-mobile-menu text-left h-100">
                <ul>
                    @auth

                        <li><a><span class="bold-ft fw-600 h1">¡Hola,
                                    {{ Auth::user()->name }}!</span></a></li>
                        @if (Auth::user()->type == 'broker')
                            <li class="mt-4"></li>
                            <li><a class="asesor-item" href="{{ route('invitar_brokers', 'contratos') }}"><span
                                        class="text-primary">Mis
                                        contratos</span></a>
                            </li>
                            <li><a class="asesor-item text-primary"
                                    href="{{ route('invitar_brokers', 'referidos') }}"><span class="text-primary">Mis
                                        referidos</span></a>
                            </li>
                            <li><a class="asesor-item text-primary" href="{{ route('invitar_brokers', 'datos') }}"><span
                                        class="text-primary">Mis
                                        datos</span></a>
                            </li>
                            <li>
                        @endif
                        <li class="mt-4"></li>
                    @endauth
                    <li><a href="{{ route('home') . '#inicio' }}">Inicio</a>
                    </li>
                    <li><a href="{{ route('registro.broker') }}">Soy Asesor</a>
                    </li>
                    <li><a href="{{ route('registro.propietario') }}">Soy Propietario</a>
                    </li>
                    <li><a href="{{ route('registro.inquilino') }}">Soy Inquilino</a>
                    </li>
                    <li><a href="{{ route('preguntas_respuestas') }}" class="link_ref">FAQ’s</a>
                    </li>
                    @auth


                        <div class="ocultar-pc mt-4">
                            @livewire('broker.nuevo-proceso-broker-menu',key('broker-reset'))
                        </div>

                    @else
                        <li>
                            <a class="btn btn-yellow-line link_ref  " href="{{ route('iniciar_sesion') }}"
                                style="width: 100%;">Iniciar sesión</a>
                        </li>
                    @endauth
                    <li>
                        @auth

                        @else
                            <a class="btn btn-yellow link_ref text-white mt-2 btn-registro-menu"
                                href="{{ route('registro') }}" style="width: 100%;color:#fff !important">Registrarme</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
