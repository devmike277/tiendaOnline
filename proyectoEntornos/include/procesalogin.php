<?php

session_start();

include "./funciones.php";

isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
$fp = fopen("../ficheros/passwd.txt", "r");
$datos = array();
$mensaje = "";
$_SESSION['adminlogeado'] = "";
$_SESSION['userlogeado'] = "";



if ($_POST['usuario'] == "" || $_POST['contrasenya'] == "" || ($_POST['usuario'] == "" && $_POST['contrasenya'] == "")) {
        $_SESSION['mensaje'] = "::ERROR::";
        header("Location:../index.php");
} else {

    while (!feof($fp)) {
        //$datos = "";
        $linea = fgets($fp);
        $datos = explode(":", $linea);

        if ($datos[0] == strtolower($_POST['usuario'])) {
            $_SESSION['usuario'] = $datos[0];
            if ($datos[1] == md5($_POST['contrasenya'])) {
                $_SESSION['mensaje'] ="::Login correcto::";
                if (strtolower($_POST['usuario']) == "admin") {
                    $_SESSION['pagina'] = "sesionadmin";
                    header('Location:../index.php?estilo='.$opcion);
                    break;
                } else {
                    $_SESSION['imagen']=obtenerImagenUsuario($_SESSION['usuario']);
                    header('Location:../index.php?estilo='.$opcion);
                    break;
                }   
            } else {
                $_SESSION['usuario'] = "";
                $_SESSION['mensaje'] = "::Contraseña incorrecta::";
                header('Location:../index.php?estilo='.$opcion);
                break;
            }
        }
        $_SESSION['mensaje'] = "::el usuario no existe::";
    }
    fclose($fp);
}
 header('Location:../index.php?estilo='.$opcion);
 die();
//echo $mensaje;
?>


