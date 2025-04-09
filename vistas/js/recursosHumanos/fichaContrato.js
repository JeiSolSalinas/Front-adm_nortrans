$(document).ready(() => {
    cargarDatosSolicitudes()

    cargarFichaContrato()

    empresaAgregar()

    $('#btnEditar').click(function () {
        if ($("#numeroFichaSelec").val() != "" &&
            $("#idSolicitudSelec").val() != "" &&
            $("#EmpresaSelec").val() != "" &&
            $("#divisionSelec").val() != "" &&
            $("#CargoSelec").val() != "-" &&
            $("#tipocontratoSelec").val() != "-" &&
            $("#tipoTurnoSelec").val() != "" &&
            $("#empresaModSelec").val() != "-" &&
            $("#fechainicioSelec").val() != "-" &&
            $("#sueldoLiquidoSelec").val() != "-") {
            modificarDatos();
        } else {
            swal({
                type: "error",
                title: "Favor completar debidamente los campos requeridos.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    });

})

function cargarDatosSolicitudes() {
    $("#listaSolicitud tbody").empty()
    var fila = ""
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funListarSolicitudes.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                fila =
                    fila +
                    "<tr><td>" +
                    response[i].idcontratacion +
                    "</td>" +
                    "<td>" +
                    response[i].empresa +
                    "</td>" +
                    "<td>" +
                    response[i].fecha_requerida +
                    "</td>" +
                    "<td>" +
                    response[i].usuario +
                    "</td>" +
                    "<td>" +
                    response[i].division +
                    "</td>" +
                    "<td>" +
                    response[i].cargo +
                    "</td>" +
                    "<td>" +
                    response[i].cantidad_solicitada +
                    "</td>" +
                    "<td>" +
                    response[i].cantidad_contratada +
                    "</td>" +
                    "<td>" +
                    '<button title="Editar" class="btn btn-warning btnEditar" id="' +
                    response[i].idcontratacion +
                    '"> Seleccionar</button>' +
                    "</td>" +
                    "<td>" +
                    '<button title="Imprimir" class="btn btn-info btnImprimir" data-id="' +
                    response[i].idcontratacion +
                    '">' +
                    '<i class="fa fa-print"></i></button>' +
                    "</td>" +
                    "</tr>"
            }
            $("#listaSolicitud tbody").append(fila)

            $(".btnImprimir").click(function () {
                var id = $(this).data("id")
                funcionImprimir(id)
            })

            $(".btnEditar").click(function () {
                obtenerDatosParaModificar(this.id)
            })
        },
    }).fail(() => {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
        })
    })
}


function modificarDatos() {
    var datos = new FormData()
    datos.append("idficha_contrato", $("#numeroFichaSelec").val())
    datos.append("contratacion", $("#idSolicitudSelec").val())
    datos.append("empresa", $("#EmpresaSelec").val())
    datos.append("division", $("#divisionSelec").val())
    datos.append("cargo", $("#CargoSelec").val())
    datos.append("tipo_contrato", $("#tipocontratoSelec").val())
    datos.append("turnos_laborales", $("#tipoTurnoSelec").val())
    datos.append("fecha_inicio", $("#fechainicioSelec").val())
    datos.append("sueldo_liquido", $("#sueldoLiquidoSelec").val())

    $.ajax({
        url: "../api_adm_nortrans/fichaContrato/funModificar.php",
        method: "POST",
        cache: false,
        data: datos,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            if (response["mensaje"] === "ok") {
                swal({
                    type: "success",
                    title: "Registro modificado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                }).then((value) => {
                    location.reload()
                })
            } else if (response["mensaje"] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la modificación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                })
            } else if (response["mensaje"] === "repetido") {
                swal({
                    type: "error",
                    title: "El registro que quiere modificar ya existe en otro registro en la base de datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                })
            }
        },
    }).fail(() => {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
        })
    })
}

function obtenerDatosParaModificar(valor) {
    var params = {
        "id": valor
    }
    $.ajax({
        url: "../api_adm_nortrans/fichaContrato/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                $("#idModificar").val(response[i].idcontratacion)
                empresaModificar(response[i].empresa)

                $("#numeroFichaSelec").val(response[i].idficha_contrato)
                $("#idSolicitudSelec").val(response[i].contratacion)
                $('#EmpresaSelec option[value="' + response[i].empresa + '"]').attr("selected", true)
                $('#divisionSelec option[value="' + response[i].division + '"]').attr("selected", true)
                $('#CargoSelec option[value="' + response[i].cargo + '"]').attr("selected", true)
                $('#tipocontratoSelec option[value="' + response[i].tipo_contrato + '"]').attr("selected", true)
                $('#tipoTurnoSelec option[value="' + response[i].turnos_laborales + '"]').attr("selected", true)
                $("#fechainicioSelec").val(response[i].fecha_inicio)
                $("#sueldoLiquidoSelec").val(response[i].sueldo_liquido)
            }

            $("#modalEditar").modal("show")
        },
    }).fail(() => {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
        })
    })
}


function funcionImprimir(id) {
    var contenido = ""
    var fila = $('button[data-id="' + id + '"]').closest("tr")

    fila.find("td").each(function () {
        contenido += $(this).text() + "\n"
    })

    var ventanaImpresion = window.open("", "", "height=600,width=800")
    ventanaImpresion.document.write("<pre>" + contenido + "</pre>")
    ventanaImpresion.document.close()
    ventanaImpresion.print()
}

function empresaAgregar() {
    $("#empresaAgregar").empty()
    $("#empresaAgregar").append('<option value ="-">Seleccionar...</opction>')
    var listaEmpresa = ""
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                listaEmpresa =
                    listaEmpresa + '<option value = "' + response[i].id + '">' + response[i].descripcion + "</option>"
            }
            $("#empresaAgregar").append(listaEmpresa)
        },
    })
}

function cargarFichaContrato() {
    $("#fichaContrato tbody").empty()
    var fila = ""

    $("#fichaContrato").off("click", ".btnTerminar")

    $.ajax({
        url: "../api_adm_nortrans/fichaContrato/funListarContratado.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                fila =
                    fila +
                    "<tr><td>" +
                    response[i].idcontratacion +
                    "</td>" +
                    "<td>" +
                    response[i].empresa +
                    "</td>" +
                    "<td>" +
                    response[i].usuario +
                    "</td>" +
                    "<td>" +
                    response[i].fecha_inicio_laboral +
                    "</td>" +
                    "<td>" +
                    response[i].tipo_contrato +
                    "</td>" +
                    "<td>" +
                    response[i].turnos_laborales +
                    "</td>" +
                    "</td>" +
                    "<td>" +
                    '<button type="button" title="Editar" class="btn btn-warning btnEditar" data-toggle="modal" data-target="#modalEditar" id="' +
                    response[i].idcontratacion +
                    '"> Editar</button>' +
                    "</td>" +
                    "<td>" +
                    '<button title="Terminar" class="btn btn-danger btnTerminar" id="' +
                    response[i].idcontratacion +
                    '">Terminar</button>' +
                    "</td>" +
                    "</tr>"
            }
            $("#fichaContrato tbody").append(fila)

            $(".btnTerminar").click(function () {
                configurarEventoTerminar(this.id)
            })

            $(".btnEditar").click(function () {
                obtenerDatosParaModificar(this.id)
            })
        },
    }).fail(() => {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
        })
    })
}

function configurarEventoTerminar(id) {
    $("#fichaContrato").on("click", ".btnTerminar", () => {
        var idContrato = id
        swal({
            title: "¿Está seguro?",
            text: "¿Desea terminar este contrato? Esta acción cambiará su estado a inactivo.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, terminar",
            cancelButtonText: "Cancelar",
        }).then((result) => {
            if (result.value) {
                inactivarContrato(idContrato)
            }
        })
    })
}

function inactivarContrato(idcontratacion) {

    var datos = {
        idcontratacion: idcontratacion,
    }

    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funCambiarEstadoContrato.php",
        method: "POST",
        data: JSON.stringify(datos),
        contentType: "application/json",
        dataType: "json",
        success: (response) => {

            if (response.status === "success") {
                swal({
                    type: "success",
                    title: "Contrato Finalizado",
                    text: "El contrato ha sido Finalizado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                }).then(() => {
                    cargarFichaContrato()
                })
            } else {
                swal({
                    type: "error",
                    title: "Error",
                    text: "No se pudo finalizar el contrato: " + response.message,
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                })
            }
        },
    }).fail((jqXHR, textStatus, errorThrown) => {
        console.error("Error AJAX:", textStatus, errorThrown)

        swal({
            type: "error",
            title: "Error de conexión",
            text: "No se pudo conectar con el servidor",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
        })
    })
}

function empresaModificar(id) {
    $("#empresaModSelec").empty()
    var fila = ""
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + "</option>"
            }
            $("#empresaModSelec").append(fila)
            $("#empresaModSelec option[value='" + id + "']").attr("selected", true)
        },
    })
}

