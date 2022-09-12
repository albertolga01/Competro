<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

require 'connector.php';
global $i;
	
if($_SERVER["REQUEST_METHOD"]=="POST") { 
    $folioa = $_POST['folio'];
    $totala = $_POST['total'];
    $num = count($_POST['folio']); 
    $i = 0;
        //Llamada a uno  <body onload="setTimeout(function() { document.frm1.submit() }, 500)"> 
	Uno();
	
    echo'SALIO DE UNO()';
    echo ' 
		<body>
            <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1"> 
			<input type="submit" value="continuar">
            </form>
        </body>  
    ';
}

function Uno(){
	global $connect; 
	global $i;  
    
	    //If pedido ya ha sido facturado 
	/*
        $FactQ = "SELECT Facturado FROM pedido WHERE folio = '".$_POST["nopedido"]."'"; 
    echo $FactQ;
    echo $_POST['idempresa']."aqui sale ponte vrg";
    echo"<br>".$_POST['nopedido']."<br>";
	$resF = $connect->query($FactQ);  

	if ($resF->num_rows > 0) {
		while($rocF = $resF->fetch_assoc()) {  
			$Fact = $rocF['Facturado'];  
		}

	    if($Fact == 1){ 
		    //pedido ya facturado 
			echo "
                <script>
                    alert('Este Pedido Ya Ha Sido Facturado'); 
                </script>
            ";
		} else { */
			//if contado if credito
			$TipoPago = "SELECT Credito FROM estadocuenta WHERE idempresa = '".$_POST["idempresa"]."'";
			$rtc = $connect->query($TipoPago); 
			
            if ($rtc->num_rows > 0) {
				while($roc = $rtc->fetch_assoc()) {  
					$Credito = $roc['Credito'];  
				} 
			}
					 
			if($Credito == 1){
                echo"creditoo0o0o00";
			    Credito();
			}
			if($Credito == 0){
                echo "contadooo0o0oo";
			    Contado();
			}
            var_dump($_REQUEST);
	    }
	/*} else {
		//pedido no existe 
        echo'ELSE DE FACTURADO FROM PEDIDO';
	}
}*/

function Credito(){  
	global $connect; 
	global $i;
	$Folio = $_POST["folio"];
	$IdEmpresa = $_POST["idempresa"];
	$Factura = $_POST["factura"];
	$Fecha = $_POST["fecha"];
	$Total = $_POST["total"];
	//$NoPedido = $_POST["nopedido"];
	$pdf = $_POST["pdf"];
	$flete = 0;//$_POST["flete"];
	$Concepto = $_POST["concepto"]; 
	$Rfc = $_POST["rfc"];
	$Descuento = 0;//$_POST["descuento"];
	$Cantidad = $_POST["cantidad"];
	$ValorUnitario = $_POST["valorunitario"];
	$Importee = $_POST["importe"];
	$ImpuestosT = $_POST["impuestostrasladados"];
	$ImpuestosR = 0;//$_POST["impuestosretenidos"];
	$Uuid = $_POST["uuid"];
	$FP = 1;//$_POST["FP"];

		//if nopedido existe else goback 
        /*
	$NoPedidoExiste = "SELECT folio FROM pedido WHERE folio = '".$NoPedido."'"; 
	$ResPedido = mysqli_query($connect,$NoPedidoExiste);
	
    if ($ResPedido->num_rows > 0) {		 
		$QPlazo = "SELECT plazo FROM estadocuenta WHERE IdEmpresa = '".$IdEmpresa."'";
		$resultPlazo = mysqli_query($connect,$QPlazo); 
		if ($resultPlazo->num_rows > 0) {
			while($rowPlazo = $resultPlazo->fetch_assoc()) {  
				$Plazo = $rowPlazo['plazo'] + 1; 
			}
		} else {
		    $Plazo = 10;
		}*/$Plazo = 10;
		$FechaV =  date('Y-m-d', strtotime($Fecha. ' + '.$Plazo.' days'));  
		$queryf = "INSERT INTO facturas (Folio, IdEmpresa, Factura, Fecha, Total, pdf, NoPedido, Descuento, Cantidad, ValorUnitario,
            RFC, flete, Concepto, FechaVencimiento, Restante, Importe, ImpuestosTraslados, ImpuestosRetencion, Emisor, Uuid, FP) 
		    VALUES ('".$Folio."', '".$IdEmpresa."','".$Factura."', '".$Fecha."', '".$Total."', '".$pdf."', '10', '".$Descuento."', '".$Cantidad."', '".$ValorUnitario."', '".$Rfc."', '".$flete."', '".$Concepto."', '".$FechaV."', '".$Total."', '".$Importee."', '".$ImpuestosT."', '".$ImpuestosR."', 'Competro', '".$Uuid."', '".$FP."')"; 
        echo $queryf;
		$resultf = mysqli_query($connect,$queryf); 
			    //////////////////////////////////////////////////////////////////
		if(($resultf)== 1){			
		    $Q = "SELECT t1.sobrante AS saldosobrante, t1.limc,  sum(t2.disponible) AS saldocontado,  (SELECT sum(restante) FROM facturas WHERE idempresa = '".$IdEmpresa."' LIMIT 1) AS saldocredito  FROM estadocuenta t1 INNER JOIN movimientos t2 ON t1.idempresa = t2.idempresa WHERE t1.idempresa = '".$$IdEmpresa."' limit 1";
            $RQ = $connect->query($Q);
			
            if ($RQ->num_rows > 0) {
				while($rowRQ = $RQ->fetch_assoc()) {  
                    $saldosobrante = $rowRQ['saldosobrante'];
                    $saldocontado = $rowRQ['saldocontado'];
                    $saldocredito = $rowRQ['saldocredito'];  
                    $limc = $rowRQ['limc'];  
                }

			    $Inserthistorialsaldos = "INSERT INTO historialsaldos (idempresa, saldocontado, saldosobrante, saldocredito, cargo, credito, limc) VALUES ('".$IdEmpresa."', '".$saldocontado."', '".$saldosobrante."', '".$saldocredito."', '".$Total."', '1', '".$limc."')";
                $resHistorialSaldos = mysqli_query($connect, $Inserthistorialsaldos);				
			}								
		}
			    ///////////////////////////////////////////////////////////////////////
		if(($resultf)==1){
            echo "
                <script>
                    alert('Factura Agregada Correctamente: ".$Folio." con total de ".$Total."');     
                </script>
            ";

		    $SQX = "SELECT correo, rzonsocial, usuario FROM empresa WHERE rfc = '".$Rfc."'";
			$resulx = $connect->query($SQX);  
			if ($resulx->num_rows > 0) {
				while($rowh = $resulx->fetch_assoc()) {  
					$Correo = $rowh['correo'];
					$Nombre = $rowh['usuario'];
				}
			}
			    //set facturado true 
			//$Queryst = "UPDATE pedido SET estadoatencion = 'FACTURADO', comprometido = '0',  facturado = '1', FolioFactura = '".$Folio."', Total = '".$Total."' WHERE Folio = '".$NoPedido."' ";
			 
			//$resst = mysqli_query($connect, $Queryst); 
				//cobrar si hay saldo sobrante disponible 
			$sqlsobra = "SELECT Sobrante FROM estadocuenta WHERE IdEmpresa = '".$_POST['idempresa']."'";
		    $resulttr = $connect->query($sqlsobra);
			$NvoSobrante = 0;

			if ($resulttr->num_rows > 0) {
				while($rowr = $resulttr->fetch_assoc()) {  
					$Sobrante = $rowr['Sobrante'];
				}

                if($Sobrante > 0){
                    if($Sobrante > $Total){
                        $NvoSobrante = ($Sobrante - $Total);
                        $sqlupdatesobra = "UPDATE estadocuenta SET Sobrante = '".$NvoSobrante."' WHERE IdEmpresa = '".$IdEmpresa."'";
                        $connect->query($sqlupdatesobra);
                            //restante de la factura 0 
                        $sqlupdateresta = "UPDATE facturas SET restante = '0' WHERE folio = '".$Folio."'";
                        $connect->query($sqlupdateresta);						
                            //cargos y aplicaciones 
                        $QInsert = "INSERT INTO cargosaplicaciones (Factura, Importe, FP, Moneda, FechaV, TipoPago, TadBanco,
                            Documento, Fecha, Abono, Intereses, IVA, IdEmpresa) 
                            VALUES ('".$Factura."','".$Total."','CONTADO','NACIONAL','".$Fecha."','PAGO CON RECIBO DE FONDOS',
                            '-','SALDO CONTADO','".$Fecha."', '".$Total."','0', '0', '".$IdEmpresa."')";
                                
                        $result = mysqli_query($connect,$QInsert); 
                        if(($result)==1)
                        {
                            $Importe = 0;
                        }
                    } else {
                        $NvoSobrante = 0;
                        $sqlupdatesobra = "UPDATE estadocuenta SET Sobrante = '".$NvoSobrante."' WHERE IdEmpresa = '".$IdEmpresa."'";
                        $connect->query($sqlupdatesobra);
                            //restante de la factura = restante - importe 
                        $NvoRestante = $Total - $Sobrante;
                        $sqlupdaterestaa = "UPDATE facturas SET restante = '".$NvoRestante."' WHERE folio = '".$Folio."'";
                        $connect->query($sqlupdaterestaa);
                            //Cargos y aplicaciones   
                        $QInsert = "INSERT INTO cargosaplicaciones (Factura, Importe, FP, Moneda, FechaV, TipoPago, TadBanco, Documento, Fecha, Abono, Intereses, IVA, IdEmpresa) 
                            VALUES ('".$Factura."','".$Total."','CONTADO','NACIONAL','".$Fecha."','PAGO CON RECIBO DE FONDOS','-','SALDO CONTADO','".$Fecha."', '".$Sobrante."','0', '0', '".$IdEmpresa."')";
                                
                        $result = mysqli_query($connect,$QInsert); 
                        if(($result)==1){
                            $Importe = 0;
                        }						  
                    } 
                }
		    }

			EnviarCorreo($Folio, $Correo, $Nombre, $Fecha, $Total, $pdf, $Factura);
			echo "
                <script> 
                    window.location.href='../pedidosrprogramadosadmin.php';
                </script>
            "; 
		} else {
			echo "
                <script>
                    alert('Error al Agregar Facturax');
                    window.location.href='../pedidosrprogramadosadmin.php';
                </script>
            ";
		}
	/*} else {	   
		echo ' 
            <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
            <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1"> 
            <input type="hidden" name="mensaje" value="Verifique el Folio Ingresado "'.$NoPedido.'"">
            </form>
            </body>  
        ';	
	}*/
}

function Contado(){  
	global $connect; 
	    $Folio = $_POST["folio"];
		$IdEmpresa = $_POST["idempresa"];
		$Factura = $_POST["factura"];
		$Fecha = $_POST["fecha"];
		$Total = $_POST["total"];
		$NoPedido = $_POST["nopedido"];
		$pdf = $_POST["pdf"];
		$flete = $_POST["flete"];
		$Concepto = $_POST["concepto"];
		$Rfc = $_POST["rfc"];
		$Descuento = 0;//$_POST["descuento"];
		$Cantidad = $_POST["cantidad"];
		$ValorUnitario = $_POST["valorunitario"];
		$Importee = $_POST["importe"];
		$ImpuestosT = $_POST["impuestostrasladados"];
		$ImpuestosR = $_POST["impuestosretenidos"];
		$Uuid = $_POST["uuid"];
		$FP = $_POST["FP"];
		/*
		//if nopedido existe else goback 
		$NoPedidoExiste = "SELECT folio FROM pedido WHERE folio = '".$NoPedido."'";
		$ResPedido = mysqli_query($connect,$NoPedidoExiste);
		if ($ResPedido->num_rows > 0) {
			$QPlazo = "SELECT plazo FROM estadocuenta WHERE IdEmpresa = '".$IdEmpresa."'";
			$resultPlazo = mysqli_query($connect,$QPlazo); 
			if ($resultPlazo->num_rows > 0) {
				while($rowPlazo = $resultPlazo->fetch_assoc()) {  
				    $Plazo = $rowPlazo['plazo'] + 1; 
			}
			} else {
				$Plazo = 10;
			}*/$Plazo = 10;
			$FechaV =  date('Y-m-d', strtotime($Fecha. ' + '.$Plazo.' days'));  
            $query = "INSERT INTO facturas (Folio, IdEmpresa, Factura, Fecha, Total, pdf, NoPedido, Descuento, Cantidad, ValorUnitario, RFC, flete, Concepto, FechaVencimiento, Restante, Importe, ImpuestosTraslados, ImpuestosRetencion, Emisor, Uuid, FP) 
                VALUES ('".$Folio."', '".$IdEmpresa."','".$Factura."', '".$Fecha."', '".$Total."', '".$pdf."', '".$NoPedido."', '".$Descuento."', '".$Cantidad."', '".$ValorUnitario."', '".$Rfc."', '".$flete."', '".$Concepto."', '".$FechaV."', '".$Total."', '".$Importee."', '".$ImpuestosT."', '".$ImpuestosR."', 'Competro', '".$Uuid."', '".$FP."')"; 
            $result = mysqli_query($connect,$query); 
		
			        //////////////////////////////////////////////////////////////////
            if(($result)== 1){
                $Q = "SELECT t1.sobrante AS saldosobrante, t1.limc,  sum(t2.disponible) AS saldocontado,  (SELECT sum(restante) FROM facturas WHERE idempresa = '".$IdEmpresa."' LIMIT 1) AS saldocredito  FROM estadocuenta t1 INNER JOIN movimientos t2 ON t1.idempresa = t2.idempresa WHERE t1.idempresa = '".$$IdEmpresa."' LIMIT 1";
                $RQ = $connect->query($Q);

                if ($RQ->num_rows > 0) {
                    while($rowRQ = $RQ->fetch_assoc()) {  
                        $saldosobrante = $rowRQ['saldosobrante'];
                        $saldocontado = $rowRQ['saldocontado'];
                        $saldocredito = $rowRQ['saldocredito'];  
                        $limc = $rowRQ['limc'];  
                    }
                        
                    $Inserthistorialsaldos = "INSERT INTO historialsaldos (idempresa, saldocontado, saldosobrante, saldocredito, cargo, credito, limc) VALUES ('".$IdEmpresa."', '".$saldocontado."', '".$saldosobrante."', '".$saldocredito."', '".$Total."', '0', '".$limc."')";
                    $resHistorialSaldos = mysqli_query($connect, $Inserthistorialsaldos);    
                }								
            }
						///////////////////////////////////////////////////////////////////////
		
		if(($result)==1){
			echo "<script>alert(La factura con folio: '".$Folio."' ha sido agregada correctamente);</script>";
			$SQX = "SELECT correo, rzonsocial, usuario FROM empresa WHERE rfc = '".$Rfc."'";
			$resulx = $connect->query($SQX);

            if ($resulx->num_rows > 0) {
                while($rowh = $resulx->fetch_assoc()) {  
                    $Correo = $rowh['correo'];
                    $Nombre = $rowh['usuario'];
                }
            }
			
			$sql = "SELECT saldo FROM estadocuenta WHERE IdEmpresa = '".$_POST["idempresa"]."'";
            $resultt = $connect->query($sql);
            $NvoSaldo = 0;

            if ($resultt->num_rows > 0) {
                while($row = $resultt->fetch_assoc()) {  
                    $uno = $row['saldo'];
                }
                
                $NvoSaldo = ($uno - $Total);
                UPDate($NvoSaldo, $IdEmpresa);
            }
				//set pedido facturado true 
            $Sqlupdatefacturado = "UPDATE pedido SET estadoatencion = 'FACTURADO', facturado = '1', programado = '0' WHERE folio = '".$NoPedido."'";
            $resultUPFacturado = $connect->query($Sqlupdatefacturado); 
                //get saldo comprometido de pedido y restarlo al saldo comprometido del estaddo de cuenta
                /*
            $QueryGSaldoC ="SELECT Comprometido FROM pedido WHERE folio = '".$NoPedido."'";
            $resultQ = $connect->query($QueryGSaldoC); 
            
            if ($resultQ->num_rows > 0) {
                while($rowQ = $resultQ->fetch_assoc()) {  
                    $RSaldo = $rowQ['Comprometido'];
                } 
            }
				*/
                //set facturado true 
                /*
            $Queryst = "UPDATE pedido SET facturado = '1' WHERE Folio = '".$NoPedido."' ";
            $resst = mysqli_query($connect, $Queryst); 

                //set FolioFactura true 
            $Querystf = "UPDATE pedido SET FolioFactura = '".$Folio."' WHERE Folio = '".$NoPedido."' ";
            $resstf = mysqli_query($connect, $Querystf);
                */
                //resta el total del estado de cuenta ya sea por el ciclo while o descontandolo directamente o ambas 
					//get saldo comprometido de pedido y restarlo al saldo comprometido del estaddo de cuenta
            $QuerySaldo ="SELECT Saldo FROM estadocuenta WHERE  idempresa = '".$IdEmpresa."'";
            $rr = $connect->query($QuerySaldo); 

            if ($rr->num_rows > 0) {
                while($rowQ = $rr->fetch_assoc()) {  
                    $Saldo = $rowQ['Saldo'];
                } 
            }
                //calcula el nvo saldo 
            $NvoSaldoCliente = $Saldo - $Total;
                //guardar su nuevo saldo 
            $updateSaldo = "UPDATE estadocuenta SET Saldo = '".$NvoSaldoCliente."' WHERE idempresa = '".$NvoSaldoCliente."'"; 
            $rrr = $connect->query($updateSaldo);  
            $Importe = $Total;
            $aa = 0;

            while($Importe>0){
                    //echo "<br>";
                    //echo "Disponible: ";
                $GetPago = "SELECT Folio, Fecha, Disponible, Referencia FROM `movimientos` WHERE Disponible > 0 AND IdEmpresa = '".$IdEmpresa."' order by Fecha ASC";
                $rt = $connect->query($GetPago); 
                
                if ($rt->num_rows > 0) {
                    while($rowQQ = $rt->fetch_assoc()) {  
                        $Disponible = $rowQQ['Disponible'];
                        $Fol = $rowQQ['Folio'];
                        $Pago = $rowQQ['Referencia'];
                        $FF = $rowQQ['Fecha'];    
                    } 
                }
					
                if(($Disponible > 0)){
                //alcanza
                    if($Disponible >= $Importe){
                            //update pedido set comprometido ?= 0 
                            /*
                        $Updatecomp = "UPDATE pedido SET comprometido = '0' WHERE folio = '".$NoPedido."'";
                        $UPc = $connect->query($Updatecomp);  	
                            */
                            //echo "Folio: ";  echo $Fol; echo "<br>";
                            //echo "Disponible: "; echo $Disponible; echo "<br>";
                        $Dif = $Disponible - $Importe;
                            //get diferencia, importe = 0; set dif as disponible 
                            //echo "Diferencia: "; echo $Dif;
                        $UpdateDisponible = "UPDATE movimientos SET disponible = '".$Dif."' WHERE folio = '".$Fol."'";
                        $UP = $connect->query($UpdateDisponible);  	
							//update el registro 
							//la factura + el importe o total del pedido 
                        $QInsert = "INSERT INTO cargosaplicaciones (Factura, Importe, FP, Moneda, FechaV, TipoPago, TadBanco, Documento, Fecha, Abono, Intereses, IVA, IdEmpresa) 
                        VALUES ('".$Factura."','".$Total."','CONTADO','NACIONAL','".$Fecha."','PAGO CON RECIBO DE FONDOS','-','".$Pago."','".$FF."', '".$Importe."','0', '0', '".$IdEmpresa."')";
                        //$Insertcargo = $connect->query($QInsert);  
                        $result = mysqli_query($connect,$QInsert); 
                        
                        if(($result)==1){$Importe = 0;}else{echo "cha";}
                            $queryupdate = "UPDATE facturas SET restante = '0' WHERE folio = '".$Folio."'";
                            $result2 = mysqli_query($connect,$queryupdate); 
						} else {
							//NoAlcanza
							$Importe = $Importe - $Disponible;
							//set disponible en 0 
							$UpdateDisponibleU = "UPDATE movimientos SET disponible = '0' WHERE folio = '".$Fol."'";
							$UPP = $connect->query($UpdateDisponibleU);  
							//La factura y el folio del pedido del que se tomo dinera y cuanto se tomo $disponible 
							$QInsert = "INSERT INTO cargosaplicaciones (Factura, Importe, FP, Moneda, FechaV, TipoPago, TadBanco, Documento, Fecha, Abono, Intereses, IVA, IdEmpresa) 
							    VALUES ('".$Factura."','".$Total."','CONTADO','NACIONAL','".$Fecha."','PAGO CON RECIBO DE FONDOS','-','".$Pago."','".$FF."', '".$Disponible."','0', '0', '".$IdEmpresa."')";
                            //$Insertcargo = $connect->query($QInsert);  
                            $result = mysqli_query($connect,$QInsert); 
                            if(($result)==1){}
                            $queryupdate = "UPDATE facturas SET restante = '".$Importe."' WHERE folio = '".$Folio."'";
							$result2 = mysqli_query($connect,$queryupdate); 
							$Disponible = 0;
						}
				}
                $aa++;
                    
                if($aa > 25){
                    $Importe = 0;
                }
            }
                //guardar el toltal del pedido 
                /*
            $InsertTotal = "UPDATE pedido SET Total = '".$Total."' WHERE Folio = '".$NoPedido."'"; 
            $resultIT = $connect->query($InsertTotal);  
            */
            EnviarCorreo($Folio, $Correo, $Nombre, $Fecha, $Total, $pdf, $Factura);
					
			echo "
                <script> 
                    window.location.href='../pedidosrprogramadosadmin.php';
                </script>
            "; 
		} else {
			    //	echo "<script>alert(Error al agregar la factura con folio: '".$Folio."');</script>"; 
			echo "
            <script>
                alert('Error al Agregar Factura ');
                window.location.href='../pedidosrprogramadosadmin.php';
            </script>";
			    // header("location: NvoClienteError.html");
		}
	/*} else {
        echo "
            <script>
                alert('Verifique el Folio');
                window.location.href='../pedidosrprogramadosadmin.php';
            </script>
        ";		
	}*/
}

function UPDate($NS, $ID){
	global $connect;
	    //window.location.href='../cargafacturas.php';  window.location.href='../cargafacturas.php'; 
	$UpdateQuery = "UPDATE estadocuenta SET Saldo = '".$NS."' WHERE IdEmpresa = '".$ID."' ";
	$r = $connect->query($UpdateQuery);
	if($r==1){
 	    echo "
            <script>
                alert('Factura Agregada Correctamente');
                window.location.href='../pedidosrprogramadosadmin.php';
            </script>
        "; 
        echo '	  
		    <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
                <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1"> 
                <input type="hidden" name="mensaje" value="Factura Agregada Correctamente" />
                </form>
		    </body>		   
		'; 
	} else {
		echo "Error";
	}
}

function UPDateSaldoCredito($NS, $ID){
	global $connect;
	    // window.location.href='../cargafacturas.php';
	$UpdateQuery = "UPDATE estadocuenta SET SaldoCredito = '".$NS."' WHERE IdEmpresa = '".$ID."' ";
	$r = $connect->query($UpdateQuery);
    if($r==1){
        echo $r;
        echo "
            <script>
                window.location.href='../pedidosrprogramadosadmin.php';
            </script>
        "; 
    } else {
        echo "Error";
    }
}

function EnviarCorreo($Folio, $Correo, $Nombre, $Fecha, $Total, $pdf, $Factura){
	 require 'vendor/autoload.php'; 
  
$recipient = $Correo;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->SMTPDebug;     
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->SetLanguage("es", 'includes/phpMailer/language/'); 

$uploaddir = '../../uploads/';
  $uploadfile = $uploaddir . basename($pdf);
  $uploadfilexml = $uploaddir . basename($Factura);
    
    try{
        $mail->AddAttachment($uploadfile);
    } catch(Exception $e){ 
            echo "PDF no encontrado"; 
        }

    try{
        $mail->AddAttachment($uploadfilexml);
    } catch(Exception $e){ 
            echo "XML no encontrado"; 
        }
 
try { 
$mail->IsMail(); 
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port       = 465;
$mail->Host       = "mail.grupopetromar.com";
$mail->Username   = "desarrollosistemas@grupopetromar.com";
$mail->Password   = "nAUZ3N4zMw&E";

    //Recipients
    $mail->setFrom('facturacion@competro.mx', 'Comercializadora Petromar S.A. DE C.V');
    $mail->addAddress($Correo, 'Comercializadora');     // Add a recipient
  
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Notificación de Emisión de Factura Electrónica';
    $mail->Body    = '
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link href="styles/styles.css" rel="stylesheet" type="text/css" />
	<link href="styles/tables.css" rel="stylesheet" type="text/css" /> 
    <link href="styles/content.css" rel="stylesheet" type="text/css" /> 
	<title>ComPetro</title>
</head>


<body class="body">
	 
<div id="header">  
<div style="padding-top:80px;">
<img src="img/LogoTenemosLaEnergia.png"  > 
</div>  
</div>

<!-- FIN DEL ENCABEZADO --> 


	<head>
        <!-- NAME: SELL PRODUCTS -->
        <!--[if gte mso 15]>
        <xml>
            <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
            </o:OfficeDocumentSettings>
        </xml>
        <![endif]-->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Envio de Facturación</title>
        
    <style type="text/css">
                        p{
                                   margin:10px 0;
                                   padding:0;
                        }
                        table{
                                   border-collapse:collapse;
                        }
                        h1,h2,h3,h4,h5,h6{
                                   display:block;
                                   margin:0;
                                   padding:0;
                        }
                        img,a img{
                                   border:0;
                                   height:auto;
                                   outline:none;
                                   text-decoration:none;
                        }
                        body,#bodyTable,#bodyCell{
                                   height:100%;
                                   margin:0;
                                   padding:0;
                                   width:100%;
                        }
                        .mcnPreviewText{
                                   display:none !important;
                        }
                        #outlook a{
                                   padding:0;
                        }
                        img{
                                   -ms-interpolation-mode:bicubic;
                        }
                        table{
                                   mso-table-lspace:0pt;
                                    mso-table-rspace:0pt;
                        }
                        .ReadMsgBody{
                                   width:100%;
                        }
                        .ExternalClass{
                                   width:100%;
                        }
                        p,a,li,td,blockquote{
                                   mso-line-height-rule:exactly;
                        }
                        a[href^=tel],a[href^=sms]{
                                   color:inherit;
                                   cursor:default;
                                   text-decoration:none;
                        }
                        p,a,li,td,body,table,blockquote{
                                   -ms-text-size-adjust:100%;
                                   -webkit-text-size-adjust:100%;
                        }
                        .ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{
                                   line-height:100%;
                        }
                        a[x-apple-data-detectors]{
                                   color:inherit !important;
                                   text-decoration:none !important;
                                   font-size:inherit !important;
                                   font-family:inherit !important;
                                   font-weight:inherit !important;
                                   line-height:inherit !important;
                        }
                        .templateContainer{
                                   max-width:600px !important;
                        }
                        a.mcnButton{
                                   display:block;
                        }
                        .mcnImage,.mcnRetinaImage{
                                   vertical-align:bottom;
                        }
                        .mcnTextContent{
                                   word-break:break-word;
                        }
                        .mcnTextContent img{
                                   height:auto !important;
                        }
                        .mcnDividerBlock{
                                    table-layout:fixed !important;
                        }
                        h1{
                                   color:#222222;
                                   font-family:Helvetica;
                                   font-size:40px;
                                   font-style:normal;
                                   font-weight:bold;
                                   line-height:150%;
                                   letter-spacing:normal;
                                   text-align:center;
                        }
                        h2{
                                   color:#222222;
                                   font-family:Helvetica;
                                   font-size:34px;
                                   font-style:normal;
                                   font-weight:bold;
                                   line-height:150%;
                                   letter-spacing:normal;
                                   text-align:left;
                        }
                        h3{
                                   color:#444444;
                                   font-family:Helvetica;
                                   font-size:22px;
                                   font-style:normal;
                                   font-weight:bold;
                                   line-height:150%;
                                   letter-spacing:normal;
                                   text-align:left;
                        }
                        h4{
                                   color:#949494;
                                   font-family:Georgia;
                                   font-size:20px;
                                   font-style:italic;
                                   font-weight:normal;
                                   line-height:125%;
                                   letter-spacing:normal;
                                   text-align:left;
                        }
                        #templateHeader{
                                   background-color:#transparent;
                                   background-image:none;
                                   background-repeat:no-repeat;
                                   background-position:50% 50%;
                                   background-size:cover;
                                   border-top:0;
                                   border-bottom:0;
                                   padding-top:45px;
                                   padding-bottom:45px;
                        }
                        .headerContainer{
                                   background-color:transparent;
                                   background-image:none;
                                   background-repeat:no-repeat;
                                   background-position:center;
                                   background-size:cover;
                                   border-top:0;
                                   border-bottom:0;
                                   padding-top:0;
                                   padding-bottom:0;
                        }
                        .headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
                                   color:#757575;
                                   font-family:Helvetica;
                                   font-size:16px;
                                   line-height:150%;
                                   text-align:left;
                        }
                        .headerContainer .mcnTextContent a,.headerContainer .mcnTextContent p a{
                                   color:#007C89;
                                   font-weight:normal;
                                   text-decoration:underline;
                        }
                        #templateBody{
                                   background-color:#ffffff;
                                   background-image:none;
                                   background-repeat:no-repeat;
                                    background-position:center;
                                   background-size:cover;
                                   border-top:0;
                                   border-bottom:0;
                                   padding-top:36px;
                                   padding-bottom:45px;
                        }
                        .bodyContainer{
                                   background-color:transparent;
                                   background-image:none;
                                   background-repeat:no-repeat;
                                   background-position:center;
                                   background-size:cover;
                                   border-top:0;
                                   border-bottom:0;
                                   padding-top:0;
                                   padding-bottom:0;
                        }
                        .bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
                                   color:#757575;
                                   font-family:Helvetica;
                                   font-size:16px;
                                   line-height:150%;
                                   text-align:left;
                        }
                        .bodyContainer .mcnTextContent a,.bodyContainer .mcnTextContent p a{
                                   color:#007C89;
                                   font-weight:normal;
                                   text-decoration:underline;
                        }
                        #templateFooter{
                                   background-color:#transparent;
                                   background-image:none;
                                   background-repeat:no-repeat;
                                   background-position:center;
                                   background-size:cover;
                                   border-top:0;
                                   border-bottom:0;
                                   padding-top:45px;
                                   padding-bottom:63px;
                        }
                        .footerContainer{
                                   background-color:transparent;
                                   background-image:none;
                                   background-repeat:no-repeat;
                                   background-position:center;
                                   background-size:cover;
                                   border-top:0;
                                   border-bottom:0;
                                   padding-top:0;
                                   padding-bottom:0;
                        }
                        .footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
                                   color:#FFFFFF;
                                   font-family:Helvetica;
                                   font-size:12px;
                                   line-height:150%;
                                   text-align:center;
                        }
                        .footerContainer .mcnTextContent a,.footerContainer .mcnTextContent p a{
                                   color:#FFFFFF;
                                   font-weight:normal;
                                   text-decoration:underline;
                        }
            @media only screen and (min-width:768px){
                        .templateContainer{
                                   width:600px !important;
                        }

}           @media only screen and (max-width: 480px){
                        body,table,td,p,a,li,blockquote{
                                   -webkit-text-size-adjust:none !important;
                        }

}           @media only screen and (max-width: 480px){
                        body{
                                   width:100% !important;
                                   min-width:100% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnRetinaImage{
                                   max-width:100% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnImage{
                                   width:100% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{
                                   max-width:100% !important;
                                   width:100% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnBoxedTextContentContainer{
                                   min-width:100% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnImageGroupContent{
                                   padding:9px !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{
                                   padding-top:9px !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{
                                   padding-top:18px !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnImageCardBottomImageContent{
                                   padding-bottom:9px !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnImageGroupBlockInner{
                                   padding-top:0 !important;
                                   padding-bottom:0 !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnImageGroupBlockOuter{
                                   padding-top:9px !important;
                                   padding-bottom:9px !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnTextContent,.mcnBoxedTextContentColumn{
                                   padding-right:18px !important;
                                   padding-left:18px !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{
                                   padding-right:18px !important;
                                   padding-bottom:0 !important;
                                   padding-left:18px !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcpreview-image-uploader{
                                   display:none !important;
                                   width:100% !important;
                        }

}           @media only screen and (max-width: 480px){
                        h1{
                                   font-size:30px !important;
                                   line-height:125% !important;
                        }

}           @media only screen and (max-width: 480px){
                        h2{
                                   font-size:26px !important;
                                   line-height:125% !important;
                        }

}           @media only screen and (max-width: 480px){
                        h3{
                                   font-size:20px !important;
                                   line-height:150% !important;
                        }

}           @media only screen and (max-width: 480px){
                        h4{
                                   font-size:18px !important;
                                   line-height:150% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{
                                   font-size:14px !important;
                                   line-height:150% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{
                                   font-size:16px !important;
                                   line-height:150% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{
                                   font-size:16px !important;
                                   line-height:150% !important;
                        }

}           @media only screen and (max-width: 480px){
                        .footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{
                                   font-size:14px !important;
                                   line-height:150% !important;
                        }

}</style></head>
    <body style="height: 100%;margin: 0;padding: 0;width: 100%;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
        <!--*|IF:MC_PREVIEW_TEXT|*-->
        <!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;"></span><!--<![endif]-->
        <!--*|END:IF|*-->
        <center>
            <table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;">
                <tr>
                    <td align="center" valign="top" id="bodyCell" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;height: 100%;margin: 0;padding: 0;width: 100%;">
                        <!-- BEGIN TEMPLATE // -->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <tr>
                                <td align="center" valign="top" id="templateHeader" data-template-container="" style="background:#transparent none no-repeat 50% 50%/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #transparent;background-image: none;background-repeat: no-repeat;background-position: 50% 50%;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 45px;padding-bottom: 45px;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;max-width: 600px !important;">
                                        <tr>
                                            <td valign="top" class="headerContainer" style="background:transparent none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: transparent;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0;padding-bottom: 0;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnImageBlockOuter">
            <tr>
                <td valign="top" style="padding: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnImageBlockInner">
                    <table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <tbody><tr>
                            <td class="mcnImageContent" valign="top" style="padding-right: 9px;padding-left: 9px;padding-top: 0;padding-bottom: 0;text-align: center;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                
                                    
                                        <img align="center" alt="" src="https://mcusercontent.com/a5b6e325ed85dc1817830309d/images/4f4737f5-8fbe-4e77-8f71-1218a624572d.png" width="542" style="max-width: 542px;padding-bottom: 0;display: inline !important;vertical-align: bottom;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;" class="mcnImage">
                                    
                                
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
    </tbody>
</table></td>
                                        </tr>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" id="templateBody" data-template-container="" style="background:#ffffff none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #ffffff;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 36px;padding-bottom: 45px;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;max-width: 600px !important;">
                                        <tr>
                                            <td valign="top" class="bodyContainer" style="background:transparent none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: transparent;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0;padding-bottom: 0;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <!--[if mso]>
                                               <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                                               <tr>
                                               <![endif]-->
                                       
                                               <!--[if mso]>
                                               <td valign="top" width="600" style="width:600px;">
                                               <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding: 0px 18px 9px;color: #FFFFFF;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        
                            <h1 style="display: block;margin: 0;padding: 0;color: #222222;font-family: Helvetica;font-size: 40px;font-style: normal;font-weight: bold;line-height: 150%;letter-spacing: normal;text-align: center;"><span style="font-size:24px">Notificación de Emisión de Comprobante</span></h1>

                        </td>
                    </tr>
                </tbody></table>
                                               <!--[if mso]>
                                               </td>
                                               <![endif]-->
                
                                               <!--[if mso]>
                                               </tr>
                                               </table>
                                               <![endif]-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnCaptionBlock" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnCaptionBlockOuter">
        <tr>
            <td class="mcnCaptionBlockInner" valign="top" style="padding: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                



<table border="0" cellpadding="0" cellspacing="0" class="mcnCaptionRightContentOuter" width="100%" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody><tr>
        <td valign="top" class="mcnCaptionRightContentInner" style="padding: 0 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
            <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnCaptionRightImageContentContainer" width="264" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <tbody><tr>
                    <td class="mcnCaptionRightImageContent" align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    
                        

                        <img alt="" src="https://mcusercontent.com/a5b6e325ed85dc1817830309d/images/b679570b-f691-4a16-afa5-3486e69008d5.png" width="264" style="max-width: 306px;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;vertical-align: bottom;" class="mcnImage">
                        

                    
                    </td>
                </tr>
            </tbody></table>
            <table class="mcnCaptionRightTextContentContainer" align="right" border="0" cellpadding="0" cellspacing="0" width="264" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <tbody><tr>
                    <td valign="top" class="mcnTextContent" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #757575;font-family: Helvetica;font-size: 16px;line-height: 150%;text-align: left;">
                        <h4 style="text-align: justify;display: block;margin: 0;padding: 0;color: #949494;font-family: Georgia;font-size: 20px;font-style: italic;font-weight: normal;line-height: 125%;letter-spacing: normal;">Le informamos que <strong>Comercializadora Petromar S.A. de C.V.</strong> emitió para usted un Comprobante Fiscal Digital por Internet (<strong>CFDI</strong>) con las siguientes características:</h4>

<div style="text-align: justify;">&nbsp;</div>

<div style="text-align: left;"><strong>Serie y Folio: '.$Folio.'<br>
Fecha de emisión: '.$Fecha.'</strong><br>
<strong>Tipo de comprobante:</strong>&nbsp;Ingreso (Factura)<br>
<strong>Monto Total: $'.number_format($Total, 2, '.', ',').'</strong></div>

                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>




            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnBoxedTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <!--[if gte mso 9]>
            <table align="center" border="0" cellspacing="0" cellpadding="0" width="100%">
            <![endif]-->
            <tbody class="mcnBoxedTextBlockOuter">
        <tr>
            <td valign="top" class="mcnBoxedTextBlockInner" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                
                                               <!--[if gte mso 9]>
                                               <td align="center" valign="top" ">
                                               <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnBoxedTextContentContainer">
                    <tbody><tr>
                        
                        <td style="padding-top: 9px;padding-left: 18px;padding-bottom: 9px;padding-right: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        
                            <table border="0" cellspacing="0" class="mcnTextContentContainer" width="100%" style="min-width: 100% !important;background-color: #404040;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                <tbody><tr>
                                    <td valign="top" class="mcnTextContent" style="padding: 18px;color: #F2F2F2;font-family: Helvetica;font-size: 14px;font-style: normal;font-weight: bold;text-align: center;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;line-height: 150%;">
                                        Favor de consultar los adjuntos
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                                                <!--[if gte mso 9]>
                                               </td>
                                               <![endif]-->
                
                                               <!--[if gte mso 9]>
                </tr>
                </table>
                                               <![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                                        </tr>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                            <tr>
                                <td align="center" valign="top" id="templateFooter" data-template-container="" style="background:#transparent none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: #transparent;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 45px;padding-bottom: 63px;">
                                    <!--[if (gte mso 9)|(IE)]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0" width="600" style="width:600px;">
                                    <tr>
                                    <td align="center" valign="top" width="600" style="width:600px;">
                                    <![endif]-->
                                    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" class="templateContainer" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;max-width: 600px !important;">
                                        <tr>
                                            <td valign="top" class="footerContainer" style="background:transparent none no-repeat center/cover;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;background-color: transparent;background-image: none;background-repeat: no-repeat;background-position: center;background-size: cover;border-top: 0;border-bottom: 0;padding-top: 0;padding-bottom: 0;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnFollowBlockOuter">
        <tr>
            <td align="center" valign="top" style="padding: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowBlockInner">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnFollowContentContainer" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody><tr>
        <td align="center" style="padding-left: 9px;padding-right: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
            <table border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" class="mcnFollowContent">
                <tbody><tr>
                    <td align="center" valign="top" style="padding-top: 9px;padding-right: 9px;padding-left: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <tbody><tr>
                                <td align="center" valign="top" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                    <!--[if mso]>
                                    <table align="center" border="0" cellspacing="0" cellpadding="0">
                                    <tr>
                                    <![endif]-->
                                    
                                        <!--[if mso]>
                                        <td align="center" valign="top">
                                        <![endif]-->
                                        
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" class="mcnFollowStacked" style="display: inline;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                 
                                                <tbody><tr>
                                                    <td align="center" valign="top" class="mcnFollowIconContent" style="padding-right: 0;padding-bottom: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                                                        <a href="http://www.competro.mx" target="_blank" style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;"><img src="https://cdn-images.mailchimp.com/icons/social-block-v2/color-link-96.png" alt="Competro" class="mcnFollowBlockIcon" width="48" style="width: 48px;max-width: 48px;display: block;border: 0;height: auto;outline: none;text-decoration: none;-ms-interpolation-mode: bicubic;"></a>
                                                    </td>
                                                </tr>
                                                
                                                
                                            </tbody></table>
                                        
                                        
                                        <!--[if mso]>
                                        </td>
                                        <![endif]-->
                                    
                                    <!--[if mso]>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </tbody></table>
                    </td>
                </tr>
            </tbody></table>
        </td>
    </tr>
</tbody></table>

            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;table-layout: fixed !important;">
    <tbody class="mcnDividerBlockOuter">
        <tr>
            <td class="mcnDividerBlockInner" style="min-width: 100%;padding: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                <table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 2px solid #505050;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                    <tbody><tr>
                        <td style="mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                            <span></span>
                        </td>
                    </tr>
                </tbody></table>
<!--            
                <td class="mcnDividerBlockInner" style="padding: 18px;">
                <hr class="mcnDividerContent" style="border-bottom-color:none; border-left-color:none; border-right-color:none; border-bottom-width:0; border-left-width:0; border-right-width:0; margin-top:0; margin-right:0; margin-bottom:0; margin-left:0;" />
-->
            </td>
        </tr>
    </tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
    <tbody class="mcnTextBlockOuter">
        <tr>
            <td valign="top" class="mcnTextBlockInner" style="padding-top: 9px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;">
                        <!--[if mso]>
                                               <table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;">
                                               <tr>
                                               <![endif]-->
                                       
                                               <!--[if mso]>
                                               <td valign="top" width="600" style="width:600px;">
                                               <![endif]-->
                <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width: 100%;min-width: 100%;border-collapse: collapse;mso-table-lspace: 0pt;mso-table-rspace: 0pt;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;" width="100%" class="mcnTextContentContainer">
                    <tbody><tr>
                        
                        <td valign="top" class="mcnTextContent" style="padding-top: 0;padding-right: 18px;padding-bottom: 9px;padding-left: 18px;mso-line-height-rule: exactly;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;word-break: break-word;color: #FFFFFF;font-family: Helvetica;font-size: 12px;line-height: 150%;text-align: center;">
                        
                            <span style="color:#000000"><em>Copyright © |2020 Comercializadora Petromar S.A. de C.V.| All rights reserved.</em><br>
 <br>
<br>
<strong>Nuestro domicilio fiscal es:</strong><br>
Avenida Camaron Sábalo #102 local 12 col. Lomas de Mazatlán<br>
 
 </span>
                        </td>
                    </tr>
                </tbody></table>
                                               <!--[if mso]>
                                               </td>
                                               <![endif]-->
                
                                               <!--[if mso]>
                                               </tr>
                                               </table>
                                               <![endif]-->
            </td>
        </tr>
    </tbody>
</table></td>
                                        </tr>
                                    </table>
                                    <!--[if (gte mso 9)|(IE)]>
                                    </td>
                                    </tr>
                                    </table>
                                    <![endif]-->
                                </td>
                            </tr>
                        </table>
                        <!-- // END TEMPLATE -->
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>
	 ';
    $mail->AltBody = ' ---- ';

    $mail->send();
    
} catch (Exception $e) {
     
	echo $e;
}
	
	 
	
}


?>
