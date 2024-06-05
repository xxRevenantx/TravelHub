<?php

require_once "../../Models/reportesMdl.php";
require_once "../../Controllers/reportesCtr.php";

class ReportesAjax{

    public $comienzoAnio;
    public $comienzoMesNumero;
    public $finAno;
    public $finMesNumero;


    public $soloMes;
    public $soloAnio;


    // Consultar clientes por tipo de destino
    public $idTipoDestinoCliente;
    public $fechaVueloCliente;
    public $idDestinoCliente;

        // LEER REPORTES
    public function canp_leer_reportes_ajax() {

        $datosReportes = [
            'comienzoAnio' => $this->comienzoAnio,
            'comienzoMesNumero' => $this->comienzoMesNumero,
            'finAno' => $this->finAno,
            'finMesNumero' => $this->finMesNumero
        ];
        $respuesta = ReportesCtr::canp_leer_reportes_ctr($datosReportes);
        echo json_encode($respuesta);
    }

    // LEER MES
        public function canp_leer_mes_ajax() {
            $soloMes = $this->soloMes;
            $soloAnio = $this->soloAnio;
            $respuesta = ReportesCtr::canp_leer_mes_ctr($soloMes, $soloAnio);
            echo json_encode($respuesta);
        }


        // LEER MES TIPO DE DESTINO CLIENTE
        public function canp_leer_destino_cliente_ajax(){
            $idTipoDestinoCliente = $this->idTipoDestinoCliente;
            $fechaVueloCliente = $this->fechaVueloCliente;
            $idDestinoCliente = $this->idDestinoCliente;
            $respuesta = ReportesCtr::canp_leer_destino_cliente_ctr($idTipoDestinoCliente, $fechaVueloCliente, $idDestinoCliente );
            echo json_encode($respuesta);
        }

}


if(isset($_POST["comienzoAnio"])) {
    $a = new ReportesAjax();
    $a->comienzoAnio = $_POST["comienzoAnio"];
    $a->comienzoMesNumero = $_POST["comienzoMesNumero"];
    $a->finAno = $_POST["finAno"];
    $a->finMesNumero = $_POST["finMesNumero"];
    $a->canp_leer_reportes_ajax();
}

if(isset($_POST["soloMes"])) {
    $a = new ReportesAjax();
    $a->soloMes = $_POST["soloMes"];
    $a->soloAnio = $_POST["soloAnio"];
    $a->canp_leer_mes_ajax();
}

if(isset($_POST["idTipoDestinoCliente"])) {
    $a = new ReportesAjax();
    $a->idTipoDestinoCliente = $_POST["idTipoDestinoCliente"];
    $a->fechaVueloCliente = $_POST["fechaVueloCliente"];
    $a->idDestinoCliente = $_POST["idDestinoCliente"];
    $a->canp_leer_destino_cliente_ajax();
}
