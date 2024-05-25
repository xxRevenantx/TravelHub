<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Añadir Nuevo Tipo de Destino</h2>
        <form method="POST" class="formTipoDestino">
            <label for="nombreDestino">Nombre del Destino: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="nombreDestino" name="nombreDestino" placeholder="Nombre del Destino" >
            <label for="actividadesPopulares">Actividades Populares: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="actividadesPopulares" name="actividadesPopulares" placeholder="Actividades Populares" >
            <label for="epocaSugerida">Época Sugerida: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="epocaSugerida" name="epocaSugerida" placeholder="Época Sugerida" >
            <button name="btntTipoDestino" class="btnformulario" type="submit">Guardar Destino</button>
            <?php
                $validacion = new Validaciones();
                $validacion -> TipoDestinoCtr();

            ?>
        </form>
        <h2>Lista de Tipos de Destinos</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre destino</th>
                    <th>Actividades populares</th>
                    <th>Época sugerida</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>

                    <?php
                        $destinos = DestinoCtr::canp_leer_tipos_destinos_ctr();
                        foreach ($destinos as $key => $destino) {
                           echo '
                           <tr>
                           <td>'.($key+1).'</td>
                           <td>'.$destino["Nombre_destino"].'</td>
                           <td>'.$destino["Actividades_populares"].'</td>
                           <td>'.$destino["Epoca_sugerida"].'</td>

                           <td>
                           <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                           <button class="delete"><i class="fa-solid fa-trash"></i></button>
                           </td>
                       </tr>
                           ';
                        }
                    ?>

            </tbody>
        </table>
        </div>