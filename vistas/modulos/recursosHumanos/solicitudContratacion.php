<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Solicitud de contratación

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Recursos Humanos</a></li>

      <li class="active">Administrar Solicitud de contratación</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="form-group col-sm-3 col-xs-12 ">
          <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar" id="btnNuevo">
            <i class="fa fa-plus" aria-hidden="true"></i> Crear Solicitud
          </button>
        </div>

        <div class="form-group col-sm-9 col-xs-12 ">
          <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
        </div>
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
                  <center>Id Solicitud</center>
                </th>
                <th>
                  <center> Fecha Solicitud</center>
                </th>
                <th>
                  <center> Division</center>
                </th>
                <th>
                  <center> Cargo</center>
                </th>
                <th>
                  <center> Cantidad</center>
                </th>
                <th>
                  <center> Estado</center>
                </th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL AGREGAR TAREA
======================================-->

<div id="modalAgregar" class="modal fade" role="dialog">

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


            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoAgregar">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="motivoAgregar" id="motivoAgregar">
                <option value=" ">Seleccionar...</option>
                <option value="Reemplazo dotación">Reemplazo dotación</option>
                <option value="Aumento dotación">Aumento dotación</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionAgregar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="divisionAgregar" id="divisionAgregar">
                <option value=" "></option>
                <option value=" ">Seleccionar...</option>
                <option value="Industrial" selected>Industrial</option>
                <option value="Interurbano">Interurbano</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoAgregar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="cargoAgregar" id="cargoAgregar"></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="empresaAgregar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="empresaAgregar" id="empresaAgregar"></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centroDecostoAgregar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="centroDecostoAgregar" id="centroDecostoAgregar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadAgregar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="number" class="form-control input-md cajatexto" name="cantidadAgregar" id="cantidadAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoAgregar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="equipoAgregar" name="equipoAgregar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="licenciaAgregar">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="licenciaAgregar" name="licenciaAgregar">
                <option value="Seleccionar...">Seleccionar...</option>
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoAgregar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="tipoturnoAgregar" name="tipoturnoAgregar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="tipocontratoAgregar">Tipo contrato:</label>
              <select class="form-control input-md cajatexto" id="tipocontratoAgregar" name="tipocontratoAgregar" onchange="mostrarFechaTermino()">
                <option value=" ">Seleccionar...</option>
                <option value="Indefinido">Indefinido</option>
                <option value="Plazo Fijo">Plazo Fijo</option>
                <option value="Por Obra">Por Obra</option>
                <option value="Spot">Spot</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fecharequeridaAgregar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fecharequeridaAgregar" id="fecharequeridaAgregar" onchange="calcularFechaTermino()">
            </div>

            <div class="form-group col-sm-4 col-xs-12" id="fechaTerminoDiv" style="display: none;">
              <label for="fechaterminoAgregar">Fecha Término:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaterminoAgregar" id="fechaterminoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="remuneracionAgregar">Remuneración líquida:</label>
              <input type="number" class="form-control input-md cajatexto" name="remuneracionAgregar" id="remuneracionAgregar">
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Requisitos de Selección</h3> 
                </div>                                             
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group col-sm-4 col-xs-12">                 
                      <label for="requisitosAgregar">Requisitos:</label>
                      <select class="form-control input-md cajatexto js-example-basic-single" id="requisitosAgregar" name="requisitosAgregar"></select>
                    </div>

                    <div class="form-group col-sm-7 col-xs-12">
                      <label for="observacionRequisitoAgregar">Observación:</label>
                      <input type="text" class="form-control cajatexto input-md solo-numero puntos_de_mil estiloMontos" name="observacionRequisitoAgregar" id="observacionRequisitoAgregar">
                    </div>

                    <div class="form-group col-sm-1 col-xs-12">                 
                      <label for="btnEliminarCliente"></label>
                      <div style ="align-items: center; justify-content: center; display:flex;"> 
                        <div class="btn-group">                        
                          <button title="Agregar Tipo de Entrevista" type="button" class="btn btn-success" id="btnAgregarRequisitosAgregar"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>  
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">                 
                      <table class="table table-bordered table-striped dt-responsive" id="tablaRequisitoAgregar" width="100%">                        
                        <thead>            
                            <tr>              
                              <th><center> Concepto</center></th>
                              <th><center> Observación</center></th>
                              <th><center>Acciones</center></th>
                            </tr> 
                        </thead>
                        <tbody></tbody>
                      </table>  
                    </div>
                </div>
              </div><!-- /.box -->
            </div> 

            <div class="col-md-12 col-xs-12">
              <div class="box box-success">
                <div class="box-body">
                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="comentarioAgregar">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139; padding-left: 15px;"> (Obligatorio)</span>
                    <textarea class="form-control input-md cajatexto" name="comentarioAgregar" id="comentarioAgregar" rows="1"></textarea>
                  </div>

                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="preapruebaAgregar">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <select class="form-control input-md cajatexto" id="preapruebaAgregar" name="preapruebaAgregar"></select>
                  </div>

                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="apruebaAgregar">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <select class="form-control input-md cajatexto" id="apruebaAgregar" name="apruebaAgregar"></select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>

        </div>

      </form>

    </div>

  </div>

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
              <label for="motivoModificar">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="motivoModificar" id="motivoModificar">
                <option value="Reemplazo dotación">Reemplazo dotación</option>
                <option value="Aumento dotación">Aumento dotación</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="divisionModificar">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="divisionModificar" id="divisionModificar">
                <option value="Industrial">Industrial</option>
                <option value="Interurbano">Interurbano</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cargoModificar">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="cargoModificar" id="cargoModificar"></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="empresaModificar">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="empresaModificar" id="empresaModificar"></select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="centroDecostoModificar">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto solo-ruc" name="centroDecostoModificar" id="centroDecostoModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="cantidadModificar">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="number" class="form-control input-md cajatexto" name="cantidadModificar" id="cantidadModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="equipoModificar">Tipo equipo (opcional):</label>
              <select class="form-control input-md cajatexto" id="equipoModificar" name="equipoModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="licenciaModificar">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="licenciaModificar" name="licenciaModificar">
                <option value="Si">Si</option>
                <option value="No">No</option>
              </select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="tipoturnoModificar">Tipo Turno:</label>
              <select class="form-control input-md cajatexto" id="tipoturnoModificar" name="tipoturnoModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="tipocontratoModificar">Tipo contrato:</label>
              <select class="form-control input-md cajatexto" id="tipocontratoModificar" name="tipocontratoModificar" onchange="mostrarFechaTermino()">
                <option value="Indefinido">Indefinido</option>
                <option value="Plazo Fijo">Plazo Fijo</option>
                <option value="Por Obra">Por Obra</option>
                <option value="Spot">Spot</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fecharequeridaModificar">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fecharequeridaModificar" id="fecharequeridaModificar" onchange="calcularFechaTermino()">
            </div>

            <div class="form-group col-sm-4 col-xs-12" id="fechaTerminoDiv" style="display: none;">
              <label for="fechaterminoModificar">Fecha Término:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaterminoModificar" id="fechaterminoModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="remuneracionModificar">Remuneración líquida:</label>
              <input type="number" class="form-control input-md cajatexto" name="remuneracionModificar" id="remuneracionModificar">
            </div>

            <div class="col-md-12 col-xs-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Requisitos de Selección</h3> 
                </div>                                             
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group col-sm-4 col-xs-12">                 
                      <label for="requisitosModificar">Requisitos:</label>
                      <select class="form-control input-md cajatexto js-example-basic-single" id="requisitosModificar" name="requisitosModificar"></select>
                    </div>

                    <div class="form-group col-sm-7 col-xs-12">
                      <label for="observacionRequisitoModificar">Observación:</label>
                      <input type="text" class="form-control cajatexto input-md solo-numero puntos_de_mil estiloMontos" name="observacionRequisitoModificar" id="observacionRequisitoModificar">
                    </div>

                    <div class="form-group col-sm-1 col-xs-12">                 
                      <label for="btnAgregarRequisitosModificar"></label>
                      <div style ="align-items: center; justify-content: center; display:flex;"> 
                        <div class="btn-group">                        
                          <button title="Agregar Tipo de Entrevista" type="button" class="btn btn-success" id="btnAgregarRequisitosModificar"><i class="fa fa-plus"></i></button>
                        </div>
                      </div>  
                    </div>

                    <div class="form-group col-sm-12 col-xs-12">                 
                      <table class="table table-bordered table-striped dt-responsive" id="tablaRequisitoModificar" width="100%">                        
                        <thead>            
                            <tr>              
                              <th><center> Concepto</center></th>
                              <th><center> Observación</center></th>
                              <th><center>Acciones</center></th>
                            </tr> 
                        </thead>
                        <tbody></tbody>
                      </table>  
                    </div>
                </div>
              </div><!-- /.box -->
            </div> 

            <div class="col-md-12 col-xs-12">
              <div class="box box-success">
                <div class="box-body">
                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="comentarioModificar">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139; padding-left: 15px;"> (Obligatorio)</span>
                    <textarea class="form-control input-md cajatexto" name="comentarioModificar" id="comentarioModificar" rows="1"></textarea>
                  </div>

                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="preapruebaModificar">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <select class="form-control input-md cajatexto" id="preapruebaModificar" name="preapruebaModificar"></select>
                  </div>

                  <div class="form-group col-sm-4 col-xs-12">
                    <label for="apruebaModificar">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                    <select class="form-control input-md cajatexto" id="apruebaModificar" name="apruebaModificar"></select>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!--=====================================
        PIE DEL MODAL
        ======================================-->

          <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>

          </div>

      </form>

    </div>

  </div>

</div>

</div>

<!--=====================================
MODAL VER MAS
======================================-->
<div id="modalVermas" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ver Datos del Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="box-body">

          <div class="form-group col-sm-4 col-xs-12">
            <label for="motivoVer">Motivo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="motivoVer" id="motivoVer" disabled>
              <option value="Reemplazo dotación">Reemplazo dotación</option>
              <option value="Aumento dotación">Aumento dotación</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="divisionVer">División:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="divisionVer" id="divisionVer" disabled>
              <option value="Industrial">Industrial</option>
              <option value="Interurbano">Interurbano</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cargoVer">Cargo solicitado:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="cargoVer" id="cargoVer" disabled></select>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="razonVer">Razon social:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="razonVer" id="razonVer" disabled></select>
          </div>

          <div class="form-group col-sm-6 col-xs-12">
            <label for="centrocostoVer">Centro costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto solo-ruc" name="centrocostoVer" id="centrocostoVer" disabled></select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="cantidadVer">Cantidad solicitada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="number" class="form-control input-md cajatexto" name="cantidadVer" id="cantidadVer" disabled>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="equipoVer">Tipo equipo (opcional):</label>
            <select class="form-control input-md cajatexto" id="equipoVer" name="equipoVer" disabled> </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="licenciaVer">Licencia conducir:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto" id="licenciaVer" name="licenciaVer" disabled>
              <option value="Si">Si</option>
              <option value="No">No</option>
            </select>
          </div>

          <div class="form-group col-sm-12 col-xs-12">
            <label for="tipoturnoVer">Tipo Turno:</label>
            <select class="form-control input-md cajatexto" id="tipoturnoVer" name="tipoturnoVer" disabled></select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="tipocontratoVer">Tipo contrato:</label>
            <select class="form-control input-md cajatexto" id="tipocontratoVer" name="tipocontratoVer" disabled>
              <option value="Indefinido">Indefinido</option>
              <option value="Plazo Fijo">Plazo Fijo</option>
              <option value="Por Obra">Por Obra</option>
              <option value="Spot">Spot</option>
            </select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="fecharequeridaVer">Fecha requerida:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <input type="date" class="form-control input-md cajatexto" name="fecharequeridaVer" id="fecharequeridaVer" disabled>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="remuneracionVer">Remuneración líquida:</label>
            <input type="number" class="form-control input-md cajatexto" name="remuneracionVer" id="remuneracionVer" disabled>
          </div>

          <div class="col-md-12 col-xs-12">
              <div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Requisitos de Selección</h3> 
                </div>                                             
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group col-sm-12 col-xs-12">                 
                      <table class="table table-bordered table-striped dt-responsive" id="tablaRequisitoVista" width="100%">                        
                        <thead>            
                            <tr>              
                              <th><center> Concepto</center></th>
                              <th><center> Observación</center></th>
                            </tr> 
                        </thead>
                        <tbody></tbody>
                      </table>  
                    </div>
                </div>
              </div><!-- /.box -->
            </div> 

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="comentarioVer">Comentario Solicitud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <textarea class="form-control input-md cajatexto" name="comentarioVer" id="comentarioVer" rows="1" disabled></textarea>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="preapruebaVer">Pre Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="preapruebaVer" name="preapruebaVer" disabled></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="apruebaVer">Aprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="apruebaVer" name="apruebaVer" disabled></select>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        </div>

      </form>

    </div>

  </div>

</div>

<script src="vistas/js/recursosHumanos/solicitudContratacion.js"></script>

<script>
  document.getElementById("observacionAgregar").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<script>
  document.getElementById("comentarioAgregar").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<script>
  document.getElementById("comentarioModificar").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<script>
  document.getElementById("observacionEntrevistaPsicolaboralMod").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<script>
  document.getElementById("observacionEntrevistaTecnicaMod").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<script>
  document.getElementById("observacionPruebaConduccionMod").addEventListener("input", function() {
    this.style.height = "auto";
    this.style.height = (this.scrollHeight) + "px";
  });
</script>

<!--Campo de fecha termino-->
<script>
  function mostrarFechaTermino() {
    var tipoContrato = document.getElementById("tipocontratoAgregar").value;
    var fechaTerminoDiv = document.getElementById("fechaTerminoDiv");
    var observacionTextarea = document.getElementById("observacionAgregar");

    if (tipoContrato.trim() === "Plazo Fijo") {
      fechaTerminoDiv.style.display = "block";
      observacionTextarea.style.width = "255px";
    } else {
      fechaTerminoDiv.style.display = "none";
      document.getElementById("fechaterminoAgregar").value = ""; // Limpiar el campo si no es Plazo Fijo
      observacionTextarea.style.width = "536px";
    }
  }

  function calcularFechaTermino() {
    var tipoContrato = document.getElementById("tipocontratoAgregar").value;
    var fechaRequerida = document.getElementById("fecharequeridaAgregar").value;
    var fechaTerminoInput = document.getElementById("fechaterminoAgregar");

    if (tipoContrato.trim() === "Plazo Fijo" && fechaRequerida) {
      var fecha = new Date(fechaRequerida);
      fecha.setMonth(fecha.getMonth() + 2);
      var fechaFormateada = fecha.toISOString().split("T")[0];
      fechaTerminoInput.value = fechaFormateada;
    }
  }
</script>