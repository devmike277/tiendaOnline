<?php
    
    if(isset($_GET['mnsj'])){
        $mensaje=$_GET['mnsj']; 
        echo '<div id="administracionproductos"><h2>'.$mensaje.'</h2></div>';
    }
?>
    <div id="administracionproductos"><h2>Datos para insertar un producto</h2></div>
    <form  action="./include/procesaInsertarProducto.php" id="formInsertar" method="post" enctype="multipart/form-data">
        <div>
            <label>Nombre Producto: </label>
            <input type="text" name="nombre"  required="Campo obligatorio"/>
        </div>
        
        <div>
            <label>Descripcion Producto: </label>
            <textarea name="descripcion" cols="40" rows="3"></textarea>
        </div>
        
        <div>
            <label>Precio Producto: </label>
            <input type="number" name="precio" required="Campo obligatorio" min="0" max="100000" step="0.01"/>
        </div>
        
        <div>
            <span>Elije una imagen: </span><input type="file" name="imagen" id="fichero" />
        </div>
        
        <div>
            <label>Stock Producto: </label>
            <input type="number" name="stock"  required="Campo obligatorio"/>
        </div>
        <div>
           <input class="submit" type="submit" name="enviar" value="Enviar"></input>
           <input class="submit" type="reset" name="reset" value="Reset"></input>
           <input class="submit" type="submit" name="volver" value="Volver a administracion de productos"></input>
        </div>
    </form>
    



