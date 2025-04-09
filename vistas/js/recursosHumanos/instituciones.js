$(document).ready(function () {

    cargarDatosTabla();

    $('#btnGrabarFicha').click(function () {
        agregarDatos();
    });

    $('#filtradoDinamico').keyup(function () {

        var busqueda = document.getElementById('filtradoDinamico');
        var table = document.getElementById("tabla").tBodies[0];
        buscaTabla = function () {
            texto = busqueda.value.toLowerCase();
            var r = 0;
            while (row = table.rows[r++]) {
                if (row.innerText.toLowerCase().indexOf(texto) !== -1)
                    row.style.display = null;
                else
                    row.style.display = 'none';
            }
        }
        busqueda.addEventListener('keyup', buscaTabla);

    });


});

function cargarDatosTabla() {
    $("#tabla tbody").empty(); // Limpiar la tabla antes de agregar filas
    var fila = "";
    $.ajax({
        url: "../api_adm_nortrans/instituciones/funListar.php",
        method: "GET",
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
            for (var i in response) {
                fila += '<tr>' +
                    '<td>' + response[i].idinstitucion + '</td>' +
                    '<td>' + response[i].tipo_institucion + '</td>' +
                    '<td>' + response[i].descripcion + '</td>' +
                    '<td>' + response[i].codigo_externo + '</td>' +
                    '<td>' + response[i].estado + '</td>' +
                    '<td>' +
                    '<div class="btn-group">' +
                    '<button title="Editar" class="btn btn-warning btnModificar" data-id="' + response[i].idinstitucion + '">' +
                    '<i class="fa fa-edit"></i>' +
                    '</button>' +
                    '</div>' +
                    '</td>' +
                    '</tr>';
            }
            $("#tabla tbody").append(fila);

            // Evento al hacer clic en el botón Editar
            $(".btnModificar").click(function () {
                let idInstitucion = $(this).data("id");
                cargarDatosEnInputs(idInstitucion);
            });
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}


function agregarDatos() {
    var idInstitucion = $("#idInstitucion").val();
    var url = idInstitucion ? "../api_adm_nortrans/instituciones/funActualizar.php" : "../api_adm_nortrans/instituciones/funAgregar.php";
    var mensaje = idInstitucion ? "Registro actualizado correctamente" : "Registro creado correctamente";

    var params = {
        "id": idInstitucion,
        "tipo_institucion": $("#tipoInstitucion").val(),
        "descripcion": $("#descripcion").val(),
        "codigo_externo": $("#codigoExterno").val(),
        "estado": $("#estado").val()
    };

    $.ajax({
        url: url,
        method: "POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: "application/json",
        dataType: "json",
        success: function (response) {
            if (response['mensaje'] === "ok") {
                swal({
                    type: "success",
                    title: mensaje,
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                }).then(() => {
                    location.reload();
                });
            } else {
                swal({
                    type: "error",
                    title: "Error al procesar la solicitud",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Error al comunicarse con el servidor",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}


function cargarDatosEnInputs(idInstitucion) {
    $.ajax({
        url: "../api_adm_nortrans/instituciones/funObtener.php",
        method: "GET",
        data: { id: idInstitucion },
        dataType: "json",
        success: function (response) {
            if (response) {
                $("#idInstitucion").val(response.idinstitucion);
                $("#tipoInstitucion").val(response.tipo_institucion);
                $("#descripcion").val(response.descripcion);
                $("#codigoExterno").val(response.codigo_externo);
                $("#estado").val(response.estado);
            } else {
                swal({
                    type: "error",
                    title: "No se encontraron datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                });
            }
        }
    }).fail(function () {
        swal({
            type: "error",
            title: "Error al cargar los datos",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
        });
    });
}
