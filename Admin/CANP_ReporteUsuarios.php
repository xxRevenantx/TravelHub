<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor"> 
    <h2>Añadir Usuario</h2>
    <form id="formUsuario" class="formUsuario" method="post" enctype="multipart/form-data">
        <input type="hidden" disabled id="idUsuario" name="idUsuario">
        
        <label for="usuario">Usuario:   <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario">

        <label for="nombre">Nombre: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" id="nombre" name="nombre" placeholder="Introduce tu nombre">

        <label for="apellido">Apellido: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" id="apellido" name="apellido" placeholder="Introduce tu apellido">

        <label for="email">Email:   <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="email" id="email" name="email" placeholder="Introduce tu email">

        <label for="password">Password: La contraseña debe tener al menos 8 caracteres <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="password" id="password" name="password" placeholder="Introduce tu contraseña">

        <label for="rol">Rol:   <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <select id="rol" name="rol" >
            <option value="">Selecciona un rol</option>
            <option value="1">Administrador</option>
            <option value="2">Cliente</option>

        </select>

        <button type="submit" class="btnformulario mt-2" id="btnGuardar">Guardar Usuario</button>
    </form>

<h2>Listado de Usuarios</h2>
        <table class="tblUsuarios">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $usuarios = UsuariosCtr::canp_leer_usuarios_ctr();
                    foreach ($usuarios as $key => $usuario) {
                            $rol = UsuariosCtr::canp_leer_rol_id_ctr($usuario["Rol"]);
                      echo '
                      <tr>
                            <td>'.($key+1).'</td>
                            <td>'.$usuario["Usuario"].'</td>
                            <td>'.$usuario["Nombre"].'</td>
                            <td>'.$usuario["Apellido"].'</td>
                            <td>'.$usuario["Email"].'</td>
                            <td>'.$rol["rol"].'</td>
                            <td>
                           <button class="edit editarUsuario" editarUsuario="'.$usuario["Id_usuario"].'"> <i class="fa-solid fa-pen-to-square"></i></button>
                           <button class="delete eliminarUsuario" eliminarUsuario="'.$usuario["Id_usuario"].'" ><i class="fa-solid fa-trash"></i></button>
                           </td>
                            </td>
                       </tr>
                      ';
                    }
                ?>
                
            </tbody>
        </table>
        
</div>