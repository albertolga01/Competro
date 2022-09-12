<?php

require 'connector.php';
global $connect;
 
$Fecha = $_POST['Fecha'];
$Producto = $_POST['Producto'];
$Precio = $_POST['Precio'];
$Destino = $_POST['Destino'];
$CentroEntrega = $_POST['CentroEntrega'];

 


$query = "Insert into precioventavigente (Fecha, Producto, Precio, Destino, CentroEntrega) values ('".$Fecha."', '".$Producto."', '".$Precio."', '".$Destino."', '".$CentroEntrega."')";
   $result = mysqli_query($connect, $query);
if ($result)
{   
 print "1";
}
else{
 print "0";
}

	
?>

