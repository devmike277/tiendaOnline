<?php
isset($_GET['estilo']) ? $opcion = $_GET['estilo'] : $opcion = '1';
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
} else {
    $mensaje = "";
}


?>

<form class="formulariologinvisible" action="./include/procesalogin.php" method="post" id="contact_form">
    <fieldset>

        <legend>login</legend>

        <div>
            <label >Usuario:</label>
            <input type="text" name="usuario" placeholder="tu usuario" />
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="contrasenya" placeholder="tu contraseyna"/>
        </div>
        <div>
            <button class="submit" type="submit">Login</button>
        </div>
        <div>
            <h3><?php echo $mensaje; ?></h3> 
        </div>
        <a href="index.php?contenido=registro&estilo=<?php echo $opcion?>">Registrate</a>
    </fieldset>
</form>



