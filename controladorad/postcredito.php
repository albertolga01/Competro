<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	global $connect;
	

		$Id = $_POST["idempresa"]; 
		$LimC = $_POST["LimC"];
		$Plazo = $_POST["Plazo"];
		$Porcentaje = $_POST["Porcentaje"];
		$Activo = 0;
		if(isset($_POST["Credito"])){
			$Activo = 1;
		}else {
			$Activo = 0;
		}
		  
		
		
	    $query = "Insert into estadocuenta (IdEmpresa, Credito, LimC, Plazo, Porcentaje) values ('".$Id."','".$Activo."','".$LimC."','".$Plazo."','".$Porcentaje."')";

		$result = mysqli_query($connect,$query);
		
		if(($result)==1){
			
			
					 

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Informacion de Credito Agregada Correctamente" /> 
	       </form>
		   </body> ';	
		
			
		//	header("location: NvoClienteGC.html");
			exit();
		}else{
			
			 

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Agregar Credito" /> 
	       </form>
		   </body> ';	
			
			// header("location: NvoClienteError.html");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
