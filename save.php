<?php
session_start();

$serverName = "989J4V1\SQLAGENTS"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"ventas");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$certificadora = $_SESSION['nombre'];
$producto = $_POST['lstProductos'];
$ban = $_POST['ban'];
$vendedor = $_POST['agente'];
$segmento = $_POST['lstSegmento'];
$fecha = date("d/m/Y");
$hora = date("h:i:sa");

if( $conn ) {
    $sql = "INSERT INTO certy (certificadora, producto, ban, vendedor, segmento, fecha, hora )
     VALUES ('" .$certificadora. "','" .$producto. "','" .$ban. "','" .$vendedor. "','" .$segmento. "','" 
     .$fecha. "','" .$hora.  "')";
    //$params = array(1, "some data");

    $stmt = sqlsrv_query($conn, $sql);

    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }else{
        header('Location: http://989j4v1:81/certy/index.php');
    }

}else{
    echo "Conexión no se pudo establecer.<br />";
    die( print_r( sqlsrv_errors(), true));
}

?>