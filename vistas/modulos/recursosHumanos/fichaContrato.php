<div class="content-wrapper">

  <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
    <h1 style="color: white; font-weight: bold;">Personal: Crear Ficha Contrato</h1>
  </section>

  <section class="content">
    <div class="box">

      <div class="panel-group" id="frm:j_idt110">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-opcion">
              <a data-toggle="collapse" href="#frm_j_idt110_content"
                class="panel-opcion-link" aria-expanded="true">Opciones</a>
            </h4>
          </div>

          <div id="frm_j_idt110_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="d-flex align-items-center gap-3 flex-wrap">
                <div class="form-group col-sm-3">
                  <label for="empresaAgregar">Empresa:</label>
                  <select class="form-control input-md" name="empresaAgregar" id="empresaAgregar"></select>
                </div>

                <div class="form-group col-sm-3">
                  <label for="numeroFicha">N° Ficha:</label>
                  <input type="number" class="form-control input-md" name="numeroFicha" id="numeroFicha" placeholder=" ">
                </div>
              </div>

              <div style="margin-top: 25px;"></div>

              <div class="d-flex gap-3 align-items-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEditar" id="btnBuscar">
                  <i class="fa fa-search" aria-hidden="true"></i> Buscar
                </button>

                <button type="button" class="btn btn-primary" id="btnListaFichaContrato">
                  <i class="fa fa-list" aria-hidden="true"></i> Lista de Ficha Contrato
                </button>

                <button type="button" class="btn btn-primary" id="btnListaSolicitudes"" style=" background-color: #FF6600;">
                  <i class="fa fa-file" aria-hidden="true"></i> Lista de Solicitudes
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="panel-group" id="panelListaSolicitudActivas">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-panel-listaSolicitudActivas-link">
              <a data-toggle="collapse" href="#listaSolicitudActivas_content"
                class="panel-listaSolicitudActivas-link" aria-expanded="true">Listas de Solicitud Activas</a>
            </h4>
          </div>

          <div id="listaSolicitudActivas_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="table-container">
                <div class="table-responsive">
                  <div class="box-body">
                    <div id="lista">
                      <table class="table table-bordered table-striped dt-responsive" id="listaSolicitud" width="100%" style="text-align: center;">
                        <thead>
                          <tr>
                            <th style="width:120px">
                              <center>Id Solicitud</center>
                            </th>
                            <th>
                              <center>Empresa</center>
                            </th>
                            <th>
                              <center>Fecha Solicitud</center>
                            </th>
                            <th>
                              <center>Solicitante</center>
                            </th>
                            <th>
                              <center>Division</center>
                            </th>
                            <th>
                              <center>Cargo</center>
                            </th>
                            <th>
                              <center>Cantidad Solicitada</center>
                            </th>
                            <th>
                              <center>Cantidad Contratada</center>
                            </th>
                            <th>
                              <center>Seleccionar</center>
                            </th>
                            <th>
                              <center>Impresión</center>
                            </th>
                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="panel-group" id="panelFichaContrato">
        <div class="panel panel-default">
          <div class="panel-heading" style="padding: 1px;">
            <h4 class="panel-panel-fichaContrato-link">
              <a data-toggle="collapse" href="#fichaContrato_content"
                class="panel-fichaContrato-link" aria-expanded="true">Listas de Ficha Contrato</a>
            </h4>
          </div>

          <div id="fichaContrato_content" class="panel-collapse collapse in">
            <div class="panel-body">
              <div class="table-container">
                <div class="table-responsive">
                  <div class="box-body">
                    <div id="ficha">
                      <table class="table table-bordered table-striped dt-responsive" id="fichaContrato" width="100%" style="text-align: center;">
                        <thead>
                          <tr>
                            <th style="width:120px">
                              <center>N° Ficha</center>
                            </th>
                            <th>
                              <center>Empresa</center>
                            </th>
                            <th>
                              <center>Nombre</center>
                            </th>
                            <th>
                              <center>Fecha Contratación</center>
                            </th>
                            <th>
                              <center>Tipo Contrato</center>
                            </th>
                            <th>
                              <center>Tipo Turno</center>
                            </th>
                            <th>
                              <center>Editar</center>
                            </th>
                            <th>
                              <center>Terminar</center>
                            </th>

                          </tr>
                        </thead>
                        <tbody></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!--=====================================
MODAL AGREGAR TAREA
======================================-->

  <div id="modalEditar" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">

      <div class="modal-content">

        <form role="form" method="post" id="formulario_para_editar">

          <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

          <div class="modal-header" style="background:#A9A9A9; color:white">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Modificación de la Ficha Contrato</h4>
          </div>

          <!--=====================================
CUERPO DEL MODAL
======================================-->

          <div class="modal-body">
            <div class="box-body">
              <section class="content">
                <div class="box">
                  <div class="panel-group" id="panelFicha">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-ficha">
                          <a data-toggle="collapse" href="#panelFicha_content" class="panel-ficha-link" aria-expanded="true">
                            Ficha
                          </a>
                        </h4>
                      </div>

                      <div id="panelFicha_content" class="panel-collapse collapse in">
                        <div class="panel-body">
                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="numeroFichaSelec">N° de Ficha</label>
                            <input class="form-control input-md cajatexto solo-ruc" name="numeroFichaSelec" id="numeroFichaSelec" disabled>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="idSolicitudSelec">Id Solicitud</label>
                            <input class="form-control input-md cajatexto solo-ruc" name="idSolicitudSelec" id="idSolicitudSelec" disabled>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="EmpresaSelec">Empresa</label>
                            <input class="form-control input-md cajatexto solo-ruc" name="EmpresaSelec" id="EmpresaSelec" disabled>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="divisionSelec">División:</label>
                            <input class="form-control input-md cajatexto solo-ruc" name="divisionSelec" id="divisionSelec" disabled>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="CargoSelec">Cargo:</label>
                            <input class="form-control input-md cajatexto" id="CargoSelec" name="CargoSelec" disabled>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="tipocontratoSelec">Tipo Contrato:</label>
                            <input class="form-control input-md cajatexto" id="tipocontratoSelec" name="tipocontratoSelec" disabled>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="tipoTurnoSelec">Tipo Turno:</label>
                            <input class="form-control input-md cajatexto" id="tipoTurnoSelec" name="tipoTurnoSelec" disabled>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="empresaModSelec">Empresa:</label>
                            <select class="form-control input-md cajatexto" id="empresaModSelec" name="empresaModSelec"></select>
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="fechainicioSelec">Fecha Inicio:</label>
                            <input type="date" class="form-control input-md cajatexto" name="fechainicioSelec" id="fechainicioSelec" onchange="calcularFechaTermino()">
                          </div>

                          <div class="form-group col-sm-3 col-xs-12">
                            <label for="sueldoLiquidoSelec">Sueldo Líquido:</label>
                            <input class="form-control input-md cajatexto" id="sueldoLiquidoSelec" name="sueldoLiquidoSelec">
                          </div>
                        </div> <!-- Cierre correcto de panel-body -->
                      </div> <!-- Cierre correcto de panel-collapse -->
                    </div> <!-- Cierre correcto de panel-default -->
                  </div> <!-- Cierre correcto de panel-group -->
                </div>
              </section>
            </div>
          </div>


          <section class="content">
            <div class="box">
              <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                  <div class="panel-body ">
                    <div class="box-body">
                      <div class="form-group col-sm-3 col-xs-12 d-flex flex-column align-items-center justify-content-center">
                        <label for="rutAgregar" class="text-center mb-2">Rut</label>
                        <input class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
                      </div>

                      <div class="form-group col-sm-5 col-xs-12">
                        <button type="button" class="btn btn-primary" id="selecBuscar" style="margin-top: 25px;">
                          <i class="fa fa-search" aria-hidden="true"></i> Buscar
                        </button>
                      </div>

                      <div class="form-group col-sm-5 col-xs-12">
                        <label for="nomSelec">Nombre</label>
                        <input class="form-control input-md cajatexto solo-ruc" name="nomSelec" id="nomSelec" disabled>
                      </div>

                      <div class="form-group col-sm-5 col-xs-12">
                        <label for="telSelec">Teléfono Propio</label>
                        <input class="form-control input-md cajatexto solo-ruc" name="telSelec" id="telSelec" disabled>
                      </div>
                    </div>
                  </div> <!-- Cierre correcto de panel-body -->
                </div> <!-- Cierre correcto de panel-default -->
              </div> <!-- Cierre correcto de panel-group -->
            </div>
          </section>

          <section class="content">
            <div class="box">
              <!-- Navegación por pestañas -->
              <ul class="nav nav-tabs" id="myTabs" role="tablist">
                <li class="nav-item active">
                  <a class="nav-link active" id="requisitos-tab" data-toggle="tab" href="#requisitos-content" role="tab">
                    Requisitos solicitados
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="datos-tab" data-toggle="tab" href="#datos-content" role="tab">
                    Datos contractuales
                  </a>
                </li>
              </ul>

              <!-- Contenido de las pestañas -->
              <div class="tab-content" id="myTabContent">
                <!-- Pestaña de Requisitos Solicitados -->
                <div class="tab-pane fade in active" id="requisitos-content" role="tabpanel">
                  <div class="panel-group" id="panelRequisitos">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <div class="box-body">
                          <div class="row">
                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="requiSelec">Requisito de Selección</label>
                              <select class="form-control input-md cajatexto solo-ruc" name="requiSelec" id="requiSelec"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="comentarioRequisito">Comentario:</label><span></span>
                              <textarea class="form-control input-md cajatexto" name="comentarioRequisito" id="comentarioRequisito" rows="1"></textarea>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                              <label for="btnSeleccionar">Seleccionar Archivo</label>
                              <div>
                                <button type="button" class="btn btn-primary" id="btnSeleccionContrato">
                                  <i class="fa fa-plus" aria-hidden="true"></i> Selección
                                </button>
                                <input type="file" id="inputArchivo" style="display: none;" accept=".docx, .pdf, .jpg">
                              </div>
                              <p id="nombreArchivo" style="margin-top: 5px;"></p> <!-- Para mostrar el nombre del archivo seleccionado -->
                            </div>

                            <div class="table-requisitos">
                              <div class="table-responsive1">
                                <table class="table table-bordes" id="tablaRequisitos">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th>Id Tipo Requisito</th>
                                      <th>Documento</th>
                                      <th>Eliminar</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div style="margin-top: 10px; font-size: 12px; color: #666;">
                                  Mostrando registros del 0 al 0 de un total de 0 registros
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Pestaña de Datos contractuales -->
                <div class="tab-pane fade" id="datos-content" role="tabpanel">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                        <h4 class="panel-title">Contrato de trabajo</h4>
                      </div>
                      <div class="panel-body" style="padding: 15px;">
                        <button type="button" class="btn btn-primary" id="btnSeleccionContrato">
                          <i class="fa fa-plus" aria-hidden="true"></i> Selección
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                      <h4 class="panel-title">Anexos</h4>
                    </div>
                    <div class="panel-body" style="padding: 15px;">
                      <div class="row">
                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="idAnexo">Id anexo</label>
                          <input type="text" class="form-control input-md cajatexto" id="idAnexo" name="idAnexo">
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="tipoAnexo">Tipo Anexo</label>
                          <select class="form-control input-md cajatexto" id="tipoAnexo" name="tipoAnexo">
                            <option value="">Seleccione...</option>
                          </select>
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="fechaAnexo">Fecha Anexo</label>
                          <input type="date" class="form-control input-md cajatexto" id="fechaAnexo" name="fechaAnexo">
                        </div>

                        <div class="form-group col-sm-3 col-xs-12">
                          <label for="btnSeleccionarAnexo">Documento Anexo</label>
                          <div>
                            <button type="button" class="btn btn-primary" id="btnSeleccionarAnexo">
                              <i class="fa fa-plus" aria-hidden="true"></i> Selección
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="table-container2">
                        <div class="table-responsive2">
                          <table class="table table-bordes2" id="tablaAnexo">
                            <thead class="thead-dark">
                              <tr>
                                <th>Id Anexo</th>
                                <th>Tipo Anexo</th>
                                <th>Fecha</th>
                                <th>Documento</th>
                                <th>Eliminar</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="5" style="padding: 8px; text-align: center; border: 1px solid #ddd;">Ningún dato disponible en esta tabla</td>
                              </tr>
                            </tbody>
                          </table>
                          <div style="margin-top: 10px; font-size: 12px; color: #666;">
                            Mostrando registros del 0 al 0 de un total de 0 registros
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Botones de acción -->
              <div class="button-container">
                <button type="button" class="btn btn-primary" id="btnGrabarFicha">
                  <i class="fa fa-search" aria-hidden="true"></i> Grabar Ficha
                </button>

                <button type="button" class="btn btn-primary" id="btnListadoSolicitud">
                  <i class="fa fa-search" aria-hidden="true"></i> Listado de Solicitudes
                </button>

                <button type="button" class="btn btn-primary" id="btnListadoFicha">
                  <i class="fa fa-search" aria-hidden="true"></i> Listado Ficha
                </button>
              </div>
            </div>
          </section>


          <script>
            document.getElementById("btnSeleccionContrato").addEventListener("click", function() {
              document.getElementById("inputArchivo").click();
            });

            document.getElementById("inputArchivo").addEventListener("change", function() {
              if (this.files.length > 0) {
                alert("Archivo seleccionado: " + this.files[0].name);
              }
            });
          </script>

          <script>
            $(document).ready(function() {
              $('#btnSeleccionContrato').click(function() {
                $('#inputArchivo').click();
              });

              $('#inputArchivo').on('change', function() {
                var file = this.files[0];

                if (file) {
                  var ext = file.name.split('.').pop().toLowerCase();

                  if ($.inArray(ext, ['docx', 'pdf', 'jpg']) === -1) {
                    alert('Solo se permiten archivos DOCX, PDF o JPG.');
                    $(this).val('');
                    $('#nombreArchivo').text(''); // Limpiar el texto mostrado
                  }
                }
              });
            });
          </script>

          <script>
            document.addEventListener('DOMContentLoaded', function() {
              document.getElementById('btnGrabarFicha').querySelector('i').className = 'fa fa-save';
              document.getElementById('btnGrabarFicha').style = 'background-color:#3c8dbc; border-color:#3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

              document.getElementById('btnListadoSolicitud').querySelector('i').className = 'fa fa-list-alt';
              document.getElementById('btnListadoSolicitud').style = 'background-color: #FF6600; border-color: #FF6600; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

              document.getElementById('btnListadoFicha').querySelector('i').className = 'fa fa-file-text';
              document.getElementById('btnListadoFicha').style = 'background-color: #3c8dbc; border-color: #3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

              const buttons = document.querySelectorAll('.btn');
              buttons.forEach(button => {
                button.addEventListener('mouseover', function() {
                  if (this.id === 'btnGrabarFicha') this.style.backgroundColor = '#3c8dbc';
                  if (this.id === 'btnListadoSolicitud') this.style.backgroundColor = '#FF6600';
                  if (this.id === 'btnListadoFicha') this.style.backgroundColor = '#3c8dbc';
                  this.style.transform = 'translateY(-2px)';
                  this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
                });

                button.addEventListener('mouseout', function() {
                  if (this.id === 'btnGrabarFicha') this.style.backgroundColor = '#3c8dbc';
                  if (this.id === 'btnListadoSolicitud') this.style.backgroundColor = '#FF6600';
                  if (this.id === 'btnListadoFicha') this.style.backgroundColor = '#3c8dbc';
                  this.style.transform = '';
                  this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
                });
              });
            });
          </script>

          <script>
            document.getElementById("btnListadoSolicitud").addEventListener("click", function() {
              window.location.href = "fichaContrato?view=listaSolicitudes";
            });
          </script>

          <script>
            document.getElementById("btnListadoFicha").addEventListener("click", function() {
              window.location.href = "fichaContrato";
            });
          </script>

          <script>
            button.addEventListener('mouseout', function() {
              if (this.id === 'btnGrabarFicha') this.style.backgroundColor = '#3c8dbc';
              if (this.id === 'btnListadoSolicitud') this.style.backgroundColor = '#FF6600';
              if (this.id === 'btnListadoFicha') this.style.backgroundColor = '#3c8dbc';
              this.style.transform = '';
              this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            });
          </script>

          <script>
            document.getElementById("btnListadoSolicitud").addEventListener("click", function() {
              window.location.href = "fichaContrato?view=listaSolicitudes";
            });
          </script>

          <script>
            document.getElementById("btnListadoFicha").addEventListener("click", function() {
              window.location.href = "fichaContrato";
            });
          </script>

      </div>

    </div>

    <script src="vistas/js/recursosHumanos/fichaContrato.js"></script>

    <script>
      document.addEventListener("DOMContentLoaded", () => {
        const btnListaFichaContrato = document.getElementById("btnListaFichaContrato");
        const btnListaSolicitudes = document.getElementById("btnListaSolicitudes");
        const panelFichaContrato = document.getElementById("panelFichaContrato");
        const panelListaSolicitudActivas = document.getElementById("panelListaSolicitudActivas");

        const urlParams = new URLSearchParams(window.location.search);
        const view = urlParams.get("view");

        if (view === "listaSolicitudes") {
          panelFichaContrato.style.display = "none";
          panelListaSolicitudActivas.style.display = "block";
        } else {
          panelFichaContrato.style.display = "block";
          panelListaSolicitudActivas.style.display = "none";
        }

        btnListaFichaContrato.addEventListener("click", () => {
          panelFichaContrato.style.display = "block";
          panelListaSolicitudActivas.style.display = "none";
        });

        btnListaSolicitudes.addEventListener("click", () => {
          panelListaSolicitudActivas.style.display = "block";
          panelFichaContrato.style.display = "none";
        });
      });
    </script>

    <style>
      .table-requisitos {
        position: relative;
        padding-top: 10px;

      }

      .table-responsive1 {
        top: 50px;
      }

      /* Ajustar modal a sus contenedores */
      .modal-dialog {
        width: auto !important;
        max-width: 70% !important;
        margin: 10px auto !important;
      }

      .modal-content {
        width: 100% !important;
      }

      .modal-body {
        padding: 5px !important;
        overflow-x: hidden !important;
      }

      .modal-body .content {
        padding: 0 !important;
        margin: 0 !important;
      }

      .modal-body .box {
        margin-bottom: 10px !important;
        padding: 0 !important;
        border: none !important;
        box-shadow: none !important;
      }

      .modal-body .panel-group {
        margin-bottom: 5px !important;
      }

      .modal-body .panel-body {
        padding: 5px !important;
      }

      .modal-body .form-group {
        margin-bottom: 5px !important;
      }

      /* Ajustar contenido dentro del modal */
      .modal-body section.content {
        padding: 0 !important;
        margin: 0 !important;
      }

      /* Separar los botones de acción */
      .button-container {
        display: flex;
        justify-content: center;
        margin: 10px ;
        padding: 10px;
      }

      .button-container .btn {
        margin-right: 25px;
        margin-left: 25px;
      }
    </style>