<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	 
	
	
	Credito();
	
	
	
}


function Credito()
{
	//al guardar un movimiento 0diferenciar si es abono a credito o modalidad contado 
	global $connect;
	
	 if(isset($_POST['sel'])){ 
	 
	 
	
		$Seleccion = $_POST['Abono']; 
		
	$index = 0;
	$Fecha = $_POST["sel"];
	    $i = 0;
		foreach($Seleccion as $F)  		
		{ 
		if(in_array($F, $_POST['sel'])){
			
			$TipoPago = "Select Credito from estadocuenta where idempresa = '".$_POST["IdEmpresa"][$i]."'";
	$rtc = $connect->query($TipoPago); 
					if ($rtc->num_rows > 0) {
					while($roc = $rtc->fetch_assoc()) {  
					$Credito = $roc['Credito'];  
					  } 
					  
					}
					
				 
	
	if($Credito == 1){
		$a = $_POST['Abono'][$i]; 
			
				$query = "Insert into Movimientos (Fecha, Concepto, Referencia,  Abono, IdEmpresa) 
			 values ('".$_POST['Fecha'][$i]."','".$_POST['Concepto'][$i]."', '".$_POST['Referencia'][$i]."', '".$_POST['Abono'][$i]."', '".$_POST['IdEmpresa'][$i]."')";	
			    	$result = mysqli_query($connect,$query);
				
			    	 $dos = $_POST['Abono'][$i];
				
					$sql = "SELECT saldocredito FROM estadocuenta where IdEmpresa = '".$_POST["IdEmpresa"][$i]."'";
		
					$resultt = $connect->query($sql);
					$NvoSaldo = 0;
 
				
					if ($resultt->num_rows > 0) {
					while($row = $resultt->fetch_assoc()) {  
					$uno = $row['saldocredito'];
					  }
					 
					  $NvoSaldo = ($uno - $dos);
					  
					//  UPDateCredito($NvoSaldo, $_POST['IdEmpresa'][$i]);
			
					}
					
					
					$sobra = 0;
					$contador = 0;
					//insert into 0cargos y aplicacions until Abono <= 0 
					$sobra = $a;
					while($contador<20){
						//get last factura where faltante >0 
							
							$W = "Select folio, factura, fecha, restante, total from facturas where restante > 0 and idempresa = '".$_POST['IdEmpresa'][$i]."' order by fecha asc ";
							$resultt = $connect->query($W);
					 
 
					if ($resultt->num_rows > 0) {
					while($row = $resultt->fetch_assoc()) {  
					$foli = $row['folio'];
					$Factura = $row['factura'];
					$Fech = $row['fecha']; 
					$restante = $row['restante']; 
					$ImporteFac = $row['total']; 
								} 
			
						
						
						//break if theres no more facturas to be paid  saldo credito 
						if($a >= $restante){ 
							
							
							//set restante factura = 0 
							$NvoRestante = "update facturas set restante = '0' where folio = '".$foli."'";
							$resNvoRes = mysqli_query($connect, $NvoRestante);
							
							$a = $a - $restante;
							
							
							//insert into tabla de cargos y aplicaciones 
							 
							$QInsert = "Insert into cargosaplicaciones (Factura, Importe, FP, Moneda, FechaV, TipoPago, TadBanco, Documento, Fecha, Abono, Intereses, IVA, IdEmpresa) 
							values ('".$Factura."','".$ImporteFac."','CONTADO','NACIONAL','".$Fech."','PAGO CON RECIBO DE FONDOS','-','".$_POST['Referencia'][$i]."','".$_POST['Fecha'][$i]."', '".$restante."','0', '0', '".$_POST['IdEmpresa'][$i]."')";
							
							$result = mysqli_query($connect,$QInsert); 
							if(($result)==1){$Importe = 0;
							
							// $sobra = $a;  
							
							}else{
							} 
							
							
						}else{
							 
							//no alcanza pero abonalo al restante de la factura 
							$Dif = $restante - $a;
							$NvoRestantea = "update facturas set restante = '".$Dif."' where folio = '".$foli."'";
							$resNvoR = mysqli_query($connect, $NvoRestantea);
							
							
							if($a > 0){
							$QInsert = "Insert into cargosaplicaciones (Factura, Importe, FP, Moneda, FechaV, TipoPago, TadBanco, Documento, Fecha, Abono, Intereses, IVA, IdEmpresa) 
							values ('".$Factura."','".$ImporteFac."','CONTADO','NACIONAL','".$Fech."','PAGO CON RECIBO DE FONDOS','-','".$_POST['Referencia'][$i]."','".$_POST['Fecha'][$i]."', '".$a."','0', '0', '".$_POST['IdEmpresa'][$i]."')";
							
							$result = mysqli_query($connect,$QInsert); 
							if(($result)==1){$Importe = 0;
							}else{
							}
							}
							 
							$a = 0;
							
							
						}
						
						
						}
						
						
						else{
						 
						
					}
						
					$contador++; 
						if($contador >= 20){
							
						//	$a=0;
						
						
						}
					}
					
					 
					
					if($sobra > 0 ){
						 
							$sqlsobra = "SELECT Sobrante FROM estadocuenta where IdEmpresa = '".$_POST["IdEmpresa"][$i]."'";
		
					$resulttr = $connect->query($sqlsobra);
					$NvoSobrante = 0; 
					if ($resulttr->num_rows > 0) {
					while($rowr = $resulttr->fetch_assoc()) {  
					$Sobrante = $rowr['Sobrante'];
					  }
					  
					  $NvoSobrante = ($Sobrante + $a);
					  
					  $sqlupdatesobra = "update estadocuenta set Sobrante = '".$NvoSobrante."' where IdEmpresa = '".$_POST["IdEmpresa"][$i]."'";
						$connect->query($sqlupdatesobra);
					  
			 
					
					
			
					}
			
					}
					
					
					
					 
					
				
					
					
	}
	if($Credito == 0){
		
		 
				$a = $_POST['Abono'][$i];
			//echo $a;
			
				$query = "Insert into Movimientos (Fecha, Concepto, Referencia,  Abono, IdEmpresa, Disponible) 
			 values ('".$_POST['Fecha'][$i]."','".$_POST['Concepto'][$i]."', '".$_POST['Referencia'][$i]."', '".$_POST['Abono'][$i]."', '".$_POST['IdEmpresa'][$i]."', '".$_POST['Abono'][$i]."')";	
			    	$result = mysqli_query($connect,$query);
				
			    	 $dos = $_POST['Abono'][$i];
				
					$sql = "SELECT saldo FROM estadocuenta where IdEmpresa = '".$_POST["IdEmpresa"][$i]."'";
		
					$resultt = $connect->query($sql);
					$NvoSaldo = 0;
 
					if ($resultt->num_rows > 0) {
					while($row = $resultt->fetch_assoc()) {  
					$uno = $row['saldo'];
					  }
					 
					  $NvoSaldo = ($uno + $dos);
					  
					  UPDate($NvoSaldo, $_POST['IdEmpresa'][$i]);
			
					}
					
					 	 
					  
			
	           }
			
			
			
			
					
					
					 
			
			
		}
		
			
			
		
			$i++;
		}
		
		
			
	
				
				
				// <form method="post" action="../cargamovimientos.php" name="frm1">
		if(($result)==1){  
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../cargamovimientos.php" name="frm1"> 
		   <input type="hidden" name="fini" value="'.$_POST['Fecha'][0].'" /> 
	       </form>
		   </body> ';	 
		}
		else{
			
			echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../cargamovimientos.php" name="frm1"> 
		   <input type="hidden" name="fini" value="'.$_POST['Fecha'][0].'" /> 
	       </form>
		   </body> ';	 
		}
		
	
	}else {
		 
		echo "<script>
alert('Seleccione a menos un movimiento');
window.location.href='../cargamovimientos.php';
</script>"; 
	 }
	
	
}


function Contado()
{
	//al guardar un movimiento 0diferenciar si es abono a credito o modalidad contado 
	global $connect;
	
	 if(isset($_POST['sel'])){
		 echo "isset";
	 
	$max = sizeof($_POST['Abono']);
	

		
	$index = 0;
	$Fecha = $_POST["sel"];
	
		for($i = 0; $i < $max;$i++)
		{ 
			
		
			if(isset($_POST['sel'][$i])){  
			
	
			}
	
			
		}
		
		
			
	
				
				//<form method="post" action="../cargamovimientos.php" name="frm1"> <form method="post" action="../cargamovimientos.php" name="frm1">
				
		if(($result)==1){  
		echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../cargamovimientos.php" name="frm1">
		   <input type="hidden" name="fini" value="'.$_POST['Fecha'][0].'" /> 
	       </form>
		   </body> ';	 
		}
		else{
			
			echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../cargamovimientos.php" name="frm1">
		   <input type="hidden" name="fini" value="'.$_POST['Fecha'][0].'" /> 
	       </form>
		   </body> ';	 
		}
		
	
	}else {
		 
		echo "<script>
alert('Seleccione al menos un movimiento');
window.location.href='../cargamovimientos.php';
</script>"; 
	 }
	
	
}

function UPDate($NS, $ID){
global $connect;
	
			$UpdateQuery = "update estadocuenta set Saldo = '".$NS."' where IdEmpresa = '".$ID."' ";
					  $r = $connect->query($UpdateQuery);
					  if($r==1){
						  	 // echo "<script>alert('actualizado correctamente'); </script>";
					  }else{
						  echo "Error";
					  }
		}
		
		
		
function UPDateCredito($NS, $ID){
global $connect;
	
			$UpdateQuery = "update estadocuenta set SaldoCredito = '".$NS."' where IdEmpresa = '".$ID."' ";
					  $r = $connect->query($UpdateQuery);
					  if($r==1){
						  	 // echo "<script>alert('actualizado correctamente'); </script>";
					  }else{
						  echo "Error";
					  }
		}


?>