<div class="content-wrapper">
    <section class="content-header" style="background-color: black; padding: 20px; text-align: center;">
        <h1 style="color: white; font-weight: bold;">Mantenedor: Mantenedor Maquina</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="panelDatos">
                <div class="panel panel-default">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group col-sm-5 col-xs-12">
                                <button type="button" class="btn btn-primary" id="btncrearCargo" data-toggle="modal" data-target="#modalAgregar">
                                    <i class="fa fa-list" aria-hidden="true"></i> Crear Maquina
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal-body" style="margin: -70px; background: #f4f4f4; padding: 5px;"></div>

    <section class="content">
        <div class="box">
            <div class="panel-group" id="frm:j_idt110">
                <div class="panel panel-default">
                    <div class="panel-heading" style="padding: 1px;">
                        <h4 class="panel-opcion">
                            <a data-toggle="collapse" href="#frm_j_idt110_content" class="panel-opcion-link" aria-expanded="true">
                                Lista de Maquina
                            </a>
                        </h4>
                    </div>

                    <div class="box-body">


                        <div class="d-flex align-items-center botones-container"">
                            <button type="button" class="btn btn-primary "data-toggle="modal" data-target="#modalEditar" id="btnverActivos">
                                <i class="fa fa-search" aria-hidden="true"></i> Ver Activos
                            </button>

                            <button type="button" class="btn btn-primary " id="btnverTodos">
                                <i class="fa fa-list" aria-hidden="true"></i> Ver Todos
                            </button>

                            <button type="button" class="btn btn-primary" id="btnverBloqueados"" style=" background-color: #FF6600;">
                                <i class="fa fa-file" aria-hidden="true"></i> Ver Bloqueados
                            </button>
                        </div>
                    </div>

                    <!-- Controles de tabla -->
                    <div class="form-row justify-content-start">
                        <div class="records-control" style="margin-left: 30px;">
                            <span>Mostrar</span>
                            <select id="recordsPerPage" style="width: 70px;">
                                <option value="10" selected>10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                            <span>registros</span>
                        </div>
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
                                                            <center>N° Interno</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo Maquina</center>
                                                        </th>
                                                        <th>
                                                            <center>Tipo Bus</center>
                                                        </th>
                                                        <th>
                                                            <center>Marca/<BR>Modelo chasis</center>
                                                        </th>
                                                        <th>
                                                            <center> Tipo Mantencion</center>
                                                        </th>
                                                        <th>
                                                            <center>Centro Costo</center>
                                                        </th>
                                                        <th>
                                                            <center>Estado </center>
                                                        </th>
                                                        <th>
                                                            <center>Editar</center>
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

    <!--aca debe ir el modal de agregar-->

    <div id="modalAgregar" class="modal fade" role="dialog">

        <div class="modal-dialog modal-lg">

            <div class="modal-content">

                <form role="form" method="post" id="formulario_para_agregar">

                    <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

                    <div class="modal-header" style="background:#A9A9A9; color:white">

                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                        <h4 class="modal-title">Cargo</h4>

                    </div>

                    <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

            </div>
        </div>
    </div>


</div>

</div>

</div>



</div>

<style>
    .botones-container {
    display: flex;
    gap: 80px; /* Aquí defines el espacio entre los botones */
}
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
        position: relative;
        top: -40px;
        margin: 10px;
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


    .records-control {
        top: 80px;
        right: 100px;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 15px;
    }

    #btnGrabarFicha {
        margin-top: 22px !important;
        position: relative;
        left: 20px;
    }

    #btnMostarListado {
        margin-top: 22px !important;
        position: relative;
        left: 30px;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Asegurarse de que el panel esté abierto por defecto
        const panel = document.getElementById('frm_j_idt110_content');
        if (panel) {
            panel.classList.add('in');
        }

        // Implementar la funcionalidad de filtrado
        const filterInputs = document.querySelectorAll('.filter-input');
        filterInputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                const searchText = this.value.toLowerCase();
                const table = document.querySelector('.table');
                const rows = table.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const cell = row.cells[index];
                    if (cell) {
                        const text = cell.textContent.toLowerCase();
                        row.style.display = text.includes(searchText) ? '' : 'none';
                    }
                });
            });
        });


        const btnGrabarFicha = document.getElementById('btnGrabarFicha');
        if (btnGrabarFicha) {
            const icon = btnGrabarFicha.querySelector('i');
            if (icon) {
                icon.className = 'fa fa-save';
            }
            btnGrabarFicha.style.cssText = `
                background-color: #3c8dbc;
                border-color: #3c8dbc;
                padding: 8px 16px;
                border-radius: 6px;
                transition: all 0.3s ease;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            `;
            btnGrabarFicha.addEventListener('mouseover', function() {
                this.style.transform = 'translateY(-2px)';
                this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
            });
            btnGrabarFicha.addEventListener('mouseout', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
            });
        }
    });
</script>

<script>
      document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btnverActivos').querySelector('i').className = 'fa fa-save';
        document.getElementById('btnverActivos').style = 'background-color:#3c8dbc; border-color:#3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

        document.getElementById('btnverTodos').querySelector('i').className = 'fa fa-list-alt';
        document.getElementById('btnverTodos').style = 'background-color: #FF6600; border-color: #FF6600; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

        document.getElementById('btnverBloqueados').querySelector('i').className = 'fa fa-file-text';
        document.getElementById('btnverBloqueados').style = 'background-color: #3c8dbc; border-color: #3c8dbc; padding: 8px 16px; border-radius: 6px; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1);';

        const buttons = document.querySelectorAll('.btn');
        buttons.forEach(button => {
          button.addEventListener('mouseover', function() {
            if (this.id === 'btnverActivos') this.style.backgroundColor = '#3c8dbc';
            if (this.id === 'btnverTodos') this.style.backgroundColor = '#FF6600';
            if (this.id === 'btnverBloqueados') this.style.backgroundColor = '#3c8dbc';
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 4px 6px rgba(0,0,0,0.15)';
          });

          button.addEventListener('mouseout', function() {
            if (this.id === 'btnverActivos') this.style.backgroundColor = '#3c8dbc';
            if (this.id === 'btnverTodos') this.style.backgroundColor = '#FF6600';
            if (this.id === 'btnverBloqueados') this.style.backgroundColor = '#3c8dbc';
            this.style.transform = '';
            this.style.boxShadow = '0 2px 4px rgba(0,0,0,0.1)';
          });
        });
      });
    </script>



<script src="vistas/js/recursosHumanos/cargoOrganizacional.js"></script>