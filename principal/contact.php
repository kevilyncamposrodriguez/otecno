<?php
include 'includes/header.php';
?>
<!-- Page Header Start -->
<div class="container-fluid page-header-contact">
    <h1 class="display-3 text-uppercase text-white mb-3">Contacto</h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="">Inicio</a></h6>
        <h6 class="text-white m-0 px-3">/</h6>
        <h6 class="text-uppercase text-white m-0">Contacto</h6>
    </div>
</div>
<!-- Page Header Start -->


<!-- Contact Start -->
<div class="container-fluid py-6 px-5">
    <div class="text-center mx-auto mb-5" style="max-width: 800px;">
        <h4 class="display-5 text-uppercase mb-4">Por favor <span class="text-primary">llena el formulario</span>
            para contactarte con nosostros.</h4>
    </div>
    <div class="row gx-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0" style="height: 600px;">
            <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3931.1372182183563!2d-83.86908777931303!3d9.83884077133754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa1205c1dbcb1e7%3A0x9d1c45cb86655c7c!2sProvincia%20de%20Cartago%2C%20Para%C3%ADso!5e0!3m2!1ses!2scr!4v1678747858128!5m2!1ses!2scr" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-lg-6">
            <div class="contact-form bg-light p-5">
                <div class="row g-3">
                    <div class="col-12 col-sm-6">
                        <input type="text" class="form-control border-0" placeholder="Nombre" style="height: 55px;">
                    </div>
                    <div class="col-12 col-sm-6">
                        <input type="email" class="form-control border-0" placeholder="Correo" style="height: 55px;">
                    </div>
                    <div class="col-12">
                        <input type="text" class="form-control border-0" placeholder="Asunto" style="height: 55px;">
                    </div>
                    <div class="col-12">
                        <textarea class="form-control border-0" rows="4" placeholder="Mensaje"></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
<?php
include 'includes/footer.php';
?>