<?php
session_start();
include "./funciones.php";
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';

eliminarImagenUsuario($_SESSION['usuario']);
$_SESSION['imagen'] = obtenerImagenUsuario($_SESSION['usuario']);
echo $_SESSION['imagen'];
header('Location:../index.php?estilo='.$opcion);
die();
?>




