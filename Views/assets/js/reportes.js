import {swal, swalMixin, travelHub} from './modulos/modules.js'; 
let formReporte = document.querySelector(".reporteForm");

if(formReporte){
    
    formReporte.addEventListener("submit", function(e){
        e.preventDefault();
        const comienzoMes = e.target.comienzoMes.value;
        const finMes = e.target.finMes.value;

        if (!comienzoMes || !finMes) {
            swalMixin("top","error","Por favor, complete ambos campos.");
            return;
        }

        if (comienzoMes > finMes) {
           swalMixin("top","error","La fecha de fin no puede ser anterior a la fecha de inicio.");
            return;
        }


    })
   
}