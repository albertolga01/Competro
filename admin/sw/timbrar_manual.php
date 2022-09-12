<?php
    require_once 'SWSDK.php';
    use SWServices\JSonIssuer\JsonEmisionTimbrado as jsonEmisionTimbrado;
    require 'connector.php';
	global $i;
    
//header('Content-Type: text/plain');
date_default_timezone_set('America/Mexico_City');
/* 
$params = array(
    "url"=>"https://services.sw.com.mx",
    "user"=>"facturacion@competro.mx",
    "password"=> "cPr/123*226"
);
*/
$params = array(
    "url"=>"http://services.test.sw.com.mx",
    "user"=>"desarrollo@grupopetromar.com",
    "password"=> "SWpruebas"
);
     
 if($_POST["FP"] == "1"){
	 if($_POST["sobrantecontado"] >= $_POST["total"]){
		 $FPP = "03";
		 $FormaPago = "PUE";
	 }else{
		 $FPP = "99";
		 $FormaPago = "PPD";
	 }
 }else{
	 $FPP = "03";
	 $FormaPago = "PUE";
 }
 
///////////////////////////////////////////////////////////////////////////
$idempresa = $_POST['idempresa'];
$nopedido = $_POST['nopedido'];  //query
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
///////////////////////////////////////////////////////////////////////////
$conceptos = null;
$ImpuestosTotales = null;
$complemento = null;
$totalImpuestosTrasladados = $_POST['totalimpuestostraslados'];
$Subtotal = 0;
  
$comprobante["Version"] = "3.3";
//$comprobante["Serie"] = "A";
$comprobante["Folio"] = "9999999";
$comprobante["Fecha"] = date('Y-m-d\TH:i:s', strtotime($_POST['fecha']. ' - 10 hour'));
$comprobante["Moneda"] = "MXN";
$comprobante["TipoDeComprobante"] = "I";
$comprobante["LugarExpedicion"] = "82110";
$comprobante["Emisor"] = $emisor;
$comprobante["Receptor"] = $receptor;
$comprobante["Complemento"] = $complemento;
$comprobante["MetodoPagoSpecified"] = true;
$comprobante["MetodoPago"] = $FormaPago;
$comprobante["FormaPago"] = $FPP; 
  
$productos = count($_POST['claveprodserv']); 
echo $_POST["timporte"];
for($i=0; $i<$productos; $i++){
	 
    $traslado["Base"] = $_POST['base']; //subtotal  
	 //$Subtotal += (float) $traslado[0]["Base"];
	 $Subtotal += (float) $_POST['base'];

    $traslado["Impuesto"] = "002";
    $traslado["TipoFactor"] = "Tasa";
    $traslado["TasaOCuota"] = "0.160000";
    $traslado["TasaOCuotaSpecified"] = true;
    $traslado["Importe"] = $_POST["baseimpuestos"];//$_POST['timporte'];
    $totalImpuestosTrasladados +=(float) $traslado["Importe"]; 
    $traslado["ImporteSpecified"] = true;
	 
	 
    $impuesto["Traslados"] = $traslado; 
    $concepto["ClaveProdServ"] = $_POST['claveprodserv'];
    $concepto["NoIdentificacion"] = "PREM01";
    $concepto["Cantidad"] = $_POST['cantidad'];
    $concepto["ClaveUnidad"] = $_POST['claveunidadsat'];
    $concepto["Unidad"] = $_POST['unidad'];
    $concepto["Descripcion"] = $_POST['descripcion'];
    $concepto["ValorUnitario"] = $_POST['valorunitario'];
    $concepto["Importe"] = $_POST['base']; 

    $conceptos[$i]=$concepto;
    $conceptos[$i]["Impuestos"] = $impuesto;
}
$comprobante["Conceptos"] = $conceptos;
$ImpuestosTotales["Retenciones"] = null;
$ImpuestosTotales["Traslados"]["Impuesto"] = "002";
$ImpuestosTotales["Traslados"]["TipoFactor"] = "Tasa";
$ImpuestosTotales["Traslados"]["TasaOCuota"] = "0.160000";
$ImpuestosTotales["Traslados"]["Importe"] = (string)$totalImpuestosTrasladados;

 
$ImpuestosTotales["TotalImpuestosTrasladados"] = (string)$totalImpuestosTrasladados;
$ImpuestosTotales["TotalImpuestosTrasladadosSpecified"] = true;
$comprobante["Impuestos"] = $ImpuestosTotales;

 
$comprobante["SubTotal"] = (string)$Subtotal; 
$comprobante["Total"] = (string)((($Subtotal + $totalImpuestosTrasladados)-$_POST['descuento'][0])-$totalImpuestosRetenidos);
 
print_r($traslado);echo "<br>";echo "<br>";
$json = json_encode($comprobante); 
echo $json; 
echo "<br>";
$a = $json;
 
try{
    $basePath = "../../uploads/";
    $jsonIssuerStamp = jsonEmisionTimbrado::Set($params);
    $resultadoJson = $jsonIssuerStamp::jsonEmisionTimbradoV4($json);
    
    if($resultadoJson->status=="success"){
        //save CFDI
        $ruta=$basePath.$resultadoJson->data->uuid.".xml";
            $ruta2=$resultadoJson->data->uuid.".xml";
            $ruta3=$basePath.'F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['estacion'].' F-'.$_POST['foliopemex'].' '.$_POST['letraprod'].'.xml';
            $ruta4='F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['estacion'].' F-'.$_POST['foliopemex'].' '.$_POST['letraprod'].'.xml';
        file_put_contents($ruta3, $resultadoJson->data->cfdi);
        // echo $resultadoJson->data->cfdi;
        //save QRCode
        $nombreyRuta = 'F'.str_pad($nvofolio, 10, '0', STR_PAD_LEFT).' '.$_POST['estacion'].' F-'.$_POST['foliopemex'].' '.$_POST['letraprod'].".png";
        imagepng(imagecreatefromstring(base64_decode($resultadoJson->data->qrCode)), $basePath.$nombreyRuta);
	
		
		//insert folio  
		$Ins = "INSERT INTO timbrado (folio) VALUES('".$_POST['nvofolio']."')";
		echo $Ins;
		//$resultIT = $connect->query($Ins);  
		}
    else{ 
        $ruta = $basePath."Error-".$comprobante["Serie"]."-".$comprobante["Folio"].".txt";
        $mensaje= $resultadoJson->message."\n".$resultadoJson->messageDetail;
        file_put_contents($ruta, $mensaje);
    }
    var_dump($resultadoJson);
}
catch(Exception $e){
    echo $e->getMessage();
}
 
//		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)"> 

    echo ' 		
            <form method="post" action="../facturapdf.php" name="frm1"> 
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
                <input type="hidden" name="nopedido" value="'.$nopedido.'" />  
                <input type="hidden" name="archivoconruta" value="'.$ruta4.'" />  
                <input type="hidden" name="FP" value="'.$_POST["FP"].'" />  
                <input type="submit" value="continuar">		   
            </form> 
        </body> 
    ';	

?>


 