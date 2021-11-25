<?php
include("conexion.php");
include 'Producto.php';
include 'CarroCompra.php';
isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';

$sql = "";
$carro = unserialize($_SESSION['carro']);
$linea = $carro->getIdentificador() . ":";
$productos = $carro->getarrayProductos();
foreach ($productos as $producto) {
    $sql="UPDATE PRODUCTOS SET stock = stock-". $producto->getCantidad() ." WHERE id=".$producto->getIdProducto();
    $conexion->query($sql);
    $linea .= $producto->getIdProducto() . ":" . $producto->getCantidad() . ":" . $producto->getPrecioUnitario() . ":";
}
$conexion->close();
$cont = 0;
if (filesize('ficheros/pedidos.txt') == 0) {
    $cont = 1;
    echo $cont;
} else {
    $fp = fopen("ficheros/pedidos.txt", "r");
    while (!feof($fp)) {
        fgets($fp);
        $cont++;
    }
    fclose($fp);
    echo $cont;
}

echo $cont;

$fp1 = fopen("ficheros/pedidos.txt", "a");
fputs($fp1, "P-" . ($cont) . ":" . $linea . "\n");
fclose($fp1);

header('Location:index.php?contenido=confirmacion&estilo=' . $opcion);
die();
?>

