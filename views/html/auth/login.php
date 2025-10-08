<?php
include_once "views/html/Layout/header.php";
if (isset($_SESSION['mensaje'])) {
    echo $_SESSION['mensaje'];
}
?>

<body class="bg-light">
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow p-4" style="min-width: 350px;">
            <h2 class="mb-4 text-center">Iniciar Sesión</h2>
            <form action="<?= SITE_URL ?>index.php?action=loginusuario" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" autofocus value="<?= $_SESSION['old']['password'] ?? '' ?>">
                </div>
                <?php
                if (isset($_SESSION['errors']['email'])) {
                    echo  '<small class="text-danger">' . $_SESSION['errors']['email'] . '</small>';
                }
                ?>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <?php
                if (isset($_SESSION['errors']['password'])) {
                    echo  '<small class="text-danger">' . $_SESSION['errors']['password'] . '</small>';
                }
                ?>
                <div class="d-grid mb-2">
                    <input type="submit" class="btn btn-primary" value="Ingresar">
                </div>
                <div class="text-end">
                    <a href="#" class="small">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
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
include_once "views/html/Layout/footer.php"; ?>