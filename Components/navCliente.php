<nav class="menu">
    <ul>
        <li class="<?php echo Funciones::estaActivo('CANP_Cliente') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal?>Client/CANP_Cliente">Inicio</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_Destinos') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal?>Client/CANP_Destinos">Destinos</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_DestinosDisponibles') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal?>Client/CANP_DestinosDisponibles">Destinos Disponibles</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_LugaresVisitados') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal?>Client/CANP_LugaresVisitados">Lugares Visitados</a></li>
    </ul>
</nav>

