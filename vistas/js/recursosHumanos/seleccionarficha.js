$(document).ready(function () {
    var id = obtenerParametroURL("id");

    if (id) {
        obtenerDatosParaModificar(id);
    }
});

function obtenerDatosParaModificar(valor) {
    var params = { "id": valor };

    $.ajax({
        url: "../api_adm_nortrans/solicitudContratacion/funDatosParaModificar.php",
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                $("#idModificar").val(response[i].idcontratacion);
                CentroDeCostoModificarCargaInicial(response[i].centro_de_costo, response[i].empresa);
                cargoModificar(response[i].cargo);
                turnoModificar(response[i].turnos_laborales);
                empresaModificar(response[i].empresa);

                $("#numeroFichaSelec").val(response[i].idcontratacion);
                $('#idSolicitudSelec').val(response[i].idcontratacion);
                $('#divisionSelec').val(response[i].division);
                $('#tipocontratoSelec').val(response[i].tipo_contrato);
                $("#fechainicioSelec").val(response[i].fecha_requerida);
                $("#sueldoLiquidoSelec").val(response[i].remuneracion);
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

function CentroDeCostoModificarCargaInicial(id, empresa) {
    $('#EmpresaSelec').empty();
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
            $('#EmpresaSelec').append(fila);
            $("#EmpresaSelec option[value='" + id + "']").attr("selected", true);
        }
    });

}

function cargoModificar(id) {
    $('#CargoSelec').empty();
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
            $('#CargoSelec').append(fila);
            $("#CargoSelec option[value='" + id + "']").attr("selected", true);
        }
    });
}

function turnoModificar(id) {
    $('#tipoTurnoSelec').empty();
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
            $('#tipoTurnoSelec').append(fila);
            $("#tipoTurnoSelec option[value='" + id + "']").attr("selected", true);
        }
    });
}

function empresaModificar(id) {
    $('#empresaSelec').empty();
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
            $('#empresaSelec').append(fila);
            $("#empresaSelec option[value='" + id + "']").attr("selected", true);
        }
    });
}


