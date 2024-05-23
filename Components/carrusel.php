<div class="carrusel-container">
<button class="carrusel-arrow left" onclick="moverAImagenAnterior()">&#9664;</button>
    <div class="carrusel-slide" id="carrusel-slide">
        <div class="image-container">
            <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/imagen1.jpg" alt="Imagen 1" data-index="0">
            <div class="description" id="desc-0">Imagen 1 - Un hermoso espacio arquitectónico con columnas y decoraciones intrincadas.</div>
        </div>
        <div class="image-container">
            <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/imagen2.jpg" alt="Imagen 2" data-index="1">
            <div class="description" id="desc-1">Imagen 2 - Paisaje montañoso cubierto de nieve con un pintoresco pueblo en la base.</div>
        </div>
        <div class="image-container">
            <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/imagen3.jpg" alt="Imagen 3" data-index="2">
            <div class="description" id="desc-2">Imagen 3 - Captura el momento de la belleza de una ciudad antigua.</div>
        </div>
        <div class="image-container">
            <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/imagen4.jpg" alt="Imagen 4" data-index="3">
            <div class="description" id="desc-3">Imagen 4 - Recorre las calles empedradas de una ciudad europea en un tranvía.</div>
        </div>
        <div class="image-container">
            <img src="<?php echo $rutaLocal ?>Views/assets/imagenes/imagen5.jpg" alt="Imagen 5" data-index="4">
            <div class="description" id="desc-4">Imagen 1 - Coloridas casas apiladas en un acantilado con vistas al mar.</div>
        </div>
    </div>
    <button class="carrusel-arrow right" onclick="moverASiguienteImagen()">&#9654;</button>

    <div class="carrusel-indicador" id="carrusel-indicador">
        <div class="indicador" data-index="0"></div>
        <div class="indicador" data-index="1"></div>
        <div class="indicador" data-index="2"></div>
        <div class="indicador" data-index="3"></div>
        <div class="indicador" data-index="4"></div>
    </div>
</div>

