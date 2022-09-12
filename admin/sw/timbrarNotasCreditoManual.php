<?php
require_once 'SWSDK.php';
use SWServices\JSonIssuer\JsonEmisionTimbrado as jsonEmisionTimbrado;
require 'connector.php';

	global $i;
	
//header('Content-Type: text/plain');
date_default_timezone_set('America/Mexico_City');
/*$params = array(
    "url"=>"http://services.test.sw.com.mx",
    "user"=>"desarrollo@grupopetromar.com",
    "password"=> "SWpruebas"
); 
*/
$params = array(
 "url"=>"https://services.sw.com.mx",
    "user"=>"facturacion@competro.mx",
    "password"=> "cPr/123*226"
);
 //echo $_POST["timporte"];
///////////////////////////////////////////////////////////////////////////
$idempresa = $_POST['idempresa'];
$nopedido = $_POST['nopedido'];  //query
$direccion = $_POST['direccion'];
$domicilio = $_POST['domicilio'];
$observaciones = $_POST['observaciones'];
$datosoperativos = $_POST['datosoperativos'];  
$noorden = $_POST['noorden']; 
$nvofolio = $_POST['nvofolio'];
///////////////////////////////////////////////////////////////////////////
$emisor["Rfc"]="CPE190207226";
$emisor["Nombre"]="COMERCIALIZADORA PETROMAR SA DE CV";
$emisor["RegimenFiscal"]="601";
///////////////////////////////////////////////////////////////////////////
$receptor["Rfc"] = $_POST['rfcreceptor'];
$receptor["Nombre"] = $_POST['Nombre'];
$receptor["ResidenciaFiscalSpecified"] = false;
$receptor["NumRegIdTrib"] = null;
$receptor["UsoCFDI"] = "G01";

$conceptos = null;
$ImpuestosTotales = null;
$complemento = null;
$totalImpuestosTrasladados = $_POST['totalimpuestostraslados'];
$Subtotal = 0;

$comprobante["Version"] = "3.3"; 
$comprobante["Serie"] = "NC";
$comprobante["Folio"] = $_POST['nvofolio'];
$comprobante["Fecha"] = date('Y-m-d\TH:i:s', strtotime(date('Y-m-d\TH:i:s').'-1 hour'));
$comprobante["Moneda"] = "MXN";
$comprobante["TipoDeComprobante"] = "E";
$comprobante["LugarExpedicion"] = "82110";
$comprobante["Emisor"] = $emisor;
$comprobante["Receptor"] = $receptor;
$comprobante["Complemento"] = $complemento;
$comprobante["MetodoPagoSpecified"] = true;
$comprobante["MetodoPago"] = "PPD";
$comprobante["FormaPago"] = "99"; //
//$comprobante["Descuento"] = $_POST['descuento'][0];

/////////////////////
$CfdiRelacionados["TipoRelacion"] = "01";
//CfdiRelacionado[0]["UUID"] = $_POST["uuid"];
 

//$comprobante["CfdiRelacionados"]["TipoRelacion"] = "01"; 
$comprobante["CfdiRelacionados"]["TipoRelacion"] = "01";  
$CfdiRelacionado["UUID"] = $_POST["uuid"];
$comprobante["CfdiRelacionados"]["CfdiRelacionado"][0] = $CfdiRelacionado;
//////////////////// 
$productos = count($_POST['claveprodserv']);  
for($i=0; $i<$productos; $i++){
	 
    $traslado[0]["Base"] = $_POST['valorunitario']; //subtotal 
	 //$Subtotal += (float) $traslado[0]["Base"];
	 $Subtotal += (float) $_POST['base'];
 
    $traslado[0]["Impuesto"] = "002";
    $traslado[0]["TipoFactor"] = "Tasa";
    $traslado[0]["TasaOCuota"] = "0.160000";
    $traslado[0]["TasaOCuotaSpecified"] = true;
    $traslado[0]["Importe"] = $_POST['baseimpuestos'];//timporte
	//echo $traslado[0]["Importe"]."<br>";
    $totalImpuestosTrasladados +=(float) $traslado[0]["Importe"];
    $traslado[0]["ImporteSpecified"] = true;
	 
	if($i == 1){
	$retencion[0]["Base"] = $_POST['valorunitario'];
	$retencion[0]["Impuesto"] = "002";
    $retencion[0]["TipoFactor"] = "Tasa";
    $retencion[0]["TasaOCuota"] = "0.040000";
    $retencion[0]["TasaOCuotaSpecified"] = true;
    $retencion[0]["Importe"] = $_POST['retenidos']; //$_POST['rimporte'][$i]
    $totalImpuestosRetenidos +=(float) $retencion[0]["Importe"];
    $retencion[0]["ImporteSpecified"] = true;
	} 
	
    $impuesto["Traslados"] = $traslado;
    $impuesto["Retenciones"] = $retencion;
    $concepto["ClaveProdServ"] = $_POST['claveprodserv'];
    $concepto["NoIdentificacion"] = "32026";//UT421511$_POST['noidentificacion'][$i];
    $concepto["Cantidad"] = $_POST['cantidad'];
    $concepto["ClaveUnidad"] = $_POST['claveunidad'];
    $concepto["Unidad"] = $_POST['unidad'];
    $concepto["Descripcion"] = $_POST['descripcion'];
    $concepto["ValorUnitario"] = $_POST['valorunitario'];
    $concepto["Importe"] = $_POST['base'];
    //$concepto["Descuento"] = $_POST['descuento'][$i];

    $conceptos[$i]=$concepto;
    $conceptos[$i]["Impuestos"] = $impuesto;
}
$comprobante["Conceptos"] = $conceptos;
//$ImpuestosTotales["Retenciones"] = null;
$ImpuestosTotales["Traslados"][0]["Impuesto"] = "002";
$ImpuestosTotales["Traslados"][0]["TipoFactor"] = "Tasa";
$ImpuestosTotales["Traslados"][0]["TasaOCuota"] = "0.160000";
$ImpuestosTotales["Traslados"][0]["Importe"] = (string)$totalImpuestosTrasladados;

if($_POST['Flete'] == "1"){
	 
$ImpuestosTotales["Retenciones"][0]["Impuesto"] = "002";
$ImpuestosTotales["Retenciones"][0]["TipoFactor"] = "Tasa";
$ImpuestosTotales["Retenciones"][0]["TasaOCuota"] = "0.040000";
$ImpuestosTotales["Retenciones"][0]["Importe"] = (string)$totalImpuestosRetenidos;

$ImpuestosTotales["TotalImpuestosRetenidos"] = (string)$totalImpuestosRetenidos;
$ImpuestosTotales["TotalImpuestosRetenidosSpecified"] = true;
}else{}
$ImpuestosTotales["TotalImpuestosTrasladados"] = (string)$totalImpuestosTrasladados;
$ImpuestosTotales["TotalImpuestosTrasladadosSpecified"] = true;
$comprobante["Impuestos"] = $ImpuestosTotales;

 
$comprobante["SubTotal"] = (string)$Subtotal; 
$comprobante["Total"] = (string)((($Subtotal + $totalImpuestosTrasladados)-$_POST['descuento'][0])-$totalImpuestosRetenidos);
 

$json = json_encode($comprobante); 
echo $json; 
echo "<br>"; 
 $a = $json;
   
try{
	 
	global $connect;
	
    $basePath = "../../uploads/";
    $jsonIssuerStamp = jsonEmisionTimbrado::Set($params);
    $resultadoJson = $jsonIssuerStamp::jsonEmisionTimbradoV4($json);
    
    if($resultadoJson->status=="success"){
        //save CFDI
        $ruta=$basePath.$resultadoJson->data->uuid.".xml";
            $ruta2=$resultadoJson->data->uuid.".xml";
            $ruta3=$basePath.'F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['nombrec'].' F-'.$_POST['foliopemex'].'.xml';
            $ruta4='F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['nombrec'].' F-'.$_POST['foliopemex'].'.xml';
        file_put_contents($ruta3, $resultadoJson->data->cfdi);
        
		// echo $resultadoJson->data->cfdi;
        //save QRCode
        $nombreyRuta = 'F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['nombrec'].' F-'.$_POST['foliopemex'].".png";
        imagepng(imagecreatefromstring(base64_decode($resultadoJson->data->qrCode)), $basePath.$nombreyRuta);
	 
		//insert folio  
		 $conn=new mysqli("localhost","wwcomp_sistemas","s7O4BJi0H5J4","wwcomp_comercializadora")
		  or die("not connected".mysqli_connect_error());  
			$sql="insert into timbrado (folionotac) values('".$_POST['nvofolio']."')";
			$query=mysqli_query($conn,$sql);
			if($query){
			 // echo"1 row inserted";
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
		   <form method="post" action="../notacreditopdf.php" name="frm1"> 
		   <input type="hidden" name="json" value="'.$ruta4.'" />  
		   <input type="hidden" name="direccion" value="'.$direccion.'" />  
		   <input type="hidden" name="domicilio" value="'.$domicilio.'" />  
		   <input type="hidden" name="observaciones" value="'.$observaciones.'" />  
		   <input type="hidden" name="datosoperativos" value="'.$datosoperativos.'" />  
		      
		   <input type="hidden" name="noorden" value="'.$noorden.'" />   
		   <input type="hidden" name="idempresa" value="'.$idempresa.'" />  
		   <input type="hidden" name="nopedido" value="'.$nopedido.'" />  
           <input type="hidden" name="archivoconruta" value="'.$ruta4.'" />  
           <input type="hidden" name="uuidfactura" value="'.$_POST["uuid"].'" />  
<input type="submit" value="continuar">		   
	       </form> 
		   </body> ';	

?>


 