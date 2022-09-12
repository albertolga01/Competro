<?php



//checar si ya se ha capturado esa condicion de envio ese dia if not continue to posting pedido





if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	
	 
	
	Login();
}

 


function Login()
{
	if(empty($_POST['sel'])){ 		
			echo '
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="post" action="../pedidoscnvotrr.php" name="frm1">
        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	    <input type="hidden" name="message" value="Seleccione almenos una condicion -código: 1501" />
		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />
	    <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" /> 
        </form></body> ';
	    } else {
	
	
	
	global $connect;

	session_start();	
	
	
	
		
	
	
		if(isset($_POST['medio'])=='AT'){
			$Medio = 'AUTOTANQUE'; 
		}
		
		
		
		$date = $_POST["fecha"];
		$string = str_replace('/', '-', $date);
		$date = date('Y-m-d',time());//date variable
		$ingresada = strtotime($string);		
		$hoy = strtotime($date);
		$MaxDate =  date('Y-m-d', strtotime($date. ' + 10 days')); 
		
		 $datee = date('Y-m-d',time());//date variable 	

		 $QueryHorario = "SELECT HorarioVerano FROM Comercializadora";
			$resh = $connect->query($QueryHorario);
			if ($resh->num_rows > 0) {
			// output data of each row
			while($rowh = $resh->fetch_assoc()) {
				$horario = $rowh['HorarioVerano']; 
			}
		}
		 
		 if((date('N', strtotime($string)) != 7) or (date('N', strtotime($datee)) == 6)) { 
    
	 
	  if(date('N', strtotime($datee)) == 6) { 
		  
		if($horario == '1'){
			$hora = 19;// 19 para horario verano  -- 20 horario dé invierno
			$dia = 2;
		}else{
			$hora = 20;// 19 para horario verano  -- 20 horario dé invierno
			$dia = 2;
		}
				
				 
		 
		 
		 }else{ 
			if($horario == '1'){
				$hora = 15; //15 para horario verano  -- 16 horario dé invierno
			    $dia = 1;
			}else{
				$hora = 16; //15 para horario verano  -- 16 horario dé invierno
			    $dia = 1;
			}
			  
		 }
	
	
		 
		 
		//quitar guardar y los comentarios 
	//	Guardar();
		
		
		if($ingresada>$hoy and $ingresada < strtotime($date. ' + 10 days')   ){
			//Se Realiza Alta de Pedido verifica la hora tambien mas tardar 9 am 
			 
			
			if($ingresada == strtotime($date .' + '.$dia.' day') ){
				
				
				$now = new DateTime(); 
				$twoPm = new DateTime(); 
				$twoPm->setTime($hora,0); // 9:00 AM
				if ( $now > $twoPm ){ // such comparison exists in PHP >= 5.2.2
				//no guardar
				//echo $_POST['centroentrega'];
	
				echo'	  
       	<body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="post" action="../pedidoscnvotr.php" name="frm1">
        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" /> 
		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" /> 
		<input type="hidden" name="mensaje" value="Pedido no capturado - verifique la fecha y hora -código: 1502 " />
	    <input type="hidden" name="Autot" value="AUTOTANQUE" />
	    </form>';
				}else{
				
					Guardar();
				}
					
			}else{
				Guardar();
			}
			
			
			
				
		}
		else if($ingresada===$hoy){
			//No Se Realiza Alta de Pedido, Establecer Parametros Hora(Plitica de cambios y cancelaciones)		
		echo'	<script> alert("Pedido no capturado - verifique la fecha -código: 1503"); </script>
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="post" action="../pedidoscnvotr.php" name="frm1">
        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />
	    <input type="hidden" name="Autot" value="AUTOTANQUE" />
	    </form>';
			
		}else {
			//No se Permite Realizar el pedido para el pasado	
		echo'	<script> alert("Pedido no Capturado - verifique la fecha -código: 1504"); </script>
       	<body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="post" action="../pedidoscnvotr.php" name="frm1">
        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" /> 
		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />
	    <input type="hidden" name="Autot" value="AUTOTANQUE" />
	    </form>';
		}
		
		
	      //quitar comentario para agregar restriccion de hora
			
			
			} else {
     echo '
        <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
        <form method="post" action="../pedidoscnvotrr.php" name="frm1">
        <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	    <input type="hidden" name="message" value="No es posible programar para el día domingo -código: 1505" />
		<input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />
	    <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" /> 
        </form></body> ';
	        }
		 
			
			}  
			
}


function Guardar(){
	
	global $connect;
	$id = $_SESSION["idempresa"]; 
		$Usuario = $_SESSION["usuario"]; 
		$Fecha = $_POST["fecha"]; 
		$Producto = $_POST["producto"];
		$Destino = $_POST["destino"];  
		$Presentacion = $_POST["presentacion"];
		$CentroEntrega = $_POST["centroentrega"];
		$Medio = $_POST["medio"]; 
		$Entrega = $_POST["entrega"]; 
		$sel = $_POST["sel"]; 
		$index = 0;
	
	
	foreach($Destino as $Destino)  {		
				
				
				
				$error = "1";
				
				
				if((isset($_POST['sel'][$index]))==$_POST['idcondicion'][$index]){
					$error = "10";
					//if no exist {
				//		$sqldos = "select IdCondicion where IdCondicion = '".$_POST['idcondicion']."' and fecha	='".$_POST['fecha']."' limit 1"
				//		$resultt = $connect->query($sqldos);
				//		if ($resultt->num_rows > 0) {
					// output data of each row
				//	while($row = $result->fetch_assoc()) {  
				//		}
				//		}else{
							
							
			//			}
			
			$SaldoCredito = 0;
			
					$QCdisp = "select (Select sum(restante) as Restante from facturas where IdEmpresa = '".$_SESSION['idempresa']."') as SaldoCredito, limc, credito from estadocuenta where idempresa = '".$_SESSION['idempresa']."' ";
					$resQ = $connect->query($QCdisp);
					if ($resQ->num_rows > 0) {
					// output data of each row
					while($rowk = $resQ->fetch_assoc()) {  
 
					$SaldoCredito = $rowk["SaldoCredito"];
					$LimC = $rowk["limc"]; 
					$Cred = $rowk["credito"]; 
				 
					 }
					 
					 
					 if($Cred == 1){
				
					 if($SaldoCredito > 1){
						 $CreditoD = $LimC - $SaldoCredito;
						
					 }else{
						 
						 $CreditoD = $LimC;
					 }
					 
					 
					 if($CreditoD < 300000){
						 
						 $credd =  number_format($CreditoD, 2, '.', ',');
						  
						   echo "<script>
            alert('Su credito disponible actualmente es: $".$credd."  es posible que su pedido sea cancelado');
            </script>";
			
			$result = 0;
			
				 
			
			
					 }else{
						 
						 //Guardar
						 $sql = "SELECT IdCondicion, CentroEntrega, producto, destino, mediot, tipom, entrega FROM condiciones where idcondicion = '".$_POST["sel"][$index]."'";
		
					$result = $connect->query($sql);
 
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {  

					//echo $row["IdCondicion"];
					$CEntrega = $row["CentroEntrega"];
					$Product = $row["producto"];
					$Dest = $row["destino"];
					$Medio = $row["mediot"];
					$Tipo = $row["tipom"];
					$Entregaa = $row["entrega"];
					
					}
					}
					$query = "Insert into pedido (Fecha, Producto, Destino,  Presentacion, CentroEntrega, Medio, IdEmpresa, Entrega, Usuario, IdCondicion) 
					values ('".$_POST['fecha']."','".$Product."', '".$Dest."', '".$_POST['presentacion'][$index]."', '".$CEntrega."','AUTOTANQUE',  '".$_SESSION['idempresa']."' , '".$Entregaa."', '".$_SESSION['usuario']."',  '".$_POST["sel"][$index]."'  )";	
				$result = mysqli_query($connect,$query);
						 
						 
						 
					 }
					 
					 
					 
					 
					 }else{
						// no credito
						 $sql = "SELECT IdCondicion, CentroEntrega, producto, destino, mediot, tipom, entrega FROM condiciones where idcondicion = '".$_POST["sel"][$index]."'";
		
					$result = $connect->query($sql);
 
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {  

					//echo $row["IdCondicion"];
					$CEntrega = $row["CentroEntrega"];
					$Product = $row["producto"];
					$Dest = $row["destino"];
					$Medio = $row["mediot"];
					$Tipo = $row["tipom"];
					$Entregaa = $row["entrega"];
					
					}
					}
					$query = "Insert into pedido (Fecha, Producto, Destino,  Presentacion, CentroEntrega, Medio, IdEmpresa, Entrega, Usuario, IdCondicion) 
					values ('".$_POST['fecha']."','".$Product."', '".$Dest."', '".$_POST['presentacion'][$index]."', '".$CEntrega."','AUTOTANQUE',  '".$_SESSION['idempresa']."' , '".$Entregaa."', '".$_SESSION['usuario']."',  '".$_POST["sel"][$index]."'  )";	
				$result = mysqli_query($connect,$query);
						 
						 
					 }
					 
					 
					}
					
			
			 
					
					
		      	
				}else{
					
				}
				$index++;
			//	$error = $error.$_POST['sel'][$index]." -".$_POST['idcondicion'][$index]."<br>";
				
				
				//}
                }
				
				
				
			
		
		
		if(($result)==1){ 
		
		 if (isset($_POST['dos'])) {	
		 
		 Notificacion();
			echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../pedidoscnvotr" name="frm1">
		   <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
		   <input type="hidden" name="Autot" value="AUTOTANQUE" />
		   <input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />
		   <input type="hidden" name="query" value="'.$QCdisp.'" />
		   <input type="hidden" name="query1" value="'.$error.'" />
	       </form>
		   </body> ';	 
		} else {
 
			}
			exit();
		}else{ 
		 if (isset($_POST['dos'])) {
          echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../pedidoscnvotr" name="frm1">
		   <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
		   <input type="hidden" name="Autot" value="AUTOTANQUE" />
		   <input type="hidden" name="CentroEntrega" value="'.$_POST['centroentrega'].'" />
		   <input type="hidden" name="query" value="'.$QCdisp.'" />
		   <input type="hidden" name="query1" value="'.$error.'" />
	       </form>
		   </body> ';	 
		} else {
        
        }
			exit();
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
  $data['Mensaje'] = 'Se Agregó un Nuevo Pedido';
  $data['Usuario'] = $_SESSION['usuario'];

  $pusher->trigger('my-channel', 'my-event', $data);
}

?>