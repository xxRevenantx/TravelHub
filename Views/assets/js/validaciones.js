// EXPORTAMOSLAS FUNCIONES
import {swal, swalMixin, travelHub} from './modulos/modules.js'; 
import {editar_tipo_destino, insertar_o_actualizar_tipo_destino, eliminar_tipo_destino} from './CRUDS/CRUD_tipo_destino.js'; 
import {editar_avion,insertar_o_actualizar_avion, eliminar_avion} from './CRUDS/CRUD_avion.js'; 
import {insertar_o_actualizar_transporte_terrestre} from './CRUDS/CRUD_transporte_terrestre.js'; 

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
function transporteTerrestre(){

    if(formTransporteTerrestre){
        formTransporteTerrestre.addEventListener("submit", function(e){

            e.preventDefault();
            let tipoTransporte = e.target.tipoTransporte.value;
            let placa = e.target.placa.value;
            let capacidad = e.target.capacidad.value;
            let anioFabricacion = e.target.anioFabricacion.value;
            let empresaPropietaria =e.target.empresa.value;
        
        
            if(tipoTransporte == "" || placa == "" || capacidad == "" || anioFabricacion == "" || empresaPropietaria == ""){
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
        // Preparar datos para inserción
        let datosFormularioInsertar = {
            tipoTransporte: tipoTransporte.trim(),
            placa: placa.trim(),
            capacidad: capacidad.trim(),
            anioFabricacion: anioFabricacion.trim(),
            empresaPropietaria: empresaPropietaria.trim(),
        };


        let idTransporteTerrestre = e.target.idTransporteTerrestre.value;
        // Preparar datos para actualización
        let datosFormularioActualizar = {
            idTransporteTerrestreA: idTransporteTerrestre.trim(),
            tipoTransporteA: tipoTransporte.trim(),
            placaA: placa.trim(),
            capacidadA: capacidad.trim(),
            anioFabricacionA: anioFabricacion.trim(),
            empresaPropietariaA: empresaPropietaria.trim(),
        };


            // Insertar transporte terrestre
            insertar_o_actualizar_transporte_terrestre(formTransporteTerrestre, idTransporteTerrestre, datosFormularioInsertar, datosFormularioActualizar)
          
        })



    }
  
}


// VALIDAR EL TIPO DE DESTINO
function tipoDestino(){
if(formTipoDestino){
    formTipoDestino.addEventListener("submit", function(e){
        e.preventDefault();
        let nombreDestino = e.target.nombreDestino.value;
        let actividadesPopulares = e.target.actividadesPopulares.value;
        let epocaSugerida = e.target.epocaSugerida.value;


        if(nombreDestino == "" || actividadesPopulares == "" || epocaSugerida == "" ){
            swalMixin("center","error","Los campos no puede quedar vacíos")
            return;
        }

        // Recopila los datos del formulario
        let datosFormularioInsertar = {
            nombreDestino: nombreDestino.trim(),
            actividadesPopulares: actividadesPopulares.trim(),
            epocaSugerida: epocaSugerida.trim(),
        };

        
        let idTipoDestino =  formTipoDestino.idTipoDestino.value;
                // Recopila los datos del formulario
        let datosFormularioActualizar = {
            idA: idTipoDestino.trim(),
            nombreDestinoA: nombreDestino.trim(),
            actividadesPopularesA: actividadesPopulares.trim(),
            epocaSugeridaA: epocaSugerida.trim(),
        };


            insertar_o_actualizar_tipo_destino(formTipoDestino, idTipoDestino, datosFormularioInsertar, datosFormularioActualizar); // Función para insertar los registros del tipo de destino
    })
}



    editar_tipo_destino(formTipoDestino);
    eliminar_tipo_destino();
}

// VALIDAR EL AVION
function avion(){
    if(formAvion){
    formAvion.addEventListener("submit", function(e){
        e.preventDefault();
    
        // Recoger los valores del formulario
        let numeroSerie = e.target.numeroSerie.value;
        let modelo = e.target.modelo.value;
        let capacidadAsientos = e.target.capacidadAsientos.value;
        let empresaPropietaria = e.target.empresaPropietaria.value;


        // Validación de campos no vacíos
        if(numeroSerie == "" || modelo == "" || capacidadAsientos == "" || empresaPropietaria == ""){
            swalMixin("center","error","Todos los campos son obligatorios");
            return;
        }

        

        const isValidCapacidad = Number.isInteger(Number(capacidadAsientos)) && capacidadAsientos >= 1 && capacidadAsientos <= 80;
            
        if (!isValidCapacidad) {
            swalMixin("center","error","La capacidad de asientos debe ser de 1 y 80")
            return;
        } 
    
    
        // Preparar datos para inserción o actualización
        let datosFormularioInsertar = {
            numeroSerie: numeroSerie.trim(),
            modelo: modelo.trim(),
            capacidadAsientos: capacidadAsientos.trim(),
            empresaPropietaria: empresaPropietaria.trim(),
        };
    
        let idAvionA = formAvion.idAvion.value;
    
        let datosFormularioActualizar = {
            idAvionA: idAvionA.trim(),
            numeroSerieA: numeroSerie.trim(),
            modeloA: modelo.trim(),
            capacidadAsientosA: capacidadAsientos.trim(),
            empresaPropietariaA: empresaPropietaria.trim()
        };
    
        // Función para insertar o actualizar registros de avión
        insertar_o_actualizar_avion(formAvion, idAvionA, datosFormularioInsertar, datosFormularioActualizar);
       
    });


    // Función para editar avión
    editar_avion(formAvion);
    // Eliminar avión
    eliminar_avion();
    
}
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
                
        
        }else{ // REGISTRAR DESTINO

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



// EJECUCIÓN DE FUNCIONES
tipoDestino();
avion();
transporteTerrestre();