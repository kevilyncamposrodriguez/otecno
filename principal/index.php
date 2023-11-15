<?php
include 'includes/header.php';
?>


<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active ">
                <img class="w-100" src="img/banner1.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h3 class="display-5 text-uppercase text-white mb-md-4">Ofrecemos opciones tecnologicas
                            utililes para tu pequeña o mediana empresa</h3>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Contáctanos</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img class="w-100" src="img/banner2.jpg" alt="Image">
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px;">
                        <h3 class="display-5 text-uppercase text-white mb-md-4">Contáctanos y lo desarrollaremos
                            para tí</h3>
                        <a href="" class="btn btn-primary py-md-3 px-md-5 mt-2">Contáctanos</a>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<!-- Carousel End -->

<!-- Testimonial Start -->
<div class="container-fluid bg-light py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 600px;">
        <h1 class="display-5 text-uppercase mb-4">Herramientas utililes <span class="text-primary">para su
                negocio</span>
        </h1>
    </div>
    <div class="row gx-0 align-items-center">
        <div class="col-xl-6 col-lg-5 d-none d-lg-block rounded-md" style="border-radius: 0.375rem;">
            <img class="img-fluid w-400 h-200 " style="border-radius: 1rem;" src="img/publicidad Otecno.png">
        </div>
        <div class="col-xl-6 col-lg-7 col-md-12">
            <div class="testimonial bg-light">
                <div class="owl-carousel testimonial-carousel">
                    <div class="row gx-4 align-items-center">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <img class="img-fluid w-100 h-100 bg-light p-lg-3 mb-4 mb-md-0" src="img/icono_f.png" alt="">
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7">
                            <h4 class="text-uppercase mb-0">Sistema de Facturación electrónica</h4>
                            <p>Facturador.otecno.es</p>
                            <p class="fs-5 mb-0"><i class="fa fa-2x fa-quote-left text-primary me-2"></i>
                                Sistema apto para trabajadores independientes, que le ofrece una facturación
                                sencilla, rápida y amigable; para que el tiempo de facturación
                                deje de ser un dolor de cabeza.
                            </p>
                        </div>
                    </div>
                    <div class="row gx-4 align-items-center">
                        <div class="col-xl-4 col-lg-5 col-md-5">
                            <img class="img-fluid w-100 h-100 bg-light p-lg-3 mb-4 mb-md-0" src="img/mas.png" alt="">
                        </div>
                        <div class="col-xl-8 col-lg-7 col-md-7">
                            <h4 class="text-uppercase mb-0">Lo desarrollamos para tí</h4>
                            <p>Desarrollo constante</p>
                            <p class="fs-5 mb-0"><i class="fa fa-2x fa-quote-left text-primary me-2"></i>
                                Tenemos personal capacitado para poner a tu dispocición y desarrollar para ti lo que
                                necesites.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->
<?php
include 'includes/footer.php';
?>