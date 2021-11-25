<?php

function obtenerImagenUsuario($usuario){
    $imagenUsuario = "";
    $directorio = opendir("../imagenes/usuarios/");
    
    while (($foto = readdir($directorio)) !== false){
        $nombre = explode(".",$foto);
        if($nombre[0] == $usuario){
            $imagenUsuario = $nombre[0].".".$nombre[1];
        }
    }
    if($imagenUsuario == ""){
        $imagenUsuario="default-user.png";
    }
    
    closedir($directorio);
    return $imagenUsuario; 
    
}

function eliminarImagenUsuario($usuario){
    $ruta = "../imagenes/usuarios/".obtenerImagenUsuario($usuario);
    echo $ruta;
    unlink($ruta);
}

function subirImagen($usuario){
    $fichero = explode(".",$_FILES['fichero']['name']);
    move_uploaded_file($_FILES['fichero']['tmp_name'],'../imagenes/usuarios/'.$usuario.".".$fichero[1]);
    chmod('../imagenes/usuarios/'.$usuario.".".$fichero[1] , 0644);
}

function eliminarImagenProducto($imagen){
   
    $directorio = opendir("../imagenes/productos");
    
    while (($fotoProducto = readdir($directorio)) !== false){
        
        if($fotoProducto == $imagen){
            unlink("../imagenes/productos/".$fotoProducto);
        }
    }
    closedir($directorio);    
}

function subirImagenProducto(){
    move_uploaded_file($_FILES['imagen']['tmp_name'],'../imagenes/productos/'.$_FILES['imagen']['name']);
    chmod('../imagenes/productos/'.$_FILES['imagen']['name'] , 0644);
}