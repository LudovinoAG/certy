<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Listado Admin</title>
</head>
<h6 class='username'>
    <?php
         session_start();
         if(isset($_SESSION['nombre'])){
            echo '<span id="TitleUsuario"> ('.$_SESSION["tarjeta"].') '.$_SESSION["nombre"].' [</span><a class="btn btn-link btnlink" href="cerrar.php">Cerrar Sesión</a>]';
            echo '<form action="control.php" method="post"><input class="form-control" id="txtfecha" name="txtfecha" type="date" /><br><input class="btn btn-success btn-sm" type="submit" value="DESCARGAR LOG"></form>';
        }else{
                 header('location: login.php');
         }
    ?>
</h6>
<div class='row fila_agent'>
    <div class='col-lg-12 contenedor'>
        <?php include_once('count.php'); ?>
    </div>
</div>
<?php

if($_SESSION['perfil']==2){
    


$serverName = "989J4V1\SQLAGENTS"; //serverName\instanceName
// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"ventas");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$count = 0;
$fecha = date("d/m/Y");

if( $conn ) {
    $sql = "SELECT * FROM certy WHERE fecha='".$fecha. "'";

    //$params = array(1, "some data");

    $stmt = sqlsrv_query($conn, $sql);
    echo "<table class='table table-condensed'>
    <thead>
        
        <tr> 
            <th>#</th>
            <th>Certificadora</th>
            <th>Producto</th>
            <th>BAN</th>
            <th>Vendedor</th>
            <th>Segmento</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
    </thead><tbody>";
    while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) ) {
        $count++;
        echo "<tr>
                <td>".$count. "</td>
                <td>".$row['certificadora']. "</td>
                <td>".$row['producto']. "</td>
                <td>".$row['ban']. "</td>
                <td>".$row['vendedor']. "</td>
                <td>".$row['segmento']. "</td>
                <td>".$row['fecha']. "</td>
                <td>".$row['hora']. "</td>
            </tr>";

    }

    echo "<tbody></table>";


}else{
    echo "Conexión no se pudo establecer.<br />";
    die( print_r( sqlsrv_errors(), true));
}

}else{
    header("location: index.php");
}

?>
<script src="jquery.js"></script>
<script src="app.js"></script>
