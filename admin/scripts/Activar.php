<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require '../connector.php';
	Login();
}


function Login()
{
	
	
	
	global $connect;
	
	 

	
	if($_POST["NvaContrasena"] == $_POST["CC"]){	
	
	if(strlen($_POST["NvaContrasena"])> 7 and strlen($_POST["NvaContrasena"])< 13){
	
		$Usuario = $_POST["Usuario"];
        $Contrasena = $_POST["Contrasena"]; 
		 $NvaContrasena = $_POST["NvaContrasena"]; 
        $ConfContrasena = $_POST["CC"]; 
		
     //select if activo 
	 
	 	    $QActivo = "Select Activo, nousuario from usuarios where Usuario = BINARY '".$Usuario."' and Contrasena = BINARY '".$Contrasena."' limit 1 ";
			$resA = mysqli_query($connect,$QActivo);
		 
		if(mysqli_num_rows($resA) == 1){ 
		while($rowA = $resA->fetch_assoc()) {   
					$A = $rowA["Activo"]; 
					$Id = $rowA["nousuario"]; 
					}
		
		
		if($A == 0){
			
		$upPass = "Update usuarios set Contrasena = '".$NvaContrasena."', Activo = '1' where nousuario = '".$Id."' ";
  
		$resupPass = mysqli_query($connect,$upPass);
		
		if(($resupPass)==1){ 
		 echo '
		    <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
		    <form method="post" action="../index" name="frm1">
		    <input type="hidden" name="mensaje" value="Cuenta activada y contraseña actualizada correctamente" /> 
	        </form>
		    </body> ';	 
			exit();
		
		}else{
			//
			 echo ' 
		    <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
			<form method="post" action="../activacion" name="frm1">
		    <input type="hidden" name="mensaje" value="Error al activar cuenta -codigo: 1801" /> 
	        </form>
		    </body> ';	 
			exit();
			
		}
			
			
		}else if($A ==1){
			 echo '
		    <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
			<form method="post" action="../index" name="frm1">
		    <input type="hidden" name="mensaje" value="Esta cuenta ya ha sido activada -código: 1082" /> 
	        </form>
		    </body> ';	 
			exit();
			
		}
		
		  
		}else{
			// <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
			echo '
		   
			<form method="post" action="../activacion" name="frm1">
		    <input type="hidden" name="mensaje" value="Usuario y/o contraseña incorrectos -código: 1803" /> 
	        </form>
		    </body> ';	 
			exit();
		}
		
	 
	  
	}else{
		
		echo '
		    <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
			<form method="post" action="../activacion" name="frm1">
		    <input type="hidden" name="mensaje" value="La contraseña debe contener al menos 8 caracteres y un máximo de 12 caracteres -código: 1804" /> 
	        </form>
		    </body> ';	 
			exit();
	}
		
		
	}
	else{
			echo '
		    <body onload="setTimeout(function() { document.frm1.submit() }, 300)">
			<form method="post" action="../activacion" name="frm1">
		    <input type="hidden" name="mensaje" value="Las contraseñas no coinciden -código: 1805" /> 
	        </form>
		    </body> ';	 
			exit();
		}
	 
  
}

?>	