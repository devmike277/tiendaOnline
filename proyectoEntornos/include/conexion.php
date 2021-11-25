<?php
$servidor = "localhost";
$usuario = "root";
$contrasenya = "";
$basededatos = "proyectoPHPMiguel";

$conexion =  mysqli_connect($servidor, $usuario, $contrasenya, $basededatos);

if (!$conexion) {
    die ("Error de connexió: ".$conexion->connect_error);
}

