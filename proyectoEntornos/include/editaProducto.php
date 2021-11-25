<?php
include("conexion.php");
isset($_GET['estilo'])?$opcion=$_GET['estilo']:$opcion='1';
isset($_GET['id'])?$identificador=$_GET['id']:$identificador="";


$sql="SELECT * FROM PRODUCTOS WHERE id=".$identificador;
$resultado = $conexion->query($sql);
$row = mysqli_fetch_assoc($resultado);


$imagen=$row['imagen'];
$nombre=$row["nombre_producto"];
$precio= $row["precio"];
$descripcion= $row["descripcion_producto"];
$stock= $row["stock"];
$fechaAlta= $row['fecha_registro'];
$valoracion=$row['valoracion'];

$conexion->close();
if(isset($_GET['mnsj'])){
        $mensaje=$_GET['mnsj']; 
        echo '<div id="administracionproductos"><h2>'.$mensaje.'</h2></div>';
}
?>
<div id="administracionproductos"><h2>Datos para modificar un producto</h2></div>
<form  action="./include/procesaActualizaProducto.php" id="formInsertar" method="post" enctype="multipart/form-data">
        <div>
            <label>id Producto: </label>
            <input name="id" value="<?php echo $identificador; ?>" readonly/>
        </div>
        <div>
            <label>Nombre Producto: </label>
            <input type="text" name="nombre"  required="Campo obligatorio" value="<?php echo $nombre; ?>"/>
        </div>
        
        <div>
            <label>Descripcion Producto: </label>
            <textarea name="descripcion" cols="40" rows="3"><?php echo $descripcion;?></textarea>
        </div>
        
        <div>
            <label>Precio Producto: </label>
            <input type="number" name="precio" required="Campo obligatorio" min="0" max="100000" step="0.01" value="<?php echo $precio; ?>" />
        </div>
        
        <div>
            
            <?php 
                if(is_null($imagen)){
                    echo ' <span>Elije una imagen: </span><input type="file" name="imagen" id="fichero" />'; 
                }else{
                    echo '<label>Imagen: </label><span>'.$imagen.'</span><br><a href="./include/eliminaImagenProducto.php?id='.$identificador.'&estilo='.$opcion.'">Elimina imagen</a>';
                }
            ?>
        </div>
        <div>
            <label>Valoracion: </label>
            <span><?php echo $valoracion; ?></span>
        </div>
        <div>
            <label>Fecha de alta: </label>
            <span><?php echo $fechaAlta; ?></span>
        </div>
        <div>
            <label>Stock Producto: </label>
            <input type="number" name="stock"  required="Campo obligatorio"value="<?php echo $stock; ?>"/>
        </div>
        <div>
           <input class="submit" type="submit" name="enviar" value="Enviar"></input>
           <input class="submit" type="reset" name="reset" value="Reset"></input>
           <input class="submit" type="submit" name="volver" value="Volver a administracion de productos"></input>
        </div>
    </form>