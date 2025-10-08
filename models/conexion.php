<?php

class Conexion
{
    private $mySQLI;
    private $sql;
    private $result;
    private $filasAfectadas;

    public function conectar()
    {
        $host = "localhost";
        $db = "hotel_reservas";
        $user = "root";
        $password = "";
        $this->mySQLI = new mysqli($host, $user, $password, $db);
        if (mysqli_connect_error()) {
            throw new Exception("Error de conexion a la base de datos: " . mysqli_connect_error());
        }
        echo "conectado a la base de datos";
    }
    public function desconectar()
    {
        $this->mySQLI->close();
    }
    public function query($sql)
    {
        $this->sql = $sql;
        $this->result = $this->mySQLI->query($this->sql);
        $this->filasAfectadas = $this->mySQLI->affected_rows;
    }
    public function getresult()
    {
        return $this->result;
    }

    public function getfilasAfectadas()
    {
        return $this->filasAfectadas;
    }
}
