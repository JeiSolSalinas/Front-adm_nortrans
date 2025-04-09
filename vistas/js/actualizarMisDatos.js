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

  $('.caracteresEspeciales').keyup(function (){
        this.value = (this.value + '').replace(/\\/g,'').replace(/\"/g,'').replace(/\'/g,'').replace(/\;/g,'').replace(/\!/g,'');
  });

//*******************CONDICIONES PRINCIPALES*********************

  $('#btnActualizar').click(function() {
    
    if($("#datoPassUsuarioActual").val() != "" && 
         $("#datoPassUsuario").val() != "" && 
         $("#datoPassUsuarioRepe").val() != ""){
          modificarDatos();
      }else{
        swal({
          type: "error",
          title: "Debe completar todos los datos requeridos para actualizar los datos",
          showConfirmButton: true,
          confirmButtonText: "Aceptar"
        });
      }
      
  });

});  

function modificarDatos(){
  var passActual = btoa($("#datoPassUsuarioActual").val());
  var nuevoPass = btoa($("#datoPassUsuario").val());
  var repitaNuevoPass = btoa($("#datoPassUsuarioRepe").val());
      var params = {
          "idUsuario": $("#idUsuario").val(),
          "passActual": passActual,
          "nuevoPass": nuevoPass,
          "repitaNuevoPass": repitaNuevoPass               
      };

      $.ajax({
          url:"../api_adm_nortrans/sesiones/funActualizarDatos.php",
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
                 title: "Datos actualizados con exito",
                 showConfirmButton: true,
                 confirmButtonText: "Aceptar"
                }).then((value) => {
                  window.location.href = "inicio";
                });
              }

              if(response['mensaje'] === "nok"){
                swal({
                  type: "error",
                  title: "Ha ocurrido un error al procesar la actualización de datos",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "npa"){
                swal({
                  type: "error",
                  title: "La contraseña actual ingresada no en válida",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

              if(response['mensaje'] === "pi"){
                swal({
                  type: "error",
                  title: "Las nuevas contraseñas ingresadas no coinciden",
                  showConfirmButton: true,
                  confirmButtonText: "Aceptar"
                });
              }

          }        
      }).fail( function() {
          swal({
            type: "error",
            title: "Ha ocurrido un error al procesar la actualización",
            showConfirmButton: true,
            confirmButtonText: "Aceptar"
          });
      });

}



