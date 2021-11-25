<?php
isset($_GET['estilo']) ? $opcion = $_GET['estilo'] : $opcion = '1';
isset($_GET['usu'])?$nombre=$_GET['usu'] : $nombre="";
echo $nombre;

$fp = fopen("../ficheros/passwd.txt", "r");
$cont=0;
$valores=array();

while (!feof($fp)) {
    $datos = "";
    $linea="";
    $linea = fgets($fp);
    
    if ($linea != null) {
        $datos = explode(":", $linea);
        if ($datos[0] != $nombre) {
             
            $valores[$cont]=$datos[0].":".$datos[1].":";
            $cont++;
        }
    }
    
}
fclose($fp);



$fp = fopen("../ficheros/passwd.txt", "w+");
for($i=0; $i< count($valores);$i++){
    fputs($fp,$valores[$i]."\n");
}

fclose($fp);

header('Location:../index.php?contenidoAdministracion=usuarios&estilo='.$opcion);
die();
?>