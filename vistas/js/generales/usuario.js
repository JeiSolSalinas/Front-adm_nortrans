function number_format(amount, decimals) {
  amount += '';
  amount = parseFloat(amount.replace(/[^0-9\.]/g, ''));
  decimals = decimals || 0;
  if (isNaN(amount) || amount === 0) 
      return parseFloat(0).toFixed(decimals);
  amount = '' + amount.toFixed(decimals);
  var amount_parts = amount.split('.'),
      regexp = /(\d+)(\d{3})/;
  while (regexp.test(amount_parts[0]))
      amount_parts[0] = amount_parts[0].replace(regexp, '$1' + '.' + '$2');
  return amount_parts.join(',');
}

$(document).ready(function (){
  //***********CONTROLES DE GESTIÓN****************************
  $('.solo-numero').keyup(function (){
        this.value = (this.value + '').replace(/[^0-9]/g, '');
  });

  $('.solo-ruc').keyup(function (){
        this.value = (this.value + '').replace(/[^-0-9]/g, '');
  });

//*******************CONDICIONES PRINCIPALES*********************
  cargarDatosTabla();

  $('#btnGuardar').click(function() {
    if($("#cedulaAgregar").val() != "" && $("#nombreAgregar").val() != "" && 
       $("#nicAgregar").val() != "0" && $("#telefonoAgregar").val() != "" && 
       $("#correoAgregar").val() != ""){
          agregarDatos();
    }else{
      swal({
        type: "error",
        title: "Debe completar todos los campos obligatorios!!!",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
    }
      
  });

  $('#btnModificar').click(function() {
      if($("#cedulaModificar").val() != "" && $("#nombreModificar").val() != "" && 
       $("#nicModificar").val() != "" && $("#telefonModificar").val() != "" && 
       $("#correoModificar").val() != ""){
        modificarDatos();
      }else{
        swal({
          type: "error",
          title: "Debe completar todos los campos obligatorios",
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
      var fila = "";
      $("#tabla tbody").empty();
      $.ajax({
          url:"../api_adm_nortrans/usuario/funListar.php",
          method:"GET",
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
            
             for (var i in response){       
                  fila = fila + '<tr>'+
                  '<td>'+(parseInt(i)+1)+'</td>'+
                  '<td>'+response[i].cedula+'</td>'+
                  '<td>'+response[i].nombre+'</td>'+
                  '<td>'+response[i].nic+'</td>'+
                  '<td>'+response[i].telefono+'</td>'+
                  '<td>'+response[i].correo+'</td>'+
                  '<td>'+response[i].aprueba.toUpperCase()+'</td>'+
                  '<td>'+response[i].preAprueba.toUpperCase()+'</td>'+
                    '<td>'+
                      '<center>'+ 
                          '<div class="btn-group" style="display: flex; justify-content: center;">'+                         
                                '<button title="Modificar Usuario" class="btn btn-warning btnModificar" id="'+response[i].idusuario+'" data-toggle="modal" data-target="#modalModificar"><i class="fa fa-pencil"></i></button>'+

                                '<button title="Baja de Usuario" class="btn btn-danger btnEliminar" id="'+response[i].idusuario+'"><i class="fa fa-times"></i></button>'+

                                '<button title="Resetear Contraseña" class="btn btn-info btnResetear" id="'+response[i].idusuario+'"><i class="fa fa-key"></i></button>'+
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

            $('.btnResetear').click(function() {
              var id_registro = this.id;
              swal({
                title: '¿Está seguro de resetear la contraseña del usuario?',
                text: "¡Si no lo está puede cancelar la accíón!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  cancelButtonText: 'Cancelar',
                  confirmButtonText: 'Si, resetear contraseña'
              }).then(function(result){
                  if(result.value){
                    resetearPass(id_registro); 
                  }                        
              });                    
          });

          }        
      });

}

function eliminarDatos(valor){
  var params = {
                    "id": valor
               };
  $.ajax({
      url:"../api_adm_nortrans/usuario/funEliminar.php",
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
             title: "Registro dado de baja con éxito",
             showConfirmButton: true,
             confirmButtonText: "Aceptar"
            }).then((value) => {
              location.reload();
            });
          }

          if(response['mensaje'] === "nok"){
            swal({
              type: "error",
              title: "Ha ocurrido un error al procesar la baja",
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
            });
          }

      }        
  }).fail( function() {
      swal({
        type: "error",
        title: "Ha ocurrido un error al procesar la baja",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
  });

}

function resetearPass(valor){
  var params = {
                    "id": valor
               };
  $.ajax({
      url:"../api_adm_nortrans/usuario/funResetearPass.php",
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
             title: "Reseteo de contraseña realizado con éxito",
             showConfirmButton: true,
             confirmButtonText: "Aceptar"
            }).then((value) => {
              location.reload();
            });
          }

          if(response['mensaje'] === "nok"){
            swal({
              type: "error",
              title: "Ha ocurrido un error al procesar el reseteo de contraseña",
              showConfirmButton: true,
              confirmButtonText: "Aceptar"
            });
          }

      }        
  }).fail( function() {
      swal({
        type: "error",
        title: "Ha ocurrido un error al procesar el reseteo de contraseña",
        showConfirmButton: true,
        confirmButtonText: "Aceptar"
      });
  });

}

function agregarDatos(){
      var preAprueba = "no";
      var aprueba = "no";
      if($('#preApruebaAgregar').is(':checked') ){ preAprueba = "si"; }
      if($('#apruebaAgregar').is(':checked') ){ aprueba = "si"; }
      var params = {
                        "rol": $("#rolAgregar").val(),
                        "cedula": $("#cedulaAgregar").val(),
                        "nombre": $("#nombreAgregar").val(),
                        "nic": $("#nicAgregar").val(),
                        "telefono": $("#telefonoAgregar").val(),                        
                        "correo": $("#correoAgregar").val(),
                        "preAprueba": preAprueba,
                        "aprueba": aprueba,
                   };
      $.ajax({
        url:"../api_adm_nortrans/usuario/funAgregar.php",
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
                  title: "Ha ocurrido un error al procesar la carga, verifique los datos",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "registro_existente"){
                swal({
                  type: "error",
                  title: "El RUT o Nic de este usuario ya existe dentro de sistema como activo, favor verifique",
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
      var params = {
                        "id": valor
                   };
      $.ajax({
          url:"../api_adm_nortrans/usuario/funDatosParaModificar.php",
          method:"POST",
          cache: false,
          data: JSON.stringify(params),
          contentType: false,
          processData: false,
          dataType: "json",
          success: function(response) {
              for (var i in response){
                  $("#rolModificar option[value="+ response[i].rol +"]").attr("selected",true);
                  $("#cedulaModificar").val(response[i].cedula);
                  $("#nombreModificar").val(response[i].nombre);
                  $("#nicModificar").val(response[i].nic);
                  $("#telefonoModificar").val(response[i].telefono);
                  $("#correoModificar").val(response[i].correo);               
                  $("#idModificar").val(response[i].id);
                  //****************************************************************
                  if(response[i].preAprueba == "si"){ $("#preApruebaModificar").prop('checked', true); }
                  if(response[i].aprueba == "si"){ $("#apruebaModificar").prop('checked', true); }                  
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
      var preAprueba = "no";
      var aprueba = "no";
      if($('#apruebaModificar').is(':checked') ){ preAprueba = "si"; }
      if($('#preApruebaModificar').is(':checked') ){ aprueba = "si"; }
      var params = {
                        "id": $("#idModificar").val(),
                        "rol": $("#rolModificar").val(),
                        "cedula": $("#cedulaModificar").val(),
                        "nombre": $("#nombreModificar").val(),
                        "nic": $("#nicModificar").val(),
                        "telefono": $("#telefonoModificar").val(),                        
                        "correo": $("#correoModificar").val(),
                        "preAprueba": preAprueba,
                        "aprueba": aprueba,
                   };
      $.ajax({
          url:"../api_adm_nortrans/usuario/funModificar.php",
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
                  title: "El RUT o NIC de este usuario ya existe dentro de sistema como activo, favor verifique",
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
