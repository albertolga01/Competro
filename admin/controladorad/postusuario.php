		<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	global $connect;
	
	
	  
		$IdEMpresa = $_POST["idempresa"];
		$Usuario = $_POST["usuario"];
		$Contrasena = $_POST["contrasena"];
		$TP = $_POST["tipousuario"];
		$Descripcion = $_POST["descripcion"]; 	 
		
		
	    $query = "Insert into usuarios (idempresa, usuario, contrasena, tipousuario, descripcion) 
		values ('".$IdEMpresa."','".$Usuario."', '".$Contrasena."','".$TP."','".$Descripcion."')";

		$result = mysqli_query($connect,$query);
		
		if(($result)==1){
			
			
					 


echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes" name="frm1">
		   <input type="hidden" name="mensaje" value="Usuario Agregado Correctamente" /> 
	       </form>
		   </body> ';	
		
			
		//	header("location: NvoClienteGC.html");
			exit();
		}else{
			
			 

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Agregar Usuario" /> 
	       </form>
		   </body> ';	
			
			// header("location: NvoClienteError.html");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
