<?php

include("conexion.php");
//$matriz_productos = array(array('Kit sparrows', './imagenes/sparrows.jpeg', 'kit de ganzuas de buena calidad para iniciarse en la parctica del ganzuado deportivo','PRDCT1','59.95'), array('Kit peterson', './imagenes/peterson.jpeg', 'kit de ganzuas de la marca peterson, buena calidad de acero y gran variedad en cuanto a perfiles y espesores','PRDCT2','69.95'), array('Kit multipick', './imagenes/multipick.jpeg', 'kit de la casa alemana para cilindros multipunto de seguridad, empuñadura de aluminio y pala extraible','PRDCT3','89.95'));


/* foreach ($matriz_productos as $key => $value) {
  $_SESSION['prod']=base64_encode(serialize($value));
  echo "<div id='productos'><div id='producto'><h1>" . $value[0] . "</h1></div>";
  echo "<img src='" . $value[1] . "'/>";
  echo "<div id='producto'><p>" . $value[2] . "</p></div>";
  echo "<div id='producto'><p>Precio: " . $value[4] . "€</p></div>";

  echo '<div id="formproducto">'
  . '<form action="index.php?contenido=procesacarrito&estilo='.$_SESSION['estilocss'].'&prod='.base64_encode(serialize($value)).'" method="post" id="product_form">'
  . '<div id="cantidadProducto">'
  . '<label>Cantidad:</label><input type="number" name="cantidad" value="0" min="0" max="20" step="1"></div>'
  . '<div id="anyadecarrito"><button class="submit" type="submit">Añadir</button></div>'
  . '</form>'
  . '</div></div>';

  } */
isset($_GET['estilo']) ? $stlo = $_GET['estilo'] : $stlo = '1';
isset($_GET['pagina']) ? $pagina = $_GET['pagina'] : $pagina = 0;
$elem_por_pagina = 2;
$offset = $pagina * $elem_por_pagina;
$sql = "SELECT * FROM PRODUCTOS LIMIT $elem_por_pagina OFFSET $offset";
$resultado = $conexion->query($sql);


if (mysqli_num_rows($resultado) > 0) {

    while ($row = mysqli_fetch_assoc($resultado)) {
        $value = array($row["nombre_producto"], './imagenes/' . $row["imagen"], $row["descripcion_producto"], $row["id"], $row["precio"]);
        $_SESSION['prod'] = base64_encode(serialize($value));
        echo "<div id='productos'><div id='producto'><h1>" . $row["nombre_producto"] . "</h1></div>";
        //echo "<img src='./imagenes/productos/" . $row["imagen"] . "'/>";
        if (is_null($row["imagen"])) {
            echo '<div id="producto"><p>IMAGEN NO DISPONIBLE</p></div>';
        } else {
            echo "<img src='./imagenes/productos/" . $row["imagen"] . "'/>";
        }
        echo "<div id='producto'><p>" . $row["descripcion_producto"] . "</p></div>";
        echo "<div id='producto'><p>Precio: " . $row["precio"] . "€</p></div>";
        echo '<div id="producto"><p>Valoracion: ' . $row["valoracion"] . '</p><a id="valoracion" href="./include/valoracion.php?id=' . $row["id"] . '"><img id="imagenlike" src="./imagenes/like.jpg" title="clic para valorar" width="48" height="48"/></a></div>';
        echo "<div id='producto'><p>Stock: " . $row["stock"] . "</p></div>";

        echo '<div id="formproducto">'
        . '<form action="index.php?contenido=procesacarrito&&estilo=' . $_SESSION['estilocss'] . '&prod=' . base64_encode(serialize($value)) . '" method="post" id="product_form">'
        . '<div id="cantidadProducto">'
        . '<label>Cantidad:</label><input type="number" name="cantidad" value="0" min="0" max="' . $row['stock'] . '" step="1"></div>'
        . '<div id="anyadecarrito"><button class="submit" type="submit">Añadir</button></div>'
        . '</form>'
        . '</div></div>';
    }
} else {

    echo "No existen productos en la base de datos";
}
echo '<div id="paginacion">';


$sql2 = "SELECT COUNT(*) as total FROM PRODUCTOS";
$resultado2 = mysqli_query($conexion, $sql2);
if (mysqli_num_rows($resultado2) > 0) {
    $row = mysqli_fetch_assoc($resultado2);
    $n_paginas = ceil($row['total'] / $elem_por_pagina);

    if ($pagina != 0) {
        echo '<a href="index.php?contenido=productos&pagina=0&estilo=' . $stlo . '">Inici</a>  ';
    } else {
        echo 'Inico  ';
    }

    if ($pagina != 0) {
        echo '<a href="index.php?contenido=productos&pagina=' . ($pagina - 1) . '&estilo=' . $stlo . '"><<</a>  ';
    } else {
        echo '<< ';
    }

    for ($i = 0; $i < $n_paginas; $i++) {

        if (($pagina) != $i) {
            echo ' <a href="index.php?contenido=productos&pagina=' . ($i) . '&estilo=' . $stlo . '">' . ($i + 1) . '</a> ';
        } else {
            echo ($i + 1) . ' ';
        }
    }

    if (($pagina + 1) != $n_paginas) {
        echo '  <a href="index.php?contenido=productos&pagina=' . ($pagina + 1) . '&estilo=' . $stlo . '" >>></a>';
    } else {
        echo '  >>';
    }

    if (($pagina + 1) != $n_paginas) {
        echo '  <a href="index.php?contenido=productos&pagina=' . ($n_paginas - 1) . '&estilo=' . $stlo . '" >Final</a>';
    } else {
        echo '  Final';
    }
} else {
    echo " No hay resultados";
}
echo '</div>';
$conexion->close();



