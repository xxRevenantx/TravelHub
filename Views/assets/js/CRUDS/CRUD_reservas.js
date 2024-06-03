import { swal, swalMixin, travelHub } from '../modulos/modules.js'; 

export function insertar_o_actualizar_reserva(formReserva, idReserva, datosFormularioInsertar, datosFormularioActualizar) {
    if (idReserva != "") { // ACTUALIZAR
        actualizar_reserva(formReserva, datosFormularioActualizar);
    } else { // REGISTRAR RESERVA
        $.ajax({
            url: travelHub() + "Views/Ajax/reserva.ajax.php", 
            type: 'POST',
            data: datosFormularioInsertar,
            dataType: "json",
            beforeSend: function() {
                swalMixin("top", "info", "Espera... guardando reserva");
            },
            success: function(response) {
                console.log(response);
                if (response === true) {
                    swalMixin("top", "success", "Reserva guardada exitosamente en la base de datos");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else if (response.error) {
                    swalMixin("top", "error", response.error);
                } else {
                    swalMixin("top", "error", "La reserva no se pudo guardar");
                }
            },
            error: function(xhr, status, error) {
                swalMixin("top", "error", "Error al procesar la solicitud: " + error);
            }
        });
    }
}



export function editar_reserva(formReserva) {
    $('.tblReservas').on('click', '.EditarReserva', function(e) {
        let idReserva = $(this).attr("btnEditarReserva"); 

        // Recopila los datos necesarios para la edición
        let datosFormulario = {
            idReserva: idReserva,
        };

        $.ajax({
            url: travelHub() + "Views/Ajax/reserva.ajax.php", 
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
                // Asumiendo que tienes un formulario con los campos necesarios para editar una reserva
                formReserva.idReserva.value = response.id_reserva;
                formReserva.cliente_reserva.value = response.id_cliente;
                formReserva.destino_reserva.value = response.id_destino;
                formReserva.tipodestino_reserva.value = response.id_tipodestino;
                formReserva.fecha_reserva.value = response.fecha_reserva;
                formReserva.fecha_vuelo.value = response.fecha_vuelo;

                // Opcional: ajusta el texto y estilo del botón de guardar
                formReserva.btnReserva.textContent = "Guardar cambios";
                formReserva.btnReserva.style.background = "#FFD500"; // Color amarillo
                formReserva.btnReserva.style.color = "#000"; // Texto negro
            },
            error: function(xhr, status, error) {
                alert('No se pudo editar la reserva. Error: ' + error);
            }
        });
    });
}


function actualizar_reserva(formReserva, datosFormularioActualizar) {
    $.ajax({
        url: travelHub() + "Views/Ajax/reserva.ajax.php", 
        type: 'POST',
        data: datosFormularioActualizar,
        dataType: "json",
        beforeSend: function() {
            swalMixin("top", "info", "Espera... actualizando reserva");
        },
        success: function(response) {
            console.log(response);
            if (response === true) {
                // Notificar éxito
                swalMixin("top", "success", "Reserva actualizada exitosamente en la base de datos");
                setTimeout(() => {
                    formReserva.btnReserva.removeAttribute("disabled");
                    formReserva.btnReserva.style.opacity = "1";
                    location.reload(); // Recarga la página para reflejar los cambios
                }, 1000);
            } else if (response.error) {
                swalMixin("top", "error", response.error);
            } else {
                // Mostrar mensaje de error específico
                swalMixin("top", "error", "La reserva no se pudo actualizar: " + response.message);
                formReserva.btnReserva.removeAttribute("disabled");
                formReserva.btnReserva.style.opacity = "1";
            }
        }
    });
}


export function eliminar_reserva() {
    $('.tblReservas').on('click', '.eliminarReserva', function(e) {
        let eliminarReserva = $(this).attr("eliminarReserva");
        let removeRow = $(this).closest('tr');

        Swal.fire({
            title: "¿Estás seguro?",
            text: "La reserva será eliminada permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: travelHub() + "Views/Ajax/reserva.ajax.php",
                    type: 'POST',
                    data: { eliminarReserva: eliminarReserva },
                    dataType: 'json',
                    beforeSend: function() {
                        swalMixin("top", "info", "Eliminando...");
                    },
                    success: function(resultado) {
                        if (resultado === true) {
                            swalMixin("top", "success", "Reserva eliminada correctamente");
                            removeRow.fadeOut(400, function() {
                                $(this).remove();
                            });
                        } else {
                            swalMixin("top", "error", "Ocurrió un error al eliminar la reserva");
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
