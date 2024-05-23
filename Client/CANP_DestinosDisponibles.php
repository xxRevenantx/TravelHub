<?php 
include 'Components/cabeceraCliente.php'; 
include 'Components/navCliente.php' 
?>

    <div class="contenedor">
        <h2>Explora Nuevos Lugares</h2>
        <div class="destinos-container">
            <!-- Ejemplo de un destino -->
            <div class="destino-card">
                <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/1.jpg" alt="Venecia">
                <h3>Venecia</h3>
                <p>Descripción breve del destino.</p>
                <button>Ver Más</button>
            </div>
            <div class="destino-card">
                <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/2.jpg" alt="Berlín">
                <h3>Berlín</h3>
                <button>Ver Más</button>
            </div>
            <div class="destino-card">
                <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/3.jpg" alt="Tailandia">
                <h3>Tailandia</h3>
                <button>Ver Más</button>
            </div>
            <!-- Más tarjetas de destino se agregarían aquí -->
        </div>
        </div>