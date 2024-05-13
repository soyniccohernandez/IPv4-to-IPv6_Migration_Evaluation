<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'UCOMPENSAR - CHATBOT IPV4') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('assets/favicon/favicon.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/general.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/intro.css') }}">



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <style>
        .toast {
            width: 500px;
        }
        /* Color principal personalizado */
        .toast-success {
            background-color: #7F27FF !important;
        }

        /* Margen inferior adicional */
        .toast-bottom-center {
            margin-bottom: 10rem !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">



    <script>
        // Configurar opciones personalizadas para Toastr
        toastr.options = {
            closeButton: true, // Mostrar botón de cierre
            progressBar: true, // Mostrar barra de progreso
            positionClass: 'toast-bottom-center', // Posición en el centro inferior
            showDuration: 300, // Duración de la animación de mostrar
            hideDuration: 1000, // Duración de la animación de ocultar
            timeOut: 100000, // Duración visible de la notificación
            extendedTimeOut: 100000, // Duración adicional para mantener visible
            showEasing: 'swing', // Efecto de animación al mostrar
            hideEasing: 'linear', // Efecto de animación al ocultar
            showMethod: 'fadeIn', // Método de animación al mostrar
            hideMethod: 'fadeOut', // Método de animación al ocultar
            progressBarColor: '#7F27FF' // Color personalizado de la barra de progreso
        };

        // Mostrar notificación Toastr al cargar la página
        toastr.success("{{ session('mensaje') }}", 'Mensaje');
    </script>

</body>

</html>