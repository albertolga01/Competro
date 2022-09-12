
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	
	
	
	
	
	
	
	global $connect;
	
	
	
		$IdVehiculo= $_POST["idvehiculo"];
		$Vehiculo = $_POST["vehiculo"];
		$Descripcion = $_POST["descripcion"]; 
		
		//echo $folio;
		
		
		
$query = "Update vehiculos set Vehiculo = '".$Vehiculo."', Descripcion = '".$Descripcion."' where IdVehiculo= '".$IdVehiculo."' ";
 
		$result = mysqli_query($connect,$query);
		
		if(($result)==1){ 
		 echo '     <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../clientes.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Vehiculo Actualizado Correctament5	" />  
					   </form>
					</body> 
					  '; 
			exit();
		}else{ 
		
		
			 
echo '     <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../clientes.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Error al Actualizar Vehiculo" />  
					   </form>
					</body> 
					  '; 

			 
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
