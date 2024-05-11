<x-app-layout>



    <main class="main">
        <div class="container">
            <div class="row">
                <div class="d-flex justify-content-between grow-1 w-100">
                    <div class="column-main w-50">
                        <span class="icono_transicion"></span>
                        <h1 class="title_main">Transición a IPv6 en la Empresa </h1>
                        <p class="paragraph my-5">Bienvenido al cuestionario sobre la transición a IPv6 en tu empresa.
                            Este
                            cuestionario evaluará el estado actual y las percepciones en tu organización con respecto a
                            la
                            implementación de IPv6. Por favor, responde las siguientes preguntas seleccionando la opción
                            que
                            mejor describa la situación en tu empresa. Tu retroalimentación nos ayudará a identificar
                            áreas
                            clave de enfoque y planificación para una transición exitosa a IPv6.</p>
                        <a href="{{url('/menu')}}" class="btn btn-light btn_next">Siguiente <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                    <div class="position-relative w-50 column_others">
                        <div class="data_person">
                            <!-- <span class="name_profile">NICOLÁS HERNÁNDEZ</span> -->
                            <!-- <span class="company_profile">ACTORES SOCIEDAD COLOMBIANA DE GESTIÓN</span> -->
                           

                        </div>


                        <img class="logo_universidad" src="{{ asset('assets/logo/logo_horizontal_universidad.svg') }}" alt="logo_universidad">
                    </div>
                </div>

            </div>
        </div>
    </main>
</x-app-layout>