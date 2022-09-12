<?php 
require 'connector.php';
global $connect;

$Fecha = $_POST['Fecha'];
$CentroEntrega = $_POST['CentroEntrega'];


$query = "SELECT * FROM precioventavigente WHERE Fecha = '".$Fecha."'  and centroentrega = '".$CentroEntrega."'";
$result = mysqli_query($connect,$query); 
if ($result->num_rows > 0) {
print "1";
}else{
print "0";  
}  
		 

?>