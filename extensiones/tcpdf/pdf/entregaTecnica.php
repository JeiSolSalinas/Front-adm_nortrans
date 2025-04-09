<?php	
// Desactivar toda notificación de error
error_reporting(0);

header('Content-type: text/html; charset=utf-8');

if(isset($_GET['et'])){

require_once('tcpdf_include.php');

//*********************************************************************************
//CONEXIÓN DIRECTA // 
$mysqli = new mysqli("127.0.0.1", "root", "ulises789", "fapasisa_entregas_tecnicas");
//$mysqli = new mysqli("167.114.101.21", "root", "ulises789", "fapasisa");
/* comprobar la conexión */
$mysqli->set_charset("utf8");
if ($mysqli->connect_errno) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
$ot = $_GET["et"];
$idUsuario = $_GET["id"];

$nombreProvedor = "";
	$EntregaTecnicaFormateado = "";
	$idcliente = "";
	$nombre = "";
	$apellido = "";
	$cedula = "";
	$direccion = "";
	$celular = "";
	$email = "";
	$departamento_cliente = "";
	$ciudad_cliente = "";
	$departamento_entrega = "";
	$ciudad_entrega = "";
	$fecha_venta = "";
	$fecha_creacion = "";
	$linea = "";
	$producto = "";
	$nro_serie_producto = "";
	$nro_factura_venta = "";
	$horas_estimadas = "";
	$quien_opera_el_equipo = "";
	$observacion_quien_opera = "";
	$casilla_actividades_forestales = "";
	$casilla_actividades_agropecuarias = "";
	$casilla_actividades_domesticas = "";
	$casilla_actividades_de_servicios = "";

			$consultaDatos = "select 
			cli.idcliente,
			cli.nombre,
			cli.apellido,
			cli.cedula,
			cli.direccion,
			cli.celular,
			cli.email,
			der_cli.nombre departamento_cliente,
			ci_cli.descripcion ciudad_cliente,
			der_tec.nombre departamento_entrega,
			ci_tec.descripcion ciudad_entrega,
			date_format(en.fecha_venta,'%d/%m/%Y') fecha_venta,
			li.descripcion linea,
			pro.codigo producto,
			en.nro_serie_producto,
			en.nro_factura_venta,
			date_format(en.fecha_creacion,'%d/%m/%Y') fecha_creacion,
			en.quien_opera_el_equipo,
			en.observacion_quien_opera,
			en.horas_estimadas,
			en.casilla_actividades_forestales,
			en.casilla_actividades_agropecuarias,
			en.casilla_actividades_domesticas,
			en.casilla_actividades_de_servicios
			from entrega_tecnica en, cliente cli, departamento der_cli, ciudad ci_cli, departamento der_tec, ciudad ci_tec, linea li, producto pro
			where en.estado = 'activo' and en.cliente = cli.idcliente and cli.departamento = der_cli.iddepartamento and 
			cli.ciudad = ci_cli.idciudad and en.departamento = der_tec.iddepartamento and 
			en.ciudad = ci_tec.idciudad and en.linea = li.idlinea and en.producto = pro.idproducto and en.identrega_tecnica = '".$ot."'";
			if ($resultadoDatos= $mysqli->query($consultaDatos)) {
				while ($fila = $resultadoDatos->fetch_assoc()) {
					//**********************************************************************************************************************
					$idcliente = $fila['idcliente']; 
					$nombre = $fila['nombre']; 
					$apellido = $fila['apellido']; 
					$cedula = $fila['cedula']; 
					$direccion = $fila['direccion']; 
					$celular = $fila['celular']; 
					$email = $fila['email']; 
					$departamento_cliente = $fila['departamento_cliente']; 
					$ciudad_cliente = $fila['ciudad_cliente']; 
					$departamento_entrega = $fila['departamento_entrega']; 
					$ciudad_entrega = $fila['ciudad_entrega']; 
					$fecha_venta = $fila['fecha_venta']; 
					$fecha_creacion = $fila['fecha_creacion']; 
					$linea = $fila['linea']; 
					$producto = $fila['producto']; 					
					$nro_serie_producto = $fila['nro_serie_producto']; 
					$nro_factura_venta = $fila['nro_factura_venta']; 
					$horas_estimadas = $fila['horas_estimadas']; 
					$quien_opera_el_equipo = $fila['quien_opera_el_equipo']; 
					$observacion_quien_opera = $fila['observacion_quien_opera']; 
					if($fila['casilla_actividades_forestales'] == "true"){ $casilla_actividades_forestales = "X"; }
					if($fila['casilla_actividades_agropecuarias'] == "true"){ $casilla_actividades_agropecuarias = "X"; }
					if($fila['casilla_actividades_domesticas'] == "true"){ $casilla_actividades_domesticas = "X"; }
					if($fila['casilla_actividades_de_servicios'] == "true"){ $casilla_actividades_de_servicios = "X"; }

					if($ot < 10){ $EntregaTecnicaFormateado = "00000".$ot; }
					if($ot >= 10 && $ot < 100){ $EntregaTecnicaFormateado = "0000".$ot; }
					if($ot >= 100 && $ot < 1000){ $EntregaTecnicaFormateado = "000".$ot; }
					if($ot >= 1000 && $ot < 10000){ $EntregaTecnicaFormateado = "00".$ot; }
					if($ot >= 10000 && $ot < 100000){ $EntregaTecnicaFormateado = "0".$ot; }
					if($ot >= 100000 && $ot < 1000000){ $EntregaTecnicaFormateado = $ot; }
			    }
				$resultadoDatos->free();
			}		
			//----------------------------------------------------------------------------------------------------
			$consultaDatosUsuario = "select nombre, date_format(now(),'%d/%m/%Y %H:%m') fecha_y_hora from usuario_proveedor where idusuario_proveedor = '".$idUsuario."'";
			if ($resultadoDatosUsuario= $mysqli->query($consultaDatosUsuario)) {
				while ($filaDatosUsuarios = $resultadoDatosUsuario->fetch_assoc()) {
					$nombreProvedor =  "Realizado por: ".$filaDatosUsuarios['nombre']." / E.T. Cargada en fecha: ".$fecha_creacion." / Documento Generado en fecha: ".$filaDatosUsuarios['fecha_y_hora']; 
			    }
				$resultadoDatosUsuario->free();
			}	

//***************************************************************** */	

$footer = <<<EOF
<table border="0" style="text-align: center; ">
<tbody>
	<tr>	
		<td style="width:540px;">
			<img style="position: absolute;" src="fapasisaFooter.png"/> 
		 </td>
	</tr>

	<tr>	
		<td style="width:540px; text-align: justify; font-size:8px;">
			$nombreProvedor
		 </td>
	</tr>
</tbody> 
</table>


EOF;



$hoja1 = <<<EOF

	<style>
		.estliFuente{
			font-family: times;
		}
	</style>
	
		<br><br>

		<table border="0" style="text-align: center;">
			<tbody>
				<tr>		
					
					<td style="width:400px; font-size:15px; font-weight: bolt; font-style: italic;" class= "estliFuente" >
						<div style="font-size:5px;">&nbsp;</div>	
						Comprobante de Entrega Técnica N° $EntregaTecnicaFormateado
					</td>

					<td style="width:140px;">
						<img style=" margin-top:-50px; position: absolute;" src="logoStill.png"/> 
					 </td>
				</tr>
			</tbody> 
		</table>
		
		<br><br>

		<table border="0.5" style="text-align: center;">
			<tbody>
			   <tr>
					<td style="width:110px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						PRODUCTO
					</td>

					<td style="width:90px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						MODELO
					</td>

					<td style="width:150px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						N° SERIE DE LA MAQUINA
					</td>

					<td style="width:95px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						N° FACTURA VENTA
					</td>

					<td style="width:95px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						FECHA VENTA
					</td>
				</tr>

				<tr>
					<td style="width:110px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:5px;">&nbsp;</div>	
						$linea 
						<div style="font-size:5px;">&nbsp;</div>	
					</td>

					<td style="width:90px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:5px;">&nbsp;</div>	
						$producto 
						<div style="font-size:5px;">&nbsp;</div>	
					</td>

					<td style="width:150px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:5px;">&nbsp;</div>	
						$nro_serie_producto
						<div style="font-size:5px;">&nbsp;</div>	
					</td>

					<td style="width:95px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:5px;">&nbsp;</div>	
						$nro_factura_venta
						<div style="font-size:5px;">&nbsp;</div>	
					</td>

					<td style="width:95px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:5px;">&nbsp;</div>	
						$fecha_venta
						<div style="font-size:5px;">&nbsp;</div>	
					</td>

				</tr>

			</tbody> 
		</table>

		<br><br>
		<table border="0.5" style="text-align: justify;">
			<tbody>
				<tr>
					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						NOMBRE Y APELLIDO:
					</td>

					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:3px;">&nbsp;</div>		
					$nombre $apellido
					<div style="font-size:3px;">&nbsp;</div>
					</td>					
				</tr>

				<tr>
					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						CEDULA DE IDENTIDAD:
					</td>

					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:3px;">&nbsp;</div>	
					$cedula
					<div style="font-size:3px;">&nbsp;</div>
					</td>					
				</tr>

				<tr>
					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						DIRECCION:
					</td>

					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:3px;">&nbsp;</div>	
					$direccion
					<div style="font-size:3px;">&nbsp;</div>
					</td>					
				</tr>
				<tr>
					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						DEPARTAMENTO:
					</td>

					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:3px;">&nbsp;</div>	
					$departamento_cliente
					<div style="font-size:3px;">&nbsp;</div>
					</td>					
				</tr>

				<tr>
					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						CIUDAD:
					</td>

					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:3px;">&nbsp;</div>	
					$ciudad_cliente
					<div style="font-size:3px;">&nbsp;</div>
					</td>					
				</tr>

				<tr>
					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						TELEFONO:
					</td>

					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:3px;">&nbsp;</div>	
					$celular
					<div style="font-size:3px;">&nbsp;</div>
					</td>					
				</tr>

				<tr>
					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						EMAIL:
					</td>

					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:3px;">&nbsp;</div>	
					$email
					<div style="font-size:3px;">&nbsp;</div>
					</td>					
				</tr>

			

			</tbody> 
		</table>

		<br><br>
		<table border="0" style="text-align: justify;">
			<tbody>
				<tr>
					<td style="width:160px; font-size:8px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						1. Es usted el que va a operar el equipo?
					</td>

					<td style="width:40px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						$quien_opera_el_equipo
					</td>

					<td style="width:50px; font-size:8px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						Quien?
					</td>

					<td style="width:290px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						$observacion_quien_opera
					</td>

				</tr>

				<tr>
					<td style="width:540px; font-size:8px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:5px;">&nbsp;</div>
						2. Actividad para la cual la máquina STIHL será mas utilizada
					</td>

				</tr>



			</tbody> 
		</table>

		<br><br>
		<table border="0.5" style="text-align: center;">
			<tbody>
				<tr>
					<td style="width:30px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						$casilla_actividades_forestales
					</td>

					<td style="width:240px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						1. ACTIVIDADES FORESTALES
					</td>

					<td style="width:30px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						$casilla_actividades_domesticas
					</td>
					
					<td style="width:240px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						3. ACTIVIDADES DOMESTICAS
					</td>
				</tr>

				<tr>
					<td style="width:30px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						$casilla_actividades_agropecuarias
					</td>

					<td style="width:240px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						2. ACTIVIDADES AGROPECUARIAS
					</td>

					<td style="width:30px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						$casilla_actividades_de_servicios
					</td>
					
					<td style="width:240px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						4. ACTIVIDADES DE SERVICIOS
					</td>
				</tr>

			</tbody> 
		</table>

		<br><br>
		<table border="0" style="text-align: justify;">
			<tbody>
				<tr>
					<td style="width:540px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						3. Horas estimadas de uso mensual: $horas_estimadas
					</td>
				</tr>
			</tbody> 
		</table>

		<br><br>

		<table border="0" style="text-align: justify;">
			<tbody>
				<tr>
					<td style="width:125px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:7px;">&nbsp;</div>	
					Garantía total concedida: 
					</td>

					<td style="width:300px; font-size:20px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						6(seis) meses
					</td>
				</tr>

				<tr>
					<td style="width:540px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:3px;">&nbsp;</div>	
						4. Declaro para los debidos fines que: 
					</td>
				</tr>

				<tr>
					<td style="width:540px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* La capacitación de los operarios queda a cargo de la persona que recibió esta capacitación.
					</td>
				</tr>
				<tr>
					<td style="width:540px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* Recibí la entrega Técnica del Producto, incluyendo los siguientes aspectos:
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:3px;">&nbsp;</div>		
						* Montaje del producto;
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* Identificación de los comandos de accionamiento;
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* Procedimiento de encendido del equipo y puesta en marca;
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* aceite y mezcla del combustible;
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* Utilización del equipo y seguridad básica;
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* Equipamiento individual del protección;
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* Demostracióon de los puntos principales en el manual de instrucciones del equipo;
					</td>
				</tr>

				<tr>
					<td style="width:20px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" ></td>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						* Conceptos básicos del afilado;
					</td>
				</tr>

				<tr>
					<td style="width:520px; font-size:9px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					<div style="font-size:5px;">&nbsp;</div>	
					5. Estimado Cliente para su mayor seguridad le agradecemos verificar a los 15 días de la del presente equipo STIHL que sus datos están correctamente registrados en la garantía llamando a los teléfonos (21) 283 320/21/22.
					</td>
				</tr>

			</tbody> 
		</table>

		<br><br><br>
		<table border="0" style="text-align: justify;">
			<tbody>
				<tr>
					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:3px;">&nbsp;</div>		
						Firma del Cliente: ______________________
						<div style="font-size:3px;">&nbsp;</div>	
					</td>

					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:3px;">&nbsp;</div>		
						 ______________________
					</td>
     			</tr>

				 <tr>
					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:3px;">&nbsp;</div>		
						Nombre del Cliente: ________________________
						<div style="font-size:3px;">&nbsp;</div>	
					</td>

					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					&nbsp;&nbsp;&nbsp; Nombre del Vendedor
					</td>
			     </tr>

				 <tr>
					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:3px;">&nbsp;</div>		
						C.I.: ______________________
						<div style="font-size:3px;">&nbsp;</div>	
					</td>

					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
						<div style="font-size:3px;">&nbsp;</div>		
						 ______________________
					</td>
			     </tr>

				 <tr>
					<td style="width:400px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >

					</td>

					<td style="width:140px; font-size:10px; font-weight: bolt; font-style: normal;" class= "estliFuente" >
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Local de Venta
					</td>
			     </tr>

			</tbody> 
		</table>

	
EOF;



class MYPDF extends TCPDF {

   public function Footer(){
	$this->SetY(-30);
	$this->RoundedRect(10, 280, 190, 0, 0.50, '0000'); // Imagen	
	$this->writeHTML($GLOBALS['footer'], false, false, false, false, '');
   }
 
}

$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetAutoPageBreak(true,30);

$pdf->setTopMargin(2);

$pdf->SetTitle('Entrega Técnica -'.$EntregaTecnicaFormateado);

$pdf->AddPage();

$pdf->writeHTML($hoja1, false, false, false, false, '');


$pdf->Output('entregaTecnica_'.$EntregaTecnicaFormateado.'.pdf', 'I'); 

}else{
echo "Parámetros inválidos";
}// FIN FACTURA

?>

