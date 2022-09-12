<?php
require_once "crXml.php"; 
require 'connector.php';
 


$Docsa[] = $_FILES['files']['name'];  
 $num = count($_FILES['files']['name']); 


 for ($i = 0; $i < $num; $i++) { 
 

$format = substr($_FILES['files']['name'][$i], -3);
  
  
  
   
 $uploaddir = '../uploads/';  
  
 
 $uploadx = $uploaddir . basename($_FILES['files']['name'][$i]);
  
   
 echo ' 
		   <form method="post" action="carganotacredito" name="frm1">
	';	
 
 
 if($format == 'pdf'){
   
		$uploadfilepdf = $uploaddir . basename($_FILES['files']['name'][$i]);
	 
}

if($format == 'xml'){
    $uploadfile = $uploaddir . basename($_FILES['files']['name'][$i]);  
	
	$crxml=new crXml();
 	
	$data = file_get_contents($_FILES["files"]['tmp_name'][$i]);
    $item = simplexml_load_string($data); 
	
		$crxml->loadXML($data);
		$a = 'cfdi:Comprobante';
		$b = 'cfdi:Receptor';
		$c = 'cfdi:Conceptos';
		$d = 'cfdi:Concepto';
		$Receptor = $crxml->$a->$b;
		$Concepto = $crxml->$a->$c->$d;		
		
		$Cliente[] = $Receptor['Nombre']; echo "<br>";
		$Rfc[] = $Receptor['Rfc']; echo "<br>";
		$Descuento[] = $Concepto['Descuento']; echo "<br>";
		$Importee[] = $Concepto['Importe']; echo "<br>";
		$Conceptos[] = $Concepto['Descripcion']; echo "<br>";
		$ValorUnitario[] = $Concepto['ValorUnitario']; echo "<br>";
		$Cantidad[] = $Concepto['Cantidad']; echo "<br>";
		
		 
		$Flete = $crxml->$a->$c->{'cfdi:Concepto'}[1];;
		if(isset($Flete['Importe'])){
			
		$F[] = $Flete['Importe'];
		}else{
			$F[]=0;
		}
		
		
		
		//Get id empresa out of rfc 
		$Query = "Select idempresa, usuario from empresa where rfc = '".$Receptor['Rfc']."'";
		$res = mysqli_query($connect, $Query);
			if($res->num_rows){
				while($ro = $res->fetch_assoc()){
					$ID = $ro["idempresa"];
					$Usuario = $ro["usuario"];
					
				}
			}
			 
		
	
	 
	$Folio[] = $item['Folio']; 
	$Fec[] = $item['Fecha'];
	$Total[] = $item['Total'];
	$Moneda[] = $item['Moneda'];
	$Referencia[] = 'Nota de credito';
	$idempresa[] = $ID;
	
	 
	$Factura[] =  $_FILES['files']['name'][$i];
	$PDF[] = substr($_FILES['files']['name'][$i], 0,  -4).".pdf";
	
//	$Fecha[] =  date('Y-m-d H:i', strtotime($Fec. ' 0 days')); 
	
 
	 
}


if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploadx)) { 
 
  } 
  
 }
 
  foreach($Folio as $value)
{
    echo '<input type="hidden" name="Folio[]" value="'.$value.'">';
}
foreach($Factura as $value)
{
    echo '<input type="hidden" name="Factura[]" value="'.$value.'" />';
}
foreach($idempresa as $value)
{
    echo '<input type="hidden" name="idempresa[]" value="'.$value.'" />';
}
foreach($Fec as $value)
{
    echo '<input type="hidden" name="Fecha[]" value="'.$value.'" />';
}
foreach($Total as $value)
{
    echo '<input type="hidden" name="Total[]" value="'.$value.'" />';
}
foreach($PDF as $value)
{
    echo '<input type="hidden" name="PDF[]" value="'.$value.'" />';
}
foreach($Descuento as $value)
{
    echo '<input type="hidden" name="Descuento[]" value="'.$value.'" />';
}
foreach($Cantidad as $value)
{
    echo '<input type="hidden" name="Cantidad[]" value="'.$value.'" />';
}
foreach($ValorUnitario as $value)
{
    echo '<input type="hidden" name="ValorUnitario[]" value="'.$value.'" />';
}
foreach($Conceptos as $value)
{
    echo '<input type="hidden" name="Concepto[]" value="'.$value.'" />';
}
foreach($Importee as $value)
{
    echo '<input type="hidden" name="Importee[]" value="'.$value.'" />';
}

foreach($Referencia as $value)
{
    echo '<input type="hidden" name="Referencia[]" value="'.$value.'" />';
}
foreach($Rfc as $value)
{
    echo '<input type="hidden" name="Rfc[]" value="'.$value.'" />';
}
 
foreach($Cliente as $value)
{
    echo '<input type="hidden" name="Cliente[]" value="'.$value.'" /> ';
}
 
 
 
   echo ' 
		   <input type="submit" value="enviar" hidden="hidden">
	       </form>
		   </body> ';	

echo "<script>document.frm1.submit();</script>"	;	  

    
	
	 
		
?>