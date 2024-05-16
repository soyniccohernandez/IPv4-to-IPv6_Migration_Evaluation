<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        @font-face {
            font-family: 'Montserrat-regular';
            src: url('/assets/fuentes/Montserrat-master/fonts/webfonts/Montserrat-Regular.woff2') format('woff2'),
                url('/assets/fuentes/Montserrat-master/fonts/webfonts/Montserrat-Regular.woff') format('woff'),
                url('/assets/fuentes/Montserrat-master/fonts/ttf/Montserrat-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        /* Fuente Black */
        @font-face {
            font-family: 'Montserrat-black';
            src: url('/assets/fuentes/Montserrat-master/fonts/webfonts/Montserrat-Black.woff2') format('woff2'),
                url('/assets/fuentes/Montserrat-master/fonts/webfonts/Montserrat-Black.woff') format('woff'),
                url('/assets/fuentes/Montserrat-master/fonts/ttf/Montserrat-Black.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }


        .main {
            font-family: 'Montserrat-regular';
        }

        .container {
            max-width: 1200px;
            display: block;
            width: 100%;
            margin: auto
        }

        .titular_recomendaciones {
            font-family: 'Montserrat-black';
            font-size: 2rem;
            margin-bottom: 2rem;
        }
        .logo{
            margin: 3rem 0;
        }
    </style>
    <main class="main">
        <div class="container">

            <img class="logo" src="https://ucompensar.edu.co/wp-content/uploads/2021/04/main-logo.svg" alt="Logo universidad">

            <div class="">{{Auth::user()->email}}</div>
            <div class="">{{Auth::user()->name}}</div>
            <h1 class="titular_recomendaciones">Implementación Efectiva de IPv6: Estrategias Claves para una Transición
                Exitosa</h1>
            @foreach ($recomendaciones as $recomendacion)
                <li>{{ $recomendacion->recomendacion }}</li>
                <!-- Reemplaza 'titulo' con el nombre de la propiedad que deseas mostrar -->
            @endforeach
        </div>
    </main>
</body>

</html>
