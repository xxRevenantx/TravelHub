<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Añadir Nuevo Destino</h2>
        <form class="formDestinoAdmin" method="post">
            <input type="text" class="idDestinoActualizar" name="idDestinoActualizar">
            <label for="destino">Nombre del Destino: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <select id="destino" class="destino" name="destino">
           
            <?php
                $destinos = DestinoCtr::canp_leer_tipos_destinos_ctr();
                foreach ($destinos as $key => $destino) {
                    echo ' <option value="'.$destino["id_tipodestino"].'">'.$destino["Nombre_destino"].'</option>';
                }
            ?>
            </select>

            <label for="avion1">Avión 1: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <select id="avion1" class="avion1" name="avion1">
           
            <?php
                $aviones = AvionCtr::canp_leer_aviones_ctr();
                foreach ($aviones as $key => $avion) {
                    echo ' <option value="'.$avion["id_avion"].'">'.$avion["modelo"].'</option>';
                }
            ?>
            </select>

            <label for="avion2">Avión 2: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <select id="avion2" class="avion2" name="avion2">
           
           <?php
               $aviones = AvionCtr::canp_leer_aviones_ctr();
               foreach ($aviones as $key => $avion) {
                echo ' <option value="'.$avion["id_avion"].'">'.$avion["modelo"].'</option>';
               }
           ?>
           </select>

            <label for="transporte1">Transporte Terrestre 1: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <select id="transporte1" class="transporte1" name="transporte1">
           
           <?php
               $transportes = TransporteTerrestreCtr::canp_leer_transportes_terrestres_ctr();
               foreach ($transportes as $key => $transporte) {
                   echo ' <option value="'.$transporte["id_transpterrestre"].'">'.$transporte["tipo_transporte"].'</option>';
               }
           ?>
           </select>

            <label for="transporte2">Transporte Terrestre 2: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <select id="transporte2" class="transporte2" name="transporte2">
           
           <?php
               $transportes = TransporteTerrestreCtr::canp_leer_transportes_terrestres_ctr();
               foreach ($transportes as $key => $transporte) {
                   echo ' <option value="'.$transporte["id_transpterrestre"].'">'.$transporte["tipo_transporte"].'</option>';
               }
           ?>
           </select>

            <label for="pais">País: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <select id="pais" class="pais" name="pais">
            <?php include 'Components/paises.php' ?>
            </select>
            <label for="resena">Reseña: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <textarea id="resena" name="resena" placeholder="Escribe una breve descripción del destino"></textarea>

            <label for="coordenadas">Coordenadas: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="coordenadas" name="coordenadas" placeholder="ej. 35.6895, 139.6917">

            <label for="imagen">Imagen del Destino: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
             <input type="file" id="imagen" name="imagen" accept="image/*"> <br>
             <div id="previewImagen" style="border: 1px solid #ccc; padding: 10px; display: none;">
                <img id="imagenSeleccionada" src="" alt="Vista previa de la imagen" style="max-width: 100%; height: auto;">
            </div>

            <button name="btnDestino" class="btnformulario" type="submit">Añadir Destino</button>
        </form>

            <?php
                $validacion = new Validaciones();
                $validacion -> DestinoCtr();

            ?>

        <h2>Lista de Destinos</h2>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Destino</th>
                    <th>Avión 1</th>
                    <th>Avión 2</th>
                    <th>Transporte terrestre 1</th>
                    <th>Transporte terrestre 2</th>
                    <th>País</th>
                    <th>Reseña</th>
                    <th>Coordenadas</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>


                 <?php
                    $destinos = DestinoCtr::canp_leer_destinos_ctr();
                    foreach ($destinos as $key => $destino) {
                        echo '
                        <tr>
                        <td>'.($key+1).'</td>
                        <td></td>
                        <td>Airbus A320</td>
                        <td>Boeing 737</td>
                        <td>Autobús turístico</td>
                        <td>Minivan de alquiler</td>
                        <td>Perú</td>
                        <td>Antigua ciudad inca entre las montañas de los Andes.</td>
                        <td>13.1631° S, 72.5450° W</td>
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