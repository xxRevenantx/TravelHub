<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

    <h1>Reservas</h1>
             <form class="formReserva">
                <input type="text" class="idReserva" name="idReserva">
            <div class="form-group-reserva">
                <label for="client">Cliente:</label>
                <select name="cliente_reserva" id="cliente_reserva">
                <?php
                $clientes = ClienteCtr::canp_leer_clientes_ctr();
                foreach ($clientes as $key => $cliente) {
                    echo '
                        <option value="'.$cliente["id_cliente"].'">'.$cliente["nombre"]." ".$cliente["primer_apellido"]."".$cliente["segundo_Apellido"].'</option>
                    ';
                }
                ?>
               </select>
            </div>
            <div class="form-group-reserva">
                <label for="destino_reserva">Destino:</label>
                <select id="destino_reserva" name="destino_reserva">
                    <?php
                        $destinos = DestinoCtr::canp_leer_destinos_ctr();
                        foreach ($destinos as $key => $destino) {
                            echo '<option value="'.$destino["id_destino"].'">'.$destino["nombre_destino"].'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group-reserva">
                <label for="tipodestino_reserva">Tipo de Destino:</label>
                <select id="tipodestino_reserva" name="tipodestino_reserva">
                    <?php
                        $destinos = DestinoCtr::canp_leer_tipos_destinos_ctr();
                        foreach ($destinos as $key => $destino) {
                            echo '<option value="'.$destino["id_destino"].'">'.$destino["Nombre_destino"]." => ".$destino["Actividades_populares"].'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group-reserva">
                <label for="fecha_reserva">Fecha de Reserva:</label>
                <input type="date" id="fecha_reserva" name="fecha_reserva">
            </div>
            <div class="form-group-reserva">
                <label for="fecha_vuelo">Fecha de Vuelo:</label>
                <input type="date" id="fecha_vuelo" name="fecha_vuelo">
            </div>
            <button type="submit" class="btnformulario">Enviar Reserva</button>
        </form>
</div>