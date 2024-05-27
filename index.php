<?php
//APP

include_once 'App/funciones.php';


// Controladores
include_once "Controllers/templateCtr.php";
include_once "Controllers/rutaCtr.php";
include_once "Controllers/loginCtr.php";
include_once "Controllers/validaciones.php";

include_once "Controllers/avionCtr.php";
include_once "Controllers/clienteCtr.php";
include_once "Controllers/destinosCtr.php";
include_once "Controllers/transporteTerrestreCtr.php";



// Modelos
include_once "Models/loginMdl.php";
include_once "Models/avionMdl.php";
include_once "Models/clienteMdl.php";
include_once "Models/destinosMdl.php";
include_once "Models/transporteTerrestreMdl.php";


$template = new Template();
$template->templateCtr();


