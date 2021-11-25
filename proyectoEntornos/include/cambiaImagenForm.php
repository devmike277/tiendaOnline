<?php
isset($_GET['estilo']) ? $opcion = $_GET['estilo'] : $opcion = '1';
if (isset($_SESSION['mensajeCambiaImagen'])) {
    $mensaje = $_SESSION['mensajeCambiaImagen'];
} else {
    $mensaje = "";
}

?>

<form class="formulariocambiaimagen" action="./include/procesaCambiaImagen.php" method="post" enctype="multipart/form-data">
    <fieldset>

        <legend>Cambiar Imagen</legend>

        <div>
            <p>La imagen tiene que ser del tipo jpg,jpeg,gif o png</p> 
        </div>
        <div>
            <p>La imagen tiene que tener un tamanyo inferior a 300KB</p> 
        </div>
        <div>
            <span>Elije un fichero: </span><input type="file" name="fichero" id="fichero" enctype="multipart/form-data"/>
        </div>
        <div>
            <button class="submit" type="submit" value="envia">Subir imagen</button>
            <?php
                if($mensaje !== ""){
                    echo '<span id="error">'.$mensaje.'</span>';
                }
            ?>
        </div>
         <div>
             <a href="./include/eliminaImagenDeUsuario.php">No quiero imagen de perfil</a>
        </div>  
    </fieldset>
</form>

