<?php 

$dias =array("lunes","martes","miercoles","jueves","viernes","sabado","domingo");
$meses=array("enero","febrero","marzo","abril","mayo","junio","julio","agosto","septiembre","ocutbre","noviembre","diciembre");

$fecha=$dias[date('N')-1].", ".date('j')." de ".$meses[date('m')-1]." de ".date('Y');
echo $fecha;

?>