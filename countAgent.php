<?php
$serverName = "989J4V1\SQLAGENTS"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"ventas");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
//$count = 0;
$fecha = date("d/m/Y");

if( $conn ) {
    $sql = "SELECT COUNT(certificadora) AS Count FROM certy WHERE fecha='".$fecha."'AND certificadora='".$_SESSION['nombre']."'";

    $stmt = sqlsrv_query($conn, $sql);
    while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
?>

    <span id='agent_total' class='position-absolute top-10 end-0 translate-middle badge rounded-pill bg-danger'>
        <?php
            echo "Trabajados: " . $fila['Count'];
        ?>
    </span>



<?php } } ?>


    

