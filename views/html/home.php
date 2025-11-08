<?php
include_once 'Layout/header.php'; ?>
<?php
if (!isset($_SESSION['user'])):
?>
    <div class="container mt-5">
        <h1>Bienvenido a la pagina de reservas en linea</h1>
        <p class="lead">Por favor, inicie sesión o cree una cuenta para continuar con su reserva.</p>
        <div class="d-flex gap-2">
            <div class="d-inline-block" style="width: 120px; height: 38px;">

                <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVA/index.php?action=validarusuario">Ingresar</a>
            </div>
            <div class="d-inline-block" style="width: 120px; height: 38px;">
                <a class="btn btn-success w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVA/index.php?action=registrarusuario">Registrarme</a>
            </div>
        </div>
    </div>


<?php
else:
?>
    <div class="container mt-5">
        <h1>Hola, <?= $_SESSION['user']['nombre'] ?>!</h1>
        <p class="lead">¿Listo para reservar tu habitación?</p>
        <div class="d-flex gap-2">
            <div class="d-inline-block" style="width: 200px; height: 38px;">
                <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVA/index.php?action=reservarhabitacion">Reservar Habitación</a>
            </div>
            <div class="d-inline-block" style="width: 120px; height: 38px;">
                <a class="btn btn-danger w-100 h-100 d-flex align-items-center justify-content-center" href="http://localhost/HOTEL_RESERVA/index.php?action=logout">Cerrar Sesión</a>
            </div>
        </div>
    </div>
<?php
endif;
include_once 'Layout/footer.php'; ?>