<?php

class CarroCompra {

    //atributos
    var $identificador;
    var $arrayProductos;

    function __construct($id) {
        $this->identificador = $id;
        $this->arrayProductos = array();
    }

    public function getIdentificador() {
        return $this->identificador;
    }

    public function setIdentificador($id) {
        $this->identificador = $id;
    }

    public function getarrayProductos() {
        return $this->arrayProductos;
    }

    public function setarrayProductos($array) {
        $this->arrayProductos = $array;
    }

    public function anyadeProducto($p) {
        $pAux = unserialize($p);
        foreach ($this->arrayProductos as $key => $prdct) {
            if (strcmp($prdct->idProducto, $pAux->idProducto) == 0) {
                $prdct->cantidad += (int) $pAux->cantidad;
                $repetido = "si";
            }
        }
        if (strcmp($repetido, "si") != 0) {
            array_push($this->arrayProductos, $pAux);
        }
    }

    public function eliminaProducto($id) {
        foreach ($this->arrayProductos as $key => $prdct) {
            if (strcmp($prdct->idProducto, $id) == 0) {
                unset($this->arrayProductos[$key]);
            }
        }
    }

    public function cambiaCantidad($id, $cant) {
        echo $cant."sadfvasfgasdfasfgdasdgasgasg".$id;
        foreach ($this->arrayProductos as $key => $prdct) {
            if (strcmp($prdct->idProducto, $id) == 0) {
                
                $this->arrayProductos[$key]->cantidad = $cant;
            }
        }
        
    }

    public function mostrarProductos() {
        isset($_SESSION['estilocss']) ? $opcion = $_SESSION['estilocss'] : $opcion = '1';
        $precioTotal = 0;
        $precioTotalProducto = 0;
        foreach ($this->arrayProductos as $key => $prdct) {
            $aux = (int) $key + 1;
            $precioTotalProducto = (float) $prdct->precioUnitario * (int) $prdct->cantidad;
            
            echo '<div id="carro4">';
            if(!isset($_SESSION['carrodefinitivo'])){
                echo '<br><form action="index.php?contenido=eliminaproducto&estilo=' . $opcion . '" method="post" id="">'
                      .'<button class="submit" type="submit">Eliminar producto</button>'
                      .'<input type="hidden" name="identificador" value="'.$prdct->idProducto.'">'
                      . '</form>';
            }
            echo "<span>Producto: </span>" . $aux . "<br>";
            echo "<span>::Id:: </span>" . ' ' . $prdct->idProducto . "<br>";
            echo "<span>Nombre del producto: </span>" . ' ' . $prdct->nombreProducto . "<br>";
            echo "<span>Precio: </span>" . ' ' . $prdct->precioUnitario . "<br>";
            echo "<span>Cantidad acutual: </span>" . ' ' . $prdct->cantidad . "<br>";
            echo "<span>Precio total producto: </span>" . ' ' . $precioTotalProducto;
            
            if(!isset($_SESSION['carrodefinitivo'])){
            echo '<br><form action="index.php?contenido=cambiacantidad&estilo=' . $opcion . '" method="post" id="">'
              . '<span>Nueva Cantidad:<input type="number" name="nuevaCantidad" value="0" min="0" step="1"></span>'
              .'<button class="submit" type="submit">Cambiar cantidad</button>'
              .'<input type="hidden" name="identificador" value="'.$prdct->idProducto.'">'
              . '</form>';
            }
            echo "</div>"; 
            $precioTotal += (float) $prdct->precioUnitario * (int) $prdct->cantidad;
        }
        return $precioTotal;
    }

    public function eliminarProductos() {
        $this->arrayProductos = "";
    }

}

?>
