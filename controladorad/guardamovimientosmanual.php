<?php 
//Guarda Movs Manual
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Insert();
	
}
function Insert()
{
global $connect;


$TipoPago = "Select Credito from estadocuenta where idempresa = '".$_POST["IdEmpresa"]."'";
	$rtc = $connect->query($TipoPago); 
					if ($rtc->num_rows > 0) {
					while($roc = $rtc->fetch_assoc()) {  
					$Credito = $roc['Credito'];  
					  } 
					  
					}
					
				 	

if($Credito == 0){

	$string = str_replace('/', '-', $_POST['Fecha']); 
    $stringg = date('Y-m-d', strtotime($string));
	 
	
//set disponible y actualiza el estado cuenta del cliente 
	$query = "Insert into Movimientos (Fecha, Concepto, Referencia,  Abono, IdEmpresa, DIsponible) 
			 values ('".$stringg."','".$_POST['Concepto']."', '".$_POST['Referencia']."', '".$_POST['Abono']."', '".$_POST['IdEmpresa']."', '".$_POST['Abono']."')";	
			    	$result = mysqli_query($connect,$query);
					
					$dos = $_POST['Abono'];
				
					$sql = "SELECT saldo FROM estadocuenta where IdEmpresa = '".$_POST["IdEmpresa"]."'";
		
					$resultt = $connect->query($sql);
					$NvoSaldo = 0;
 
					if ($resultt->num_rows > 0) {
					while($row = $resultt->fetch_assoc()) {  
					$uno = $row['saldo'];
					  }
					 
					  $NvoSaldo = ($uno + $dos);
					  
					 // UPDate($NvoSaldo, $_POST['IdEmpresa']);
			
					} 
					
					
					
					
}if($Credito == 1){
	
	
		$a = $_POST['Abono']; 
		$string = str_replace('/', '-', $_POST['Fecha']); 
    $stringg = date('Y-m-d', strtotime($string));
			
				$query = "Insert into Movimientos (Fecha, Concepto, Referencia,  Abono, IdEmpresa) 
			 values ('".$stringg."','".$_POST['Concepto']."', '".$_POST['Referencia']."', '".$_POST['Abono']."', '".$_POST['IdEmpresa']."')";	
			    	$result = mysqli_query($connect,$query);
				
			    	 $dos = $_POST['Abono'];
				
					$sql = "SELECT saldocredito FROM estadocuenta where IdEmpresa = '".$_POST["IdEmpresa"]."'";
		
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
							
							$W = "Select folio, factura, fecha, restante, total from facturas where restante > 0 and idempresa = '".$_POST['IdEmpresa']."' order by fecha asc ";
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
							values ('".$Factura."','".$ImporteFac."','CONTADO','NACIONAL','".$Fech."','PAGO CON RECIBO DE FONDOS','-','".$_POST['Referencia']."','".$_POST['Fecha']."', '".$restante."','0', '0', '".$_POST['IdEmpresa']."')";
							
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
							values ('".$Factura."','".$ImporteFac."','CONTADO','NACIONAL','".$Fech."','PAGO CON RECIBO DE FONDOS','-','".$_POST['Referencia']."','".$_POST['Fecha']."', '".$a."','0', '0', '".$_POST['IdEmpresa']."')";
							
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
						 
							$sqlsobra = "SELECT Sobrante FROM estadocuenta where IdEmpresa = '".$_POST["IdEmpresa"]."'";
		
					$resulttr = $connect->query($sqlsobra);
					$NvoSobrante = 0; 
					if ($resulttr->num_rows > 0) {
					while($rowr = $resulttr->fetch_assoc()) {  
					$Sobrante = $rowr['Sobrante'];
					  }
					  
					  $NvoSobrante = ($Sobrante + $a);
					  
					  $sqlupdatesobra = "update estadocuenta set Sobrante = '".$NvoSobrante."' where IdEmpresa = '".$_POST["IdEmpresa"]."'";
						$connect->query($sqlupdatesobra);
					  
			 
					
					
			
					}
			
					}
					
	
	
	
	
	
	
}



if(($result) == 1){
						  echo "<script>alert('actualizado correctamente'); </script>";
						echo '
					   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
					   <form method="post" action="../cargamovimientosmanual.php" name="frm1">  
					   <input type="hidden" name="fini" value="'.$_POST['Fecha'].'" /> 
					   </form>
					   </body> ';	 
						
					}else{
						
						
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
?>