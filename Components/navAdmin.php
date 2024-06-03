<nav class="menu">

    <ul class="menu-list">
        <li class="<?php echo Funciones::estaActivo('CANP_Admin') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_Admin">Inicio</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_Destino') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_Destino">Destinos</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_TipoDestino') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_TipoDestino">Tipos de Destino</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_TransporteTerrestre') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_TransporteTerrestre">Transporte Terrestre</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_Avion') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_Avion">Avión</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_ReporteUsuarios') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_ReporteUsuarios">Reporte de Usuarios</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_Bitacora') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_Bitacora">Bitácora</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_Cliente') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_Cliente">Cliente</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_Reservas') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_Reservas">Reservas</a></li>
        <li class="<?php echo Funciones::estaActivo('CANP_Reportes') ? 'activo' : ''; ?>"><a href="<?php echo $rutaLocal ?>Admin/CANP_Reportes">Reportes</a></li>
    </ul>
</nav>