<?php
require_once("controller/controller.php");
require_once("model/usuario.php");

$controller = new Controller();
$usuario = new usuarioDB();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'mostrarRegistro':
            $controller->crearUsuario();
            break;

        case 'registrarUsuario':
            $controller->registrar();
            break;

        case 'cerrar':
            $controller->cerrar();
            break;
        case 'iniciar':
            $controller->iniciar();
            break;
        case 'home':
            $controller->home();
            break;
        case 'editarUsuario':
            $controller->editarUsuario();
            break;

        default:
            $controller->index();
            break;
    }
} else {
    $controller->index();
}
