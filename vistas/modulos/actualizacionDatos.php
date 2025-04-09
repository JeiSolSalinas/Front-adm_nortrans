<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Actualizar mis Datos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Configuraciones</a></li>
      
      <li class="active">Actualizar mis Datos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-body">
            <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
         
                        <div class="col-xs-12 col-sm-4">
                          <label for="datoPassUsuarioActual">Contraseña Actual:</label>
                            <div class="form-group">
                              <input type="password" class="form-control input-sm cajatexto" name="datoPassUsuarioActual" id="datoPassUsuarioActual">
                            </div>    
                        </div>
                        
                        <div class="col-xs-12 col-sm-4">
                          <label for="datoPassUsuario">Nueva Contraseña:</label>
                            <div class="form-group">
                              <input type="password" class="form-control input-sm cajatexto" name="datoPassUsuario" id="datoPassUsuario">
                            </div>    
                        </div>

                        <div class="col-xs-12 col-sm-4">
                          <label for="datoPassUsuarioRepe">Repita Nueva Contraseña:</label>
                            <div class="form-group">
                              <input type="password" class="form-control input-sm cajatexto" name="datoPassUsuarioRepe" id="datoPassUsuarioRepe">
                            </div>    
                        </div>

            <div class="form-group col-sm-12 col-xs-12">
                <button type="button" class="btn btn-primary btn-block" id="btnActualizar">
                  <i class="fa fa-refresh" aria-hidden="true"></i>
                  Actualizar Datos
                </button>
            </div> 

      </div>

    </div>

  </section>

</div>

<script src="vistas/js/formularios/actualizarMisDatos.js"></script>

<style>
  .ui-autocomplete {
  z-index:2147483647;
 }

 table td {
  text-align: center;
  }

  #div1 {
      overflow:scroll;
      width:100%;
  }

  #div1 table {
      width:100%;
      background-color:lightgray;
  }

  .cabecera-estilo{
    font-size: 15px;
    text-align: center;
    font-weight: bold;
  }
  
</style>