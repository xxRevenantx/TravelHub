<?php 
include 'Components/cabeceraAdmin.php'; 
include 'Components/navAdmin.php' 
?>

    <div class="contenedor">

    <div class="contenidoReporte">
    
    <form class="reporteMeses reporteForm" class="mt-2">
    <h1 class="reservas">Consultar reporte por rango de meses</h2>
        <label for="startMonth">Mes de inicio:</label>
        <input type="month" id="comienzoMes" class="comienzoMes" name="comienzoMes" >

        <label for="endMonth">Mes de fin:</label>
        <input type="month" id="finMes" class="finMes" name="finMes" >

        <button type="submit" class="btnReporte btnBlue" >Generar Reporte</button>
    </form>


    <div class="resultadosReporte">
        <h1 class="reservas">Cantidad de reservas</h2>
    <table class="tblReservas">
        <thead>
            <tr>
                <th>#</th>
                <th>AÑO</th>
                <th>MES</th>
                <th>CANTIDAD DE RESERVAS</th>
            </tr>
        </thead>
        <tbody>
        <div id="resultadosReporte"></div>
        <div id="loading" class="load" style="display:none;">
        <img src="<?php echo $rutaLocal."Views/assets/imagenes/loader.svg" ?>" alt="">
        </div>
        <button class="imprimirReporteMeses btnformulario" style="display:none;">Imprimir Reporte</button>
        </tbody>
    </table>

    </div>

    </div>

    <!-- ============================================================================================================================ -->
    <hr>
 
  

    <div class="reservasMes">
        <h1 class="reservas text-center">Reservas | Mes: <span class="mesConsulta"></span></h2>
    <table class="tblMes">
        <thead>
            <tr>
                <th>#</th>
                <th>FECHA DE VUELO</th>
                <th>DESTINO</th>
                <th>TIPO DE DESTINO</th>
                <th>CANTIDAD DE RESERVAS</th>
            </tr>
        </thead>
        <tbody id="resultadosMes">
        <!-- Aquí se generarán las filas de la tabla -->
      </tbody>
        <button class="btnformulario imprimirReporteMes " style="display:none;">Imprimir Reporte</button>

    </table>

    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="modalDestino" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Fecha: <span class="fechaConsulta"></span> <br>Destino: <span class="destinoConsulta"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table>
            <tr>
              <th>NO. RESERVA</th>
              <th>CLIENTE</th>
              <th>REGISTRO DE RESERVA</th>
            </tr>
            <tbody  id="modalTableBody">
 
            </tbody>
          </table>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary imprimirClientes">Imprimir reporte</button>
      </div>
    </div>
  </div>
</div>