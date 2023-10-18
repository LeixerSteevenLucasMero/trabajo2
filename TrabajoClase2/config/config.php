<?php
class configu{
    private $host = "localhost";
    private $dbname = "login";
    private $user = "root";
    private $pass = "";
    private $conexion;

    public function connect() {
        // Conexión a la base de datos
        $this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->dbname);

        // Verificar la conexión
        if (!$this->conexion) {
            die("Error de conexión: " . mysqli_connect_error());
        }

        // Establecer la codificación a utf-8
        mysqli_set_charset($this->conexion, "utf8");
    }

    public function getConexion() {
        return $this->conexion;
    }
}

?>