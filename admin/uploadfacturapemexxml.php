<?php

	require_once "crXml.php"; 
	require 'connector.php'; 
global $connect;
	$Docsa[] = $_FILES['files']['name'];  
	$num = count($_FILES['files']['name']);
 
	for ($i = 0; $i < $num; $i++) {
		$format = substr($_FILES['files']['name'][$i], -3);
		$uploaddir = '../uploads/';  
		$uploadx = $uploaddir . basename($_FILES['files']['name'][$i]);
		
		echo '
					 <form method="post" action="facturacion" name="frm1">
		';
//
//				
				   
						if($format == 'pdf'){
		  
				$pdf = substr($_FILES['files']['name'][$i], 0 , -4).".pdf";
			$destinationFilePath = $uploaddir.basename($_FILES['files']['name'][$i]); 
				   
				if( !rename($_FILES['files']['tmp_name'][$i], $destinationFilePath) ) {  
					//echo "File pdf can't be moved!";  
				}  
				else {   
					//echo "File pdf has been moved!";  
				} 
		}


		if($format == 'xml'){ 
			$xml = $_FILES['files']['name'][$i];
			echo "<p>";
			$crxml=new crXml(); 
			$data = file_get_contents($_FILES["files"]['tmp_name'][$i]);
			$item = simplexml_load_string($data); 
			
			$uploadfile = $uploaddir . basename($_FILES['files']['name'][$i]);
			$crxml->loadXML($data);
		 
			$a = 'cfdi:Comprobante';
			$b = 'cfdi:Receptor';
			$c = 'cfdi:Conceptos';
			$d = 'cfdi:Concepto';
			$e = 'cfdi:Impuestos';
			$f = 'cfdi:Traslados';
			$g = 'cfdi:Traslado';
			$Receptor = $crxml->$a->$b;
			$Concepto = $crxml->$a->$c->$d;
			$Concepto2 = $crxml->$a->$c->$d[1];	
			$ImpuestosTrasladospro = $crxml->$a->$c->$d->$e->$f->$g;
			$ImpuestosTrasladospro2 = $crxml->$a->$c->$d[1]->$e->$f->$g;
			$ImpuestosT = $crxml->$a->$e;
			$ImpuestosT2 = $crxml->$a->$c->$d[1]->$e->$f->$g;		
			$ImpuestosTrasladados = $ImpuestosT['TotalImpuestosTrasladados']; 
			$ImpuestosTrasladados2 = $ImpuestosT2['Importe'];  
 
			$ImpuestosRetenidos = $ImpuestosT['TotalImpuestosRetenidos'];  
 
			$Cliente = $Receptor['Nombre'];  
			$Rfc = $Receptor['Rfc']; 
			 $x = 0;	
			foreach ($crxml->$a->$c as $services) {
				foreach($services as $service) { 
				$x++;
				}
			} 	
			for($i = 0; $i < $x; $i++){
				$Concepto = $crxml->$a->$c->$d[$i];

				
				$pedidoQuery = "Select  t1.folio, t1.idempresa, t2.rfc, t2.rzonsocial, t3.direccion, t2.domicilio, t4.Porcentaje, t4.PorcentajePremium, t4.PorcentajeDiesel 
                    from pedido t1 inner join empresa t2 on t1.idempresa = t2.idempresa 
                    inner join destinos t3 on t1.destino = t3.destino inner join estadocuenta t4 on t1.idempresa = t4.idempresa
                    where t1.folio = '".$_POST['folio']."'"; 
                  $resultdx = $connect->query($pedidoQuery);
                  if ($resultdx->num_rows > 0) { 
                    while($rowdx = $resultdx->fetch_assoc()) {   
						$porcentaje = $rowdx['Porcentaje'];
						$porcentajePremium = $rowdx['PorcentajePremium'];
						$porcentajeDiesel = $rowdx['PorcentajeDiesel'];
  
					}
				}
				//consulta ieps
				$QIeps = "SELECT IEPSmagna, IEPSpremium, IEPSdiesel FROM impuestos ORDER BY fecha DESC LIMIT 1";
				$resultieps = $connect->query($QIeps);
				if ($resultieps->num_rows > 0) { 
					while($rowie = $resultieps->fetch_assoc()) {   
						$IEPSmagna = $rowie['IEPSmagna'];
						$IEPSpremium = $rowie['IEPSpremium'];
						$IEPSdiesel = $rowie['IEPSdiesel'];

					}
				}
				 
				if(($Concepto['Descripcion'] == 'GASOLINA CONTENIDO MIN.87 OCTANOS') || ($Concepto['Descripcion'] == "PEMEX MAGNA"))
				{ 
				//	echo "Magna";
				  //$ieps = 0.484720; //0.451449 
				  $ieps = $IEPSmagna; //0.451449 
				  $Comision = $porcentaje/100;
				}

				if(($Concepto['Descripcion'] == 'GASOLINA CONTENIDO MIN. 91 OCTANOS') || ($Concepto['Descripcion'] == "PEMEX PREMIUM"))
				{ 
				//	echo "Premium";
				  //$ieps = 0.591449; // 0.550852 
				  $ieps = $IEPSpremium; // 0.550852 
				  $Comision = $porcentajePremium/100;
				} 
			   
				if(($Concepto['Descripcion'] == 'DIESEL AUTOMOTRIZ') || ($Concepto['Descripcion'] == 'PEMEX DIESEL'))
				{ 
				  //$ieps = 0.402288; //0.374675 
				  $ieps = $IEPSdiesel; //0.374675 
				  $Comision = $porcentajeDiesel/100;
				} 
				$Comision = (1 - $Comision); 
				if($Concepto['Descuento'] > 0){
					$litro = ($Concepto['Descuento'] / $Concepto['Cantidad']) - 0.05; 
					//$unitario = ($Concepto['ValorUnitario'] + 0.05);
					$unitario = ($Concepto['ValorUnitario']);
					$ValImporte = $unitario * $Concepto['Cantidad']; 
					$conco2 = 0.05 * $Concepto['Cantidad'];
				//	$nuevoDesc = ($Concepto['Descuento']) * $Comision; 
				$nuevoDesc = ($Concepto['Descuento'] - $conco2) * $Comision; 
					 
				}else{ 
					$litro = ($Concepto['Descuento'] / $Concepto['Cantidad']);
					$unitario = $Concepto['ValorUnitario'];
					$nuevoDesc = 0.00; 
					$ValImporte =  $Concepto['Importe'];  
				}  
			    //echo $Concepto['Descuento']."<br>";
				//echo $nuevoDesc;
				//echo bcdiv($ValImporte)."<br>";
				$Descuento[] = $nuevoDesc;
				$ClaveProducto[] = $Concepto['ClaveProdServ']; 
				$Importee[] = bcdiv($ValImporte,1,2);
				$Conceptos[] = $Concepto['Descripcion'];  
				$ValorUnitario[] = $unitario;  
				$Cantidad[] = $Concepto['Cantidad'];  
				$NoIdentificacion[] = $Concepto['NoIdentificacion'];  
				$ClaveUnidad[] = $Concepto['ClaveUnidad'];  
				$Unidad[] = $Concepto['Unidad'];  
				$Descripcion[] = $Concepto['Descripcion'];  
				
				
				  
				//$base = ($ValImporte - $nuevoDesc) - ($ieps * $Concepto['Cantidad']); 
				//$TBase[] =  $base; 
				//$TImporte[] =  $base * 1.16;
				if($Concepto['Descuento'] > 0){
					$base = ($ValImporte - $nuevoDesc) - ($ieps * $Concepto['Cantidad']); 
					$TBase[] =  $base; 
					$TImporte[] =  $base * 1.16;
				}else{ 
					$TBase[] =  $crxml->$a->$c->$d[$i]->$e->$f->$g['Base']; 
					$TImporte[] =  $crxml->$a->$c->$d[$i]->$e->$f->$g['Importe']; 
				}
				
				  /*echo $base."<br>"; 
				echo $ieps."<br>";
				echo $ValImporte."<br>"; 
				echo $nuevoDesc."<br>"; 
			 
				echo $Concepto['Cantidad']."<br>"; */
			}  

			 
				
			$Flete = $crxml->$a->$c->{'cfdi:Concepto'}[1];
				
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
		
			$Folio = $item['Folio']; 
			$Fec = $item['Fecha'];
			$Total = $item['Total'];
			$Moneda[] = $item['Moneda'];
			//$idempresa = $ID;
			$PDF[] = substr($_FILES['files']['tmp_name'][$i], 0,  -4).".pdf";
			$Factura =  $_FILES['files']['name'][$i];
			
		
		
				
			if(isset($_FILES['files'][$i])) {	 }else { 	}
			
			$Fecha =  date('Y-m-d H:i', strtotime($item['Fecha']. ' 0 days')); 
		}
		//if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploadx)) { 
		//} 
		if($format == 'xml'){
		  
					

			$destinationFilePath = $uploaddir.basename($_FILES['files']['name'][$i]);
				   
				if( !rename($_FILES['files']['tmp_name'][$i], $destinationFilePath) ) {  
					//echo "File xml can't be moved!";  
				}  
				else {  
					//echo "File xml has been moved!";  
				} 
		}
	 

	}

		foreach($Conceptos as $value)
		{
			echo '<input type="hidden" name="Concepto[]" value="'.$value.'">';
		} 
		foreach($Cantidad as $value)
		{
			echo '<input type="hidden" name="Cantidad[]" value="'.$value.'">';
		}  
		foreach($ValorUnitario as $value)
		{
			echo '<input type="hidden" name="ValorUnitario[]" value="'.$value.'">';
		}  
		foreach($Descuento as $value)
		{
			echo '<input type="hidden" name="Descuento[]" value="'.$value.'">';
		} 
		foreach($ClaveProducto as $value)
		{
			echo '<input type="hidden" name="ClaveProducto[]" value="'.$value.'">';
		}  
		foreach($Importee as $value)
		{
			echo '<input type="hidden" name="Importe[]" value="'.$value.'">';
		} 
		foreach($ClaveUnidad as $value)
		{

			echo '<input type="hidden" name="ClaveUnidad[]" value="'.$value.'">';
		} 
		foreach($Unidad as $value)
		{
			echo '<input type="hidden" name="Unidad[]" value="'.$value.'">';
		}  
		foreach($Descripcion as $value)
		{
			echo '<input type="hidden" name="Descripcion[]" value="'.$value.'">';
		} 
		foreach($NoIdentificacion as $value)
		{
			echo '<input type="hidden" name="NoIdentificacion[]" value="'.$value.'">';
		} 
		foreach($TImporte as $value)
		{ 
			echo '<input type="hidden" name="TImporte[]" value="'.$value.'">';
		} 
		foreach($TBase as $value)
		{
 
			echo '<input type="hidden" name="TBase[]" value="'.$value.'">';
		}   

        $insertFacturaPemex = "INSERT INTO facturaspemex (Folio, Factura, Fecha, Total, pdf, NoPedido, Descuento, 
                                ValorUnitario, Cantidad, RFC, Flete, Concepto, Importe, ImpuestosRetencion, ImpuestosTraslados) 
            VALUES ('".$Folio."', '".$xml."', '".substr($Fecha, 0, 10)."', '".$Total."', '".$pdf."', '".$_POST['folio']."', '".$Descuento[0]."', 
                '".$ValorUnitario[0]."', '".$Cantidad[0]."', '".$Rfc."', '".$F[0]."', '".$Conceptos[0]."', '".$Importee[0]."',
                '".$ImpuestosRetenidos."',  '".$ImpuestosTrasladados."')";
				 
                $resultiInsert = mysqli_query($connect, $insertFacturaPemex);
				if(($resultiInsert) == 1){}else{}

	echo '<input type="hidden" name="Folio" value="'.$Folio.'">
	<input type="hidden" name="foliopemex" value="'.$Folio.'">
	<input type="hidden" name="Factura" value="'.$Factura.'" />
	<input type="hidden" name="idempresa" value="'.$idempresa.'" />
	<input type="hidden" name="Fecha" value="'.$Fec.'" />
	<input type="hidden" name="Total" value="'.$Total.'" />
	<input type="hidden" name="PDF" value="'.$PDF.'" /> 
	
	<input type="hidden" name="Importee[]" value="'.$Importee.'" />
	<input type="hidden" name="Rfc" value="'.$Rfc.'" />
	<input type="hidden" name="F[]" value="'.$F.'" />
	<input type="hidden" name="ImpuestosRetenidos" value="'.$ImpuestosRetenidos.'" />
	
	<input type="hidden" name="ImpuestosTrasladados" value="'.$ImpuestosTrasladados.'" />
	<input type="hidden" name="ImpuestosTrasladados2" value="'.$ImpuestosTrasladados2.'" />
	
	<input type="hidden" name="Cliente" value="'.$Cliente.'" /> 
	<input type="hidden" name="folio" value="'.$_POST['folio'].'" /> 
	<input type="hidden" name="xml" value="1" /> 
	'; 
	
	echo ' 
		<input type="submit" value="enviar" hidden="hidden">
		</form>
		</body>  
	';

	echo "<script>document.frm1.submit();</script>"		   

?>