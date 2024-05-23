<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">
   <h2>Añadir/Editar Transporte</h2>
    <form class="formTransporteTerrestre" method="post">
        <label for="tipoTransporte">Tipo de Transporte: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" id="tipoTransporte" class="tipoTransporte" name="tipoTransporte" placeholder="Ej. Autobús, Taxi, Tren">

        <label for="placa">Placa: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" id="placa" class="placa" name="placa" placeholder="Ej. XYZ1234">

        <label for="capacidad">Capacidad de Pasajeros (1-80): <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" id="capacidad" class="capacidad" name="capacidad" placeholder="Ej. 15">
      


        <label for="anioFabricacion">Año de Fabricación (2000-2024): <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" class="anioFabricacion" id="anioFabricacion" name="anioFabricacion" placeholder="Ej. 2015">

        <label for="empresa">Empresa Propietaria: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
        <input type="text" id="empresa" class="empresa" name="empresa" placeholder="Ej. Transportes S.A.">

        <button name="btnTransporteTerrestre" class="btnformulario" type="submit">Guardar Transporte</button>

        <?php
                $validacion = new Validaciones();
                $validacion -> TransporteTerrestreCtr();

            ?>
    </form>

    <h2>Listado de Transporte Terrestre</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de Transporte</th>
                <th>Placa</th>
                <th>Capacidad de Pasajeros</th>
                <th>Año de Fabricación</th>
                <th>Empresa Propietaria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Autobús</td>
                <td>XYZ-123</td>
                <td>45</td>
                <td>2019</td>
                <td>Empresa A</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Minivan</td>
                <td>ABC-789</td>
                <td>8</td>
                <td>2021</td>
                <td>Empresa B</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Shuttle</td>
                <td>DEF-456</td>
                <td>16</td>
                <td>2018</td>
                <td>Empresa C</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Trolebús</td>
                <td>GHI-012</td>
                <td>30</td>
                <td>2017</td>
                <td>Empresa D</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Taxi</td>
                <td>JKL-345</td>
                <td>4</td>
                <td>2020</td>
                <td>Empresa E</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
         
        </tbody>
    </table>
</div>