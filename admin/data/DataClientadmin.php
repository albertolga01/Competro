<?php 
require 'connector.php';
   session_start();	 
global $connect;  
$id = $_GET['value'];  

$result = mysqli_query($connect, "SELECT t1.IdEmpresa, t1.RzonSocial, t1.Domicilio,  t1.RLegal, t2.Credito, 
    IF(t2.Credito=0,'CONTADO','CREDITO') AS FP, t1.Contacto, t1.Correo, t1.RFC, (SELECT    GROUP_CONCAT(noestacion SEPARATOR ', ') 
    FROM destinos WHERE idempresa = '".$id."' GROUP BY idempresa) AS noestacion, (SELECT    GROUP_CONCAT(DISTINCT CentroEntrega SEPARATOR ', ') 
    FROM condiciones WHERE idempresa = '".$id."' GROUP BY IdEmpresa) AS CentroEntrega, t2.Porcentaje, t2.PorcentajePremium, 
    t2.PorcentajeDiesel, t1.Telefono FROM empresa t1 INNER JOIN estadocuenta t2 ON t1.idempresa = t2.idempresa WHERE t1.idempresa='".$id."'");
	
$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();