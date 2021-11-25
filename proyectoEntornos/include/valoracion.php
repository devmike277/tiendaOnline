<?php
SESSION_START();
include("conexion.php");
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
$id = $_GET['id'];


$sql = "UPDATE PRODUCTOS SET valoracion = valoracion +1 WHERE id =".$id;
$conexion->query($sql);

header('Location:../index.php?contenido=productos&estilo='.$opcion);

$conexion->close();
die();