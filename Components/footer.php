<footer>

<?php
// Establece la zona horaria predeterminada
date_default_timezone_set('America/Mexico_City');

// Obtiene la fecha actual en formato Año/Mes/Día
$fecha_actual = date('Y/m/d');

// Imprime la fecha
echo "CANP – PW1 – " . $fecha_actual;

?>




<?php 
    if(isset($_SESSION["rol"]) == 1){ ?>

 <script src="<?php echo $rutaLocal?>Views/assets/js/clienteCURP.js"  type="module"></script> 
<script src="<?php echo $rutaLocal?>Views/assets/js/validaciones.js"  type="module"></script> 
<script src="<?php echo $rutaLocal?>Views/assets/js/reportes.js"  type="module"></script> 
<script src="<?php echo $rutaLocal?>Views/assets/js/menu.js"></script> 


<?php  } ?>



</footer>