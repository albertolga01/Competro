<?php 
require 'connector.php';
global $connect;  
session_start();
 
 

$result = mysqli_query($connect, "SELECT t1.fecha, t1.magna, t1.premium, t1.diesel, t2.porcentaje, t2.porcentajepremium, t2.porcentajediesel FROM decuentovigente t1 INNER JOIN estadocuenta t2 ON t2.IdEmpresa = '".$_SESSION["idempresa"]."' ORDER BY fecha DESC LIMIT 1");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
	
}
	
echo json_encode($data);
exit();