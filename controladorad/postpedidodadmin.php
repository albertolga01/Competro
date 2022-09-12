<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	global $connect;
	session_start();	
	
	
	
		$id = $_POST["idempresa"]; 
		$Usuario = $_SESSION["usuario"]; 
		$Fecha = $_POST["fecha"]; 
		$Producto = $_POST["producto"];
		$Destino = $_POST["destino"];
		$Turno = $_POST["turno"];
		$Medio = $_POST["medio"];
		$Capacidad= $_POST["capacidad"]; 
		$CentroEntrega = $_POST["centroentrega"]; 
		$Entrega = $_POST["entrega"];
		if(isset($_POST["vehiculo"])){$Vehiculo = $_POST["vehiculo"];	}else{$Vehiculo = '0';}
		if(isset($_POST["chofer"])){$Chofer = $_POST["chofer"];	}else{$Chofer = '0';}
			
		
		$date = $_POST["fecha"];
		$string = str_replace('/', '-', $date);
		$date = date('Y-m-d',time());//date variable
		$ingresada = strtotime($string);
		$hoy = strtotime($date);
		$MaxDate =  date('Y-m-d', strtotime($date. ' + 10 days')); 
		
		
		//if($ingresada>$hoy and $ingresada < strtotime($date. ' + 7 days')){
			//Se Realiza Alta de Pedido
			
			  $query = "Insert into pedido (Fecha, medio, Presentacion, Producto, Destino, Turno, Capacidad, CentroEntrega,  IdEmpresa, Entrega, Vehiculo, Chofer, Usuario) values ('".$Fecha."', '".$Medio."','M3' ,'".$Producto."', '".$Destino."','".$Turno."', '".$Capacidad."','".$CentroEntrega."',   '".$id."', '".$Entrega."', '".$Vehiculo."', '".$Chofer."', '".$Usuario."')";

		$result = mysqli_query($connect,$query);
		if(($result)==1){ 
		
		
		
						echo '
					  
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../pedidoscnvotradmin.php" name="frm1">
						 <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
						 <input type="hidden" name="IdEmpresa" value="TODOS" />
						  <input type="hidden" name="mensaje" value="Pedido Guardado Correctamente" />
						  <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
						 
					   </form>
					</body>
					   
					   
					  '; 
		
				exit();
		}else{ 
		
		
		
		
		if (isset($_POST['dos'])) {
	
    echo "<script>
alert('Error al Guardar Pedido');
window.location.href='pedidoscnvotradmin.php';
</script>";
		
 
} 
		
		
		
		
		
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
			
	/*
		}
		else if($ingresada===$hoy){
			//No Se Realiza Alta de Pedido, Establecer Parametros Hora(Plitica de cambios y cancelaciones)
			
		echo'	<script> alert("Pedido No Capturado - Verifique la Fecha"); </script>
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../pedidoscnvotradmin.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	 <input type="hidden" name="IdEmpresa" value="TODOS" />
	  <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
	 
   </form>';
			
		}else {
			//No se Permite Realizar el pedido para el pasado
		echo $_POST['fecha'];
			echo'	<script> alert("Pedido No Capturado - Verifique la Fechahh"); </script>
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../pedidoscnvotradmin.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" /> 
	 <input type="hidden" name="IdEmpresa" value="TODOS" />
	  <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
	 
   </form>';
		}
		
		*/
		
	  
}
//pedidoscnvotradmin.php
?>