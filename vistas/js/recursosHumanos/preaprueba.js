$(document).ready(function () {
    //preapruebaSelect();
    cargarDatosTabla();

    $(document).ready(function () {
        $('#btnPreAprobar').click(function () {
            if ($("#motivoModificar").val() != "" &&
                $("#divisionModificar").val() != "" &&
                $("#cargoModificar").val() != "" &&
                $("#razonModificar").val() != "" &&
                $("#centrocostoModificar").val() != "-" &&
                $("#cantidadModificar").val() != "-" &&
                $("#equipoModificar").val() != "" &&
                $("#licenciaModificar").val() != "-" &&
                $("#tipoturnoModificar").val() != "-" &&
                $("#tipocontratoModificar").val() != "-" &&
                $("#fecharequeridaModificar").val() != "-" &&
                $("#remuneracionModificar").val() != "-" &&
                $("#requisitoseleccionModificar").val() != "-" &&
                $("#observacionModificar").val() != "-" &&
                $("#preapruebaModificar").val() != "-" &&
                $("#apruebaModificar").val() != "-" &&
                $("#comentarioModificar").val() != "-" &&
                $("#preapruebaComentarioMod").val() != "-") {

                $("#fechaPreaprobacion").val(new Date().toISOString().slice(0, 19).replace('T', ' ')); // Fecha actual del sistema

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
    });

    $("#btnPreRechazar").click(function () {
        var id_registro = $(this).data("id")

        valor = $("#idModificar").val();

        if ($("#motivoModificar").val() != "" &&
            $("#divisionModificar").val() != "" &&
            $("#cargoModificar").val() != "" &&
            $("#empresaModificar").val() != "" &&
            $("#centroDecostoModificar").val() != "-" &&
            $("#cantidadModificar").val() != "" &&
            $("#equipoModificar").val() != "" &&
            $("#licenciaModificar").val() != "-" &&
            $("#tipoturnoModificar").val() != "-" &&
            $("#tipocontratoModificar").val() != "-" &&
            $("#fecharequeridaModificar").val() != "" &&
            $("#remuneracionModificar").val() != "" &&
            $("#preapruebaComentarioMod").val() != "" &&
            $("#apruebaComentarioMod").val() != "") {

            $("#fechaAprobacion").val(new Date().toISOString().slice(0, 19).replace('T', ' '));

            rechazar();
        } else {
            swal({
                type: "error",
                title: "Favor completar debidamente los campos requeridos.",
                showConfirmButton: true,
                confirmButtonText: "Aceptar"
            });
        }
    })

});

function rechazar() {
    if (!valor) {
        console.error("Error: ID de solicitud no definido");
        swal({
            type: "error",
            title: "Error al procesar la solicitud. ID no definido.",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    var params = {
        "id": valor
    };

    $.ajax({
        url: "../api_adm_nortrans/preaprueba/funRechazar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: "application/json",
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: "Registro rechazado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            }

            if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar el rechazo",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error AJAX:", textStatus, errorThrown);
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar el rechazo",
            text: "Detalles: " + textStatus,
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}

function cargarDatosTabla() {
    $("#tabla tbody").empty();
    var fila = "";
    var idUsuario = $("#idUsuario").val();
    var params = {
        "id": idUsuario
    };
    $.ajax({
        url: "../api_adm_nortrans/preaprueba/funListarPreAprueba.php",
        method: "POST",
        data: JSON.stringify(params),
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: (response) => {
            if (response && response.length > 0) {
                for (var i in response) {
                    fila =
                        fila +
                        "<tr><td>" +
                        (Number.parseInt(i) + 1) +
                        "</td>" +
                        "<td>" +
                        "<center>" +

                        '<div class="btn-group" style="align-items: center; justify-content: center; display:flex;">' +
                        '<button title="Seleccionar" class="btn btn-primary btnSeleccionar" id="' + response[i].idcontratacion + '" data-toggle="modal" data-target="#modalVermas">Seleccionar</button>' +
                        "</div>" +

                        "</center>" +
                        "</td>" +
                        "<td>" +
                        response[i].idcontratacion +
                        "</td>" +
                        "<td>" +
                        response[i].division +
                        "</td>" +
                        "<td>" +
                        response[i].empresa +
                        "</td>" +
                        "<td>" +
                        response[i].cargo +
                        "</td>" +
                        "<td>" +
                        response[i].centro_de_costo +
                        "</td>" +
                        "<td>" +
                        response[i].pre_aprueba +
                        "</td>" +
                        "</tr>";
                }
                $("#tabla tbody").append(fila);

                $(".btnSeleccionar").click(function () {
                    obtenerDatosParaVerMasPreprueba(this.id);
                });
            } else {
                $("#tabla tbody").append(
                    '<tr><td colspan="7" class="text-center">No hay solicitudes pendientes por pre-aprobar</td></tr>'
                );
            }
        },
    });
}


function obtenerDatosParaModificar(valor) {

    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idModificar").val(response[i].idcontratacion);
                cargoModificar(response[i].cargo);
                empresaModificar(response[i].empresa);
                CentroDeCostoModificar(response[i].CentroDeCosto);
                equipoModificar(response[i].tipoBus);
                turnoModificar(response[i].turnos_laborales);
                CentroDeCostoModificarCargaInicial(response[i].centro_de_costo, response[i].empresa);
                apruebaModificar(response[i].aprueba);
                preapruebaModificar(response[i].preaprueba);


                $('#motivoModificar option[value="' + response[i].motivo + '"]').attr("selected", true);
                $('#requisitoseleccionModificar option[value="' + response[i].requisito_seleccion + '"]').attr("selected", true);
                $('#divisionModificar option[value="' + response[i].division + '"]').attr("selected", true);
                $("#cantidadModificar").val(response[i].cantidad_solicitada);
                $("#fecharequeridaModificar").val(response[i].fecha_requerida);
                $("#fechaterminoModificar").val(response[i].fecha_termino);
                $("#remuneracionModificar").val(response[i].remuneracion);
                $("#comentarioModificar").val(response[i].comentario_general);

                $("#observacionEntrevistaPsicolaboralMod").val(response[i].observacionEntrevistaPsicolaboral);
                $("#observacionEntrevistaTecnicaMod").val(response[i].observacionEntrevistaTecnica);
                $("#observacionPruebaConduccionMod").val(response[i].observacionPruebaConduccion);

                //--------------------------
                $('#licenciaModificar option[value="' + response[i].licenciaDeConducir + '"]').attr("selected", true);
                $('#tipocontratoModificar option[value="' + response[i].tipo_contrato + '"]').attr("selected", true);


                $("#preapruebaComentarioMod").val(response[i].observacion_pre_aprobacion);

            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

function modificarDatos() {
    var idContratacion = $("#idModificar").val();

    if (!idContratacion) {
        swal({
            type: "error",
            title: "Error: ID de contratación no encontrado",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
        return;
    }

    var params = {
        "idcontratacion": idContratacion,
        "observacion_pre_aprobacion": $("#comentarioPreapruebaVer").val(),
        "fecha_pre_aperobacion": $("#fechaPreAprobacion").val(),
    };

    $.ajax({
        url: "../api_adm_nortrans/preaprueba/funAprobar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: "Registro modificado con éxito",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then((value) => {
                    location.reload();
                });
            } else if (response['mensaje'] === "nok") {
                swal({
                    type: "error",
                    title: "Ha ocurrido un error al procesar la modificación",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            } else if (response['mensaje'] === "repetido") {
                swal({
                    type: "error",
                    title: "El registro que quiere modificar ya existe en otro registro en la base de datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}

function obtenerDatosParaVerMasPreprueba(valor) {

    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idModificar").val(valor);
                $("#divisionVer").val(response[i].division);
                cargoVerMas(response[i].cargo); //listo
                empresaVerMas(response[i].empresa); //listo
                CentroDeCostoVerMas(response[i].CentroDeCosto); // listo
                equipoVerMas(response[i].tipoBus); // listo
                turnoVerMas(response[i].turnos_laborales); //listo
                CentroDeCostoVerMas(response[i].centro_de_costo, response[i].empresa); //listo
                apruebaVerMas(response[i].aprueba); //verificar
                preapruebaVerMas(response[i].pre_aprueba); //verificar


                $('#motivoVer option[value="' + response[i].motivo + '"]').attr("selected", true); //listo
                $('#divisionVer option[value="' + response[i].division + '"]').attr("selected", true); //verificar
                $("#cantidadVer").val(response[i].cantidad_solicitada);
                $("#fecharequeridaVer").val(response[i].fecha_requerida);
                $("#fechaterminoVerMas").val(response[i].fecha_termino);
                $("#remuneracionVer").val(response[i].remuneracion);
                $("#comentarioVer").val(response[i].comentario_general);

                $("#observacionEntrevistaPsicolaboralVer").val(response[i].observacionEntrevistaPsicolaboral);
                $("#observacionEntrevistaTecnicaVer").val(response[i].observacionEntrevistaTecnica);
                $("#observacionPruebaConduccionVer").val(response[i].observacionPruebaConduccion);

                //--------------------------
                $('#licenciaVer option[value="' + response[i].licenciaDeConducir + '"]').attr("selected", true);
                $('#tipocontratoVer option[value="' + response[i].tipo_documento + '"]').attr("selected", true);

                $("#comentarioPreapruebaVer").val(response[i].observacion_pre_aprobacion);

            }

        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

// INCIO CARGA SELECT "MODIFICAR"
function cargoModificar(id) {
    $('#cargoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#cargoModificar').append(fila);
            $("#cargoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function equipoModificar(id) {
    $('#equipoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#equipoModificar').append(fila);
            $("#equipoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function turnoModificar(id) {
    $('#tipoturnoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/turnoLaboral/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoturnoModificar').append(fila);
            $("#tipoturnoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function empresaModificar(id) {
    $('#empresaModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#empresaModificar').append(fila);
            $("#empresaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function centroCostoModificar(id) {
    $('#centroCostoModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroCosto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroCostoModificar').append(fila);
            $("#centroCostoModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function apruebaModificar(id) {
    $('#apruebaModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#apruebaModificar').append(fila);
            $("#apruebaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function preapruebaModificar(id) {
    $('#preapruebaModificar').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#preapruebaModificar').append(fila);
            $("#preapruebaModificar option[value='" + id + "']").attr("selected", true);
        }
    });
}

function CentroDeCostoModificarCargaInicial(id, empresa) {
    // alert(id);
    $('#centroDecostoModificar').empty();
    var params = {
        "empresa": empresa
    };
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroDecostoModificar').append(fila);
            $("#centroDecostoModificar option[value='" + id + "']").attr("selected", true);
        }
    });

}

function CentroDeCostoModificar() {
    $('#centroDecostoModificar').empty();
    var params = {
        "empresa": $("#empresaModificar").val()
    };
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroDecostoModificar').append(fila);
            //  $("#centroModificar option[value='"+ id +"']").attr("selected",true);
        }
    });

}
// FIN CARGA SELECT "MODIFICAR"

function obtenerDatosParaVerMas(valor) {

    var params = {
        "id": valor
    };
    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#divisionVer").val(response[i].division);
                cargoVerMas(response[i].cargo);
                empresaVerMas(response[i].empresa);
                CentroDeCostoVerMas(response[i].CentroDeCosto);
                equipoVerMas(response[i].tipoBus);
                turnoVerMas(response[i].turnos_laborales);
                CentroDeCostoVerMas(response[i].centro_de_costo, response[i].empresa);
                apruebaVerMas(response[i].aprueba);
                preapruebaVerMas(response[i].pre_aprueba);

                $('#motivoVer option[value="' + response[i].motivo + '"]').attr("selected", true);
                $('#divisionVer option[value="' + response[i].division + '"]').attr("selected", true);
                $("#cantidadVer").val(response[i].cantidad_solicitada);
                $("#fecharequeridaVer").val(response[i].fecha_requerida);
                $("#fechaterminoVerMas").val(response[i].fecha_termino);
                $("#remuneracionVer").val(response[i].remuneracion);
                $("#comentarioVer").val(response[i].comentario_general);
                $("#observacionEntrevistaPsicolaboralVer").val(response[i].observacionEntrevistaPsicolaboral);
                $("#observacionEntrevistaTecnicaVer").val(response[i].observacionEntrevistaTecnica);
                $("#observacionPruebaConduccionVer").val(response[i].observacionPruebaConduccion);
                $('#licenciaVer option[value="' + response[i].licenciaDeConducir + '"]').attr("selected", true);
                $('#tipocontratoVer option[value="' + response[i].tipo_documento + '"]').attr("selected", true);
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });

}

// INCIO CARGA SELECT "VER"
function cargoVerMas(id) {
    $('#cargoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/cargo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#cargoVer').append(fila);
            $("#cargoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function equipoVerMas(id) {
    $('#equipoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/tipoequipo/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#equipoVer').append(fila);
            $("#equipoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function turnoVerMas(id) {
    $('#tipoturnoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/turnoLaboral/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#tipoturnoVer').append(fila);
            $("#tipoturnoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function apruebaVerMas(id) {
    $('#apruebaVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#apruebaVer').append(fila);
            $("#apruebaVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function preapruebaVerMas(id) {
    $('#preapruebaVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/usuario/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].idusuario + '">' + response[i].nombre + '</option>';
            }
            $('#preapruebaVer').append(fila);
            $("#preapruebaVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function empresaVerMas(id) {
    $('#razonVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/empresa/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#razonVer').append(fila);
            $("#razonVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function centroCostoVerMas(id) {
    $('#centroCostoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centroCostoVer').append(fila);
            $("#centroCostoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}

function CentroDeCostoVerMas(id) {
    $('#centrocostoVer').empty();
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/centroDeCosto/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila = fila + '<option value = "' + response[i].id + '">' + response[i].descripcion + '</option>';
            }
            $('#centrocostoVer').append(fila);
            $("#centrocostoVer option[value='" + id + "']").attr("selected", true);
        }
    });
}
// FIN CARGA SELECT "VER"