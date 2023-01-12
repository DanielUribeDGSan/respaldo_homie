<div>
    <header class="header-area header-responsive-padding header-height-1 menu-h">
        <div class="header-bottom sticky-bar menu-h">
            <div class="container-fluid menu-h">
                <div class="row align-items-center menu-h d-flex align-items-center justify-content-center">
                    <div class="col-lg-2 col-md-6 col-6">
                        <div class="logo">
                            <a class="link_ref" href="{{ route('home') }}"><img
                                    src="{{ asset('assets/images/logo/logo-oficial.png') }}" alt="logo HOMIE"></a>
                        </div>
                    </div>
                    @auth
                        <div class="col-lg-7 d-none d-lg-block d-flex">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        {{-- <li><a href="{{ route('home') }}"
                                            class="link_ref {{ Route::current()->getName() == 'home' ? 'active' : '' }}">Inicio</a>
                                    </li> --}}
                                        <li><a data-scroll href="{{ route('home') . '#inicio' }}">Inicio</a>
                                        </li>
                                        <li><a data-scroll
                                                class="{{ Route::current()->getName() == 'registro.broker' ? 'active' : '' }}"
                                                href="{{ route('registro.broker') }}">Soy Asesor</a>
                                        </li>
                                        <li><a data-scroll
                                                class="{{ Route::current()->getName() == 'registro.propietario' ? 'active' : '' }}"
                                                href="{{ route('registro.propietario') }}">Soy Propietario</a>
                                        </li>
                                        <li><a data-scroll
                                                class="{{ Route::current()->getName() == 'registro.inquilino' ? 'active' : '' }}"
                                                href="{{ route('registro.inquilino') }}">Soy Inquilino</a>
                                        </li>
                                        <li><a href="{{ route('preguntas_respuestas') }}" class="link_ref">FAQ’s</a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 d-none d-lg-block d-flex">
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        {{-- <li><a href="{{ route('home') }}"
                                            class="link_ref {{ Route::current()->getName() == 'home' ? 'active' : '' }}">Inicio</a>
                                    </li> --}}
                                        <li><a data-scroll href="{{ route('home') . '#inicio' }}">Inicio</a>
                                        </li>
                                        <li><a data-scroll
                                                class="{{ Route::current()->getName() == 'registro.broker' ? 'active' : '' }}"
                                                href="{{ route('registro.broker') }}">Soy Asesor</a>
                                        </li>
                                        <li><a data-scroll
                                                class="{{ Route::current()->getName() == 'registro.propietario' ? 'active' : '' }}"
                                                href="{{ route('registro.propietario') }}">Soy Propietario</a>
                                        </li>
                                        <li><a data-scroll
                                                class="{{ Route::current()->getName() == 'registro.inquilino' ? 'active' : '' }}"
                                                href="{{ route('registro.inquilino') }}">Soy Inquilino</a>
                                        </li>
                                        <li><a href="{{ route('preguntas_respuestas') }}"
                                                class="link_ref">FAQ’s</a>
                                        </li>

                                    </ul>
                                </nav>
                            </div>
                        </div>

                    @endauth
                    @auth
                        <div class="col-lg-3 col-md-6 col-6">
                            <div class="header-action-wrap">
                                <div class="header-action-style">

                                    <div class="ocultar-md">
                                        @livewire('broker.nuevo-proceso-broker-menu',key('broker-reset'))
                                    </div>

                                </div>


                                <div class="header-action-style ocultar-md">
                                    <div class="dropdown">
                                        <button class="btn btn-profile dropdown-toggle" type="button" id="perfilDrop"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-user"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-profile" aria-labelledby="perfilDrop">
                                            <li><a class="dropdown-item bold-ft fw-600">¡Hola,
                                                    {{ Auth::user()->name }}!</a></li>
                                            <li class="mt-3">

                                            </li>
                                            @if (Auth::user()->type == 'broker')
                                                <li><a class="dropdown-item"
                                                        href="{{ route('invitar_brokers', 'contratos') }}">Mis
                                                        contratos</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('invitar_brokers', 'referidos') }}">Mis
                                                        referidos</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('invitar_brokers', 'datos') }}">Mis datos</a></li>
                                                <li>
                                            @endif
                                            <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <a class="dropdown-item" title="registrate"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Cerrar sesión
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <div class="header-action-style d-block d-lg-none">
                                    <a class="mobile-menu-active-button" href="#"><i class="fas fa-bars icon-menu"></i></a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6 col-6">
                            <div class="header-action-wrap">
                                <div class="header-action-style">
                                    <a class="btn btn-yellow-line link_ref ocultar-md d-inline-block"
                                        href="{{ route('iniciar_sesion') }}">Iniciar sesión</a>

                                    <a class="btn btn-yellow link_ref ocultar-md d-inline-block btn-registro-menu"
                                        href="{{ route('registro') }}">Registrarme</a>

                                </div>
                                <div class="header-action-style d-block d-lg-none">
                                    <a class="mobile-menu-active-button" href="#"><i class="fas fa-bars icon-menu"></i></a>
                                </div>
                            </div>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
    </header>
</div>
