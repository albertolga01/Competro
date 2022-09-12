<?php 
require 'connector.php';
   session_start();	 
global $connect;  
$id = $_GET['value'];  

$result = mysqli_query($connect, "SELECT IdEmpresa, RzonSocial, Domicilio,
RLegal, Credito, IF(Credito=0,'CONTADO','CREDITO') as FP, Contacto, Correo, RFC, CentroEntrega, Porcentaje FROM empresa where idempresa='".$id."'");
	
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();