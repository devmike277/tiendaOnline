<?php

include 'CarroCompra.php';
include 'Producto.php';
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
$carro = unserialize($_SESSION['carro']);
$carro->eliminaProducto($_POST['identificador']);
$_SESSION['carro']= serialize($carro);
header('Location:index.php?contenido=vercarrito&estilo='.$opcion);
die();
?>

