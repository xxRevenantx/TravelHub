import {swal, swalMixin, travelHub} from '../modulos/modules.js'; 
   
export function insertar_o_actualizar_usuario(formUsuario, idUsuario, datosFormularioInsertar, datosFormularioActualizar) {

    if (idUsuario != "") { // ACTUALIZAR
        actualizar_usuario(formUsuario, datosFormularioActualizar);
    } else { // REGISTRAR USUARIO
        $.ajax({
            url: travelHub() + "Views/Ajax/usuarios.ajax.php", 
            type: 'POST',
            data: datosFormularioInsertar,
            dataType: "json",
            beforeSend: function() {
                swalMixin("top", "info", "Espera... guardando usuario");
            },
            success: function(response) {
                console.log(response);
                if (response === true) {
                    swalMixin("top", "success", "Usuario guardado exitosamente en la base de datos");
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    swalMixin("top", "error", "El usuario no se pudo guardar");
                }
            },
            error: function(xhr, status, error) {
                swalMixin("top", "error", "Error al procesar la solicitud: " + error);
            }
        });
    }
}

//EDITAR USUARIO
export function editar_usuario(formUsuario){
    $('.tblUsuarios').on('click', '.editarUsuario', function(e){
        let idUsuario = $(this).attr("editarUsuario"); 

        // Recopila los datos necesarios para la edición
        let datosFormulario = {
            idUsuario: idUsuario,
        };

        $.ajax({
            url: travelHub() + "Views/Ajax/usuarioS.ajax.php", 
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

                formUsuario.idUsuario.value = response.Id_usuario;
                formUsuario.usuario.value = response.Usuario;
                formUsuario.nombre.value = response.Nombre;
                formUsuario.apellido.value = response.Apellido;
                formUsuario.email.value = response.Email;
                formUsuario.password.value = response.Password; // Limpia el campo de contraseña
                formUsuario.rol.value = response.Rol;

                formUsuario.btnGuardar.textContent = "Guardar cambios";
                formUsuario.btnGuardar.style.background = "#FFD500"; // Color amarillo
                formUsuario.btnGuardar.style.color = "#000"; // Texto negro
            },
            error: function(xhr, status, error) {
                alert('No se pudo editar el usuario. Error: ' + error);
            }
        });

    });
}

// Función para actualizar un usuario
function actualizar_usuario(formUsuario, datosFormularioActualizar) {
    $.ajax({
            url: travelHub() + "Views/Ajax/usuarios.ajax.php", 
            type: 'POST',
            data: datosFormularioActualizar,
            dataType: "json",
        beforeSend: function() {
            swalMixin("top", "info", "Espera... actualizando usuario");
            formUsuario.btnGuardar.setAttribute("disabled", true);
            formUsuario.btnGuardar.style.opacity = "0.5";
        },
        success: function(response) {
            console.log(response);
            if (response == true) {
                
                // Notificar éxito
                swalMixin("top", "success", "Usuario actualizado exitosamente en la base de datos");
                setTimeout(() => {
                    formUsuario.btnGuardar.removeAttribute("disabled");
                    formUsuario.btnGuardar.style.opacity = "1";
                    location.reload(); // Recarga la página para reflejar los cambios
                }, 1000);
            } else {
                // Mostrar mensaje de error específico
                swalMixin("top", "error", "El usuario no se pudo actualizar: " + response.message);
                formUsuario.btnGuardar.removeAttribute("disabled");
                formUsuario.btnGuardar.style.opacity = "1";
            }
        }
    });
}

// Función para eliminar un usuario
export function eliminar_usuario() {
    $('.tblUsuarios').on('click', '.eliminarUsuario', function(e) {
        let eliminarUsuario = $(this).attr("eliminarUsuario");
        let removeRow = $(this).closest('tr');

        Swal.fire({
            title: "¿Estás seguro?",
            text: "El usuario será eliminado permanentemente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: travelHub() + "Views/Ajax/usuarios.ajax.php",
                    type: 'POST',
                    data: { eliminarUsuario: eliminarUsuario },
                    dataType: 'json',
                    beforeSend: function() {
                        swalMixin("top", "info", "Eliminando...");
                    },
                    success: function(resultado) {
                        if (resultado == true) {
                            swalMixin("top", "success", "Usuario eliminado correctamente");
                            removeRow.fadeOut(400, function() {
                                $(this).remove();
                            });
                        } else {
                            swalMixin("top", "error", "Ocurrió un error al eliminar el usuario");
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



   // Función para validar la contraseña
export function validarContrasena(password) {
        const regex = /^(?=.*[a-z])(?=.*\d).{8,}$/;
        return regex.test(password);
}