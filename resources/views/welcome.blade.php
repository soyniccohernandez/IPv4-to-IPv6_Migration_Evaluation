<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Migración IPv4 a IPv6</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/general.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <style>
        /* Color principal personalizado */
        .toast-success {
            background-color: #7F27FF !important;
        }

        /* Margen inferior adicional */
        .toast-bottom-center {
            margin-bottom: 5rem !important;
        }

        body {
            font-family: 'Montserrat-regular';
            box-sizing: border-box;
        }

        .btn-index {
            background-color: var(--primary-color);
            color: var(--white);
            font-family: 'Montserrat-medium';
            font-size: 16px;
            padding: 1em 1.5em;
            border-radius: 16px;
            display: inline;
        }

        .btn-index:hover {
            background-color: var(--white);
            color: var(--primary-color);
        }

        .navbar {
            backdrop-filter: blur(10px);
            /* Aplicar el efecto blur */
            -webkit-backdrop-filter: blur(10px);
            /* Para compatibilidad con navegadores basados en WebKit */
        }

        .banner_main {
            display: block;
            width: 98%;
            margin: auto;
            border-radius: 32px;
            background-image: url("{{ asset('assets/img/banner.webp') }}");
            background-position: center center;
            background-size: cover;
            margin-top: 8rem;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3rem;
            flex-direction: column;
        }

        .title-main {
            color: var(--white);
            font-family: 'Montserrat-black';
            max-width: 500px;
            line-height: 3.5rem;
        }

        .content-data-banner {
            position: absolute;
            top: 0;
            left: 0;
        }

        .section_one {
            font-size: 2rem;
            line-height: 2.5rem;
            text-align: center;
        }

        .parrafo-index {
            width: 70%;
            margin: auto;
        }

        .title_section {
            font-size: 3rem;
            line-height: 3.5rem;
            font-family: 'Montserrat-black';
        }

        .section_two {
            margin: 10rem 0;
        }

        .footer_navs a:hover {
            color: var(--primary-color) !important;
        }

        .companys {
            margin-top: 6rem !important;
        }

        .resalt {
            color: var(--primary-color);
        }
    </style>
</head>

<body>



    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="w-100 px-5">
            <div class="w-100 d-flex justify-content-between align-items-center">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                <ul class="navbar-nav">
                    <span class="fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-grid-scan">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 8v8" />
                            <path d="M14 8v8" />
                            <path d="M8 10h8" />
                            <path d="M8 14h8" />
                            <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                            <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                            <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                            <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                        </svg>
                        Migración IPv4 a IPv6</span>
                </ul>
                <a href="http://127.0.0.1:8000/login" class="btn btn-index" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-grid-scan">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M10 8v8" />
                        <path d="M14 8v8" />
                        <path d="M8 10h8" />
                        <path d="M8 14h8" />
                        <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                        <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                        <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                        <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                    </svg>
                    Quiero saber si estamos listos</a>
            </div>
        </div>
    </nav>

    <div class="main position-relative">
        <span class="banner_main">
            <div class="d-flex justify-content-center align-items-center gap-5">
                <div class="">
                    <div class="title-main">
                        Asegura tu Red para el Mañana: Transición de IPv4 a IPv6
                    </div>
                    <a href="http://127.0.0.1:8000/login" class="btn btn-index btn-one">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-grid-scan">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M10 8v8" />
                            <path d="M14 8v8" />
                            <path d="M8 10h8" />
                            <path d="M8 14h8" />
                            <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                            <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                            <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                            <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                        </svg>
                        Quiero saber si estamos listos
                    </a>
                </div>
                <img src="{{ asset('assets/vectores/ilustracion_main.svg') }}" alt="" class="w-25">
            </div>
        </span>

        <section class="section_one mt-5">
            <img src="{{ asset('assets/img/company_01.png') }}" alt="" class="w-50 mt-5 companys">
            <div class="container">
                <div class="parrafo-index">
                    Adopta el cambio y optimiza la eficiencia de tu empresa con la <span class="resalt">migración de IPv4 a IPv6</span>. Las grandes empresas de tecnología ya migraron; la tuya no puede quedarse atrás. <span class="resalt">Asegúrate un futuro conectado</span> y una comunicación segura y sin límites.
                </div>

            </div>
            <img src="{{ asset('assets/img/company_02.png') }}" alt="" class="w-50 mt-5">
        </section>

        <section class="section_two">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="h-100 d-flex justify-content-center flex-column">
                            <span class="title_section">
                                Con <span class="resalt">IPv6</span>, la conectividad empresarial <span class="resalt"> nunca se perderá</span> un momento
                            </span>
                            <p class="mt-3">Ya sea una videoconferencia con tu equipo de trabajo o una rápida consulta con un cliente, sentirás que estás con ellos en la misma sala, gracias a la eficiencia y estabilidad de IPv6.</p>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <img src="{{ asset('assets/vectores/ilustracion_section_page.svg') }}" alt="" class="w-75">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <footer class="bg-dark p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="d-flex flex-column">
                        <x-application-logo-white class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        <a href="http://127.0.0.1:8000/login" class="btn btn-index d-inline-block w-50">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-grid-scan">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M10 8v8" />
                                <path d="M14 8v8" />
                                <path d="M8 10h8" />
                                <path d="M8 14h8" />
                                <path d="M4 8v-2a2 2 0 0 1 2 -2h2" />
                                <path d="M4 16v2a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v2" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-2" />
                            </svg>
                            Iniciar
                        </a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column gap-3 p-5 footer_navs">
                        <a href="https://ucompensar.edu.co/" class="nav-link text-white">Ucompensar</a>
                        <a href="https://gobiernodigital.mintic.gov.co/692/articles-150529_G20_Transicion_IPv4_IPv6.pdf" class="nav-link text-white">Gobierno</a>
                        <a href="https://www.icesi.edu.co/revistas/index.php/sistemas_telematica/article/view/2153/2739" class="nav-link text-white">Icesi</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column gap-3 p-5 footer_navs">
                        <a href="https://mintic.gov.co/portal/715/w3-propertyvalue-133049.html" class="nav-link text-white">MINTIC Colombia</a>
                        <a href="https://docs.oracle.com/cd/E56339_01/html/E53785/gmxei.html" class="nav-link text-white">Oracle Migración a IPv6</a>
                        <a href="https://www.ibm.com/docs/es/ibm-mq/9.1?topic=mq-internet-protocol-version-6-ipv6-migration" class="nav-link text-white">IBM Migración a IPv6</a>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="d-flex flex-column gap-3 p-5 footer_navs">
                        <a href="https://repositoriocrai.ucompensar.edu.co/entities/publication/568efb9c-f164-40db-a16c-eeb486fb7f40" class="nav-link text-white">Compensar Migración</a>
                        <a href="https://heimcore.com.co/solucion/ipv6/" class="nav-link text-white">Heimcore</a>
                        <a href="https://github.com/soyniccohernandez/chatbot.git" class="nav-link text-white">Repositorio GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    @if (session('mensaje'))
    <script>
        // Configurar opciones personalizadas para Toastr
        toastr.options = {
            closeButton: true, // Mostrar botón de cierre
            progressBar: true, // Mostrar barra de progreso
            positionClass: 'toast-bottom-center', // Posición en el centro inferior
            showDuration: 300, // Duración de la animación de mostrar
            hideDuration: 1000, // Duración de la animación de ocultar
            timeOut: 10000, // Duración visible de la notificación
            extendedTimeOut: 1000, // Duración adicional para mantener visible
            showEasing: 'swing', // Efecto de animación al mostrar
            hideEasing: 'linear', // Efecto de animación al ocultar
            showMethod: 'fadeIn', // Método de animación al mostrar
            hideMethod: 'fadeOut', // Método de animación al ocultar
            progressBarColor: '#7F27FF' // Color personalizado de la barra de progreso
        };

        // Mostrar notificación Toastr al cargar la página
        toastr.success("{{ session('mensaje') }}", 'Fase Completada');
    </script>
    @endif
</body>

</html>