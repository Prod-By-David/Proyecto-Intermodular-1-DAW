<?php

/* ===================== CONTROL DE MENSAJES DEL FORMULARIO ===================== */
// Inicializo la variable para el texto del mensaje de alerta
$mensaje = '';
// Inicializo la variable para guardar la clase CSS (éxito o error)
$tipoMensaje = '';

// ===================== Verificamos parámetros GET enviados por procesar_formulario.php ===================== 
// Si por la URL llega el parámetro 'ok', el formulario se envió bien
if (isset($_GET['ok'])) {
    $mensaje = 'Inscripción enviada correctamente'; // Asigno texto de éxito
    $tipoMensaje = 'exito'; // Asigno clase CSS para estilos en verde
// Si por el contrario llega 'error', es que algo ha fallado en el servidor
} elseif (isset($_GET['error'])) {
    $mensaje = 'Error al enviar la inscripción'; // Asigno texto de error
    $tipoMensaje = 'error'; // Asigno clase CSS para estilos en rojo
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Club Deportivo Elemental en San Martín de Valdeiglesias. Entrenamiento funcional, HYROX y asesoramiento en suplementación deportiva.">
    <meta name="keywords" content="gimnasio, entrenamiento funcional, HYROX, suplementación deportiva, San Martín de Valdeiglesias">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Club Deportivo Elemental - One Wound One Victory</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="/proyecto_intermodular/assets/css/estilos.css?v=7">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar" role="navigation" aria-label="Menú principal">
    <div class="nav-container">

        <div class="logo">
            <a href="#hero" class="logo-link">
                <img src="../assets/img/favicon.png" alt="Logo One Wound One Victory" class="logo-img" loading="lazy">
                <span class="logo-text">ONE WOUND ONE VICTORY</span>
            </a>
        </div>

        <ul class="nav-links">
            <li><a href="#quienes">QUIÉNES SOMOS</a></li>
            <li><a href="#actividades">ACTIVIDADES</a></li>
            <li><a href="#suplementacion">SUPLEMENTACIÓN</a></li>
            <li><a href="#testimonios">TESTIMONIOS</a></li>
            <li><a href="#contacto">CONTACTO</a></li>
        </ul>
    </div>
</nav>

<section id="hero" class="parallax-section">
    <div class="hero-slider">
        <div class="slide active" style="background-image: url('../assets/img/hero1.png?v=2');"></div>
        <div class="slide" style="background-image: url('../assets/img/gimnasio1.png?v=2');"></div>
        <div class="slide" style="background-image: url('../assets/img/gimnasio2.png?v=2');"></div>
        <div class="slide" style="background-image: url('../assets/img/gimnasio3.png?v=2');"></div>
    </div>

    <div class="hero-overlay">
        <div class="hero-text">
            <p class="hero-top-title">CLUB DEPORTIVO ELEMENTAL</p><br>
            <h1>ONE WOUND<br>ONE VICTORY</h1><br>
            <p class="hero-subtitle">ENTRENA · RESPETA · AVANZA</p>
        </div>
    </div>
</section>

<section id="quienes" class="section-split fade-up">
    <div class="split-container">
        <div class="split-image">
            <img src="../assets/img/entrenadores.png?v=3" alt="Entrenadores del gimnasio" loading="lazy">
        </div>

        <div class="split-text">
            <span class="split-top-title">NUESTRA HISTORIA · NUESTROS VALORES</span><br>
            <h2>QUIÉNES SOMOS</h2>
            <hr class="title-line">
            <p>Somos un grupo de personas de la Sierra Oeste de Madrid: <strong>San Martín de Valdeiglesias</strong>. Creamos un gimnasio local por y para personas que buscan mejorar su forma física en un entorno cercano, profesional y motivador.</p>
            <p>Desde el primer día que comienzas en <strong>One Wound One Victory</strong>, ya formas parte de nuestra familia.</p>
        </div>
    </div>
</section>

<section id="actividades" class="fade-up">
    <div class="container-center">
        
        <header class="seccion-header">
            <span class="subtitulo-disciplinas">DISCIPLINAS · DÍAS · PRECIOS</span>
            <h2 class="titulo-actividades">ACTIVIDADES & HORARIOS</h2>
            <hr class="separador-titulo">
        </header>

        <div class="actividades-grid">
            
            <article class="actividad-card">
                <div class="card-body">
                    <h3>ENTRENAMIENTO FUNCIONAL</h3>
                    <p>Entrenamientos de lunes a viernes con total flexibilidad horaria.</p>
                    
                    <div class="horarios-container">
                        <h4>Horarios disponibles:</h4>
                        <div class="horarios-grid">
                            <time datetime="09:30-10:30">9:30 - 10:30</time>
                            <time datetime="14:00-15:00">14:00 - 15:00</time>
                            <time datetime="16:00-17:00">16:00 - 17:00</time>
                            <time datetime="17:00-18:00">17:00 - 18:00</time>
                            <time datetime="18:00-19:00">18:00 - 19:00</time>
                            <time datetime="19:00-20:00">19:00 - 20:00</time>
                            <time datetime="20:00-21:00">20:00 - 21:00</time>
                            <time datetime="21:00-22:00">21:00 - 22:00</time>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="precio">40€ <small>/ persona</small></div>
                </div>
            </article>

            <article class="actividad-card">
                <div class="card-body">
                    <h3>HYROX TRAINING</h3>
                    <p>Entrenamiento específico para competición HYROX, disponible los sábados.</p>
                    
                    <div class="horarios-container">
                        <h4>Horarios disponibles:</h4>
                        <div class="horarios-grid">
                            <time datetime="11:30-12:30">11:30 - 12:30</time>
                            <time datetime="12:30-13:30">12:30 - 13:30</time>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="precio">40€ <small>/ persona</small></div>
                </div>
            </article>

        </div> <div class="pack-oferta">
            <span class="badge">¡AHORRA MÁS!</span>
            <p>Combina ambas disciplinas: <strong>Funcional + HYROX</strong> por solo <span class="precio-pack">60€</span> al mes</p>
        </div>
    </div>
</section>

<section id="suplementacion" class="section-split reverse fade-up">
    <div class="split-container">
        <div class="split-text text-suplementacion">
            <span class="split-top-categories">RENDIMIENTO · NUTRICIÓN · RESULTADOS</span><br>
            <h2>SUPLEMENTACIÓN DEPORTIVA</h2>
            <hr class="title-line">
            <p><strong>Pablo Rodríguez García</strong> te asesora de forma personalizada en suplementación deportiva, ayudándote a encontrar lo mejor para tus objetivos físicos y de rendimiento.</p>
            
            <div class="suplementacion-buttons-container">
                <a href="https://api.whatsapp.com/send/?phone=34622360611&text=Hola%2C+me+gustar%C3%ADa+informaci%C3%B3n+sobre+suplementaci%C3%B3n+deportiva.&type=phone_number&app_absent=0" class="btn-suplementacion btn-wsp-neon" target="_blank" rel="noopener noreferrer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397 0 11.948 0c3.179.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.907-11.893 11.907-2.006-.001-3.973-.51-5.716-1.486L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.863-9.736.001-2.599-1.01-5.043-2.848-6.882-1.839-1.838-4.285-2.85-6.887-2.851-5.441 0-9.865 4.37-9.868 9.739-.001 1.761.481 3.435 1.411 4.919l-.952 3.475 3.565-.935zm11.567-5.69c-.31-.154-1.834-.894-2.115-.995-.281-.102-.485-.153-.687.154-.202.307-.783.995-.96 1.199-.177.205-.355.231-.665.077-.31-.154-1.31-.478-2.494-1.522-.92-.81-1.54-1.812-1.72-2.119-.18-.307-.018-.473.136-.626.14-.137.31-.354.464-.53.155-.178.207-.303.31-.506.103-.203.052-.381-.026-.536-.078-.154-.687-1.637-.942-2.237-.25-.595-.503-.514-.687-.523-.176-.01-.377-.011-.578-.011s-.528.075-.803.376c-.276.301-1.055 1.017-1.055 2.484 0 1.467 1.08 2.88 1.23 3.083.15.203 2.125 3.207 5.148 4.496.719.307 1.28.49 1.719.629.723.227 1.38.195 1.9.119.579-.086 1.834-.741 2.09-1.457.256-.716.256-1.33.18-1.457-.076-.127-.276-.203-.586-.358z"/>
                    </svg>Consultar por WhatsApp</a>
                <a href="#contacto" class="btn-suplementacion btn-contacto-negro">Formulario de Contacto</a>
            </div>
        </div>

        <div class="split-image">
            <img src="../assets/img/pablo.png?v=3" alt="Asesoramiento en suplementación deportiva" loading="lazy">
        </div>
    </div>
</section>

<section id="testimonios" class="fade-up">
    <div class="container-center">
        <header class="seccion-header">
            <span class="subtitulo-disciplinas">LO QUE DICEN · NUESTROS SOCIOS</span>
            <h2 class="titulo-actividades">TESTIMONIOS</h2>
            <hr class="separador-titulo">
        </header>

        <div class="testimonios-grid">
            <article class="testimonio-card active">
                <p class="testimonio-texto">"Desde que empecé en One Wound One Victory he cambiado completamente mi forma de entrenar. El ambiente es increíble y los entrenadores te exigen al máximo pero siempre con cabeza."</p>
                <footer class="testimonio-autor">
                    <strong>LAURA BLÁZQUEZ</strong>
                    <span>ENTRENAMIENTO FUNCIONAL</span>
                </footer>
            </article>

            <article class="testimonio-card">
                <p class="testimonio-texto">"Vine sin saber nada de HYROX y en pocos meses ya competí en mi primera carrera. El nivel de los entrenamientos y la comunidad no lo encuentras en otro sitio."</p>
                <footer class="testimonio-autor">
                    <strong>BELÉN LÓPEZ</strong>
                    <span>Pack Funcional + HYROX</span>
                </footer>
            </article>

            <article class="testimonio-card">
                <p class="testimonio-texto">"Llevo dos años aquí y sigo mejorando. Los sábados de HYROX son duros pero adictivos. He bajado más de 8 minutos mi tiempo de carrera desde que entreno con ellos."</p>
                <footer class="testimonio-autor">
                    <strong>ESTHER MANZANO</strong>
                    <span>HYROX Training</span>
                </footer>
            </article>

            <article class="testimonio-card">
                <p class="testimonio-texto">"El trato es muy cercano y familiar. No eres un número más. Se nota que les importa tu progreso real, no solo que pagues la cuota."</p>
                <footer class="testimonio-autor">
                    <strong>Juan Carlos Caride</strong>
                    <span>ENTRENAMIENTO FUNCIONAL</span>
                </footer>
            </article>

            <article class="testimonio-card">
                <p class="testimonio-texto">"Nunca pensé que me iba a enganchar tanto al deporte. Ahora no concibo la semana sin mis entrenamientos en OWOV. Ha cambiado mi vida."</p>
                <footer class="testimonio-autor">
                    <strong>Antonio Maqueda</strong>
                    <span>Pack Funcional + HYROX</span>
                </footer>
            </article>

            <article class="testimonio-card">
                <p class="testimonio-texto">"Si buscas un entreno de verdad, este es tu sitio. Nada de máquinas aburridas, aquí cada sesión es diferente y te va dejando sin palabras."</p>
                <footer class="testimonio-autor">
                    <strong>Nuria Cibeiro</strong>
                    <span>HYROX Training</span>
                </footer>
            </article>
        </div>
    </div>
</section>

<section id="contacto" class="fade-up contacto-section">
    <div class="container-center">
        <p class="contacto-subtitle">INSCRÍBETE &nbsp;&bull;&nbsp; EMPIEZA HOY</p>
        <h2 class="contacto-title">CONTACTO</h2>
        <hr class="contacto-divider">
        <p class="contacto-phones">Teléfonos: <span>622 36 06 11 / 637 44 95 05</span></p>

        <?php if (!empty($mensaje)): ?>
            <div class="mensaje <?php echo htmlspecialchars($tipoMensaje); ?>">
                <?php echo htmlspecialchars($mensaje); ?>
            </div>
        <?php endif; ?>

        <form action="procesar_formulario.php" method="POST" class="formulario" novalidate>
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <input type="tel" name="telefono" placeholder="Teléfono" required>
            <select name="actividad" required>
                <option value="">Selecciona actividad</option>
                <option value="funcional">Entrenamiento Funcional (40€)</option>
                <option value="hyrox">HYROX Training (40€)</option>
                <option value="pack">Pack Funcional + HYROX (60€)</option>
            </select>
            <button type="submit">ENVIAR INSCRIPCIÓN</button>
        </form>
    </div>
</section>

<footer class="footer-modern">
    <div class="footer-top">
        <div class="footer-left">
            <a href="lista_inscritos.php"><img src="../assets/img/favicon.png" alt="Logo One Wound One Victory" class="footer-logo"></a>
            <h3>ONE WOUND ONE VICTORY</h3>
            <p class="footer-subtitle">Club Deportivo Elemental</p>
            <p class="footer-location">San Martín de Valdeiglesias, Madrid</p>
        </div>

        <div class="footer-center">
            <h4>Contacto</h4>
            <p class="footer-phone">
                <svg class="footer-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6.62 10.79a15.15 15.15 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.27 11.72 11.72 0 003.7.59 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.72 11.72 0 00.59 3.7 1 1 0 01-.27 1.1l-2.2 2.19z"/>
                </svg>622 36 06 11</p>
            <p class="footer-phone">
                <svg class="footer-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M6.62 10.79a15.15 15.15 0 006.59 6.59l2.2-2.2a1 1 0 011.11-.27 11.72 11.72 0 003.7.59 1 1 0 011 1V20a1 1 0 01-1 1A17 17 0 013 4a1 1 0 011-1h3.5a1 1 0 011 1 11.72 11.72 0 00.59 3.7 1 1 0 01-.27 1.1l-2.2 2.19z"/>
                </svg>637 44 95 05</p>
        </div>
        <div class="footer-right">
            <h4>Síguenos</h4>
            <a href="https://www.instagram.com/onewoundonevictory" target="_blank" rel="noopener noreferrer" class="instagram-link">
                <svg class="footer-icon" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.051.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>@onewoundonevictory</a>
        </div>
    </div>
    <div class="footer-divider"></div>
    <div class="footer-bottom">
        <div class="footer-copy">© 2026 One Wound One Victory — Todos los derechos reservados</div>
    </div>
</footer>

<script src="/proyecto_intermodular/assets/js/scripts.js?v=7"></script>
</body>
</html>