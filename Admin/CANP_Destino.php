<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Añadir Nuevo Destino</h2>
        <form class="formDestinoAdmin" method="post">
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
                <tr>
                    <td>1</td>
                    <td>Machu Picchu</td>
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
                <tr>
                    <td>2</td>
                    <td>Serengeti</td>
                    <td>Boeing 777</td>
                    <td>Airbus A330</td>
                    <td>Jeep Safari</td>
                    <td>Camión todo terreno</td>
                    <td>Tanzania</td>
                    <td>Parque nacional conocido por la migración anual de millones de ñus.</td>
                    <td>2.1540° S, 34.6857° E</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Gran Barrera de Coral</td>
                    <td>Airbus A380</td>
                    <td>Boeing 787</td>
                    <td>Barco</td>
                    <td>Submarino turístico</td>
                    <td>Australia</td>
                    <td>El arrecife de coral más grande del mundo, visible desde el espacio.</td>
                    <td>18.2871° S, 147.6992° E</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

                <tr>
                    <td>4</td>
                    <td>Venecia</td>
                    <td>Boeing 747</td>
                    <td>Airbus A340</td>
                    <td>Vaporetto</td>
                    <td>Góndola</td>
                    <td>Italia</td>
                    <td>Conocida por sus canales, arquitectura y arte.</td>
                    <td>45.4408° N, 12.3155° E</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Monte Everest</td>
                    <td>Boeing 737 MAX</td>
                    <td>Airbus A320neo</td>
                    <td>Helicóptero</td>
                    <td>Yak</td>
                    <td>Nepal</td>
                    <td>El punto más alto de la Tierra, destino popular para montañistas experimentados.</td>
                    <td>27.9881° N, 86.9250° E</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>París</td>
                    <td>Boeing 777</td>
                    <td>Airbus A380</td>
                    <td>Metro</td>
                    <td>Autobús turístico</td>
                    <td>Francia</td>
                    <td>Capital conocida mundialmente por su arte, moda, gastronomía y cultura.</td>
                    <td>48.8566° N, 2.3522° E</td>
                    <td>
                    <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                    <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>Islas Maldivas</td>
                    <td>Boeing 787</td>
                    <td>Airbus A350</td>
                    <td>Lancha rápida</td>
                    <td>Ferry</td>
                    <td>Maldivas</td>
                    <td>Destino tropical famoso por sus playas, arrecifes de coral y vida marina diversa.</td>
                    <td>3.2028° N, 73.2207° E</td>
                    <td>
                        <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>8</td>
                    <td>Ciudad del Cabo</td>
                    <td>Airbus A330</td>
                    <td>Boeing 747</td>
                    <td>Autobús</td>
                    <td>Minivan de alquiler</td>
                    <td>Sudáfrica</td>
                    <td>Conocida por su puerto, su naturaleza y como un punto cultural importante en el sur de África.</td>
                    <td>33.9249° S, 18.4241° E</td>
                    <td>
                        <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>9</td>
                    <td>Tokio</td>
                    <td>Boeing 777</td>
                    <td>Airbus A380</td>
                    <td>Metro</td>
                    <td>Autobús turístico</td>
                    <td>Japón</td>
                    <td>Vibrante capital conocida por su torre y su mezcla de modernidad y tradición.</td>
                    <td>35.6895° N, 139.6917° E</td>
                    <td>
                        <button class="edit"> <i class="fa-solid fa-pen-to-square"></i></button>
                        <button class="delete"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>

            </tbody>
        </table>

        </div>