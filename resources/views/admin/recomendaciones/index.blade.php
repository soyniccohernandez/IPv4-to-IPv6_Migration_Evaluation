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
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item item_bread"><a href="{{ route('dashboardAdmin') }}" class="nav-link">Menú
                            principal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Recomendaciones</li>
                </ol>
            </nav>
            <section class="actions d-flex justify-between align-center mt-3">
                <span class="title-section fw-bold fs-4">Gestión de recomendaciones</span>
                <span>
                    <button class="btn btn-primary" id="btn_nueva_recomendacion">Nueva recomendación</button>
                    {{-- <a href="" class="btn btn-secondary">Exportar recomendación</a> --}}
                </span>
            </section>
            <section class="data mt-3">
                <table class="table" id="table-recomendaciones">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">RECOMENDACIÓN</th>
                            <th scope="col">CATEGORIA</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recomendaciones as $recomendacion)
                            <tr>
                                <td>{{ $recomendacion->id }}</td>
                                <td>{{ $recomendacion->recomendacion }}</td>
                                <td data-id="{{ $recomendacion->id_categoria }}">{{ $recomendacion->categoria }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-center gap-3 align-center">
                                        <a href="#" class="nav nav-link btn_editar"
                                            data="{{ $recomendacion->id }}" id="btn_editar">Editar</a>

                                        <a href="#" class="nav nav-link text-warning btn_eliminar_recomendacion"
                                            id="btn_eliminar_recomendacion">Eliminar</a>

                                        <a href="/recomendaciones/eliminar/{{ $recomendacion->id }}" class="d-none"
                                            id="eliminar_registro"></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="titulo_modal">Actualizar recomendación</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column gap-4" id="formulario_agregar_actualizar_recomendacion"
                        method="POST" action="/recomendaciones/agregar_actualizar" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="operacion_formulario" id="operacion_formulario">
                        <input type="hidden" name="inputId" id="inputId">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingresa la recomendacion" name="inputRecomendacion" id="inputRecomendacion"
                                style="height: 100px"></textarea>
                            <label for="inputRecomendacion">Recomendación</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-control" name="inputCategoria" id="inputCategoria"
                                aria-label="Selecciona la categoria">
                                <option selected value="">Selecciona categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" data-id="{{ $categoria->id }}">
                                        {{ $categoria->descripcion }}</option>
                                @endforeach
                            </select>
                            <label for="inputCategoria">Fases para la migración iPV6</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary d-none"
                                id="btn_editar_recomendacion_formulario">Guardar cambios</button>
                            <button type="submit" class="btn btn-primary d-none"
                                id="btn_matricular_recomendacion_formulario">Matricular recomendación</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    @push('scripts')
        <script>
            new DataTable('#table-recomendaciones', {
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



            // Variables Recomendaciones

            let btnEditar = document.getElementById('btn_editar');
            let modal = document.getElementById('modalEditar');

            let campoId = document.getElementById('inputId')
            let campoRecomendacion = document.getElementById('inputRecomendacion')
            let campoCategoria = document.getElementById('inputCategoria')

            let btn_editar_recomendacion = document.getElementById('btn_editar_recomendacion_formulario')
            let btn_matricular_recomendacion_formulario = document.getElementById('btn_matricular_recomendacion_formulario')
            let formulario_agregar_actualizar_recomendacion = document.getElementById(
                'formulario_agregar_actualizar_recomendacion')



            nuevaRecomendacion()
            editarRecomendacion()
            eliminarPregunta()


            function nuevaRecomendacion() {


                // Controlar el evento keydown en el formulario
                formulario_agregar_actualizar_recomendacion.addEventListener('keydown', function(event) {
                    // Verificar si la tecla presionada es "Enter"
                    if (event.keyCode === 13) {
                        // Prevenir el comportamiento predeterminado del formulario (enviar)
                        event.preventDefault();
                    }
                });
                let btn_nueva_recomendacion = document.getElementById('btn_nueva_recomendacion')

                btn_nueva_recomendacion.addEventListener('click', () => {
                    document.getElementById('titulo_modal').innerHTML = "Nueva Recomendación"
                    btn_matricular_recomendacion_formulario.innerHTML = "Matricular recomendacion"
                    btn_matricular_recomendacion_formulario.classList.remove("d-none")
                    btn_editar_recomendacion.classList.add("d-none")


                    $('#modalEditar').modal('show');

                    btn_matricular_recomendacion_formulario.addEventListener('click', function(event) {
                        operacion_formulario.value = '1';
                        formulario_agregar_actualizar_recomendacion.submit();
                    });
                })
            }


            function editarRecomendacion() {

                // Controlar el evento keydown en el formulario
                formulario_agregar_actualizar_recomendacion.addEventListener('keydown', function(event) {
                    // Verificar si la tecla presionada es "Enter"
                    if (event.keyCode === 13) {
                        // Prevenir el comportamiento predeterminado del formulario (enviar)
                        event.preventDefault();
                    }
                });

                document.addEventListener('DOMContentLoaded', function() {
                    // Añadir evento click al contenedor de la tabla
                    document.getElementById('table-recomendaciones').addEventListener('click', function(event) {
                        btn_editar_recomendacion.classList.remove("d-none")
                        btn_matricular_recomendacion_formulario.classList.add("d-none")

                        // Verificar si el clic ocurrió en un enlace con la clase 'btn_editar'
                        if (event.target.classList.contains('btn_editar')) {
                            event.preventDefault(); // Prevenir el comportamiento por defecto del enlace

                            // Obtener la fila padre del enlace clicado
                            let row = event.target.closest('tr');

                            // Obtener los valores de las celdas de la fila
                            let id = row.children[0].textContent.trim();
                            let recomendacion = row.children[1].textContent.trim();
                            let categoria = row.children[2].getAttribute('data-id');

                            operacion_formulario.value = '2';
                            campoId.value = id
                            campoRecomendacion.value =  recomendacion
                            campoCategoria.value = categoria




                            // Mostrar el modal
                            $('#modalEditar').modal('show');
                        }

                    });
                });
                btn_editar_recomendacion.addEventListener('click', (event) => {
                    // event.preventDefault();
                    formulario_agregar_actualizar_recomendacion.submit();


                })

            }


            function eliminarPregunta() {
                let btn_eliminar_recomendacion = document.querySelectorAll('.btn_eliminar_recomendacion')


                let toastrConfirmacion; // Variable para almacenar el Toastr

                btn_eliminar_recomendacion.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        // Mostrar el Toastr con los botones Sí y No
                        toastrConfirmacion = toastr.warning('¿Estás seguro de que deseas continuar?',
                                'Confirmar eliminación', {
                                    closeButton: true,
                                    progressBar: true,
                                    positionClass: 'toast-bottom-center',
                                    showDuration: 300,
                                    hideDuration: 1000,
                                    timeOut: 10000,
                                    extendedTimeOut: 1000,
                                    showEasing: 'swing',
                                    hideEasing: 'linear',
                                    showMethod: 'fadeIn',
                                    hideMethod: 'fadeOut',
                                    progressBarColor: '#7F27FF',
                                    tapToDismiss: false,
                                }).css('width', '300px')
                            .append($('<button class="btn btn-success btn_alert">Sí</button>').click(
                                function() {
                                    toastr.remove(toastrConfirmacion);
                                    eliminarRegistro();
                                })).append($('<button class="btn btn-danger btn_alert">No</button>').click(
                                function() {
                                    toastr.remove(toastrConfirmacion); // Cerrar el Toastr
                                }));
                    });
                });

                function eliminarRegistro() {

                    document.getElementById('eliminar_registro').click()
                }
            }
        </script>
    @endpush
</x-app-layout>
