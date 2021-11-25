<?php
include("conexion.php");
isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';
isset($_GET['resultado'])? $borrado=$_GET['resultado']:$borrado=0;
isset($_GET['mnsj'])? $mensaje=$_GET['mnsj']:$mensaje="";
$sql = "SELECT * FROM PRODUCTOS";
$resultado = $conexion->query($sql);

if($borrado == 1){
   echo '<div id="administracionproductos"><h2>Producto borrado correctamente</h2></div> ';
}else if(strcmp($mensaje,"") !=0){
    echo '<div id="administracionproductos"><h2>'.$mensaje.'</h2></div> ';
}
?>

<div id="administracionproductos"><a href="index.php?contenidoAdministracion=insertar&estilo=<?php echo $opcion;?>">Insertar producto</a></div>
<div id="prodsadmin">
    <table id="tabla">
        <tr class="categorias">
            <th>Id</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Stock</th>
            <th>Accion</th>

        </tr>
        <?php
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_assoc($resultado)) {

                echo '<tr class="resultados">';
                echo "<th>" . $row["id"] . "</th> ";
                echo "<th>" . $row["nombre_producto"] . "</th> ";
                echo "<th>" . $row["precio"] . "</th> ";
                if(is_null($row["imagen"])){
                    echo '<th>Sin imagen</th> ';
                }else{
                echo '<th><img src="imagenes/productos/' . $row["imagen"] . '"heigh="150" width="150"/></th> ';
                }
                echo "<th>" . $row["stock"] . "</th> ";
                echo '<th><a href="include/eliminarProductoCatalogo.php?id='. $row["id"].'&contenidoAdministracion=administracionProductos.php&estilo='.$opcion.'"><img src="imagenes/eliminar2.png" title="Eliminar producto"/></a>'
                        .'<a href="index.php?contenidoAdministracion=modificar&estilo='.$opcion.'&id='. $row["id"].'"><img src="imagenes/edit2.png" title="Actualizar producto"/></a></th> ';

                echo "</tr>";
            }
        }
        $conexion->close();
        ?>
    </table>
</div>