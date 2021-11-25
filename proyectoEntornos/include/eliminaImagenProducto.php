<?php
include('funciones.php');
include("conexion.php");

isset($_GET['id'])?$identifiacdor=$_GET['id']:$identifiacdor="";
isset($_GET['estilo'])?$opcionestilo=$_GET['estilo']:$opcionestilo="";


eliminarImagenProducto($imagen);

$sql = "UPDATE PRODUCTOS SET imagen = NULL WHERE id=".$identifiacdor;
$resultado = $conexion->query($sql);
$conexion->close();
header('Location:../index.php?contenidoAdministracion=modificar&estilo=' . $opcionestilo.'&id='.$identifiacdor);
die();
?>