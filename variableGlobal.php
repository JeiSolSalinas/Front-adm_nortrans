<?php
session_start();
$_SESSION['idUsuario'] = $_GET['idUsuario'];
$_SESSION["nombre"] = $_GET['nombre'];
$_SESSION["nic"] = $_GET['nic'];
$_SESSION["nroSesion"] = $_GET['nroSesion'];
$_SESSION["rol"] = $_GET['rol'];
$_SESSION["iniciarSesion"] = $_GET['iniciarSesion'];

?>