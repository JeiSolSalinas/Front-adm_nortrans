$(document).ready(function (){

  cargarDatosTabla();


  $('#btnGuardar').click(function() {
    if($("#seleccionEmpresaAgregar").val() != "-"){
      agregarDatos();
    }else{
      swal({
        type: "error",
        title: "Debe seleccionar una empresa válida",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
      
  });

  $('#btnModificar').click(function() {
      modificarDatos();
  });

  $('#btnAgregarRegistro').click(function() {
    cargarEmpresaAgregar();
  });

  $('#filtradoDinamico').keyup(function (){
    
    var busqueda = document.getElementById('filtradoDinamico');
    var table = document.getElementById("tabla").tBodies[0];
    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=0;
      while(row = table.rows[r++])  
      {
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
          row.style.display = null;
        else
          row.style.display = 'none';
      }
    }
    busqueda.addEventListener('keyup', buscaTabla);

  });
  

});  


function cargarDatosTabla(){
      $("#tabla tbody").empty();
      var fila = "";
      $.ajax({
          url:"../api_adm_nortrans/centroDeCosto/funListar.php",
          method:"GET",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
             for (var i in response){
                  fila = fila + '<tr><td>'+(parseInt(i)+1)+'</td><td>'+response[i].empresa+'</td>'
                  +'<td>'+response[i].descripcion+'</td>'+
                    '<td>'+
                      '<center>'+ 
                          '<div class="btn-group" style="display: flex; justify-content: center;">'+                         
                                '<button title="Modificar" class="btn btn-warning btnModificar" id="'+response[i].id+'" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>'+

                                '<button title="Eliminar" class="btn btn-danger btnEliminar" id="'+response[i].id+'"><i class="fa fa-times"></i></button>'+                      
                          '</div>'+
                      '</center>'+
                    '</td>'+

                  +'</tr>';             
              }
              $('#tabla').append(fila);

              $('.btnModificar').click(function() {
                  obtenerDatosParaModificar(this.id); 
              });

              $('.btnEliminar').click(function() {
                  var id_registro = this.id;
                  swal({
                    title: '¿Está seguro de anular el registro?',
                    text: "¡Si no lo está puede cancelar la accíón!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      cancelButtonText: 'Cancelar',
                      confirmButtonText: 'Si, anular registro'
                  }).then(function(result){
                      if(result.value){
                          eliminarDatos(id_registro); 
                      }                        
                  });                    
              });

          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al cargar la lista",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function agregarDatos(){
      var params = {
                        "descripcion": $("#descripcionAgregar").val(),
                        "empresa": $("#seleccionEmpresaAgregar").val()
                   };
      $.ajax({
          url:"../api_adm_nortrans/centroDeCosto/funAgregar.php",
          method:"POST",
          cache: false,
          data: JSON.stringify(params),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              if(response['mensaje'] === "ok"){
                swal({
                 type: "success",
                 title: "Registro cargado con exito",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la carga",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "registro_existente"){
                swal({
                  type: "error",
                  title: "El registro que quiere cargar ya existe en la base de datos",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }
          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la carga",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function obtenerDatosParaModificar(valor){
      cargarEmpresaModificar();
      var params = {
                        "id": valor
                   };
      $.ajax({
          url:"../api_adm_nortrans/centroDeCosto/funDatosParaModificar.php",
          method:"POST",
          cache: false,
          data: JSON.stringify(params),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              for (var i in response){
                  $("#descripcionModificar").val(response[i].descripcion);
                  $("#idModificar").val(response[i].id);
                  $("#seleccionEmpresaModificar option[value="+ response[i].idempresa +"]").attr("selected",true);
              }  

          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos solicitados",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function modificarDatos(){
      var params = {
                        "descripcion": $("#descripcionModificar").val(),
                        "empresa": $("#seleccionEmpresaModificar").val(),
                        "id": $("#idModificar").val()
                   };
      $.ajax({
          url:"../api_adm_nortrans/centroDeCosto/funModificar.php",
          method:"POST",
          cache: false,
          data: JSON.stringify(params),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              if(response['mensaje'] === "ok"){
                swal({
                 type: "success",
                 title: "Registro modificado con exito",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la modificación",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "repetido"){
                swal({
                  type: "error",
                  title: "El registro que quiere modificar ya existe en otro registro en la base de datos",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }
          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function eliminarDatos(valor){
      var params = {
                        "id": valor
                   };
      $.ajax({
          url:"../api_adm_nortrans/centroDeCosto/funEliminar.php",
          method:"POST",
          cache: false,
          data: JSON.stringify(params),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              if(response['mensaje'] === "ok"){
                swal({
                 type: "success",
                 title: "Registro eliminado con exito",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la eliminación",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la eliminación",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function cargarEmpresaAgregar(){
  $('#seleccionEmpresaAgregar').empty();
  $('#seleccionEmpresaAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/empresa/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#seleccionEmpresaAgregar').append(listaEmpresa);
      }        
  });

}

function cargarEmpresaModificar(){
  $('#seleccionEmpresaModificar').empty();
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/empresa/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#seleccionEmpresaModificar').append(listaEmpresa);
      }        
  });

}
