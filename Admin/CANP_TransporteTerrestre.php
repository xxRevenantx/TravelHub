<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">
   <h2>Añadir Transporte</h2>
    <form class="formTransporteTerrestre" method="post">
        <input type="hidden" class="idTransporteTerrestre" name="idTransporteTerrestre">
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

        <button name="btnTransporteTerrestre" class="btnformulario btnTransporteTerrestre" type="submit">Guardar Transporte</button>

        <?php
                $validacion = new Validaciones();
                $validacion -> TransporteTerrestreCtr();

            ?>
    </form>

    <h2>Listado de Transporte Terrestre</h2>
    <table class="tblTransporteTerrestre">
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

        <?php
            $transportes = TransporteTerrestreCtr::canp_leer_transportes_terrestres_ctr();

            foreach ($transportes as $key => $transporte) {
               echo '
               <tr>
               <td>'.($key+1).'</td>
               <td>'.$transporte["tipo_transporte"].'</td>
               <td>'.$transporte["placa"].'</td>
               <td>'.$transporte["capacidad_pasajeros"].'</td>
               <td>'.$transporte["anio_fabricacion"].'</td>
               <td>'.$transporte["empresa_propietaria"].'</td>
               <td>
                   <button class="edit editarTransporteTerrestre" editarTransporteTerrestre="'.$transporte["id_transpterrestre"].'"> <i class="fa-solid fa-pen-to-square"></i></button>
                   <button class="delete eliminarTransporteTerrestre" eliminarTransporteTerrestre="'.$transporte["id_transpterrestre"].'"><i class="fa-solid fa-trash"></i></button>
                   </td>
           </tr>
               ';
            }
        ?>
          
        </tbody>
    </table>
</div>