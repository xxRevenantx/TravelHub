<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

    <div class="contenidoReporte">
    <form class="reporteForm" class="mt-2">
        <label for="startMonth">Mes de inicio:</label>
        <input type="month" id="comienzoMes" class="comienzoMes" name="comienzoMes" >

        <label for="endMonth">Mes de fin:</label>
        <input type="month" id="finMes" class="finMes" name="finMes" >

        <button type="submit" class="btnReporte" >Generar Reporte</button>
    </form>


    <div class="resultadosReporte">
        <h1 class="reservas">Reservas</h2>
    <table>
        <thead>
            <tr>
                <th>ID Usuario</th>
                <th>Fecha y Hora</th>
                <th>Tipo de Usuario</th>
                <th>Acción Realizada</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>001</td>
                <td>2024-06-01 12:00</td>
                <td>Admin</td>
                <td>Login</td>
                <td>Inicio de sesión en el sistema</td>
            </tr>
            <tr>
                <td>002</td>
                <td>2024-05-20 13:00</td>
                <td>Cliente</td>
                <td>Login</td>
                <td>Inicio de sesión en el sistema</td>
            </tr>

        </tbody>
    </table>

    </div>

    </div>
</div>