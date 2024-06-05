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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
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
if(isset($_SESSION['validar']) && $_SESSION['validar'] == true && $_SESSION["rol"] == 1){ 
    if(isset($_GET["url"])){
        $url = explode("/", $_GET["url"]);
             if($url[0] == "logout"){
                   include "Modules/".$url[0].'.php';
               }else if( $url[1] == "CANP_Admin" || $url[1] == "CANP_Destino" || $url[1] == "CANP_TipoDestino" || $url[1] == "CANP_TransporteTerrestre" 
                || $url[1] == "CANP_Avion" || $url[1] == "CANP_ReporteUsuarios" || $url[1] == "CANP_Bitacora" || $url[1] == "CANP_Cliente" || $url[1] == "CANP_Reportes"
                || $url[1] == "CANP_Reservas"){
                    include "Admin/".$url[1].'.php';
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
else if(isset($_SESSION['validar']) && $_SESSION['validar'] == true && $_SESSION["rol"] == 2){

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