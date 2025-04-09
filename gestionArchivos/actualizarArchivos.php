<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

ini_set('max_execution_time', '1000');
ini_set('max_input_time', '1000');
ini_set('post_max_size', '1000M');
ini_set('memory_limit', '1000M');
ini_set('upload_max_filesize', '1000M');

if(!empty($_FILES["imagen"]) && isset($_POST['carpeta']) ){
	$tipo_archivo ="";
	if($_FILES["imagen"]["type"] == "image/jpeg"){ $tipo_archivo = "jpg"; }
	if($_FILES["imagen"]["type"] == "image/png"){ $tipo_archivo = "png"; }
	date_default_timezone_set('America/Asuncion');
	$nombre_imagen = date("Ymd_his");
	if ( !is_dir("../vistas/img/".$_POST['carpeta']."/".$_POST['carpetaImagen']) ) {
    	mkdir( "../vistas/img/".$_POST['carpeta']."/".$_POST['carpetaImagen'], 0777);
	}
	$ruta =  "../vistas/img/".$_POST['carpeta']."/".$_POST['carpetaImagen']."/".$nombre_imagen.".".$tipo_archivo;
	$rutaEnvio =  "vistas/img/".$_POST['carpeta']."/".$_POST['carpetaImagen']."/".$nombre_imagen.".".$tipo_archivo;
      //$ruta =  "../vistas/".$_POST['carpeta']."/";
		if(!empty($_FILES["imagen"]["tmp_name"])){
		$nuevoAncho = 0;
		$nuevoAlto = 0;	
		list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

			if($ancho <= 1920){
				$nuevoAncho = $ancho;
			}else{
				$nuevoAncho = 1920;
			}

			if($alto <= 1080){
				$nuevoAlto = $alto;
			}else{
				$nuevoAlto = 1080;
			}

			if($_FILES["imagen"]["type"] == "image/jpeg"){
				ini_set('gd.jpeg_ignore_warning', 1);
				$origen = @imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagejpeg($destino, $ruta);
			}

			if($_FILES["imagen"]["type"] == "image/png"){
			    ini_set('gd.jpeg_ignore_warning', 1);
				$origen = @imagecreatefrompng($_FILES["imagen"]["tmp_name"]);
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
				imagepng($destino, $ruta);
			}

		}else{
			echo "vacio";
		}

	echo $rutaEnvio;
}else{
	echo "vacio";
}
?>