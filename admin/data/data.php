<?php 
require 'connector.php';
global $connect; 

 
$id = $_GET['value'];  

$result = mysqli_query($connect, "SELECT iddestino, destino FROM destinos where idempresa='".$id."'");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();