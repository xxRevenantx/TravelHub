// EXPORTAMOSLAS FUNCIONES
import {swal, swalMixin, travelHub} from './modulos/modules.js'; 
import {editar_tipo_destino, insertar_o_actualizar_tipo_destino, eliminar_tipo_destino} from './CRUDS/CRUD_tipo_destino.js'; 
import {editar_avion,insertar_o_actualizar_avion, eliminar_avion} from './CRUDS/CRUD_avion.js'; 
import {editar_transporte_terrestre,insertar_o_actualizar_transporte_terrestre, eliminar_transporte_terrestre} from './CRUDS/CRUD_transporte_terrestre.js'; 
import {insertar_o_actualizar_destino, imagen} from './CRUDS/CRUD_destino.js'; 

// VALIDACIONES
let formTransporteTerrestre = document.querySelector(".formTransporteTerrestre");
let formDestinoAdmin = document.querySelector(".formDestinoAdmin");
let formTipoDestino = document.querySelector(".formTipoDestino");
let formAvion = document.querySelector(".formAvion");
let formUsuario = document.querySelector(".formUsuario");


// VALIDAR EL DESTINO
function destino(){

    if(formDestinoAdmin){
        formDestinoAdmin.addEventListener("submit", function(e){

            e.preventDefault();
           // Coordenadas
             const regex = /^-?\d{1,3}\.\d{1,6},\s?-?\d{1,3}\.\d{1,6}$/;
             let destino =  e.target.destino.value;
             let avion1 =  e.target.avion1.value;
             let avion2 =  e.target.avion2.value;
             let transporte1 =  e.target.transporte1.value;
             let transporte2 =  e.target.transporte2.value;
             let pais =  e.target.pais.value;
             let resena =  e.target.resena.value;
             let coordenadas =  e.target.coordenadas.value;

                // Validar que los campos no estén vacíos
            if (!destino.trim() || !avion1.trim() || !avion2.trim() || !transporte1.trim() || !transporte2.trim() || !pais.trim() || !resena.trim() || !coordenadas.trim()) {
                    swalMixin("center", "error", "Por favor, complete todos los campos obligatorios");
                    return;
            }


             if (!regex.test(coordenadas)){
                swalMixin("center","error","Por favor, ingrese las coordenadas en el formato correcto (ej. 35.6895, 139.6917)")
                return;
            }


                // Datos del formulario
                let datosFormularioDestinoInsertar = {
                    destino: destino,
                    avion1: avion1,
                    avion2: avion2,
                    transporte1: transporte1,
                    transporte2: transporte2,
                    pais: pais,
                    resena: resena,
                    coordenadas: coordenadas
                };

                let idDestinoActualizar =  e.target.idDestinoActualizar.value;
                // Datos del formulario para actualizar
                let datosFormularioDestinoActualizar = {
                    idDestinoActualizarA: idDestinoActualizar,
                    destinoA: destino,
                    avion1A: avion1,
                    avion2A: avion2,
                    transporte1A: transporte1,
                    transporte2A: transporte2,
                    paisA: pais,
                    resenaA: resena,
                    coordenadasA: coordenadas
                };
                        
                 insertar_o_actualizar_destino(formDestinoAdmin, idDestinoActualizar, datosFormularioDestinoInsertar, datosFormularioDestinoActualizar)


        })
    
    }
       
    // Imagen
    imagen();
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
    // Editar transporte terrestre
    editar_transporte_terrestre(formTransporteTerrestre)
    // Eliminar transporte terrestre
    eliminar_transporte_terrestre();
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



// EJECUCIÓN DE FUNCIONES
tipoDestino();
avion();
transporteTerrestre();
destino();