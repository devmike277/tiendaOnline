<?php

include 'CarroCompra.php';
include 'Producto.php';

isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';
$_SESSION['carrodefinitivo'] = "seteada";

if (isset($_SESSION['carro'])) {
    $carro = unserialize($_SESSION['carro']);
    echo '<div id="carro2">Productos en el carrito: ' . sizeof($carro->arrayProductos) . '</div>';
    echo '<div id="carro3"><a href="index.php?contenido=inicio&estilo=' . $opcion . '">Ir a inicio</a></div>';
    $total = $carro->mostrarProductos();
    echo '<div id="carro5">Precio total del pedido: ' . $total . '</div>';
    if (isset($_SESSION['userlogeado'])) {
        $carro->setIdentificador($_SESSION['usuario']);
        echo '<div id="carro3"><a href="index.php?contenido=confirmarpedido&estilo=' . $opcion . '">Confirmar pedido</a></div>';
    } else {
        echo '<div id="carro3"><a href="index.php?contenido=registro&estilo=' . $opcion . '">No has iniciado sesion, si no estas registrado pincha aqui</a></div>';
    }
    $_SESSION['carro'] = serialize($carro);
} else {
    echo '<div id="carro5">No hay ningun carro disponible</div>';
}
unset($_SESSION['carrodefinitivo']);
?>