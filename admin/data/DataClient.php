<?php 
require 'connector.php';
   session_start();	 
global $connect;  

$result = mysqli_query($connect, "SELECT IdEmpresa, RzonSocial, Domicilio,
RLegal, IF(Credito=0,'CONTADO','CREDITO') as FP, Contacto, Correo, RFC, CentroEntrega, Porcentaje, Telefono FROM empresa where idempresa='".$_SESSION["idempresa"]."'");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();