
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	
	
	
	
	
	
	
	global $connect;
	
	
	
	    $IdEmpresa = $_POST["idempresa"];
		$RzonSocial = $_POST["rzonsocial"];
		$RLegal = $_POST["rlegal"];
		$Domicilio = $_POST["domicilio"];
		$Correo = $_POST["correo"];
		$Telefono= $_POST["telefono"]; 
		$Contacto = $_POST["contacto"];
		$Usuario = $_POST["usuario"];
		//$Contrasena = $_POST["contrasena"];
		$RFC = $_POST["RFC"];
		
		
		//echo $folio;
		
		
		
$query = "Update empresa set IdEmpresa = '".$IdEmpresa."', RzonSocial = '".$RzonSocial."',  RLegal = '".$RLegal."', 
Domicilio = '".$Domicilio."', Correo = '".$Correo."', Telefono = '".$Telefono."', 
Contacto = '".$Contacto."', Usuario = '".$Usuario."', rfc = '".$RFC."' where IdEmpresa= '".$IdEmpresa."' ";
 
		$result = mysqli_query($connect,$query);
		
		if(($result)==1){ 
		 
		
		
		 
echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Cliente Actualizado Correctamente" /> 
	       </form>
		   </body> ';	
			
			exit();
		}else{ 
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Actualizar Cliente" /> 
	       </form>
		   </body> ';	
			 
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
