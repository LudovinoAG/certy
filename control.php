<?php 
header("Pragma: public");
header("Expires: 0");
$filename = "ReporteCertificadoras.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

$serverName = "989J4V1\SQLAGENTS"; //serverName\instanceName
// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"ventas");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$count = 0;
$fecha = $_POST['txtfecha'];
$nuevafecha = date('d/m/Y', strtotime($fecha));
if( $conn ) {
    $sql = "SELECT * FROM certy WHERE fecha='".$nuevafecha. "'";

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
}
?>