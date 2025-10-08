<?php
include_once 'views/html/Layout/header.php';
?>

<body class="bg-light">

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow p-4 border-success" style="min-width: 420px;">
            <h2 class="mb-4 text-center text-success">Crear Cuenta</h2>
            <form action="<?= SITE_URL ?>index.php?action=crearusuario" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white"><i class="bi bi-card-list"></i></span>
                            <select class="form-select border-success" id="tipo_documento" name="tipo_documento">
                                <option value="">Seleccione...</option>
                                <option value="1">Cédula de Ciudadanía</option>
                                <option value="2">Pasaporte</option>
                                <option value="3">Número de Extranjería</option>
                            </select>
                        </div>
                        <?php
                        if (isset($_SESSION['errors']['tipo_documento'])) {
                            echo '<small class="text-danger">' . $_SESSION['errors']['tipo_documento'] . '</small>';
                        }
                        ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="numero_documento" class="form-label">Número de Documento</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white"><i class="bi bi-hash"></i></span>
                            <input type="text" class="form-control border-success" id="numero_documento" name="numero_documento" value="<?= $_SESSION['old']['numero_documento'] ?? '' ?>">
                        </div>
                        <?php
                        if (isset($_SESSION['errors']['numero_documento'])) {
                            echo  '<small class="text-danger">' . $_SESSION['errors']['numero_documento'] . '</small>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control border-success" id="nombre" name="nombre" value="<?= $_SESSION['old']['nombre'] ?? '' ?>">
                        </div>
                        <?php
                        if (isset($_SESSION['errors']['nombre'])) {
                            echo '<small class="text-danger">' . $_SESSION['errors']['nombre']
                                . '</small>';
                        }
                        ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control border-success" id="apellido" name="apellido" value="<?= $_SESSION['old']['apellido'] ?? '' ?>">
                        </div>
                        <?php
                        if (isset($_SESSION['errors']['apellido'])) {
                            echo '<small class="text-danger">' . $_SESSION['errors']['apellido']
                                . '</small>';
                        }
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white"><i class="bi bi-telephone"></i></span>
                            <input type="tel" class="form-control border-success" id="telefono" name="telefono" value="<?= $_SESSION['old']['telefono'] ?? '' ?>">
                        </div>
                        <?php
                        if (isset($_SESSION['errors']['telefono'])) {
                            echo '<small class="text-danger">' . $_SESSION['errors']['telefono']
                                . '</small>';
                        }
                        ?>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <div class="input-group">
                            <span class="input-group-text bg-success text-white"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control border-success" id="email" name="email" value="<?= $_SESSION['old']['email'] ?? '' ?>">
                        </div>
                        <?php
                        if (isset($_SESSION['errors']['email'])) {
                            echo '<small class="text-danger">' . $_SESSION['errors']['email']
                                . '</small>';
                        }
                        ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text bg-success text-white"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control border-success" id="password" name="password">
                        <button class="btn btn-outline-success" type="button" id="togglePassword" tabindex="-1">
                            <i class="bi bi-eye" id="icon-eye"></i>
                        </button>
                    </div>
                    <?php
                    if (isset($_SESSION['errors']['password'])) {
                        echo '<small class="text-danger">' . $_SESSION['errors']['password']
                            . '</small>';
                    }
                    ?>
                </div>
                <ul class="condiciones">
                    <li id="mayus"><i class="bi bi-circle icon"></i> Al menos una mayúscula</li>
                    <li id="numero"><i class="bi bi-circle icon"></i> Al menos un número</li>
                    <li id="especial"><i class="bi bi-circle icon"></i> Al menos un carácter especial (!@#$...)</li>
                    <li id="longitud"><i class="bi bi-circle icon"></i> Mínimo 8 caracteres</li>
                </ul>
                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-person-plus"></i> Crear Cuenta
                    </button>
                </div>
                <div class="text-center mt-2">
                    <span>¿Ya tienes cuenta? <a href="<?= SITE_URL ?>index.php?action=validarusuario" class="text-success">Inicia sesión</a></span>
                </div>
            </form>
        </div>
    </div>
    <!-- Bootstrap JS y Bootstrap Icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script src="/Hotel_Reserva/views/js/showpassword_register.js"></script>
    <script src="/Hotel_Reserva/views/js/conditionpassword.js"></script>
</body>

<?php
// Limpiar errores y datos antiguos después de mostrarlos
if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
}
if (isset($_SESSION['old'])) {
    unset($_SESSION['old']);
}
?>


<?php
include_once 'views/html/Layout/footer.php';
?>