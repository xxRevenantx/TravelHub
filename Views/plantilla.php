<?php
// Iniciamos sesión en la plantilla
 session_start();
$rutaLocal = Ruta::rutaCtr();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php echo $rutaLocal?>Views/assets/imagenes/logo.png" type="image/icon">
    <title>TravelHub</title>
  

    <link rel="stylesheet" href="<?php echo $rutaLocal?>Views/css/styles.css">
    <link rel="stylesheet" href="<?php echo $rutaLocal?>Views/css/carrusel.css">
    <script src="<?php echo $rutaLocal?>Views/assets/js/carrusel.js"></script> 

    
    <!-- ICONOS -->
    <script src="<?php echo $rutaLocal?>Views/assets/js/modulos/fontawesome/js/fontawesome.min.js"></script> 
    <link rel="stylesheet" href="<?php echo $rutaLocal?>Views/assets/js/modulos/fontawesome/css/all.min.css">

    <script src="<?php echo $rutaLocal?>Views/assets/js/modulos/jquery.js"></script> 
    <script src="<?php echo $rutaLocal?>Views/assets/js/modulos/sweetalert.js"></script> 

</head>

<body>


<?php
$url = array();
$ruta1 = null;
$mensaje = "";

// ADMINISTRADOR
if(isset($_SESSION['validar']) && $_SESSION['validar'] == true && $_SESSION["usuario"] == "admin"){ 
    if(isset($_GET["url"])){
        $url = explode("/", $_GET["url"]);
             if($url[0] == "logout"){
                   include "Modules/".$url[0].'.php';
               }else if( $url[1] == "CANP_Admin" || $url[1] == "CANP_Destino" || $url[1] == "CANP_TipoDestino" || $url[1] == "CANP_TransporteTerrestre" 
                || $url[1] == "CANP_Avion" || $url[1] == "CANP_ReporteUsuarios" || $url[1] == "CANP_Bitacora" || $url[1] == "CANP_Cliente"){
                include "Admin/".$url[1].'.php';
               }else if($url[1] == "editarCliente"){
                include "Admin/editar/".$url[1].'.php';
               }
               else{
                header('Location: '.$rutaLocal.'Admin/CANP_Admin');
               }
       }else{
           include "Admin/CANP_Admin.php";
       }
       include 'Components/footer.php';
       
}
 // CLIENTE
else if(isset($_SESSION['validar']) && $_SESSION['validar'] == true && $_SESSION["usuario"] == "cliente"){

    if(isset($_GET["url"])){
        $url = explode("/", $_GET["url"]);
             if($url[0] == "logout"){
                include "Modules/".$url[0].'.php';
               }else if( $url[1]== "CANP_Cliente" || $url[1] == "CANP_DestinosDisponibles" || $url[1] == "CANP_LugaresVisitados" || $url[1] == "CANP_Destinos"){
                include "Client/".$url[1].'.php';
               }
               else{
                header('Location: '.$rutaLocal.'Client/CANP_Cliente');
               }
       }else{
             include "Client/CANP_Cliente.php";
       }
       include 'Components/footer.php';

}

else{
    echo '<div class="contenedorPrincipal">';
    if(isset($_GET["url"])){

    
        $url = explode("/", $_GET["url"]);
             if($url[0] == "CANP_Login" || $url[0] == "CANP_Register"){
                include "Modules/".$url[0].'.php';
               }else{
                include "Modules/inicio.php";
               }
       }else{
        include "Modules/inicio.php";
       }
       include 'Components/footer.php';
       
       echo '</div>';
}
?>

</body>
</html>