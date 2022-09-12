<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	session_start();
	global $connect;
	
	$idEmpresa = $_POST["idempresa"];
	$Usuario = $_SESSION["usuario"]; 
	    $folio = $_POST["folio"];
		$Fecha = $_POST["fecha"];
		$fini = $_POST["fecha"];
		$Producto = $_POST["producto"];
		$Destino = $_POST["destino"];
		$Turno = $_POST["turno"];
		$Capacidad= $_POST["capacidad"]; 
		$CentroEntrega = $_POST["centroentrega"]; 
		$Medio = $_POST["medio"];
		$EstadoA= $_POST["estadoatencion"];
		$Entrega = $_POST["entrega"];
		
		if (isset($_POST['entrega']) == 'LAB LLENADERA') {
			$check = 0;
			
			
			
			if (isset($_POST['vehiculo']))
			{
				$Vehiculo = $_POST["vehiculo"];	
			}else{
				$Vehiculo= '';	
			}
			if (isset($_POST['chofer']))
			{
				$Chofer= $_POST["chofer"];	
			}else{
				$Chofer= '';	
			}
		
			
		}
		else{
		$Vehiculo = '';	
		$Chofer= '';
			
		}
		$index = 0;
		foreach($folio as $folio)  {	
		 
		
		
		
$query = "Update pedido set fecha = '".$Fecha[$index]."', producto = '".$Producto[$index]."',  destino = '".$Destino[$index]."', 
turno = '".$Turno[$index]."', Capacidad = '".$Capacidad[$index]."', 
CentroEntrega = '".$CentroEntrega[$index]."', Medio = '".$Medio[$index]."',  
EstadoAtencion = '".$EstadoA[$index]."', IdEmpresa = '".$idEmpresa[$index]."', 
Entrega = '".$Entrega[$index]."', Vehiculo = '".$Vehiculo[$index]."', 
Chofer = '".$Chofer[$index]."', Usuario = '".$Usuario."' where folio= '".$folio."' ";
 
 
 
 
 
		$result = mysqli_query($connect,$query);
		

		$index = $index + 1;
		}
		
		
		if(($result)==1){ 
		
	 if (isset($_POST['dos'])) { 
   
   echo '
   <script>  </script>
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../pedidoscnvotradmin.php" name="frm1">
    <input type="hidden" name="IdEmpresa" value="TODOS" />
	 <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
     <input type="hidden" name="fini" value="'.$_POST['fecha'][0].'" />
   </form>
</body>
  ';
		
		
 
} else {
}	
			exit();
		}else{ 
		
		 if (isset($_POST['dos'])) {
  echo "<script>
alert('Error al Actualizar Pedido');

</script>";
		
		//window.location.href='../pedidoscnvotradmin.php';
 
} else {
}
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
