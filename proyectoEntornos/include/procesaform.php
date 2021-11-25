<?php
$matriz_info = array('tesa' => array('Logo:' => './imagenes/cerraduras/tesa.jpg', 'Marca:' => 'Tesa', 'País de origen:' => 'España', 'Página web:' => 'www.tesa.es', 'Email de contacto:' => 'tesalocks@tesa.es'), 'fichet' => array('Logo:' => './imagenes/cerraduras/fichet.jpg', 'Marca:' => 'Fichet-Bauche', 'País de origen:' => 'Francia', 'Página web:' => 'www.fichet-bauche', 'Email de contacto:' => 'info@fichet-bauche.fr'), 'dom' => array('Logo:' => './imagenes/cerraduras/dom.jpg', 'Marca:' => 'DOM', 'País de origen:' => 'Alemania', 'Página web:' => 'www.dom-group.eu', 'Email de contacto:' => 'dom@dom-group.eu'), 'yale' => array('Logo:' => './imagenes/cerraduras/yale.jpg', 'Marca:' => 'Yale', 'País de origen:' => 'EEUU', 'Página web:' => 'www.yalelock.com', 'Email de contacto:' => 'service@yalelock.com'), 'multlock' => array('Logo:' => './imagenes/cerraduras/multlock.jpg', 'Marca:' => 'Mul-T-Lock', 'País de origen:' => 'Israel', 'Página web:' => 'www.mul-t-lock.com', 'Email de contacto:' => 'info@mul-t-lock.com'));
(isset($_POST["nombre"]) && $_POST['nombre'] != "") ? $dato_nombre = $_POST["nombre"] : $dato_nombre = "No hay datos";
(isset($_POST["email"]) && $_POST['email'] != "") ? $dato_email = $_POST["email"] : $dato_email = "No hay datos";
(isset($_POST["texto"]) && $_POST['texto'] != "") ? $dato_texto = $_POST["texto"] : $dato_texto = "No hay datos";
(isset($_POST["licencia"]) && $_POST['licencia'] != "") ? $dato_licencia = $_POST["licencia"] : $dato_licencia = "No hay datos";
(isset($_POST['cerraduras']) && $_POST['cerraduras'] != null) ? $dato_cerraduras = $_POST['cerraduras'] : $dato_cerraduras = "0.jpeg";
(isset($_POST["estrellas"]) && $_POST['estrellas'] != "") ? $dato_estrellas = $_POST["estrellas"] : $dato_estrellas = "0.png";
(isset($_POST["ganzuas"]) && $_POST['ganzuas'] != "") ? $dato_ganzuas = $_POST["ganzuas"] : $dato_ganzuas = "No hay datos";
//(isset($_POST["fabricantes"])&&$_POST['fabricantes']!="")?$dato_fabricantes=$_POST["fabricantes"]:$dato_fabricantes="No hay datos";
?>







<div>
    <?php echo $dato_nombre; ?>
</div>
<div>
    <?php echo $dato_email; ?>
</div>
<div>
    <?php
    $cadena = explode(" ", $dato_texto);

    for ($i = 0; $i < count($cadena); $i++) {
        if (preg_match("#ganzua#i", $cadena[$i])) {
            echo "<div id='coincidencia'>" . $cadena[$i] . "</div>    ";
        } else {
            echo "<div id='nocoincidencia'>" . $cadena[$i] . "</div>    ";
        }
    }
    ?>
</div>
<div>
    <?php
    if (is_array($dato_cerraduras)) {
        for ($i = 0; $i < count($dato_cerraduras); $i++) {
            echo "<img src='imagenes/cerraduras/" . $dato_cerraduras[$i] . ".png'>";
        }
    } else {
        echo "<img src='imagenes/cerraduras/" . $dato_cerraduras . "'>";
    }
    ?>
</div>
<div>
    <?php echo "Licencia: " . $dato_licencia; ?>
</div>
<div>
    <?php
    include "informacion.php";
    ?>
</div>
<div>
    <?php
    switch ($dato_estrellas) {
        case 1:
            echo "<img src='imagenes/estrelles/1.png'>";
            break;
        case 2:
            echo "<img src='imagenes/estrelles/2.png'>";
            break;
        case 3:
            echo "<img src='imagenes/estrelles/3.png'>";
            break;
        case 4:
            echo "<img src='imagenes/estrelles/4.png'>";
            break;
        case 5:
            echo "<img src='imagenes/estrelles/5.png'>";
            break;
        default:
            echo "<img src='imagenes/estrelles/" . $dato_estrellas . ".png'>";
            break;
    }
    ?>
</div>
<div>
    <?php
    if ($dato_ganzuas != 0) {
        for ($i = 0; $i < $dato_ganzuas; $i++) {
            echo "<img src='imagenes/cerraduras/ganzua.png'>";
        }
        echo"::" . $dato_ganzuas;
    } else {
        echo "No hay datos";
    }
    ?>
</div>



