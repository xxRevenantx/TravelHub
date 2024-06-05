import {swal, swalMixin, travelHub} from './modulos/modules.js'; 
let formReporte = document.querySelector(".reporteMeses");
let reporteMes = document.querySelector(".reporteMes");


// REPORTE POR MESES
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

        const [comienzoAnio, comienzoMesNumero] = comienzoMes.split('-');
        const [finAno, finMesNumero] = finMes.split('-');


        

                          // Preparar datos para inserción
         let datos = {
                comienzoAnio: comienzoAnio.trim(),
                comienzoMesNumero: comienzoMesNumero.trim(),
                finAno: finAno.trim(),
                finMesNumero: finMesNumero.trim(),
            };

        $.ajax({
            url: travelHub() + "Views/Ajax/reportes.ajax.php",
            type: 'POST',
            data: datos,
            dataType: "json",
            beforeSend: function() {
                
                $('#loading').show();  // Mostrar el indicador de carga
                $('#resultadosReporte').hide(); // Ocultar el contenedor de resultados mientras se carga
                $('.imprimirReporte').hide(); // Ocultar el botón de imprimir

            },
            success: function(response) {
                console.log(response);
                if (response != "") {

                    imprimirReporteMeses(response);
                    const meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];

                        let table = '<table class="table table-striped">';
                        table += '<thead><tr><th>#</th><th>AÑO</th><th>MES</th><th>CANTIDAD DE RESERVAS</th></tr></thead>';
                        table += '<tbody>';
                        
                        response.forEach(function(row, index) {
                            table += '<tr>';
                            table += '<td>' + (index + 1) + '</td>';
                            table += '<td>' + row.anio + '</td>';
                            table += '<td>' + meses[row.mes - 1] + '</td>'; // Convertir mes numérico a nombre del mes
                            table += '<td><button type="button" class="btn btn-primary btnTotalReservas" totalReservasAnio="'+row.anio+'" totalReservasMes="'+row.mes+'">'+ row.total_reservas+'</button></td>';
                            table += '</tr>';
                        });
            
                        table += '</tbody></table>';
                        $('.tblReservas').html(table); 
                       
                        $('#loading').hide(); // Ocultar el indicador de carga
                        $('#resultadosReporte').show(); // Mostrar el contenedor de resultados
                        $('.imprimirReporteMeses').show(); // Mostrar el botón de imprimir

                } else {
                    let table = '<table class="table table-striped">';
                    table += '<thead><tr><th>#</th><th>AÑO</th><th>MES</th><th>CANTIDAD DE RESERVAS</th></tr></thead>';
                    table += '<tbody>';
                    
                        table += '<tr>';
                        table += '<td colspan="4" style="text-align:center; background: #fff"><b>No se encontró ningún registro</b></td>';
                        table += '</tr>';

        
                    table += '</tbody></table>';
                    $('.tblReservas').html(table); 
                   
                    $('#loading').hide(); // Ocultar el indicador de carga
                    $('#resultadosReporte').show(); // Mostrar el contenedor de resultado
                }
            }
        });

    })
   

}


function imprimirReporteMeses(response) {
    document.querySelector('.imprimirReporteMeses').addEventListener('click', function() {
        const meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];

        let printContents = '<h1 style="text-align:center">Reportes <h1><table class="table table-striped">';
        printContents += '<thead><tr><th>#</th><th>Año</th><th>Mes</th><th>Total de Reservas</th></tr></thead>';
        printContents += '<tbody>';
        
        response.forEach(function(row, index) {
            printContents += '<tr>';
            printContents += '<td>' + (index + 1) + '</td>'; // Enumeración de filas
            printContents += '<td>' + row.anio + '</td>';
            printContents += '<td>' +  meses[row.mes - 1]  + '</td>';
            printContents += '<td>' +  row.total_reservas + '</td>';
            printContents += '</tr>';
        });

        printContents += '</tbody></table>';
   
        var printWindow = window.open('', '', 'height=500, width=800');
        printWindow.document.write('<html><head><title>Reporte</title>');
        printWindow.document.write('<style>.table { width: 100%; border-collapse: collapse; } .table th, .table td { border: 1px solid black; padding: 8px; text-align: left; } .table th { background-color: #f2f2f2; }</style>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });

}


// ================== RESERVAS POR MES
$(document).on('click', '.btnTotalReservas', function() {
    let soloAnio = $(this).attr('totalReservasAnio');
    let soloMes = $(this).attr('totalReservasMes');


    let datos = {
        soloMes: soloMes.trim(),
        soloAnio: soloAnio.trim(),
    };



    $.ajax({
        url: travelHub() + "Views/Ajax/reportes.ajax.php",
        type: 'POST',
        data: datos,
        dataType: "json",
        beforeSend: function() {
            
        
            $('#loadingMes').show();  // Mostrar el indicador de carga
            $('#resultadosMes').hide(); // Ocultar el contenedor de resultados mientras se carga
            $('.imprimirReporteMes').hide(); // Ocultar el botón de imprimir

        },
        success: function(response) {
            console.log(response);
            if (response && response.length > 0) {
                imprimirReporteMes(response)
                let resultadosMes = document.getElementById('resultadosMes');

                const meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
                document.querySelector(".mesConsulta").textContent = meses[soloMes-1] +" "+soloAnio

                imprimirReporteMes(response, meses, soloMes,soloAnio)

                resultadosMes.innerHTML = ''; // Limpiar contenido previo

                response.forEach(function(row, index) {
                    let tr = document.createElement('tr');

                    let tdIndex = document.createElement('td');
                    tdIndex.innerText = index + 1;
                    tr.appendChild(tdIndex);

                    let tdFechaVuelo = document.createElement('td');
                    tdFechaVuelo.innerText = formatearFecha(row.fecha_vuelo);
                    tr.appendChild(tdFechaVuelo);

                    let tdDestino = document.createElement('td');
                    
                    // Crear el botón dinámicamente
                    let btnDestino = document.createElement('button');
                    btnDestino.type = 'submit';
                    btnDestino.className = 'btn btn-primary idtipodestinocliente';
                    btnDestino.setAttribute('fechaVueloCliente', row.fecha_vuelo);
                    btnDestino.setAttribute('idTipoDestinoCliente', row.id_tipodestino);
                    btnDestino.setAttribute('idDestinoCliente', row.id_destino);
                    btnDestino.setAttribute('data-toggle', 'modal');
                    btnDestino.setAttribute('data-target', '#modalDestino');
                    btnDestino.innerText = row.nombre_destino;
                    tdDestino.appendChild(btnDestino);
                    tr.appendChild(tdDestino);

                    let tdTipoDestino = document.createElement('td');
                    tdTipoDestino.innerText = row.nombre_tipodestino;
                    tr.appendChild(tdTipoDestino);

                    let tdTotalReservas = document.createElement('td');
                    tdTotalReservas.innerText = row.total_reservas;
                    tr.appendChild(tdTotalReservas);

                    resultadosMes.appendChild(tr);
                });

                $('#loadingMes').hide(); // Ocultar el indicador de carga
                $('#resultadosMes').show(); // Mostrar el contenedor de resultados
                $('.imprimirReporteMes').show(); // Mostrar el botón de imprimir
            } else {
                $('#loadingMes').hide(); // Ocultar el indicador de carga
                $('#resultadosMes').show(); // Mostrar el contenedor de resultados
                $('.imprimirReporteMes').hide(); // Ocultar el botón de imprimir
                alert('No se encontraron resultados.');
            }
        }
    });




});

function imprimirReporteMes(response, meses, soloMes,soloAnio)
{
    document.querySelector('.imprimirReporteMes').addEventListener('click', function() {

        let printContents = '<h1 style="text-align:center">Reservas | Mes: '+meses[soloMes-1] +" "+soloAnio+' <h1><table class="table table-striped">';
        printContents += '<thead><tr><th>#</th><th>FECHA DE VUELO</th><th>DESTINO</th><th>TIPO DE DESTINO</th><th>CANTIDAD DE RESERVAS</th></tr></thead>';
        printContents += '<tbody>';
        
        response.forEach(function(row, index) {
            printContents += '<tr>';
            printContents += '<td>' + (index + 1) + '</td>'; // Enumeración de filas
            printContents += '<td>' +formatearFecha(row.fecha_vuelo) + '</td>';
            printContents += '<td>' +  row.nombre_destino  + '</td>';
            printContents += '<td>' +  row.nombre_tipodestino + '</td>';
            printContents += '<td>' +  row.total_reservas + '</td>';
            printContents += '</tr>';
        });

        printContents += '</tbody></table>';
   
        var printWindow = window.open('', '', 'height=500, width=800');
        printWindow.document.write('<html><head><title>Reporte</title>');
        printWindow.document.write('<style>.table { width: 100%; border-collapse: collapse; } .table th, .table td { border: 1px solid black; padding: 8px; text-align: left; } .table th { background-color: #f2f2f2; }</style>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });

}



function formatearFecha(dateString) {
    const monthNames = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ];
    const date = new Date(dateString + 'T00:00:00-06:00'); 
    const day = date.getDate().toString().padStart(2, '0');
    const month = monthNames[date.getMonth()];
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}
function formatearFecha2(dateString) {
    const monthNames = [
        "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
    ];
    const date = new Date(dateString + 'T00:00:00-06:00'); 
    const day = date.getDate().toString().padStart(2, '0');
    const month = monthNames[date.getMonth()];
    const year = date.getFullYear();
    return `${day} ${month} ${year}`;
}




// OBTENER EL ID DE TIPO DE DESTINO PARA FILTRAR POR CLIENTE
$(document).on('click', '.idtipodestinocliente', function() {
    let idTipoDestinoCliente = $(this).attr('idTipoDestinoCliente');
    let fechaVueloCliente = $(this).attr('fechaVueloCliente');
    let idDestinoCliente = $(this).attr('idDestinoCliente');

    let datos = {
        idTipoDestinoCliente:idTipoDestinoCliente,
        fechaVueloCliente:fechaVueloCliente,
        idDestinoCliente:idDestinoCliente

    }
   

    $.ajax({
        url: travelHub() + "Views/Ajax/reportes.ajax.php",
        type: 'POST',
        data: datos,
        dataType: "json",
        beforeSend: function() {
            
        },
        success: function(response) {
            console.log(response);
         
            if(response){
              
                let modalTableBody = document.getElementById('modalTableBody');
                modalTableBody.innerHTML = ''; // Limpiar contenido previo
                imprimirReporteClientes(response);
                response.forEach(function(row,index) {  
                    document.querySelector(".fechaConsulta").textContent = formatearFecha2(row.fecha_vuelo)
                    document.querySelector(".destinoConsulta").textContent = row.nombre_destino

                    let tr = document.createElement('tr');

                    let tdReserva = document.createElement('td');
                    tdReserva.innerText = (index + 1);
                    tr.appendChild(tdReserva);

                    let tdCliente = document.createElement('td');
                    tdCliente.innerText = row.nombre+" "+row.primer_apellido+" "+row.segundo_apellido;
                    tr.appendChild(tdCliente);

                    let tdfecha = document.createElement('td');
                    tdfecha.innerText = formatearFecha2(row.fecha_registro);
                    tr.appendChild(tdfecha);

                    modalTableBody.appendChild(tr);
                });


            } else {
                swalMixin("top","error","Ocurrió un error");
                return;
            }
        }
    });


});

// IMPRIMIR REPORTE DE CLIENTES
function imprimirReporteClientes(response) {
    document.querySelector('.imprimirClientes').addEventListener('click', function() {
        const meses = ["ENERO", "FEBRERO", "MARZO", "ABRIL", "MAYO", "JUNIO", "JULIO", "AGOSTO", "SEPTIEMBRE", "OCTUBRE", "NOVIEMBRE", "DICIEMBRE"];

        let printContents = '<h1 style="text-align:center">Clientes <h1><table class="table table-striped">';
        printContents += '<thead><tr><th>NO.RESERVA</th><th>CLIENTE</th><th>REGISTRO DE RESERVA</tr></thead>';
        printContents += '<tbody>';
        
        response.forEach(function(row, index) {
            printContents += '<tr>';
            printContents += '<td>' + (index + 1) + '</td>'; // Enumeración de filas
            printContents += '<td>' +  row.nombre+" "+row.primer_apellido+" "+row.segundo_apellido;  + '</td>';
            printContents += '<td>' +  formatearFecha2(row.fecha_registro)+ '</td>';
            printContents += '</tr>';
        });

        printContents += '</tbody></table>';
   
        var printWindow = window.open('', '', 'height=500, width=800');
        printWindow.document.write('<html><head><title>Reporte</title>');
        printWindow.document.write('<style>.table { width: 100%; border-collapse: collapse; } .table th, .table td { border: 1px solid black; padding: 8px; text-align: left; } .table th { background-color: #f2f2f2; }</style>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.print();
    });

}