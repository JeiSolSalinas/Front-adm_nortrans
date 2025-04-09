<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Contacto Parentesco 
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Recursos Humanos</a></li>
      
      <li class="active">Administrar Contacto Parentesco</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
      
      <div class="box-header with-border">
  
      <div class="form-group col-sm-3 col-xs-12 ">  <!--Este codigo hace que la pantalla emergente se ajuste al dipositivo llamado responsive -->
          <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar">          
          <i class="fa fa-plus" aria-hidden="true"></i> Agregar Registro
          </button>
        </div>  

        <div class="form-group col-sm-9 col-xs-12 ">
            <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
        </div>


      </div>

      <div class="box-body">
        
      <div id="div1">
        <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%">         
          <thead>            
            <tr>              
              <th style="width:10px"><center>#</center></th>
              <th><center> Descripción</center></th>
              <th><center>Acciones</center></th>  
            </tr>   
          </thead>
  
          <tbody></tbody> 
        </table>
      </div>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR TAREA
======================================-->

<div id="modalAgregar" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" id="formulario_para_agregar">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL DESCRIPCION DE LA TAREA -->
            
            <div class="form-group">
                <label for="descricontactoParentesco">Descripción:</label>
                <input type="text" class="form-control input-md" name="descricontactoParentesco" id="descricontactoParentesco" placeholder="Ingresar Descripción" required>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" style = "background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TAREA
======================================-->

<div id="modalModificar" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
            <!-- ENTRADA PARA EL DESCRIPCION DE LA TAREA -->            
            <div class="form-group col-sm-12 col-xs-12">
                <label for="contactoParentescoModificar">Descripción:</label>
                <input type="text" class="form-control input-md" name="contactoParentescoModificar" id="contactoParentescoModificar" required>
                <input type="hidden"  name="idcontactoParentescoModificar" id="idcontactoParentescoModificar" required>
            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" style = "background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>

        </div>

      </form>

    </div>

  </div>

</div>

<script src="vistas/js/recursosHumanos/contactoParentesco.js"></script>


<style>
  #div1 {
      overflow:scroll;
      width:100%;
  }

  #div1 table {
      width:100%;
      background-color:lightgray;
  }
</style>