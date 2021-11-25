<?php
$saludo = "";

if (isset($_SESSION['usuario']) && $_SESSION['usuario'] != "") {
    $saludo = "Hola " . $_SESSION['usuario'] . "!";
  
}
isset($_SESSION['pagina'])? $pagina = $_SESSION['pagina'] : $pagina = "inicio";

?>
<div>
    <h1>Proyecto tienda virtual</h1>
</div>
<div id="cambiaestilo">
    <form method="get" action="./index.php?contenido=<?php echo $pagina; ?>">               
        <ul>
            <li>
                <span><input type="radio" name="estilo" value="1"/>Estilo 1</span> 
            </li>
            <li>
                <span><input type="radio" name="estilo" value="2"/>Estilo 2</span>   
            </li>
            <li>
                <span><input id="cambia" name="cambio" type="submit" value="Cambiar css" /></span>
            </li>
        </ul>
    </form> 
</div>
<div id="fecha">
    <?php 
        if(isset($_SESSION['imagen']) && $_SESSION['imagen'] !== ""){
            echo '<a href="./include/mostrarCambiaImagen.php"><img src=./imagenes/usuarios/'.$_SESSION['imagen'].' title="clic en la imagen para cambiarla" width="100" height="100"/></a>';
        }
    ?>
    <div id="nombre"><?php echo $saludo; ?></div>
    <?php include "fecha.php"; ?>
    <a href="./include/logout.php">Acabar sesion</a>
</div>
<div id="spacer"></div>