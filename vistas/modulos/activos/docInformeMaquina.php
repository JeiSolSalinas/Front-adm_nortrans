<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Informe documento por máquina</h1>
    </section>

    <section class="content">
        <div class="panel-group" id="panelFiltros">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding: 1px; background-color: #e9ecef;">
                    <h4 class="panel-opcion">
                        <a data-toggle="collapse" href="#filtros_content" class="panel-opcion-link" aria-expanded="true">
                            Filtros
                        </a>
                    </h4>
                </div>
                <div id="filtros_content" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Centro Costo</label>
                                    <select class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Tipo de Documento</label>
                                    <select class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Maquina</label>
                                    <select class="form-control">
                                        <option></option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex gap-3 align-items-center">
                                <button type="button" class="btn btn-primary" id="btnBuscar" style="margin-top: 25px;">
                                    <i class="fa fa-search" aria-hidden="true"></i> Buscar
                                </button>
                            </div>
                        </div>


                        <div class="toggle-container">
                            <div class="toggle-row">
                                <div class="toggle-column">
                                    <span class="toggle-label">Agregar anticipación</span>
                                    <label class="toggle-switch">
                                        <input type="checkbox" id="anticipation-toggle">
                                        <span class="slider"></span>
                                    </label>
                                </div>

                                <div class="date-field" id="date-field" style="display: none;">
                                    <label for="anticipationOculto">Fecha Anticipación:</label>
                                    <input type="date" class="form-control input-md cajatexto" name="anticipationOculto" id="anticipationOculto">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="panel-group" id="frm:j_idt110">
            <div class="panel panel-default">
                <div class="panel-heading" style="padding: 1px;">
                    <h4 class="panel-opcion">
                        <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                            Lista
                        </a>
                    </h4>
                </div>


                <div id="frm_j_idt110_content" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <div class="table-container">
                            <div class="table-responsive">
                                <div class="box-body">
                                    <div id="lista">
                                        <table class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                            <thead>
                                                <tr>
                                                    <th style="width:120px">
                                                        <center>Patente</center>
                                                    </th>
                                                    <th>
                                                        <center>Patente</center>
                                                    </th>
                                                    <th>
                                                        <center>Tipo de Documento</center>
                                                    </th>
                                                    <th>
                                                        <center>Fecha Vencimiento</center>
                                                    </th>
                                                </tr>

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
                </div>
            </div>
        </div>
</div>
</section>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #f5f5f5;
    }

    .toggle-container {
        display: flex;
        align-items: center;
    }

    .toggle-row {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .toggle-column {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .toggle-switch {
        position: relative;
        display: inline-block;
        width: 46px;
        height: 24px;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .3s;
        border-radius: 24px;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 2px;
        bottom: 2px;
        background-color: white;
        transition: .3s;
        border-radius: 50%;
        transform: translateX(0);
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        transform: translateX(22px);
    }

    .date-field {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
</style>

<script>
    document.getElementById("anticipation-toggle").addEventListener("change", function() {
        let dateField = document.getElementById("date-field");
        dateField.style.display = this.checked ? "flex" : "none";
    });
</script>

<style>
    #lista table {
        font-size: 10px;
        border-collapse: separate !important;
        border-spacing: 0;
    }

    #lista th {
        font-size: 13px;
    }

    #lista td {
        font-size: 15px;
    }

    .panel-opcion-link:focus,
    .panel-opcion-link:active {
        text-decoration: underline;
    }

    .table-container {
        margin: 15px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        margin-bottom: 0;
    }

    .table>thead>tr>th {
        background-color: #f4f4f4;
        border-bottom: 2px solid #ddd;
        border: 1px solid #ddd !important;
    }

    .table-bordered {
        border: 1px solid #ddd !important;
    }

    .table-bordered>thead>tr>th,
    .table-bordered>tbody>tr>td {
        border: 1px solid #ddd !important;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }


    .panel-group {
        margin-bottom: 15px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const panel = document.getElementById('frm_j_idt110_content');
        if (panel) {
            panel.classList.add('in');
        }

        exampleData.forEach(row => {
            const tr = document.createElement('tr');
            row.forEach(cell => {
                const td = document.createElement('td');
                td.textContent = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    });
</script>
</div>