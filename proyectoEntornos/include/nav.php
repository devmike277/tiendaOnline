<?php

//isset($_GET['contenido'])?$c=$_GET['contenido']:$c='inicio';
isset($_SESSION['pagina'])?$c=$_SESSION['pagina']:$c='inicio';
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
//echo "<br>".$c;

?> 

<ul>
    <li ><a <?php if(!strcmp($c,'inicio')) echo 'class="activo"'; ?> href="index.php?contenido=inicio&estilo=<?php echo $opcion;?>">Inicio</a></li>
    <li><a  <?php if(!strcmp($c,'productos')) echo 'class="activo"'; ?> href="index.php?contenido=productos&estilo=<?php echo $opcion;?>">Productos</a></li>
    <li ><a <?php if(!strcmp($c,'contacto')) echo 'class="activo"'; ?> href="index.php?contenido=contacto&estilo=<?php echo $opcion;?>">Contacto</a></li>
</ul>
