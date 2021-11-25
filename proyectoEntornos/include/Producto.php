<?php

class Producto {

    var $idProducto;
    var $nombreProducto;
    var $cantidad;
    var $precioUnitario;
    
    function __construct($id,$nombre,$cant,$precio){
       $this -> idProducto=$id;
       $this -> nombreProducto=$nombre;
       $this -> cantidad=$cant;
       $this -> precioUnitario=$precio;
        
    }

    public function getIdProducto(){
        return $this -> idProducto;
    }
    public function setIdProducto($id){
        $this -> idProducto  = $id;
    }

    public function getNombreProducto(){
        return $this -> nombreProducto;
    }
    public function setNombreProducto($nombre){
        $this ->  nombreProducto = $nombre;
    }
    
    public function getCantidad(){
        return $this -> cantidad;
    }
    public function setCantidad($cant){
        $this -> cantidad = $cant;
    }
    
    public function getPrecioUnitario(){
        return $this -> precioUnitario;
    }
    public function setPrecioUnitario($precio){
        $this ->precioUnitario = $precio;
    }
}
?>

