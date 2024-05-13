

<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">

    <main class="main">
        <div class="container">

        @if(session('mensaje'))
        <script>
            // Configurar opciones personalizadas para Toastr
            toastr.options = {
                closeButton: true,          // Mostrar botón de cierre
                progressBar: true,          // Mostrar barra de progreso
                positionClass: 'toast-bottom-center',  // Posición en el centro inferior
                showDuration: 300,          // Duración de la animación de mostrar
                hideDuration: 1000,         // Duración de la animación de ocultar
                timeOut: 10000,              // Duración visible de la notificación
                extendedTimeOut: 1000,      // Duración adicional para mantener visible
                showEasing: 'swing',        // Efecto de animación al mostrar
                hideEasing: 'linear',       // Efecto de animación al ocultar
                showMethod: 'fadeIn',       // Método de animación al mostrar
                hideMethod: 'fadeOut',      // Método de animación al ocultar
                progressBarColor: '#7F27FF' // Color personalizado de la barra de progreso
            };

            // Mostrar notificación Toastr al cargar la página
            toastr.success("{{ session('mensaje') }}", 'Fase Completada');
        </script>
    @endif
            <div class="row">
                <div class="col-md-4">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-cente flex-column">
                        <img class="" src="{{ asset('assets/logo/logo_universidad_light.svg') }}" alt="Logotipo Universidad Compensar">
                        <p class="paragraph my-5">Cada fase contiene preguntas específicas relacionadas con aspectos
                            clave
                            de la implementación de IPv6 en tu infraestructura.</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="content-grid">

                        @foreach($categorias as $categoria)
                        <a href="/fase/{{$categoria->id}}" class="item_grid">
                            <span class="icon_item icon_{{$categoria->id}}"></span>
                            <span class="text-item-menu">{{$categoria->descripcion}}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>