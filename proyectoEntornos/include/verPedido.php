<?php
isset($_GET['estilo']) ? $opcion = $_GET['estilo'] : $opcion = '1';
$idPedido=$_GET['pedido'];
$fichero=fopen("ficheros/pedidos.txt","r");
$total=0;
$cont=0;
while(!feof($fichero)){
    $linea= fgets($fichero);
    $datos=explode(":",$linea);
    
    if(strcmp($datos[0],$idPedido)==0){
        break;
    }
}
fclose($fichero);
echo '<div class="productosadministracion">';
echo '<div id="titulo">';
echo "Detalles del pedido";
echo "</div>";
echo '<div id="vuelve">';
echo '<a href="index.php?contenidoAdministracion=pedidos&estilo='.$opcion.'">Volver al menu de administracion</a>';
echo "</div>";
echo '<div class="detalles">';
echo "ID pedido: ".$datos[0];
echo "</div>";
echo '<div class="detalles">';
echo "Usuario: ".$datos[1]."<br>";
echo "</div>";

for ($i=2;$i<(int)(count($datos)-2);$i+=3){
    echo '<div class="detalles">';
    echo "ID prducto: ".$datos[$i];
    echo "<br>cantidad: ".$datos[$i+1];
    echo "<br>Precio: ".$datos[$i+2];
    echo "</div>";
    $total +=$datos[$i+1]*$datos[$i+2];
}
echo '<div id="precio">';
echo "Precio total del pedido: ".$total;
echo "</div>";
echo "</div>";
?>

