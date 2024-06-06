<?php
function getEndpointByToken($_endpoint, $_token)
{
    //echo 'endpoint: ' . $_endpoint . ' | token: ' . $_token;
    //Configuracion de la solicitud con cURL
    $ch = curl_init($_endpoint);
    //configurar Headers
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Bearer ' . $_token
    ));
    //configurar que contiene respuesta
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //ejecutar la solicitud / pegarle al endpoint
    $respuesta = curl_exec($ch);
    //verificar si existe una respuesta
    if ($respuesta === false) {
        return 'Error en la solicitud: ' . curl_error($ch);
    }
    //cerrar la sesion de cURL
    curl_close($ch);
    return $respuesta;
}

$endpointParcelas = getEndpointByToken('http://localhost/03-back/v3/parcelas/', 'get');
$endpointHistoria = getEndpointByToken('http://localhost/03-back/v3/historia/','get');
$endpointPreguntaFrecuente = getEndpointByToken('http://localhost/03-back/v3/pregunta-frecuente/', 'get');
// echo $endpointServices;
//transformar el contenido del endpoint en formato JSON
$endpointParcelas = json_encode($endpointParcelas);
$endpointHistoria = json_encode($endpointHistoria);
$endpointPreguntaFrecuente = json_encode($endpointPreguntaFrecuente);
// echo $endpointParcelas;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Terrasol Parcelas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>

<body>

    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg bg-light navbar-light fixed-top p-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#nosotros">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#parcelas">Parcelas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#servicios">Servicios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#preguntas">Preguntas Frecuentes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contacto">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Carrusel -->
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://plus.unsplash.com/premium_photo-1698086768776-2fe137e167df?q=80&w=1926&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-uppercase p-5 fs-1">Terrasol Parcelas</h5>
                    <p class="text-uppercase fs-4">Descubre tu lugar ideal en la naturaleza con Terrasol Parcelas, donde
                        tranquilidad y belleza se
                        unen.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://plus.unsplash.com/premium_photo-1663951812897-02ef7a050f3c?q=80&w=1975&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-uppercase p-5 fs-1">Terrasol Parcelas</h5>
                    <p class="text-uppercase fs-4">Descubre tu lugar ideal en la naturaleza con Terrasol Parcelas, donde
                        tranquilidad y belleza se
                        unen.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1697040093978-8b78a2ad66be?q=80&w=2066&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="text-uppercase p-5 fs-1">Terrasol Parcelas</h5>
                    <p class="text-uppercase fs-4">Descubre tu lugar ideal en la naturaleza con Terrasol Parcelas, donde
                        tranquilidad y belleza se
                        unen.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Nosotros -->

    <section id="nosotros" class="container">
        <h2 class="text-center p-5">Nosotros</h2>
        <p class="fs-4 mb-4">En Terrasol Parcelas, nos destacamos como un referente en el mercado inmobiliario de la zona centro-sur de Chile, ofreciendo parcelas de 5000 metros cuadrados a partir de solo 1 millón de pesos. Nuestro enfoque innovador y centrado en el cliente nos diferencia, proporcionando tours virtuales de las propiedades para una exploración cómoda desde casa. También ofrecemos opciones de parcelas con casas para aquellos que buscan una solución llave en mano, combinando naturaleza y comodidades modernas.</p>
        <p class="fs-4 mb-4">Comprometidos con la accesibilidad financiera, facilitamos la adquisición de tierras mediante crédito directo, eliminando la necesidad de pasar por bancos y trámites complicados. En Terrasol Parcelas, convertimos la inversión en tierras en una posibilidad realista, ofreciendo no solo propiedades, sino un estilo de vida en armonía con la naturaleza.</p>
        <p class="fs-4 text-center text-uppercase fw-bold">Terrasol Parcelas: tu aliado confiable para invertir en un futuro prometedor y una mejor calidad.</p>

    </section>

    <!-- Testimonios -->

    <section id="testimonios" class="container my-5">
        <div id="carouselExample" class="carousel slide carousel-dark slide">
            <h2 class="text-center p-5">Testimonios</h2>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="cards-wrapper">
                        <div class="cards">
                            <img class="card-img-top" src="./assets/img/test.png" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Ana Martínez</h5>
                                <p class="card-text fs-5">"Adquirir una parcela en Terrasol fue una de las mejores decisiones que hemos tomado. El proceso de compra fue sencillo y transparente, y ahora disfrutamos de un espacio increíble en plena naturaleza."</p>

                            </div>
                        </div>
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Carlos García</h5>
                                <p class="card-text fs-5">"Terrasol Parcelas nos ofreció exactamente lo que buscábamos: tranquilidad y un entorno natural privilegiado. Hemos construido nuestra casa aquí y no podríamos estar más felices."</p>

                            </div>
                        </div>
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Lucía Rodríguez</h5>
                                <p class="card-text fs-5">"El equipo de Terrasol nos brindó un servicio excepcional desde el primer contacto. Siempre estuvieron disponibles para resolver nuestras dudas y asegurarse de que estuviéramos satisfechos con nuestra compra."</p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="cards-wrapper">
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Javier Fernández</h5>
                                <p class="card-text fs-5">"Comprar una parcela con Terrasol nos dio la confianza que necesitábamos. Su compromiso con la calidad y la sostenibilidad es evidente en cada detalle."</p>

                            </div>
                        </div>
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">María Gómez</h5>
                                <p class="card-text fs-5">"Terrasol Parcelas es el lugar perfecto para nuestras escapadas de fin de semana. La tranquilidad y el contacto con la naturaleza son incomparables..</p>

                            </div>
                        </div>
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Pablo López</h5>
                                <p class="card-text fs-5">"Nuestra experiencia con Terrasol fue muy positiva. El equipo nos guió en cada paso del proceso y ahora disfrutamos de una hermosa parcela con vistas impresionantes.".</p>

                            </div>
                        </div>

                    </div>

                </div>
                <div class="carousel-item">
                    <div class="cards-wrapper">
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Sofía González</h5>
                                <p class="card-text fs-5">"Las parcelas de Terrasol están ubicadas en lugares con paisajes increíbles. Nos encanta despertar cada mañana y ver la naturaleza en su máximo esplendor."</p>

                            </div>
                        </div>
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Miguel Pérez</h5>
                                <p class="card-text fs-5">"Hemos encontrado en Terrasol el lugar ideal para nuestra familia. Los niños disfrutan jugando al aire libre y nosotros apreciamos la paz y la seguridad que ofrece."</p>

                            </div>
                        </div>
                        <div class="cards">
                            <img src="./assets/img/test.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fs-2 mt-5">Laura Sánchez</h5>
                                <p class="card-text fs-5">"Las parcelas de Terrasol están ubicadas en lugares con paisajes increíbles. Nos encanta despertar cada mañana y ver la naturaleza en su máximo esplendor."</p>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Parcelas -->

    <section id="parcelas" class="container">
        <h2 class="text-center p-5">Parcelas</h2>
        <div class="row">
    
        </div>
    </section>


    <!-- Servicios -->

    <section id="servicios" class="container">
        <h2 class="text-center p-5">Servicios</h2>
        <div class="row">
            <div class="col-md-3 mb-4 d-flex">
                <div class="card w-100">
                    <img src="./assets/img/03-parcela.jpg" class="card-img-top" alt="una imagen">
                    <div class="card-body">
                        <h5 class="card-title">Imagen Parcela</h5>
                        <p class="card-text"></p>
                        <a href="#contacto" class="btn btn-primary mt-auto">Contáctanos</a>
                    </div>
                </div>
            </div>

    </section>

    <!-- Preguntas Frecuentes-->

    <section id="preguntas" class="container p-2">
    <h2 class="text-center p-5">Preguntas Frecuentes</h2>
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <!-- Las preguntas frecuentes se insertarán aquí -->
    </div>
</section>

</section>

    <!-- Contacto -->
    <div class="mb-4 pt-5" id="contacto">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center p-5">Contacto</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-sm-12">
                    <div class="left-content">
                        <h3>Ubicación</h3>
                        <p>Entre Talca y la Región de los Lagos</p>
                        <h3>Teléfono y Whatsapp</h3>
                        <p>+56 9 5018 6583</p>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-sm-12">
                    <form id="contactForm" novalidate>
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input class="form-control" type="text" id="name" placeholder="Nombre" required>
                            <div class="invalid-feedback">Por favor, ingrese su nombre.</div>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" required>
                            <div class="invalid-feedback">Por favor, ingrese un correo electrónico válido.</div>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" class="form-control" id="address" placeholder="Dirección" name="direccion">
                        </div>
                        <div class="form-group">
                            <label for="message">Mensaje</label>
                            <textarea class="form-control" placeholder="Escribe tu Mensaje" id="message" required></textarea>
                            <div class="invalid-feedback">Por favor, ingrese su mensaje.</div>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="terms" name="terminos" required>
                            <label class="form-check-label" for="terms">Acepto los términos y condiciones</label>
                            <div class="invalid-feedback">Debe aceptar los términos y condiciones.</div>
                        </div>
                        <div class="g-recaptcha mb-3" data-sitekey="YOUR_RECAPTCHA_SITE_KEY"></div>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">

        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block fw-bold">
                <span>Nuestras redes sociales</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="https://web.facebook.com/tuparcelaenelsurdechile?mibextid=ZbWKwL&_rdc=1&_rdr" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://www.instagram.com/terrasol_parcelas?igsh=eG51a2w4NGx5ODJu" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>Terrasol Parcelas
                        </h6>
                        <p>
                            En Terrasol Parcelas, ofrecemos espacios únicos rodeados de naturaleza, perfectos para
                            construir la casa de tus sueños o para disfrutar de una escapada tranquila. Con una atención
                            personalizada y un compromiso con la sostenibilidad, hacemos realidad tus proyectos con la
                            máxima calidad y confianza.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Servicios
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Parcelas Residenciales</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Parcelass Comerciales</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Parcelas Ecológicas</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Parcelas Vacacionales</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Enlaces Útiles
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Planificación y Diseño</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Guía de Compra</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Servicios Adicionales</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Soporte</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">Contacto</h6>
                        <p><i class="fas fa-home me-3"></i> Entre Talca y la Region de Los Lagos</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            contacto@terrasol.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> +56 9 5018 6583</p>

                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Terrasol Parcelas</a>
        </div>
        <!-- Copyright -->
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./assets/js/funcion.js"></script>
    <script>
        const contenidoEndpointParcelas = JSON.parse(<?php echo $endpointParcelas ?>);
        printParcelas(contenidoEndpointParcelas);

        // const contenidoEndpointHistoria = JSON.parse(<?php echo $endpointHistoria ?>);
        // printHistoria(contenidoEndpointHistoria);

        const contenidoEndpointPreguntaFrecuente = JSON.parse(<?php echo $endpointPreguntaFrecuente?>);
        printPreguntaFrecuente(contenidoEndpointPreguntaFrecuente);

        // console.log(printPreguntaFrecuente);

        function printParcelas(_datos) {
    // console.log(_datos);
    let totalColumnasSM = 0;
    let totalColumnasMD = 0;
    let totalColumnasXL = 0;
    
    // Calcula el total de columnas activas
    _datos.data.forEach(element => {
        if (element.activo === true) {
            totalColumnasXL++;
        }
    });

    // Calcula el número de columnas en cada tamaño
    const totalColumnas = 12 / _datos.data.length;
    if (_datos.data.length <= 4) {
        totalColumnasXL = Math.round(12 / totalColumnasXL);
    } else {
        totalColumnasXL = 3;
    }
    totalColumnasMD = Math.round(totalColumnasXL * 2);
    totalColumnasSM = Math.round(totalColumnasXL * 2 * 2);
    // console.log(totalColumnasXL);
    // console.log(totalColumnasMD);
    // console.log(totalColumnasSM);

    // Selecciona el contenedor para las parcelas
    const rowParcelas = document.querySelector('#parcelas .row');
    rowParcelas.innerHTML = '';

    // Genera las columnas HTML
    _datos.data.forEach(element => {
        if (element.activo === true) {
            const columna = document.createElement('div');
            columna.classList.add('col-sm-' + totalColumnasSM);
            columna.classList.add('col-md-' + totalColumnasMD);
            columna.classList.add('col-xl-' + totalColumnasXL);
            columna.classList.add('my-2');

            const tarjeta = document.createElement('div');
            tarjeta.classList.add('card', 'w-100');

            const tarjetaHeader = document.createElement('div');
            tarjetaHeader.classList.add('card-header');
            tarjetaHeader.innerHTML = '<h5 class="card-title">' + element.nombre + '</h5>';

            const tarjetaBody = document.createElement('div');
            tarjetaBody.classList.add('card-body');
            tarjetaBody.innerHTML = `
                <p><strong>Pie:</strong> ${element.pie}</p>
                <p><strong>Terreno Ancho:</strong> ${element.terreno_ancho}</p>
                <p><strong>Terreno Largo:</strong> ${element.terreno_largo}</p>
                <p><strong>Terreno Despejado de Árboles:</strong> ${element.terreno_despejado_arboles}</p>
                <p><strong>Ubicación Latitud:</strong> ${element.ubicacion_latitud_gm}</p>
                <p><strong>Ubicación Longitud:</strong> ${element.ubicacion_longitud_gm}</p>
                <p><strong>Valor:</strong> ${element.valor}</p>
            `;

            const tarjetaFooter = document.createElement('div');
            tarjetaFooter.classList.add('card-footer');
            tarjetaFooter.innerHTML = '<a href="#contacto"><button class="btn btn-primary" onclick="cambiarServicio(\'' + element.id + '\')">Contáctanos</button></a>';

            tarjeta.appendChild(tarjetaHeader);
            tarjeta.appendChild(tarjetaBody);
            tarjeta.appendChild(tarjetaFooter);

            columna.appendChild(tarjeta);
            rowParcelas.appendChild(columna);
        }
    });
}

// Preguntas Frecuentes
function printPreguntaFrecuente(_datos) {
    console.log(_datos);
    const accordion = document.getElementById('accordionPanelsStayOpenExample');

    _datos.data.forEach((element, index) => {
        const preguntaId = element.id ? `panelsStayOpen-collapse-${element.id}` : `panelsStayOpen-collapse-${index}`;
        const isExpanded = index === 0 ? 'true' : 'false';

        const accordionItem = document.createElement('div');
        accordionItem.classList.add('accordion-item');

        const accordionHeader = document.createElement('h2');
        accordionHeader.classList.add('accordion-header');

        const accordionButton = document.createElement('button');
        accordionButton.classList.add('accordion-button', 'fs-4');
        accordionButton.setAttribute('type', 'button');
        accordionButton.setAttribute('data-bs-toggle', 'collapse');
        accordionButton.setAttribute('data-bs-target', `#${preguntaId}`);
        accordionButton.setAttribute('aria-expanded', isExpanded);
        accordionButton.setAttribute('aria-controls', preguntaId);
        accordionButton.textContent = element.pregunta;

        const accordionCollapse = document.createElement('div');
        accordionCollapse.classList.add('accordion-collapse', 'collapse');
        accordionCollapse.setAttribute('id', preguntaId);

        const accordionBody = document.createElement('div');
        accordionBody.classList.add('accordion-body');
        accordionBody.innerHTML = `<p>${element.respuesta}</p>`;

        accordionHeader.appendChild(accordionButton);
        accordionCollapse.appendChild(accordionBody);
        accordionItem.appendChild(accordionHeader);
        accordionItem.appendChild(accordionCollapse);

        accordion.appendChild(accordionItem);
    });

    // Agregar un evento para cerrar los paneles de acordeón al abrir uno nuevo
    const accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach(button => {
        button.addEventListener('click', () => {
            accordionButtons.forEach(btn => {
                if (btn !== button) {
                    btn.setAttribute('aria-expanded', 'false');
                }
            });
        });
    });
}


    </script>

</body>

</html>