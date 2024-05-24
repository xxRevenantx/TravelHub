// EXPORTAMOSLAS FUNCIONES
import {swal, swalMixin, travelHub} from './modulos/modules.js'; 


/* ============= GENERAR CURP ======================== */

// Función generarCURP que recibe los parámetros: nombre, primerApellido, segundoApellido, fechaNacimiento, sexo y lugar de Nacimiento
function generarCURP(nombre, primerApellido, segundoApellido, fechaNacimiento, sexo, lugarNacimiento) {
    const vocalRegex = /[AEIOU]/i; // Expresión regular para encontrar la primera vocal
    const consonanteRegex = /[^AEIOU]/i; // Expresión regular para encontrar la primera consonante que no sea vocal

    // Función que encuentra la primera vocal después de la primera letra en una cadena usando regex
    const encontrarPrimeraVocal = (str) => {
        const match = str.slice(1).match(vocalRegex);
        return match ? match[0].toUpperCase() : '';
    };

    // Función que encuentra la primera consonante después de la primera letra en una cadena usando regex
    const encontrarPrimeraConsonante = (str) => {
        const match = str.slice(1).match(consonanteRegex);
        return match ? (match[0].toUpperCase() === 'Ñ' ? 'X' : match[0].toUpperCase()) : '';
    };

    // Función que genera una homoclave aleatoria
    const generarHomoclave = () => {
        const letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const numeros = '0123456789';
        const letra = letras.charAt(Math.floor(Math.random() * letras.length));
        const numero = numeros.charAt(Math.floor(Math.random() * numeros.length));
        return letra + numero;
    };

    // Toma la primera letra del primer apellido y la convierte a mayúsculas
    let curp = primerApellido.charAt(0).toUpperCase();

    // Añade la primera vocal del primer apellido en mayúsculas a la CURP
    curp += encontrarPrimeraVocal(primerApellido);

    // Añade la primera letra del segundo apellido en mayúsculas a la CURP
    curp += segundoApellido.charAt(0).toUpperCase();

    // Añade la primera letra del nombre en mayúsculas a la CURP
    curp += nombre.charAt(0).toUpperCase();

    // Divide la fecha de nacimiento en año, mes y día
    const [year, month, day] = fechaNacimiento.split('-');

    // Añade los últimos dos dígitos del año de nacimiento a la CURP
    curp += year.slice(2);

    // Añade el mes de nacimiento a la CURP
    curp += month;

    // Añade el día de nacimiento a la CURP
    curp += day;

    // Añade el sexo (H o M) en mayúsculas a la CURP
    curp += sexo.toUpperCase();

    // Añade el estado de nacimiento en mayúsculas a la CURP
    curp += lugarNacimiento.toUpperCase();

    // Añade la primera consonante interna del primer apellido a la CURP
    curp += encontrarPrimeraConsonante(primerApellido);

    // Añade la primera consonante interna del segundo apellido a la CURP
    curp += encontrarPrimeraConsonante(segundoApellido);

    // Añade la primera consonante interna del nombre a la CURP
    curp += encontrarPrimeraConsonante(nombre);

    // Añade una homoclave generada aleatoriamente a la CURP
    curp += generarHomoclave();

    // Retorna la CURP generada
    return curp;
}




// Selecciona el formulario con la clase "formClienteAdmin" y lo asigna a la variable 'form'
let form = document.querySelector(".formClienteAdmin");

if (form) { // Verifica si el formulario existe

    // fecha actual
    document.addEventListener('DOMContentLoaded', function() {
        const fechaRegistroInput = document.getElementById('fechaRegistro');
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0');
        const day = String(today.getDate()).padStart(2, '0');
        const fechaRegistro = `${year}-${month}-${day}`;
        fechaRegistroInput.value = fechaRegistro;
    });
    
    form.addEventListener('submit', function(e) {// Agrega un evento de escucha para el evento 'submit' del formulario
        
        e.preventDefault(); // Previene la acción por defecto del formulario (evita que se envíe)
        
         // Obtiene el valor del input con id 'nombre' y lo asigna a la variable 'nombre'
        const nombre = document.getElementById('nombre').value;
       
        // Obtiene el valor del input con id 'primerApellido' y lo asigna a la variable 'primerApellido'
        const primerApellido = document.getElementById('primerApellido').value;
        
        // Obtiene el valor del input con id 'segundoApellido' y lo asigna a la variable 'segundoApellido'
        const segundoApellido = document.getElementById('segundoApellido').value;
        
        // Obtiene el valor del input con id 'fechaNacimiento' y lo asigna a la variable 'fechaNacimiento'
        const fechaNacimiento = document.getElementById('fechaNacimiento').value;
        
        // Obtiene el valor del select con id 'sexo' y lo asigna a la variable 'sexo'
        const sexo = document.getElementById('sexo').value;
        
         // Obtiene el valor del select con id 'de lugar de Nacimiento' y lo asigna a la variable 'lugar de Nacimiento'
        const lugarNacimiento = document.getElementById('lugarNacimiento').value;


        const rfc = document.getElementById('rfc').value;
        
        
        const fechaRegistro = document.getElementById('fechaRegistro').value;
       
        // Verifica que todas las variables tienen un valor (no están vacías)
        if (nombre && primerApellido && segundoApellido && fechaNacimiento && sexo && lugarNacimiento && curp && rfc && fechaRegistro) {

            const soloLetras = /^[a-zA-ZñÑ\s]+$/;
            const fechaRegex = /^\d{4}-\d{2}-\d{2}$/;
            const rfcRegex = /^[A-Z0-9]{13}$/;


               // Validar nombre
               if (!soloLetras.test(nombre)) {
                swalMixin("top","error","El nombre no debe contener caracteres especiales")
                return;
            } 
            // Validar primer apellido
            if (!soloLetras.test(primerApellido)) {
                swalMixin("top","error","El primer apellido no debe contener caracteres especiales")
                return;
            } 
            // Validar segundo apellido
            if (!soloLetras.test(segundoApellido)) {
                swalMixin("top","error","El segundo apellido no debe contener caracteres especiales")
                return;
               
            } 

             // Validar fecha de registro
             if (!fechaRegex.test(fechaRegistro)) {
                swalMixin("top","error","Formato de fecha inválido")
                return;
             }


            // Validar RFC
             if (!rfcRegex.test(rfc)) {
               swalMixin("top","error","El RFC debe tener exactamente 13 caracteres alfanuméricos")
               return;
            }
            
             // Llama a la función generarCURP con los valores obtenidos y asigna el resultado a la variable 'curp'
            const curp = generarCURP(nombre, primerApellido, segundoApellido, fechaNacimiento, sexo, lugarNacimiento);

            // Asigna el valor de 'curp' en mayúsculas al input con id 'curp'
              document.getElementById('curp').value = curp.toUpperCase().trim();

             // Validar CURP
             if (curp.length > 18 || curp < 18) {
               swalMixin("top","error","La CURP debe tener exactamente 18 caracteres alfanuméricos")
               return;
            }
         
             // Recopila los datos del formulario
             let datosFormulario = {
                nombre: nombre,
                primerApellido: primerApellido,
                segundoApellido: segundoApellido,
                lugarNacimiento: lugarNacimiento,
                fechaNacimiento: fechaNacimiento,
                sexo: sexo,
                rfc: rfc,
                curp: curp,
                fechaRegistro: fechaRegistro
            };

        // Realiza la solicitud AJAX
        $.ajax({
            url:  travelHub()+"Views/Ajax/cliente.ajax.php", // Asegúrate de cambiar esta URL
            type: 'POST',
            data: datosFormulario,
            dataType : "json",

            success: function(response) {
                console.log(response);
                // Aquí se maneja lo que ocurre después de enviar los datos exitosamente
                swalMixin("top","success","Cliente guardado exitosamente en la base de datos")
            },
            error: function(xhr, status, error) {
                // Aquí manejas los errores
                alert('No se pudo guardar el cliente');
            }
        });
    
            
        }else{
            swalMixin("top","error","Ocurrió un problemaal guardar el cliente")
        }
    });
}