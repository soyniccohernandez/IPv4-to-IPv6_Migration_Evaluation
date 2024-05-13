<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/css/preguntas.css') }}">

    <main class="main">


        <div class="container">



            <div class="row">
                <div class="col-md-6">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-start flex-col">
                        <span class="d-none" id="preguntas">{{$preguntas}}</span>
                        <span class="icon_section_pregunta icon-{{$categoria->id}}"></span>
                        <h1 class="title_main">{{$categoria->descripcion}}</h1>
                        <span class="subtitle_main">Transición a IPv6 en la Empresa</span>

                    </div>
                </div>
                <div class="col-md-6">
                    <div id="pregunta_activa"></div>

                    <a href="#" class="btn btn-next">Siguiente</a>



                </div>



            </div>
        </div>
    </main>

    <script>
        let preguntasDom = document.getElementById('preguntas');
        let preguntasJsonString = preguntasDom.textContent;
        let preguntas = JSON.parse(preguntasJsonString);
        let dom = document.getElementById('pregunta_activa')
        let btn_next = document.querySelector('.btn-next');

        let preguntaActiva = 0;
        let consolidado = []
        let pregunta = []




        function dibujarPregunta() {


            let template = `
            <div class="template">
                            <p class="paragraph my-5">${preguntas[preguntaActiva].descripcion}</p>

                            <div class="content_options">
                                <a href="#" class="item_options">1</a>
                                <a href="#" class="item_options">2</a>
                                <a href="#" class="item_options">3</a>
                                <a href="#" class="item_options">4</a>
                                <a href="#" class="item_options">5</a>
                            </div>

                <p class="paragraph my-5">${preguntas[preguntaActiva].ponderacion}</p>
            </div>
        `
            dom.innerHTML = template;
        }


        function mostarBoton() {
            let contenedorPadre = document.querySelector('.content_options');


            contenedorPadre.addEventListener('click', function(event) {

                if (event.target.classList.contains('item_options')) {

                    let opcionSeleccionada = event.target.textContent.trim();
                    console.log('pregunta ' + preguntas[preguntaActiva].id)
                    console.log('Opción seleccionada:', opcionSeleccionada);


                    pregunta.push([preguntas[preguntaActiva].id, opcionSeleccionada])
                    console.log(pregunta)
                    btn_next.style.display = 'block';


                }
            });
        }



        function pasarPregunta() {


            btn_next.addEventListener('click', () => {
                let ultimoElemento = pregunta[pregunta.length - 1];
                consolidado.push(ultimoElemento)
                pregunta = []


                preguntaActiva++
                if (preguntaActiva < preguntas.length) {
                    btn_next.style.display = 'none';

                    dibujarPregunta()
                    mostarBoton()
                } else {
                    console.log(consolidado)
                    console.log('Se acabaron las preguntas de esta categoria')
                    btn_next.style.display = 'none';
                    dom.innerHTML = `
                    
                    <form method="POST" action="{{ route('matricularFase') }}" class="form-end-section" id="form_matricularFase">
                    @csrf
                        <p class="paragraph">
                            ¡Felicitaciones por haber finalizado esta etapa de evaluación para la migración a IPv6 en tu empresa! Pasar a la siguiente etapa es un gran logro y un paso importante hacia la modernización de tu infraestructura de red.
                        <p>
                        <input type="hidden" name="matricularFase_data" id="matricularFase_data""> 
                            <a href="#" class="btn btn-end-section w-100 d-block mt-5" id="enviar-seccion">Siguiente</a>

                    </form>
                    `;

                    matricularFase()

                }

            })

        }

        function matricularFase() {
            let btn_matricular = document.getElementById('enviar-seccion')
            btn_matricular.addEventListener('click', () => {
                btn_matricular.innerHTML = `
                <div class="spinner-border spinner-border-sm text-light" role="status">
                 <span class="visually-hidden">Loading...</span>
                </div>
                `
                setTimeout(() => {
                    let inputDataFase = document.getElementById('matricularFase_data')
                    data = JSON.stringify(consolidado);
                    inputDataFase.value = data


                    let formularioDataFase = document.getElementById('form_matricularFase')
                    formularioDataFase.submit();
                    // btn_matricular.innerHTML = 'Siguiente'
                }, 2000)


            })
        }


        dibujarPregunta()
        mostarBoton()
        pasarPregunta()
    </script>
</x-app-layout>