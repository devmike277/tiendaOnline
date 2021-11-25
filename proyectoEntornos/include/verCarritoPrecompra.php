<?php

include 'Producto.php';
include 'CarroCompra.php';

isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';
if (isset($_SESSION['carro'])) {
    $carro = unserialize($_SESSION['carro']);
    echo '<div id="carrocontenedor">';
    echo '<div id="carro1">Productos en tu carrito de la compra</div>';
    echo '<div id="carro2">Cantidad de productos: ' . sizeof($carro->arrayProductos) . '</div>';
    echo '<div id="carro3"><a href="index.php?contenido=productos&estilo=' . $opcion . '">Continua comprando</a></div>';
    $total = $carro->mostrarProductos();
    echo '<div id="carro5">Precio total del pedido: ' . $total . '</div>';
    echo "</div>";
    
} else {
    echo '<div id="carrocontenedor">';
    echo '<div id="carro1">Tu carrito de la compra esta vacio</div>';
    echo "</div>";
}
?>
