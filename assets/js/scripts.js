/* ===================== SLIDER AUTOMÁTICO HERO ===================== */
// Selecciona todos los elementos con la clase .slide y los guarda en un NodeList
var slides = document.querySelectorAll(".slide");
// Inicializa el índice del slide actual en 0 (el primero)
var currentSlide = 0;

// Función para gestionar la transición entre imágenes del slider
function cambiarSlide() {
    // Si no existen elementos con la clase .slide, detiene la ejecución
    if (slides.length === 0) return;

    // Quita la clase 'active' al slide que se está mostrando actualmente
    slides[currentSlide].classList.remove("active");

    // Incrementa el índice y usa el operador módulo para volver a 0 al llegar al final
    currentSlide = (currentSlide + 1) % slides.length;

    // Añade la clase 'active' al nuevo slide actual para mostrarlo
}

// Si el NodeList contiene elementos, activa el temporizador
if (slides.length > 0) {
    // Ejecuta la función cambiarSlide de forma cíclica cada 4000 milisegundos (4 segundos)
    setInterval(cambiarSlide, 4000);
}

/* ===================== SCROLL SUAVE ANCLAS ===================== */
// Selecciona todos los enlaces que su atributo href empiece por '#' (anclas internas)
var enlaces = document.querySelectorAll('a[href^="#"]');
// Define la altura en píxeles del menú de navegación para compensar el scroll
var navbarOffset = 90;

// Recorre cada uno de los enlaces encontrados
enlaces.forEach(function (enlace) {
    // Añade un escuchador de eventos para detectar el clic en cada enlace
    enlace.addEventListener("click", function (e) {
        // Busca en el DOM el elemento cuyo ID coincida con el href del enlace clicado
        var destino = document.querySelector(this.getAttribute("href"));

        // Si el elemento de destino no existe en la página, detiene la función
        if (!destino) return;

        // Cancela el comportamiento por defecto del enlace (el salto brusco)
        e.preventDefault();

        // Desplaza la ventana del navegador hasta la posición calculada
        window.scrollTo({
            // Resta la altura del menú a la posición superior del elemento destino
            top: destino.offsetTop - navbarOffset,
            // Aplica una animación de desplazamiento suave
            behavior: "smooth"
        });
    });
});

/* ===================== FADE-UP ===================== */
// Selecciona todos los elementos que tengan la clase .fade-up
var elementos = document.querySelectorAll(".fade-up");

// Crea una instancia del Intersection Observer para detectar cuándo los elementos entran en pantalla
var observer = new IntersectionObserver(function (entries) {
    // Recorre cada elemento que ha cambiado su estado de visibilidad
    entries.forEach(function (entry) {
        // Verifica si el elemento es visible actualmente en el viewport
        if (entry.isIntersecting) {
            // Le añade la clase 'visible' para activar la animación CSS
            entry.target.classList.add("visible");
            // Deja de observar el elemento para que la animación solo se ejecute una vez
            observer.unobserve(entry.target);
        }
    });
}, {
    // El callback se dispara cuando el 15% del elemento es visible en pantalla
    threshold: 0.15
});

// Recorre la lista de elementos .fade-up
elementos.forEach(function (el) {
    // Vincula cada elemento al observer para empezar a vigilarlo
    observer.observe(el);
});

/* ===================== AUTO SCROLL CONTACTO ===================== */
// Añade un evento que se ejecuta cuando toda la página y sus recursos se han cargado por completo
window.addEventListener("load", function () {
    // Comprueba si la URL actual incluye el hash específico '#contacto'
    if (window.location.hash === "#contacto") {
        // Busca el elemento con el ID #contacto en el DOM
        var contacto = document.querySelector("#contacto");

        // Si el elemento no existe en la página, corta la ejecución
        if (!contacto) return;

        // Retrasa la ejecución del scroll para asegurar que el navegador se ha estabilizado
        setTimeout(function () {
            // Realiza el scroll suave hacia la sección restando el margen del menú
            window.scrollTo({
                top: contacto.offsetTop - navbarOffset,
                behavior: "smooth"
            });
        }, 100); // Espera 100 milisegundos antes de mover la pantalla
    }
});

/* ===================== MENSAJE AUTO OCULTO ===================== */
// Busca el primer elemento que tenga la clase .mensaje
var mensaje = document.querySelector(".mensaje");

// Verifica si el mensaje existe en el DOM
if (mensaje) {
    // Configura un temporizador para ocultar el elemento tras un retraso
    setTimeout(function () {
        // Cambia la opacidad a 0 mediante CSS para hacerlo transparente
        mensaje.style.opacity = "0";
        // Desplaza el mensaje 10 píxeles hacia arriba con CSS para el efecto de desvanecimiento
        mensaje.style.transform = "translateY(-10px)";
    }, 4000); // El código se ejecuta de forma asíncrona a los 4 segundos
}

/* ===================== PARALLAX SUAVE ===================== */
// Añade un escuchador al evento scroll de la ventana global
window.addEventListener("scroll", function () {
    // Selecciona todas las secciones configuradas para tener efecto parallax
    var secciones = document.querySelectorAll(".parallax-section");
    // Calcula los píxeles de desplazamiento multiplicados por un factor para ralentizar el movimiento
    var scroll = window.scrollY * 0.15;

    // Recorre cada una de las secciones parallax encontradas
    secciones.forEach(function (sec) {
        // Modifica la posición vertical del fondo usando el valor calculado
        sec.style.backgroundPositionY = scroll + "px";
    });
});

/* ===================== CARRUSEL TESTIMONIOS ===================== */
// Selecciona todas las tarjetas de testimonios del DOM
var testimonioSlides = document.querySelectorAll(".testimonio-card");
// Inicializa el índice del testimonio activo en 0
var currentTestimonio = 0;

// Función para gestionar la rotación de los testimonios
function cambiarTestimonio() {
    // Valida que el NodeList contenga elementos antes de continuar
    if (testimonioSlides.length === 0) return;

    // Elimina la clase 'active' de la tarjeta de testimonio que se está mostrando
    testimonioSlides[currentTestimonio].classList.remove("active");

    // Calcula el índice del siguiente testimonio asegurando un bucle infinito con el operador de resto
    currentTestimonio = (currentTestimonio + 1) % testimonioSlides.length;

    // Asigna la clase 'active' a la nueva tarjeta para hacerla visible mediante CSS
    testimonioSlides[currentTestimonio].classList.add("active");
}

// Comprueba que existan testimonios creados en el HTML
if (testimonioSlides.length > 0) {
    // Llama de forma automática a la función cambiarTestimonio cada 5 segundos
    setInterval(cambiarTestimonio, 5000);
}