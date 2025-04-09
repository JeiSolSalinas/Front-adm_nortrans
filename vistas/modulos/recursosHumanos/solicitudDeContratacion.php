<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Solicitud de contratación</h1>
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
                                    <label>Estado</label>
                                    <select class="form-control">
                                        <option>Todos</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha desde</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="2025-02-09">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Fecha hasta</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="2025-03-11">
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3 align-items-center">
                                <button type="button" class="btn btn-primary" id="btnBuscar" style="margin-top: 25px;">
                                    <i class="fa fa-search" aria-hidden="true"></i> Buscar
                                </button>
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
                                    <div id="lista"><table id="tablaDocumentos" class="table table-bordered table-striped dt-responsive" width="100%;">
                                            <thead>
                                                <tr>
                                                    
                                                    <th onclick="sortTable(0, this)"<center>N° Solicitud</center></th>
                                                    <th onclick="sortTable(1, this)"<center>Fecha solicitud</center></th>                                                  
                                                    <th onclick="sortTable(2, this)"<center>Empresa</center></th>                                                                                                       
                                                    <th onclick="sortTable(3, this)"<center>Cargo</center> </th>                                                                                               
                                                    <th onclick="sortTable(4, this)"<center>Centro costo</center> </th>                                        
                                                    <th onclick="sortTable(5, this)" <center>Solicitante</center></th>                                                                                                    
                                                    <th onclick="sortTable(6, this)" <center>Pre aprobado</center></th>                                                                                                     
                                                    <th onclick="sortTable(7, this)"<center>Aprobadoo</center></th>                                          
                                                    <th onclick="sortTable(8, this)" <center>Tipo contrato</center></th>                                                                                                     
                                                    <th onclick="sortTable(9, this)"<center>Estado actual</center> </th>
                                                    <th onclick="sortTable(10, this)"><center>Impresión</center></th>
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
      #lista table {
        font-size: 10px;
        border-collapse: separate !important;
        border-spacing: 0;
        text-align: center;
    }

    #lista th {
        font-size: 13px;
        background-color: #f4f4f4;
        border: 1px solid #ddd !important;
        cursor: pointer;
        position: relative;
        user-select: none;
        padding-right: 20px; /* Espacio para la flecha */
    }

    #lista th.asc::after {
        content: "▲";
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #555;
    }

    #lista th.desc::after {
        content: "▼";
        position: absolute;
        right: 5px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 12px;
        color: #555;
    }

    #lista td {
        font-size: 15px;
        border: 1px solid #ddd !important;
    }

    .panel-opcion-link:focus,
    .panel-opcion-link:active {
        text-decoration: underline;
    }

    .table-container {
        margin: 5px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        margin-bottom: 0;
    }

    .table-striped>tbody>tr:nth-of-type(odd) {
        background-color: #f9f9f9;
    }

    .table-bordered {
        border: 1px solid #ddd !important;
    }
</style>
<script>
        let sortDirection = [];

        function sortTable(columnIndex, thElement) {
            const table = document.getElementById("tablaDocumentos");
            const rows = Array.from(table.tBodies[0].rows);
            const dir = sortDirection[columnIndex] === "asc" ? "desc" : "asc";
            sortDirection[columnIndex] = dir;

            // Limpiar clases de flechas en todos los th
            const headers = table.querySelectorAll("th");
            headers.forEach((th, i) => {
                th.classList.remove("asc", "desc");
                if (i === columnIndex) th.classList.add(dir);
            });

            rows.sort((a, b) => {
                let aText = a.cells[columnIndex].innerText.trim();
                let bText = b.cells[columnIndex].innerText.trim();

                const datePattern = /^\d{4}-\d{2}-\d{2}$/;
                const isDate = datePattern.test(aText) && datePattern.test(bText);

                if (isDate) {
                    return dir === "asc"
                        ? new Date(aText) - new Date(bText)
                        : new Date(bText) - new Date(aText);
                }

                return dir === "asc"
                    ? aText.localeCompare(bText, 'es', { numeric: true })
                    : bText.localeCompare(aText, 'es', { numeric: true });
            });

            const tbody = table.tBodies[0];
            tbody.innerHTML = "";
            rows.forEach(row => tbody.appendChild(row));
        }
    </script>


</div>