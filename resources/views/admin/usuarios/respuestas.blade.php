<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/css/crud.css') }}">
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
            toastr.success("{{ session('mensaje') }}", 'Notificación');
        </script>
        @endif

        <div class="row">


            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboardAdmin') }}" class="item_bread">Menú principal</a></li>
                    <li class="breadcrumb-item"><a href="/usuarios/admin" class="item_bread">Usuarios</a></li>
                    <li class="breadcrumb-item">{{$usuario->name}}</li>
                </ol>
            </nav>
            <section class="actions d-flex justify-between align-center mt-3">
                <span class="title-section fw-bold fs-4">{{$usuario->name}}</span>
                <span>
                    {{-- <button class="btn btn-primary" id="btn_nueva_recomendacion">Nueva recomendación</button> --}}
                    {{-- <a href="" class="btn btn-secondary">Exportar recomendación</a> --}}
                </span>
            </section>


            <section class="data mt-3">


                <table class="table" id="table-respuestas">
                    <thead>
                        <tr>
                            <th scope="col">PREGUNTA</th>
                            <th scope="col">RESPUESTA ESPERADA</th>
                            <th scope="col">RESPUESTA USUARIO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($respuestas as $respuesta)
                        <tr>
                            <td>
                                <div class="d-flex flex-column">
                                    <span>{{$respuesta->descripcion}}</span>
                                    <span class="text-primary">{{$respuesta->ponderacion}}</span>
                                </div>
                            </td>
                            <td>{{$respuesta->Respuesta_Esperada}}</td>
                            <td>{{$respuesta->Respuesta_Usuario}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>








    @push('scripts')
    <script>
        new DataTable('#table-respuestas', {
            pageLength: 5,
            lengthChange: false,
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    </script>
    @endpush
</x-app-layout>