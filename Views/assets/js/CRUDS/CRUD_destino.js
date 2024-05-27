import { swal, swalMixin, travelHub } from '../modulos/modules.js'; 


export function imagen(){
    const file = e.target.files[0];
    if (file) {
        const img = new Image();
        img.onload = function() {
            if (img.width === 1200 && img.height === 720) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imgElement = document.getElementById('imagenSeleccionada');
                    imgElement.src = event.target.result;
                    document.getElementById('previewImagen').style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                swalMixin("center", "error", "La imagen debe tener una resolución de 1200px x 720px");
                e.target.value = ""; // Clear the file input
                document.getElementById('previewImagen').style.display = 'none';
            }
        }
        img.src = URL.createObjectURL(file);
    }

}

export function insertar_o_actualizar_destino(formDestino, idDestino, datosFormularioInsertar, datosFormularioActualizar) {
    if (idDestino != "") { // ACTUALIZAR
        actualizar_destino(formDestino, datosFormularioActualizar);
    } else { // REGISTRAR DESTINO
        $.ajax({
            url: travelHub() + "Views/Ajax/destino.ajax.php",
            type: 'POST',
            data: datosFormularioInsertar,
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
    $('.tblDestino').on('click', '.editarDestino', function(e) {
        let idDestino = $(this).attr("data-idDestino");

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
                // Asumiendo que tienes un formulario con los campos necesarios para editar un destino
                formDestino.idDestinoActualizar.value = response.id_destino;
                formDestino.destino.value = response.destino;
                formDestino.avion1.value = response.avion1;
                formDestino.avion2.value = response.avion2;
                formDestino.transporte1.value = response.transporte1;
                formDestino.transporte2.value = response.transporte2;
                formDestino.pais.value = response.pais;
                formDestino.resena.value = response.resena;
                formDestino.coordenadas.value = response.coordenadas;

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
        dataType: "json",
        beforeSend: function() {
            swalMixin("top", "info", "Espera... actualizando destino");
            formDestino.btnDestino.setAttribute("disabled", true);
            formDestino.btnDestino.style.opacity = "0.5";
        },
        success: function(response) {
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
                console.log(response); // Log del error para diagnóstico
                swalMixin("top", "error", "El destino no se pudo actualizar: " + response.message);
                formDestino.btnDestino.removeAttribute("disabled");
                formDestino.btnDestino.style.opacity = "1";
            }
        }
    });
}

// ELIMINAR DESTINO
export function eliminar_destino() {
    $('.tblDestino').on('click', '.eliminarDestino', function(e) {
        let idDestino = $(this).attr("data-idDestino");
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
