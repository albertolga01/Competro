<?php 
require 'connector.php';
global $connect;  
session_start();
 
 $uno = "SELECT t1.fecha, t1.magna, t1.premium, t1.diesel, t1.nmagna as nm, t1.npremium as np, t1.ndiesel as nd, t2.porcentaje, t2.porcentajepremium, t2.porcentajediesel FROM decuentovigente t1 INNER JOIN estadocuenta t2 ON t2.IdEmpresa = '".$_SESSION['idempresa']."' where Magna is not null ORDER BY fecha DESC LIMIT 1";

$result = mysqli_query($connect, $uno);

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
	
}
	
echo json_encode($data);
exit();