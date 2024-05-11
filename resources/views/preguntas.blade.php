<x-app-layout>
    <link rel="stylesheet" href="{{ asset('assets/css/preguntas.css') }}">
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-start flex-col">
                        <span class="d-none" id="preguntas">{{$preguntas}}</span>
                        <span class="icon_section_pregunta"></span>
                        <h1 class="title_main">Hardware </h1>
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
        

        function dibujarPregunta(){
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
        dibujarPregunta()

        consolidado.push(preguntas[preguntaActiva].id)



       
        let contenedorPadre = document.querySelector('.content_options');

       
        contenedorPadre.addEventListener('click', function(event) {
            
            if (event.target.classList.contains('item_options')) {
               
                let opcionSeleccionada = event.target.textContent.trim();

              
                console.log('Opción seleccionada:', opcionSeleccionada);
                
                consolidado.push(opcionSeleccionada)

                console.log(consolidado)
                btn_next.style.display = 'block';

                
            }
        });


        btn_next.addEventListener('click', () =>{
            preguntaActiva++
            dibujarPregunta()

        })




    </script>
</x-app-layout>