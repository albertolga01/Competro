<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
	require 'connector.php';
	global $i;
	
if($_SERVER["REQUEST_METHOD"]=="POST"){
	 
 $num = count($_POST['folio']); 
 $i = 0;
 
 for ($aaax = 0; $aaax < $num; $aaax++) {
	   $i = $aaax; 
	 Uno();
	 
 }
	 
	 echo ' 
		<body onload="setTimeout(function() { document.frm1.submit() }, 500)">
      <form method="post" action="../cargafacturaspemex.php" name="frm1"> 
	  <input type="hidden" name="mensaje" value="Guardado correctamente">
      </form>
      </body>  ';
	
	
	
}

function Uno(){
		global $connect; 
		global $i;  
	 $Folio = $_POST["folio"][$i]; 
		$Factura = $_POST["factura"][$i];
		$Fecha = $_POST["fecha"][$i];
		$Total = $_POST["total"][$i]; 
		$pdf = $_POST["pdf"][$i];
		$flete = $_POST["flete"][$i];
		$Concepto = $_POST["concepto"][$i]; 
		$Rfc = $_POST["rfc"][$i];
		$Descuento = $_POST["descuento"][$i];
		$Cantidad = $_POST["cantidad"][$i];
		$ValorUnitario = $_POST["valorunitario"][$i];
		$Importee = $_POST["importe"][$i];
		$ImpuestosT = $_POST["impuestostrasladados"][$i];
		$ImpuestosR = $_POST["impuestosretenidos"][$i];
	 
	 
	 
	 	$query = "Insert into facturaspemex (Folio, Factura, Fecha, Total, pdf,  Descuento, Cantidad, ValorUnitario, RFC, flete, Concepto, FechaVencimiento, Restante, Importe, ImpuestosTraslados, ImpuestosRetencion) 
		values ('".$Folio."', '".$Factura."', '".$Fecha."', '".$Total."', '".$pdf."',  '".$Descuento."', '".$Cantidad."', '".$ValorUnitario."', '".$Rfc."', '".$flete."', '".$Concepto."', '".$FechaV."', '".$Total."', '".$Importee."', '".$ImpuestosT."', '".$ImpuestosR."')"; 
		$result = mysqli_query($connect,$query); 
		if(($result)==1){
			
		 echo "<script>
		alert('Factura Agregada Correctamente: ".$Folio."'); 
		</script>";
		}else{
			
					echo "<script>
		alert('Error al agregar: ".$Folio."'); 
		</script>";
			
		}
}
 


?>
