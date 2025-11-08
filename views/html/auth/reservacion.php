<?php
include_once "views/html/Layout/header.php";
?>
<pre>
    <?php if (isset($_GET['id'])): ?>
        <?php echo $_GET['id']; ?>
    <?php endif; ?>
</pre>

<body class="bg-light">

    <div class="container  min-vh-100 py-5">
        <h2 class="text-center mb-5 fw-bold">Mis reservas</h2>
        <a href="index.php?action=generar_reporte&id=<?= $reserva['id'] ?>" class="btn btn-info btn-sm" target="_blank">Generar Reporte</a>
        <a href="index.php?action=generar_excel" class="btn btn-success btn-sm" target="_blank">Generar Excel</a>

        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-info text-center">
                <?php echo $_SESSION['mensaje']; ?>
            </div>
        <?php endif; ?>

        <div class="table-responsive">
            <table class="table table-bordered align-middle text-center shadow-sm bg-white">
                <thead class="table-success">
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Habitación</th>
                        <th>Fecha de ingreso</th>
                        <th>Fecha de salida</th>
                        <th>Observación</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (isset($_SESSION['reservas'])): ?>
                        <?php foreach ($_SESSION['reservas'] as $reserva): ?>

                            <tr>
                                <td><?php echo htmlspecialchars($reserva['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['apellido']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['habitacion']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['checkin']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['checkout']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['specialrequest']); ?></td>
                                <td><?php echo htmlspecialchars($reserva['estado']); ?></td>

                                <td>
                                    <a href="index.php?action=editar_reserva&id=<?= $reserva['id'] ?>" class="btn btn-warning btn-sm me-2">Modificar</a>
                                    <a href="index.php?action=eliminar_reserva&id=<?= $reserva['id'] ?>"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('¿Seguro que deseas eliminar esta reserva?');">
                                        Eliminar
                                    </a>
                                    <a data-id="<?= $reserva['id'] ?>" class="btn btn-info enviaremail btn-sm me-2">Enviar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center"><?php echo $_SESSION['reservas_Mensaje']; ?></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="views/js/email.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</body>
<?php include_once "views/html/Layout/footer.php"; ?>