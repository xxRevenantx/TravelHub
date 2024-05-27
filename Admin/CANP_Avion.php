<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>


    <div class="contenedor">
   <h2>Añadir/Editar Avión</h2>
   <form class="formAvion" method="post">
    <input type="hidden" class="idAvion" name="idAvion">
    <label for="numeroSerie">Número de Serie: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" id="numeroSerie" name="numeroSerie" placeholder="Ej. 123456789ABC" >

    <label for="modelo">Modelo: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" id="modelo" name="modelo" placeholder="Ej. Boeing 747" >

    <label for="capacidadAsientos">Capacidad de Asientos (1-80): <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" class="capacidadAsientos" id="capacidadAsientos" name="capacidadAsientos" placeholder="Ej. 50" >

    <label for="empresaPropietaria">Empresa Propietaria: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" id="empresaPropietaria" name="empresaPropietaria" placeholder="Ej. Aerolíneas Internacionales" >

    <button type="submit" name="btnAvion" class="btnformulario btnAvion">Guardar Avión</button>

    <?php
        $validacion = new Validaciones();
        $validacion -> AvionCtr();
    ?>
</form>

    <h2>Listado de Aviones</h2>
    <table class="tblAvion">
        <thead>
            <tr>
                <th>ID</th>
                <th>Número de serie</th>
                <th>Modelo</th>
                <th>Capacidad de asientos</th>
                <th>Empresa propietaria</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $aviones = AvionCtr::canp_leer_aviones_ctr();

            foreach ($aviones as $key => $avion) {
                echo '<tr>
                <td>'.($key+1).'</td>
                <td>'.$avion["numero_serie"].'</td>
                <td>'.$avion["modelo"].'</td>
                <td>'.$avion["capacidad_asientos"].'</td>
                <td>'.$avion["empresa_propietaria"].'</td>
                <td>
                           <button class="edit editarAvion" editarAvion="'.$avion["id_avion"].'"> <i class="fa-solid fa-pen-to-square"></i></button>
                           <button class="delete eliminarAvion" eliminarAvion="'.$avion["id_avion"].'" ><i class="fa-solid fa-trash"></i></button>
                           </td>           
                </tr>';
            }
        ?>


        </tbody>
    </table>
    </div>