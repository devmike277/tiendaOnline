<?php
(isset($_POST["fabricantes"])&&$_POST['fabricantes']!="")?$dato_fabricantes=$_POST["fabricantes"]:$dato_fabricantes="No hay datos";
if ($dato_fabricantes != "No hay datos") {
    foreach ($matriz_info as $key => $value) {
        if ($key == $dato_fabricantes) {
            foreach($value as $key1 => $value2) {
                if ($key1 == 'Logo:') {
                    echo $key1. "<br><img src='imagenes/cerraduras/" . $dato_fabricantes . ".jpg'>" . "<br>";
                } else {
                    echo $key1.''. $value2 ."<br>";
                }
            }
        }
    }
} else {
    echo $dato_fabricantes;
}
?>