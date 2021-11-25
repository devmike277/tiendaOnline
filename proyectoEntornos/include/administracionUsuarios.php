

<?php
isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';
$users = array();
$cont = 0;
$fp = fopen("./ficheros/passwd.txt", "r+");

while (!feof($fp)) {
    $dato = "";
    $linea = fgets($fp);
    if ($linea != null) {
        $dato = explode(":", $linea);
         if ($dato != null) {
         $users[$cont] = array(($cont + 1), $dato[0], $dato[1], "<a href='include/eliminarusuario.php?estilo=".$opcion."&usu=".$dato[0]."'>Eliminar</a>");
            $cont++;
            
        }
    }
}

fclose($fp);
?>

<div id="administracion">
    <h1>ADMINISTRACION DE USUARIOS</h1>
</div>

<div id="administracion2">

    <table id="tabla">
        <tr class="categorias">
            <th>IdUsuario</th>
            <th>Usuairio</th>
            <th>Contrasenya</th>
            <th>Eliminar</th>
        </tr>


        <?php
        foreach ($users as $user) {
        ?>  
         <tr class="resultados">
            <th><?php echo $user[0]; ?></th>
            <th><?php echo $user[1]; ?></th>
            <th><?php echo $user[2]; ?></th>
            <th><?php echo $user[3]; ?></th>
        </tr>
        <?php
        }
        ?>


    </table>

</div>

