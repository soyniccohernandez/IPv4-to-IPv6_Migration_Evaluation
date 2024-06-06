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


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.dataTables.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.dataTables.js"></script>

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


        // Manipulación de datos en el modal
        let btnEditar = document.getElementById('btn_editar');
        let modal = document.getElementById('modalEditar');

        // Campos modal
        let campoId = document.getElementById('inputId')
        let campoDescripcion = document.getElementById('inputDescripcion')
        let campoPonderacion = document.getElementById('inputPonderacion')
        let campoCategoria = document.getElementById('inputCategoria')
        let campoRespuesta = document.getElementById('inputRespuesta')
        let btn_editar_pregunta = document.getElementById('btn_editar_pregunta_formulario')
        let btn_matricular_pregunta_formulario = document.getElementById('btn_matricular_pregunta_formulario')
        let formulario_agregar_actualizar_pregunta = document.getElementById('formulario_agregar_actualizar_pregunta')

        let operacion_formulario = document.getElementById('operacion_formulario')

        // $('#modalEditar').modal('show');



        nuevaPregunta()
        editarPregunta()
        eliminarPregunta()


        function nuevaPregunta() {
            let btn_nueva_pregunta = document.getElementById('btn_nueva_pregunta')

            btn_nueva_pregunta.addEventListener('click', () => {
                document.getElementById('titulo_modal').innerHTML = "Nueva Pregunta"
                btn_matricular_pregunta_formulario.innerHTML = "Matricular pregunta"
                btn_matricular_pregunta_formulario.classList.remove("d-none")
                btn_editar_pregunta.classList.add("d-none")

                $('#modalEditar').modal('show');

                btn_matricular_pregunta_formulario.addEventListener('click', function(event) {
                    event.preventDefault(); // Evitar el envío del formulario por defecto
                    operacion_formulario.value = '1';
                    formulario_agregar_actualizar_pregunta.submit();
                });
            })
        }




        function editarPregunta() {


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
            btn_editar_pregunta.addEventListener('click', (event) => {
                // event.preventDefault();
                formulario_agregar_actualizar_pregunta.submit();


            })

        }


        function eliminarPregunta() {
            let btn_eliminar_pregunta = document.querySelectorAll('.btn_eliminar_pregunta')


            let toastrConfirmacion; // Variable para almacenar el Toastr

            btn_eliminar_pregunta.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    // Mostrar el Toastr con los botones Sí y No
                    toastrConfirmacion = toastr.warning('¿Estás seguro de que deseas continuar?', 'Confirmar eliminación', {
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
                        .append($('<button class="btn btn-success btn_alert">Sí</button>').click(function() {
                            toastr.remove(toastrConfirmacion);
                            eliminarRegistro();
                        })).append($('<button class="btn btn-danger btn_alert">No</button>').click(function() {
                            toastr.remove(toastrConfirmacion); // Cerrar el Toastr
                        }));
                });
            });

            function eliminarRegistro() {

                document.getElementById('eliminar_registro').click()
            }
        }
    </script>




</body>

</html>