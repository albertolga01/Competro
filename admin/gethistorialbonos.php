<?php
//gethistorialbonos
require 'connector.php';
global $connect;

$Id = $_POST['t'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$id_estacion = $_POST['id_estacion'];
$tipo = $_POST['tipo']; 

if($Id == "uno"){
	
$exist = "Select folio from historialbonos where month(fecha) = '".$mes."' and year(fecha) = '".$ano."' and id_estacion = '".$id_estacion."'";
$rtc = $connect->query($exist); 
					if ($rtc->num_rows >= 5) { 
						print "1";
					}else{ 
						 print "0";
					}
	
}
if($Id == "dos"){
	if($_POST['tx'] == 1){
	$query = "select Concepto, Porcentaje, Porcentajed from historialbonos where id_estacion = '".$id_estacion."' and month(fecha)= '".$mes."' and year(fecha) = '".$ano."' and t = '".$_POST['tx']."'";   
	}
	if($_POST['tx'] == 2){
	$query = "select Concepto, Porcentajet as Porcentaje from historialbonos where id_estacion = '".$id_estacion."' and month(fecha)= '".$mes."' and year(fecha) = '".$ano."' and t = '".$_POST['tx']."'";   
	}
	$result = mysqli_query($connect, $query) or die("Error in Selecting " . mysqli_error($connect));
		$emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    }
	 
	  $myJSON = json_encode($emparray);   
	  
	  echo $myJSON;
	
	
}
if($Id == "tres"){
	if($_POST['tx'] == 1){
		//ley del mar agg un espacio en columna 12
		if($id_estacion == 2){
$query = "select comisionu as uno, jefeu as dos, jefed as tres, comisiond as comision, atencionu as cuatro, atenciond as cinco, cubre as seis, ' j' as x, operativo as siete  from historialbonos where id_estacion = '".$id_estacion."' and month(fecha) = '".$mes."' and year(fecha) = '".$ano."' and t = '".$_POST['tx']."'";   
		}
	}
	if($_POST['tx'] == 2){
$query = "select comisionu as uno, extrau as dos, extrad as tres from historialbonos where id_estacion = '".$id_estacion."' and month(fecha) = '".$mes."' and year(fecha) = '".$ano."' and t = '".$_POST['tx']."'";   
	}
	
	$result = mysqli_query($connect, $query) or die("Error in Selecting " . mysqli_error($connect));
 
		$emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    } 
	$myJSON = json_encode($emparray); 
	
	echo $myJSON;
	
	
}
if($Id == "cuatro"){
	
	
	$query = "SELECT t2.nombre as nombree from asignarempleados t1 inner join empleados t2 on t1.id_empleado = t2.id_empleado 
	where t1.puesto = '".$tipo."' and t1.id_estacion = '".$id_estacion."' ";  
	 
	$result = mysqli_query($connect, $query) or die("Error in Selecting " . mysqli_error($connect));
	 
		$emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
        $emparray[] = $row;
    } 
		$myJSON = json_encode($emparray); 
 
$data = json_decode($myJSON,true); // decode
$data = array_merge($data); // merge
echo json_encode($data, JSON_PRETTY_PRINT); // recode

	
	
}
  
	   

?>
