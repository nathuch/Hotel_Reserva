<?php

class User
{
    public function  validateuser($data)
    {
        $conexion = new Conexion();
        $conexion->conectar();
        $sql = "SELECT * FROM users WHERE correo = '" . $data['email'] . "'";
        $conexion->query($sql);
        $result = $conexion->getresult();
        $conexion->desconectar();
        if ($result && $result->num_rows > 0) {

            return $result->fetch_assoc();
        }
        return null;
    }
    public function registeruser($data)
    {
        $conexion = new conexion();
        $conexion->conectar();
        $sql = "INSERT INTO users (num_document, id_type_document, nombre, apellido, telefono, correo,  password) VALUES (" .
            $data['numero_documento'] . ", " .
            $data['tipo_documento'] . ", '" .
            $data['nombre'] . "', '" .
            $data['apellido'] . "', '" .
            $data['telefono'] . "', '" .
            $data['email'] . "', '" .
            $data['password'] . "')";
        $conexion->query($sql);
        return $conexion->getfilasAfectadas();
    }
}
