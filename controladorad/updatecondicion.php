
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	
	
	
	
	
	
	
	
	
	global $connect;
	
	
	
		$IdCondicion = $_POST["idcondicion"];
		$CentroEntrega = $_POST["centroentrega"];
		$Producto = $_POST["producto"]; 
		$Destino = $_POST["destino"]; 
		$Moneda = $_POST["moneda"]; 
		$MedioT = $_POST["mediot"]; 
		$TipoM = $_POST["tipom"]; 
		$Entrega = $_POST["entrega"]; 
		 
		//echo $folio;
		
		
		
$query = "Update condiciones set CentroEntrega = '".$CentroEntrega."', Producto = '".$Producto."', 
Destino = '".$Destino."' , Moneda = '".$Moneda."' , MedioT = '".$MedioT."' , Entrega = '".$Entrega."', TipoM = '".$TipoM."'   where IdCondicion= '".$IdCondicion."' ";
 
		$result = mysqli_query($connect,$query);
		
		if(($result)==1){ 
		 
		
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Condición Actualizada Correctamente" /> 
	       </form>
		   </body> ';	
		
		 
			exit();
		}else{ 
		
		
			 
				echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Actualizar Condición" /> 
	       </form>
		   </body> ';	
			
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
