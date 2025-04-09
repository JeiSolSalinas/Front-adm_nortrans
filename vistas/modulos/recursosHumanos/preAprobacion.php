<input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">

<div class="content-wrapper">

    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Personal: Pre Aprobacion Solicitud Personal</h1>
    </section>

    <section class="content">
        <div class="box">

            <div class="panel-group" id="solicituPreAprobar">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-panel-listaPreAprobar">
                            <a data-toggle="collapse" href="#solicituPreAprobar_content"
                                class="panel-listaPreAprobar-link" aria-expanded="true">Lista de Solicitud por pre-aprobar</a>
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
                                            <center> Pre aprueba</center>
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

                    <input type="hidden" name="idModificar" id="idModificar" required>

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
                        <label for="fecharequeridaVer">Fecha requerida:</label>
                        <input type="date" class="form-control input-md cajatexto" name="fecharequeridaVer" id="fecharequeridaVer" disabled>
                    </div>

                    <div class="form-group col-sm-4 col-xs-12">
                        <label for="remuneracionVer">Remuneración líquida:</label>
                        <input type="number" class="form-control input-md cajatexto" name="remuneracionVer" id="remuneracionVer" disabled>
                    </div>


                    <div class="col-md-12 col-xs-12">
                        <div class="box box-success">
                            <div class="box-body">

                                <div class="form-group col-sm-4 col-xs-12">
                                    <label for="comentarioPreapruebaVer">Comentario Preaprueba:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                    <textarea class="form-control input-md cajatexto" name="comentarioPreapruebaVer" id="comentarioPreapruebaVer" rows="3"></textarea>
                                </div>

                                <input type='hidden' id="fechaPreAprobacion" name="fechaPreAprobacion" value="<?php echo date('Y-m-d H:i:s'); ?>"> <!--fecha preaprobacion-->

                                <button type="button" class="btn btn-primary"
                                    style="background-color: #adaf9c; border-color: #f46717; margin-top: 50px; margin-right: 20px"
                                    id="btnPreRechazar">
                                    <i class="fa fa-hdd-o" aria-hidden="true"></i> Rechazar
                                </button>

                                <button type="button" class="btn btn-primary"
                                    style="background-color: #adaf9c; border-color: #f46717; margin-top: 50px; margin-right: 20px"
                                    id="btnPreAprobar">
                                    <i class="fa fa-hdd-o" aria-hidden="true"></i> Aprobar
                                </button>

                                <button type="button" class="btn btn-primary"
                                    style="background-color: #adaf9c; border-color: #f46717; margin-top: 60px; margin-right: 12px; float: right; width: 90px;"
                                    id="btnModificar">
                                    <i class="fa fa-hdd-o" aria-hidden="true"></i>Salir
                                </button>


                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="vistas/js/recursosHumanos/preaprueba.js"></script>