<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Consulta: Documentos laborales por vencer</h1>
    </section>

    <section class="content">
        <div class="box">
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
                                            <table id="tablaDocumentos" class="table table-bordered table-striped dt-responsive" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th onclick="sortTable(0, this)">Rut</th>
                                                        <th onclick="sortTable(1, this)">Personal</th>
                                                        <th onclick="sortTable(2, this)">Id Centro Costo</th>
                                                        <th onclick="sortTable(3, this)">Tipo de Documento</th>
                                                        <th onclick="sortTable(4, this)">Fecha Expiración</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>12345678-9</td>
                                                        <td>Juan Pérez</td>
                                                        <td>101</td>
                                                        <td>Contrato</td>
                                                        <td>2025-04-10</td>
                                                    </tr>
                                                    <tr>
                                                        <td>87654321-0</td>
                                                        <td>María López</td>
                                                        <td>102</td>
                                                        <td>Licencia</td>
                                                        <td>2025-04-15</td>
                                                    </tr>
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
        margin: 15px;
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
