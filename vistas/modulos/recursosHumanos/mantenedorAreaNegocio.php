<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estructura: Mantenedor Area negocio</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- jsPlumb para las conexiones con flechas -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsPlumb/2.15.6/js/jsplumb.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        #btnGrabarFicha {
            margin-top: 22px !important;
        }

        #listaEstructura table {
            font-size: 10px;
            border-collapse: separate !important;
            border-spacing: 0;
        }

        #listaEstructura th {
            font-size: 13px;
        }

        #listaEstructura td {
            font-size: 15px;
        }

        .panel-opcion-link:focus,
        .panel-opcion-link:active {
            text-decoration: underline;
        }

        .table-container {
            margin: 10px;
        }

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            margin-bottom: 10;
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

        /* Estilos para los nodos del diagrama */
        #diagramaContainer {
            position: relative;
            width: 100%;
            height: 600px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            overflow: auto;
        }

        .node {
            position: absolute;
            width: 180px;
            height: 60px;
            background-color: #f0f0f0;
            border: 2px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            font-weight: bold;
            text-align: center;
            padding: 5px;
            z-index: 10;
            cursor: move;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Estilos para las conexiones */
        .jtk-connector {
            z-index: 9;
        }

        .jtk-endpoint {
            z-index: 10;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            margin-top: 15px;
        }
    </style>
</head>

<body>
    <div class="content-wrapper">
        <section class="content-header" style="background-color: rgb(14, 13, 13); padding: 20px; text-align: center;">
            <h1 style="color: white; font-weight: bold;">Estructura: Mantenedor Area negocio</h1>
        </section>

        <section class="content">
            <div class="box">
                <div class="panel-group" id="panelEstructura">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="padding: 1px;">
                            <h4 class="panel-estructura">
                                <a data-toggle="collapse" href="#panelEstructura_content" class="panel-estructura-link" aria-expanded="true">
                                    Estructura
                                </a>
                            </h4>
                        </div>

                        <div id="panelEstructura_content" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <div class="d-flex align-items-center gap-3 flex-wrap">
                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label for="divisionSelec">Division:</label>
                                        <select class="form-control input-md cajatexto" id="divisionSelec" name="divisionSelec">
                                            <option value="Industrial">Industrial</option>
                                            <option value="Comercial">Comercial</option>
                                            <option value="Administrativa">Administrativa</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label for="idAreaNegocio">Id Area Negocio</label>
                                        <input class="form-control input-md cajatexto solo-ruc" name="idAreaNegocio" id="idAreaNegocio">
                                    </div>

                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label for="tipoArea">Tipo Area:</label>
                                        <select class="form-control input-md cajatexto" id="tipoArea" name="tipoArea">
                                            <option value="">Seleccionar...</option>
                                            <option value="Gerencia">Gerencia</option>
                                            <option value="Jefatura">Jefatura</option>
                                            <option value="Departamento">Departamento</option>
                                            <option value="Sección">Sección</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label for="descripcion">Descripcion:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                                        <textarea class="form-control input-md cajatexto" name="descripcion" id="descripcion" rows="1"></textarea>
                                    </div>

                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label for="dependenciaArea">Dependencia de Area</label>
                                        <select class="form-control input-md cajatexto" id="dependenciaArea" name="dependenciaArea">
                                            <option value="">Seleccionar...</option>
                                            <!-- Se llenará dinámicamente con JavaScript -->
                                        </select>
                                    </div>

                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label for="nivelOrganizacional">Nivel Organizacional:</label>
                                        <input type="number" class="form-control input-md cajatexto" name="nivelOrganizacional" id="nivelOrganizacional" value="0">
                                    </div>

                                    <div class="form-group col-sm-3 col-xs-12">
                                        <label>&nbsp;</label> <!-- Esto deja espacio para alinear con los campos -->
                                        <button type="button" class="btn btn-primary" id="btnGrabarFicha" style="width: 100%;">
                                            <i class="fa fa-save" aria-hidden="true"></i> Grabar Ficha
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal-body" style="margin: -30px; background: #f4f4f4; padding: 5px;"></div>

        <section class="content">
            <div class="box">
                <ul class="nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item active">
                        <a class="nav-link active" id="requisitos-tab" data-toggle="tab" href="#requisitos-content" role="tab">
                            Diagrama
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="datos-tab" data-toggle="tab" href="#datos-content" role="tab">
                            Estructura
                        </a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade in active" id="requisitos-content" role="tabpanel">
                        <div class="panel-group" id="panelRequisitos">
                            <div class="panel panel-default">
                                <div class="modal-body">
                                    <div id="diagramaContainer"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="datos-content" role="tabpanel">
                        <div class="panel panel-default">
                            <div class="modal-body">
                                <div class="box-body">
                                    <div id="listaEstructura">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped dt-responsive" width="100%" style="text-align: center;">
                                                <thead>
                                                    <tr>
                                                        <th>Id Area</th>
                                                        <th>Descripcion</th>
                                                        <th>Tipo Area</th>
                                                        <th>Id Independencia Area</th>
                                                        <th>Descripcion Independencia</th>
                                                        <th>Estado</th>
                                                        <th>Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="estructuraTabla"></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Variable global para almacenar datos de ejemplo (si es necesario)
        var exampleData = [];

        document.addEventListener('DOMContentLoaded', function() {
            // Inicializar jsPlumb
            const jsPlumbInstance = jsPlumb.getInstance({
                Endpoint: ["Dot", {
                    radius: 2
                }],
                Connector: ["Straight", {
                    gap: 0,
                    cornerRadius: 5,
                    alwaysRespectStubs: true
                }],
                ConnectionOverlays: [
                    ["Arrow", {
                        location: 1,
                        width: 10,
                        length: 10,
                        foldback: 0.8
                    }]
                ],
                Container: "diagramaContainer"
            });

            // Estructura inicial de datos
            let estructura = [{
                id: "1",
                division: "Industrial",
                idAreaNegocio: "GG-01",
                tipoArea: "Gerencia",
                descripcion: "Gerencia General",
                dependenciaArea: "",
                nivelOrganizacional: 0,
                children: [{
                        id: "2",
                        division: "Industrial",
                        idAreaNegocio: "JC-01",
                        tipoArea: "Jefatura",
                        descripcion: "JEFE COMERCIAL",
                        dependenciaArea: "Gerencia General",
                        nivelOrganizacional: 1,
                    },
                    {
                        id: "3",
                        division: "Industrial",
                        idAreaNegocio: "JA-01",
                        tipoArea: "Jefatura",
                        descripcion: "JEFE DE ADMINISTRACIÓN Y FINANZAS",
                        dependenciaArea: "Gerencia General",
                        nivelOrganizacional: 1,
                        children: [{
                            id: "6",
                            division: "Industrial",
                            idAreaNegocio: "FI-01",
                            tipoArea: "Departamento",
                            descripcion: "FINANZAS",
                            dependenciaArea: "JEFE DE ADMINISTRACIÓN Y FINANZAS",
                            nivelOrganizacional: 2,
                        }]
                    },
                    {
                        id: "4",
                        division: "Industrial",
                        idAreaNegocio: "JD-01",
                        tipoArea: "Jefatura",
                        descripcion: "JEFE DEPARTAMENTO HSEC",
                        dependenciaArea: "Gerencia General",
                        nivelOrganizacional: 1,
                    },
                    {
                        id: "5",
                        division: "Industrial",
                        idAreaNegocio: "GO-01",
                        tipoArea: "Gerencia",
                        descripcion: "Gerencia Operacional",
                        dependenciaArea: "Gerencia General",
                        nivelOrganizacional: 1,
                    },
                    {
                        id: "7",
                        division: "Industrial",
                        idAreaNegocio: "MA-01",
                        tipoArea: "Departamento",
                        descripcion: "Mantenimiento",
                        dependenciaArea: "Gerencia General",
                        nivelOrganizacional: 1,
                    }
                ]
            }];

            // Referencias a elementos del DOM
            const btnGrabarFicha = document.getElementById('btnGrabarFicha');
            const selectDependencia = document.getElementById('dependenciaArea');
            const diagramaContainer = document.getElementById('diagramaContainer');
            const estructuraTabla = document.getElementById('estructuraTabla');

            // Función para actualizar el selector de dependencias
            function actualizarSelectorDependencias() {
                // Limpiar opciones actuales
                selectDependencia.innerHTML = '<option value="">Seleccionar...</option>';

                // Función recursiva para obtener todas las descripciones
                function getAllDescriptions(nodes) {
                    let descriptions = [];

                    nodes.forEach(node => {
                        descriptions.push(node.descripcion);
                        if (node.children) {
                            descriptions = [...descriptions, ...getAllDescriptions(node.children)];
                        }
                    });

                    return descriptions;
                }

                // Obtener todas las descripciones y añadirlas al selector
                const allDescriptions = getAllDescriptions(estructura);
                allDescriptions.forEach(desc => {
                    const option = document.createElement('option');
                    option.value = desc;
                    option.textContent = desc;
                    selectDependencia.appendChild(option);
                });
            }

            // Función para actualizar el diagrama
            function actualizarDiagrama() {
                // Limpiar el contenedor y las conexiones
                jsPlumbInstance.reset();
                diagramaContainer.innerHTML = '';

                // Función recursiva para procesar la estructura
                function procesarNodo(nodo, x, y, width, parentId) {
                    // Crear elemento del nodo
                    const nodeElement = document.createElement('div');
                    nodeElement.id = `node-${nodo.id}`;
                    nodeElement.className = 'node';
                    nodeElement.textContent = nodo.descripcion;
                    nodeElement.style.left = `${x - 90}px`; // Centrar el nodo (ancho 180px)
                    nodeElement.style.top = `${y}px`;

                    // Añadir el nodo al contenedor
                    diagramaContainer.appendChild(nodeElement);

                    // Hacer el nodo arrastrable
                    jsPlumbInstance.draggable(nodeElement, {
                        containment: 'parent'
                    });

                    // Crear conexión con el padre si existe
                    if (parentId) {
                        setTimeout(() => {
                            jsPlumbInstance.connect({
                                source: `node-${parentId}`,
                                target: `node-${nodo.id}`,
                                anchors: ["Bottom", "Top"],
                                paintStyle: {
                                    stroke: "#555",
                                    strokeWidth: 2
                                },
                                endpointStyle: {
                                    fill: "#555"
                                }
                            });
                        }, 50);
                    }

                    // Procesar hijos si existen
                    if (nodo.children && nodo.children.length > 0) {
                        const childWidth = width / nodo.children.length;
                        nodo.children.forEach((hijo, index) => {
                            const childX = x - width / 2 + childWidth * index + childWidth / 2;
                            const childY = y + 120; // Espacio vertical entre niveles
                            procesarNodo(hijo, childX, childY, childWidth, nodo.id);
                        });
                    }
                }

                // Iniciar procesamiento desde la raíz
                if (estructura.length > 0) {
                    procesarNodo(estructura[0], diagramaContainer.offsetWidth / 2, 50, 800);
                }

                // Actualizar la tabla
                actualizarTabla();
            }

            // Función para actualizar la tabla
            function actualizarTabla() {
                if (!estructuraTabla) return;
                estructuraTabla.innerHTML = '';

                // Función recursiva para obtener todos los nodos en formato plano
                function getAllNodes(nodes, parent = null) {
                    let allNodes = [];

                    nodes.forEach(node => {
                        allNodes.push({
                            ...node,
                            parent: parent
                        });

                        if (node.children) {
                            allNodes = [...allNodes, ...getAllNodes(node.children, node)];
                        }
                    });

                    return allNodes;
                }

                // Obtener todos los nodos y añadirlos a la tabla
                const allNodes = getAllNodes(estructura);
                allNodes.forEach(node => {
                    const tr = document.createElement('tr');

                    // ID Area
                    const tdId = document.createElement('td');
                    tdId.textContent = node.idAreaNegocio;
                    tr.appendChild(tdId);

                    // Descripción
                    const tdDesc = document.createElement('td');
                    tdDesc.textContent = node.descripcion;
                    tr.appendChild(tdDesc);

                    // Tipo Area
                    const tdTipo = document.createElement('td');
                    tdTipo.textContent = node.tipoArea;
                    tr.appendChild(tdTipo);

                    // ID Independencia Area
                    const tdIdDep = document.createElement('td');
                    tdIdDep.textContent = node.parent ? node.parent.idAreaNegocio : '';
                    tr.appendChild(tdIdDep);

                    // Descripción Independencia
                    const tdDescDep = document.createElement('td');
                    tdDescDep.textContent = node.dependenciaArea;
                    tr.appendChild(tdDescDep);

                    // Estado
                    const tdEstado = document.createElement('td');
                    tdEstado.textContent = 'Activo';
                    tr.appendChild(tdEstado);

                    // Editar
                    const tdEditar = document.createElement('td');
                    const btnEditar = document.createElement('button');
                    btnEditar.className = 'btn btn-xs btn-warning';
                    btnEditar.innerHTML = '<i class="fa fa-pencil"></i>';
                    btnEditar.onclick = function() {
                        // Aquí iría la lógica para editar
                        alert('Editar: ' + node.descripcion);
                    };
                    tdEditar.appendChild(btnEditar);
                    tr.appendChild(tdEditar);

                    estructuraTabla.appendChild(tr);
                });
            }

            // Estilizar el botón Grabar Ficha
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

            // Manejar clic en el botón Grabar Ficha
            if (btnGrabarFicha) {
                btnGrabarFicha.addEventListener('click', () => {
                    // Obtener valores del formulario
                    const formData = {
                        division: document.getElementById('divisionSelec').value,
                        idAreaNegocio: document.getElementById('idAreaNegocio').value,
                        tipoArea: document.getElementById('tipoArea').value,
                        descripcion: document.getElementById('descripcion').value,
                        dependenciaArea: document.getElementById('dependenciaArea').value,
                        nivelOrganizacional: parseInt(document.getElementById('nivelOrganizacional').value) || 0
                    };

                    // Validar que la descripción no esté vacía
                    if (!formData.descripcion) {
                        alert('La descripción es obligatoria');
                        return;
                    }

                    // Generar ID único
                    const newId = Date.now().toString();

                    // Crear nuevo nodo
                    const newNode = {
                        id: newId,
                        ...formData
                    };

                    // Función recursiva para añadir nodo en la posición correcta
                    function addNodeToStructure(nodes) {
                        return nodes.map(node => {
                            // Si este nodo es el padre del nuevo nodo
                            if (node.descripcion === formData.dependenciaArea) {
                                return {
                                    ...node,
                                    children: [...(node.children || []), newNode]
                                };
                            }
                            // Si tiene hijos, buscar en ellos
                            if (node.children) {
                                return {
                                    ...node,
                                    children: addNodeToStructure(node.children)
                                };
                            }
                            return node;
                        });
                    }

                    // Si no tiene dependencia, añadir como nodo raíz
                    if (!formData.dependenciaArea) {
                        estructura.push(newNode);
                    } else {
                        // Añadir como hijo del nodo correspondiente
                        estructura = addNodeToStructure(estructura);
                    }

                    // Actualizar el selector de dependencias y el diagrama
                    actualizarSelectorDependencias();
                    actualizarDiagrama();

                    // Limpiar formulario
                    document.getElementById('idAreaNegocio').value = '';
                    document.getElementById('tipoArea').value = '';
                    document.getElementById('descripcion').value = '';
                    document.getElementById('dependenciaArea').value = '';
                    document.getElementById('nivelOrganizacional').value = '0';

                    // Mostrar mensaje de éxito
                    alert('Registro guardado correctamente');
                });
            }

            // Inicializar el selector de dependencias y el diagrama
            actualizarSelectorDependencias();
            actualizarDiagrama();

            // Ajustar el tamaño del diagrama cuando cambia el tamaño de la ventana
            window.addEventListener('resize', () => {
                jsPlumbInstance.repaintEverything();
            });

            // Manejar cambio de pestañas para refrescar jsPlumb
            $('#myTabs a').on('shown.bs.tab', function(e) {
                if (e.target.id === 'requisitos-tab') {
                    setTimeout(() => {
                        jsPlumbInstance.repaintEverything();
                    }, 50);
                }
            });

            // Código para filtrar la tabla
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

            // Solución para el problema del menú lateral
            // Prevenir que los enlaces del menú añadan # a la URL
            $(document).ready(function() {
                // Interceptar todos los clics en enlaces del menú lateral
                $('.sidebar-menu a').on('click', function(e) {
                    // No prevenir el comportamiento por defecto para los enlaces con href real
                    if (this.getAttribute('href') === '#') {
                        e.preventDefault();
                    }
                });

                // Eliminar el fragmento # de la URL si existe
                if (window.location.hash === '#') {
                    history.replaceState(null, document.title, window.location.pathname + window.location.search);
                }
            });

            // Asegurarse de que los enlaces del menú lateral funcionen correctamente
            // Esta función debe ejecutarse después de que el menú lateral se haya cargado
            function fixMenuLinks() {
                // Buscar todos los enlaces del menú lateral
                const menuLinks = document.querySelectorAll('.sidebar-menu a, .treeview-menu a');

                menuLinks.forEach(link => {
                    // Si el enlace tiene un href válido (no #), mantenerlo
                    if (link.getAttribute('href') && link.getAttribute('href') !== '#') {
                        // Asegurarse de que el enlace funcione normalmente
                        link.addEventListener('click', function(e) {
                            // No hacer nada especial, dejar que el enlace funcione normalmente
                        });
                    } else {
                        // Para enlaces con href="#", prevenir el comportamiento por defecto
                        link.addEventListener('click', function(e) {
                            e.preventDefault();

                            // Si tiene un data-target, activar ese elemento
                            const target = this.getAttribute('data-target');
                            if (target) {
                                $(target).collapse('toggle');
                            }

                            // Si tiene una clase treeview, toggle la clase active
                            const parent = this.parentElement;
                            if (parent && parent.classList.contains('treeview')) {
                                parent.classList.toggle('active');
                            }
                        });
                    }
                });
            }

            // Ejecutar la función después de que el DOM esté completamente cargado
            // y después de cualquier script que pueda estar configurando el menú
            setTimeout(fixMenuLinks, 500);
        });
    </script>
</body>

</html>