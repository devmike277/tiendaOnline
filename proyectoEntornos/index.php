<?php
SESSION_START();
$stl = "";
if (isset($_GET['contenido'])) {
    $_SESSION['pagina'] = $_GET['contenido'];
}

if (isset($_GET['estilo'])) {
    $_SESSION['estilocss'] = $_GET['estilo'];
    $opcion = "./estilos/estilo" . $_SESSION['estilocss'] . ".css";
    $stl = $_GET['estilo'];
} else {
    $opcion = "./estilos/estilo1.css";
    $stl = 1;
}

if (isset($_SESSION['contador'])) {
    $contador = $_SESSION['contador'];
} else {
    $contador = 0;
}
isset($_SESSION['usuario']) ? $visibilidad = $_SESSION['usuario'] : $visibilidad = false;
isset($_SESSION['cambiaImagen']) ? $visibilidadCambiarImagen = $_SESSION['cambiaImagen'] : $visibilidadCambiarImagen = false;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Servidor Apache del Lampp</title>
        <?php
        /*
         * Codigo proyecto 1 evaluacion
         * 
         * if (isset($_GET['estilo'])) {
          $opcion = $_GET['estilo'];
          $estilocss = "./estilos/estilo" . $opcion . ".css";
          } else {
          $estilocss = "./estilos/estilo1.css";
          } */
        ?>

        <link  rel="stylesheet" href="<?php echo $opcion; ?>" />
        <link  rel="shortcut icon" type="image/png" href="./imagenes/favicon.png" />
    </head>
    <body>
        <div id="carrito">
            <div class="titutlo"><p>Carrito de la compra</p></div>
            <div class="cantidad"><p>Productos:<?php echo $contador; ?></p></div>
            <div class="elementocarrito">
                <img src="./imagenes/carro.png" height="58" width="58">
                <a href="index.php?contenido=vercarrito&estilo=<?php echo $stl; ?>">Visualiza</a>
            </div>
            <div class="elementocarrito">
                <img src="./imagenes/comprar.png" height="58" width="58">
                <a href="index.php?contenido=comprarcarrito&estilo=<?php echo $stl; ?>">Realiza Compra</a>
            </div>
        </div>
        <div id="wrapper">

            <header id="cabecera">
                <?php
                include "./include/header.php";
                ?>
            </header>

            <div >
                <?php
                    if (strcmp($visibilidad, false) == 0) {
                        include "./include/loginform.php";
                    }
                ?> 
            </div>

            
            <?php
                if (strcmp($visibilidad, false) == 0 || strcmp($visibilidad, "admin") != 0) {
                    echo '<nav id="visible">';
                    include "./include/nav.php";
                    echo "</nav>";
                }
            ?>
            
            <?php
                if (strcmp($visibilidadCambiarImagen, true) == 0) {
                    include "./include/cambiaImagenForm.php";
                }
            ?>
            
            <section id="contenido">
                <div id="contenedorphp">

                <?php
                if (!isset($_SESSION['pagina'])) {
                    include './include/inicio.php';
                } else {
                    switch ($_SESSION['pagina']) {
                        case 'inicio':
                            include './include/inicio.php';
                            break;
                        case 'productos':
                            include './include/productos.php';
                            break;
                        case 'contacto':
                            include './include/form.php';
                            break;
                        case 'form':
                            include './include/procesaform.php';
                            break;
                        case 'registro':
                            include './include/registro.php';
                            break;
                        case 'sesionadmin':
                            include './include/administracion.php';
                            break;
                        case 'procesacarrito':
                            include './include/Carrito.php';
                            break;
                        case 'vercarrito':
                            include './include/verCarritoPrecompra.php';
                            break;
                        case 'cambiacantidad':
                            include './include/cambiaCantidad.php';
                            break;
                        case 'eliminaproducto':
                            include './include/eliminaProducto.php';
                            break;
                        case 'comprarcarrito':
                            include './include/procesaCarrito.php';
                            break;
                        case 'confirmarpedido':
                            include './include/confirmarPedido.php';
                            break;
                        case 'confirmacion':
                            include './include/confirmacion.php';
                            break;
                        default:
                            include './include/inicio.php';
                            break;
                    }
                }
                ?>
                </div>
            </section>
            <footer id="pie">
                    <?php
                    include "./include/footer.php";
                    ?>
            </footer>
        </div>
    </body>
</html>




