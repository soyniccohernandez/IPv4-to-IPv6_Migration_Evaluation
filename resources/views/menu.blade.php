<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/css/menu.css') }}">

    <main class="main">
        <div class="container">
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