<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>


    <div class="contenedor">
   <h2>Añadir/Editar Avión</h2>
   <form class="formAvion" method="post">
    <label for="numeroSerie">Número de Serie: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" id="numeroSerie" name="numeroSerie" placeholder="Ej. 123456789ABC" >

    <label for="modelo">Modelo: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" id="modelo" name="modelo" placeholder="Ej. Boeing 747" >

    <label for="capacidadAsientos">Capacidad de Asientos (1-80): <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" class="capacidadAsientos" id="capacidadAsientos" name="capacidadAsientos" placeholder="Ej. 50" >

    <label for="empresaPropietaria">Empresa Propietaria: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
    <input type="text" id="empresaPropietaria" name="empresaPropietaria" placeholder="Ej. Aerolíneas Internacionales" >

    <button type="submit" name="btn" class="btnformulario">Guardar Avión</button>

    <?php
        $validacion = new Validaciones();
        $validacion -> AvionCtr();
    ?>
</form>

    <h2>Listado de Aviones</h2>
    <table>
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
            <tr>
                <td>1</td>
                <td>SN001234</td>
                <td>Boeing 737</td>
                <td>180</td>
                <td>Air Global</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>            
                </tr>
            <tr>
                <td>2</td>
                <td>SN001235</td>
                <td>Airbus A320</td>
                <td>160</td>
                <td>Fast Airways</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
            <tr>
                <td>3</td>
                <td>SN001236</td>
                <td>Boeing 777</td>
                <td>315</td>
                <td>SkyHigh</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
            <tr>
                <td>4</td>
                <td>SN001237</td>
                <td>Airbus A380</td>
                <td>555</td>
                <td>Luxury Flights</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
            <tr>
                <td>5</td>
                <td>SN001238</td>
                <td>Boeing 787 Dreamliner</td>
                <td>242</td>
                <td>DreamFlyer</td>
                <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
            </tr>
        </tbody>
    </table>
    </div>