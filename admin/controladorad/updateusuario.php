
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	
	
	
	
	
	
	
	global $connect;
	
	
		$Id = $_POST["idusuario"];
	    $IdEmpresa = $_POST["idempresa"]; 
		$TipoUsuario = $_POST["tipousuario"];
		$Descripcion = $_POST["descripcion"];  
		
		
		
$query = "Update usuarios set TipoUsuario = '".$TipoUsuario."', Descripcion = '".$Descripcion."' where NoUsuario= '".$Id."' and IdEmpresa = '".$IdEmpresa."' ";
 
		$result = mysqli_query($connect,$query);
		
		if(($result)==1){ 
	 

echo ' 
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../clientes" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Usuario Actualizado Correctamente" />  
					   </form>
					</body>
					    
					  '; 
		
		
		 
			exit();
		}else{ 
		//
		
		 
echo ' 
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../clientes" name="frm1"> 
						  <input type="hidden" name="mensaje" value="Error al Actualizar Usuario" />  
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
