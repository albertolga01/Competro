
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	 
	session_start();	 
	
	global $connect;
	
	
	
	

			
		$date = $_POST["fecha"];
		$string = str_replace('/', '-', $date);
		$date = date('Y-m-d',time());//date variable
		$ingresada = strtotime($string);	
		
		 $datee = date('Y-m-d',time());//date variable 	
		 $QueryHorario = "SELECT HorarioVerano FROM Comercializadora";
		 $resh = $connect->query($QueryHorario);
		 if ($resh->num_rows > 0) {
		 // output data of each row
		 while($rowh = $resh->fetch_assoc()) {
			 $horario = $rowh['HorarioVerano']; 
		 }
	 }
	 
	  if(date('N', strtotime($datee)) == 6) { 
		  

		if($horario == '1'){
				$hora = 19;// 19 para horario verano  -- 20 horario dé invierno
				$dia = 2;
				$msj = "No es posible actualizar los pedidos para el lunes despues de la 1:00 pm.";
		}else{
				$hora = 20;// 19 para horario verano  -- 20 horario dé invierno
				$dia = 2;
				$msj = "No es posible actualizar los pedidos para el lunes despues de la 1:00 pm.";
		}
				
		 
		 
		 }else{ 
			if($horario == '1'){
				$msj = "No es posible actualizar los pedidos para el día de mañana despues de las 9:00 am.";
				$hora = 15; //15 para horario verano  -- 16 horario dé invierno
				$dia = 1;
			}else{
				$msj = "No es posible actualizar los pedidos para el día de mañana despues de las 9:00 am.";
			  	$hora = 16; //15 para horario verano  -- 16 horario dé invierno
			  	$dia = 1;
			}

		 
		 }
	
		
	//Guardar();
		 
		if($ingresada == strtotime($date .' + '.$dia.' day') ){
		$now = new DateTime();
				$twoPm = new DateTime();
		$twoPm->setTime($hora,0); // 9:00 AM
				if ( $now > $twoPm ){ // such comparison exists in PHP >= 5.2.2
				//no actualizar
				
				echo '  
		     
			<body onload="setTimeout(function() { document.frm1.submit() }, 500)">
			<form method="post" action="../pedidoscnvotr.php" name="frm1">
	        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
			<input type="hidden" name="CentroEntrega" value="'.$_POST['CentroEntrega'].'" />
	        <input type="hidden" name="Autot" value="AUTOTANQUE" />
	        <input type="hidden" name="mensaje" value="'.$msj.'" />
			</form>
			</body> ';
				}else{
				Guardar();
	
				}
					
			}else{
				Guardar();
			}
		  
			
   }





function Guardar(){
	global $connect;
		$bool = false;
	
	    $folio = $_POST["folio"];
		$Usuario = $_SESSION["usuario"]; 
		$Fecha = $_POST["fecha"];
		$fini = $_POST["fecha"]; 
		$Destino = $_POST["destino"];
		$Turno = $_POST["turno"];
		$Capacidad= $_POST["capacidad"];  
		$Presentacion = $_POST["presentacion"];
		$Medio = $_POST["medio"]; 
		$Entrega = $_POST["entrega"];
	$index = 0; 
	
		$EstadoA= $_POST["estadoatencion"];
		
	foreach($folio as $F){	   
			if (isset($_POST['vehiculo'][$index])){
				$Vehiculo = $_POST["vehiculo"][$index];  
			}else {$Vehiculo = '';}
			
			
			if (isset($_POST['chofer'][$index])){
				$Chofer= $_POST["chofer"][$index]; 
			}else {$Chofer = '';}
			
			if($_POST['estadoatencion'][$index] === 'CANCELADO'){
				$bool = true; 
			}
			
			
				$pro = '';
				if($_POST['producto'][$index]=='GASOLINA 87 OCT'){
					$pro = 'Magna';
				}
				if($_POST['producto'][$index]=='GASOLINA 91 OCT'){
					$pro = 'Premium';
				}
				if($_POST['producto'][$index]=='DIESEL'){
					$pro = 'Diesel';
				}
				 
				
				$sqlpro = "SELECT ".$pro." as precio FROM preciosproducto order by Fecha desc limit 1";
		//echo $sqlpro;
					$resulttpro = $connect->query($sqlpro); 
					$calculado = 0;
					if ($resulttpro->num_rows > 0) {
					while($rowp = $resulttpro->fetch_assoc()) {   
					$precio = $rowp['precio']; 
					//echo $precio;
					}
					
					$calculado = $precio * $_POST['capacidad'][$index];
					}
			
			
			
		//drop comprometido as calculado out of the update 
		if($_POST['estadoatencion'][$index] === 'CANCELADO'){ 
			$query = "Update pedido set canceladocte = '1', Vehiculo = '".$Vehiculo."',  turno = '".$_POST['turno'][$index]."', Capacidad = '".$_POST['capacidad'][$index]."', Chofer = '".$Chofer."', EstadoAtencion = '".$_POST['estadoatencion'][$index]."', Usuario = '".$_SESSION['usuario']."' where folio= '".$_POST['folio'][$index]."' ";

		}else{
			$query = "Update pedido set Vehiculo = '".$Vehiculo."',  turno = '".$_POST['turno'][$index]."', Capacidad = '".$_POST['capacidad'][$index]."', Chofer = '".$Chofer."', EstadoAtencion = '".$_POST['estadoatencion'][$index]."', Usuario = '".$_SESSION['usuario']."' where folio= '".$_POST['folio'][$index]."' ";

		}
				
				$result = mysqli_query($connect,$query);
				
				
				$index++;
				
			}
		
		if(($result)==1){ 
		
	 if (isset($_POST['dos'])) { 
   
	   Notificacion();
	   
	   if($bool == false){
	   
			   echo ' 
			   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
			   <form method="post" action="../pedidoscnvotr.php" name="frm1">
				 <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
				<input type="hidden" name="Autot" value="AUTOTANQUE" />
				<input type="hidden" name="CentroEntrega" value="'.$_POST['CentroEntrega'].'" />
			   </form>
			</body> ';
	   }
	   
	   if($bool == true){
	   echo '
 
      <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
       <form method="post" action="../pedidoscnvotr.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	 <input type="hidden" name="Autot" value="AUTOTANQUE" />
	 <input type="hidden" name="CentroEntrega" value="'.$_POST['CentroEntrega'].'" />
      </form>
       </body>  ';
	    }
		
		
 
    } 			
	exit();
    }else{ 
		
		if (isset($_POST['dos'])) {
        echo ' 
		       <script>alert("No se ha posido actualizar los pedidos."); </script>
			   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
			   <form method="post" action="../pedidoscnvotr.php" name="frm1">
		       <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
			   <input type="hidden" name="Autot" value="AUTOTANQUE" />
			   <input type="hidden" name="CentroEntrega" value="'.$_POST['CentroEntrega'].'" />
			   </form>
			   </body> ';
		
		
                  } 	exit();
    }
		
	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
	
}



function Notificacion(){
	
	
	
	
require __DIR__ . '/vendor/autoload.php';

  $options = array(
    'cluster' => 'us3',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '2d121696457cd9fb762b',
    '38789528e9faed125322',
    '1018745',
    $options
  );
  $data['Mensaje'] = 'Se Actualizó un Pedido';
  $data['Usuario'] = $_SESSION['usuario'];

  $pusher->trigger('my-channel', 'my-event', $data);
}





?>
