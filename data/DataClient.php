<?php 
require 'connector.php';
   session_start();	 
global $connect;  

$result = mysqli_query($connect, "SELECT t1.IdEmpresa, t1.RzonSocial, t1.Domicilio,t1.RLegal, t1.Credito, IF(t2.Credito=0,'CONTADO','CREDITO') AS FP, 
                   (SELECT    GROUP_CONCAT(noestacion SEPARATOR ', ') FROM destinos WHERE idempresa = '".$_SESSION['idempresa']."' 
                   GROUP BY idempresa) AS noestacion, (SELECT GROUP_CONCAT(distinct CentroEntrega SEPARATOR ', ') FROM condiciones  
                   WHERE idempresa = '".$_SESSION['idempresa']."' GROUP BY idempresa) AS CentroEntrega, t1.Contacto, 
                   t1.Correo, t1.RFC,  t2.Porcentaje, t2.PorcentajePremium,  t2.PorcentajeDiesel, t1.Telefono 
                   FROM empresa t1 INNER JOIN estadocuenta t2 ON t1.IdEmpresa = t2.IdEmpresa WHERE t1.idempresa='".$_SESSION['idempresa']."'");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
}

echo json_encode($data);
exit();