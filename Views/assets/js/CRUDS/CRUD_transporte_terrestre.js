import {swal, swalMixin, travelHub} from '../modulos/modules.js'; 

// Función para insertar o actualizar transporte terrestre
export function insertar_o_actualizar_transporte_terrestre(formTransporteTerrestre, idTransporteTerrestre, datosFormularioInsertar, datosFormularioActualizar) {

    if (idTransporteTerrestre != "") { // ACTUALIZAR
        actualizar_transporte_terrestre(formTransporteTerrestre, datosFormularioActualizar);
    } else { // REGISTRAR TRANSPORTE TERRESTRE
        $.ajax({
            url: travelHub() + "Views/Ajax/transporte.terrestre.ajax.php", 
            type: 'POST',
            data: datosFormularioInsertar,
            dataType: "json",
            beforeSend: function() {
                swalMixin("top", "info", "Espera... guardando transporte terrestre");
            },
            success: function(response) {
                console.log(response);
                if (response === true) {
                    swalMixin("top", "success", "Transporte terrestre guardado exitosamente en la base de datos");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    console.log(response);
                    swalMixin("top", "error", "El transporte terrestre no se pudo guardar");
                }
            }
        });
    }
}

// EDITAR TRANSPORTE TERRESTRE
export function editar_transporte_terrestre(formTransporteTerrestre) {
    $('.tblTransporteTerrestre').on('click', '.editarTransporteTerrestre', function(e) {
        let idTransporte = $(this).attr("editarTransporteTerrestre");

        // Recopila los datos necesarios para la edición
        let datosFormulario = {
            idTransporte: idTransporte,
        };

        $.ajax({
            url: travelHub() + "Views/Ajax/transporte.terrestre.ajax.php",
            type: 'POST',
            data: datosFormulario,
            dataType: "json",

            success: function(response) {
                window.scroll({
                    top: 0,
                    left: 0,
                    behavior: "smooth",
                });
                // Asumiendo que tienes un formulario con los campos necesarios para editar un transporte terrestre
                formTransporteTerrestre.idTransporteTerrestre.value = response.id_transpterrestre;
                formTransporteTerrestre.tipoTransporte.value = response.tipo_transporte;
                formTransporteTerrestre.placa.value = response.placa;
                formTransporteTerrestre.capacidad.value = response.capacidad_pasajeros;
                formTransporteTerrestre.anioFabricacion.value = response.anio_fabricacion;
                formTransporteTerrestre.empresa.value = response.empresa_propietaria;

                // Opcional: ajusta el texto y estilo del botón de guardar
                formTransporteTerrestre.btnTransporteTerrestre.textContent = "Guardar cambios";
                formTransporteTerrestre.btnTransporteTerrestre.style.background = "#FFD500"; // Color amarillo
                formTransporteTerrestre.btnTransporteTerrestre.style.color = "#000"; // Texto negro
            },
            error: function(xhr, status, error) {
                alert('No se pudo editar el transporte terrestre. Error: ' + error);
            }
        });
    });
}

// Función para actualizar un transporte terrestre
function actualizar_transporte_terrestre(formTransporteTerrestre, datosFormularioActualizar) {
    $.ajax({
        url: travelHub() + "Views/Ajax/transporte.terrestre.ajax.php",
        type: 'POST',
        data: datosFormularioActualizar,
        dataType: "json",
        beforeSend: function() {
            swalMixin("top", "info", "Espera... actualizando transporte terrestre");
            formTransporteTerrestre.btnTransporteTerrestre.setAttribute("disabled", true);
            formTransporteTerrestre.btnTransporteTerrestre.style.opacity = "0.5";
        },
        success: function(response) {
            console.log(response);
            if (response == true) {
                swalMixin("top", "success", "Transporte terrestre actualizado exitosamente en la base de datos");
                setTimeout(() => {
                    formTransporteTerrestre.btnTransporteTerrestre.removeAttribute("disabled");
                    formTransporteTerrestre.btnTransporteTerrestre.style.opacity = "1";
                    location.reload(); // Recarga la página para reflejar los cambios
                }, 1000);
            } else {
                swalMixin("top", "error", "El transporte terrestre no se pudo actualizar: " + response.message);
                formTransporteTerrestre.btnTransporteTerrestre.removeAttribute("disabled");
                formTransporteTerrestre.btnTransporteTerrestre.style.opacity = "1";
            }
        }
    });
}

// Función para eliminar un transporte terrestre
export function eliminar_transporte_terrestre() {
    $('.tblTransporteTerrestre').on('click', '.eliminarTransporteTerrestre', function(e) {
        let eliminarTransporte = $(this).attr("eliminarTransporteTerrestre");
        let removeRow = $(this).closest('tr');

        Swal.fire({
            title: "¿Estás seguro?",
            text: "El transporte terrestre será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: travelHub() + "Views/Ajax/transporte.terrestre.ajax.php",
                    type: 'POST',
                    data: { eliminarTransporte: eliminarTransporte },
                    dataType: 'json',
                    beforeSend: function() {
                        swalMixin("top", "info", "Eliminando...");
                    },
                    success: function(resultado) {
                        if (resultado == true) {
                            swalMixin("top", "success", "Transporte terrestre eliminado correctamente");
                            removeRow.fadeOut(400, function() {
                                $(this).remove();
                            });
                        } else {
                            swalMixin("top", "error", "Ocurrió un error al eliminar el transporte terrestre");
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
