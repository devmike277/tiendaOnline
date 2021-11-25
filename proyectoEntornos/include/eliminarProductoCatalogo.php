<?php
include("conexion.php");
include("funciones.php");
isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';
isset($_GET['contenidoAdministracion'])?$apartado=$_GET['contenidoAdministracion']:$apartado='';

$identificador=$_GET['id'];

$sql="SELECT imagen FROM PRODUCTOS WHERE id=".$identificador;
$resultado = $conexion->query($sql);
$row = mysqli_fetch_assoc($resultado);
$imagen=$row['imagen'];


$sql2 = "DELETE FROM PRODUCTOS WHERE id=".$identificador;
$resultado2 = $conexion->query($sql2);
eliminarImagenProducto($imagen);
header('Location:../index.php?contenidoAdministracion=productos&estilo='.$opcion.'&resultado='.$resultado2);
$conexion->close();
die();