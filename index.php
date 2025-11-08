<?php
session_start();
require_once 'controllers/controller.php';
require_once 'config/config.php';
require_once 'models/conexion.php';
require_once 'models/user.php';
require_once 'controllers/controllerCrud.php';
require_once 'models/mostrar.php';
require_once 'lib/fpdf/fpdf.php';
require_once 'controllers/controllerExcel.php';
require_once 'controllers/controllerAjax.php';
require_once 'models/roomsAjax.php';
require_once 'controllers/controllerEmail.php';
//enrutador

$controller = new Controller();
$controllerCrud = new ControllerCrud();
$controllerExcel = new controllerExcel();
$controllerAjax = new ControllerAjax();
$controllerEmail = new ControllerEmail();

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'enviar_email_reserva' && isset($_POST['reserva_id'])) {
        $controllerEmail->enviar_email_reserva($_POST['reserva_id']);
        exit();
    }
    if ($_GET['action'] == 'obtener_descripcion') {
        $controllerAjax->obtener_descripcion($_POST['habitacion_id']);
        exit();
    }
    if ($_GET['action'] == 'generar_excel') {
        $controllerExcel->generar_excel();
    }
    if ($_GET['action'] == 'generar_reporte' && isset($_GET['id'])) {
        $controllerCrud->generar_reporte($_GET['id']);
    }
    if ($_GET['action'] == 'eliminar_reserva' && isset($_GET['id'])) {
        $controllerCrud->eliminar_reserva($_GET['id']);
    }

    if ($_GET['action'] == 'editar') {
        $controllerCrud->actualizar_reserva($_POST);
    }
    if ($_GET['action'] == 'editar_reserva' && isset($_GET['id'])) {
        $controllerCrud->editar_reserva($_GET['id']);
    }
    if ($_GET['action'] == 'editar_reserva_form') {
        $controller->verpagina('views/html/auth/editar_reserva.php');
    }
    if ($_GET['action'] == 'reservacion') {
        $controllerCrud->listar_reservas();
    }

    if ($_GET['action'] == 'mostrar_reservas') {

        $controller->verpagina('views/html/auth/reservacion.php');
    }

    if ($_GET['action'] == 'logout') {
        session_destroy();
        header('Location: index.php');
        exit();
    }
    if ($_GET['action'] == 'reservarhabitacion') {
        $controller->verpagina('views/html/auth/formulario.php');
    }
    if ($_GET['action'] == 'procesar_reserva') {
        $controllerCrud->procesar_reserva($_POST);
    }
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
