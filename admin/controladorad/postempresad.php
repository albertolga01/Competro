<?php
 
if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
	
}


function Login()
{
	
	
	
	global $connect;
	
	
	
	
	
	
	

	 $idcomercializadora = $_POST["idcomercializadora"];
		$RzonSocial = $_POST["RzonSocial"];
		$RLegal = $_POST["RLegal"];
		$Domicilio = $_POST["Domicilio"];
		$Correo = $_POST["Correo"];
		$Telefono = $_POST["Telefono"];
		$Contacto= $_POST["Contacto"];
		$Usuario = $_POST["Usuario"];
        $Contrasena = $_POST["Contrasena"]; 
		$RFC = $_POST["RFC"]; 
		
		
	    $query = "Insert into empresa (RzonSocial, RLegal, Domicilio, Correo, Telefono, Contacto, Usuario, Contrasena, rfc, idcomercializadora) values ('".$RzonSocial."','".$RLegal."', '".$Domicilio."','".$Correo."', '".$Telefono."', '".$Contacto."', '".$Usuario."', '".$Contrasena."', '".$RFC."', '".$idcomercializadora."')";

		$result = mysqli_query($connect,$query);
		
		if(($result)==1){
			 
			
					echo "<script>
alert('Cliente Agregado Correctamente');
window.location.href='../clientes';
</script>";

 
				
				
	/*			 
	 $options = new Options();
$options->set('defaultFont', 'Courier'); 
$dompdf = new Dompdf($options);
// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($InfoCliente); 

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A3', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();
 
*/

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes" name="frm1" target="self">
		   <input type="hidden" name="mensaje" value="Cliente Agregado Correctamente" />  
	       </form>
		   </body> ';	 
		
			 
			exit();
		}else{
			
		 

echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Agregar Cliente" /> 
	       </form>
		   </body> ';	 
			
			// header("location: NvoClienteError.html");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}



?>
