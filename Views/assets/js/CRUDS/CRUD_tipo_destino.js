import {swal, swalMixin, travelHub} from '../modulos/modules.js'; 

export function  insertar_o_actualizar_tipo_destino(formTipoDestino, idtipoDestino, datosFormularioInsertar, datosFormularioActualizar){

    
    if(idtipoDestino != ""){ // ACTUALIZAR

        actualizar_tipo_destino(formTipoDestino, datosFormularioActualizar);
    
    }else{ // REGISTRAR TIPO DE DESTINO

        $.ajax({
            url: travelHub() + "Views/Ajax/tipo.destino.ajax.php",
            type: 'POST',
            data: datosFormularioInsertar,
            dataType: "json",
            beforeSend: function() {
                swalMixin("top", "info", "Espera... guardando destino");
            },
            success: function(response) {
                if (response === true) {
                    swalMixin("top", "success", "Destino guardado exitosamente en la base de datos");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    swalMixin("top", "error", "El destino no se pudo guardar");
                }
            }
        });

            }

}

//EDITAR TIPO DE ESTINO
export function editar_tipo_destino(formTipoDestino){
    $('.tblTipoDestino').on('click', '.editarTipoDestino', function(e){
        let idTipoDestino = $(this).attr("editarTipoDestino");
    
         // Recopila los datos del formulario
         let datosFormulario = {
            idTipoDestino: idTipoDestino,
        };
    
        $.ajax({
            url: travelHub() + "Views/Ajax/tipo.destino.ajax.php", // Ajusta esta URL al archivo AJAX que maneja los tipos de destino
            type: 'POST',
            data: datosFormulario,
            dataType: "json",
    
            success: function(response) {

                console.log(response);
                window.scroll({
                    top: 0, // Ajusta según la posición del formulario en tu página
                    left: 0,
                    behavior: "smooth",
                });
                // Asumiendo que tienes un formulario con los campos necesarios para editar un tipo de destino
                formTipoDestino.idTipoDestino.value = response.id_tipodestino;
                formTipoDestino.nombreDestino.value = response.Nombre_destino;
                formTipoDestino.actividadesPopulares.value = response.Actividades_populares;
                formTipoDestino.epocaSugerida.value = response.Epoca_sugerida;
    
                // Opcional: ajusta el texto y estilo del botón de guardar
                formTipoDestino.btntTipoDestino.textContent = "Guardar cambios";
                formTipoDestino.btntTipoDestino.style.background = "#FFD500"; // Color amarillo
                formTipoDestino.btntTipoDestino.style.color = "#000"; // Texto negro
            },
            error: function(xhr, status, error) {
                alert('No se pudo editar el tipo de destino. Error: ' + error);
            }
        });
    
    })
       
    
}


// ACTUALIZAR TIPO DE DESTINO
 function actualizar_tipo_destino(formTipoDestino,datosFormularioActualizar){

    $.ajax({
        url: travelHub() + "Views/Ajax/tipo.destino.ajax.php",
        type: 'POST',
        data: datosFormularioActualizar,
        dataType: "json",
        beforeSend: function() {
            swalMixin("top", "info", "Espera... actualizando tipo de destino");
            formTipoDestino.btntTipoDestino.setAttribute("disabled", true);
            formTipoDestino.btntTipoDestino.style.opacity = "0.5";
        },
        success: function(response) {
            
            if (response == true) {
                // Notificar éxito
                swalMixin("top", "success", "Tipo de destino actualizado exitosamente en la base de datos");
               
                setTimeout(() => {
                    formTipoDestino.btntTipoDestino.removeAttribute("disabled");
                    formTipoDestino.btntTipoDestino.style.opacity = "1";
                    location.reload(); // Recarga la página para reflejar los cambios
                }, 1000);
            } else {
                // Mostrar mensaje de error específico
                console.log(response); // Log del error para diagnóstico
                swalMixin("top", "error", "El tipo de destino no se pudo actualizar: " + response.message);
                formTipoDestino.btntTipoDestino.removeAttribute("disabled");
                formTipoDestino.btntTipoDestino.style.opacity = "1";
            }
           
        },
        
    });
}

// ELIMINAR TIPO DE DESTINO
export function eliminar_tipo_destino(){
    $('.tblTipoDestino').on('click', '.eliminarTipoDestino', function(e) {
        let idTipoDestino = $(this).attr("eliminarTipoDestino"); // Asegúrate de que el botón tenga un atributo 'eliminarTipoDestino'
        let removeRow = $(this).closest('tr'); // Usamos closest para seleccionar la fila completa
    
        console.log(idTipoDestino);
        Swal.fire({
            title: "¿Estás seguro?",
            text: "El tipo de destino será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                eliminarTipoDestino();
            }
        });
    
        function eliminarTipoDestino() {
            let datos = new FormData();
            datos.append("eliminarTipoDestino", idTipoDestino);
    
            $.ajax({
                url: travelHub() + "Views/Ajax/tipo.destino.ajax.php", // Asegúrate de que esta URL es correcta
                method: 'POST',
                data: datos,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    swalMixin("top", "info", "Eliminando...");
                },
                success: function(resultado) {

                    if (resultado == true) {
                        swalMixin("top", "success", "Tipo de destino eliminado correctamente");
                        removeRow.fadeOut(400, function() { 
                            $(this).remove(); // Elimina la fila de la tabla visualmente
                        });
                    } else {
                        swalMixin("top", "error", "No se puede eliminar este tipo de destino porque está vinculado a un destino.");
                    }
                },
                error: function() {
                    swalMixin("top", "error", "No se pudo procesar la petición");
                }
            });
        }
    });
    

}

