$(document).ready(function (){

  cargarDatosTabla(); 

  $('#btnNuevo').click(function() {
    nacionalidadAgregar();
    comunaAgregar();
    afpAgregar();
    saludAgregar();
    turnoAgregar();
    empresaAgregar();
  });

  $('#empresaAgregar').change(function() {
    CentroDeCostoAgregar();
  });

  $('#empresaModificar').change(function() {
    CentroDeCostoModificar();
  });


  
  $('#btnGuardar').click(function() {
      if($("#rutAgregar").val() != "" && $("#rutAgregar").val() != "0" &&
         $("#fechaNacimientoAgregar").val() != "" &&
         $("#nombreAgregar").val() != "" &&
         $("#apellidoAgregar").val() != "" &&
         $("#nacionalidadAgregar").val() != "-" &&
         $("#comunaAgregar").val() != "-" &&
         $("#emailEmpresaAgregar").val() != "" &&
         $("#afpAgregar").val() != "-" &&
         $("#saludAgregar").val() != "-" &&
         $("#empresaAgregar").val() != "-" &&
         $("#centroAgregar").val() != "-" &&
         $("#turnoAgregar").val() != "-"){
          agregarDatos();
      }else{
        swal({
          type: "error",
          title: "Favor completar debidamente los campos requeridos.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }
      /*if( $("#imagenAgregar")[0].files[0] != undefined ){
        alert("hay archivo");
      }else{
        alert("no hay archivo");
      }*/
  });

  $('#btnModificar').click(function() {
      if($("#rutModificar").val() != "" && $("#rutModificar").val() != "0" &&
         $("#fechaNacimientoModificar").val() != "" &&
         $("#nombreModificar").val() != "" &&
         $("#apellidoModificar").val() != "" &&
         $("#nacionalidadModificar").val() != "-" &&
         $("#comunaModificar").val() != "-" &&
         $("#emailEmpresaModificar").val() != "" &&
         $("#afpModificar").val() != "-" &&
         $("#saludModificar").val() != "-" &&
         $("#empresaModificar").val() != "-" &&
         $("#centroModificar").val() != "-" &&
         $("#turnoModificar").val() != "-"){
          modificarDatos();
      }else{
        swal({
          type: "error",
          title: "Favor completar debidamente los campos requeridos.",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }
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
          url:"../api_adm_nortrans/fichaEmpleado/funListar.php",
          method:"GET",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
             for (var i in response){
                  fila = fila + '<tr><td>'+(parseInt(i)+1)+'</td>'+
                  
                    '<td>'+
                      '<center>'+ 
                          '<div class="btn-group" style ="align-items: center; justify-content: center; display:flex;">'+     
                                '<button title="Ver mas" class="btn btn-info btnverMas" id="'+response[i].id+'" data-toggle="modal" data-target="#modalVermas"><i class="fa fa-eye"></i></button>'+   

                                '<button title="Modificar" class="btn btn-warning btnModificar" id="'+response[i].id+'" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>'+

                                '<button title="Eliminar" class="btn btn-danger btnEliminar" id="'+response[i].id+'"><i class="fa fa-times"></i></button>'+                      
                          '</div>'+
                      '</center>'+
                    '</td>'+
                    '<td>'+'<img class="img-thumbnail" src="'+response[i].imagen+'">'+'</td>'+
                    '<td>'+response[i].rut+'</td>'+
                    '<td>'+response[i].nombre+'</td>'+
                    '<td>'+response[i].telefono_empresa+'</td>'+
                    '<td>'+response[i].email_empresa+'</td>'

                  +'</tr>';             
              }
              $('#tabla').append(fila);

              $('.btnModificar').click(function() {
                  obtenerDatosParaModificar(this.id); 
              });

              $('.btnverMas').click(function() {
                obtenerDatosParaVerMas(this.id); 
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
                      confirmButtonText: 'Si, anular registro!'
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
            title: "Ha ocurrido un error al cargar la lista!!!",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function agregarDatos(){
      var datos = new FormData();
     // var idusuario = $("#idUsuario").val();
          datos.append("rut", $("#rutAgregar").val());
          datos.append("fechaNacimiento", $("#fechaNacimientoAgregar").val());
          datos.append("genero", $("#generoAgregar").val());
          datos.append("nombre", $("#nombreAgregar").val());
          datos.append("apellido", $("#apellidoAgregar").val());
          datos.append("nacionalidad", $("#nacionalidadAgregar").val());
          datos.append("estadoCivil", $("#estadoCivilAgregar").val());
          datos.append("comuna", $("#comunaAgregar").val());
          datos.append("direccion", $("#direccionAgregar").val());
          datos.append("telefonoEmpresa", $("#telefonoEmpresaAgregar").val());
          datos.append("emailEmpresa", $("#emailEmpresaAgregar").val());
          datos.append("telefonoPropio", $("#telefonoPropioAgregar").val());
          datos.append("emailPersonal", $("#emailPersonalAgregar").val());
          datos.append("afp", $("#afpAgregar").val());
          datos.append("salud", $("#saludAgregar").val());
          datos.append("empresa", $("#empresaAgregar").val());
          datos.append("centro", $("#centroAgregar").val());
          datos.append("turno", $("#turnoAgregar").val());
          datos.append("imagen", $("#imagenAgregar")[0].files[0] );           
      $.ajax({
          url:"../api_adm_nortrans/fichaEmpleado/funAgregar.php",
          method:"POST",
          cache: false,
          data: datos,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              if(response['mensaje'] === "ok"){
                swal({
                 type: "success",
                 title: "Registro cargado con exito!!!",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la carga!!!",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "registro_existente"){
                swal({
                  type: "error",
                  title: "El registro que quiere cargar ya existe en la base de datos!!!",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }
          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la carga!!!",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function obtenerDatosParaModificar(valor){
            
      var params = {
                        "id": valor
                   };
      $.ajax({
          url:"../api_adm_nortrans/fichaEmpleado/funDatosParaModificar.php",
          method:"POST",
          cache: false,
          data: JSON.stringify(params),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              for (var i in response){                
                  $("#idModificar").val(response[i].id);
                  nacionalidadModificar(response[i].nacionalidad);
                  comunaModificar(response[i].comuna );
                  afpModificar(response[i].afp);
                  saludModificar(response[i].salud);
                  turnoModificar(response[i].turnos_laborales);
                  empresaModificar(response[i].empresa);
                  CentroDeCostoModificarCargaInicial(response[i].centro_de_costo,response[i].empresa);
                 
                  $("#rutModificar").val(response[i].rut);
                  $("#fechaNacimientoModificar").val(response[i].fecha_nacimiento);
                  $('#generoModificar option[value="'+ response[i].genero +'"]').attr("selected",true);
                  $("#nombreModificar").val(response[i].nombre);
                  $("#apellidoModificar").val(response[i].apellido);
                  $('#estadoCivilModificar option[value="'+ response[i].estado_civil +'"]').attr("selected",true);
                  $("#direccionModificar").val(response[i].direccion);
                  $("#telefonoEmpresaModificar").val(response[i].telefono_empresa);
                  $("#emailEmpresaModificar").val(response[i].email_empresa);
                  $("#telefonoPropioModificar").val(response[i].telefono_propio);
                  $("#emailPersonalModificar").val(response[i].email);

                  $("#nuevaImagenModificar").html('<img class="img-thumbnail" src="'+response[i].imagen+'"  >');
                  
              }  

          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al traer los datos oslicitados!!!",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}

function obtenerDatosParaVerMas(valor){
    
  var params = {
                    "id": valor
               };
  $.ajax({
      url:"../api_adm_nortrans/fichaEmpleado/funDatosParaModificar.php",
      method:"POST",
      cache: false,
      data: JSON.stringify(params),
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
          for (var i in response){                
              $("#rutVer").val(response[i].rut);
                  nacionalidadVerMas(response[i].nacionalidad);
                  comunaVerMas(response[i].comuna );
                  afpVerMas(response[i].afp);
                  saludVerMas(response[i].salud);
                  turnoVerMas(response[i].turnos_laborales);
                  empresaVerMas(response[i].empresa);
                  CentroDeCostoModificarCargaInicial(response[i].centro_de_costo,response[i].empresa);
                  CentroDeCostoVerMas(response[i].centro_de_costo,response[i].empresa);
              $("#fechaNacimientoVer").val(response[i].fecha_nacimiento);
              $('#generoVer option[value="'+ response[i].genero +'"]').attr("selected",true);
              $("#nombreVer").val(response[i].nombre);
              $("#apellidoVer").val(response[i].apellido);
              $('#estadoCivilVer option[value="'+ response[i].estado_civil +'"]').attr("selected",true);
              $("#comunaVer option[value="+ response[i].comuna +"]").attr("selected",true);
              $("#direccionVer").val(response[i].direccion);
              $("#telefonoEmpresaVer").val(response[i].telefono_empresa);
              $("#emailEmpresaVer").val(response[i].email_empresa);
              $("#telefonoPropioVer").val(response[i].telefono_propio);
              $("#emailPersonalVer").val(response[i].email);
              $("#nuevaImagenVer").html('<img class="img-thumbnail" src="'+response[i].imagen+'"  >');
              
          }  

      }        
  }).fail( function() {
      swal({
        type: "error",
        title: "Ha ocurrido un error al traer los datos oslicitados!!!",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
  });

}

function modificarDatos(){
          var datos = new FormData();
          datos.append("id", $("#idModificar").val());
          datos.append("rut", $("#rutModificar").val());
          datos.append("fechaNacimiento", $("#fechaNacimientoModificar").val());
          datos.append("genero", $("#generoModificar").val());
          datos.append("nombre", $("#nombreModificar").val());
          datos.append("apellido", $("#apellidoModificar").val());
          datos.append("nacionalidad", $("#nacionalidadModificar").val());
          datos.append("estadoCivil", $("#estadoCivilModificar").val());
          datos.append("comuna", $("#comunaModificar").val());
          datos.append("direccion", $("#direccionModificar").val());
          datos.append("telefonoEmpresa", $("#telefonoEmpresaModificar").val());
          datos.append("emailEmpresa", $("#emailEmpresaModificar").val());
          datos.append("telefonoPropio", $("#telefonoPropioModificar").val());
          datos.append("emailPersonal", $("#emailPersonalModificar").val());
          datos.append("afp", $("#afpModificar").val());
          datos.append("salud", $("#saludModificar").val());
          datos.append("empresa", $("#empresaModificar").val());
          datos.append("centro", $("#centroModificar").val());
          datos.append("turno", $("#turnoModificar").val());
          datos.append("imagen", $("#imagenModificar")[0].files[0] );  
      $.ajax({
          url:"../api_adm_nortrans/fichaEmpleado/funModificar.php",
          method:"POST",
          cache: false,
          data: datos,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              if(response['mensaje'] === "ok"){
                swal({
                 type: "success",
                 title: "Registro modificado con exito!!!",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la modificación!!!",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "repetido"){
                swal({
                  type: "error",
                  title: "El registro que quiere modificar ya existe en otro registro en la base de datos!!!",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }
          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la modificación!!!",
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
          url:"../api_adm_nortrans/fichaEmpleado/funEliminar.php",
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
                 title: "Registro eliminado con exito!!!",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  location.reload();
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la eliminación!!!",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la eliminación!!!",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}


// INCIO CARGA SELECT "AGREGAR"
function nacionalidadAgregar(){
  $('#nacionalidadAgregar').empty();
  $('#nacionalidadAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/nacionalidad/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#nacionalidadAgregar').append(listaEmpresa);
      }        
  });
}

function comunaAgregar(){
  $('#comunaAgregar').empty();
  $('#comunaAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/comuna/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#comunaAgregar').append(listaEmpresa);
      }        
  });
}

function afpAgregar(){
  $('#afpAgregar').empty();
  $('#afpAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/afp/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#afpAgregar').append(listaEmpresa);
      }        
  });
}

function saludAgregar(){
  $('#saludAgregar').empty();
  $('#saludAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/salud/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#saludAgregar').append(listaEmpresa);
      }        
  });
}

function turnoAgregar(){
  $('#turnoAgregar').empty();
  $('#turnoAgregar').append('<option value ="-">Seleccionar...</opction>');
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/turnoLaboral/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#turnoAgregar').append(listaEmpresa);
      }        
  });
}

function empresaAgregar(){
  $('#empresaAgregar').empty();
  $('#empresaAgregar').append('<option value ="-">Seleccionar...</opction>');
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
          $('#empresaAgregar').append(listaEmpresa);
      }        
  });
}

function CentroDeCostoAgregar(){
  $('#centroAgregar').empty();
  var params = {
      "empresa": $("#empresaAgregar").val()
  };
  var listaEmpresa = "";
  $.ajax({
      url:"../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
      method:"POST",
      data: JSON.stringify(params),
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){        
          listaEmpresa = listaEmpresa + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';                
          }
          $('#centroAgregar').append(listaEmpresa);
      }        
  });
}
// FIN CARGA SELECT "AGREGAR"


// INCIO CARGA SELECT "MODIFICAR"
function nacionalidadModificar(id){
  $('#nacionalidadModificar').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/nacionalidad/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#nacionalidadModificar').append(fila);
          $("#nacionalidadModificar option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function comunaModificar(id){
  $('#comunaModificar').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/comuna/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#comunaModificar').append(fila);
          $("#comunaModificar option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function afpModificar(id){
  $('#afpModificar').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/afp/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#afpModificar').append(fila);
          $("#afpModificar option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function saludModificar(id){
  $('#saludModificar').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/salud/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#saludModificar').append(fila);
          $("#saludModificar option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function turnoModificar(id){
  $('#turnoModificar').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/turnoLaboral/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#turnoModificar').append(fila);
          $("#turnoModificar option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function empresaModificar(id){
  $('#empresaModificar').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/empresa/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#empresaModificar').append(fila);
          $("#empresaModificar option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function CentroDeCostoModificarCargaInicial(id,empresa){
  // alert(id);
   $('#centroModificar').empty();
   var params = {
         "empresa": empresa
     };
   var fila = "";
   $.ajax({
       url:"../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
       method:"POST",
       cache: false,
       data: JSON.stringify(params),
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(response) {
          for (var i in response){            
               fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
           }
           $('#centroModificar').append(fila);
          $("#centroModificar option[value='"+ id +"']").attr("selected",true);
       }        
   });
 
 }

function CentroDeCostoModificar(){
 // alert(id);
  $('#centroModificar').empty();
  var params = {
        "empresa": $("#empresaModificar").val()
    };
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
      method:"POST",
      cache: false,
      data: JSON.stringify(params),
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#centroModificar').append(fila);
        //  $("#centroModificar option[value='"+ id +"']").attr("selected",true);
      }        
  });

}

// FIN CARGA SELECT "MODIFICAR"


// INCIO CARGA SELECT "VER"
function nacionalidadVerMas(id){
  $('#nacionalidadVer').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/nacionalidad/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#nacionalidadVer').append(fila);
          $("#nacionalidadVer option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function comunaVerMas(id){
  $('#comunaVer').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/comuna/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#comunaVer').append(fila);
          $("#comunaVer option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function afpVerMas(id){
  $('#afpVer').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/afp/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#afpVer').append(fila);
          $("#afpVer option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function saludVerMas(id){
  $('#saludVer').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/salud/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#saludVer').append(fila);
          $("#saludVer option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function turnoVerMas(id){
  $('#turnoVer').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/turnoLaboral/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#turnoVer').append(fila);
          $("#turnoVer option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function empresaVerMas(id){
  $('#empresaVer').empty();
  var fila = "";
  $.ajax({
      url:"../api_adm_nortrans/empresa/funListar.php",
      method:"GET",
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(response) {
         for (var i in response){            
              fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
          }
          $('#empresaVer').append(fila);
          $("#empresaVer option[value='"+ id +"']").attr("selected",true);
      }        
  });
}

function CentroDeCostoVerMas(id,empresa){
  // alert(id);
   $('#centroVer').empty();
   var params = {
         "empresa": empresa
     };
   var fila = "";
   $.ajax({
       url:"../api_adm_nortrans/centroDeCosto/funCentrosDeCostosPorEmpresa.php",
       method:"POST",
       cache: false,
       data: JSON.stringify(params),
       contentType: false,
       processData: false,
       dataType: "json",
       success: function(response) {
          for (var i in response){            
               fila = fila + '<option value = "'+response[i].id+'">'+response[i].descripcion+'</option>';         
           }
           $('#centroVer').append(fila);
          $("#centroVer option[value='"+ id +"']").attr("selected",true);
       }        
   });
 
 }
// FIN CARGA SELECT "VER"