	<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';


	 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	
	require 'connector.php';
	 
	uno();
	
	
	
	
	
	
	
}
	
	
	
	
	function uno(){
		global $connect; 
	  $Folio = $_POST["folio"]; 
		$Empresa = $_POST["empresa"];
		$Rfc = $_POST["rfc"]; 
		$IdEmpresa = $_POST["idempresa"];
		$Fecha = $_POST["fecha"]; 
		$NotaCredito = $_POST["notacredito"];
		$pdf = $_POST["pdf"]; 
		$Concepto = $_POST["concepto"]; 
		$Referencia = $_POST["referencia"];
		$Cantidad = $_POST["cantidad"];
		$ValorUnitario = $_POST["valorunitario"];
		$Importee = $_POST["importe"];
 		$Total = $_POST["total"];  
	
	   
			 
			
			$query = "Insert into notascredito (Folio, Empresa, Rfc, IdEmpresa, Fecha, NotaCredito, Pdf, Concepto, Referencia, Cantidad, ValorUnitario, Importe, Total) 
			values ('".$Folio."', '".$Empresa."','".$Rfc."', '".$IdEmpresa."', '".$Fecha."', '".$NotaCredito."',
			'".$pdf."', '".$Concepto."', '".$Referencia."', '".$Cantidad."', '".$ValorUnitario."', '".$Importee."', '".$Total."')"; 
			
			$result = mysqli_query($connect,$query); 
		
		if(($result)==1){ 
		
	 
		$TipoPago = "Select Credito from estadocuenta where idempresa = '".$_POST["idempresa"]."'";
		$rtc = $connect->query($TipoPago); 
					if ($rtc->num_rows > 0) {
					while($roc = $rtc->fetch_assoc()) {  
					$Credito = $roc['Credito'];  
					  } 
					  
					} 
					if($Credito == 1){
						Credito();
					}
					if($Credito == 0){
						Contado();
					}
		   
			 
			exit();
		}else{ 
			echo "<script>
			alert('Error al Agregar Nota de Credito Folio Ya Existe');
			window.location.href='../carganotacredito.php';
			</script>"; 
			exit();
		}
		 
 
			 
	

	}
 

function Credito()
{  $Folio = $_POST["folio"]; 
global $connect; 
		$Empresa = $_POST["empresa"];
		$Rfc = $_POST["rfc"]; 
		$IdEmpresa = $_POST["idempresa"];
		$Fecha = $_POST["fecha"]; 
		$NotaCredito = $_POST["notacredito"];
		$pdf = $_POST["pdf"]; 
		$Concepto = $_POST["concepto"]; 
		$Referencia = $_POST["referencia"];
		$Cantidad = $_POST["cantidad"];
		$ValorUnitario = $_POST["valorunitario"];
		$Importee = $_POST["importe"];
 		$Total = $_POST["total"];   
	 
	
	 
	     
		$a = $Total; 
			
				$query = "Insert into Movimientos (Fecha, Concepto, Referencia,  Abono, IdEmpresa) 
			 values ('".$Fecha."','".$Concepto."', '".$Referencia."', '".$Total."', '".$IdEmpresa."')";	
			    	$result = mysqli_query($connect,$query);
				
			    	 
					
					
					$sobra = 0;
					$contador = 0;
					//insert into 0cargos y aplicacions until Abono <= 0 
					$sobra = $a;
					while($contador<20){
						//get last factura where faltante >0 
							
							$W = "Select folio, factura, fecha, restante, total from facturas where restante > 0 and idempresa = '".$IdEmpresa."' order by fecha asc ";
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
							values ('".$Factura."','".$ImporteFac."','CONTADO','NACIONAL','".$Fech."','PAGO CON RECIBO DE FONDOS','nx','".$Referencia."','".$Fecha."', '".$restante."','0', '0', '".$IdEmpresa."')";
							
							$result = mysqli_query($connect,$QInsert); 
							if(($result)==1){$Importe = 0;
							
							 $sobra = $a;  
							
							}else{
							} 
							 
							
						}else{
							 
							$Dif = $restante - $a;
							$NvoRestantea = "update facturas set restante = '".$Dif."' where folio = '".$foli."'";
							$resNvoR = mysqli_query($connect, $NvoRestantea);
							
							
							if($a > 0){
							$QInsert = "Insert into cargosaplicaciones (Factura, Importe, FP, Moneda, FechaV, TipoPago, TadBanco, Documento, Fecha, Abono, Intereses, IVA, IdEmpresa) 
							values ('".$Factura."','".$ImporteFac."','CONTADO','NACIONAL','".$Fech."','PAGO CON RECIBO DE FONDOS','nx','".$Referencia."','".$Fecha."', '".$a."','0', '0', '".$IdEmpresa."')";
							
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
						 
							$sqlsobra = "SELECT Sobrante FROM estadocuenta where IdEmpresa = '".$IdEmpresa."'";
		
					$resulttr = $connect->query($sqlsobra);
					$NvoSobrante = 0; 
					if ($resulttr->num_rows > 0) {
					while($rowr = $resulttr->fetch_assoc()) {  
					$Sobrante = $rowr['Sobrante'];
					  }
					  
					  $NvoSobrante = ($Sobrante + $a);
					  
					  $sqlupdatesobra = "update estadocuenta set Sobrante = '".$NvoSobrante."' where IdEmpresa = '".$IdEmpresa."'";
						$connect->query($sqlupdatesobra);
					  
			 
					
					
			
					}
			
					}
					
					   
	
	 
			 
				 
		if(($result)==1){  
		
		
			$SQX = "Select correo, rzonsocial, usuario from empresa where rfc = '".$Rfc."'";
			$resulx = $connect->query($SQX);  
					if ($resulx->num_rows > 0) {
					while($rowh = $resulx->fetch_assoc()) {  
					$Correo = $rowh['correo'];
					$Nombre = $rowh['usuario'];
					  }
					 
					  
			EnviarCorreo($Folio, $Correo, $Nombre, $Fecha, $Total, $pdf, $NotaCredito);
					}
		 
		GobackCorrecto();
		
		}
		else{ 
			GobackCorrecto(); 
		}
		
	
	 
	
}





 


 







function Contado()
{ $Folio = $_POST["folio"]; 
global $connect; 
		$Empresa = $_POST["empresa"];
		$Rfc = $_POST["rfc"]; 
		$IdEmpresa = $_POST["idempresa"];
		$Fecha = $_POST["fecha"]; 
		$NotaCredito = $_POST["notacredito"];
		$pdf = $_POST["pdf"]; 
		$Concepto = $_POST["concepto"]; 
		$Referencia = $_POST["referencia"];
		$Cantidad = $_POST["cantidad"];
		$ValorUnitario = $_POST["valorunitario"];
		$Importee = $_POST["importe"];
 		$Total = $_POST["total"];   
	 
	
	
	//global $connect; 
	 
		$a = $Total;
			//echo $a;
			
			 
			
			
				$query = "Insert into Movimientos (Fecha, Concepto, Referencia,  Abono, IdEmpresa) 
			 values ('".$Fecha."','".$Concepto."', '".$Referencia."', '".$Total."', '".$IdEmpresa."', '".$Total."')";	
			    	$result = mysqli_query($connect,$query);
				
			    
					
					
					
					
					if(($result)==1){  
		
		$SQX = "Select correo, rzonsocial, usuario from empresa where rfc = '".$Rfc."'";
			$resulx = $connect->query($SQX);  
					if ($resulx->num_rows > 0) {
					while($rowh = $resulx->fetch_assoc()) {  
					$Correo = $rowh['correo'];
					$Nombre = $rowh['usuario'];
					  }
					 
					  
			EnviarCorreo($Folio, $Correo, $Nombre, $Fecha, $Total, $pdf, $NotaCredito);
					}
		 
		GobackCorrecto();
		}
		else{ 
			GobackCorrecto(); 
		}
			
	
}


function GobackCorrecto(){
	echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../carganotacredito.php" name="frm1"> 
		 	  <input type="hidden" name="mensaje" value="Agregado Correctamente">
	       </form>
		   </body> ';	 
	
	
}
function GobackIncorrecto(){
	echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../carganotacredito.php" name="frm1"> 
		    	  <input type="hidden" name="mensaje" value="Error al agregar">
	       </form>
		   </body> ';	 
	
	
}











function EnviarCorreo($Folio, $Correo, $Nombre, $Fecha, $Total, $pdf, $NotaCredito){
	
 

 
 
$recipient = $Correo;

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->SetLanguage("es", 'includes/phpMailer/language/');
//$mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
 
//$mail->AddAttachment($_FILES['filepdf']['tmp_name'], $_FILES['filepdf']['name']);

$uploaddir = '../uploads/';
  $uploadfile = $uploaddir . basename($pdf);
  $uploadfilexml = $uploaddir . basename($NotaCredito);
 
  
 $mail->AddAttachment($uploadfile);
 $mail->AddAttachment($uploadfilexml);


try {
    //Server settings 
	// Enable verbose debug output    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->IsSMTP(); 
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "ssl";
//tsl
$mail->Port       = 465;
$mail->Host       = "mail.grupopetromar.com";
$mail->Username   = "facturacion@competro.mx";
$mail->Password   = "246vzwWw6RSj";



    //Recipients
    $mail->setFrom('facturacion@competro.mx', 'Comercializadora Petromar S.A. DE C.V');
    $mail->addAddress($Correo, 'Comercializadora');     // Add a recipient
  
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Notificación de Emisión de Nota de Crédito';
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
                        <h4 style="text-align: justify;display: block;margin: 0;padding: 0;color: #949494;font-family: Georgia;font-size: 20px;font-style: italic;font-weight: normal;line-height: 125%;letter-spacing: normal;">Le informamos que <strong>Comercializadora Petromar S.A. de C.V.</strong> emitió para usted una <strong>nota de crédito</strong> con las siguientes características:</h4>

<div style="text-align: justify;">&nbsp;</div>

<div style="text-align: left;"><strong>Serie y Folio: '.$Folio.'<br>
Fecha de emisión: '.$Fecha.'</strong><br>
<strong>Tipo de comprobante:</strong>&nbsp;Nota de Crédito<br>
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
