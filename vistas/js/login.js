$(document).ready(function(){
  $("#ingresarLogin").click(function(){           
        var encodedString = btoa($("#passLogin").val());
        var http = new XMLHttpRequest();
        var url = '../api_adm_nortrans/sesiones/funLogin.php';
        var params = {
                        "nic": $("#codigoLogin").val(),
                        "pass": encodedString
                     };
        http.responseType = 'json';
        http.open('POST', url, true);
        http.send(JSON.stringify(params));        
        
        http.onreadystatechange = function() {
            if(http.readyState == 4 && http.status == 200) {
                    var jsonResponse = JSON.parse(JSON.stringify(http.response));   
                    cargaVariableGobal(jsonResponse["idUsuario"],
                                       jsonResponse["nombre"],
                                       jsonResponse["nic"],
                                       jsonResponse["nroSesion"],
                                       jsonResponse["rol"]);
                    swal({
                        type: "success",
                        title: "Bienvenido: "+jsonResponse["nombre"],
                        showConfirmButton: true,
                        confirmButtonText: "Aceptar"
                        }).then((value) => {
                            location.href ="inicio"; 
                        });             
            }
            if(http.readyState == 4 && http.status == 401){               
                swal({
                    type: "error",
                    title: "Acceso Inválivo, Verifique sus datos",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar"
                    });
            }
        }
        http.onerror = function(err){
            console.log(err)
        }       
  });   
});


function cargaVariableGobal(idUsuario,nombre,nic,nroSesion,rol){
    var http = new XMLHttpRequest();
    var url = '../adm-nortrans/variableGlobal.php?idUsuario='+idUsuario+"&nombre="+nombre+"&nic="+nic+"&nroSesion="+nroSesion+"&iniciarSesion=ok&rol="+rol;
    http.open('GET', url, true);
    http.send();       
}