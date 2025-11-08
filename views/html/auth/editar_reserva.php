<?php
include_once "views/html/Layout/header.php";
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva tu Habitación</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="estilos.css">
</head>

<body class="bg-light">



    <div class="container mt-5">
        <div class="card shadow-lg mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <p class="text-end fw-bold mb-4">Hola <?= $_SESSION['user']['nombre'] ?>, Bienvenide</p>
                <br>


                <h3 class="text-center mb-4 fw-semibold">Edita Tu Reserva </h3>

                <form id="formReserva" action="index.php?action=editar" method="post" novalidate>
                    <!-- Habitaciones -->
                    <div class="mb-3">
                        <label for="habitacion" class="form-label fw-semibold">Habitaciones disponibles</label>
                        <select id="habitacion" name="habitacion" class="form-select" required>
                            <option value="">Seleccione una habitación</option>
                            <option value="11" <?= ($_SESSION['reserva_editar']['id_room'] == 11) ? 'selected' : '' ?>>101 -
                                Individual</option>
                            <option value="12" <?= ($_SESSION['reserva_editar']['id_room'] == 12) ? 'selected' : '' ?>>102
                                - Doble</option>
                            <option value="13" <?= ($_SESSION['reserva_editar']['id_room'] == 13) ? 'selected' : '' ?>>103
                                - Suite</option>
                            <option value="14" <?= ($_SESSION['reserva_editar']['id_room'] == 14) ? 'selected' : '' ?>>104
                                - Familiar</option>
                            <option value="15" <?= ($_SESSION['reserva_editar']['id_room'] == 15) ? 'selected' : '' ?>>105
                                - Economica</option>
                            <option value="16" <?= ($_SESSION['reserva_editar']['id_room'] == 16) ? 'selected' : '' ?>>106
                                - Accesible</option>
                            <option value="17" <?= ($_SESSION['reserva_editar']['id_room'] == 17) ? 'selected' : '' ?>>107
                                - PentHouse</option>
                            <option value="18" <?= ($_SESSION['reserva_editar']['id_room'] == 18) ? 'selected' : '' ?>>108
                                - Triple</option>
                            <option value="19" <?= ($_SESSION['reserva_editar']['id_room'] == 19) ? 'selected' : '' ?>>109
                                - Conferencia</option>
                            <option value="20" <?= ($_SESSION['reserva_editar']['id_room'] == 20) ? 'selected' : '' ?>>110
                                - Presidencial</option>
                        </select>
                        <div class="invalid-feedback">Por favor seleccione una habitación.</div>
                    </div>

                    <!-- Fechas -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="fecha_ingreso" class="form-label fw-semibold">Fecha de ingreso</label>
                            <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control"
                                value="<?= $_SESSION['reserva_editar']['checkin']; ?>">
                            <!-- <div class="invalid-feedback">Ingrese una fecha válida.</div> -->
                        </div>
                        <div class="col">
                            <label for="fecha_salida" class="form-label fw-semibold">Fecha de salida</label>
                            <input type="date" id="fecha_salida" name="fecha_salida" class="form-control"
                                value="<?php echo $_SESSION['reserva_editar']['checkout']; ?>">

                            <!-- <div class="invalid-feedback">Ingrese una fecha válida.</div> -->
                        </div>
                    </div>

                    <!-- Monto -->
                    <div class="mb-3">
                        <label for="monto" class="form-label fw-semibold">Monto a pagar</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" id="monto" name="monto" class="form-control" min="0"
                                value="<?php echo $_SESSION['reserva_editar']['pay']; ?>">
                        </div>
                    </div>

                    <!-- Observaciones -->
                    <div class="mb-3">
                        <label for="observaciones" class="form-label fw-semibold">Observaciones</label>
                        <textarea id="observaciones" name="observaciones" class="form-control" rows="3"
                            placeholder="Escribe tus observaciones aquí..."><?= $_SESSION['reserva_editar']['specialrequest'] ?></textarea>
                    </div>

                    <!-- Botones -->
                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Volver al Inicio</a>
                        <button type="submit" class="btn btn-success">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="views/js/Formulariodate.js"></script>
    <?php
    include_once "views/html/Layout/footer.php"; ?>
</body>

</html>