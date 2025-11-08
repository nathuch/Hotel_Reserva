<?php

class RoomsAjax
{
    public function obtener_descripcion($id_habitacion)
    {
        $conexion = new Conexion();
        $conexion->conectar();

        $query = "SELECT * FROM room WHERE id_status_room = 3 and id=?";
        $stmt = $conexion->prepare($query);
        if (!$stmt) {
            $conexion->desconectar();
            return 0;
        }
        $stmt->bind_param("i", $id_habitacion);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows > 0) {
            $rooms = [];
            while ($row = $result->fetch_assoc()) {
                $rooms[] = $row;
            }
            return $rooms;
        }
        return null;
    }
}
