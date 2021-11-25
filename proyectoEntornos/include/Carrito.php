<?php
//SESSION_START();
include 'CarroCompra.php';
include 'Producto.php';
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';

$carro = "";
isset($_SESSION['usuario']) ? $log = $_SESSION['usuario'] : $log = "anonimo";
isset($_POST['cantidad']) ? $cant = $_POST['cantidad'] : $cant = 0;

if (!isset($_SESSION['carro'])) {
    $carro = new CarroCompra($log);
} else {
    $carro = unserialize($_SESSION['carro']);
}


if (isset($_GET['prod'])) {
    $prdct = unserialize(base64_decode($_GET['prod']));
    $p = new Producto($prdct[3], $prdct[0], $cant, $prdct[4]);
    $carro->anyadeProducto(serialize($p)); 
}
$_SESSION['contador']=sizeof($carro->getarrayProductos());
$_SESSION['carro'] = serialize($carro);
header('Location:index.php?contenido=productos&estilo='.$opcion);
?>

