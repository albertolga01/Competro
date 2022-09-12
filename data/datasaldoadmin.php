<?php 
require 'connector.php';
global $connect;  
 

$id = $_GET['value'];  

$result = mysqli_query($connect, "SELECT (Select sum(restante) as Restante from facturas where IdEmpresa = '".$id."') as SaldoCredito, t1.Sobrante, t1.LimC, t1.Credito as FP, sum(t2.Comprometido) as saldoComprometido, 
(Select sum(disponible) as Restante from movimientos where IdEmpresa = '".$id."') as SaldoContado FROM estadocuenta t1 
inner join pedido t2 on t1.IdEmpresa = t2.IdEmpresa where t1.IdEmpresa =  '".$id."'");

$data = array();
while ($row = mysqli_fetch_object($result))
{
    array_push($data, $row);
	
}
	
echo json_encode($data);
exit();