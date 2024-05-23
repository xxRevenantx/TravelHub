<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bitácora de Actividades</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Bitácora de Actividades</h1>
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
                <td>2024-05-06 12:00</td>
                <td>Administrador</td>
                <td>Login</td>
                <td>Inicio de sesión en el sistema</td>
            </tr>
            <tr>
                <td>002</td>
                <td>2024-05-06 13:00</td>
                <td>Usuario</td>
                <td>Consulta</td>
                <td>Consulta de datos personales</td>
            </tr>
            <tr>
                <td>003</td>
                <td>2024-05-06 14:00</td>
                <td>Editor</td>
                <td>Edición</td>
                <td>Edición de información de contacto</td>
            </tr>
            <tr>
                <td>004</td>
                <td>2024-05-06 15:00</td>
                <td>Administrador</td>
                <td>Eliminación</td>
                <td>Eliminación de un usuario inactivo</td>
            </tr>
            <tr>
                <td>005</td>
                <td>2024-05-06 16:00</td>
                <td>Usuario</td>
                <td>Registro</td>
                <td>Registro de un nuevo usuario en el sistema</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
</div>