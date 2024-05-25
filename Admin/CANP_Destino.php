<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Añadir Nuevo Destino</h2>
        <form class="formDestinoAdmin" method="post">
            <input type="text" class="idDestinoActualizar" name="idDestinoActualizar">
            <label for="destino">Nombre del Destino: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="destino" name="destino" placeholder="Ej. Cancún">

            <label for="avion1">Avión 1: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="avion1" name="avion1" placeholder="Ej. Boeing 747">

            <label for="avion2">Avión 2: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="avion2" name="avion2" placeholder="Ej. Airbus A320">

            <label for="transporte1">Transporte Terrestre 1: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="transporte1" name="transporte1" placeholder="Ej. Autobús Turístico">

            <label for="transporte2">Transporte Terrestre 2: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="transporte2" name="transporte2" placeholder="Ej. Taxi">

            <label for="pais">País: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="pais" name="pais" placeholder="Ej. México">

            <label for="resena">Reseña: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <textarea id="resena" name="resena" placeholder="Escribe una breve descripción del destino"></textarea>

            <label for="coordenadas">Coordenadas: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
            <input type="text" id="coordenadas" name="coordenadas" placeholder="ej. 35.6895, 139.6917">

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