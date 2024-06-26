// EXPORTAMOSLAS FUNCIONES
import {swal, swalMixin, travelHub} from './modulos/modules.js'; 
import {editar_tipo_destino, insertar_o_actualizar_tipo_destino, eliminar_tipo_destino} from './CRUDS/CRUD_tipo_destino.js'; 
import {editar_avion,insertar_o_actualizar_avion, eliminar_avion} from './CRUDS/CRUD_avion.js'; 
import {editar_transporte_terrestre,insertar_o_actualizar_transporte_terrestre, eliminar_transporte_terrestre} from './CRUDS/CRUD_transporte_terrestre.js'; 
import {editar_destino,insertar_o_actualizar_destino, imagen, eliminar_destino} from './CRUDS/CRUD_destino.js'; 
import {editar_usuario,validarContrasena, insertar_o_actualizar_usuario, eliminar_usuario} from './CRUDS/CRUD_usuario.js'; 
import {editar_reserva,insertar_o_actualizar_reserva, eliminar_reserva} from './CRUDS/CRUD_reservas.js'; 

// VALIDACIONES
let formTransporteTerrestre = document.querySelector(".formTransporteTerrestre");
let formDestinoAdmin = document.querySelector(".formDestinoAdmin");
let formTipoDestino = document.querySelector(".formTipoDestino");
let formAvion = document.querySelector(".formAvion");
let formUsuario = document.querySelector(".formUsuario");
let formReserva = document.querySelector(".formReserva");


// VALIDAR USUARIO
function usuario(){

    if(formUsuario){
    
        formUsuario.addEventListener("submit", function(e){

            e.preventDefault();

            const usuario = e.target.usuario.value.trim();
            const nombre = e.target.nombre.value.trim();
            const apellido = e.target.apellido.value.trim();
            const email = e.target.email.value.trim();
            const password = e.target.password.value.trim();
            const rol = e.target.rol.value.trim();

            // Validar que los campos no estén vacíos
            if (!usuario || !nombre || !apellido || !email || !password || !rol) {
                swalMixin("top", "error", "Por favor, complete todos los campos obligatorios");
                return;

            }

             // Validar contraseña
             
                if (!validarContrasena(password)) {
                    swalMixin("top", "error", "La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.");
                    return;
                }

                  // Preparar datos para inserción
                    let datosFormularioInsertar = {
                        usuario: usuario.trim(),
                        nombre: nombre.trim(),
                        apellido: apellido.trim(),
                        email: email.trim(),
                        password: password.trim(),
                        rol: rol.trim(),
                    };

                    let idUsuario = e.target.idUsuario.value;

                    // Preparar datos para actualización
                    let datosFormularioActualizar = {
                        idUsuarioA: idUsuario.trim(),
                        usuarioA: usuario.trim(),
                        nombreA: nombre.trim(),
                        apellidoA: apellido.trim(),
                        emailA: email.trim(),
                        passwordA: password.trim(),
                        rolA: rol.trim(),
                    };

                    // Insertar o actualizar usuario
                    insertar_o_actualizar_usuario(formUsuario, idUsuario, datosFormularioInsertar, datosFormularioActualizar);


            })


       
    }
       
    editar_usuario(formUsuario);
    eliminar_usuario();
}

// VALIDAR EL DESTINO
function destino(){

    if(formDestinoAdmin){
         // Imagen
         imagen();
        formDestinoAdmin.addEventListener("submit", function(e){

            e.preventDefault();
           // Coordenadas
             const regex = /^-?\d{1,3}\.\d{1,6},\s?-?\d{1,3}\.\d{1,6}$/;
             let nombreDestino =  e.target.nombreDestino.value;
             let tipoDestino =  e.target.tipoDeDestino.value;
             let avion1 =  e.target.avion1.value;
             let avion2 =  e.target.avion2.value;
             let transporte1 =  e.target.transporte1.value;
             let transporte2 =  e.target.transporte2.value;
             let pais =  e.target.pais.value;
             let resena =  e.target.resena.value;
             let coordenadas =  e.target.coordenadas.value;
             let imagen =  e.target.imagen.files[0];
             let imagenDB =  e.target.imagenDB.value;
            

                // Validar que los campos no estén vacíos
            if (!nombreDestino.trim() || !tipoDestino.trim() || !avion1.trim() || !avion2.trim() || !transporte1.trim() || !transporte2.trim() || !pais.trim() || !resena.trim() || !coordenadas.trim() ) {
                    swalMixin("top", "error", "Por favor, complete todos los campos obligatorios");
                    return;
            }

            // Validar imagen
             if (!regex.test(coordenadas)){
                swalMixin("top","error","Por favor, ingrese las coordenadas en el formato correcto (ej. 35.6895, 139.6917)")
                return;
            }

              // Validar que el campo de imagen no esté vacío
            if (!imagen && imagenDB == "") {
                swalMixin("top", "error", "Por favor, seleccione una imagen");
                return;
            }

                let formData = new FormData(); // Crea un FormData para manejar archivos
                // Agregar los valores al FormData
                formData.append('destino', nombreDestino.trim());
                formData.append('tipodestino', tipoDestino.trim());
                formData.append('avion1', avion1.trim());
                formData.append('avion2', avion2.trim());
                formData.append('transporte1', transporte1.trim());
                formData.append('transporte2', transporte2.trim());
                formData.append('pais', pais.trim());
                formData.append('resena', resena.trim());
                formData.append('coordenadas', coordenadas.trim());
                formData.append('imagen', imagen);


                let formDataA = new FormData(); // Crea un FormData para manejar archivos
                let idDestinoActualizar =  e.target.idDestinoActualizar.value;

                // Datos del formulario para actualizar
                formDataA.append('idDestinoActualizar', idDestinoActualizar.trim());
                formDataA.append('destinoA', nombreDestino.trim());
                formDataA.append('tipodestinoA', tipoDestino.trim());
                formDataA.append('avion1A', avion1.trim());
                formDataA.append('avion2A', avion2.trim());
                formDataA.append('transporte1A', transporte1.trim());
                formDataA.append('transporte2A', transporte2.trim());
                formDataA.append('paisA', pais.trim());
                formDataA.append('resenaA', resena.trim());
                formDataA.append('coordenadasA', coordenadas.trim());
                formDataA.append('imagenA', imagen);
                formDataA.append('imagenDB', imagenDB);
                        
                 insertar_o_actualizar_destino(formDestinoAdmin, idDestinoActualizar, formData, formDataA)


        })
       
    }
       
    //Editar destino
    editar_destino(formDestinoAdmin);
    //Eliminar Destino
    eliminar_destino();
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
                swalMixin("top","error","Los campos no puede quedar vacíos")
                return;
            }

            
            // Validación de la placa: numérica y exactamente 6 caracteres
            if (!/^\d{6}$/.test(placa)) {
                swalMixin("top", "error", "La placa debe ser un valor numérico y contener exactamente 6 caracteres")
                return;
            }

            // Capacidad de pasajeros
            if( document.querySelector('.capacidad')){
                    const isValidCapacidad = Number.isInteger(Number(capacidad)) && capacidad >= 1 && capacidad <= 80;
                    if (!isValidCapacidad) {
                        swalMixin("top","error","La capacidad de pasajeros debe ser de 1 y 80")
                        return;
                    } 
            }
            // Año de fabricación
            if( document.querySelector('.anioFabricacion')){
                const isValidAnioFabricacion = Number.isInteger(Number(anioFabricacion)) && anioFabricacion >= 2000 && anioFabricacion <= 2024;
                if (!isValidAnioFabricacion) {
                    swalMixin("top","error","El año de fabricación debe ser 2000 al 2024")
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
            swalMixin("top","error","Los campos no puede quedar vacíos")
            return;
        }
            //Convertir a minúsculas para estandarizar la comparación
            epocaSugerida = epocaSugerida.toLowerCase();
           // Valida que la época sugerida sea una de las cuatro opciones permitidas
           const epocasValidas = ["primavera", "verano", "otoño", "invierno"];
           if (!epocasValidas.includes(epocaSugerida)) {
               swalMixin("top", "error", "La época sugerida debe ser primavera, verano, otoño o invierno");
               return;
           }

            // Convertir a minúsculas para estandarizar la comparación
            actividadesPopulares = actividadesPopulares.toLowerCase();
            // Validación de actividades populares
            const actividadesValidas = [
                "paseo en lancha",
                "tour por la ciudad",
                "recorrido del centro histórico",
                "visita a museos",
                "visita a acuarios"
            ];
            if (!actividadesValidas.includes(actividadesPopulares)) {
                swalMixin("top", "error", "Las actividades populares deben ser una de las siguientes: paseo en lancha, tour por la ciudad, recorrido del centro histórico, visita a museos, visita a acuarios");
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
            swalMixin("top","error","Todos los campos son obligatorios");
            return;
        }

        
        // Validación del número de serie alfanumérico de exactamente 10 caracteres
        const regexNumeroSerie = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{10}$/;
            if (!regexNumeroSerie.test(numeroSerie)) {
                swalMixin("top", "error", "El número de serie debe ser alfanumérico y tener exactamente 10 caracteres");
                return;
        
        }
        

        // Validación para la capacidad de asientos

        const isValidCapacidad = Number.isInteger(Number(capacidadAsientos)) && capacidadAsientos >= 1 && capacidadAsientos <= 80;
            
        if (!isValidCapacidad) {
            swalMixin("top","error","La capacidad de asientos debe ser de 1 y 80")
            return;
        } 
    
    
        // Preparar datos para inserción o actualización
        let datosFormularioInsertar = {
            numeroSerie: numeroSerie.trim().toUpperCase(),
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

// VALIDAR RESERVA
function reserva(){
    if(formReserva){
    formReserva.addEventListener("submit", function(e){
        e.preventDefault();

        // Recoger los valores del formulario
        let clienteReserva = e.target.cliente_reserva.value;
        let destinoReserva = e.target.destino_reserva.value;
        let tipoDestinoReserva = e.target.tipodestino_reserva.value;
        let fecha_reserva = e.target.fecha_reserva.value;
        let fecha_vuelo = e.target.fecha_vuelo.value;


        // Validación de campos no vacíos
        if (clienteReserva == "" || destinoReserva == "" || tipoDestinoReserva == "" || fecha_reserva == "" || fecha_vuelo == "") {
            swalMixin("top", "error", "Todos los campos son obligatorios");
            return;
        }

        // Validación de fechas (fecha de reserva no debe ser después de la fecha de vuelo)
        if (new Date(fecha_reserva) > new Date(fecha_vuelo)) {
            swalMixin("top", "error", "La fecha de reserva no puede ser posterior a la fecha de vuelo");
            return;
        }

        // Preparar datos para inserción o actualización
        let idReserva = e.target.idReserva.value;

        let datosFormularioInsertar = {
            clienteReserva: clienteReserva.trim(),
            destinoReserva: destinoReserva.trim(),
            tipoDestinoReserva: tipoDestinoReserva.trim(),
            fecha_reserva: fecha_reserva.trim(),
            fecha_vuelo: fecha_vuelo.trim(),
        };

        let datosFormularioActualizar = {
            idReservaA: idReserva.trim(),
            clienteReservaA: clienteReserva.trim(),
            destinoReservaA: destinoReserva.trim(),
            tipoDestinoReservaA: tipoDestinoReserva.trim(),
            fecha_reservaA: fecha_reserva.trim(),
            fecha_vueloA: fecha_vuelo.trim(),
        };
    
     // Aquí puedes manejar la inserción o actualización de los datos de la reserva
     insertar_o_actualizar_reserva(formReserva, idReserva, datosFormularioInsertar, datosFormularioActualizar);
    });

    // Función para manejar la edición de una reserva
    editar_reserva(formReserva);

    // Función para manejar la eliminación de una reserva
    eliminar_reserva();

}
}


// EJECUCIÓN DE FUNCIONES
tipoDestino();
avion();
transporteTerrestre();
destino();
usuario();
reserva();