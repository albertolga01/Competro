<?php 
require 'connector.php';
global $connect;  
 
 

$result = mysqli_query($connect, "Select fecha, magna, premium, diesel from preciosproducto order by fecha desc limit 1");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
	
}
	
echo json_encode($data);
exit();