<?php
isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';
isset($_GET['contenidoAdministracion'])?$apartado=$_GET['contenidoAdministracion']:$apartado='';

//isset($_SESSION['paginaAdministracion'])?$apartado=$_SESSION['paginaAdministracion']:$apartado='';
?>


<div id="navegacionadministracion">
    <h1>Administracion</h1>
    <ul>
        <li><a <?php if(strcmp($apartado,'usuarios')==0){ echo 'class="activoadministracion"'; }?> href="index.php?contenidoAdministracion=usuarios&estilo=<?php echo $opcion;?>">Usuarios</a></li>
        <li><a <?php if(strcmp($apartado,'pedidos')==0 || strcmp($apartado,'verpedido')==0 ){ echo 'class="activoadministracion"';} ?> href="index.php?contenidoAdministracion=pedidos&estilo=<?php echo $opcion;?>">Pedidos</a></li>
        <li><a <?php if(strcmp($apartado,'productos')==0) {echo 'class="activoadministracion"'; }?> href="index.php?contenidoAdministracion=productos&estilo=<?php echo $opcion;?>">Productos</a></li>
    </ul>
</div>
<?php
if (isset($apartado)) {
    switch ($apartado) {
        case 'usuarios':
            include "administracionUsuarios.php";
            break;
        case 'pedidos':
            include "administracionPedidos.php";
            break;
        case 'productos':
            include "administracionProductos.php";
            break;
        case 'verpedido':
            include "verPedido.php";
            break;
        case 'insertar':
            include "formInsertarProducto.php";
            break;
         case 'modificar':
            include "editaProducto.php";
            break;
    }
}
