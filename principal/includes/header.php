<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>O-Tecno - Pag. Principal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Opciones Tecnologicas, tecnologia, desarrollo de aplicaciones, sistemas, factura electronica" name="keywords">
    <meta content="Opciones Tecnologicas" name="description">
    <meta property="og:image" content="https://otecno.es/icono.png" />
    <!-- Favicon -->
    <link href="img/icono.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid px-5 d-none d-lg-block">
        <div class="row gx-5">
            <div class="col-lg-3 text-center py-3">
                <a href="https://goo.gl/maps/a5oo5rbEVSUjybTKA" target="_blank" class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Visitanos</h6>
                        <span>Paraiso, Cartago</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 text-center border-start border-end py-3">
                <a href="mailto:info@otecno.es" class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Correo</h6>
                        <span>info@otecno.es</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 text-center border-start border-end py-3">
                <a href="tel:64177897" class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Llamanos</h6>
                        <span>+506 6417-7897</span>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 text-center py-3">
                <a href="https://wa.me/+50664177897" target="_blank" class="d-inline-flex align-items-center">
                    <i class="bi bi-whatsapp fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase fw-bold">Whatsapp</h6>
                        <span>+506 6417-7897</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-dark bg-light-radial shadow-sm px-5 pe-lg-0">
        <nav class="navbar navbar-expand-lg bg-dark bg-light-radial navbar-dark py-3 py-lg-0">
            <a href="index.php" class="navbar-brand">
                <img class="logo" src="img/logo_b.png" alt="Otecno" width="190px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.php" class="nav-item nav-link" <?php if($_SERVER['SCRIPT_NAME']=="/index.php") { ?> class="active" <?php } ?> >Inicio</a>
                    <a href="about.php" class="nav-item nav-link">Nosotros</a>
                    <div class="nav-item dropdown">
                        <a href="service.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Servicios</a>
                        <div class="dropdown-menu m-0">
                            <a href="https://facturador.otecno.es/" target="_blank" class="dropdown-item">Facturador Eléctronico</a>
                            <!-- Navbar Start
                            <a href="service.html" class="dropdown-item">Expedientes Médicos</a>
                            <a href="service.html" class="dropdown-item">Portal Académico</a>
                            -->
                            <a href="service.php" class="dropdown-item">Otros servicios</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link bg-primary text-white px-5 ms-3 d-none d-lg-block">Contáctanos <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->