
<?php

require_once "../../Models/clienteMdl.php";
require_once "../../Controllers/clienteCtr.php";


        
/* CLASE */
class ClienteAjax {

    public $id;
    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $lugarNacimiento;
    public $fechaNacimiento;
    public $sexo;
    public $rfc;
    public $curp;
    public $fechaRegistro;

    // REGISTRAR CLIENTE
    public function canp_registrar_cliente_ajax(){
        $datosCliente = [
            'nombre' => $this->nombre,
            'primerApellido' => $this->primerApellido,
            'segundoApellido' => $this->segundoApellido,
            'lugarNacimiento' => $this->lugarNacimiento,
            'fechaNacimiento' => $this->fechaNacimiento,
            'sexo' => $this->sexo,
            'rfc' => $this->rfc,
            'curp' => $this->curp,
            'fechaRegistro' => $this->fechaRegistro
        ];
          $respuesta = ClienteCtr::canp_registrar_cliente_ctr($datosCliente);
        echo json_encode($respuesta);
    }

    // LEER CLIENTE
    public function canp_leer_cliente_ajax(){
        $idCliente = $_POST['idCliente']; // El ID del cliente a leer, enviado desde AJAX
        $respuesta = ClienteCtr::canp_leer_cliente_ctr($idCliente);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR CLIENTE
    public function canp_actualizar_cliente_ajax(){
        $respuesta = ClienteCtr::canp_actualizar_cliente_ctr($_POST);
        echo json_encode($respuesta);
    }

    // ELIMINAR CLIENTE
    public function canp_eliminar_cliente_ajax(){
        $idCliente = $_POST['idCliente']; // El ID del cliente a eliminar, enviado desde AJAX
        $respuesta = ClienteCtr::canp_eliminar_cliente_ctr($idCliente);
        echo json_encode($respuesta);
    }

}

// REGISTRAR CLIENTE
if(isset($_POST["nombre"])) {
    $c = new ClienteAjax();
    $c->nombre = $_POST["nombre"];
    $c->primerApellido = $_POST["primerApellido"];
    $c->segundoApellido = $_POST["segundoApellido"];
    $c->lugarNacimiento = $_POST["lugarNacimiento"];
    $c->fechaNacimiento = $_POST["fechaNacimiento"];
    $c->sexo = $_POST["sexo"];
    $c->rfc = $_POST["rfc"];
    $c->curp = $_POST["curp"];
    $c->fechaRegistro = $_POST["fechaRegistro"];
    $c->canp_registrar_cliente_ajax();
}

// LEER
if(isset($_POST["btnLeerCliente"])) {
    $c = new ClienteAjax();
    $c->id = $_POST["idCliente"];
    $c->canp_leer_cliente_ajax();
}

// ACTUALIZAR
if(isset($_POST["btnActualizarCliente"])) {
    $c = new ClienteAjax();
    $c->id = $_POST["idCliente"];
    $c->nombre = $_POST["nombre"];
    $c->primerApellido = $_POST["primerApellido"];
    $c->segundoApellido = $_POST["segundoApellido"];
    $c->lugarNacimiento = $_POST["lugarNacimiento"];
    $c->fechaNacimiento = $_POST["fechaNacimiento"];
    $c->sexo = $_POST["sexo"];
    $c->rfc = $_POST["rfc"];
    $c->fechaRegistro = $_POST["fechaRegistro"];
    $c->canp_actualizar_cliente_ajax();
}

// ELIMINAR
if(isset($_POST["btnEliminarCliente"])) {
    $c = new ClienteAjax();
    $c->id = $_POST["idCliente"];
    $c->canp_eliminar_cliente_ajax();
}