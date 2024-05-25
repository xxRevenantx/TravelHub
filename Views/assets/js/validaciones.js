// EXPORTAMOSLAS FUNCIONES
import {swal, swalMixin, travelHub} from './modulos/modules.js'; 

// VALIDACIONES


let formTransporteTerrestre = document.querySelector(".formTransporteTerrestre");
let formDestinoAdmin = document.querySelector(".formDestinoAdmin");
let formTipoDestino = document.querySelector(".formTipoDestino");
let formAvion = document.querySelector(".formAvion");
let formUsuario = document.querySelector(".formUsuario");


// VALIDAR EL DESTINO
if(formDestinoAdmin){
    formDestinoAdmin.addEventListener("submit", function(e){
        e.preventDefault();
        destino();
    })

}

// VALIDAR EL TRANSPORTE TERRESTRE
if(formTransporteTerrestre){
    formTransporteTerrestre.addEventListener("submit", function(e){
        e.preventDefault();
        transporteTerrestre();
    })
}

// VALIDAR EL TIPO DE DESTINO
if(formTipoDestino){
    formTipoDestino.addEventListener("submit", function(e){
        e.preventDefault();
        tipoDestino();
    })
}

// VALIDAR EL AVION
if(formAvion){
    formAvion.addEventListener("submit", function(e){
        e.preventDefault();
        avion();
    })
}




function destino(){
 
    // Coordenadas
    const regex = /^-?\d{1,3}\.\d{1,6},\s?-?\d{1,3}\.\d{1,6}$/;

    // Validar cada campo que es obligatorio
    ['destino', 'avion1', 'avion2', 'transporte1', 'transporte2', 'pais', 'resena', 'coordenadas'].forEach(id => {
        
        const input = document.getElementById(id);

        if (!input.value.trim()) { // Validar que todos los campos hayan sido completados
            swalMixin("center","error","Por favor, complete los campos requeridos")
            return;
        } 

        if(id == "coordenadas"){ // Validación de las coordenadas
            if (!regex.test(input.value.trim())){
                swalMixin("center","error","Por favor, ingrese las coordenadas en el formato correcto (ej. 35.6895, 139.6917)")
                return;
            }
        }
    });
       
        if(formDestinoAdmin.idDestinoActualizar.value != ""){ // ACTUALIZAR
            let id = formDestinoAdmin.idDestinoActualizar.value;
            // Recopila los datos del formulario
            let datosFormulario = {
                idA: id,
                nombreA: nombre,
                primerApellidoA: primerApellido,
                segundoApellidoA: segundoApellido,
                lugarNacimientoA: lugarNacimiento,
                fechaNacimientoA: fechaNacimiento,
                sexoA: sexo,
                rfcA: rfc, 
                curpA: curp,
                fechaRegistroA: fechaRegistro 
            };
              // Realiza la solicitud AJAX
              $.ajax({
                url:  travelHub()+"Views/Ajax/cliente.ajax.php", 
                type: 'POST',
                data: datosFormulario,
                dataType : "json",
                beforeSend: function () {
                    swalMixin("top","info","Espera... actualizando cliente")
                     formClienteAdmin.btnCliente.setAttribute("disabled","")
                     formClienteAdmin.btnCliente.style.opacity = "0.5"
                },
                success: function(response) {
                    if(response == true){
                        // Aquí se maneja lo que ocurre después de enviar los datos exitosamente
                        swalMixin("top","success","Cliente actualizado exitosamente en la base de datos")
                         formClienteAdmin.btnCliente.setAttribute("disabled","")
                         formClienteAdmin.btnCliente.style.opacity = "0.5"
                        setTimeout(() => {
                        location.reload();
                    }, 2000);
                    }else{
                        console.log(response);
                        swalMixin("top","error","El cliente no se pudo actualizar")
                    }
                
                },
                error: function(xhr, status, error) {
                    // Aquí manejas los errores
                    alert('No se pudo actualizar el cliente');
                }
            });
                
        
        }else{ // Registrar cliente

            // Datos del formulario
            let datosFormularioDestino = {
                idDestinoActualizar: document.querySelector('.idDestinoActualizar').value,
                destino: document.querySelector('#destino').value,
                avion1: document.querySelector('#avion1').value,
                avion2: document.querySelector('#avion2').value,
                transporte1: document.querySelector('#transporte1').value,
                transporte2: document.querySelector('#transporte2').value,
                pais: document.querySelector('#pais').value,
                resena: document.querySelector('#resena').value,
                coordenadas: document.querySelector('#coordenadas').value
            };


            $.ajax({
                url: travelHub() + "Views/Ajax/destino.ajax.php",
                type: 'POST',
                data: datosFormularioDestino,
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
                        console.log(response);
                        swalMixin("top", "error", "El destino no se pudo guardar");
                    }
                },
                error: function(xhr, status, error) {
                    alert('No se pudo guardar el destino. Error: ' + error);
                }
            });
   
                }
      
      
        



}

function tipoDestino(){
    const campos = ['nombreDestino', 'actividadesPopulares', 'epocaSugerida'];
    let datosFormulario = {};
    campos.forEach(function(campoId) {
        const input = document.getElementById(campoId);
        if (!input.value.trim()) {
            swalMixin("center","error","Por favor, complete los campos requeridos")
            return;
        }
        datosFormulario[campoId] = input.value.trim(); // Añadir cada campo al objeto de datos
       
    });


   

}

function transporteTerrestre(){

    let tipoTransporte = document.querySelector(".tipoTransporte").value;
    let placa = document.querySelector(".placa").value;
    let capacidad = document.querySelector(".capacidad").value;
    let anioFabricacion = document.querySelector(".anioFabricacion").value;
    let empresa = document.querySelector(".empresa").value;


    if(tipoTransporte == "" || placa == "" || capacidad == "" || anioFabricacion == "" || empresa == ""){
        swalMixin("center","error","Los campos no puede quedar vacíos")
        return;
    }
    // Capacidad de pasajeros
    if( document.querySelector('.capacidad')){
            const isValidCapacidad = Number.isInteger(Number(capacidad)) && capacidad >= 1 && capacidad <= 80;
            if (!isValidCapacidad) {
                swalMixin("center","error","La capacidad de pasajeros debe ser de 1 y 80")
                return;
            } 
    }

    // Año de fabricación
    if( document.querySelector('.anioFabricacion')){
        const isValidAnioFabricacion = Number.isInteger(Number(anioFabricacion)) && anioFabricacion >= 2000 && anioFabricacion <= 2024;
        if (!isValidAnioFabricacion) {
            swalMixin("center","error","El año de fabricación debe ser 2000 al 2024")
                return;
        }   
    }






    swalMixin("top","success","Datos validados correctamente")


}


function avion(){

            const numeroSerie = document.getElementById('numeroSerie').value;
            const modelo = document.getElementById('modelo').value;
            const capacidad = document.getElementById('capacidadAsientos').value;
            const empresaPropietaria = document.getElementById('empresaPropietaria').value;

            if(numeroSerie == "" || modelo == "" || capacidad == "" || empresaPropietaria == "" ){
                swalMixin("center","error","Los campos no puede quedar vacíos")
                return;
            }
            const isValidCapacidad = Number.isInteger(Number(capacidad)) && capacidad >= 1 && capacidad <= 80;
            
            if (!isValidCapacidad) {
                swalMixin("center","error","La capacidad de asientos debe ser de 1 y 80")
                return;
            } 
       


        // Recopila los datos del formulario
        let datosFormulario = {
            numeroSerie: numeroSerie,
            modelo: modelo,
            capacidadAsientos: capacidad,
            empresaPropietaria: empresaPropietaria
        };

        // Realiza la solicitud AJAX
        $.ajax({
            url:  travelHub()+"Views/Ajax/avion.ajax.php", // Asegúrate de cambiar esta URL
            type: 'POST',
            data: datosFormulario,
            dataType : "json",

            success: function(response) {
                console.log(response);
                // Aquí manejas lo que ocurre después de enviar los datos exitosamente
                alert('Avión guardado correctamente');
            },
            error: function(xhr, status, error) {
                // Aquí manejas los errores
                alert('No se pudo guardar el avión');
            }
        });
          


}






