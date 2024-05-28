<?php

require_once "../../Models/usuariosMdl.php";
require_once "../../Controllers/usuariosCtr.php";

class UsuarioAjax {

    // INSERTAR
    public $usuario;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $rol;

    // EDITAR
    public $idUsuario;
    // ACTUALIZAR
    public $idUsuarioA;
    public $usuarioA;
    public $nombreA;
    public $apellidoA;
    public $emailA;
    public $passwordA;
    public $rolA;

    // ELIMINAR
    public $eliminarUsuario;

    // REGISTRAR USUARIO
    public function canp_registrar_usuario_ajax() {
        $datosUsuario = [
            'usuario' => $this->usuario,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'email' => $this->email,
            'password' => $this->password, // Encriptar la contraseña
            'rol' => $this->rol
        ];
        $respuesta = UsuariosCtr::canp_registrar_usuario_ctr($datosUsuario);
        echo json_encode($respuesta);
    }

    // LEER USUARIO POR ID
    public function canp_leer_usuario_id_ajax() {
        $idUsuario = $this->idUsuario; // El ID del usuario a leer, enviado desde AJAX
        $respuesta = UsuariosCtr::canp_leer_usuario_id_ctr($idUsuario);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR USUARIO
    public function canp_actualizar_usuario_ajax() {
        $datosUsuario = [
            'id_usuario' => $this->idUsuarioA,
            'usuario' => $this->usuarioA,
            'nombre' => $this->nombreA,
            'apellido' => $this->apellidoA,
            'email' => $this->emailA,
            'password' => $this->passwordA,
            'rol' => $this->rolA
        ];
        $respuesta = UsuariosCtr::canp_actualizar_usuario_ctr($datosUsuario);
        echo json_encode($respuesta);
    }

    // ELIMINAR USUARIO
    public function canp_eliminar_usuario_ajax() {
        $eliminarUsuario = $this->eliminarUsuario; // El ID del usuario a eliminar, enviado desde AJAX
        $respuesta = UsuariosCtr::canp_eliminar_usuario_ctr($eliminarUsuario);
        echo json_encode($respuesta);
    }

}

// REGISTRAR USUARIO
if(isset($_POST["usuario"])) {
    $a = new UsuarioAjax();
    $a->usuario = $_POST["usuario"];
    $a->nombre = $_POST["nombre"];
    $a->apellido = $_POST["apellido"];
    $a->email = $_POST["email"];
    $a->password = $_POST["password"];
    $a->rol = $_POST["rol"];
    $a->canp_registrar_usuario_ajax();
}

// LEER USUARIO
if(isset($_POST["idUsuario"])) {
    $a = new UsuarioAjax();
    $a->idUsuario = $_POST["idUsuario"];
    $a->canp_leer_usuario_id_ajax();
}

// ACTUALIZAR USUARIO
if(isset($_POST["idUsuarioA"])) {
    $a = new UsuarioAjax();
    $a->idUsuarioA = $_POST["idUsuarioA"];
    $a->usuarioA = $_POST["usuarioA"];
    $a->nombreA = $_POST["nombreA"];
    $a->apellidoA = $_POST["apellidoA"];
    $a->emailA = $_POST["emailA"];
    $a->passwordA = $_POST["passwordA"];
    $a->rolA = $_POST["rolA"];
    $a->canp_actualizar_usuario_ajax();
}

// ELIMINAR USUARIO
if(isset($_POST["eliminarUsuario"])) {
    $a = new UsuarioAjax();
    $a->eliminarUsuario = $_POST["eliminarUsuario"];
    $a->canp_eliminar_usuario_ajax();
}
?>
