<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar Ficha de Empleado

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio/Recursos Humanos</a></li>

      <li class="active">Administrar Ficha de Empleado</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <div class="form-group col-sm-3 col-xs-12 ">
          <button class="btn btn btn-block btn-success" data-toggle="modal" data-target="#modalAgregar" id="btnNuevo">
            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Registro Base
          </button>
        </div>

        <div class="form-group col-sm-9 col-xs-12 ">
          <input type="text" style=" text-align: center; font-size: 17px;" class="form-control input-sm" name="filtradoDinamico" id="filtradoDinamico" autocomplete="off" placeholder="Filtrado General ...">
        </div>


      </div>

      <div class="box-body">

        <div id="div1">
          <table class="table table-bordered table-striped dt-responsive" id="tabla" width="100%" style="text-align: center;">
            <thead>
              <tr>
                <th style="width:10px">
                  <center>#</center>
                </th>
                <th>
                  <center>Acciones</center>
                </th>
                <th style="width:120px">
                  <center>Perfil</center>
                </th>
                <th>
                  <center> Rut</center>
                </th>
                <th>
                  <center> Nombre y Apellido</center>
                </th>
                <th>
                  <center> Teléfono Empresa</center>
                </th>
                <th>
                  <center> Email Empresa</center>
                </th>

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

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post" id="formulario_para_agregar">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar Registro Base</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group col-sm-4 col-xs-12">
              <label for="rutAgregar">Rut:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutAgregar" id="rutAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fechaNacimientoAgregar">Fecha Nacimiento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaNacimientoAgregar" id="fechaNacimientoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="generoAgregar">Género:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="generoAgregar" name="generoAgregar">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Sin Especificar">Sin Especificar</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="nombreAgregar">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreAgregar" id="nombreAgregar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="apellidoAgregar">Apellido:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoAgregar" id="apellidoAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="nacionalidadAgregar">Nacionalidad:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="nacionalidadAgregar" name="nacionalidadAgregar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="estadoCivilAgregar">Estado Civil:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="estadoCivilAgregar" name="estadoCivilAgregar">
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Viudo/a">Viudo/a</option>
                <option value="Sepearado/a">Sepearado/a</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="comunaAgregar">Comuna:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="comunaAgregar" name="comunaAgregar"></select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="direccionAgregar">Dirección:</label>
              <input type="text" class="form-control input-md cajatexto" name="direccionAgregar" id="direccionAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoEmpresaAgregar">Teléfono Empresa:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoEmpresaAgregar" id="telefonoEmpresaAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailEmpresaAgregar">Email Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaAgregar" id="emailEmpresaAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoPropioAgregar">Teléfono Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioAgregar" id="telefonoPropioAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailPersonalAgregar">Email Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailPersonalAgregar" id="emailPersonalAgregar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="afpAgregar">AFP:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="afpAgregar" name="afpAgregar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="saludAgregar">Salud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="saludAgregar" name="saludAgregar"></select>
            </div>
            <div class="form-group col-sm-12 col-xs-12">
              <label for="nuevoNombre">Foto de Perfil:</label>
              <input type="file" class="form-control input-md cajatexto" name="imagenAgregar" id="imagenAgregar" accept="*" data-show-upload="false" data-show-caption="false">
            </div>
          </div>

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Datos Laborales</h3>
              </div>
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="empresaAgregar">Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="empresaAgregar" name="empresaAgregar"></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="centroAgregar">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="centroAgregar" name="centroAgregar"></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="turnoAgregar">Turno o Jornada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="turnoAgregar" name="turnoAgregar"></select>
                </div>
              </div>
            </div>
          </div>


        </div>



        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnGuardar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Guardar</button>

        </div>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR TAREA
======================================-->

<div id="modalModificar" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

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

            <input type="hidden" name="idModificar" id="idModificar" required>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="rutModificar">Rut:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutModificar" id="rutModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fechaNacimientoModificar">Fecha Nacimiento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaNacimientoModificar" id="fechaNacimientoModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="generoModificar">Género:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="generoModificar" name="generoModificar">
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Sin Especificar">Sin Especificar</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="nombreModificar">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreModificar" id="nombreModificar">
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="apellidoModificar">Apellido:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoModificar" id="apellidoModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="nacionalidadModificar">Nacionalidad:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="nacionalidadModificar" name="nacionalidadModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="estadoCivilModificar">Estado Civil:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="estadoCivilModificar" name="estadoCivilModificar">
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Viudo/a">Viudo/a</option>
                <option value="Sepearado/a">Sepearado/a</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="comunaModificar">Comuna:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="comunaModificar" name="comunaModificar"></select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="direccionModificar">Dirección:</label>
              <input type="text" class="form-control input-md cajatexto" name="direccionModificar" id="direccionModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoEmpresaModificar">Teléfono Empresa:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoEmpresaModificar" id="telefonoEmpresaModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailEmpresaModificar">Email Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaModificar" id="emailEmpresaModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoPropioModificar">Teléfono Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioModificar" id="telefonoPropioModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailPersonalModificar">Email Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailPersonalModificar" id="emailPersonalModificar">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="afpModificar">AFP:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="afpModificar" name="afpModificar"></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="saludModificar">Salud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="saludModificar" name="saludModificar"></select>
            </div>
            <div class="form-group col-sm-8 col-xs-12">
              <label for="nuevoNombre">Foto de Perfil:</label>
              <input type="file" class="form-control input-md cajatexto" name="imagenModificar" id="imagenModificar" accept="*" data-show-upload="false" data-show-caption="false">
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <div id="nuevaImagenModificar" class="form-group col-sm-12 col-xs-12" style="text-align:center;"></div>
              <div class="col-sm-12 col-xs-12">
                <div id="mapVistaPrevia"></div>
              </div>
            </div>

          </div>
        </div>

    <div class="col-md-12 col-xs-12">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">Datos Laborales</h3>
        </div>
        <div class="box-body">
          <div class="form-group col-sm-4 col-xs-12">
            <label for="empresaModificar">Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto" id="empresaModificar" name="empresaModificar"></select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="centroModificar">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto" id="centroModificar" name="centroModificar"></select>
          </div>

          <div class="form-group col-sm-4 col-xs-12">
            <label for="turnoModificar">Turno o Jornada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
            <select class="form-control input-md cajatexto" id="turnoModificar" name="turnoModificar"></select>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!--=====================================
        PIE DEL MODAL
        ======================================-->

  <div class="modal-footer">

    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

    <button type="button" class="btn btn-primary" style="background-color: #adaf9c; border-color: #f46717; " id="btnModificar"><i class="fa fa-hdd-o" aria-hidden="true"></i> Modificar Registro</button>

  </div>

  </form>

</div>

</div>

</div>

<div id="modalVermas" class="modal fade" role="dialog">

  <div class="modal-dialog modal-lg">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#A9A9A9; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Ver Datos del Registro</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <div class="form-group col-sm-12 col-xs-12">
              <div id="nuevaImagenVer" class="form-group col-sm-12 col-xs-12" style="text-align:center;"></div>
              <div class="col-sm-12 col-xs-12">
                <div id="mapVistaPrevia2"></div>
              </div>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="rutVer">Rut:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto solo-ruc" name="rutVer" id="rutVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="fechaNacimientoVer">Fecha Nacimiento:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="date" class="form-control input-md cajatexto" name="fechaNacimientoVer" id="fechaNacimientoVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="generoVer">Género:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="generoVer" name="generoVer" disabled>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Sin Especificar">Sin Especificar</option>
              </select>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="nombreVer">Nombre:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="nombreVer" id="nombreVer" disabled>
            </div>

            <div class="form-group col-sm-6 col-xs-12">
              <label for="apellidoVer">Apellido:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="apellidoVer" id="apellidoVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="nacionalidadVer">Nacionalidad:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="nacionalidadVer" name="nacionalidadVer" disabled></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="estadoCivilVer">Estado Civil:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="estadoCivilVer" name="estadoCivilVer" disabled>
                <option value="Soltero/a">Soltero/a</option>
                <option value="Casado/a">Casado/a</option>
                <option value="Viudo/a">Viudo/a</option>
                <option value="Sepearado/a">Sepearado/a</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="comunaVer">Comuna:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="comunaVer" name="comunaVer" disabled></select>
            </div>

            <div class="form-group col-sm-12 col-xs-12">
              <label for="direccionVer">Dirección:</label>
              <input type="text" class="form-control input-md cajatexto" name="direccionVer" id="direccionVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoEmpresaVer">Teléfono Empresa:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoEmpresaVer" id="telefonoEmpresaVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailEmpresaVer">Email Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <input type="text" class="form-control input-md cajatexto" name="emailEmpresaVer" id="emailEmpresaVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="telefonoPropioVer">Teléfono Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="telefonoPropioVer" id="telefonoPropioVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="emailPersonalVer">Email Personal:</label>
              <input type="text" class="form-control input-md cajatexto" name="emailPersonalVer" id="emailPersonalVer" disabled>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="afpVer">AFP:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="afpVer" name="afpVer" disabled></select>
            </div>

            <div class="form-group col-sm-4 col-xs-12">
              <label for="saludVer">Salud:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
              <select class="form-control input-md cajatexto" id="saludVer" name="saludVer" disabled></select>
            </div>


          </div>

          <div class="col-md-12 col-xs-12">
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Datos Laborales</h3>
              </div>
              <div class="box-body">
                <div class="form-group col-sm-4 col-xs-12">
                  <label for="empresaVer">Empresa:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="empresaVer" name="empresaVer" disabled></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="centroVer">Centro de Costo:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="centroVer" name="centroVer" disabled></select>
                </div>

                <div class="form-group col-sm-4 col-xs-12">
                  <label for="turnoVer">Turno o Jornada:</label><span style="font-size: 11px; color: #DC3139;"> (Obligatorio)</span>
                  <select class="form-control input-md cajatexto" id="turnoVer" name="turnoVer" disabled></select>
                </div>
              </div>
            </div>
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        </div>

      </form>

    </div>

  </div>

</div>

<script src="vistas/js/recursosHumanos/fichaEmpleado.js"></script>


<style>
  #div1 {
    overflow: scroll;
    width: 100%;
  }

  #div1 table {
    width: 100%;
    background-color: lightgray;
  }
</style>