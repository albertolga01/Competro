<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	

	
	global $connect;
	
//	$Usuario = $_POST["Usuario"];

	//$row = mysqli_query($connect,"SELECT IdEmpresa FROM empresa where usuario = '".$Usuario."'"); 
	//$row = $row->fetch_assoc();     // row will be an array

	
	session_start();	
	
	
	
		$id = $_POST["id"];
		$Fecha = $_POST["fecha"];
		$Producto = $_POST["Producto"];
		$Destino = $_POST["Destino"];
		$Turno = $_POST["Turno"];
		$Capacidad= $_POST["Capacidad"]; 
		$CentroEntrega = $_POST["CentroEntrega"];
		$Presentacion = $_POST["Presentacion"];
		$Medio = $_POST["Medio"];
		$Transportista= $_POST["Transportista"];
		$Entrega = $_POST["Entrega"];
		$Vehiculo = $_POST["Vehiculo"];	
		$Chofer= $_POST["Chofer"];		
		
		
	    $query = "Insert into pedido (Fecha, Producto, Destino, Turno, Capacidad, CentroEntrega, Presentacion, Medio, Transportista,IdEmpresa, Vehiculo, Chofer, Entrega) values ('".$Fecha."','".$Producto."', '".$Destino."','".$Turno."', '".$Capacidad."','".$CentroEntrega."', '".$Presentacion."','".$Medio."', '".$Transportista."' , '".$id."', '".$Vehiculo."', '".$Chofer."', '".$Entrega."')";

		$result = mysqli_query($connect,$query);
		
		if(($result)==1){ 
			header("location:pedidos.php");
		//echo $row['IdEmpresa'];
		
		
			exit();
		}else{ 
			header("location:pedidos.php"); 
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>