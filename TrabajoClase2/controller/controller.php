<?php
require("./model/usuario.php");

session_start(); // Inicializa la sesión


class Controller
{
   private $user;

   public function __construct()
   {
      $this->user = new usuarioDB();
   }

   public function index()
   {
      require("view/login.php");
   }

   public function home()
   {
      $nombreNivel = $this->user->obtenerNombreNivel($_SESSION["id_nivel"]);
      $id_distrito = $_SESSION["id_distrito"];

      $niveles = $this->user->obtenerNiveles(); // Obtener los niveles desde el modelo
      $distritos = $this->user->obtenerDistritos(); // Obtener los distritos desde el modelo


      // Obtener información de distrito y provincia
      $infoDistritoProvincia = $this->user->obtenerInfoDistritoProvincia($id_distrito);

      // Obtener el id_provincia (puedes obtenerlo del resultado de obtenerInfoDistritoProvincia)
      $id_provincia = $infoDistritoProvincia["id_provincia"];

      // Llamar al método para obtener el nombre de la provincia
      $nombreProvincia = $this->user->obtenerNombreProvincia($id_provincia);

      require("view/home.php");
   }

   public function crearUsuario()
   {
      $niveles = $this->user->obtenerNiveles(); // Obtener los niveles desde el modelo
      $distritos = $this->user->obtenerDistritos(); // Obtener los distritos desde el modelo
      require("view/registro.php");
   }


   public function cerrar()
   {
      session_destroy();
      header("Location:index.php");
   }

   public function iniciar()
   {
      if (isset($_POST["email"]) && isset($_POST["password"]) && $_SERVER['REQUEST_METHOD'] == "POST") {
         $correo = $_POST["email"];
         $passw = $_POST["password"];

         $user_data = $this->user->buscarUsuarioPass($correo, $passw);

         if ($user_data !== null) {
            // Usuario encontrado en la base de datos, inicia sesión
            $_SESSION["iniciada"] = true;
            $_SESSION["id_usuario"] = $user_data["id_usuario"];
            $_SESSION["nombre"] = $user_data["nombre"];
            $_SESSION["apellido"] = $user_data["apellido"];
            $_SESSION["foto"] = $user_data["foto"];
            $_SESSION["email"] = $correo;
            $_SESSION["id_nivel"] = $user_data["id_nivel"];
            $_SESSION["id_distrito"] = $user_data["id_distrito"];
            $_SESSION["password"] = $user_data["password"]; // Agrega la contraseña hasheada a la sesión
            header("Location: /trabajoClase2/index.php?action=home");
         } else {
            // Usuario no encontrado, muestra un mensaje de error o redirige a la página de inicio de sesión
            // Puedes personalizar esto según tus necesidades
            echo ("Usuario no encontrado. Por favor, inicie sesión nuevamente o regístrese.");
         }
      } else {
         echo ("BAD REQUEST: ERROR 400");
      }
   }



   public function editarUsuario()
   {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         if (isset($_POST["nombre"], $_POST["apellido"], $_POST["id_nivel"], $_POST["id_distrito"], $_POST["password"])) {
            $id_usuario = $_SESSION["id_usuario"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $id_nivel = (int)$_POST["id_nivel"];
            $id_distrito = (int)$_POST["id_distrito"];
            $password = $_POST["password"];
            $result = $this->user->editarUsuario($id_usuario, $nombre, $apellido, $id_nivel, $id_distrito, $password);

            if ($result === true) {
               // Actualización exitosa, puedes redirigir a la página de inicio o realizar otras acciones
               // echo $password;

               header("Location: /trabajoClase2/index.php?action=cerrar");
            } else {
               // Error al actualizar, muestra un mensaje de error o redirige a una página de error
               // echo "Error al actualizar el usuario. Por favor, inténtelo de nuevo.";
            }
         } else {
            echo "Faltan campos requeridos para la edición.";
         }
      }
   }

   public function registrar()
   {
      if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
         echo "BAD REQUEST: ERROR 400";
         return;
      }

      if (isset($_POST["nombre"], $_POST["apellido"], $_POST["email"], $_POST["password"], $_POST["foto"], $_POST["id_nivel"], $_POST["id_distrito"])) {
         $nombre = $_POST["nombre"];
         $apellido = $_POST["apellido"];
         $correo = $_POST["email"];
         $passw = $_POST["password"];
         $foto = $_POST["foto"];
         $id_nivel = (int)$_POST["id_nivel"];
         $id_distrito = (int)$_POST["id_distrito"];

         $result = $this->user->registrarUsuario($nombre, $apellido, $correo, $passw, $foto, $id_nivel, $id_distrito);

         if ($result === true) {
            $user_data = $this->user->buscarUsuario($correo, $passw);

            if ($user_data !== null) {
               $_SESSION["iniciada"] = true;
               $_SESSION["id"] = $user_data["id_usuario"];
               $_SESSION["nombre"] = $user_data["nombre"];
               $_SESSION["apellido"] = $user_data["apellido"];
               $_SESSION["foto"] = $user_data["foto"];
               $_SESSION["id_nivel"] = $user_data["id_nivel"];
               $_SESSION["id_distrito"] = $user_data["id_distrito"];

               header("Location: /trabajoClase2/index.php");
            } else {
               header("Location: /trabajoClase2/index.php");
            }
         } elseif ($result === "Error al registrar el usuario. Por favor, inténtelo de nuevo.") {
            echo "INTERNAL SERVER ERROR: ERROR 500";
         } elseif ($result === 1062) {
            header("Location: /trabajoClase2/index.php");
         } else {
            echo "Error desconocido al registrar el usuario.";
         }
      } else {
         echo "Faltan campos requeridos para el registro.";
      }
   }
}
