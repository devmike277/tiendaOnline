<?php
session_start();
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
$_SESSION['cambiaImagen']=true;
header('Location:../index.php?estilo='.$opcion);
die();
?>