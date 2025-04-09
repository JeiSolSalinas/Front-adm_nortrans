<div class="content-wrapper">
    <section class="content-header" style="background-color: rgb(14, 13, 13); padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Seleccionar Ficha Contrato</h1>
    </section>

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

                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="numeroFichaSelec">N° de Ficha</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="numeroFichaSelec" id="numeroFichaSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="idSolicitudSelec">Id Solicitud</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="idSolicitudSelec" id="idSolicitudSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="EmpresaSelec">Empresa</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="EmpresaSelec" id="EmpresaSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="divisionSelec">División:</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="divisionSelec" id="divisionSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="CargoSelec">Cargo:</label>
                                <input class="form-control input-md cajatexto" id="CargoSelec" name="CargoSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="tipocontratoSelec">Tipo Contrato:</label>
                                <input class="form-control input-md cajatexto" id="tipocontratoSelec" name="tipocontratoSelec" onchange="mostrarFechaTermino()">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="tipoTurnoSelec">Tipo Turno:</label>
                                <input class="form-control input-md cajatexto" id="tipoTurnoSelec" name="tipoTurnoSelec">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="empresaSelec">Seleccionar Empresa:</label>
                                <select class="form-control input-md cajatexto" id="selecotorEmpresa" name="selecotorEmpresa"></select>
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="fechainicioSelec">Fecha Inicio:</label>
                                <input type="date" class="form-control input-md cajatexto" name="fechainicioSelec" id="fechainicioSelec" onchange="calcularFechaTermino()">
                            </div>

                            <div class="form-group col-sm-3 col-xs-12">
                                <label for="sueldoLiquidoSelec">Sueldo Líquido:</label>
                                <input class="form-control input-md cajatexto" id="sueldoLiquidoSelec" name="sueldoLiquidoSelec">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-body" style="margin: -25px; background: #f4f4f4; padding: 5px;"> </div>
    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
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
                                <input class="form-control input-md cajatexto solo-ruc" name="nomSelec" id="nomSelec">
                            </div>

                            <div class="form-group col-sm-5 col-xs-12">
                                <label for="telSelec">Teléfono Propio</label>
                                <input class="form-control input-md cajatexto solo-ruc" name="telSelec" id="telSelec">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-body" style="margin: -25px; background: #f4f4f4; padding: 5px;"> </div>
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
                        Datos constractuales
                    </a>
                </li>
            </ul>

            <!-- Contenido de las pestañas -->
            <div class="tab-content" id="myTabContent">
                <!-- Pestaña de Requisitos Solicitados -->
                <div class="tab-pane fade in active" id="requisitos-content" role="tabpanel">
                    <div class="panel-group" id="panelRequisitos">
                        <div class="panel panel-default">
                            <div class="modal-body">
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

                                        <div class="table-container">
                                            <div class="table-responsive">
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

                <!-- Pestaña de Datos constractuales -->
                <div class="tab-pane fade" id="datos-content" role="tabpanel">
                    <div class="panel panel-default">
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="panel panel-default">
                                    <div class="panel-heading" style="background-color: #f5f5f5; padding: 10px;">
                                        <h4 class="panel-title">Contrato de trabajo</h4>
                                    </div>
                                    <div class="panel-body" style="padding: 15px;">
                                        <button type="button" class="btn btn-primary" id="btnSeleccionContrato">
                                            <i class="fa fa-plus" aria-hidden="true"></i> Selección
                                        </button>
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
                    </div>
                </div>
            </div>
    </section>

    <div class="modal-body" style="margin: -25px; background: #f4f4f4; padding: 5px;"> </div>
    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
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
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    /* Estilos para las pestañas */
    .nav-tabs {
        border-bottom: 1px solid #ddd;
        margin-bottom: 15px;
    }

    .nav-tabs>li {
        float: left;
        margin-bottom: -1px;
    }

    .nav-tabs>li>a {
        margin-right: 2px;
        line-height: 1.42857143;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0;
        padding: 10px 15px;
        display: block;
        text-decoration: none;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }

    .nav-tabs>li>a:hover {
        border-color: #eee #eee #ddd;
    }

    .tab-content>.tab-pane {
        display: none;
    }

    .tab-content>.active {
        display: block;
    }

    .fade {
        opacity: 0;
        transition: opacity 0.15s linear;
    }

    .fade.in {
        opacity: 1;
    }
</style>

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

<style>
    .table-container {
        float: left;
        width: 100%;
        margin-top: 35px;
        position: static;
    }

    .table-responsive {
        max-height: 80px;
        overflow-y: auto;
        width: 80%;
        margin-left: 50px;
    }

    .table-bordes th,
    .table-bordes td,
    .table-bordes {
        border: 0.2px solid #111 !important;
        text-align: center;
        padding: 10px;
    }

    .table-bordes th:nth-child(1),
    .table-bordes td:nth-child(1) {
        width: 10%;
        margin-left: 10px;
    }

    .table-bordes th:nth-last-child(2),
    .table-bordes td:nth-child(2) {
        width: 10%;
    }

    .table-bordes th:nth-child(3),
    .table-bordes td:nth-child(3) {
        width: 10%;
    }

    .table-bordes th:nth-child(4),
    .table-bordes td:nth-child(4) {
        width: 20%;
    }

    .table-container2 {
        float: left;
        width: 100%;
        margin-top: 35px;
        position: static;
    }

    .table-responsive2 {
        max-height: 80px;
        overflow-y: auto;
        width: 80%;
        margin-left: 50px;
    }

    .table-bordes2 th,
    .table-bordes2 td,
    .table-bordes2 {
        border: 0.2px solid #111 !important;
        text-align: center;
        padding: 10px;
    }

    .table-bordes2 th:nth-child(1),
    .table-bordes2 td:nth-child(1) {
        width: 10%;
        margin-left: 10px;
    }

    .table-bordes2 th:nth-last-child(2),
    .table-bordes2 td:nth-child(2) {
        width: 5%;
    }

    .table-bordes2 th:nth-child(3),
    .table-bordes2 td:nth-child(3) {
        width: 20%;
    }

    .table-bordes2 th:nth-child(4),
    .table-bordes2 td:nth-child(4) {
        width: 20%;
    }

    .table-bordes2 th:nth-child(5),
    .table-bordes2 td:nth-child(5) {
        width: 20%;
    }

    .button-container {
        display: flex;
        flex-wrap: wrap;
        gap: 150px;
        justify-content: center;
    }

    @media (max-width: 600px) {
        .btn {
            width: 100%;
            text-align: center;
        }
    }
</style>

<script src="vistas/js/recursosHumanos/seleccionarficha.js"></script>