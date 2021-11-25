<?php
isset($_SESSION['estilocss'])?$opcion=$_SESSION['estilocss']:$opcion='1';
unset($_SESSION['carro']);
$_SESSION['contador']=0;
echo '<div id="carro4"><h2>Pedido realizado correctamente</h2></div>';
echo '<div id="carro3"><a href="index.php?contenido=inicio&estilo='.$opcion.'">Volver al inicio</a></div>';
?>


