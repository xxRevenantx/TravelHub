<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

    <h1>Reservas</h1>
             <form class="formReserva" method="POST">
                <input type="hidden" class="idReserva" name="idReserva">
            <div class="form-group-reserva">
                <label for="cliente_reserva">Cliente:</label>
                <select name="cliente_reserva" class="cliente_reserva" id="cliente_reserva">
                <?php
                $clientes = ClienteCtr::canp_leer_clientes_ctr();
                foreach ($clientes as $key => $cliente) {
                    echo '
                        <option value="'.$cliente["id_cliente"].'">'.$cliente["nombre"]." ".$cliente["primer_apellido"]." ".$cliente["segundo_apellido"].'</option>
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
                <select id="tipodestino_reserva" name="tipodestino_reserva" class="tipodestino_reserva">
                    <?php
                        $destinos = DestinoCtr::canp_leer_tipos_destinos_ctr();
                        foreach ($destinos as $key => $destino) {
                            echo '<option value="'.$destino["id_tipodestino"].'">'.$destino["Nombre_destino"]." => ".$destino["Actividades_populares"].'</option>
                            ';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group-reserva">
                <label for="fecha_reserva">Fecha de Reserva:</label>
                <input type="date" id="fecha_reserva" class="fecha_reserva" name="fecha_reserva">
            </div>
            <div class="form-group-reserva">
                <label for="fecha_vuelo">Fecha de Vuelo:</label>
                <input type="date" class="fecha_vuelo" id="fecha_vuelo" name="fecha_vuelo">
            </div>
            <button type="submit" name="btnReserva" class="btnformulario btnReserva">Enviar Reserva</button>
        </form>

        <div class="tableContainer">
        <table class="tblReservas">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Destino</th>
                    <th>Tipo de destino</th>
                    <th>Fecha de reserva</th>
                    <th>Fecha de vuelo</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                
                        <?php
                        $reservas = ReservasCtr::canp_leer_reservas_ctr();
                        foreach ($reservas as $key => $reserva) {
                            $cliente = ClienteCtr::canp_leer_cliente_id_ctr($reserva["id_cliente"]);
                            $destino = DestinoCtr::canp_leer_destino_id_ctr($reserva["id_destino"]);
                            $tipo = DestinoCtr::canp_leer_tipo_destino_id_ctr($reserva["id_tipodestino"]);
                            echo '
                                <tr>
                                <td>'.$reserva["id_reserva"].'</td>
                                <td>'.$cliente["nombre"]." ".$cliente["primer_apellido"]." ".$cliente["segundo_apellido"].'</td>
                                <td>'.$destino["nombre_destino"].'</td>
                                <td>'.$tipo["Nombre_destino"].'</td>
                                <td>'.$reserva["fecha_reserva"].'</td>
                                <td>'.$reserva["fecha_vuelo"].'</td>
                                <td>
                                <button btnEditarReserva="'.$reserva["id_reserva"].'" class="edit btn-edit warning EditarReserva"> <i class="fa-solid fa-pen-to-square"></i></a>
                                 <button eliminarReserva="'.$reserva["id_reserva"].'" class="delete eliminarReserva"><i class="fa-solid fa-trash"></i></button>
                                </td>
                                </tr>
                            ';
                        }
                        ?>

             



            </tbody>
        </table>
        </div>
</div>