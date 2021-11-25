
<?php
    $informe="";
    if(isset($_SESSION['mRegistro']) && $_SESSION['mRegistro'] != ""){
        $informe=$_SESSION['mRegistro']; 
    }else{
        $_SESSION['mRegistro']="";
    }
?>
<form  action="./include/procesaregistro.php" method="post">
    <div id="registro">
        <div>
            <label >Usuario:</label>
            <input type="text" name="usuario"  />
        </div>
        <div>
            <label>Contraseña:</label>
            <input type="password" name="contrasenya1"/>
        </div>
        <div>
            <label>Repite la contraseña:</label>
            <input type="password" name="contrasenya2"/>
        </div>
        <div>
            <button class="submit" type="submit">Registrarse</button>
            <div id="informeregistro"><?php echo $informe;?></div>
        </div>
    </div>
</form>