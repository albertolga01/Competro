
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	
	
	
	
	
	
	
	global $connect;
	
	
	
	    $_POST['idempresa'] = $_POST["idempresa"];
		$Nombre = $_POST["nombre"];
		$IdDestino = $_POST["iddestino"];
		$Destino = $_POST["destino"];
		$Direccion = $_POST["direccion"]; 
		$Permiso = $_POST['permiso'];  
		//echo $folio;
		
		
		
$query = "Update destinos set Destino = '".$Destino."', Direccion = '".$Direccion."', Permiso = '".$Permiso."', Nombre = '".$Nombre."' where IdDestino= '".$IdDestino."' ";
 
		$result = mysqli_query($connect,$query);
		
		if(($result)==1){ 
	 

echo ' 
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../clientes.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Destino Actualizado Correctamente" />  
					   </form>
					</body>
					    
					  '; 
		
		
		 
			exit();
		}else{ 
		
		
		 
echo ' 
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../clientes.php" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Error al Actualizar Destino" />  
					   </form>
					</body>
					    
					  '; 
			//header("location:destinos.php");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
