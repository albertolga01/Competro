<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	global $connect;
	
	
	
	
	
	
	

	 
		$RzonSocial = $_POST["RzonSocial"];
		$RLegal = $_POST["RLegal"];
		$Domicilio = $_POST["Domicilio"];
		$Correo = $_POST["Correo"];
		$Telefono = $_POST["Telefono"];
		$Contacto= $_POST["Contacto"];
		$Usuario = $_POST["Usuario"];
        $Contrasena = $_POST["Contrasena"]; 
		$RFC = $_POST["RFC"]; 
		
		
	    $query = "Insert into empresa (RzonSocial, RLegal, Domicilio, Correo, Telefono, Contacto, Usuario, Contrasena, rfc) values ('".$RzonSocial."','".$RLegal."', '".$Domicilio."','".$Correo."', '".$Telefono."', '".$Contacto."', '".$Usuario."', '".$Contrasena."', '".$RFC."')";

		$result = mysqli_query($connect,$query);
		
		if(($result)==1){
			
			/*
					echo "<script>
alert('Cliente Agregado Correctamente');
window.location.href='../clientes.php';
</script>";*/

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Cliente Agregado Correctamente" /> 
	       </form>
		   </body> ';	 
		
			
		//	header("location: NvoClienteGC.html");
			exit();
		}else{
			
		/*	echo "<script>
alert('Error al Agregar Cliente');
window.location.href='../clientes.php';
</script>";*/

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Agregar Cliente" /> 
	       </form>
		   </body> ';	 
			
			// header("location: NvoClienteError.html");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
