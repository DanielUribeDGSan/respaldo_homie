<x-layout-web>

    <x-slot name="meta">
        <title>Respaldo Homie | Tu aliado para tener rentas protegidas</title>
        <meta name="description"
            content="Respaldamos asesores, propietarios e inquilinos por igual, regístrate ahora para adquirir el servicio más completo y olvídate de todos los inconvenientes de una renta tradicional." />
        <link rel="canonical" href="https://www.respaldohomie.mx/" />
        <meta property="og:locale" content="es_ES" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="Respaldo Homie | Tu aliado para tener rentas protegidas" />
        <meta property="og:description"
            content="Respaldamos asesores, propietarios e inquilinos por igual, regístrate ahora para adquirir el servicio más completo y olvídate de todos los inconvenientes de una renta tradicional." />
        <meta property="og:url" content="https://barbacoas.online/" />
        <meta property="og:site_name" content="respaldohomie.mx" />
        <meta property="article:modified_time" content="2021-07-27T11:25:43+00:00" />
        <meta property="og:image"
            content="{{ asset('assets/images/favicon/cropped-favicon-270x270.png?ver=1.0.2') }}" />
        <meta property="og:image:width" content="900" />
        <meta property="og:image:height" content="432" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:label1" content="Tiempo de lectura" />
        <meta name="twitter:data1" content="6 minutos" />

    </x-slot>

    <div>
        <div class="section bg-gris">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 d-flex align-items-center justify-content-start">
                        <div class="h-auto">
                            <h2 class="text-morado h1 fw-100">
                                Tu aliado para tener rentas protegidas,<br class="ocultar-sm" /> sin retrasos y con
                                más beneficios</h2>
                            <p class="mt-3 parrafo_content_home">Respaldamos asesores, propietarios e
                                inquilinos por
                                igual, regístrate ahora para adquirir el servicio más completo y olvídate de todos los
                                inconvenientes de una renta tradicional.</p>

                            <a class="btn btn-new-primary text-center mt-4"
                                href="{{ route('registro') }}">Registrarme</a>
                        </div>
                    </div>
                    <div class="col-lg-5 d-flex justify-content-end">
                        <div class="position-relative">
                            <img class="img-fluid img_home1" src="{{ asset('assets/images/svg/Hero_Img_Home.svg') }}"
                                alt="Respaldo homie" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container-fluid">
                <h2 class="text-orange h1 fw-100">
                    ¿Qué ofrecemos?</h2>
                <div class="row mt-4">
                    <div
                        class="col-lg-3 col-md-3 col-6 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                        <div class="h-auto">
                            <p class="d-flex align-content-center justify-content-center">
                                <img class="img-fluid img_icon_home"
                                    src="{{ asset('assets/images/svg/icon_home1.svg') }}" alt="Respaldo homie" />
                            </p>
                            <h3 class="p text-center mt-3 content_parrafos_home"><small>Pagos puntuales y protección
                                    legal
                                    para la renta del inmueble.</small></h3>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-3 col-6 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                        <div class="h-auto">
                            <p class="d-flex align-content-center justify-content-center">
                                <img class="img-fluid img_icon_home"
                                    src="{{ asset('assets/images/svg/icon_home2.svg') }}" alt="Respaldo homie" />
                            </p>
                            <h3 class="p text-center mt-3 content_parrafos_home"><small>Opción de renta para inquilinos
                                    sin aval y extranjeros.</small></h3>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-3 col-6 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                        <div class="h-auto">
                            <p class="d-flex align-content-center justify-content-center">
                                <img class="img-fluid img_icon_home"
                                    src="{{ asset('assets/images/svg/icon_home3.svg') }}" alt="Respaldo homie" />
                            </p>
                            <h3 class="p text-center mt-3 content_parrafos_home"><small>Proceso seguro, asistencia y
                                    contrato, 100% en línea.</small></h3>
                        </div>
                    </div>
                    <div
                        class="col-lg-3 col-md-3 col-6 d-flex align-items-center justify-content-center mt-lg-0 mt-md-3 mt-3">
                        <div class="h-auto">
                            <p class="d-flex align-content-center justify-content-center">
                                <img class="img-fluid img_icon_home"
                                    src="{{ asset('assets/images/svg/icon_home4.svg') }}" alt="Respaldo homie" />
                            </p>
                            <h3 class="p text-center mt-3 content_parrafos_home"><small>Comisiones extra y programa de
                                    referidos para asesores.</small></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section_banner">
            <div class="container-fluid">
                <div class="w-100 h-auto banner_home position-relative d-flex align-items-end">
                    <div class="h-auto">
                        <div class="overlay"></div>
                        <h2 class="text-white position-relative">Renta tu inmueble de forma segura
                            y con asesoría profesional
                        </h2>
                        <h1 class="text-white mt-2 p position-relative">Regístrate en Respaldo Homie y empieza a rentar
                            sin
                            preocupaciones, fácil
                            y con un proceso totalmente en línea.</h1>
                        <a class="btn btn-new-primary-lg text-center mt-4 position-relative"
                            href="{{ route('registro') }}">Registrarme</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-lg-top">
            <div class="container">
                <h2 class="text-verde text-center h1 fw-100">Nuestros beneficios</h2>
                <h3 class="text-center p mt-4">Con Respaldo Homie ofrecemos una amplia cobertura de servicios y
                    beneficios
                    para<br class="ocultar-sm" /> cada una de las
                    partes involucradas en la renta, ¡conócelos!</h3>
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <div class="tabs_home d-flex align-items-center justify-content-center">
                        <div class="h-auto">
                            <ul class="nav nav-tabs d-flex align-items-center justify-content-center" id="myTab"
                                role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">Propietarios</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">Inquilinos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                                        data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                                        aria-selected="false">Asesores</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 0.500244C7.4375 0.500244 0.5 7.43774 0.5 16.0002C0.5 24.5627 7.4375 31.5002 16 31.5002C24.5625 31.5002 31.5 24.5627 31.5 16.0002C31.5 7.43774 24.5625 0.500244 16 0.500244ZM21.75 20.0627L20.5 21.6252C20.3125 21.8752 20.0625 22.0627 19.6875 22.0627C19.5 22.0627 19.25 21.9377 19.125 21.8127L14.9375 18.6877C14.3125 18.2502 14 17.5627 14 16.7502V7.00024C14 6.50024 14.4375 6.00024 15 6.00024H17C17.5 6.00024 18 6.50024 18 7.00024V16.0002L21.625 18.6877C21.8125 18.8752 22 19.1252 22 19.4377C22 19.6877 21.875 19.9377 21.75 20.0627Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Recibe tu renta puntual cada mes y de
                                                        forma
                                                        segura.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="37" height="32" viewBox="0 0 37 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18.5 9.3125L7 18.8125V29C7 29.5625 7.4375 30 8 30H15C15.5 30 15.9375 29.5625 15.9375 29V23C15.9375 22.5 16.4375 22 16.9375 22H20.9375C21.5 22 21.9375 22.5 21.9375 23V29C21.9375 29.5625 22.4375 30 22.9375 30H30C30.5 30 31 29.5625 31 29V18.75L19.4375 9.3125C19.3125 9.1875 19.125 9.125 19 9.125C18.8125 9.125 18.625 9.1875 18.5 9.3125ZM36.6875 15.75L31.5 11.4375V2.8125C31.5 2.375 31.125 2.0625 30.75 2.0625H27.25C26.8125 2.0625 26.5 2.375 26.5 2.8125V7.3125L20.875 2.6875C20.375 2.3125 19.6875 2.0625 19 2.0625C18.25 2.0625 17.5625 2.3125 17.0625 2.6875L1.25 15.75C1.0625 15.875 0.9375 16.125 0.9375 16.3125C0.9375 16.5 1.0625 16.6875 1.125 16.8125L2.75 18.75C2.875 18.9375 3.0625 19 3.3125 19C3.5 19 3.6875 18.9375 3.8125 18.8125L18.5 6.75C18.625 6.625 18.8125 6.5625 19 6.5625C19.125 6.5625 19.3125 6.625 19.4375 6.75L34.125 18.8125C34.25 18.9375 34.4375 19 34.625 19C34.875 19 35.0625 18.9375 35.1875 18.75L36.8125 16.8125C36.9375 16.6875 37 16.5 37 16.3125C37 16.125 36.875 15.875 36.6875 15.75Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Nos aseguramos de que tu inmueble esté
                                                        protegido y tú estés tranquilo.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 16C20.375 16 24 12.4375 24 8C24 3.625 20.375 0 16 0C11.5625 0 8 3.625 8 8C8 12.4375 11.5625 16 16 16ZM21.5625 18H20.5C19.125 18.6875 17.625 19 16 19C14.375 19 12.8125 18.6875 11.4375 18H10.375C5.75 18 2 21.8125 2 26.4375V29C2 30.6875 3.3125 32 5 32H27C28.625 32 30 30.6875 30 29V26.4375C30 21.8125 26.1875 18 21.5625 18Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Realizamos una investigación completa de
                                                        tu inquilino para que te sientas más seguro.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M30 22.5002V1.50024C30 0.687744 29.3125 0.000244141 28.5 0.000244141H8C4.6875 0.000244141 2 2.68774 2 6.00024V26.0002C2 29.3127 4.6875 32.0002 8 32.0002H28.5C29.3125 32.0002 30 31.3752 30 30.5002V29.5002C30 29.0627 29.75 28.6252 29.4375 28.3752C29.125 27.3752 29.125 24.6252 29.4375 23.6877C29.75 23.4377 30 23.0002 30 22.5002ZM10 8.37524C10 8.18774 10.125 8.00024 10.375 8.00024H23.625C23.8125 8.00024 24 8.18774 24 8.37524V9.62524C24 9.87524 23.8125 10.0002 23.625 10.0002H10.375C10.125 10.0002 10 9.87524 10 9.62524V8.37524ZM10 12.3752C10 12.1877 10.125 12.0002 10.375 12.0002H23.625C23.8125 12.0002 24 12.1877 24 12.3752V13.6252C24 13.8752 23.8125 14.0002 23.625 14.0002H10.375C10.125 14.0002 10 13.8752 10 13.6252V12.3752ZM25.8125 28.0002H8C6.875 28.0002 6 27.1252 6 26.0002C6 24.9377 6.875 24.0002 8 24.0002H25.8125C25.6875 25.1252 25.6875 26.9377 25.8125 28.0002Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Cubrimos todos los gastos legales en caso
                                                        de necesitarlos.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="37" height="32" viewBox="0 0 37 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18.5 9.3125L7 18.8125V29C7 29.5625 7.4375 30 8 30H15C15.5 30 15.9375 29.5625 15.9375 29V23C15.9375 22.5 16.4375 22 16.9375 22H20.9375C21.5 22 21.9375 22.5 21.9375 23V29C21.9375 29.5625 22.4375 30 22.9375 30H30C30.5 30 31 29.5625 31 29V18.75L19.4375 9.3125C19.3125 9.1875 19.125 9.125 19 9.125C18.8125 9.125 18.625 9.1875 18.5 9.3125ZM36.6875 15.75L31.5 11.4375V2.8125C31.5 2.375 31.125 2.0625 30.75 2.0625H27.25C26.8125 2.0625 26.5 2.375 26.5 2.8125V7.3125L20.875 2.6875C20.375 2.3125 19.6875 2.0625 19 2.0625C18.25 2.0625 17.5625 2.3125 17.0625 2.6875L1.25 15.75C1.0625 15.875 0.9375 16.125 0.9375 16.3125C0.9375 16.5 1.0625 16.6875 1.125 16.8125L2.75 18.75C2.875 18.9375 3.0625 19 3.3125 19C3.5 19 3.6875 18.9375 3.8125 18.8125L18.5 6.75C18.625 6.625 18.8125 6.5625 19 6.5625C19.125 6.5625 19.3125 6.625 19.4375 6.75L34.125 18.8125C34.25 18.9375 34.4375 19 34.625 19C34.875 19 35.0625 18.9375 35.1875 18.75L36.8125 16.8125C36.9375 16.6875 37 16.5 37 16.3125C37 16.125 36.875 15.875 36.6875 15.75Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Renta el inmueble que desees sin necesidad
                                                        de tener aval.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="36" height="32" viewBox="0 0 36 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M0 27C0 28.6875 1.3125 30 3 30H33C34.625 30 36 28.6875 36 27V16H0V27ZM12 22.75C12 22.375 12.3125 22 12.75 22H21.25C21.625 22 22 22.375 22 22.75V25.25C22 25.6875 21.625 26 21.25 26H12.75C12.3125 26 12 25.6875 12 25.25V22.75ZM4 22.75C4 22.375 4.3125 22 4.75 22H9.25C9.625 22 10 22.375 10 22.75V25.25C10 25.6875 9.625 26 9.25 26H4.75C4.3125 26 4 25.6875 4 25.25V22.75ZM36 5C36 3.375 34.625 2 33 2H3C1.3125 2 0 3.375 0 5V8H36V5Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Paga tu renta de múltiples formas, sin
                                                        necesidad de salir de tu casa.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="40" height="32" viewBox="0 0 40 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M27.125 4H21.75C21.25 4 20.8125 4.1875 20.4375 4.5625L14.25 10.1875C13.25 11.1875 13.25 12.75 14.125 13.6875C14.9375 14.5625 16.5625 14.8125 17.625 13.875C17.625 13.875 17.625 13.875 17.6875 13.875L22.625 9.3125C23.0625 8.9375 23.6875 8.9375 24.0625 9.375C24.4375 9.75 24.4375 10.375 24 10.75L22.375 12.25L31.5 19.625C31.625 19.8125 31.8125 19.9375 31.9375 20.125V8L28.5625 4.625C28.1875 4.25 27.6875 4 27.125 4ZM34 8.0625V22.0625C34 23.125 34.875 24.0625 36 24.0625H40V8.0625H34ZM37 22.0625C36.4375 22.0625 36 21.5625 36 21.0625C36 20.5 36.4375 20.0625 37 20.0625C37.5 20.0625 38 20.5 38 21.0625C38 21.5625 37.5 22.0625 37 22.0625ZM0 24H4C5.0625 24 6 23.125 6 22V8.0625H0V24ZM3 20.0625C3.5 20.0625 4 20.5 4 21.0625C4 21.5625 3.5 22.0625 3 22.0625C2.4375 22.0625 2 21.5625 2 21.0625C2 20.5 2.4375 20.0625 3 20.0625ZM30.1875 21.1875L20.875 13.625L19 15.3125C17.125 17.0625 14.3125 16.875 12.625 15.0625C11 13.25 11.125 10.375 12.9375 8.6875L18.0625 4H12.8125C12.25 4 11.75 4.25 11.375 4.625L8 8V22H9.125L14.75 27.125C16.5 28.5625 19 28.25 20.375 26.5625H20.4375L21.5 27.5C22.5 28.3125 24 28.1875 24.8125 27.1875L26.75 24.75L27.125 25.0625C27.9375 25.75 29.1875 25.625 29.9375 24.75L30.5 24C31.1875 23.125 31.0625 21.875 30.1875 21.1875Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Asesoría en todo momento y respuesta a tu
                                                        aplicación en menos de 24 hrs.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18 8.50024V0.000244141H5.5C4.625 0.000244141 4 0.687744 4 1.50024V30.5002C4 31.3752 4.625 32.0002 5.5 32.0002H26.5C27.3125 32.0002 28 31.3752 28 30.5002V10.0002H19.5C18.625 10.0002 18 9.37524 18 8.50024ZM22 23.2502C22 23.6877 21.625 24.0002 21.25 24.0002H10.75C10.3125 24.0002 10 23.6877 10 23.2502V22.7502C10 22.3752 10.3125 22.0002 10.75 22.0002H21.25C21.625 22.0002 22 22.3752 22 22.7502V23.2502ZM22 19.2502C22 19.6877 21.625 20.0002 21.25 20.0002H10.75C10.3125 20.0002 10 19.6877 10 19.2502V18.7502C10 18.3752 10.3125 18.0002 10.75 18.0002H21.25C21.625 18.0002 22 18.3752 22 18.7502V19.2502ZM22 14.7502V15.2502C22 15.6877 21.625 16.0002 21.25 16.0002H10.75C10.3125 16.0002 10 15.6877 10 15.2502V14.7502C10 14.3752 10.3125 14.0002 10.75 14.0002H21.25C21.625 14.0002 22 14.3752 22 14.7502ZM28 7.62524C28 7.25024 27.8125 6.87524 27.5625 6.56274L21.4375 0.437744C21.125 0.187744 20.75 0.000244141 20.375 0.000244141H20V8.00024H28V7.62524Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Firma tu contrato con tu propietario de
                                                        forma 100% digital y segura.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="row mt-3">
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M31.5625 27.6877L25.3125 21.4377C25 21.1877 24.625 21.0002 24.25 21.0002H23.25C24.9375 18.8127 26 16.0627 26 13.0002C26 5.87524 20.125 0.000244141 13 0.000244141C5.8125 0.000244141 0 5.87524 0 13.0002C0 20.1877 5.8125 26.0002 13 26.0002C16 26.0002 18.75 25.0002 21 23.2502V24.3127C21 24.6877 21.125 25.0627 21.4375 25.3752L27.625 31.5627C28.25 32.1877 29.1875 32.1877 29.75 31.5627L31.5 29.8127C32.125 29.2502 32.125 28.3127 31.5625 27.6877ZM13 21.0002C8.5625 21.0002 5 17.4377 5 13.0002C5 8.62524 8.5625 5.00024 13 5.00024C17.375 5.00024 21 8.62524 21 13.0002C21 17.4377 17.375 21.0002 13 21.0002Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Perfila mejores inquilinos para tus
                                                        propiedades y propietarios con nuestra investigación completa.
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="37" height="32" viewBox="0 0 37 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M18.5 9.3125L7 18.8125V29C7 29.5625 7.4375 30 8 30H15C15.5 30 15.9375 29.5625 15.9375 29V23C15.9375 22.5 16.4375 22 16.9375 22H20.9375C21.5 22 21.9375 22.5 21.9375 23V29C21.9375 29.5625 22.4375 30 22.9375 30H30C30.5 30 31 29.5625 31 29V18.75L19.4375 9.3125C19.3125 9.1875 19.125 9.125 19 9.125C18.8125 9.125 18.625 9.1875 18.5 9.3125ZM36.6875 15.75L31.5 11.4375V2.8125C31.5 2.375 31.125 2.0625 30.75 2.0625H27.25C26.8125 2.0625 26.5 2.375 26.5 2.8125V7.3125L20.875 2.6875C20.375 2.3125 19.6875 2.0625 19 2.0625C18.25 2.0625 17.5625 2.3125 17.0625 2.6875L1.25 15.75C1.0625 15.875 0.9375 16.125 0.9375 16.3125C0.9375 16.5 1.0625 16.6875 1.125 16.8125L2.75 18.75C2.875 18.9375 3.0625 19 3.3125 19C3.5 19 3.6875 18.9375 3.8125 18.8125L18.5 6.75C18.625 6.625 18.8125 6.5625 19 6.5625C19.125 6.5625 19.3125 6.625 19.4375 6.75L34.125 18.8125C34.25 18.9375 34.4375 19 34.625 19C34.875 19 35.0625 18.9375 35.1875 18.75L36.8125 16.8125C36.9375 16.6875 37 16.5 37 16.3125C37 16.125 36.875 15.875 36.6875 15.75Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Te ayudamos con todo el proceso legal,
                                                        gestión de contrato y renovación.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 16C20.375 16 24 12.4375 24 8C24 3.625 20.375 0 16 0C11.5625 0 8 3.625 8 8C8 12.4375 11.5625 16 16 16ZM21.5625 18H20.5C19.125 18.6875 17.625 19 16 19C14.375 19 12.8125 18.6875 11.4375 18H10.375C5.75 18 2 21.8125 2 26.4375V29C2 30.6875 3.3125 32 5 32H27C28.625 32 30 30.6875 30 29V26.4375C30 21.8125 26.1875 18 21.5625 18Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Comisiones extra por colocación de
                                                        servicio y por referir a otros asesores.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12 mt-5 d-flex justify-content-center">
                                            <div class="row m-0">
                                                <div
                                                    class="col-lg-2 col-md-2 col-2 d-flex align-items-center justify-content-end pr-0">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M30 22.5002V1.50024C30 0.687744 29.3125 0.000244141 28.5 0.000244141H8C4.6875 0.000244141 2 2.68774 2 6.00024V26.0002C2 29.3127 4.6875 32.0002 8 32.0002H28.5C29.3125 32.0002 30 31.3752 30 30.5002V29.5002C30 29.0627 29.75 28.6252 29.4375 28.3752C29.125 27.3752 29.125 24.6252 29.4375 23.6877C29.75 23.4377 30 23.0002 30 22.5002ZM10 8.37524C10 8.18774 10.125 8.00024 10.375 8.00024H23.625C23.8125 8.00024 24 8.18774 24 8.37524V9.62524C24 9.87524 23.8125 10.0002 23.625 10.0002H10.375C10.125 10.0002 10 9.87524 10 9.62524V8.37524ZM10 12.3752C10 12.1877 10.125 12.0002 10.375 12.0002H23.625C23.8125 12.0002 24 12.1877 24 12.3752V13.6252C24 13.8752 23.8125 14.0002 23.625 14.0002H10.375C10.125 14.0002 10 13.8752 10 13.6252V12.3752ZM25.8125 28.0002H8C6.875 28.0002 6 27.1252 6 26.0002C6 24.9377 6.875 24.0002 8 24.0002H25.8125C25.6875 25.1252 25.6875 26.9377 25.8125 28.0002Z"
                                                            fill="#8B4986" />
                                                    </svg>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-10 d-flex justify-content-center">
                                                    <p class="text-morado">Evitas procesos complicados y gastos
                                                        legales a tus clientes.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mt-4">
                    <a class="btn btn-new-primary text-center mt-4" href="{{ route('registro') }}">Registrarme</a>
                </div>
            </div>
        </div>

        <div class="section-lg-top">
            <div class="container">
                <div class="pb-5">
                    <div class="h-auto">
                        <h2 class="text-primary text-center h1 fw-100">
                            ¿Cuál es el costo?
                        </h2>
                        <p class="mt-3 text-center">
                            Inquilinos y propietarios obtienen todos los beneficios del Respaldo Homie <br
                                class="ocultar-sm" />
                            por un solo pago inicial.</p>
                        <div class="row mt-5 d-flex align-items-center justify-content-center">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="card-precios">
                                    <h2 class="bold-ft text-verde text-center h3 mb-3">Pago único</h2>
                                    <p class="text-center"><small><strong><span class="bold-ft fw-900">A partir
                                                    de 15 días de renta + IVA</span></strong>
                                            <br />
                                            <span class="mt-3">
                                                El monto a pagar depende del resultado de la evaluación del
                                                inquilino.
                                                Entre propietario e inquilino pueden dividirse la cuota como lo
                                                decidan.
                                            </span>
                                        </small></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout-web>
