<?php 
require 'connector.php';
global $connect; 

session_start();	

$result = mysqli_query($connect, "SELECT idvehiculo, vehiculo FROM vehiculos where idempresa='".$_SESSION["idempresa"]."'");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();