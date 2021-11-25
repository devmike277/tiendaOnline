<?php
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
$users = array();
$cont = 0;
$fp = fopen("./ficheros/pedidos.txt", "r+");

while (!feof($fp)) {
    $dato = "";
    $linea = fgets($fp);
    if ($linea != null) {
        $dato = explode(":", $linea);
         if ($dato != null) {
         $pedidos[$cont] = array(($cont + 1), $dato[0], $dato[1], "<a href='index.php?contenidoAdministracion=verpedido&estilo=".$opcion."&pedido=".$dato[0]."'>Ver</a>");
            $cont++;
            
        }
    }
}

fclose($fp);
?>
<div id="administracion">
    <h1>ADMINISTRACION DE PEDIDOS</h1>
</div>

<div id="administracion2">

    <table id="tabla">
        <tr class="categorias">
            <th>N</th>
            <th>Pedido</th>
            <th>Usuario</th>
            <th>Visualizar</th>
        </tr>


        <?php
        foreach ($pedidos as $pedido) {
        ?>  
         <tr class="resultados">
            <th><?php echo $pedido[0]; ?></th>
            <th><?php echo $pedido[1]; ?></th>
            <th><?php echo $pedido[2]; ?></th>
            <th><?php echo $pedido[3]; ?></th>
        </tr>
        <?php
        }
        ?>


    </table>

</div>

