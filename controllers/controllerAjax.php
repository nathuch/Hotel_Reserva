<?php
class ControllerAjax
{
    public function obtener_descripcion($id_habitacion)
    {
        $habitacion = new RoomsAjax();
        $descripcion = $habitacion->obtener_descripcion($id_habitacion);
        if ($descripcion != null) {
            foreach ($descripcion as $item) {
                echo "<option value='" . $item['id'] . "'>" . $item['descripcion'] . "</option>";
            }
        } else {
            echo "<option value=''>No hay descripciones disponibles</option>";
        }
    }
}
