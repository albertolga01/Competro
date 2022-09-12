<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	global $connect;
	
	
	  
		$IdEMpresa = $_POST["idempresa"];
		$Vehiculo = $_POST["vehiculo"];
		$Descripcion = $_POST["descripcion"]; 
		
		
	    $query = "Insert into vehiculos (idempresa, vehiculo, descripcion) values ('".$IdEMpresa."','".$Vehiculo."', '".$Descripcion."')";

		$result = mysqli_query($connect,$query);
		
		if(($result)==1){
			
			
				 

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Vehiculo Agregado Correctamente" /> 
	       </form>
		   </body> ';	
		
			
		//	header("location: NvoClienteGC.html");
			exit();
		}else{
			
			 

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Agregar Vehiculo" /> 
	       </form>
		   </body> ';	
			
			// header("location: NvoClienteError.html");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
