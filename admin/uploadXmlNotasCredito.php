<?php
	require_once "crXml.php"; 
	require 'connector.php'; 
	$Docsa[] = $_FILES['files']['name'];  
	$num = count($_FILES['files']['name']);  
	for ($i = 0; $i < $num; $i++) { 
		$format = substr($_FILES['files']['name'][$i], -3);
		$uploaddir = '../uploads/';  
		$uploadx = $uploaddir . basename($_FILES['files']['name'][$i]);
					//

		echo '
		<body><form method="post" action="notascredito0" name="formxml" >
		
		';
	
		if($format == 'pdf') {
			$uploadfilepdf = $uploaddir . basename($_FILES['files']['name'][$i]);
		}

		if($format == 'xml') { 
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
			$ConceptoImpuestosTraslados = $crxml->$a->$c->$d->$e->$f->$g;
			$Concepto2ImpuestosTraslados = $crxml->$a->$c->$d[1]->$e->$f->$g;
				$temp1 = "TotalImpuestosTrasladados";
			$Impuestos = $crxml->$a->$e->attributes()->$temp1;
			//$Impuestos2 = $crxml->$a->$c->$d[1]->$e->$f->$g;		
			$ImpuestoTraslados = $crxml->$a->$e->$f->$g;
			//$ImpuestosTrasladados = $ImpuestosT['TotalImpuestosTrasladados']; 
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

			for($i = 0; $i < $x; $i++) {
				$Concepto = $crxml->$a->$c->$d[$i];
				$Descuento[] = $Concepto['Descuento']; 
				$ClaveProducto[] = $Concepto['ClaveProdServ']; 
				$Importee[] = $Concepto['Importe'];  
				$Conceptos[] = $Concepto['Descripcion'];  
				$ValorUnitario[] = $Concepto['ValorUnitario'];  
				$Cantidad[] = $Concepto['Cantidad'];  
				$NoIdentificacion[] = $Concepto['NoIdentificacion'];  
				$ClaveUnidad[] = $Concepto['ClaveUnidad']; 
				$Unidad[] = $Concepto['Unidad'];  
				$Descripcion[] = $Concepto['Descripcion']; 
				$TBase[] = $crxml->$a->$c->$d[$i]->$e->$f->$g['Base'];
				$TImporte[] = $crxml->$a->$c->$d[$i]->$e->$f->$g['Importe'];
			} 
			  
			$Flete = $crxml->$a->$c->{'cfdi:Concepto'}[1];
				
			if(isset($Flete['Importe'])) {
				$F[] = $Flete['Importe'];
			} else {
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
			$PDF[] = substr($_FILES['files']['name'][$i], 0,  -4).".pdf";
			$Factura =  $_FILES['files']['name'][$i];
				
			if(isset($_FILES['files'][$i])) {
			} else {
			}
			
			$Fecha =  date('Y-m-d H:i', strtotime($item['Fecha']. ' 0 days')); 
		
		}
		
		if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $uploadx)) { 
		 
		}  
	}

	foreach($Conceptos as $value) {
		echo '<input type="hidden" name="Concepto[]" value="'.$value.'">';
	} 
	foreach($Cantidad as $value) {
		echo '<input type="hidden" name="Cantidad[]" value="'.$value.'">';
	}  
	foreach($ValorUnitario as $value) {
		echo '<input type="hidden" name="ValorUnitario[]" value="'.$value.'">';
	}  
	foreach($Descuento as $value) {
		echo '<input type="hidden" name="Descuento[]" value="'.$value.'">';
	} 
	foreach($ClaveProducto as $value) {
		echo '<input type="hidden" name="ClaveProducto[]" value="'.$value.'">';
	}  
	foreach($Importee as $value) {
		echo '<input type="hidden" name="Importe[]" value="'.$value.'">';
	} 
	foreach($ClaveUnidad as $value) {
		echo '<input type="hidden" name="ClaveUnidad[]" value="'.$value.'">';
	} 
	foreach($Unidad as $value) {
		echo '<input type="hidden" name="Unidad[]" value="'.$value.'">';
	}  
	foreach($Descripcion as $value) {
		echo '<input type="hidden" name="Descripcion[]" value="'.$value.'">';
	} 
	foreach($NoIdentificacion as $value) {
		echo '<input type="hidden" name="NoIdentificacion[]" value="'.$value.'">';
	} 
	foreach($TImporte as $value) {
		echo '<input type="hidden" name="TImporte[]" value="'.$value.'">';
	} 
	foreach($TBase as $value) {
		echo '<input type="hidden" name="TBase[]" value="'.$value.'">';
	}   

	echo '
		<input type="hidden" name="Folio" value="'.$Folio.'">
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
		<input type="hidden" name="uuid" value="'.$_POST["uuid"].'">
		<input type="hidden" name="IdEmpresa" value="'.$_POST['IdEmpresa'].'" /> 

		<input type="hidden" name="xml" value="1" /> 
		<input type="submit" value="enviar" hidden="hidden">
		</form> 
		</body>
	';
	
	 
//
	echo "
		<script>
			document.formxml.submit();
		</script>
	";
?>