<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/resultados.css') }}">

    <main class="main">
        <div class="container">

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
            <div class="row">
                <div class="col-md-4">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-cente flex-column">
                        <img class="" src="{{ asset('assets/logo/logo_universidad_light.svg') }}"
                            alt="Logotipo Universidad Compensar">
                        <p class="paragraph my-5">
                            ¡Felicidades por completar la evaluación para la migración a IPv6! Los resultados que ves en estas tarjetas representan un análisis detallado de la preparación de tu organización para esta transición fundamental en el mundo de las tecnologías de la información. Cada tarjeta refleja no solo tus respuestas, sino también áreas clave a considerar en el proceso de migración. Utiliza esta información para identificar fortalezas, áreas de mejora y para avanzar hacia una infraestructura más robusta y preparada para el futuro de Internet. ¡Bien hecho!</p>
                            <a href="/resultados/reporte/email" class="btn btn-resultados">Recibir recomendaciones</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-grid">
                        
                        @foreach ($resultados as $resultado)
                            <a href="#" class="item_grid ">
                                <span class="resultado_procentaje">{{ $resultado->aprobado }}%</span>
                                <span class="text-item-menu">{{ $resultado->descripcion }} {{ $resultado->id }}</span>
                            </a>
                        @endforeach
                    </div>


                    {{-- <span id="recomendaciones">{{$recomendaciones}}</span> --}}
                </div>
            </div>
        </div>
    </main>
</x-app-layout>

<script>

</script>
