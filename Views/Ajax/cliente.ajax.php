
<?php

require_once "../../Models/clienteMdl.php";
require_once "../../Controllers/clienteCtr.php";

require_once "../../App/funciones.php";
        
/* CLASE */
class ClienteAjax {


    public $idEditar;



    //INSERTAR
    public $idRol;
    public $nombre;
    public $primerApellido;
    public $segundoApellido;
    public $lugarNacimiento;
    public $fechaNacimiento;
    public $sexo;
    public $rfc;
    public $curp;
    public $fechaRegistro;

    //ACTUALIZAR
    public $idA;
    public $nombreA;
    public $primerApellidoA;
    public $segundoApellidoA;
    public $lugarNacimientoA;
    public $fechaNacimientoA;
    public $sexoA;
    public $rfcA;
    public $curpA;
    public $fechaRegistroA;


    // Eliminar
    public $eliminarCliente;


    // REGISTRAR CLIENTE
    public function canp_registrar_cliente_ajax(){
        $datosCliente = [
            'idRol' => $this->idRol,
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

    // LEER CLIENTE POR ID
    public function canp_leer_cliente_id_ajax(){
        $idCliente = $this->idEditar; // El ID del cliente a leer, enviado desde AJAX
        $respuesta = ClienteCtr::canp_leer_cliente_id_ctr($idCliente);
        echo json_encode($respuesta);
    }

    // ACTUALIZAR CLIENTE
    public function canp_actualizar_cliente_ajax(){
        $datosCliente = [
            'id' => $this->idA,
            'nombre' => $this->nombreA,
            'primerApellido' => $this->primerApellidoA,
            'segundoApellido' => $this->segundoApellidoA,
            'lugarNacimiento' => $this->lugarNacimientoA,
            'fechaNacimiento' => $this->fechaNacimientoA,
            'sexo' => $this->sexoA,
            'rfc' => $this->rfcA,
            'curp' => $this->curpA,
            'fechaRegistro' => $this->fechaRegistroA
        ];
        $respuesta = ClienteCtr::canp_actualizar_cliente_ctr($datosCliente);
        echo json_encode($respuesta);
    }

    // ELIMINAR CLIENTE
    public function canp_eliminar_cliente_ajax(){
        $eliminarCliente =$this->eliminarCliente;
        $respuesta = ClienteCtr::canp_eliminar_cliente_ctr($eliminarCliente);
        echo json_encode($respuesta);
    }

}

// REGISTRAR CLIENTE
if(isset($_POST["nombre"])) {
    $c = new ClienteAjax();
    $c->idRol = Funciones::decrypt($_POST["idRol"]); 
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

// LEER POR ID
if(isset($_POST["idEditar"])) {
    $c = new ClienteAjax();
    $c->idEditar = $_POST["idEditar"];
    $c->canp_leer_cliente_id_ajax();
}


// ACTUALIZAR
if(isset($_POST["nombreA"])) {
    $c = new ClienteAjax();
    $c->idA = $_POST["idA"];
    $c->nombreA = $_POST["nombreA"];
    $c->primerApellidoA = $_POST["primerApellidoA"];
    $c->segundoApellidoA = $_POST["segundoApellidoA"];
    $c->lugarNacimientoA = $_POST["lugarNacimientoA"];
    $c->fechaNacimientoA = $_POST["fechaNacimientoA"];
    $c->sexoA = $_POST["sexoA"];
    $c->rfcA = $_POST["rfcA"];
    $c->curpA = $_POST["curpA"];
    $c->fechaRegistroA = $_POST["fechaRegistroA"];
    $c->canp_actualizar_cliente_ajax();
}

// ELIMINAR
if(isset($_POST["eliminarCliente"])) {
    $c = new ClienteAjax();
    $c->eliminarCliente = $_POST["eliminarCliente"];
    $c->canp_eliminar_cliente_ajax();
}