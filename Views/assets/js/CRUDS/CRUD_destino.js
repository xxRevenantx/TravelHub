import { swal, swalMixin, travelHub } from '../modulos/modules.js'; 


export function imagen(){
    document.querySelector('.imagen').addEventListener('change', function(e) {
        let imagen = e.target.files[0];
        console.log(imagen);
    
        if(imagen.type !== "image/png" && imagen.type !== "image/jpeg" ){
            swalMixin("top", "warning", "La imagen debe ser JPG o PNG");
            e.target.value = ""; // Clear the file input
            document.querySelector('.previewImagen').style.display = 'none';
            document.querySelector('.imagenSeleccionada').src = "";
        }
        else if(imagen.size > 2097152){
            swalMixin("top", "error", "La imagen no debe pesar más de 2 MB");
            e.target.value = ""; // Clear the file input
            document.querySelector('.previewImagen').style.display = 'none';
            document.querySelector('.imagenSeleccionada').src = "";
        }
        else {
            let datosImagen = new FileReader();
            datosImagen.readAsDataURL(imagen);
    
            datosImagen.onload = function(event) {
                let rutaImagen = event.target.result;
                let previsualizar = document.querySelector('.imagenSeleccionada');
                previsualizar.src = rutaImagen;
                document.querySelector('.previewImagen').style.display = 'block';
                swalMixin("top", "success", "La imagen se ha subido correctamente");
            }
        }
    });
    

}

export function insertar_o_actualizar_destino(formDestino, idDestino, datosFormularioInsertar, datosFormularioActualizar) {
    if (idDestino != "") { // ACTUALIZAR
        actualizar_destino(formDestino, datosFormularioActualizar);
    } else { // REGISTRAR DESTINO
        $.ajax({
            url: travelHub() + "Views/Ajax/destino.ajax.php",
            type: 'POST',
            data: datosFormularioInsertar,
            contentType: false, // No establecer contentType, permite que el navegador gestione el tipo
            processData: false, // No procesar los datos, permite que el FormData maneje los archivos
            dataType: "json",
            beforeSend: function() {
                swalMixin("top", "info", "Espera... guardando destino");
            },
            success: function(response) {
                console.log(response);
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

// EDITAR DESTINO
export function editar_destino(formDestino) {
    $('.tblDestinos').on('click', '.btnEditarDestino', function(e) {
        let idDestino = $(this).attr("btnEditarDestino");

        // Recopila los datos necesarios para la edición
        let datosFormulario = {
            idDestino: idDestino,
        };

        $.ajax({
            url: travelHub() + "Views/Ajax/destino.ajax.php",
            type: 'POST',
            data: datosFormulario,
            dataType: "json",

            success: function(response) {
                console.log(response);
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: "smooth",
                });

                formDestino.idDestinoActualizar.value = response.id_destino;
                formDestino.nombreDestino.value = response.nombre_destino;
                formDestino.tipoDeDestino.value = response.id_tipodestino;
                formDestino.avion1.value = response.id_avion1;
                formDestino.avion2.value = response.id_avion2;
                formDestino.transporte1.value = response.id_transpterrestre1;
                formDestino.transporte2.value = response.id_transpterrestre2;
                formDestino.pais.value = response.pais;
                formDestino.resena.value = response.resenia;
                formDestino.coordenadas.value = response.coordenadas;
                formDestino.imagenSeleccionada.src = travelHub()+response.imagen_destino.substr(6);
                formDestino.imagenDB.value = response.imagen_destino;
                document.querySelector('.previewImagen').style.display = 'block';
                // Opcional: ajusta el texto y estilo del botón de guardar
                formDestino.btnDestino.textContent = "Guardar cambios";
                formDestino.btnDestino.style.background = "#FFD500"; // Color amarillo
                formDestino.btnDestino.style.color = "#000"; // Texto negro


            },
            error: function(xhr, status, error) {
                alert('No se pudo editar el destino. Error: ' + error);
            }
        });
    });
}

// ACTUALIZAR DESTINO
function actualizar_destino(formDestino, datosFormularioActualizar) {

    $.ajax({
        url: travelHub() + "Views/Ajax/destino.ajax.php",
        type: 'POST',
        data: datosFormularioActualizar,
        contentType: false, // No establecer contentType, permite que el navegador gestione el tipo
        processData: false, // No procesar los datos, permite que el FormData maneje los archivos
        dataType: "json",
        beforeSend: function() {
            swalMixin("top", "info", "Espera... actualizando destino");
            formDestino.btnDestino.setAttribute("disabled", true);
            formDestino.btnDestino.style.opacity = "0.5";
        },
        success: function(response) {
            console.log(response);
            if (response == true) {
                // Notificar éxito
                swalMixin("top", "success", "Destino actualizado exitosamente en la base de datos");
                setTimeout(() => {
                    formDestino.btnDestino.removeAttribute("disabled");
                    formDestino.btnDestino.style.opacity = "1";
                    location.reload(); // Recarga la página para reflejar los cambios
                }, 1000);
            } else {
                // Mostrar mensaje de error específico
                console.log(response.error); // Log del error para diagnóstico
                swalMixin("top", "error", "El destino no se pudo actualizar: " + response.message);
                formDestino.btnDestino.removeAttribute("disabled");
                formDestino.btnDestino.style.opacity = "1";
            }
        }
    });
}

// ELIMINAR DESTINO
export function eliminar_destino() {
    $('.tblDestinos').on('click', '.btnEliminarDestino', function(e) {
        let idDestino = $(this).attr("btnEliminarDestino");
        let removeRow = $(this).closest('tr');

        Swal.fire({
            title: "¿Estás seguro?",
            text: "El destino será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                eliminarDestino();
            }
        });

        function eliminarDestino() {
            let datos = new FormData();
            datos.append("eliminarDestino", idDestino);

            $.ajax({
                url: travelHub() + "Views/Ajax/destino.ajax.php",
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
                        swalMixin("top", "success", "Destino eliminado correctamente");
                        removeRow.fadeOut(400, function() {
                            $(this).remove(); // Elimina la fila de la tabla visualmente
                        });
                    } else {
                        swalMixin("top", "error", "Ocurrió un error al eliminar el destino");
                    }
                },
                error: function() {
                    swalMixin("top", "error", "No se pudo procesar la petición");
                }
            });
        }
    });
}
