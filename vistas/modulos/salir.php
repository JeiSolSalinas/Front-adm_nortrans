<input type="hidden" name="idSesion" id="idSesion" value="<?php echo $_SESSION['nroSesion']; ?>">

<?php session_destroy(); ?>

<script>
    cerrarSesion();
function cerrarSesion(){
    var params = {
        "nroSesion": $("#idSesion").val()             
    };

    $.ajax({
        url:"../api_adm_nortrans/sesiones/funFinalizarSesion.php",
        method:"POST",
        cache: false,
        data: JSON.stringify(params),
        contentType: false,
        processData: false,
        dataType: "json",
        success: function(response) {
            if(response['mensaje'] === "ok"){
                location.href ="/nortrans-apps/adm-nortrans/"; 
            }

        }        
    });

}
</script>

