<?php
require_once 'SWSDK.php';
use SWServices\JSonIssuer\JsonEmisionTimbrado as jsonEmisionTimbrado;
require 'connector.php';
	global $i;
    global $connect;
//header('Content-Type: text/plain');
date_default_timezone_set('America/Mexico_City');
if($_POST["timbrar"] == 1){
   
$params = array(
    "url"=>"https://services.sw.com.mx", 
    "user"=>"facturacion@competro.mx",
    "password"=> "cPr/123*226" 
);  
}else if($_POST["timbrar"] == 0){ 
    $params = array(
        "url"=>"http://services.test.sw.com.mx",
        "user"=>"desarrollo@grupopetromar.com",
        "password"=> "Petromar+SW"
    ); 
}
  /*
  */

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
 
///////////////////////////////////////////////////////////////////////////
$idempresa = $_POST['idempresa'];
$nopedido = $_POST['nopedido'];  //query
$direccion = $_POST['direccion'];
$domicilio = $_POST['domicilio'];
$check = isset($_POST['checkbox']) ? "checked" : "unchecked";
$AltoScreen = $_POST['AltoScreen'];
$AnchoScreen = $_POST['AnchoScreen'];
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
$emisor["Nombre"]="COMERCIALIZADORA PETROMAR"; // sin el sa de cv
$emisor["RegimenFiscal"]="601"; 
///////////////////////////////////////////////////////////////////////////
$receptor["Rfc"] = $_POST['rfcreceptor'];
$receptor["Nombre"] = $RzonSocialF;//$RzonSocialF; $_POST['rzonsocialreceptor']
$receptor["ResidenciaFiscalSpecified"] = false;
$receptor["NumRegIdTrib"] = null;
$receptor["UsoCFDI"] = "G01";
$receptor["DomicilioFiscalReceptor"] = $CodFiscalRec;
$receptor["RegimenFiscalReceptor"] = $RegmenFiscalRec;
///////////////////////////////////////////////////////////////////////////
$conceptos = null;
$ImpuestosTotales = null;
$complemento = null;
//$totalImpuestosTrasladados = $_POST['totalimpuestostraslados'];
$Subtotal = 0;
  
$comprobante["Version"] = "4.0";
//$comprobante["Serie"] = "A";
$comprobante["Folio"] = $_POST['nvofolio'];
$comprobante["Fecha"] = date('Y-m-d\TH:i:s', strtotime($_POST['fecha']. ' - 55 minute'));
$comprobante["Moneda"] = "MXN";
$comprobante["Exportacion"] = "01";
$comprobante["TipoDeComprobante"] = "I";
$comprobante["LugarExpedicion"] = "82110";
$comprobante["Emisor"] = $emisor;
$comprobante["Receptor"] = $receptor;
$comprobante["Complemento"] = $complemento;
$comprobante["MetodoPagoSpecified"] = true;
$comprobante["MetodoPago"] = $FormaPago;
$comprobante["FormaPago"] = $FPP;
$comprobante["Descuento"] = $_POST['descuento'][0];
  
$productos = count($_POST['claveprodserv']); 
for($i=0; $i<$productos; $i++){
	 
    $traslado[0]["Base"] = bcdiv($_POST['baseimpuestos'][$i], 1, 2); //subtotal 
	 //$Subtotal += (float) $traslado[0]["Base"];
	 $Subtotal += (float) $_POST['base'][$i];

    $traslado[0]["Impuesto"] = "002";
    $traslado[0]["TipoFactor"] = "Tasa";
    $traslado[0]["TasaOCuota"] = "0.160000";
    $traslado[0]["TasaOCuotaSpecified"] = true;
    $traslado[0]["Importe"] = bcdiv($_POST['timporte'][$i], 1, 2);
    //$totalImpuestosTrasladados +=(float) $traslado[0]["Importe"];
    $totalImpuestosTrasladados +=(float)  bcdiv($_POST['timporte'][$i], 1, 2);
    $totalImpuestosBaseTrasladados +=(float)  bcdiv($_POST['baseimpuestos'][$i], 1, 2);
    $traslado[0]["ImporteSpecified"] = true;
	 
	// if($i == 1){
	// $retencion[0]["Base"] = $_POST['baseimpuestos'][$i];
	// $retencion[0]["Impuesto"] = "002";
    // $retencion[0]["TipoFactor"] = "Tasa";
    // $retencion[0]["TasaOCuota"] = "0.040000";
    // $retencion[0]["TasaOCuotaSpecified"] = true;
    // $retencion[0]["Importe"] = $_POST['retenidos']; //$_POST['rimporte'][$i]
    // $totalImpuestosRetenidos +=(float) $retencion[0]["Importe"];
    // $retencion[0]["ImporteSpecified"] = true;
	// } 
	
    $impuesto["Traslados"] = $traslado;
    $impuesto["Retenciones"] = $retencion;
    $concepto["ClaveProdServ"] = $_POST['claveprodserv'][$i];
    $concepto["ObjetoImp"] = "02";
    $concepto["NoIdentificacion"] = $_POST['noidentificacion'][$i];
    $concepto["Cantidad"] = $_POST['cantidad'][$i];
    $concepto["ClaveUnidad"] = $_POST['claveunidad'][$i];
    $concepto["Unidad"] = $_POST['unidad'][$i];
    $concepto["Descripcion"] = $_POST['descripcion'][$i];
    $concepto["ValorUnitario"] = $_POST['valorunitario'][$i];
    $concepto["Importe"] = bcdiv($_POST['base'][$i], 1, 2);
    $concepto["Descuento"] = $_POST['descuento'][$i];

    $conceptos[$i]=$concepto;
    $conceptos[$i]["Impuestos"] = $impuesto;
}
$comprobante["Conceptos"] = $conceptos;
//$ImpuestosTotales["Retenciones"] = null;
$ImpuestosTotales["Traslados"][0]["Impuesto"] = "002";
$ImpuestosTotales["Traslados"][0]["TipoFactor"] = "Tasa";
$ImpuestosTotales["Traslados"][0]["TasaOCuota"] = "0.160000";
$ImpuestosTotales["Traslados"][0]["Importe"] = (string)$totalImpuestosTrasladados;
$ImpuestosTotales["Traslados"][0]["Base"] = (string)$totalImpuestosBaseTrasladados;

// if($_POST['Flete'] == "1"){
	 
// $ImpuestosTotales["Retenciones"][0]["Impuesto"] = "002";
// $ImpuestosTotales["Retenciones"][0]["TipoFactor"] = "Tasa";
// $ImpuestosTotales["Retenciones"][0]["TasaOCuota"] = "0.040000";
// $ImpuestosTotales["Retenciones"][0]["Importe"] = (string)$totalImpuestosRetenidos;

// $ImpuestosTotales["TotalImpuestosRetenidos"] = (string)$totalImpuestosRetenidos;
// $ImpuestosTotales["TotalImpuestosRetenidosSpecified"] = true;
// }else{}

//bcdiv($var, 1, 2);
$ImpuestosTotales["TotalImpuestosTrasladados"] = bcdiv((string)$totalImpuestosTrasladados, 1, 2);
$ImpuestosTotales["TotalImpuestosTrasladadosSpecified"] = true;
$comprobante["Impuestos"] = $ImpuestosTotales;
 
  
$comprobante["SubTotal"] = (string)$Subtotal;  
$comprobante["Total"] = bcdiv((string)((($Subtotal + $totalImpuestosTrasladados)-$_POST['descuento'][0])-$totalImpuestosRetenidos), 1, 2);
 

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
		$Ins = "insert into timbrado (folio) values('".$_POST['nvofolio']."')";
		echo $Ins;
		$resultIT = $connect->query($Ins);  
        $bool = "1";
		}
    else{ 
        $ruta = $basePath."Error-".$comprobante["Serie"]."-".$comprobante["Folio"].".txt";
        $mensaje= $resultadoJson->message."\n".$resultadoJson->messageDetail;
        file_put_contents($ruta, $mensaje); 
        $bool = "0";


    }
    var_dump($resultadoJson);
		
		 
}
catch(Exception $e){
    echo $e->getMessage();











}
 
if($bool == "1"){

//		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)"> 

echo ' 		
		   <form method="post" action="../facturapdf.php" name="frm1"> 
		   <input type="hidden" name="json" value="'.$ruta4.'" />  
		   <input type="hidden" name="direccion" value="'.$direccion.'" />  
		   <input type="hidden" name="check" value="'.$check.'" /> 
           <input type="hidden" name="domicilio" value="'.$domicilio.'" /> 
           <input type="hidden" name="AltoScreen" value="'.$AltoScreen.'" /> 
           <input type="hidden" name="AnchoScreen" value="'.$AnchoScreen.'" />     
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
           <input type="hidden" name="regimenrnombre" value="'.$regimenrnombre.'" />  
           <input type="hidden" name="FP" value="'.$_POST["FP"].'" />  
           <input type="hidden" name="datosextra" value="'.$_POST["datosextra"].'"/>
            <input type="submit" value="continuar">		   
	       </form> 
		   </body> ';	


}

if($bool == "0"){
    echo ' 		
    <form method="post" action="../pedidosrprogramadosadmin.php" name="frm1">  
<input type="submit" value="Regresar">		   
    </form> 
    </body> ';	

}

?>


 