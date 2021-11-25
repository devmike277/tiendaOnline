<?php
session_start();
include "./funciones.php";
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
$mensajeError="";

if(empty($_FILES['fichero']['name'])){
    
    $_SESSION['mensajeCambiaImagen']="::Error de fichero::";
    
}else if( $_FILES['fichero']['type'] !== "image/png" && $_FILES['fichero']['type'] !== "image/gif" && $_FILES['fichero']['type'] !== "image/jpeg"){
    
    $_SESSION['mensajeCambiaImagen']="::Error de formato de imagen, la imagen debe ser del tipo gif, png, jpg o jpeg::";
    
}else if($_FILES['fichero']['size'] > 300000){
    
    $_SESSION['mensajeCambiaImagen']="::Error el tamanyo del fichero no debe ser superior a 300KB::";
    
}else{
    
    $_SESSION['cambiaImagen']=false;
    $var = obtenerImagenUsuario($_SESSION['usuario']);
    $var2 = explode(".",$var);
    
    if ($var2[0] === $_SESSION['usuario']){
        eliminarImagenUsuario($var2[0]);
        subirImagen($_SESSION['usuario']);
        $_SESSION['imagen'] = obtenerImagenUsuario($_SESSION['usuario']);
    }else{
        subirImagen($_SESSION['usuario']);
        $_SESSION['imagen'] = obtenerImagenUsuario($_SESSION['usuario']);
    }
}

header('Location:../index.php?estilo='.$opcion);
die();
?>

