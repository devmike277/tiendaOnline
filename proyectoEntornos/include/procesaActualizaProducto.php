<?php

include('conexion.php');
include('funciones.php');
isset($_GET['estilo']) ? $opcion = $_GET['estilo'] : $opcion = '1';

isset($_POST['id']) ? $identificador = $_POST['id'] : $identificador = "";
isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "";
isset($_POST['descripcion']) ? $descripcion = $_POST['descripcion'] : $descripcion == "";
isset($_POST['precio']) ? $precio = $_POST['precio'] : $precio = "";
isset($_POST['stock']) ? $stock = $_POST['stock'] : $stock = "";
isset($_FILES['imagen']) ? $nombreimagen = $_FILES['imagen']['name'] : $nombreimagen = "";

if (isset($_POST['volver'])) {
    header('Location:../index.php?contenidoAdministracion=productos&estilo=' . $opcion);
} else if (isset($_POST['enviar'])) {

    if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] != 0) {

        $sql = "UPDATE PRODUCTOS SET 
            nombre_producto='" . $nombre . "',
            descripcion_producto='" . $descripcion . "',
            precio=" . $precio . ",
            imagen='" . $nombreimagen . "',
            stock=" . $stock . " 
            WHERE id=" . $identificador . ";";


        if ($_FILES['imagen']['type'] !== "image/png" && $_FILES['imagen']['type'] !== "image/gif" && $_FILES['imagen']['type'] !== "image/jpeg") {
            $mensaje = "::Error de formato de imagen, la imagen debe ser del tipo gif, png, jpg o jpeg::";
            header('Location:../index.php?contenidoAdministracion=modificar&estilo=' . $opcion . '&mnsj=' . $mensaje.'&id='.$identificador);
        } else if ($_FILES['imagen']['size'] > 300000) {
            $mensaje = "::Error el tamanyo del fichero no debe ser superior a 300KB::";
            header('Location:../index.php?contenidoAdministracion=modificar&estilo=' . $opcion . '&mnsj=' . $mensaje.'&id='.$identificador);
        } else {


            $resultado = $conexion->query($sql);
            if ($resultado == 1) {
                subirImagenProducto();
                $mensaje = "::Producto actualizado correctamente::";
                header('Location:../index.php?contenidoAdministracion=productos&estilo=' . $opcion . '&mnsj=' . $mensaje.'&id='.$identificador);
            } else {
                $mensaje = "::Error al realizar la consulta::";
                header('Location:../index.php?contenidoAdministracion=modificar&estilo=' . $opcion . '&mnsj=' . $mensaje.'&id='.$identificador);
            }
        }
    } else {
        $sql = "UPDATE PRODUCTOS SET 
            nombre_producto='" . $nombre . "',
            descripcion_producto='" . $descripcion . "',
            precio=" . $precio . ",
            stock=" . $stock . " 
            WHERE id=" . $identificador . ";";
            
        $resultado = $conexion->query($sql);
        if ($resultado == 1) {
            
            $mensaje = "::Producto actualizado correctamente::";
            header('Location:../index.php?contenidoAdministracion=productos&estilo=' . $opcion . '&mnsj=' . $mensaje.'&id='.$identifiacdor);
        } else {
            $mensaje = "::Error al realizar la consulta::";
            header('Location:../index.php?contenidoAdministracion=modificar&estilo=' . $opcion . '&mnsj=' . $mensaje.'&id='.$identifiacdor);
        }
    }
}
$conexion->close();
die();
?>

