		<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	global $connect;
	
	
	  
		$IdEMpresa = $_POST["idempresa"];
		$Nombre = $_POST["nombre"];
		$IdDestino = $_POST["iddestino"];
		$Destino = $_POST["destino"];
		$Direccion = $_POST["direccion"]; 	
		$Permiso = $_POST["permiso"];  
		
		
	    $query = "Insert into destinos (idempresa, iddestino, nombre, destino, direccion, permiso) values ('".$IdEMpresa."','".$IdDestino."', '".$Nombre."','".$Destino."','".$Direccion."', '".$Permiso."')";

		$result = mysqli_query($connect,$query);
		
		if(($result)==1){
			
			
					 


echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Destino Agregado Correctamente" /> 
	       </form>
		   </body> ';	
		
			
		//	header("location: NvoClienteGC.html");
			exit();
		}else{
			
			 

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Agregar Destino" /> 
	       </form>
		   </body> ';	
			
			// header("location: NvoClienteError.html");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
