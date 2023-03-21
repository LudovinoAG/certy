<?php
$serverName = "989J4V1\SQLAGENTS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"ventas");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$count = 0;
$fecha = date("d/m/Y");
if( $conn ) {
    $sql = "SELECT * FROM certy WHERE fecha='".$fecha. "'";
    $stmt = sqlsrv_query($conn, $sql);
    echo "<table class='table table-condensed'>
    <thead>
        <h6>LISTADO DE ORDENES TRABAJADAS</h6>
        <hr/>
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
?>