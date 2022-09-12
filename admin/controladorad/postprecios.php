<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}

//Post back values 
function Login()
{ 
	global $connect; 
		$Fecha = $_POST["fini"];
	    $Magna = $_POST["magna"];
		$Premium = $_POST["premium"];
		$Diesel = $_POST["diesel"]; 						$Centroentrega = $_POST["centroentrega"]; 
		
		$date = $_POST["fini"];
		$string = str_replace('/', '-', $date);
		$Fech =  date('Y-m-d', strtotime($string. ' + 0 days')); 
		


//Check if exits
$sql = "SELECT folio FROM preciosproducto where Fecha = '".$Fech."' and Centroentrega = '".$Centroentrega."'";
		
					$resultt = $connect->query($sql); 
					
					if ($resultt->num_rows > 0) {
					while($row = $resultt->fetch_assoc()) {  
					//Exists take folio 
					$folio = $row["folio"]; 
					}
					
					//Update 
					$UpdateQuery = "Update preciosproducto set Magna = '".$Magna."', Premium = '".$Premium."', Diesel = '".$Diesel."', Centroentrega = '".$Centroentrega."' where folio = '".$folio."'";
					$rr = $connect->query($UpdateQuery);
					if(($rr)==1){
			
				echo "<script>
alert('Precios Actualizados Correctamente');
window.location.href='../capturapreciosproducto.php';
</script>";
			
		
			exit();
		}else{
			
			echo "<script>
alert('Error al Actualizar Precios');
window.location.href='../capturapreciosproducto.php';
</script>";
		
			exit();
		}
					}else{
						
						   $query = "Insert into preciosproducto (Fecha, Magna, Premium, Diesel, Centroentrega) 
		values ('".$Fech."', '".$Magna."','".$Premium."', '".$Diesel."', '".$Centroentrega."')"; 
		$result = mysqli_query($connect,$query); 
		if(($result)==1){
			
				echo "<script>
alert('Precios Guardados Correctamente');
window.location.href='../capturapreciosproducto.php';
</script>";
			
		
			exit();
		}else{
			
			echo "<script>
alert('Error al Guardar Precios');
window.location.href='../capturapreciosproducto.php';
</script>";
		
			exit();
		}
						
					}
		
		
		
	 
		 

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

function UPDate($NS, $ID){
	
	global $connect;
	
	//window.location.href='../cargafacturas.php';
	
			$UpdateQuery = "update estadocuenta set Saldo = '".$NS."' where IdEmpresa = '".$ID."' ";
					  $r = $connect->query($UpdateQuery);
					  if($r==1){
						  	echo "<script>
alert('Factura Agregada Correctamente');
window.location.href='../cargafacturas.php';
</script>"; 
					  }else{
						  echo "Error";
					  }
	
	
}




?>
