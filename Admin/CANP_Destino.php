<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Añadir Nuevo Destino</h2>
        <form class="formDestinoAdmin" method="post" enctype="multipart/form-data">
           
            <input type="hidden" class="idDestinoActualizar" name="idDestinoActualizar">
           
           
            <label for="nombreDestino">Nombre del Destino: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" name="nombreDestino" class="nombreDestino" placeholder="Nombre de destino">
           
           
            <label for="tipoDeDestino">Tipo de tipoDeDestino: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <select id="tipoDeDestino" class="tipoDeDestino" name="tipoDeDestino">
           
            <?php
                $destinos = DestinoCtr::canp_leer_tipos_destinos_ctr();
                foreach ($destinos as $key => $destino) {
                    echo ' <option value="'.$destino["id_tipodestino"].'">'.$destino["Nombre_destino"]." => ".$destino["Actividades_populares"].'</option>';
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
             <input type="file" id="imagen" class="imagen" name="imagen" accept="image/*"> <br>
             <div id="previewImagen" class="previewImagen" style="border: 1px solid #ccc; padding: 10px; display: none;">
                <img id="imagenSeleccionada" class="imagenSeleccionada"  alt="Vista previa de la imagen">
            </div>
               <input type="hidden" name="imagenDB" class="imagenDB">
            <br>

            <button name="btnDestino" class="btnformulario" type="submit">Añadir Destino</button>
        </form>

            <?php
                $validacion = new Validaciones();
                $validacion -> DestinoCtr();

            ?>

        <h2>Lista de Destinos</h2>
        <table class="tblDestinos">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Destino</th>
                    <th>Tipo de destino</th>
                    <th>Avión 1</th>
                    <th>Avión 2</th>
                    <th>Transporte terrestre 1</th>
                    <th>Transporte terrestre 2</th>
                    <th>País</th>
                    <th>Reseña</th>
                    <th>Coordenadas</th>
                    <th>Imagen</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>


                 <?php
                    $destinos = DestinoCtr::canp_leer_destinos_ctr();
                    foreach ($destinos as $key => $destino) {
                            $tipoDestino = DestinoCtr::canp_leer_tipo_destino_id_ctr($destino["id_tipodestino"]);
                            $avion1 = AvionCtr::canp_leer_avion_id_ctr($destino["id_avion1"]);
                            $avion2 = AvionCtr::canp_leer_avion_id_ctr($destino["id_avion2"]);
                            $id_transporte1 = TransporteTerrestreCtr::canp_leer_transporte_terrestre_id_ctr($destino["id_transpterrestre1"]);
                            $id_transporte2 = TransporteTerrestreCtr::canp_leer_transporte_terrestre_id_ctr($destino["id_transpterrestre2"]);
                        echo '
                        <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$destino["nombre_destino"].'</td>
                        <td>'.$tipoDestino["Nombre_destino"]. " (".$tipoDestino["Actividades_populares"].") ".'</td>
                        <td>'.$avion1["modelo"].'</td>
                        <td>'.$avion2["modelo"].'</td>
                        <td>'.$id_transporte1["tipo_transporte"].'</td>
                        <td>'.$id_transporte2["tipo_transporte"].'</td>
                        <td>'.$destino["pais"].'</td>
                        <td>'.$destino["resenia"].'</td>
                        <td>'.$destino["coordenadas"].'</td>
                        <td>
                            <img class="imagenDestino" src="'.$rutaLocal.substr($destino["imagen_destino"],4).'">
                        </td>
                        <td>
                        <button btnEditarDestino="'.$destino["id_destino"].'" class="edit btn-edit warning btnEditarDestino"> <i class="fa-solid fa-pen-to-square"></i></a>
                        <button btnEliminarDestino="'.$destino["id_destino"].'" class="delete btnEliminarDestino"><i class="fa-solid fa-trash"></i></button>
                    </td>
                    </tr>
                        ';
                    }
                ?>



            </tbody>
        </table>

        </div>