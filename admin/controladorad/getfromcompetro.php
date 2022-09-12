<?php
//getimpuestos
require 'connector.php';
global $connect;
  
   
	$query = "SELECT Fecha as cFecha, Magna as cMagna, Premium as cPremium, Diesel as cDiesel FROM preciosproducto WHERE centroentrega = '629-TAD MAZATLAN, SIN.' order by fecha desc"; 
	$result = mysqli_query($connect, $query) or die("Error in Selecting " . mysqli_error($connect));
		$emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    } 
	$myJSON = json_encode($emparray); 
 
$data = json_decode($myJSON,true); // decode
$data = array_merge(...$data); // merge
echo json_encode($data, JSON_PRETTY_PRINT); // recode
	 
	   

?>
