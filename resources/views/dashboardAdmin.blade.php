<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/css/menu-administrador.css') }}">

    <style>
        a{
            text-decoration: none;
        }
        .card-container-admin a{
            width:100%;
        }

    </style>

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

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between grow-1 w-100">
                    <div class="column-main">
                        <span class="icono_transicion"></span>
                        <h1 class="title_main">Administrador</h1>

                        <div class="card-container-admin d-flex gap-3 flex-wrap">
                            <a href="/usuarios/admin">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                            <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                            <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                                        </svg>
                                        <span class="fw-bold">USUARIOS</span>
                                    </div>
                                </div>
                            </a>
                            <a href="/preguntas/admin">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-question-mark">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4" />
                                            <path d="M12 19l0 .01" />
                                        </svg>
                                        <span class="fw-bold">PREGUNTAS</span>
                                    </div>
                                </div>
                            </a>
                            <a href="/recomendaciones/admin">
                                <div class="card">
                                    <div class="card-body d-flex flex-column gap-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-presentation">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M3 4l18 0" />
                                            <path d="M4 4v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-10" />
                                            <path d="M12 16l0 4" />
                                            <path d="M9 20l6 0" />
                                            <path d="M8 12l3 -3l2 2l3 -3" />
                                        </svg>
                                        <span class="fw-bold">RECOMENDACIONES</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="position-relative w-50 column_others">
                        <div class="data_person">
                            <!-- <span class="name_profile">NICOLÁS HERNÁNDEZ</span> -->
                            <!-- <span class="company_profile">ACTORES SOCIEDAD COLOMBIANA DE GESTIÓN</span> -->
                        </div>


                        <img class="logo_universidad" src="{{ asset('assets/logo/logo_horizontal_universidad.svg') }}"
                            alt="logo_universidad">
                    </div>
                </div>

            </div>
        </div>
    </main>
</x-app-layout>
