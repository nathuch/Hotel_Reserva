<?php
session_start();
require_once 'controllers/controller.php';
require_once 'config/config.php';
require_once 'models/conexion.php';
require_once 'models/user.php';
//enrutador

$controller = new Controller();


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'loginusuario') {
        $controller->validatemail($_POST);
    }
    if ($_GET['action'] == 'crearusuario') {
        $controller->registeruser($_POST);
    }
    if ($_GET['action'] == 'registrarusuario') {
        $controller->verpagina('views/html/auth/register.php');
    }

    if ($_GET['action'] == 'validarusuario') {
        $controller->verpagina('views/html/auth/login.php');
    }
} else {
    $controller->verpagina('views/html/home.php');
}
