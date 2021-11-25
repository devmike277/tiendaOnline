<?php

include('funciones.php');
include('conexion.php');
isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';

if (isset($_POST['volver'])) {
    header('Location:../index.php?contenidoAdministracion=productos&estilo=' . $opcion);
} else if (isset($_POST['enviar'])) {

    isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "";
    isset($_POST['descripcion']) ? $descripcion = $_POST['descripcion'] : $descripcion = "";
    isset($_POST['precio']) ? $precio = $_POST['precio'] : $precio = "";
    isset($_POST['stock']) ? $stock = $_POST['stock'] : $stock = "";

    if ($_FILES['imagen']['size'] == 0) {
        $sql ="INSERT INTO PRODUCTOS( `nombre_producto`, `descripcion_producto`, `precio`, `stock`) "
                                      . "VALUES ('".$nombre."','".$descripcion."',".$precio.",".$stock.");";
            $resultado = $conexion->query($sql);
            if ($resultado == 1) {
                subirImagenProducto();
                $mensaje = "::Producto insertado en la base de datos::";
                header('Location:../index.php?contenidoAdministracion=productos&estilo=' . $opcion.'&mnsj='.$mensaje);
            } else {
                $mensaje = "::Error al realizar la consulta::";
                header('Location:../index.php?contenidoAdministracion=insertar&estilo=' . $opcion.'&mnsj='.$mensaje);
            }
    } else {
        if ($_FILES['imagen']['type'] !== "image/png" && $_FILES['imagen']['type'] !== "image/gif" && $_FILES['imagen']['type'] !== "image/jpeg") {
            $mensaje = "::Error de formato de imagen, la imagen debe ser del tipo gif, png, jpg o jpeg::";
            header('Location:../index.php?contenidoAdministracion=insertar&estilo=' . $opcion . '&mnsj=' . $mensaje);
        } else if ($_FILES['imagen']['size'] > 300000) {
            $mensaje = "::Error el tamanyo del fichero no debe ser superior a 300KB::";
            header('Location:../index.php?contenidoAdministracion=insertar&estilo=' . $opcion . '&mnsj=' . $mensaje);
        } else {
            $nombreImagen = $_FILES['imagen']['name'];
            $sql = "INSERT INTO PRODUCTOS( `nombre_producto`, `descripcion_producto`, `precio`, `imagen`, `stock`) "
                                      . "VALUES ('".$nombre."','".$descripcion."',".$precio.",'".$nombreImagen."',".$stock.");";
            $resultado = $conexion->query($sql);
            if ($resultado == 1) {
                subirImagenProducto();
                $mensaje = "::Producto insertado en la base de datos::";
                header('Location:../index.php?contenidoAdministracion=productos&estilo=' . $opcion.'&mnsj='.$mensaje);
            } else {
                $mensaje = "::Error al realizar la consulta::";
                header('Location:../index.php?contenidoAdministracion=insertar&estilo=' . $opcion.'&mnsj='.$mensaje);
            }

        }
    }
    $conexion->close();
    die();
}

