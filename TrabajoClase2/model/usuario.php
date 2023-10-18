<?php

require_once('./config/config.php');

class usuarioDB
{
    private $conexion;

    public function __construct()
    {
        $config = new Configu();
        $config->connect();
        $this->conexion = $config->getConexion();
    }

    public function registrarUsuario($nombre, $apellido, $email, $password, $foto, $id_nivel, $id_distrito)
    {
        // El usuario no existe, registra el nuevo usuario en la base de datos
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $query = "INSERT INTO usuario (nombre, apellido, email, password, foto, id_nivel, id_distrito) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ssssiii", $nombre, $apellido, $email, $passwordHash, $foto, $id_nivel, $id_distrito);

        if ($stmt->execute()) {
            $stmt->close();
            return true; // Registro exitoso
        } else {
            $stmt->close();
            return "Error al registrar el usuario. Por favor, inténtelo de nuevo.";
        }
    }
    public function buscarUsuario($correo, $passw)
    {
        $user = "SELECT id_usuario, nombre, apellido, foto, id_nivel, id_distrito FROM usuario WHERE email = ? AND password = ?";

        try {
            $stmt = $this->conexion->prepare($user);
            $stmt->bind_param("ss", $correo, $passw);

            $id_usuario = null; // Define la variable $id_usuario
            $nombre = null; // Define la variable $nombre
            $apellido = null; // Define la variable $apellido
            $foto = null; // Define la variable $foto
            $id_nivel = null; // Define la variable $id_nivel
            $id_distrito = null; // Define la variable $id_distrito

            $stmt->execute();
            $stmt->bind_result($id_usuario, $nombre, $apellido, $foto, $id_nivel, $id_distrito);

            if ($stmt->fetch()) {
                $stmt->close();
                $this->conexion->close();
                return [
                    'id_usuario' => $id_usuario,
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'foto' => $foto,
                    'id_nivel' => $id_nivel,
                    'id_distrito' => $id_distrito,
                ];
            } else {
                $stmt->close();
                $this->conexion->close();
                return null; // Usuario no encontrado
            }
        } catch (Exception $e) {
            echo ("OCURRIÓ UN ERROR AL BUSCAR AL USUARIO" . $e);
            return null;
        }
    }



    public function obtenerNiveles()
    {
        $niveles = array(); // Inicializa un array para almacenar los niveles

        $query = "SELECT id_nivel, nom_nivel FROM nivel"; // Consulta SQL para obtener los niveles

        $result = $this->conexion->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $niveles[] = $row;
            }
            $result->close();
        }

        return $niveles;
    }

    public function obtenerDistritos()
    {
        $query = "SELECT id_distrito, nom_distrito, id_provincia FROM distrito";
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $distritos = [];
        while ($row = $result->fetch_assoc()) {
            $distritos[] = $row;
        }
        $stmt->close();
        return $distritos;
    }


    public function buscarUsuarioPass($correo, $passw)
    {
        $user = "SELECT id_usuario, nombre, apellido, foto, id_nivel, id_distrito, password FROM usuario WHERE email = ?";

        try {
            $stmt = $this->conexion->prepare($user);
            $stmt->bind_param("s", $correo);

            $id_usuario = null; // Define la variable $id_usuario
            $nombre = null; // Define la variable $nombre
            $apellido = null; // Define la variable $apellido
            $foto = null; // Define la variable $foto
            $id_nivel = null; // Define la variable $id_nivel
            $id_distrito = null; // Define la variable $id_distrito
            $hashed_password = null; // Agregar la variable para almacenar la contraseña hash

            $stmt->execute();
            $stmt->bind_result($id_usuario, $nombre, $apellido, $foto, $id_nivel, $id_distrito, $hashed_password);

            if ($stmt->fetch() && password_verify($passw, $hashed_password)) {
                $stmt->close();
                $this->conexion->close();
                return [
                    'id_usuario' => $id_usuario,
                    'nombre' => $nombre,
                    'apellido' => $apellido,
                    'foto' => $foto,
                    'id_nivel' => $id_nivel,
                    'id_distrito' => $id_distrito,
                ];
            } else {
                $stmt->close();
                $this->conexion->close();
                return null; // Usuario no encontrado o contraseña incorrecta
            }
        } catch (Exception $e) {
            echo ("OCURRIÓ UN ERROR AL BUSCAR AL USUARIO" . $e);
            return null;
        }
    }



    public function obtenerNombreNivel($id_nivel)
    {
        $query = "SELECT nom_nivel FROM nivel WHERE id_nivel = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_nivel); // "i" indica que el valor es un entero
        $stmt->execute();
        $stmt->bind_result($nom_nivel);

        if ($stmt->fetch()) {
            $stmt->close();
            return $nom_nivel; // Devuelve el nombre del nivel
        } else {
            $stmt->close();
            return "Nivel Desconocido"; // Devuelve un valor predeterminado si no se encuentra el nivel
        }
    }
    public function obtenerInfoDistritoProvincia($id_distrito)
    {
        $distritoInfo = array("nom_distrito" => "Distrito Desconocido", "id_provincia" => 0); // Valor predeterminado en caso de no encontrar datos

        $query = "SELECT nom_distrito, id_provincia FROM distrito WHERE id_distrito = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_distrito); // "i" indica que el valor es un entero

        if ($stmt->execute()) {
            $stmt->bind_result($nom_distrito, $id_provincia);

            if ($stmt->fetch()) {
                $distritoInfo["nom_distrito"] = $nom_distrito;
                $distritoInfo["id_provincia"] = $id_provincia;
            }

            $stmt->close();
        }

        return $distritoInfo;
    }

    public function obtenerNombreProvincia($id_provincia)
    {
        $query = "SELECT nom_provincia FROM provincia WHERE id_provincia = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("i", $id_provincia); // "i" indica que el valor es un entero
        $stmt->execute();
        $stmt->bind_result($nom_provincia);

        if ($stmt->fetch()) {
            $stmt->close();
            return $nom_provincia; // Devuelve el nombre de la provincia
        } else {
            $stmt->close();
            return "Provincia Desconocida"; // Devuelve un valor predeterminado si no se encuentra la provincia
        }
    }
}
