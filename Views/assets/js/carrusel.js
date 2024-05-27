//Variables
let indiceActual = 0;

// Función para inicializar el carrusel y agregar eventos a las imágenes
function inicializarCarrusel() {
    ocultarDescripciones();
    const imagenes = document.querySelectorAll('.carrusel-slide img');
    imagenes.forEach(img => {
        img.onmouseover = () => agrandarImagen(img); // Evento mouseover
        img.onmouseout = () => reducirImagen(img); // Evento mouseout
        img.onclick = () => mostrarDescripcion(img.getAttribute('data-index')); // Evento click
    });


}



// Función para ocultar todas las descripciones al cargar la página
function ocultarDescripciones() {
    const descripciones = document.querySelectorAll('.description');
    descripciones.forEach(desc => desc.style.display = 'none');
}

// Función para agrandar la imagen cuando se pasa el cursor sobre ella
function agrandarImagen(img) {
    img.style.transform = 'scale(2)';
}

// Función para reducir la imagen a su tamaño original cuando se retira el cursor
function reducirImagen(img) {
    img.style.transform = 'scale(1)';
}

// Función para mostrar la descripción correspondiente al hacer clic en la imagen
function mostrarDescripcion(indice) {
    ocultarDescripciones(); // Oculta todas las descripciones antes de mostrar la seleccionada
    const desc = document.getElementById(`desc-${indice}`);
    desc.style.display = 'block';
}

    // Función para mover el carrusel a una imagen específica
    function moverAImagen(indice) {
        const slide = document.getElementById('carrusel-slide');
        indiceActual = indice;
        slide.style.transform = `translateX(${-indiceActual * 800}px)`;
        actualizarIndicadores();
    }

     // Función para actualizar los indicadores del carrusel
     function actualizarIndicadores() {
        const indicadores = document.querySelectorAll('.carrusel-indicador .indicador');
        indicadores.forEach((indicador, index) => {
            if (index === indiceActual) {
                indicador.classList.add('active');
            } else {
                indicador.classList.remove('active');
            }
        });
    }



    // Función para mover el carrusel a la siguiente imagen
    function moverASiguienteImagen() {
        const slide = document.getElementById('carrusel-slide');
        if(slide){
            indiceActual = (indiceActual + 1) % 5;
            slide.style.transform = `translateX(${-indiceActual * 800}px)`;
            actualizarIndicadores();
        }


    }

    // Función para mover el carrusel a la imagen anterior
    function moverAImagenAnterior() {
        const slide = document.getElementById('carrusel-slide');
        indiceActual = (indiceActual - 1 + 5) % 5;
        slide.style.transform = `translateX(${-indiceActual * 800}px)`;
        actualizarIndicadores();

    }

        // Función para actualizar los indicadores del carrusel
        function actualizarIndicadores() {
            const indicadores = document.querySelectorAll('.carrusel-indicador .indicador');
            indicadores.forEach((indicador, index) => {
                if (index === indiceActual) {
                    indicador.classList.add('active');
                } else {
                    indicador.classList.remove('active');
                }
            });
        }

 // Ejecutar inicializarCarrusel cuando la página haya terminado de cargarse
 window.onload = inicializarCarrusel;



// Mover la imagen cada 3 segundos, con la función setInterval
setInterval(moverASiguienteImagen, 3000);