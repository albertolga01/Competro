<?php
require_once 'SWSDK.php';
use SWServices\JSonIssuer\JsonEmisionTimbrado as jsonEmisionTimbrado;
require 'connector.php';

	global $i;
	
//header('Content-Type: text/plain');
date_default_timezone_set('America/Mexico_City');
/*
$params = array(
    "url"=>"http://services.test.sw.com.mx", 
    "user"=>"desarrollo@grupopetromar.com", 
    "password"=> "Petromar+SW"
);
 
 */
 
$params = array(
    "url"=>"https://services.sw.com.mx",
    "user"=>"facturacion@competro.mx",
    "password"=> "cPr/123*226"
); 

////////////////////////////////////////////////////////////////////////////
 
$CpostalFiscal = "Select regimen, cp, regimenf, rzonsocialf from informacionfiscal where idempresa = '".$_POST['idempresa']."'";
$resultdx = $connect->query($CpostalFiscal);
if ($resultdx->num_rows > 0) { 
  while($rowdx = $resultdx->fetch_assoc()) {   
    $CodFiscalRec = $rowdx["cp"];
    $RegmenFiscalRec = $rowdx["regimenf"];
    $RzonSocialF = $rowdx["rzonsocialf"];
    $regimenrnombre = $rowdx["regimen"];
  }
} 

  /////////////////////////////////////////////////////////////////
  $QueryDatosDcto = "SELECT t1.importe, t1.impuestostraslados, t1.total, t1.flete, t2.producto, t1.descuento, t1.cantidad FROM facturas t1 inner join pedido t2 on t1.folio = t2.foliofactura WHERE t1.UUID = '".$_POST['iddocumento']."'";
  $resultdx = $connect->query($QueryDatosDcto);
  if ($resultdx->num_rows > 0) { 
    while($rowdx = $resultdx->fetch_assoc()) {   
        $subtotalf = $rowdx["importe"] + $rowdx["flete"];
        $ivaf = $rowdx["impuestostraslados"];
        $totalf = $rowdx["total"]; 
        $flete = $rowdx["flete"]; 
        $producto = $rowdx["producto"]; 
        $descuento = $rowdx["descuento"]; 
        $cantidad = $rowdx["cantidad"]; 
    }
  }  

/////////////////////////////////////////////////////////////////


 /////////////////////////////////////////////////////////////////
 $QueryI = "SELECT iepsmagna, iepspremium, iepsdiesel FROM impuestos order by fecha desc limit 1";
 $resulti = $connect->query($QueryI);
    if ($resulti->num_rows > 0) { 
    while($rowi = $resulti->fetch_assoc()) {   
        $iepsM = $rowi["iepsmagna"];
        $iepsP = $rowi["iepspremium"];
        $iepsD = $rowi["iepsdiesel"];
    }
 } 
 
 if($producto == "GASOLINA 87 OCT"){
    $ieps = $iepsM;
 }else if($producto == "GASOLINA 91 OCT"){
    $ieps = $iepsP;
 }else if($producto == "DIESEL"){
    $ieps = $iepsD;
 } 
 
 $baseDR = ($subtotalf - $flete) - ($cantidad * $ieps);

 $baseDR = $baseDR + $flete;
 $baseDR = $baseDR - $descuento;
 $baseDR = round($baseDR, 2);
 //echo round($baseDR,2)."<br>";


/////////////////////////////////////////////////////////////////
 
 $importePago = $_POST["importepago"];
 $ivaPago = $_POST["importepago"]*0.16;
 $importePago1 = $importePago - $ivaPago;
 
///////////////////////////////////////////////////////////////////////////
$idempresa = $_POST['idempresa'];
$nopedido = $_POST['nopedido'];
$direccion = $_POST['direccion'];
$domicilio = $_POST['domicilio'];
$observaciones = $_POST['observaciones'];
$datosoperativos = $_POST['datosoperativos'];
$cantidadn = $_POST['cantidadn'];
$noorden = $_POST['noorden'];
$cantidada = $_POST['cantidada'];
$fechaorden = $_POST['fechaorden'];
$temperatura = $_POST['temperatura'];
$sellos = $_POST['sellos'].' / '.$_POST['vehiculo'].' / '.$_POST['placas'];
$certificados = $_POST['cert'].' / '.$_POST['compania'].' / '.$_POST['operador'];
$nvofolio = $_POST['nvofolio'];
 
//$receptor["DomicilioFiscalReceptor"] = $CodFiscalRec;
//$receptor["RegimenFiscalReceptor"] = $RegmenFiscalRec;
// "'.$_POST['nombrereceptor'].'"
//3.3
// COMERCIALIZADORA PETROMAR SA DE CV
//"UsoCFDI": "CP01" 
$json = '
{
    "Version": "4.0",  
    "Serie": "C",
    "Folio": "'.$_POST['nvofolio'].'",
    "Fecha": "'.date('Y-m-d\TH:i:s', strtotime(date('Y-m-d\TH:i:s').'-1 hour')).'",
    "SubTotal": "0",
    "Moneda": "XXX",
    "Total": "0",
    "TipoDeComprobante": "P",
    "LugarExpedicion": "82110",
    "NoCertificado": "",
    "Certificado": "",
    "Sello": "",
    "Exportacion": "01",
    "Emisor": {
       "Rfc": "CPE190207226",
       "RegimenFiscal": "601",
       "Nombre": "COMERCIALIZADORA PETROMAR" 
    },
    "Receptor": {
       "Rfc": "'.$_POST['rfcreceptor'].'",
       "Nombre": "'.$RzonSocialF.'", 
       "DomicilioFiscalReceptor" : "'.$CodFiscalRec.'", 
       "RegimenFiscalReceptor" : "'.$RegmenFiscalRec.'", 
       "UsoCFDI": "CP01"
    },
    "Conceptos": [
        {
          "ClaveProdServ": "84111506",
          "Cantidad": 1,
          "ClaveUnidad": "ACT",
          "Descripcion": "Pago",
          "ValorUnitario": "0",
          "Importe": "0",
          "ObjetoImp": "01"
        }
    ],
    "Complemento":  
        {
            "Any": [
                {
                    "Pago20:Pagos": {  
                        "Version": "2.0",
                        "Totales": {
                        "MontoTotalPagos": "'.round($_POST['importepago'],2).'", 
                        "TotalTrasladosBaseIVA16": "'.$baseDR.'",
                        "TotalTrasladosImpuestoIVA16": "'.round(($baseDR * 0.16),2).'", 
                    }, 
                        "Pago": [
                            {
                                "FechaPago": "'.$_POST['fechapago'].'",
                                "FormaDePagoP": "03",
                                "MonedaP": "MXN",
                                "Monto": "'.round($_POST['importepago'],2).'",
                                "TipoCambioP": "1",
                                "DoctoRelacionado": [
                                        {
                                            "IdDocumento": "'.$_POST['iddocumento'].'",
                                            "Folio": "'.$_POST['foliofactura'].'",
                                            "MonedaDR": "MXN",
                                            "MetodoDePagoDR": "PPD",
                                            "NumParcialidad": "'.($_POST['noparcialidad'] + 1).'",
                                            "ImpSaldoAnt": "'.round($_POST['saldoanterior'],2).'", 
                                            "ImpPagado": "'.round($_POST['importepago'],2).'",
                                            "ImpSaldoInsoluto": "'.round($_POST['saldoinsoluto'],2).'",
                                            "EquivalenciaDR": "1",
                                            "ObjetoImpDR": "02",
                                            "ImpuestosDR": 
                                                {
                                                    "TrasladosDR":[
                                                        {
                                                            
                                                                "BaseDR": "'.$baseDR.'",
                                                                "ImpuestoDR": "002",
                                                                "TipoFactorDR": "tasa",
                                                                "TasaOCuotaDR": "0.160000",
                                                                "ImporteDR": "'.round(($baseDR * 0.16),2).'"
                                                             
                                                        }
                                                    ]
                                                }
                                            

                                        }
                                    ], 
                                            "ImpuestosP": 
                                            {
                                                "TrasladosP":[
                                                    {
                                                        
                                                            "BaseP": "'.$baseDR.'",
                                                            "ImpuestoP": "002",
                                                            "TipoFactorP": "tasa",
                                                            "TasaOCuotaP": "0.160000",
                                                            "ImporteP": "'.round(($baseDR * 0.16),2).'"
                                                            
                                                    }
                                                ]
                                            }
                             }
                        ]
                    }
                }
            ]
        }
     
 }
';
   
    echo $json; 
    echo "<br>"; 
   $testJson = '{
    "Version": "4.0",
    "Fecha": "2022-07-27T16:26:19",
    "SubTotal": "0",
    "Moneda": "XXX",
    "Total": "0",
    "TipoDeComprobante": "P",
    "LugarExpedicion": "64530",
    "NoCertificado": "",
    "Certificado": "",
    "Exportacion": "01",
    "Emisor": {
        "Rfc": "CPE190207226",
        "Nombre": "COMERCIALIZADORA PETROMAR",
        "RegimenFiscal": "601"
    },
    "Receptor": {
        "Rfc": "JUFA7608212V6",
        "Nombre": "ADRIANA JUAREZ FERNANDEZ",
        "DomicilioFiscalReceptor": "29133",
        "RegimenFiscalReceptor": "605",
        "UsoCFDI": "CP01"
    },
    "Conceptos": [
        {
            "ClaveProdServ": "84111506",
            "Cantidad": "1",
            "ClaveUnidad": "ACT",
            "Descripcion": "Pago",
            "ValorUnitario": "0",
            "Importe": "0",
            "ObjetoImp": "01"
        }
    ],
    "Complemento": {
        "Any": [
            {
                "Pago20:Pagos": {
                    "Version": "2.0",
                    "Totales": {
                        "MontoTotalPagos": "1.00"
                    },
                    "Pago": [
                        {
                            "FechaPago": "2022-02-19T00:00:00",
                            "FormaDePagoP": "03",
                            "MonedaP": "MXN",
                            "Monto": "1.00",
                            "TipoCambioP": "1",
                            "DoctoRelacionado": [
                                {
                                    "IdDocumento": "daca5d85-b8cd-463b-a056-b021fe33c2f9",
                                    "Serie": "CG",
                                    "Folio": "2200004",
                                    "MonedaDR": "MXN",
                                    "MetodoDePagoDR": "PUE",
                                    "NumParcialidad": "1",
                                    "ImpSaldoAnt": "500.00",
                                    "ImpPagado": "1.00",
                                    "ImpSaldoInsoluto": "499.00",
                                    "EquivalenciaDR": "1",
                                    "ObjetoImpDR": "01"
                                }
                            ]
                        }
                    ]
                }
            }
        ]
    }
}';
try{
	 
	global $connect;
	
    $basePath = "../../uploads/";
    $jsonIssuerStamp = jsonEmisionTimbrado::Set($params);
    $resultadoJson = $jsonIssuerStamp::jsonEmisionTimbradoV4($json);
    
    if($resultadoJson->status=="success"){
        //save CFDI
        $ruta=$basePath.$resultadoJson->data->uuid.".xml";
            $ruta2=$resultadoJson->data->uuid.".xml";
           // echo $ruta2;
            $ruta3=$basePath.'COMPLEMENTO P F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['nombreestacion'].' ' .$_POST['letraprod'].'.xml';
            $ruta4='COMPLEMENTO P F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['nombreestacion'].' ' .$_POST['letraprod'].'.xml';
        file_put_contents($ruta3, $resultadoJson->data->cfdi) or die("Unable to write file!");
         
		// echo $resultadoJson->data->cfdi;
        //save QRCode
        $nombreyRuta = 'COMPLEMENTO P F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['nombreestacion'].' ' .$_POST['letraprod'].".png";
        imagepng(imagecreatefromstring(base64_decode($resultadoJson->data->qrCode)), $basePath.$nombreyRuta);
	 
		//insert folio  
		 $conn=new mysqli("localhost","wwcomp_sistemas","s7O4BJi0H5J4","wwcomp_comercializadora")
		  or die("not connected".mysqli_connect_error());  
			$sql="insert into timbrado (foliocomplemento) values('".$_POST['nvofolio']."')";
			$query=mysqli_query($conn,$sql);
			if($query){
			  echo"1 row inserted";
			}else{
			  echo mysqli_error($conn);
			}
   
		 
	}
    else{ 
        $ruta = $basePath."Error-".$comprobante["Serie"]."-".$comprobante["Folio"].".txt";
        $mensaje= $resultadoJson->message."\n".$resultadoJson->messageDetail;
        file_put_contents($ruta, $mensaje);
    }
	echo "<br><br>";
    var_dump($resultadoJson);
		
		 
}
catch(Exception $e){
    echo $e->getMessage();
}
 
//		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)"> 

echo ' 		
		   <form method="post" action="../complementopdf.php" name="frm1"> 
		   <input type="hidden" name="json" value="'.$ruta4.'" />  
		   <input type="hidden" name="direccion" value="'.$direccion.'" />  
		   <input type="hidden" name="domicilio" value="'.$domicilio.'" />  
		   <input type="hidden" name="observaciones" value="'.$observaciones.'" />  
		   <input type="hidden" name="datosoperativos" value="'.$datosoperativos.'" />  
		   
		   <input type="hidden" name="sellos" value="'.$sellos.'" />  
		   <input type="hidden" name="certificados" value="'.$certificados.'" />  
		   <input type="hidden" name="cantidadn" value="'.$cantidadn.'" />  
		   <input type="hidden" name="noorden" value="'.$noorden.'" />  
		   <input type="hidden" name="cantidada" value="'.$cantidada.'" />  
		   <input type="hidden" name="fechaorden" value="'.$fechaorden.'" />  
		   <input type="hidden" name="temperatura" value="'.$temperatura.'" />  
		   <input type="hidden" name="idempresa" value="'.$idempresa.'" />  
           <input type="hidden" name="regimenrnombre" value="'.$regimenrnombre.'" />  
		   <input type="hidden" name="nopedido" value="'.$nopedido.'" />  
           <input type="hidden" name="archivoconruta" value="'.$ruta4.'" />  
           <input type="hidden" name="foliocargo" value="'.$_POST["foliocargo"].'" />  
<input type="submit" value="continuar">		   
	       </form> 
		   </body> ';	

?>


 