import {swal, swalMixin, travelHub} from '../modulos/modules.js'; 

export function insertar_o_actualizar_avion(formAvion, idAvion, datosFormularioInsertar, datosFormularioActualizar) {

    if (idAvion != "") { // ACTUALIZAR
        actualizar_avion(formAvion, datosFormularioActualizar);
    } else { // REGISTRAR AVIÓN
        $.ajax({
            url: travelHub() + "Views/Ajax/avion.ajax.php", 
            type: 'POST',
            data: datosFormularioInsertar,
            dataType: "json",
            beforeSend: function() {
                swalMixin("top", "info", "Espera... guardando avión");
            },
            success: function(response) {
                console.log(response);
                if (response === true) {
                    swalMixin("top", "success", "Avión guardado exitosamente en la base de datos");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                }else if(response.error){
                    swalMixin("top", "error", response.error);
                }
                
                else {
                    swalMixin("top", "error", "El avión no se pudo guardar");
                }
            },
            error: function(xhr, status, error) {
                swalMixin("top", "error", "Error al procesar la solicitud: " + error);
            }
        });
    }
}

//EDITAR AVIÓN
export function editar_avion(formAvion){
    $('.tblAvion').on('click', '.editarAvion', function(e){
        let idAvion = $(this).attr("editarAvion");  // Asegúrate de que el botón tenga un atributo 'data-idAvion'

        // Recopila los datos necesarios para la edición
        let datosFormulario = {
            idAvion: idAvion,
        };

        $.ajax({
            url: travelHub() + "Views/Ajax/avion.ajax.php", // Asegúrate de que esta URL apunte al archivo AJAX correcto que maneja los aviones
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
                // Asumiendo que tienes un formulario con los campos necesarios para editar un avión
                formAvion.idAvion.value = response.id_avion;
                formAvion.numeroSerie.value = response.numero_serie;
                formAvion.modelo.value = response.modelo;
                formAvion.capacidadAsientos.value = response.capacidad_asientos;
                formAvion.empresaPropietaria.value = response.empresa_propietaria;

                // Opcional: ajusta el texto y estilo del botón de guardar
                formAvion.btnAvion.textContent = "Guardar cambios";
                formAvion.btnAvion.style.background = "#FFD500"; // Color amarillo
                formAvion.btnAvion.style.color = "#000"; // Texto negro
            },
            error: function(xhr, status, error) {
                alert('No se pudo editar el avión. Error: ' + error);
            }
        });

    });
}


// Función para actualizar un avión
function actualizar_avion(formAvion, datosFormularioActualizar) {
    $.ajax({
            url: travelHub() + "Views/Ajax/avion.ajax.php", 
            type: 'POST',
            data: datosFormularioActualizar,
            dataType: "json",
        beforeSend: function() {
            swalMixin("top", "info", "Espera... actualizando avión");
        },
        success: function(response) {
            console.log(response);
            if (response == true) {
                // Notificar éxito
                swalMixin("top", "success", "Avión actualizado exitosamente en la base de datos");
                setTimeout(() => {
                    formAvion.btnAvion.removeAttribute("disabled");
                    formAvion.btnAvion.style.opacity = "1";
                    location.reload(); // Recarga la página para reflejar los cambios
                }, 1000);
            }else if(response.error){
                swalMixin("top", "error", response.error);
            } 
            
            else {
                // Mostrar mensaje de error específico
         // Log del error para diagnóstico
                swalMixin("top", "error", "El avión no se pudo actualizar: " + response.message);
                formAvion.btnAvion.removeAttribute("disabled");
                formAvion.btnAvion.style.opacity = "1";
            }
        }
    });
}



export function eliminar_avion() {
    $('.tblAvion').on('click', '.eliminarAvion', function(e) {
        let eliminarAvion = $(this).attr("eliminarAvion");
        let removeRow = $(this).closest('tr');

        Swal.fire({
            title: "¿Estás seguro?",
            text: "El avión será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: travelHub() + "Views/Ajax/avion.ajax.php",
                    type: 'POST',
                    data: { eliminarAvion: eliminarAvion },
                    dataType: 'json',
                    beforeSend: function() {
                        swalMixin("top", "info", "Eliminando...");
                    },
                    success: function(resultado) {
                        if (resultado == true) {
                            swalMixin("top", "success", "Avión eliminado correctamente");
                            removeRow.fadeOut(400, function() {
                                $(this).remove();
                            });
                        } else {
                            swalMixin("top", "error", "Ocurrió un error al eliminar el avión");
                        }
                    },
                    error: function() {
                        swalMixin("top", "error", "No se pudo procesar la petición");
                    }
                });
            }
        });
    });
}