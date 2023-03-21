<?php
$serverName = "989J4V1\SQLAGENTS"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"ventas");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
//$count = 0;
$fecha = date("d/m/Y");

if( $conn ) {
    $sql = "SELECT certificadora, COUNT(certificadora) AS Count FROM certy WHERE fecha='".$fecha."'GROUP BY certificadora ORDER BY Count DESC ";

    $stmt = sqlsrv_query($conn, $sql);
    while($fila = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
?>

        <span id='agent_label' class='alert-primary position-relative'>
        
            <?php
                echo $fila['certificadora'];
            ?>


            <span id='agent_count' class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>
            <?php
                echo $fila['Count'];
            ?>
            </span>

        </span>


<?php } } ?>


    

