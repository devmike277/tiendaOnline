<?php

session_start();
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';

$_SESSION['mRegistro']="";
$mensaje = "";
$insertar = true;
$usuario = $_POST['usuario'];
$pass1 = $_POST['contrasenya1'];
$pass2 = $_POST['contrasenya2'];

if (strcmp($usuario, "") == 0 || strcmp($pass1, "") == 0 || strcmp($pass2, "") == 0) {
    $mensaje = "Error de registro no se pueden dejar campos vacios";
    header('Location:../index.php?estilo='.$opcion);
} else {
    $fp = fopen("../ficheros/passwd.txt", "r+");
    while (!feof($fp)) {

        $datos = "";
        $linea = fgets($fp);
        $datos = explode(":", $linea);

        if ( strcmp($usuario, $datos[0]) == 0 ) {
            $mensaje = "Error de registro usuario repetido";
            $insertar=false;
            header('Location:../index.php?estilo='.$opcion);
            break;
        }
    }
    fclose($fp);
    $fp = fopen("../ficheros/passwd.txt", "a+");
    if ($insertar) {
        if( strcmp($pass1,$pass2) == 0 ){
            fputs($fp, $usuario . ":" .md5($pass2) . ":\n");
            fclose($fp);
            $mensaje= "Registro realizado correctamente";
            $_SESSION['usuario']=$usuario;
            $_SESSION['imagen']="default-user.png";
            header('Location:../index.php?contenido=inicio&estilo='.$opcion);
            
        }else{
            fclose($fp);
            $mensaje= "las contraseynas no coinciden";
            header('Location:../index.php?estilo='.$opcion);
            
        }
    }
    
}


$_SESSION['mRegistro'] = "::" . $mensaje . "::";
die();
?>

