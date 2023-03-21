<?php
session_start();
echo $_SESSION["tarjeta"]." - ".$_SESSION["Nombre"]." [".$_SESSION["puesto"]."] - [<a href=Cerrar.php>Cerrar Sesión</a>]";
?>