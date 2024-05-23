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
                <tr>
                    <td>1</td>
                    <td>Bali</td>
                    <td>Surf, yoga, exploración de templos</td>
                    <td>Mayo - Agosto</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alpes Suizos</td>
                    <td>Esquí, montañismo, spas</td>
                    <td>Diciembre - Abril</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Kyoto</td>
                    <td>Visitas a templos, ceremonias de té, festivales de cerezos</td>
                    <td>Marzo - Mayo</td>
                    < <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Nueva York</td>
                    <td>Teatro Broadway, museos, parques</td>
                    <td>Todo el año</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Patagonia Argentina</td>
                    <td>Trekking, avistamiento de glaciares, kayaking</td>
                    <td>Noviembre - Febrero</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Serengeti</td>
                    <td>Safaris, globo aerostático</td>
                    <td>Junio - Octubre</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Islas Galápagos</td>
                    <td>Snorkel, observación de fauna, cruceros</td>
                    <td>Todo el año</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Toscana</td>
                    <td>Recorridos vinícolas, ciclismo, arte renacentista</td>
                    <td>Marzo - Junio, Septiembre - Octubre</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
   
            </tbody>
        </table>
        </div>