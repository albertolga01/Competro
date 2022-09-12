
<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
	require 'connector.php';
	Login();
}


function Login()
{
	
	global $connect;
	
	
	   
		
		$Id = $_POST["idempresa"]; 
		$LimC = $_POST["LimC"];
		$Plazo = $_POST["Plazo"];
		$Porcentaje = $_POST["Porcentaje"];
		$PorcentajeP = $_POST["PorcentajeP"];
		$PorcentajeD = $_POST["PorcentajeD"];
		$Activo = 0;
		if(!empty($_POST["Credito"])){
			$Activo = 1;
		}else {
			$Activo = 0;
		}
		  
		
$query = "Update estadocuenta set Credito = '".$Activo."', LimC = '".$LimC."', Plazo = '".$Plazo."', Porcentaje = '".$Porcentaje."', PorcentajePremium = '".$PorcentajeP."', PorcentajeDiesel = '".$PorcentajeD."'  where Idempresa= '".$Id."' ";
 
		$result = mysqli_query($connect,$query);
		
		if(($result)==1){ 
		 


echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Información de Credito Actualizada Correctamente" /> 
	       </form>
		   </body> ';	
		 
			exit();
		}else{ 
		
		 


echo '
		   <body onload="setTimeout(function() { document.frm1.submit() }, 500)">
		   <form method="post" action="../clientes.php" name="frm1">
		   <input type="hidden" name="mensaje" value="Error al Actualizar Credito" /> 
	       </form>
		   </body> ';	
			//header("location:destinos.php");
			exit();
		}
		
		

	mysqli_query($connect,$query) or die(mysqli_error($connect));
	mysqli_close($connect); 
}

?>
