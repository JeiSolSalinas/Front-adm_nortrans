<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">

  <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
    <h1 style="color: white; font-weight: bold;">Personal: Aprobacion Solicitud Personal</h1>
  </section>

  <section class="content">
    <div class="box">

      <div class="panel-group" id="solicituAprobar">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-panel-listaAprobar">
              <a data-toggle="collapse" href="#solicituAprobar_content"
                class="panel-listaAprobar-link" aria-expanded="true">Lista de Solicitud por aprobar</a>
            </h4>
          </div>

          <div class="box-body">
            <div id="div1" class="table-responsive">
              <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%" style="text-align: center;">
                <thead>
                  <tr>
                    <th style="width:10px">
                      <center>#</center>
                    </th>
                    <th>
                      <center>Acciones</center>
                    </th>
                    <th style="width:120px">
                      <center>N Solicitud</center>
                    </th>
                    <th>
                      <center> División</center>
                    </th>
                    <th>
                      <center> Empresa</center>
                    </th>
                    <th>
                      <center> Cargo</center>
                    </th>
                    <th>
                      <center> Centro Costo</center>
                    </th>
                    <th>
                      <center> Aprueba</center>
                    </th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL EDITAR TAREA
======================================-->

<div id="modalModificar" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="formulario_para_agregar">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ingreso de solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <input type="hidden" name="idModificar" id="idModificar" required>


            <div class="form-group col-sm-4 col-xs-12">
              <label for="motivoModificar">Motivo:</label>
              <select class="form-control input-md cajatexto solo-ruc" name="motivoModificar" id="motivoModificar" disabled>
                <option value="Reemplazo dotación">Reemplazo dotación</option>
                <option value="Aumento dotación">Aumento dotación</option> DISAB
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionModificar">División:</label>
              <select class="form-control input-md cajatexto solo-ruc" name="divisionModificar" id="divisionModificar" disabled>
                <option value="Industrial">Industrial</option>
                <option value="Interurbano">Interurbano</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoModificar">Cargo solicitado:</label>
              <select class="form-control input-md cajatexto solo-ruc" name="cargoModificar" id="cargoModificar" disabled></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="empresaModificar">Razon social:</label>
              <select class="form-control input-md cajatexto solo-ruc" name="empresaModificar" id="empresaModificar" disabled></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centroDecostoModificar">Centro costo:</label>
              <select class="form-control input-md cajatexto solo-ruc" name="centroDecostoModificar" id="centroDecostoModificar" disabled></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadModificar">Cantidad solicitada:</label>
              <input type="number" class="form-control input-md cajatexto" name="cantidadModificar" id="cantidadModificar" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoModificar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="equipoModificar" name="equipoModificar" disabled></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="licenciaModificar">Licencia conducir:</label>
              <select class="form-control input-md cajatexto" id="licenciaModificar" name="licenciaModificar" disabled>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoModificar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="tipoturnoModificar" name="tipoturnoModificar" disabled></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="tipocontratoModificar">Tipo contrato:</label>
              <select class="form-control input-md cajatexto" disabled id="tipocontratoModificar" name="tipocontratoModificar" onchange="mostrarFechaTermino()">
                <option value="Indefinido">Indefinido</option>
                <option value="Plazo Fijo">Plazo Fijo</option>
                <option value="Por Obra">Por Obra</option>
                <option value="Spot">Spot</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fecharequeridaModificar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" disabled name="fecharequeridaModificar" id="fecharequeridaModificar" onchange="calcularFechaTermino()">
            </div>

            <div class="form-group col-sm-4 col-xs-12" id="fechaTerminoDiv" style="display: none;">
              <label for="fechaterminoModificar">Fecha Término:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaterminoModificar" id="fechaterminoModificar" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="remuneracionModificar">Remuneración líquida:</label>
              <input type="number" class="form-control input-md cajatexto" name="remuneracionModificar" id="remuneracionModificar" disabled>
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="box box-success">
                <div class="box-body">
                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="preapruebaComentarioMod">Comentario Preaprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <textarea class="form-control input-md cajatexto" id="preapruebaComentarioMod" name="preapruebaComentarioMod" rows="3"></textarea>
                  </div>

                  <input type='hidden' id="fechaAprobacion" name="fechaAprobacion" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!--fecha aprobacion-->

                  <input type='hidden' id="fechaPreaprobacion" name="fechaPreaprobacion" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!--fechaPreaprobacion-->

                  <input type='hidden' id="fechaInicio" name="fechaInicio" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!--fechaPreaprobacion-->


                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="apruebaComentarioMod">Comentario Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <textarea class="form-control input-md cajatexto" id="apruebaComentarioMod" name="apruebaComentarioMod" rows="3"></textarea>
                  </div>

                  <div class="form-group col-sm-4 col-xs-12">
                    <div class="botones-container">
                      <button type="button" class="btn btn-primary"
                        style="background-color: #adaf9c; border-color: #f46717; margin-top: 10px; margin-right: 5px; "
                        id="btnRechazar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Rechazar
                      </button>

                      <button type="button" class="btn btn-primary"
                        style="background-color: #adaf9c; border-color: #f46717; margin-top: 10px; margin-right: 10px; "
                        id="btnAprobar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Aprobar
                      </button>

                      <button type="button" class="btn btn-primary"
                        style="background-color: #adaf9c; border-color: #f46717; margin-top: 10px; margin-right: 20px; float: right; width: 90px;"
                        id="btnSalir" data-dismiss="modal"><i class="fa fa-hdd-o" aria-hidden="true"></i>Salir
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

      </form>

    </div>

  </div>

</div>

<style>
  .botones-container {
    display: flex;
    justify-content: center;
    margin-top: 55px;
  }
</style>

<script src="vistas/js/recursosHumanos/aprueba.js"></script>