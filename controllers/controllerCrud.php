<?php

class ControllerCrud
{

    public function validar_reserva($data)
    {

        $errores = [];
        if (empty(trim($data['habitacion'] ?? ''))) {
            $errores['habitacion'] = '* Seleccione una habitación';
        }
        if (empty(trim($data['fecha_ingreso'] ?? ''))) {
            $errores['fecha_ingreso'] = '* Fecha de ingreso obligatoria';
        }
        if (empty(trim($data['fecha_salida'] ?? ''))) {
            $errores['fecha_salida'] = '* Fecha de salida obligatoria';
        } elseif (isset($data['fecha_ingreso']) && $data['fecha_salida'] <= $data['fecha_ingreso']) {
            $errores['fecha_salida'] = '* La fecha de salida debe ser posterior a la fecha de ingreso';
        }

        return $errores;
    }

    public function procesar_reserva($data)
    {
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
        $errores = $this->validar_reserva($data);

        if (count($errores) > 0) {
            $_SESSION['errors'] = $errores;
            $_SESSION['old'] = $data;
            header('Location: index.php?action=reservarhabitacion');
            exit();
        }
        $user = new User();
        $reserva = $user->registrar_reserva($data);
        if ($reserva > 0) {
            $_SESSION['mensaje'] = 'Ha reservado con exito';
            header('location:index.php?action=reservacion');
        }
    }

    public function listar_reservas()
    {
        unset($_SESSION['reservas_Mensaje']);
        unset($_SESSION['reservas']);

        $mostrar = new Mostrar();
        $result = $mostrar->mostrar_reservas();
        if (!empty($result)) {
            $_SESSION['reservas'] = $result;
            header('location:index.php?action=mostrar_reservas');
            exit();
        } else {
            $_SESSION['reservas_Mensaje'] = 'No hay reservas realizadas';
            header('location:index.php?action=mostrar_reservas');
            exit();
        }
    }

    public function editar_reserva($id)
    {
        // unset($_SESSION['reserva_editar']);

        $mostrar = new Mostrar();
        $reserva = $mostrar->buscar_reserva_por_id($id);
        if (!empty($reserva)) {
            $_SESSION['reserva_editar'] = $reserva;
            header('Location: index.php?action=editar_reserva_form');
            exit();
        }
    }
    public function actualizar_reserva($data)
    {
        // Si hay cambios, actualiza
        $actualizar = new Mostrar();
        $actualizar_form = $actualizar->actualizar_reserva($data);
        if ($actualizar_form == true) {
            $_SESSION['mensaje'] = 'Reserva actualizada con éxito.';
            header('Location: index.php?action=reservacion');
            exit();
        } else {
            $_SESSION['mensaje'] = 'No se realizaron cambios en la reserva.';
            header('Location: index.php?action=reservacion');
            exit();
        }
    }
    public function eliminar_reserva($id)
    {
        unset($_SESSION['mensaje']);
        $eliminar = new Mostrar();
        $eliminar_reserva = $eliminar->eliminar_reserva($id);
        if ($eliminar_reserva == true) {
            $_SESSION['mensaje'] = 'Reserva Eliminada con éxito.';
            header('Location: index.php?action=reservacion');
            exit();
        } else {
            $_SESSION['mensaje'] = 'Error al eliminar la reserva.';
            header('Location: index.php?action=reservacion');
            exit();
        }
    }
    public function generar_reporte($id)
    {
        $reservas = new Mostrar();
        $lista_reserva = $reservas->mostrar_reservas();


        require_once 'views/report/report.php';
    }
}
