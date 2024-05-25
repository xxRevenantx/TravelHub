<?php
if(!isset($url[2])){
   header("Location:".$urlLocal."CANP_Cliente");
}
?>

<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

        <h2>Actualizar cliente</h2>
       <?php 
       $cliente = ClienteCtr::canp_leer_cliente_id_ctr($url[2]); 
       ?>
       
        <form class="formClienteAdmin" method="post">
        <div class="form-row">
            <div class="form-group">
              
                <label for="nombre">Nombre: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                <input type="text" id="nombre" value="<?php echo $cliente["nombre"];?>" name="nombre" placeholder="Ej. Juan">
            </div>
            <div class="form-group">
                <label for="primerApellido">Primer Apellido: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>

                <input type="text" id="primerApellido" value="<?php echo $cliente["primer_apellido"];?>" name="primerApellido" placeholder="Ej. Pérez">
            </div>
            <div class="form-group">
                <label for="segundoApellido">Segundo Apellido: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <input type="text" id="segundoApellido" value="<?php echo $cliente["segundo_apellido"];?>" name="segundoApellido" placeholder="Ej. Gómez">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="lugarNacimiento">Lugar de Nacimiento: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <select id="lugarNacimiento" name="lugarNacimiento">
                     <option value="<?php echo $cliente["lugarNacimiento"];?>"><?php echo $cliente["lugarNacimiento"];?></option>
                    <?php include 'Components/lugares.php' ?>
                </select>
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                <input type="date" id="fechaNacimiento" value="<?php echo $cliente["fechaNacimiento"];?>" name="fechaNacimiento" placeholder="Ej. 1990-01-01">
            </div>
            <div class="form-group">
                <label for="sexo">Sexo: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <select id="sexo" name="sexo">
                    <option value="<?php echo $cliente["sexo"];?>"><?php echo $cliente["sexo"];?></option>
                    <option value="H">Hombre</option>
                    <option value="M">Mujer</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="rfc">RFC: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <input type="text" id="rfc" name="rfc" value="<?php echo $cliente["RFC"];?>" placeholder="Ej. CUPU800825569">
            </div>
            <div class="form-group">
                <label for="curp">CURP: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                <input type="text" id="curp" value="<?php echo $cliente["CURP"];?>" disabled name="curp" placeholder="Ej. MABJ890312HDFRRS05">
            </div>
            <div class="form-group">
                <label for="fechaRegistro">Fecha de Registro: <div class="tooltip required"> *<span class="tooltiptext">Campo obligatorio</span></div></label>
                
                <input type="date" id="fechaRegistro" value="<?php echo $cliente["fecha_registro"];?>" name="fechaRegistro" placeholder="Ej. 2023-05-10">
            </div>
        </div>
        <button name="btnCliente" class="btnformulario" type="submit">Actualizar cliente</button>
    </form>



            <?php
                $validacion = new Validaciones();
                $validacion -> ClienteCtr();

            ?>


        </div>
