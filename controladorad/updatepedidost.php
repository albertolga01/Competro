
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
 
	
	if(isset($_POST['uno'])){
		Login();
	}
	
	if(isset($_POST['dos'])){
		Reprogramar();
		 
	}
	
	
}


function Login()
{
	 
	session_start();	
	 
	global $connect;
	$check = 0;
	 
		$Usuario = $_SESSION["usuario"];   
		$folio = $_POST["folio"];  
		
		
		 
		$index = 0;
		
			$folio = $_POST["folio"];  
		$i = 0;
		foreach($folio as $Folio)  {  
				if((isset($_POST['sel'][$i]))==$_POST['folio'][$i]){
					$Q = "Update pedido set Programado = '1' where folio = '".$_POST['sel'][$i]."'";
					
					$r = mysqli_query($connect,$Q);
				}
				
				$i++;
		}
		
		$a = 0;
		if(isset($_POST['Comprometido'])){
			
		
		foreach($folio as $F){	
		
		$q = "Select Comprometido from pedido where folio= '".$F."'";
		$rr = mysqli_query($connect,$q);
		if ($rr->num_rows > 0) {
					// output data of each row
					while($row = $rr->fetch_assoc()) {  
					$Com = $row["Comprometido"]; 
					}
			}
			if($Com > 0){ 
			//si el comprometido existe liberalo del estado de cuenta 
			$SaldoComActual = $Com;
			$SaldoComprometidoCliente = "select  SaldoComprometido from estadocuenta where idempresa = '".$_POST['idempresa'][$a]."'";
			$res = mysqli_query($connect, $SaldoComprometidoCliente);
			if($res->num_rows){
				while($ro = $res->fetch_assoc()){
					$SaldoAct = $ro["SaldoComprometido"];
					
				}
			}
			//$NewS = $SaldoAct - $Com;
			//Update libre
			//$UpdateSal = "update estadocuenta set SaldoComprometido = '".$NewS."' where idempresa = '".$_POST['idempresa'][$a]."'";
			//$rest = mysqli_query($connect, $UpdateSal); 
			
			//add el nuevo saldo comprometido
			//$UpSaldo = "Update estadocuenta set SaldoComprometido = '".$Recalculado."' where idempresa = '".$_POST['idempresa'][$a]."'";
			//$xQ = mysqli_query($connect, $UpSaldo);
			
			$qq = "Select SaldoComprometido from estadocuenta where idempresa = '".$_POST['idempresa'][$a]."'";
					$rrr = mysqli_query($connect,$qq);
					if ($rrr->num_rows > 0) { 
					while($roww = $rrr->fetch_assoc()) {   
					$Comp = $roww["SaldoComprometido"];  
					}
					 }
					 if($_POST["Comprometido"][$a]>0){
					//$Nvo = $Comp + $_POST["Comprometido"][$a];
					//$quer= "Update estadocuenta set 
				//SaldoComprometido = '".$Nvo."' where idempresa= '".$_POST['idempresa'][$a]."' ";
				//$y = mysqli_query($connect,$quer);
					 }
			
				}else{
					//set new comprometido value estado de cuenta  
					$qq = "Select SaldoComprometido from estadocuenta where idempresa = '".$_POST['idempresa'][$a]."'";
					$rrr = mysqli_query($connect,$qq);
					if ($rrr->num_rows > 0) { 
					while($roww = $rrr->fetch_assoc()) {   
					$Comp = $roww["SaldoComprometido"];  
					}
					 }
					 if($_POST["Comprometido"][$a]>0){
					$Nvo = $Comp + $_POST["Comprometido"][$a];
					$quer= "Update estadocuenta set 
				SaldoComprometido = '".$Nvo."' where idempresa= '".$_POST['idempresa'][$a]."' ";
				$y = mysqli_query($connect,$quer);
					
					 }
					
					
					//echo $_POST['Comprometido'][$a];
					
					$queryy= "Update pedido set 
				Comprometido = '".$_POST['Comprometido'][$a]."', Usuario = '".$_SESSION['usuario']."' where folio= '".$F."' ";
				$res = mysqli_query($connect,$queryy);
				
				}
			$a++; 
			}
		
		}
		$t = 0;
		foreach($folio as $F){	
			
			if($_POST['estadoatencion'][$t] == 'CANCELADO'){
				//update estado del pedido 
				 
				//echo '<br>'; 
				$sql = "Select Comprometido from pedido where folio = '".$F."'";
				$ress = mysqli_query($connect, $sql);
				if($ress->num_rows > 0){
				while($roo = $ress->fetch_assoc()){
					$SaldoPedido = $roo["Comprometido"];
					
					}
					//echo '<br>';
					//echo $SaldoPedido;
				}	
				
				
				
				
				//get saldo comprometido actual de cliente 
				$Querie = "Select SaldoComprometido from estadocuenta where idempresa = '".$_POST['idempresa'][$t]."'";
				$resQuerie = mysqli_query($connect, $Querie);
				if($resQuerie->num_rows > 0){
				while($roQ = $resQuerie->fetch_assoc()){
					$SaldoComprometidoCliente = $roQ["SaldoComprometido"];
					
					}
				//	echo '<br>';
				//	echo $SaldoComprometidoCliente;
				}	
				
				
				
				
				//calcula nvo saldo comprometido al restarselo al actual del cliente 
				$nvoSaldoComprometido =  $SaldoComprometidoCliente - $SaldoPedido;
			//	echo '<br>';
			//	echo $nvoSaldoComprometido;
				
				//libera el comprometido del estado de cuenta y pon en 0 el comprometido del pedido by updating saldo
				$Q = "Update estadocuenta set SaldoComprometido = '".$nvoSaldoComprometido."' where idempresa = '".$_POST['idempresa'][$t]."'";
				$x = mysqli_query($connect, $Q);
				
				$QPedido = "Update pedido set Comprometido = '0' where Folio = '".$F."'";
				$restx = mysqli_query($connect, $QPedido); 
				
				
				
				//Set estado atencion as cancelado
				$Qst = "Update pedido set EstadoAtencion = 'CANCELADO' where folio = '".$F."'";
				$xst = mysqli_query($connect, $Qst);
				
				
			}
				
			$t++;
			
		}
		
		
		
		
		
		
		
		$x = 0;
		$in = 0;

			foreach($folio as $F){	
			 
			
			if(isset($_POST['sel'])){
				
			
			if(in_array($F, $_POST['sel'])){
 	 
			
				 
			
					$pro = '';
				if($_POST['producto'][$in]=='GASOLINA 87 OCT'){
					$pro = 'Magna';
				}
				if($_POST['producto'][$in]=='GASOLINA 91 OCT'){
					$pro = 'Premium';
				}
				if($_POST['producto'][$in]=='DIESEL'){
					$pro = 'Diesel';
				}
				   
				  
				
				//se actualiza el saldo comprometido del pedido, 
				$sqlpro = "SELECT precio FROM precioventavigente where producto = '".$pro."' and destino = '".$_POST['destino'][$in]."' order by Fecha desc limit 1";
		
					$resulttpro = $connect->query($sqlpro); 
					
					if ($resulttpro->num_rows > 0) {
					while($rowp = $resulttpro->fetch_assoc()) {  
					//Exists take folio 
					$precio = $rowp["precio"]; 
					}
					
					$calculado = ($precio * $_POST['capacidad'][$in]) ;
					
					}
					////echo $calculado;
					//echo $precio;
			 
			 
			$query = "Update pedido set 
				EstadoAtencion = '".$_POST['estadoatencion'][$in]."', Usuario = '".$_SESSION['usuario']."', comprometido = '".$calculado."' where folio= '".$F."' ";
				
				$result = mysqli_query($connect,$query);
				
				
				//sum calculado al estado cuenta
				
				
				
				
				$SaldoComprometidoCliente = "select  SaldoComprometido from estadocuenta where idempresa = '".$_POST['idempresa'][$in]."'";
			$res = mysqli_query($connect, $SaldoComprometidoCliente);
			if($res->num_rows){
				while($ro = $res->fetch_assoc()){
					$SaldoAct = $ro["SaldoComprometido"];
					
				}
			} 
			//$NewS = $SaldoAct + $calculado;
			//echo 'Hola	';
			//Update
			//$UpdateSal = "update estadocuenta set SaldoComprometido = '".$NewS."' where idempresa = '".$_POST['idempresa'][$in]."'";
			//$rest = mysqli_query($connect, $UpdateSal); 
				
				$index++; 
				
				// echo $F;
			}
		
			}			
				$in++;			
			}
		
		
		
		
		
		
		$inx = 0;
			foreach($folio as $F){	
			 
			 
			 
			 //update estado de atenvion 
			 //echo $_POST['estadoatencion'][$inx];
			 $Queryestadoa = "Update pedido set estadoatencion = '".$_POST['estadoatencion'][$inx]."' where folio = '".$F."'";
			 $estadoa = mysqli_query($connect, $Queryestadoa); 
			 
			 //if programado = 1
			 
			 $Qu = "Select programado from pedido where folio = '".$F."'";
			 
			 $Qur = mysqli_query($connect, $Qu);
			if($Qur->num_rows){
				while($roq = $Qur->fetch_assoc()){
					$programado = $roq["programado"];
					
				}
			} 
			
			if($programado == 1){
				
			
			
			if($_POST['estadoatencion'][$inx] == 'CONFIRMADO CLIENTE'){
				  
				 //no estas liberando el comprometido de ese pedido +++
				 
				 //get saldocomprometido del pedido 
				 
				 $QR = "Select comprometido from pedido where folio = '".$F."'";
				 $uno = mysqli_query($connect, $QR);
				if($uno->num_rows){
				while($rok = $uno->fetch_assoc()){
					$A = $rok["comprometido"]; 
				  }
			    } 
				 
				 
				 //get saldocomprometido del estado cuenta del cliente 
				 $QRdos = "Select saldocomprometido from estadocuenta where idempresa = '".$_POST['idempresa'][$inx]."'";
				  $dos = mysqli_query($connect, $QRdos);
				if($dos->num_rows){
				while($rokd = $dos->fetch_assoc()){
				//	$B = $rokd["saldocomprometido"]; 
				  }
			    } 

				 
				 //restalo 
				// $NvoSaldoCEC = $B - $A;
				 
				// $UpdateEstadoCuenta = "Update estadocuenta set saldocomprometido = '".$NvoSaldoCEC."' where idempresa = '".$_POST['idempresa'][$inx]."'";
				// $rest = mysqli_query($connect, $UpdateEstadoCuenta); 
				 //agg el nuevo saldo comprometido del pedido 
				 
				// $Agg = "Update estadocuenta set saldocomprometido = '".$NvoSaldoCEC."'  where idempresa = '".$_POST['idempresa'][$inx]."'";
			
					$pro = '';
				if($_POST['producto'][$inx]=='GASOLINA 87 OCT'){
					$pro = 'Magna';
				}
				if($_POST['producto'][$inx]=='GASOLINA 91 OCT'){ 
	

					$pro = 'Premium';
				}
				if($_POST['producto'][$inx]=='DIESEL'){
					$pro = 'Diesel';
				}
				  
				
				//se actualiza el saldo comprometido del pedido, 
				$sqlpro = "SELECT precio FROM precioventavigente where producto = '".$pro."' and destino = '".$_POST['destino'][$inx]."'  and CentroEntrega = '".$_POST['centroorigen'][$inx]."' order by Fecha desc limit 1";
		//echo $sqlpro;
					$resulttpro = $connect->query($sqlpro); 
					
					if ($resulttpro->num_rows > 0) {
					while($rowp = $resulttpro->fetch_assoc()) {  
					//Exists take folio 
					$precio = $rowp["precio"]; 
					}
					
					$calculado = ($precio * $_POST['capacidad'][$inx]) ;
					
					}
					//echo $calculado;
					echo "<br>";
					 
			$query = "Update pedido set 
				EstadoAtencion = '".$_POST['estadoatencion'][$inx]."', Usuario = '".$_SESSION['usuario']."', comprometido = '".$calculado."' where folio= '".$F."' ";
				
				$result = mysqli_query($connect,$query);
				
				
				//sum calculado al estado cuenta
				
				
				
				
				$SaldoComprometidoCliente = "select  SaldoComprometido from estadocuenta where idempresa = '".$_POST['idempresa'][$inx]."'";
			$res = mysqli_query($connect, $SaldoComprometidoCliente);
			if($res->num_rows){
				while($ro = $res->fetch_assoc()){
					$SaldoAct = $ro["SaldoComprometido"];
					
				}
			} 
			$NewS = $SaldoAct + $calculado; 
			//Update
			$UpdateSal = "update estadocuenta set SaldoComprometido = '".$NewS."' where idempresa = '".$_POST['idempresa'][$inx]."'";
			$rest = mysqli_query($connect, $UpdateSal); 
				
				 
				
				// echo $F;
			}
		
				
	
			}else{}				
				$inx++;			
			}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		if((isset($result))==1){ 
		
	 
	

   
   
   echo '
 
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	  <input type="hidden" name="finial" value="'.$_POST['fechafinal'].'" />
	 <input type="hidden" name="centroorigen" value="'.$_POST['centroorigen'][0].'" />
	 <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
   </form>
</body>
   
   
  ';
		
		 
			exit();
		}else{ 
		 
		 
	 
  
echo '
 
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
<form method="post" action="../pedidosrprogramadosadmin.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	  <input type="hidden" name="finial" value="'.$_POST['fechafinal'].'" />
	 <input type="hidden" name="centroorigen" value="'.$_POST['centroorigen'][0].'" />
	 <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
   </form>
</body>
   
   
  ';

		
		
 
 
		
		
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}






function Reprogramar(){
	
	global $connect;

	session_start();	
	
	$datee = str_replace('/', '-', $_POST['fecha']);
					$Feche = date('d/m/Y', strtotime($datee. ' + 7 days')); 
				 
	
	
	//aqui verifica si ya existealgun pedido con estadoatencion as calculado if else 
		$existe = "select  folio  from pedido where estadoatencion = 'CALCULADO' and fecha = '".$Feche."'";
			$rews = mysqli_query($connect, $existe);
			if($rews->num_rows > 0){
				//while($ro = $resw->fetch_assoc()){
					//$SaldoAct = $ro["SaldoComprometido"];	
				//}
			
			
			
			  echo '
 
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	  <input type="hidden" name="finial" value="'.$_POST['fechafinal'].'" />
	 <input type="hidden" name="centroorigen" value="'.$_POST['centroorigen'][0].'" />
	 <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
	  <input type="hidden" name="mensaje" value="Ya se han reprogramado pedidos para este día." />
   </form>
</body>
   
   
  ';
		  
			
	
	} else{
		
		 
	
	
	
	
	
 
	
		if(isset($_POST['medio'])=='AT'){
			$Medio = 'AUTOTANQUE'; 
		}
		
		
	
	global $connect;
	$id = $_SESSION["idempresa"]; 
		$Usuario = $_SESSION["usuario"]; 
		$Fecha = $_POST["fecha"];     
		$Folio = $_POST["folio"];     
		 
	  
		
		$index = 0;
	$result = 0;
	
	foreach($Folio as $F)  {		
				
				 
				 
			
			if($_POST['idcondicion'][$index]!=0){
				
				
			
				 
					
					
		      	$sql = "SELECT IdCondicion, IdEmpresa, CentroEntrega, producto, destino, mediot, tipom, entrega FROM condiciones where idcondicion = '".$_POST["idcondicion"][$index]."'";
		
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
					$client = $row["IdEmpresa"];
					
					}
					 
					}
					
					
					$date = str_replace('/', '-', $_POST['fecha']);
					$Fech = date('d/m/Y', strtotime($date. ' + 7 days')); 
				 
					
					
						 
					$query = "Insert into pedido (Fecha, Producto, Destino,  Presentacion, CentroEntrega, Medio, IdEmpresa, Entrega, Usuario, IdCondicion, EstadoAtencion) 
					values ('".$Fech."','".$Product."', '".$Dest."', 'M3', '".$CEntrega."','AUTOTANQUE',  '".$client."' , '".$Entregaa."', '".$_SESSION['usuario']."',  '".$_POST["idcondicion"][$index]."', 'CALCULADO' )";	
				$result = mysqli_query($connect,$query);
				
				
				}
				
				$index++;
				
				
	 
                }
				
				
				
			
		
		
		if(($result)==1){ 
		
		  echo '
 
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	  <input type="hidden" name="finial" value="'.$_POST['fechafinal'].'" />
	 <input type="hidden" name="centroorigen" value="'.$_POST['centroorigen'][0].'" />
	 <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
   </form>
</body>
   
   
  ';
	 
			exit();
		}else{ 
		 
           echo '
 
   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
   <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1">
     <input type="hidden" name="fini" value="'.$_POST['fecha'].'" />
	  <input type="hidden" name="finial" value="'.$_POST['fechafinal'].'" />
	 <input type="hidden" name="centroorigen" value="'.$_POST['centroorigen'][0].'" />
	 <input type="hidden" name="EstadoA" value="CONFIRMADO CLIENTE" />
   </form>
</body>
   
   
  ';
		 
			exit();
		}
	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
	
				
				 
			}
}



?>
