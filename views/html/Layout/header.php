<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de reservas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center ">
        <div class="container-fluid ">
            <div>
                <a class="navbar-brand ms-3" href="<?= SITE_URL ?>index.php">Sistemas de Reservas Hotel</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse justify-content-center" id="navbarMain">
                <?php
                if (!isset($_SESSION['user'])):

                ?>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= SITE_URL ?>index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Habitaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pagos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reporte</a>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= SITE_URL ?>index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Habitaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=reservacion">Mis Reservas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=reservarhabitacion">Nueva Reserva</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">PQR</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto me-3">
                        <li class="nav-item dropdown custom-dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                usuario
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Mi Perfil</a></li>
                                <li><a class="dropdown-item" href="index.php?action=logout">Cerrar Sesión</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>