<?php

class Mostrar
{
    public function mostrar_reservas()
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT r.id, r.pay, u.nombre, u.apellido, rm.name AS habitacion, r.checkin, r.checkout, r.specialrequest, sr.name AS estado
                FROM reservation r 
                JOIN users u ON r.id_user = u.id 
                JOIN room rm ON r.id_room = rm.id 
                JOIN status_reservation sr ON r.id_status_reservation = sr.id
                WHERE u.id = " . intval($_SESSION['user']['id']) . " AND r.id_status_reservation != 3";
        $conexion->query($sql);
        $result = $conexion->getresult();
        $conexion->desconectar();

        if ($result && $result->num_rows > 0) {
            $rows = [];
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        }
        return [];
    }

    public function buscar_reserva_por_id($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT r.id, r.pay, u.nombre, u.apellido, rm.name AS habitacion, r.checkin, r.checkout, r.specialrequest, sr.name AS estado, rm.id AS id_room
                FROM reservation r 
                JOIN users u ON r.id_user = u.id 
                JOIN room rm ON r.id_room = rm.id 
                JOIN status_reservation sr ON r.id_status_reservation = sr.id
                WHERE r.id = " . intval($id);
        $conexion->query($sql);
        $result_id = $conexion->getresult();
        $conexion->desconectar();

        if ($result_id && $result_id->num_rows > 0) {
            return $result_id->fetch_assoc(); // Devuelve una sola reserva
        }
        return null;
    }
    public function actualizar_reserva($data)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "UPDATE reservation SET 
                id_room = " . intval($data['habitacion']) . ",
                checkin = '" . $data['fecha_ingreso'] . "',
                checkout = '" . $data['fecha_salida'] . "',
                pay = " . intval($data['monto']) . ",
                specialrequest = '" . $data['observaciones'] . "'
                WHERE id = " . intval($_SESSION['reserva_editar']['id']);
        $conexion->query($sql);
        $filasAfectadas = $conexion->getfilasAfectadas();
        $conexion->desconectar();

        if ($filasAfectadas > 0) {
            return true; // Actualización exitosa
        }
        return false; // No se realizaron cambios
    }
    public function eliminar_reserva($id)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "UPDATE reservation SET id_status_reservation = 3 WHERE id = " . intval($id);
        $conexion->query($sql);
        $filasAfectadas = $conexion->getfilasAfectadas();
        $conexion->desconectar();

        if ($filasAfectadas > 0) {
            return true; // Eliminación exitosa
        }
        return false; // No se eliminó ninguna fila
    }
}
