<?php
header("Access-Control-Allow-Origin: *");
session_start();
?>
<!DOCTYPE html>
<html>

<!-- Borrar el cache -->

<meta http-equiv="Expires" content="0">
<meta http-equiv="Last-Modified" content="0">
<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
<meta http-equiv="Pragma" content="no-cache">

<!--------------------->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>.::NORTRANS::.</title>

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<link rel="icon" href="vistas/img/plantilla/iconoNor.png" type="image/x-icon">

<!--=====================================
  PLUGINS DE CSS
  ======================================-->

<!-- Bootstrap 3.3.7 -->
<link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">

<!-- Ionicons -->
<link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">

<!-- AdminLTE Skins -->
<link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!-- DataTables -->
<link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/exportDataTable.css" />
<link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="vistas/plugins/iCheck/all.css">
<link rel="stylesheet" href="vistas/plugins/iCheck/line/orange.css">

<!-- jquery ui -->
<link rel="stylesheet" href="vistas/bower_components/jquery-ui/themes/base/jquery-ui.min.css">

<!-- Input File -->
<link rel="stylesheet" href="vistas/bower_components/input-file/fileinput-rtl.min.css">
<link rel="stylesheet" href="vistas/bower_components/input-file/fileinput.min.css">

<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

<!-- Input Select -->
<link rel="stylesheet" href="vistas/bower_components/bootstrap-select/select2.min.css">

<!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->
<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

<!-- jQuery UI -->
<script src="vistas/bower_components/jquery-ui/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>

<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>

<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/exportDataTable.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

<!-- SweetAlert 2 -->
<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
<!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- iCheck 1.0.1 -->
<script src="vistas/plugins/iCheck/icheck.min.js"></script>

<!-- Char Js -->
<script src="vistas/bower_components/chart.js/Chart.min.js"></script>

<!-- Input File -->
<script src="vistas/bower_components/input-file/fileinput.min.js"></script>
<script src="vistas/bower_components/input-file/sortable.min.js"></script>
<!-- Input Select -->
<script src="vistas/bower_components/bootstrap-select/select2.min.js"></script>

</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-black sidebar-mini fixed " style="background-color: #E2E8E2;">

  <?php
  if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
    include "modulos/cabezote.php";
    include "modulos/menu.php";
    if (isset($_GET["ruta"])) {
      //GENERAL
      if (
        $_GET["ruta"] == "salir" ||
        $_GET["ruta"] == "inicio" ||
        $_GET["ruta"] == "actualizacionDatos"
      ) {
        include "modulos/" . $_GET["ruta"] . ".php";
      } else {
        //RECURSOS HUMANOS
        if (
          $_GET["ruta"] == "nacionalidad" ||
          $_GET["ruta"] == "comuna" ||
          $_GET["ruta"] == "afp" ||
          $_GET["ruta"] == "salud" ||
          $_GET["ruta"] == "antecedentesMedicos" ||
          $_GET["ruta"] == "turnosLaborales" ||
          $_GET["ruta"] == "empresa" ||
          $_GET["ruta"] == "documento" ||
          $_GET["ruta"] == "tipoEpp" ||
          $_GET["ruta"] == "fichaEmpleado" ||
          $_GET["ruta"] == "solicitudContratacion" ||
          $_GET["ruta"] == "tipoequipo" ||
          $_GET["ruta"] == "cargo" ||
          $_GET["ruta"] == "fichaContrato" ||
          $_GET["ruta"] == "preAprobacion" ||
          $_GET["ruta"] == "aprobacion" ||
          $_GET["ruta"] == "seleccionarFicha" ||
          $_GET["ruta"] == "datosLaboralPorVencer" ||
          $_GET["ruta"] == "solicitudContrPendiente" ||
          $_GET["ruta"] == "solicitudDeContratacion" ||
          $_GET["ruta"] == "cargoOrganizacional" ||
          $_GET["ruta"] == "mantenedorAreaNegocio" ||
          $_GET["ruta"] == "tipoAnexo" ||
          $_GET["ruta"] == "tipoAntecedenteMedico" ||
          $_GET["ruta"] == "tipoEstudio" ||
          $_GET["ruta"] == "tipoTerminoContrato" ||
          $_GET["ruta"] == "contactoParentesco" ||
           $_GET["ruta"] == "requisitosSeleccion"
        ) {
          include "modulos/recursosHumanos/" . $_GET["ruta"] . ".php";

        } else {
          // ACTIVOS
          if (
            $_GET["ruta"] == "docInformeMaquina" ||
             $_GET["ruta"] == "deMaquina"
          
          
          ) {
            include "modulos/activos/" . $_GET["ruta"] . ".php";

          } else {
            //GENERALES
            if (
              $_GET["ruta"] == "usuario" ||
              $_GET["ruta"] == "centroDeCosto"
            ) {
              include "modulos/generales/" . $_GET["ruta"] . ".php";
            } else {
              include "modulos/404.php";
            }
          }
        }
      }
    }
  } else {
    include "modulos/login.php";
  }

  ?>

  <script src="vistas/js/plantilla.js"></script>
  <script src="vistas/js/login.js"></script>

  <style type="text/css">
    .cajatexto {
      border: 1px solid #F46717;
      font-family: calibri;
      color: #403f3f;
    }

    .cajatexto:focus {
      border: 1px solid black;
      font-family: calibri;
      color: #403f3f;
    }

    #contenedorViajes {
      display: inline-block;
      display: inline;
      /*for IE 7 */
      zoom: 1;
      /*for IE 7 */
      vertical-align: top;
    }

    .spanLista {
      color: white;
      font-size: 13px;
    }

    .camposCheck {
      margin-bottom: 10px;
    }
  </style>
</body>

</html>
