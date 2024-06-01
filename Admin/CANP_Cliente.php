<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Añadir Nuevo Cliente</h2>
       
        <form class="formClienteAdmin" method="post">
            <input type="hidden" name="idClienteActualizar" class="idClienteActualizar">
            <input type="hidden" id="rolIdCliente" name="rolIdCliente" class="rolIdCliente" value="<?php echo Funciones::encrypt(2) ?>">
        <div class="form-row">
            <div class="form-group">
                <label for="nombre">Nombre: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                <input type="text" id="nombre" name="nombre" placeholder="Ej. Juan">
            </div>
            <div class="form-group">
                <label for="primerApellido">Primer Apellido: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>

                <input type="text" id="primerApellido" name="primerApellido" placeholder="Ej. Pérez">
            </div>
            <div class="form-group">
                <label for="segundoApellido">Segundo Apellido: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <input type="text" id="segundoApellido" name="segundoApellido" placeholder="Ej. Gómez">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="lugarNacimiento">Lugar de Nacimiento: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <select id="lugarNacimiento" name="lugarNacimiento">
                    <?php include 'Components/lugares.php' ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" placeholder="Ej. 1990-01-01">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <select id="sexo" name="sexo">
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="rfc">RFC: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <input type="text" id="rfc" name="rfc" placeholder="Ej. CUPU800825569">
            </div>
            <div class="form-group">
                <label for="curp">CURP: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                <input type="text" id="curp" disabled name="curp" placeholder="Ej. MABJ890312HDFRRS05">
            </div>
            <div class="form-group">
                <label for="fechaRegistro">Fecha de Registro: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <input type="date" id="fechaRegistro" name="fechaRegistro" placeholder="Ej. 2023-05-10">
            </div>
        </div>
        <button name="btnCliente" class="btnformulario" type="submit">Añadir cliente</button>
    </form>



            <?php
                $validacion = new Validaciones();
                $validacion -> ClienteCtr();

            ?>

        <h2>Lista de Clientes</h2>

        <table class="tblClientes">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>RFC</th>
                <th>CURP</th>
                <th>Fecha de registro</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $clientes = ClienteCtr::canp_leer_clientes_ctr();

            foreach ($clientes as $key => $cliente) {
                
                echo '
                <tr>
                <td>'.($key+1).'</td>
                <td>'.$cliente["nombre"].'</td>
                <td>'.$cliente["primer_apellido"].'</td>
                <td>'.$cliente["segundo_apellido"].'</td>
                <td>'.$cliente["RFC"].'</td>
                <td>'.$cliente["CURP"].'</td>
                <td>'.$cliente["fecha_registro"].'</td>
                <td>
                    <button btnEditarCliente="'.$cliente["id_cliente"].'" class="edit btn-edit warning btnEditarCliente"> <i class="fa-solid fa-pen-to-square"></i></a>
                    <button eliminarCliente="'.$cliente["id_cliente"].'" class="delete eliminarCliente"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
                ';
            }
            
            ?>

            
        </tbody>
    </table>
</body>
</html>

        </div>