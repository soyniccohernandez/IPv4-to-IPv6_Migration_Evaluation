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

        @if ($errors->any())

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong class="d-block">Se encontraron algunos errores</strong>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="row">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item item_bread"><a href="{{ route('dashboardAdmin') }}" class="nav-link">Menú
                            principal</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Preguntas</li>
                </ol>
            </nav>
            <section class="actions d-flex justify-between align-center mt-3">
                <span class="title-section fw-bold fs-4">Gestión de preguntas</span>
                <span>
                    <button class="btn btn-primary" id="btn_nueva_pregunta">Nueva pregunta</button>
                    {{-- <a href="" class="btn btn-secondary">Exportar preguntas</a> --}}
                </span>
            </section>
            <section class="data mt-3">
                <table class="table" id="table-preguntas">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">DESCRIPCIÓN</th>
                            <th scope="col">PONDERACIÓN</th>
                            <th scope="col">CATEGORIA</th>
                            <th scope="col">REPUESTA</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($preguntas as $pregunta)
                        <tr>
                            <td>{{ $pregunta->id }}</td>
                            <td>{{ $pregunta->descripcion }}</td>
                            <td>{{ $pregunta->ponderacion }}</td>
                            <td data-id="{{ $pregunta->categoria_id }}">{{ $pregunta->categoria }}</td>
                            <td class="text-center">{{ $pregunta->respuesta }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-center gap-3 align-center">
                                    <a href="#" class="nav nav-link btn_editar" data="{{ $pregunta->id }}"
                                        id="btn_editar">Editar</a>

                                    <a href="#" class="nav nav-link text-warning btn_eliminar_pregunta"
                                        id="btn_eliminar_pregunta">Eliminar</a>

                                    <a href="/preguntas/eliminar/{{ $pregunta->id }}" class="d-none"
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
                    <h1 class="modal-title fs-5" id="titulo_modal">Actualizar pregunta</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="d-flex flex-column gap-4" id="formulario_agregar_actualizar_pregunta" method="POST"
                        action="/preguntas/agregar_actualizar" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="operacion_formulario" id="operacion_formulario">
                        <input type="hidden" name="inputId" id="inputId">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingresa la pregunta" name="inputDescripcion" id="inputDescripcion"
                                style="height: 100px"></textarea>
                            <label for="inputDescripcion">Pregunta</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Ingresa la ponderación de respuesta" name="inputPonderacion"
                                id="inputPonderacion" style="height: 100px"></textarea>
                            <label for="inputPonderacion">Ponderación</label>
                        </div>
                        <div class="form-floating">
                            <select class="form-control" name="inputCategoria" id="inputCategoria"
                                aria-label="Selecciona la categoria">
                                <option selected value="">Selecciona categoria</option>
                                @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" data-id="{{ $categoria->id }}">
                                    {{ $categoria->descripcion }}
                                </option>
                                @endforeach
                            </select>
                            <label for="inputCategoria">Fases para la migración iPV6</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" placeholder="Ingresa la respuesta para esta pregunta"
                                name="inputRespuesta" id="inputRespuesta" style="height: 100px">
                            <label for="inputRespuesta">Respuesta</label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary d-none"
                                id="btn_editar_pregunta_formulario">Guardar cambios</button>
                            <button type="submit" class="btn btn-primary d-none"
                                id="btn_matricular_pregunta_formulario">Matricular pregunta</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    @push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.21.0/jquery.validate.min.js" integrity="sha512-KFHXdr2oObHKI9w4Hv1XPKc898mE4kgYx58oqsc/JqqdLMDI4YjOLzom+EMlW8HFUd0QfjfAvxSL6sEq/a42fQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        new DataTable('#table-preguntas', {
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

        $('#modalEditar').on('hidden.bs.modal', function() {
            // Limpia todos los campos del formulario
            $('#formulario_agregar_actualizar_pregunta')[0].reset();
        });





        // Variables Preguntas
        let btnEditar = document.getElementById('btn_editar');
        let modal = document.getElementById('modalEditar');

        let campoId = document.getElementById('inputId')
        let campoDescripcion = document.getElementById('inputDescripcion')
        let campoPonderacion = document.getElementById('inputPonderacion')
        let campoCategoria = document.getElementById('inputCategoria')
        let campoRespuesta = document.getElementById('inputRespuesta')

        let btn_editar_pregunta = document.getElementById('btn_editar_pregunta_formulario')
        let btn_matricular_pregunta_formulario = document.getElementById('btn_matricular_pregunta_formulario')
        let formulario_agregar_actualizar_pregunta = document.getElementById('formulario_agregar_actualizar_pregunta')
        let operacion_formulario = document.getElementById('operacion_formulario')








        nuevaPregunta()
        editarPregunta()
        eliminarPregunta()




        function nuevaPregunta() {

            $('#modalEditar').on('hidden.bs.modal', function() {
                // Limpia todos los campos del formulario
                $('#formulario_agregar_actualizar_pregunta')[0].reset();
            });


            // Controlar el evento keydown en el formulario
            formulario_agregar_actualizar_pregunta.addEventListener('keydown', function(event) {
                // Verificar si la tecla presionada es "Enter"
                if (event.keyCode === 13) {
                    // Prevenir el comportamiento predeterminado del formulario (enviar)
                    event.preventDefault();
                }
            });
            let btn_nueva_pregunta = document.getElementById('btn_nueva_pregunta')

            btn_nueva_pregunta.addEventListener('click', () => {
                document.getElementById('titulo_modal').innerHTML = "Nueva Pregunta"
                btn_matricular_pregunta_formulario.innerHTML = "Matricular pregunta"
                btn_matricular_pregunta_formulario.classList.remove("d-none")
                btn_editar_pregunta.classList.add("d-none")
                operacion_formulario.value = '1';


                $('#modalEditar').modal('show');

                $(formulario_agregar_actualizar_pregunta).validate({
                    rules: {
                        inputDescripcion: {
                            required: true, // Campo obligatorio
                        },
                        inputPonderacion: {
                            required: true, // Campo obligatorio
                        },
                        inputCategoria: {
                            required: true, // Campo obligatorio
                        },
                        inputRespuesta: {
                            required: true, // Campo obligatorio
                            range: [1, 5] // Permitir solo valores entre 1 y 5
                        }
                    },
                    messages: {
                        inputDescripcion: {
                            required: "La descripción es obligatoria.",
                        },
                        inputPonderacion: {
                            required: "La ponderación es obligatoria.",
                        },
                        inputCategoria: {
                            required: "Debes seleccionar una categoría.",
                        },
                        inputRespuesta: {
                            required: "La respuesta es obligatoria.",
                            range: "La respuesta debe estar entre 1 y 5."
                        }
                    },
                    submitHandler: function(form) {
                        // Si la validación es exitosa, cambia el valor y envía el formulario

                        // form.submit();
                        formulario_agregar_actualizar_pregunta.submit();
                    }
                });
            })
        }









        function editarPregunta() {
            // Controlar el evento keydown en el formulario
            formulario_agregar_actualizar_pregunta.addEventListener('keydown', function(event) {
                // Verificar si la tecla presionada es "Enter"
                if (event.keyCode === 13) {
                    // Prevenir el comportamiento predeterminado del formulario (enviar)
                    event.preventDefault();
                }
            });

            document.addEventListener('DOMContentLoaded', function() {
                // Añadir evento click al contenedor de la tabla
                document.getElementById('table-preguntas').addEventListener('click', function(event) {
                    btn_editar_pregunta.classList.remove("d-none")
                    btn_matricular_pregunta_formulario.classList.add("d-none")

                    // Verificar si el clic ocurrió en un enlace con la clase 'btn_editar'
                    if (event.target.classList.contains('btn_editar')) {
                        event.preventDefault(); // Prevenir el comportamiento por defecto del enlace

                        // Obtener la fila padre del enlace clicado
                        let row = event.target.closest('tr');

                        // Obtener los valores de las celdas de la fila
                        let id = row.children[0].textContent.trim();
                        let descripcion = row.children[1].textContent.trim();
                        let ponderacion = row.children[2].textContent.trim();
                        let categoria = row.children[3].getAttribute('data-id');
                        let respuesta = row.children[4].textContent.trim();

                        // Mostrar los valores en la consola
                        operacion_formulario.value = '2';
                        campoId.value = id;
                        campoDescripcion.value = descripcion;
                        campoPonderacion.value = ponderacion;
                        campoCategoria.value = categoria;
                        campoRespuesta.value = respuesta;



                        // Mostrar el modal
                        $('#modalEditar').modal('show');
                    }

                });
            });

            $(formulario_agregar_actualizar_pregunta).validate({
                rules: {
                    inputDescripcion: {
                        required: true, // Campo obligatorio
                    },
                    inputPonderacion: {
                        required: true, // Campo obligatorio
                    },
                    inputCategoria: {
                        required: true, // Campo obligatorio
                    },
                    inputRespuesta: {
                        required: true, // Campo obligatorio
                        range: [1, 5] // Permitir solo valores entre 1 y 5
                    }
                },
                messages: {
                    inputDescripcion: {
                        required: "La descripción es obligatoria.",
                    },
                    inputPonderacion: {
                        required: "La ponderación es obligatoria.",
                    },
                    inputCategoria: {
                        required: "Debes seleccionar una categoría.",
                    },
                    inputRespuesta: {
                        required: "La respuesta es obligatoria.",
                        range: "La respuesta debe estar entre 1 y 5."
                    }
                },
                submitHandler: function(form) {
                    // Si la validación es exitosa, cambia el valor y envía el formulario
                    form.submit();
                }
            });
        }


        function eliminarPregunta() {
            let btn_eliminar_pregunta = document.querySelectorAll('.btn_eliminar_pregunta')


            let toastrConfirmacion; // Variable para almacenar el Toastr

            btn_eliminar_pregunta.forEach(function(btn) {
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

        function eliminarPregunta() {
            // Delegación de eventos en el contenedor de la tabla
            document.getElementById('table-preguntas').addEventListener('click', function(event) {
                // Verificar si el clic ocurrió en un botón con la clase 'btn_eliminar_pregunta'
                if (event.target.classList.contains('btn_eliminar_pregunta')) {
                    // Mostrar el Toastr con los botones Sí y No
                    let toastrConfirmacion = toastr.warning(
                            '¿Estás seguro de que deseas continuar?',
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
                                tapToDismiss: false
                            }).css('width', '300px')
                        .append($('<button class="btn btn-success btn_alert">Sí</button>').click(function() {
                            toastr.remove(toastrConfirmacion);
                            eliminarRegistro(); // Llamar a la función de eliminación
                        }))
                        .append($('<button class="btn btn-danger btn_alert">No</button>').click(function() {
                            toastr.remove(toastrConfirmacion); // Cerrar el Toastr si elige "No"
                        }));
                }
            });

            function eliminarRegistro() {
                // Aquí realiza la eliminación del registro
                document.getElementById('eliminar_registro').click();
            }
        }
    </script>
    @endpush
</x-app-layout>