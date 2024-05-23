<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Añadir Nuevo Cliente</h2>
       
        <form class="formClienteAdmin" method="post">
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
                <label for="estado">Lugar de Nacimiento: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <select id="estado" name="estado">
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
                
                <input type="text" id="fechaRegistro" name="fechaRegistro" placeholder="Ej. 2023-05-10">
            </div>
        </div>
        <button name="btnCliente" class="btnformulario" type="submit">Añadir cliente</button>
    </form>



            <?php
                $validacion = new Validaciones();
                $validacion -> ClienteCtr();

            ?>

        <h2>Lista de Clientes</h2>
        <table>
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
            <tr>
                <td>1</td>
                <td>Juan</td>
                <td>Pérez</td>
                <td>Gómez</td>
                <td>JPG123456789A</td>
                <td>JPG123456789ABCD12</td>
                <morse>Date</morse>
                <td>2024-05-01</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Maria</td>
                <td>Lopez</td>
                <td>Santos</td>
                <td>MLS876543210D</td>
                <td>MLS876543210DCBA12</td>
                <td>2024-05-02</td>
                <td>
                   <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Carlos</td>
                <td>Jimenez</td>
                <td>Rodriguez</td>
                <td>CJR765432109X</td>
                <td>CJR765432109XZCV98</td>
                <td>2024-05-03</td>
                <td>
                   <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Sofía</td>
                <td>Martínez</td>
                <td>Reyes</td>
                <td>SMR654321098Y</td>
                <td>SMR654321098YWLK65</td>
                <td>2024-05-04</td>
                <td>
                   <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Lucas</td>
                <td>García</td>
                <td>Fernández</td>
                <td>LGF543210987Z</td>
                <td>LGF543210987ZXPO32</td>
                <td>2024-05-05</td>
                <td>
                   <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>

        </div>